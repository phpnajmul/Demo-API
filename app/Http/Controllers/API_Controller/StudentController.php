<?php

namespace App\Http\Controllers\API_Controller;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    public function view(){
        $studentData = Student::all();
        return $studentData;
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required|max:255',
            'class' => 'required',
            'roll' => 'required|unique:students',
            'mobile' => 'required|unique:students'
        ]);

        $data = new Student();
        $data->name = $request->name;
        $data->class = $request->class;
        $data->roll = $request->roll;
        $data->mobile = $request->mobile;
        $data->address = $request->address;
//        $data->added_by = Auth::user()->id;
        $data->save();

        return response()->json([
            'message' => 'Student inserted successfully!'
        ], 201);
    }

    public function update(Request $request, $id){
        $data = Student::find($id);
        $request->validate([
            'name' => 'required|max:255',
            'class' => 'required',
            'roll' => 'required|unique:students,roll,'.$data->id,
            'mobile' => 'required|unique:students,mobile,'.$data->id,
        ]);

        $data->name = $request->name;
        $data->class = $request->class;
        $data->roll = $request->roll;
        $data->mobile = $request->mobile;
        $data->address = $request->address;
//        $data->added_by = Auth::user()->id;
        $data->save();

        return response()->json([
            'message' => 'Student updated successfully!'
        ], 202);

    }



    public function delete($id){

        $data = Student::find($id);

        $data->delete();
        return response()->json([
            'message' => 'Student removed successfully!'
        ], 203);

    }



    public function message(){
        return response()->json([
            "message" => "I am message"
        ]);
    }








}
