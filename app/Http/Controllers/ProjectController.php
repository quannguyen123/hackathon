<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service\UserService;
use App\Http\Requests\AddProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\Project;
use App\Models\GuideMember;
use App\Models\ProjectMember;
use Illuminate\Http\JsonResponse;
use DB;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::with('user')->paginate(2);
        return view('projects.list', [
            'projects' => $projects
        ]);
    }

    public function create()
    {
        $managers = UserService::getUserByRole([2]);
        $members = UserService::getUserByRole([2, 3, 4]);
        return view('projects.add', [
            'managers' => $managers,
            'members' => $members,
        ]);
    }

    public function store(AddProjectRequest $request)
    {
        $project = $request->all();
        $project['start_date'] = date("Y/m/d 08:00:00", strtotime($project['start_date']));
        $project['end_date'] = date("Y/m/d 17:00:00", strtotime($project['end_date']));

        $projectData = Project::create($project);
        $project['user_id'] = $project['manager_id'];

        foreach ($project['user_id'] as $user_id) {
            $projectMember = [
                'user_id' => $user_id,
                'project_id' => $projectData['id']
            ];
            ProjectMember::insert($projectMember);
        }

        return redirect(route('projects.index'))->with('status', 'Project Created!');
    }

    public function edit(Project $project)
    {
        $projectMembers = ProjectMember::select('user_id')->where('project_id', $project['id'])->get()->toArray();
        $projectMembersID = array_map(function ($member) {
            return $member['user_id'];
        }, $projectMembers);

        $managers = UserService::getUserByRole([2]);
        $members = UserService::getUserByRole([2, 3, 4]);
        return view('projects.add', [
            'managers' => $managers,
            'project' => $project,
            'projectMembersID' => $projectMembersID,
            'members' => $members
        ]);
    }

    public function update(Project $project, UpdateProjectRequest $request)
    {
        // update project
        $project['name'] = $request['name'];
        $project['description'] = $request['description'];
        $project['manager_id'] = $request['manager_id'];
        $project['start_date'] = date("Y/m/d 08:00:00", strtotime($request['start_date']));;
        $project['end_date'] = date("Y/m/d 17:00:00", strtotime($request['end_date']));;
        $project->save();

        // delete member of project
        ProjectMember::where('project_id', $project['id'])->delete();

        // update member
        if (!empty($request['user_id'])) {
            foreach ($request['user_id'] as $user_id) {
                $projectMember = [
                    'user_id' => $user_id,
                    'project_id' => $project['id']
                ];
                ProjectMember::insert($projectMember);
            }
        }

        return redirect(route('projects.index'))->with('status', 'Project Updated!');
    }

    public function destroy(Project $project)
    {
        $project->delete();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        $project = $project->with('guides')->first();
        $guideMembers = $project->guideMember;
        return view('projects.show', compact('project', 'guideMembers'));
    }

    /**
     * @param Request $request
     *
     * @return JsonResponse
     * @throws AuthorizationException
     */
    public function quickUpdate(Request $request): JsonResponse
    {
        $user = \Auth::user();
        $type = $request->input('type');
        $value = $request->input('value');
        $guideId = $request->input('guide_id');
        $projectId = $request->input('project_id');
        $userId = $user->id;
        $result = GuideMember::where('guide_id', $guideId)->where('project_id', $projectId)->where('user_id', $userId)->first();
        if ($result) {
            $result->{$type} = $value;
            if ($result->save()) {
                return response()->json(['status' => 1]);
            }
        } else {
            GuideMember::create([
                'guide_id' => $guideId,
                'project_id' => $projectId,
                'user_id' => $userId,
                $type => $value
            ]);
            return response()->json(['status' => 1]);
        }

        return response()->json(['status' => 0]);
    }
}
