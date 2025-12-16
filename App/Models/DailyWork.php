<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DailyWork extends Model
{
    protected $fillable = [
        'employee_id',
        'date',
        'project_name',
        'assign_date',
        'deadline',
        'today_task',
        'file'
    ];
}
