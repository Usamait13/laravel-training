<?php

namespace App\Models;

use App\Models\Worker\Worker;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
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


    public function courses(): Hasmany
    {
        return $this->hasMany(Course::class,"teacher_id");
    }

}
