<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $csrf = $request->csrf;
        if(isset($csrf)&& !empty($csrf)&& $csrf=="123456789"){
            $students = Student::all();
            return response()->json($students);
        }
       return response()->json(array(
           'error' => 'Authentification failed'
       ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $student = new Student;
        
        $student->name = $request->student_name;
        $student->surname = $request->student_surname;
        $student->email = $request->student_email;
      
        $student->save();
        
        return response()->json(array(
            'success' => 'Student added',
            'name' => $student->name,
            'surname' =>$student->surname,
        ));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
