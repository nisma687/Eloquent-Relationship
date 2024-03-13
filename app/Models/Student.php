<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'class',
        'roll',
    ] ;
    public function detail(){
        return $this->hasOne(Student_Detail::class,'student_id','id');
    }
    public function courses()
    {
        return $this->belongsToMany(Course::class, 'student_courses');
        // the pivot table is student_courses
    }
}
