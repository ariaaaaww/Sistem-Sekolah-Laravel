<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = 'students';

    protected $fillable = [
        'nis',
        'name',
        'gender',
        'class',
        'major',
    ];

    use \Illuminate\Database\Eloquent\Factories\HasFactory;
}
