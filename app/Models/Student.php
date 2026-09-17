<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Table;
use Illuminate\Database\Eloquent\Model;

#[Table('students')]
class Student extends Model
{
    // protected $table = 'students'; sama kayak #[Table('students')]
    // untuk menandakan bahwa table tersebut adalah table students. Bisa digunakan saat nama DB nya beda dengan Modelnya. Misal table nya bernama student_data, maka bisa ditulis protected $table = 'student_data';
    protected $fillable = ['nis', 'name', 'class', 'major'];
}
