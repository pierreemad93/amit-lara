<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommentReply extends Model
{
    use HasFactory;
    protected $fillable = ['reply' , 'replier' , 'comment_id' , 'post_id'];

    public function comment(){
        return $this->belongsTo(PostComment::class , 'comment_id' , 'id');
    }
}
