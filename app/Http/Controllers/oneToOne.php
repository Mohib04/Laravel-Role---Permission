<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class oneToOne extends Controller
{
   public function one_to_one(){
        $profile = Profile::find(32);
        $user = $profile->user;
        dd($user);
        // $user = $profile->user;
        // dd($user);
   
    }

    public function user_has_many_post(){
        $user_posts = DB::select("
            SELECT 
            title, content
            FROM posts p
            JOIN users u ON p.user_id = u.id
            LIMIT 20
        ");
        dd($user_posts);
   
    }
}
