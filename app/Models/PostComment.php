<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostComment extends Model
{
    use HasFactory; 
    protected $table = 'comments';
    protected $fillable = [
        'comment' , 'commenter' , 'user_id' , 'post_id' 
    ];


}
