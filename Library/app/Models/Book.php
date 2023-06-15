<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'isbn',
        'title',
        'author',
        'published_date',
        'description',
        'price'
    ];

    /**
     * Get the categories for the book.
     */
    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
}

