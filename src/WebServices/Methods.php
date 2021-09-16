<?php

namespace App\WebServices;

trait Methods {
	public function GET_METHOD() 
	{
		return "GET";
	}

	public function POST_METHOD()
	{
		return "POST";
	}

	public function PUT_METHOD()
	{
		return "PUT";
	}
}