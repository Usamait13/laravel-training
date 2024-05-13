<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Teacher extends Authenticatable
{
    use HasFactory;

    protected $fillable=[
        "name",
        "email",
        "cnic",
        "phone",
        "address",
        "degree",
        "profile_pic",
        "is_deleted",
        "status",
        "password",
    ];

    protected $hidden = [
      "password"
    ];
}
