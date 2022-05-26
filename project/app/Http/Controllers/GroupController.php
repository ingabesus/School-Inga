<?php

namespace App\Http\Controllers;

use App\Models\group;
use App\Models\project;
use App\Http\Requests\StoregroupRequest;
use App\Http\Requests\UpdategroupRequest;

use Illuminate\Http\Request;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $groups = Group::all();

        // $groups = Group::with('groups')
        //   ->with('projects')
        //   ->where('projects.id','groups.project_id')
        //   ->get();
     return view('group.index', ['groups' => $groups]);
   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $projects = Project::all(); 
        return view('group.create', ['projects'=>$projects]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoregroupRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $group = new Group;
        $group->title = $request->group_title;
      //  $group->student_number = $request->group_student_number;
      //  $group->project_id = $request->group_project_id;
        

        $group->save();
        return redirect()->route('project.index'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\group  $group
     * @return \Illuminate\Http\Response
     */
    public function show(group $group)
    {
        $groups = Group::all();

        return view('group.show',[
            'group'=>$group,
           
            
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\group  $group
     * @return \Illuminate\Http\Response
     */
    public function edit(group $group)
    {
        return view('group.edit', ['group' => $group]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdategroupRequest  $request
     * @param  \App\Models\group  $group
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, group $group)
    {
        $group->title = $request->group_title;
        $group->student_number = $request->group_student_number;
        $group->project_id = $request->group_project_id;
        

        $group->save();
        return redirect()->route('group.index'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\group  $group
     * @return \Illuminate\Http\Response
     */
    public function destroy(group $group)
    {
        //
    }
}
