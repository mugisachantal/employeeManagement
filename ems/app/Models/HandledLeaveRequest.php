<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HandledLeaveRequest extends Model
{

    protected $table='handled_leave_requests';
    protected $fillable = ['employee_id', 'start_date', 'end_date', 'reason', 'status','acknowledgement_status'];
}
