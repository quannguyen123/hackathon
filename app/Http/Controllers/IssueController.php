<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Issue;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class IssueController extends Controller
{
    public function index()
    {    
        $issues = Issue::orderByDesc('id')->paginate();

        return view('issues.index', compact('issues'));
    }

    public function create()
    {
        $user = \Auth::user();
        $projects = $user->projects()->get();
        
        return view('issues.create', compact('projects'));
    }

    public function store(Request $request)
    {
        $data = [
            'name'   => $request->title,
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
        
        return view('issues.edit', compact('issue'));
    }

    public function update(Request $request, $id)
    {
        $data = [
            'name'   => $request->title,
            'description' => $request->description,
            'project_id'  => $request->project_id,
            'private' => $request->private,
        ];
        Issue::find($id)->update($data);
        
        return redirect()->back()->with('success', __('Updated success'));
    }

    public function delete($id)
    {

    }
}
