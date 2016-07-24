<?php

	namespace App\Api;

	class OpenWeather
	{
		public static function getWeather($city = 'Odessa')
		{
			$result = json_decode(self::request($city));
			return $result->main;
		}

		protected static function request($city)
		{
			return file_get_contents(env('OPEN_WEATHER_URL') . $city . '&appid=' . env('OPEN_WEATHER_API_KEY'));
		}
	}