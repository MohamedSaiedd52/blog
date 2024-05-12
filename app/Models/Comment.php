<?php

namespace App\Models;

use App\Models\User;
use App\Models\CommentReply;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comment extends Model
{
    use HasFactory;
    protected $table = 'comment_replies'; // Specify the correct table name

    protected $fillable = [
        'user_id',
        'post_id',
        'comment',
        'approved',
    ];


    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function commentReply()
    {
        return $this->hasMany(CommentReply::class);
    }



}
