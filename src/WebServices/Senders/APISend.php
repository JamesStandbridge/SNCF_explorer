<?php

namespace App\WebServices\Senders;

interface APISend {


	/**
	 * Make a CURL GET request to an EndPoint
	 * @param  string      $domain  
	 * @param  string      $endpoint 
	 * @param  array|null  $auth  
	 * @param  array       $headers
	 * @return response
	 */
	public function GET(string $domain, string $endpoint, array $auth, array $headers);

	/**
	 * Make a CURL POST request to an EndPoint
	 * @param  string      $domain  
	 * @param  string      $endpoint 
	 * @param  [type]      $body    
	 * @param  array|null  $auth     
	 * @param  array       $headers  
	 * @return $response              
	 */
	public function POST(string $domain, string $endpoint, $body, array $auth, array $headers);

	/**
	 * Make a CURL PUT request to an EndPoint
	 * @param  string      $domain  
	 * @param  string      $endpoint 
	 * @param  [type]      $body    
	 * @param  array|null  $auth     
	 * @param  array       $headers  
	 * @return $response              
	 */
	public function PUT(string $domain, string $endpoint, $body, array $auth, array $headers);

	public function PATCH(string $domain, string $endpoint);

	public function DELETE(string $domain, string $endpoint);
}