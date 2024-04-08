<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeProfile extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'address',
        'employee_id',
        'emp_code',
        'department_id',
    ];
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    public function department(){
        return $this->belongsTo(Department::class);
    }
}
