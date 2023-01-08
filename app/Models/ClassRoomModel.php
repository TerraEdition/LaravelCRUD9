<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassRoomModel extends Model
{
    use HasFactory;
    protected $table = 'classrooms';
    protected $fillable = ['class', 'teacher_id'];


    public function Student()
    {
        return $this->hasMany(StudentModel::class, 'class_id', 'id');
    }

    public function Teacher()
    {
        return $this->hasOne(TeacherModel::class, 'id', 'teacher_id');
    }
}
