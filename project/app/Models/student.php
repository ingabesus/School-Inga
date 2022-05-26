<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class student extends Model
{
    use HasFactory;
    public function getProjectGroup() {
        return $this->belongsTo(AttendanceGroup::class, 'student_id','id');
    }
    public function getStudentGroup() { 
       return $this->belongsTo(AttendanceGroup::class, 'id','student_id');
     
    }
}
