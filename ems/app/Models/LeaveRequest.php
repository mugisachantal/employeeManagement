<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Prompts\Table;

class LeaveRequest extends Model
{
    //use HasFactory;
protected $table ='leave_requests';
    protected $fillable = ['employee_id', 'start_date', 'end_date', 'reason', 'status'];

    public function employee()
    {
        return $this->belongsTo(User::class, 'employee_id');
    }
}
