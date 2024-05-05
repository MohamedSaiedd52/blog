<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'status',
        'user_id',
        'category_id',
        'slug',
        'img_file',
        'gallery_id',

    ];



    public function category()
    {
        return $this->belongsTo(Category::class,'category_id');
    }


    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function gallery()
    {
        return $this->belongsTo(Gallery::class);
    }


    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

}

