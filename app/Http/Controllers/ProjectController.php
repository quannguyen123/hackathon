<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service\UserService;
use App\Http\Requests\AddProjectRequest;
use App\Models\Project;
use App\Models\ProjectMember;

class ProjectController extends Controller
{
    public function index() {
        $projects = Project::paginate(2);
        // return $projects;
        return view('project.list', [
            'projects' => $projects
        ]);
    }

    public function create() {
        $managers = UserService::getUserByRole(2);
        $developers = UserService::getUserByRole(3);
        return view('project.add', [
            'managers' => $managers,
            'developers' => $developers,
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

        return redirect(route('project-list'));
    }

    public function edit(Project $project) {
        return view('project.add');
    }

    public function update() {
        
    }

    public function destroy() {
        
    }
}
