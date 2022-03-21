<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Student;
use App\Models\Department;
class DeptController extends Controller
{
    //
    public function getall(){
        $departments=Department::all();
        if(!$departments){
            return response()->json(["msg"=>"no department found"],500);
        }
        return $departments;
    }
    public function create (Request $req){
        try{
        $departments= new Department;
        $departments->name=$req->name;
        if($departments->save()){
            return response()->json(["msg"=>"Created Successfully"],200);
        }
    }
    catch(\Exception $ex){
        return response()->json(["msg"=>"Could not create"],500);
    }
    }


    public function update (Request $req){
    try{
        $departments= Department::where('id','=',$req->id)->first();
        if(!$departments){
            return response()->json(["msg"=>"no dept with this id"],500);
        }
        $departments->name=$req->name;
        if($departments->save()){
            return response()->json(["msg"=>"updated Successfully"],200);
        }
    }
    catch(\Exception $ex){
        return response()->json(["msg"=>"Could not update"],500);
    }
    }



    public function delete (Request $req){
        try{
            if(!(Department::where('id','=',$req->id)->first())){
                return response()->json(["msg"=>"no department with this id"],500);
            }
            Department::where('id', $req->id)->delete();
            return response()->json(["msg"=>"deleted Successfully"],200);
        }
        catch(\Exception $ex){
            return response()->json(["msg"=>"Could not delete"],500);
        }
    }


    public function get(Request $req){
        $departments= Department::where('id','=',$req->id)->first();
        if(!$departments){
           return response()->json(["msg"=>"no dept with this id"],500);
        }
        return response()->json(["id"=>$departments->id,"name"=>$departments->name,"students"=>$departments->students],200);
        //return count($departments->students);
    }
}
