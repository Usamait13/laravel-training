<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Couchbase\RegexpSearchQuery;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class TeacherController extends Controller
{
    //

    public function register(Request $request)
    {
        $data = $request->validate([
           "name"=>"required",
           "email"=>"required|email|unique:teachers,email",
           "cnic"=>"required|unique:teachers,cnic",
           "phone"=>"required|unique:teachers,phone",
           "address"=>"required",
           "degree"=>"required",
           "password"=>"required",
        ]);

        $data["password"]=Hash::make($data["password"]);

        $teacher = Teacher::create($data);
        Auth::guard("teacher")->login($teacher);

        return $this->success($teacher,true,"Teacher Register Successfully");
    }

    public function login(Request $request):JsonResponse
    {
        $credentials =$request->validate([
            "email"=>"required",
            "password"=>"required",
        ]);

        if(Auth::guard("teacher")->attempt($credentials)){
            $teacher = Teacher::where("email",$credentials["email"])->first();
            return $this->success($teacher,true,"Login Successfully");
        }else{
            return    $this->error("Invalid Credentials");
        }

    }

    public function teacher(Request $request)
    {
        $request->fullUrlWithQuery([
            "teacher_id"=>"required",
        ]);

        $teacher = Teacher::where("id",$request->teacher_id)->first();

        return $this->success($teacher,true,"Successfully");
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            "id"=>"required",
            "name"=>"required",
            "email"=>"required|email|unique:teachers,email",
            "cnic"=>"required|unique:teachers,cnic",
            "phone"=>"required|unique:teachers,phone",
            "address"=>"required",
            "degree"=>"required",
        ]);

        $teacher = Teacher::where("id",$data["id"])->update([
            "name"=>$data["name"],
            "email"=>$data["email"],
            "cnic"=>$data["cnic"],
            "phone"=>$data["phone"],
            "address"=>$data["address"],
            "degree"=>$data["degree"],
        ]);

        return $this->success($teacher,true,"Teacher Updated Successfully");
    }

    public function delete(Request $request)
    {
        $request->fullUrlWithQuery([
            "teacher_id"=>"required",
        ]);

        $teacher = Teacher::where("id",$request->teacher_id)->delete();

        return $this->success($teacher,true,"Deleted");
    }


}
