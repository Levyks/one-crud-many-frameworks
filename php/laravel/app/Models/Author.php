<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    /**
     * Mass assignable attributes.
     *
     * @var string[]
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'city_of_birth',
        'country_of_birth',
        'date_of_birth'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'date_of_birth' => 'datetime:Y-m-d',
    ];

    /**
     * The books written by that author.
     */
    public function books() {
        return $this->belongsToMany(Book::class)->orderBy('title');
    }

    public function fullName() {
        return $this->first_name . ' ' . $this->last_name;
    }

    public function bornIn() {
        return $this->city_of_birth . ', ' . $this->country_of_birth . ' - ' . $this->date_of_birth->format('d/m/Y');
    }
}
