<?php

// app/Models/CompanyPolicy.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyPolicy extends Model
{
    use HasFactory;

    // Add fillable properties
    protected $fillable = [
        'title',
        'file_path',
    ];
}
