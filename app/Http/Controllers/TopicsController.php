<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;



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
    /**
     * Store a new user.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request){

        
    } 
}
