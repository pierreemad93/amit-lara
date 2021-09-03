<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Role extends Model
{
    use HasFactory;
    protected $fillable= ['role_name'];
    public $timestamps = false;

    public function user(){
        return $this->hasMany(User::class , 'role_id' , 'id');
    }
}
