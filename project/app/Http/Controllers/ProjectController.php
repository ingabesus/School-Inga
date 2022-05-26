<?php

namespace App\Http\Controllers;

use App\Models\project;
use App\Models\group;
use App\Models\student;
use App\Models\attendanceGroup;
use App\Http\Requests\StoreprojectRequest;
use App\Http\Requests\UpdateprojectRequest;

use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\DB;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::all();

        return view('project.index', ['projects' => $projects]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $projects = Project::all();
        return view('project.create', ['projects' => $projects]);                        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreprojectRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            $projects = Project::all();
            $project = new Project;
            $project->title = $request->project_title;
            $project->groups_number = $request->project_groups_number;
            $project->students_number = $request->project_students_number;
        
            $project->save();

            for($i=1; $i<=$project->groups_number; $i++ ){
                $group = new Group;
                $group->title = 'Group #'.$i;
               // $group->student_number = $request->project_students_number;
                $group->project_id = $project->id;        
                $group->save();
            }
  
       return redirect()->route('project.index');                        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(project $project)
    {
        $groups = Group::where('project_id','=',$project->id)->get();  
        
               
        $students = Student::join('attendance_groups', 'students.id', '=', 'attendance_groups.student_id')
        ->where('attendance_groups.project_id','=',$project->id)
        
        ->get();

        $attendancegroups = AttendanceGroup::where('project_id',$project->id)->get();

        
        return view('project.show',[
            'project'=>$project,
            'groups' =>$groups,
            'students' =>$students,
            'attendancegroups' => $attendancegroups,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(project $project)
    {
        return view('project.edit', ['project' => $project]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateprojectRequest  $request
     * @param  \App\Models\project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, project $project)
    {
            
            $project->title = $request->project_title;
            $project->groups_number = $request->project_groups_number;
            $project->students_number = $request->project_students_number;
            $project->save();

      
            return redirect()->route('project.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(project $project)
    {
        $groups = $project->getAllGroups; 

        if(count($groups) != 0) {
            return redirect()->route('project.index')->with('error_message', 'Delete is not possible because project has groups');
        }
        
        $project->delete();

        return redirect()->route('project.index')->with('success_message','Record removed success!');
    }
    public function getGroupName($group_id)
    {   
        $group = Group::find($group_id);
        return $group->title;

    }
}