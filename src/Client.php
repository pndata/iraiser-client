<?php

namespace Pndata\iRaiser;

class Client {

	const HASH_MD5 = 1;
	const HASH_SHA1 = 2;

	private $hash_type = self::HASH_MD5;
	private $user_agent = 'pn/iraiser-client/1.0';
	private $api_endpoint = 'http://data.iraiser.eu';
	private $api_username;
	private $api_key;
	private $http;

	public function __construct($api_username, $api_key) {
		$this->api_username = $api_username;
		$this->api_key = $api_key;
		$this->http = new \GuzzleHttp\Client([
			'base_uri' => $this->api_endpoint
		]);
	}

	public function setHashType($type) {
		$this->hash_type = $type;
	}

	public function formatResponse($response) {
		return json_decode($response->getBody(), true);
	}

	public function makeRequest($method, $uri, array $args = []) {

		$time = time();
		$str = $this->api_username . $this->api_key . $time;

		if($this->hash_type == self::HASH_MD5) {
			$token = md5($str);
		} else if($this->hash_type == self::HASH_SHA1) {
			$token = sha1($str);
		} else {
			throw new \Exception('Hash not supported');
		}

		$args['headers'] = [
			'userAgent' 	    => $this->user_agent,
			'secureLogin'     => $this->api_username,
      'secureToken'     => $token,
      'secureTimestamp' => $time,
			'Accept'		  		=> 'application/json'
		];

		//try {
			$response = $this->http->request($method, $this->api_endpoint . $uri, $args);
			return $this->formatResponse($response);
		//}

		//catch (\GuzzleHttp\Exception\RequestException $e) {
		//	if($e->getCode() == 403) {
				
		//	}
		//}

	}

	public function contact($email) {
		return new ContactRequestBuilder($this, $email);
	}

	public function contacts() {
		return new ContactsRequestBuilder($this);
	}

}
