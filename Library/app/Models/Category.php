<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name'
    ];

    /**
     * Get the categories for the book.
     */
    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
}

