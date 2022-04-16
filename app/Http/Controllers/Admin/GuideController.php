<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Guides;
use App\Models\Project;
use App\Models\Role;
use Illuminate\Http\Request;

class GuideController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $guides = Guides::orderByDesc('id')->paginate(10);
        return view('guides.index', compact('guides'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('guides.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $guide = new Guides();
        $guide->name = $request->get('name');
        $guide->filename = $request->get('filename');
        $guide->description = $request->get('description');
        $guide->project_id = $request->get('project');
        $guide->roles = $request->get('role');
        $guide->save();
        return redirect()->route('guides.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Guides  $guides
     * @return \Illuminate\Http\Response
     */
    public function show(Guides $guides)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $guide = Guides::where('id', $id)->first();
        $projects = Project::all();
        $roles = Role::all();
        return view('guides.edit', compact('guide', 'projects', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $guide = Guides::where('id', $id)->first();
        $guide->name = $request->get('name');
        $guide->filename = $request->get('filename');
        $guide->description = $request->get('description');
        $guide->project_id = $request->get('project');
        $guide->roles()->sync([$request->get('role')]);
        $guide->save();
        return redirect()->route('guides.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $guide = Guides::find($id)->delete();
        return redirect()->route('guides.index');
    }
}
