<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Repositories\TopicRepositoryInterface;

use App\Models\Topic;
use App\User;

class TopicsController extends Controller
{
    protected $topic;
    /**
     * TopicController constructor.
     * 
     * @param TopicRepositoryInterface $topic
     * 
     */

     public function __construct(TopicRepositoryInterface $topic){
         $this->topic = $topic;
     }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = 1;
        return response()->json([
            'success' => true,
            'topics' => $this->topic->findBy('user_id', $user_id),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /**
         * @TODO Add validations of inputs
         */
        $input = $request->all();
        $user_id = 1;
        $topic_id = $this->topic->save( $input);
        return response()->json([
            'success' => true,
            'id' => $topic_id ,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
