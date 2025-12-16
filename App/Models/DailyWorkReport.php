<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DailyWorkReport extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_id',
        'date',
        'project_name',
        'assign_date',
        'employee_update',
        'file_path',
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
