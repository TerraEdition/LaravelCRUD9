<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HobbyModel extends Model
{
    use HasFactory;
    protected $table = 'hobbies';
    protected $fillable = ['hobby'];

    public function Student()
    {
        return $this->belongsToMany(StudentModel::class, 'student_hobby', 'student_id', 'hobby_id');
    }
}
