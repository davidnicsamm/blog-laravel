<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fileable = [
       'name', 'slug', 'body'
    ];

      
    public function posts(){
        return $this->hasMany(Post::class);
    }
}
