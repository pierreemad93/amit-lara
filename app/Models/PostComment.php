<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostComment extends Model
{
    use HasFactory;
    protected $table= 'comment';
    protected $fillable = [
          'comment' ,
          'commenter' , 
          'post_id' , 
          'user_id'
    ]; 


    public function replies(){
        return $this->hasMany(CommentReply::class , 'comment_id' , 'id');
    }
}
