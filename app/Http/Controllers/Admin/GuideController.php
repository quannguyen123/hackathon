<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Guides;
use App\Models\Project;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GuideController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $guides = Guides::orderByDesc('id')->orderBy('sort_no')->paginate(10);
        return view('guides.index', compact('guides'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $projects = Project::all();
        $roles = Role::all();
        return view('guides.create', compact('projects', 'roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $sort_no = 1;
        foreach ($request->get('name') as $key => $name) {
            $guide = Guides::create([
                'name' => $name,
                'description' => $request->get('description')[$key],
                'project_id' => $request->get('project'),
                'sort_no' => $sort_no,
            ]);
            $guide->roles()->attach([$request->get('role')]);
            $guide->save();
            $sort_no++;
        }

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
     * @param  $project_id
     * @return \Illuminate\Http\Response
     */
    public function edit($project_id)
    {
        $guides = Guides::where('project_id', $project_id)->orderBy('sort_no')->get();
        $projects = Project::all();
        $roles = Role::all();
        return view('guides.edit', compact('guides', 'project_id', 'projects', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  $project_id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $project_id)
    {
        $guideIds = $request->get('guide_id');
        try {
            DB::beginTransaction();
            $sort_no = 1;
            foreach ($request->get('name') as $key => $name) {
                if (isset($guideIds[$key])) {
                    $guide = Guides::find($guideIds[$key])->first();
                    $guide->name = $name;
                    $guide->description = $request->get('description')[$key];
                    $guide->project_id = $project_id;
                    $guide->sort_no = $sort_no;
                    $guide->roles()->sync([$request->get('role')]);
                } else {
                    $guide = Guides::create([
                        'name' => $name,
                        'description' => $request->get('description')[$key],
                        'project_id' => $project_id,
                        'sort_no' => $sort_no,
                    ]);
                    $guide->roles()->attach([$request->get('role')]);
                }
                $guide->save();

                $sort_no++;
            }
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
        }

        return redirect()->route('guides.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  $project_id
     * @return \Illuminate\Http\Response
     */
    public function destroy($project_id)
    {
        $guide = Guides::where('project_id', $project_id)->delete();
        return redirect()->route('guides.index');
    }
}
