<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnpaidEmployee extends Model
{  use HasFactory;

    protected $table = 'unpaid_employees'; 
    protected $fillable = [
        'name',
        'salary',
        ];
}
