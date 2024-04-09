<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeProfile extends Model
{
    use HasFactory;
    protected $fillable = [
        'employee_id',
        'email',
        'address',
        'emp_code',
    ];
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    public function employee() {
        return $this->belongsTo(Employee::class);
    }
}
