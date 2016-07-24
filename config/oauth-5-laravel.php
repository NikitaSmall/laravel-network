<?php

return [

	/*
	|--------------------------------------------------------------------------
	| oAuth Config
	|--------------------------------------------------------------------------
	*/

	/**
	 * Storage
	 */
	'storage' => '\\OAuth\\Common\\Storage\\Session',

	/**
	 * Consumers
	 */
	'consumers' => [
		'Google' => [
	    'client_id'     => '517349807860-p7r8nss8e4gsa964h65ioo4svcht754s.apps.googleusercontent.com',
	    'client_secret' => 'Czv0knVmpWSVqeRXiFynGZI7',
	    'scope'         => ['userinfo_email', 'userinfo_profile'],
		], 
	]

];