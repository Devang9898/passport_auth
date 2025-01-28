<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Student;


class StudentController extends Controller
{
    //
    function list()
    {
        return Student::all();
    }

    function addStudent(Request $request)
    {
        // return "add student method";
        // return $request->input();
        $student = new Student();
        $student->name=$request->name;
        $student->email=$request->email;
        $student->phone=$request->phone;

        if($student->save())
        {
            return ["result"=>"Student Added"];
        }
        return ["result"=>"Operation Failed"];

    }
    function updateStudent(Request $request)
    {
        // return "add student method";
        // return $request->input();
        $student = Student::find($request->id);
        $student->name=$request->name;
        $student->email=$request->email;
        $student->phone=$request->phone;

        if($student->save())
        {
            return ["result"=>"Student updated"];
        }
        return ["result"=>"Operation Failed"];
        
    }
    
    
    function deleteStudent($id)
    {
        $student = Student::destroy($id);
        if($student)
        {
            return ['result' => 'Student deleted'];
        }
        return ["result"=>"Operation Failed"];

    }
}
