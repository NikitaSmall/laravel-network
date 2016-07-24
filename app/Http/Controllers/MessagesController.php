<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Repositories\MessageRepository;

use App\User;
use App\Message;

class MessagesController extends Controller
{
	protected $messageRepository;

    public function __construct()
    {
    	$this->middleware('auth');
    	$this->messageRepository = new MessageRepository();
    }

    public function new_message(Request $request)
    {
    	$user = User::find($request->id);
    	return view('messages.new', [
    			'user' => $user,
    		]);
    }

    public function messages_from(Request $request)
    {
    	$messages = $this->messageRepository->messages_from($request->user());
    	return view('messages.from', [
    			'messages' => $messages,
    		]);
    }

    public function messages_to(Request $request)
    {
    	$messages = $this->messageRepository->messages_to($request->user());
    	return view('messages.to', [
    			'messages' => $messages,
    		]);
    }

    public function submit_message(Request $request)
    {
    	/*
			Validate
    	*/

		Message::create([
				'user_id' => $request->user()->id,
				'rec_id' => $request->id,
				'body' => $request->body,				
			]);

		return redirect('/home');
    }

    public function read_message(Request $request)
    {
    	$message = Message::find($request->id);
    	$message->read();

    	return redirect('/messages/to');
    }
}
