<?php

	namespace App\Repositories;

	use App\Message;
	use App\User;

	class MessageRepository
	{
		public function messages_from(User $user)
		{
			return Message::where('user_id', $user->id)->get();
		}

		public function messages_to(User $user)
		{
			return Message::where('rec_id', $user->id)->get();	
		}
	}