<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;


    protected $fillable = ['name'];
    public $timestamps = false;





    static public function getCategory()
    {
        return self::select('categories.*')->get();
    }



}
