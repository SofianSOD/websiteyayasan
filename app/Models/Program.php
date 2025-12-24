<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory;

    protected $fillable = [
        'category',
        'title',
        'slug',
        'description',
        'price',
        'duration',
        'image',
        'is_active',
    ];

    public function admissions()
    {
        return $this->hasMany(Admission::class);
    }
}
