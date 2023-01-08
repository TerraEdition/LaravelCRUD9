<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentHobbyModel extends Model
{
    use HasFactory;
    protected $table = "student_hobby";
    public $timestamps = false;
}
