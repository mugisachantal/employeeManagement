<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SMonthStatus extends Model
{
    /** @use HasFactory<\Database\Factories\SMonthStatusFactory> */
    use HasFactory;

    protected $fillable = [
        'month',
        'status'
       
        ];
}
