<?php

namespace App\Http\Controllers;
use App\MessageModel;
use Illuminate\Http\Request;


class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_receiver)
    {
        $receiver_annonces = \DB::table('users')
        ->where('id', $id_receiver)
        ->orderBy('id_annonce', 'desc')
        ->join('annonces', 'annonces.id_vendor', '=', 'users.id')
        ->get();

        $receiver_name = \DB::table('users')
        ->select('name', 'profile_picture')
        ->where('id', $id_receiver)
        ->get();

        
        return view('message.show', ['receiver_annonces' => $receiver_annonces], ['receiver_name' => $receiver_name]);
    }


    public function sendMessage(Request $request)
    {
        $user = auth()->user();

        $id_sender= auth()->id();
        $id_receiver = $request->id_receiver;
        $request->message;


        $message = $user->messages()->create([
            'message' => $request->input('message')
        ]);

        
        return ['status' => 'Message Sent!'];
    }


    public function fetchMessages()
    {
    return Message::with('user')->get();
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
