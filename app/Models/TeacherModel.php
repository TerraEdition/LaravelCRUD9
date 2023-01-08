<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TeacherModel extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'teachers';
    protected $fillable = ['teacher'];

    public function ClassRoom()
    {
        return $this->belongsTo(ClassRoomModel::class, 'id', 'teacher_id');
    }
}
