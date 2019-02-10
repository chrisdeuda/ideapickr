<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Topics;
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
    /**
     * Store a new user.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request){

        /**
         * @TODO Add validations of inputs
         */
        $input = $request->all();
        $user_id = 1;
        $Topic = Topics::create($input);

        return response()->json([
            'success' => true,
            'id' => $Topic->id ,
        ]);
    } 
}
