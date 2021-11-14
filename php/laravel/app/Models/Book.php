<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{    
    
    /**
     * Mass assignable attributes.
     *
     * @var string[]
     */
    protected $fillable = [
        'title',
        'description',
        'published_at'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'published_at' => 'datetime:Y-m-d',
    ];

    /**
     * The authors that have written that book.
     */
    public function authors() {
        return $this->belongsToMany(Author::class)->orderBy('first_name');
    }

    /**
     * The categories of that book.
     */
    public function categories() {
        return $this->belongsToMany(Category::class)->orderBy('name');
    }
}
