<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $table = 'teachers';
    protected $fillable = [
        'id',
        'nip',
        'name',
        'gender',
        'subject',
        'phone_number',
        'status',
    ];
    
}
