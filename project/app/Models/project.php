<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class project extends Model
{
    use HasFactory;
    public function getGroup() {
        dd($this);
        return $this->belongsTo(AttendanceGroup::class, 'group_id','id');
    }

    public function getAllGroups() {
        return $this->hasMany(Group::class, 'id','project_id');
    }
}
