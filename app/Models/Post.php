<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Post extends Model
{
    use Searchable;
    use HasFactory;
    protected $fillable = [
        'title',
        'body',
        'user_id',
        'category_id',
        'subcategory_id',
        'subsubcategory_id',
        'slug',
    ];

    

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class);
    }

    public function subsubcategory()
    {
        return $this->belongsTo(SubSubcategory::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function toSearchableArray() {
        return [
            'title' => $this->title,
            'body' => $this->body,
        ];
    }
}
