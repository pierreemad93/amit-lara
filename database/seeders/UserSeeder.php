<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            array(
                   'name'=> 'admin' ,  
                   'email' => 'admin@info.com' , 
                   'password' => Hash::make('password') ,
                   'role_id' => '1' , 
                   'image' => 'seed-image.jpg' ,
                ),
                array(
                    'name'=> 'Moderator' ,  
                    'email' => 'moderator@info.com' , 
                    'password' => Hash::make('password') , 
                    'role_id' => '2' , 
                    'image' => 'seed-image.jpg' ,
                 ),
                 array(
                    'name'=> 'amit' ,  
                    'email' => 'amit@info.com' , 
                    'password' => Hash::make('password') , 
                    'role_id' => '3' , 
                    'image' => 'seed-image.jpg' ,
                 ),
        ]);
    }
}
