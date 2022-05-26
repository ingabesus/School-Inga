<?php

namespace App\Http\Controllers;

use App\Models\project;
use App\Models\group;
use App\Models\student;
use App\Models\attendanceGroup;
use App\Http\Requests\StoreattendanceGroupRequest;
use App\Http\Requests\UpdateattendanceGroupRequest;

use Illuminate\Http\Request;
use Validator;

class AttendanceGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $groups = Group::all();
        $students = Student::all();
        $attendancegroups = AttendanceGroup::all();
        
        return view('attendancegroup.index',[
            'groups' =>$groups,
            'students' =>$students,
            'attendancegroups' =>$attendancegroups
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $attendancegroups = Attendancegroup::all();
        $groups = Group::all();
        $students = Student::all();

        return view('attendancegroup.create', [
            'attendancegroups'=>$attendancegroups,
            'groups' => $groups,
            'students' =>$students,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreattendanceGroupRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        $attendancegroup = new Attendancegroup;
        $attendancegroup->group_id = $request->group_id;
        $attendancegroup->student_id = $request->student_id;
        $attendancegroup->project_id = $request->project_id;

        $attendancegroup->save();
        return redirect()->route('project.index'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\attendanceGroup  $attendanceGroup
     * @return \Illuminate\Http\Response
     */
    public function show(attendanceGroup $attendanceGroup)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\attendanceGroup  $attendanceGroup
     * @return \Illuminate\Http\Response
     */
    public function edit(attendanceGroup $attendanceGroup)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateattendanceGroupRequest  $request
     * @param  \App\Models\attendanceGroup  $attendanceGroup
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {   
       
       $result = attendanceGroup::where('student_id',$request->student_id)
        ->update(['group_id'=>$request->group_id]);
        return redirect()->route('project.show',$request->project_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\attendanceGroup  $attendanceGroup
     * @return \Illuminate\Http\Response
     */
    public function destroy(attendanceGroup $attendanceGroup)
    {
        //
    }
}
