<?php

namespace App\Http\Controllers;

use App\Models\student;
use App\Models\group;
use App\Models\attendanceGroup;
use App\Models\project;
use App\Http\Controllers\AttendanceGrpup;
use App\Http\Requests\StorestudentRequest;
use App\Http\Requests\UpdatestudentRequest;

use Illuminate\Http\Request;
use Validator;


class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::all();
        $groups = Group::all();
        
        return view('student.index',[
            'groups' =>$groups,
            
            'students' => $students,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $projects = Project::all();
        
        return view('student.create', ['projects'=>$projects]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorestudentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            
        
        $student = new Student;
        $student->name = $request->student_name;
        $student->save();
        
        $attendanceGroup = new AttendanceGroup;
        $attendanceGroup->project_id = $request->project_id;
        $attendanceGroup->student_id = $student->id;
        
        $attendanceGroup->save();
    
        return redirect()->route('project.index'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatestudentRequest  $request
     * @param  \App\Models\student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatestudentRequest $request, student $student)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(student $student)
    {
        

       $student->delete();
            return redirect()->route('project.index')->with('success_message','Record removed success!');

    }

    public function loadDataFromApi() {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "http://127.0.0.1:8000/api/students?csrf=123456789&studentsAll=all",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_TIMEOUT => 30000,//ms
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json',
            ),
    ));
    }
}
