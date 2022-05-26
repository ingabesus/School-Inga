<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class attendanceGroup extends Model
{
    use HasFactory;
    public function getStudentGroup() {
        return $this->belongsTo(Group::class, 'group_id','id');
    }

    public function getStudent() {
        return $this->belongsTo(Student::class, 'student_id','id');
    }
}
