<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;

    // Define the fillable fields (columns that can be mass-assigned)
    protected $fillable = [
        'vacancy_id',
        'name',
        'email',
        'contact',
        'cv',
    ];

    // Define the relationship with vacancy
    public function vacancy()
    {
        return $this->belongsTo(Vacancy::class);
    }
}

