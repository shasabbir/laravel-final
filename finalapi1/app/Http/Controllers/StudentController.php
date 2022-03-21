<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Department;
class StudentController extends Controller
{
    //
    public function getall(){
        $students=Student::all();
        if(!$students){
            return response()->json(["msg"=>"no student found"],500);
        }
        return $students;
    }


    public function create (Request $req){
        try{
        $students= new Student;
        $students->name=$req->name;
        $students->dob=$req->dob;
        $students->d_id=$req->d_id;
        if($students->save()){
            return response()->json(["msg"=>"Created Successfully"],200);
        }
    }
    catch(\Exception $ex){
        return response()->json(["msg"=>"Could not create"],500);
    }
        //return $students;
    }


    public function update (Request $req){
        try{
        $students= Student::where('id','=',$req->id)->first();
        $students->name=$req->name;
        $students->dob=$req->dob;
        $students->d_id=$req->d_id;
        if($students->save()){
            return response()->json(["msg"=>"updated Successfully"],200);
        }
    }
    catch(\Exception $ex){
        return response()->json(["msg"=>"Could not update"],500);
    }
    }


    public function delete (Request $req){
        try{
            if(!(Student::where('id','=',$req->id)->first())){
                return response()->json(["msg"=>"no student with this id"],500);
            }
            Student::where('id', $req->id)->delete();
            return response()->json(["msg"=>"deleted Successfully"],200);
        }
        catch(\Exception $ex){
            return response()->json(["msg"=>"Could not delete"],500);
        }
    }

}
