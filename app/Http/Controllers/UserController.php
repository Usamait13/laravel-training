<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function register():JsonResponse
    {
        return $this->success("Success",true,"Ok");
    }
}
