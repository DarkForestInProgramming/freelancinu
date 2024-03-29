<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subsubcategory extends Model
{
    protected $fillable = ['name', 'subcategory_id'];

    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class);
    }
    
    public function posts() {
        return $this->hasMany(Post::class);
    }

}
