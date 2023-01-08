<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentModel extends Model
{
    use HasFactory;
    protected $table = 'students';
    protected $fillable = ['student', 'gender', 'nis', 'class_id'];

    public function ClassRoom()
    {
        return $this->hasOne(ClassRoomModel::class, 'id', 'class_id');
    }

    public function Hobby()
    {
        return $this->belongsToMany(HobbyModel::class, 'student_hobby', 'student_id', 'hobby_id');
    }
}
