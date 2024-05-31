<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    //Array to specify which attributes of the model can be mass-assigned
    use HasFactory;
    protected $fillable = ['title', 'description', 'price', 'max_participants'];

    public function enrollments()
    {
        return $this->hasMany(Enrollment::class);
    }
}
