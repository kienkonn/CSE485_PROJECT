<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = ['name', 'author', 'category', 'year', 'quantity'];

    public function borrows()
    {
        
        return $this->hasMany(Borrow::class);
    }
    
    
}
