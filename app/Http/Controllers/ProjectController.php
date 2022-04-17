<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service\UserService;
use App\Http\Requests\AddProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\Project;
use App\Models\ProjectMember;

class ProjectController extends Controller
{
    public function index() {
        $projects = Project::with('user')->paginate(2);
        return view('project.list', [
            'projects' => $projects
        ]);
    }

    public function create() {
        $managers = UserService::getUserByRole(2);
        $members = UserService::getUserByRole();
        return view('project.add', [
            'managers' => $managers,
            'members' => $members,
        ]);
    }

    public function store(AddProjectRequest $request) {
        $project = $request->all();
        $project['start_date'] = date("Y/m/d 08:00:00", strtotime($project['start_date']));
        $project['end_date'] = date("Y/m/d 17:00:00", strtotime($project['end_date']));
        
        $projectData = Project::create($project);

        foreach($project['user_id'] as $user_id) {
            $projectMember = [
                'user_id' => $user_id,
                'project_id' => $projectData['id']
            ];
            ProjectMember::insert($projectMember);
        }

        return redirect(route('project-index'));
    }

    public function edit(Project $project) {
        $projectMembers = ProjectMember::select('user_id')->where('project_id', $project['id'])->get()->toArray();
        $projectMembersID = array_map(function($member) {
            return $member['user_id'];
        }, $projectMembers);

        $managers = UserService::getUserByRole(2);
        $members = UserService::getUserByRole();
        return view('project.add',[
            'managers' => $managers,
            'project' => $project,
            'projectMembersID' => $projectMembersID,
            'members' => $members
        ]);
    }

    public function update(Project $project, UpdateProjectRequest $request) {
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
            foreach($request['user_id'] as $user_id) {
                $projectMember = [
                    'user_id' => $user_id,
                    'project_id' => $project['id']
                ];
                ProjectMember::insert($projectMember);
            }
        }

        return redirect(route('project-index'));
    }

    public function destroy(Project $project) {
        $project['deleted_at'] = date("Y/m/d H:i:s");
        $project->save();

        ProjectMember::where('project_id', $project['id'])->delete();
        return redirect(route('project-index'));
    }
}
