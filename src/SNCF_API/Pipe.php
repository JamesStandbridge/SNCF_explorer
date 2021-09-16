<?php

namespace App\SNCF_API;

class Pipe {
	
	private static string $domain = "https://ressources.data.sncf.com/api/records/1.0";

	public function url() : string
	{
		return $this->domain;
	}
}