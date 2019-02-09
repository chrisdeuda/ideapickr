<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Topic;
use App\User;


class HomeController extends Controller
{
    
    public function index(){

        $User = User::findOrFail(1);
        return response()->json([
            'success' => true,
            'message' => 'API is working correctly.',
            'user' => $User->topics()->get() ,
        ]);
    }
}
