<?php

namespace App\Models;

use App\Models\Post;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;


    protected $fillable = ['name'];
    public $timestamps = false;





    static public function getCategory()
    {
        return self::select('categories.*')->get();
    }




    public function post()
    {
        return $this->hasMany(Post::class,'post_id');
    }
}
