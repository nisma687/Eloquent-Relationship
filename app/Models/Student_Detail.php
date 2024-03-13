<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student_Detail extends Model
{
    use HasFactory;
    protected $fillable = [
        "Father_name",
        "Mother_name",
    ] ;
    public function student(){
        return $this->belongsTo(Student::class,"student_id","id");
    }
}
