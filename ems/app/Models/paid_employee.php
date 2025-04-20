<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class paid_employee extends Model
{
    use HasFactory;

    protected $table = 'paid_employees'; 
    protected $fillable = [
        'name',
        'salary',
        'email'
        ];
}
