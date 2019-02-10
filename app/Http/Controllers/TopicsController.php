<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Topic;
use App\User;


class TopicController extends Controller
{
    
    public function index(){

        $user_id = 1;
        $User = User::findOrFail($user_id);
        return response()->json([
            'success' => true,
            'Topics' => $User->topics()->get() ,
        ]);
    }


 
}
