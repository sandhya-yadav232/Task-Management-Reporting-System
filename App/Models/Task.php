<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
  protected $fillable = [
    'employee_id',
    'project_name',
    'assign_date',
    'deadline',
    'task_details',
    'status',

];


    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

}