<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'phone_no',
        'address',
    ];
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];
}
