<?php

namespace Pndata\iRaiser;

class ContactRequestBuilder extends RequestBuilder {

  protected $method = 'GET';
  protected $uri = '/contact';
  protected $uriParams = [];
  protected $client;
  protected $args = [];
  protected $request = [];

  public function __construct($client, $email) {
    parent::__construct($client);
    $this->setUri($this->uri . '/' . $email);
  }

}

?>
