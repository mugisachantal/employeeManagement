<?php



namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vacancy extends Model
{
    use HasFactory;

    // Define the fillable fields (columns that can be mass-assigned)
    protected $fillable = [
        'name',
        'experience',
        'education',
    ];

    // Define the relationship with applications (if there are applicants for this vacancy)
    public function applications()
    {
        return $this->hasMany(Application::class);
    }
}

