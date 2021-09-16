<?php

namespace App\SNCF_API;

class SNCFApi {
	private Pipe $pipe;

	public function __construct()
	{
		$this->pipe = new Pipe();
	}
}