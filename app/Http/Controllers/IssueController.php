<?php

namespace App\Http\Controllers;

use App\Http\Requests\IssueRequest;
use App\Models\Issue;

class IssueController extends Controller
{
    public function index()
    {    
        $user = \Auth::user();
        $projects = $user->projects()->pluck('projects.id')->all();
        $issues = Issue::whereIn('project_id', $projects)->orWhere('private', 0)->orderByDesc('id')->paginate();

        return view('issues.index', compact('issues'));
    }

    public function create()
    {
        $members = collect([]);
        $user = \Auth::user();
        $projects = $user->projects()->get();
        foreach ($projects as $project) {
            if ($project->manager_id === $user->id) {
                $users = $project->users()->get();
                $members = $members->merge($users);
            }
        }
        return view('issues.form', compact('projects','members'));
    }

    public function store(IssueRequest $request)
    {
        $data = [
            'name' => $request->name,
            'description' => $request->description,
            'project_id'  => $request->project_id,
            'private' => $request->private,
        ];
        
        Issue::create($data);

        return redirect()->back()->with('success', __('Created success'));
    }

    public function edit($id)
    {
        $issue = Issue::find($id);
        
        return view('issues.form', compact('issue'));
    }

    public function update(IssueRequest $request, $id)
    {
        $data = [
            'name'   => $request->name,
            'description' => $request->description,
            'project_id'  => $request->project_id,
            'private' => $request->private,
        ];
        Issue::find($id)->update($data);
        
        return redirect()->back()->with('success', __('Updated success'));
    }

    public function delete($id)
    {
        Issue::find($id)->delete();
    }
}
