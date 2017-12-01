<?php

namespace Pndata\iRaiser;

class RequestBuilder {

  protected $method = 'GET';
  protected $uri;
  protected $uriParams = [];
  protected $client;
  protected $args = [];
  protected $request = [];
  protected $selectors = [];

  public function __construct($client, array $args = []) {
    $this->client = $client;
    $this->args = $args;
  }

  public function setUri($uri) {
    $this->uri = $uri;
  }

  public function setMethod($method) {
    $this->method = $method;
  }

  public function uriParam($name, $value) {
    $this->uriParams[$name] = $value;
  }

  public function makeUriParams() {
    $uri = '';
    foreach($this->uriParams as $key => $value) {
      $uri .= '/' . $key . '/' . $value;
    }
    return $uri;
  }

  public function addSelector($value) {
    $this->selectors[] = $value;
    return $this;
  }

  public function withDonations() {
    $this->addSelector('DONATIONS');
    return $this;
  }

  public function withLastDonation() {
    $this->addSelector('LAST_DONATION');
    return $this;
  }

  public function withLast3Donations() {
    $this->addSelector('LAST_3_DONATIONS');
    return $this;
  }

  public function withInteractions() {
    $this->addSelector('INTERACTIONS');
    return $this;
  }

  public function withFirstInteraction() {
    $this->addSelector('FIRST_INTERACTION');
    return $this;
  }

  public function withLastInteraction() {
    $this->addSelector('LAST_INTERACTION');
    return $this;
  }

  public function withFlags() {
    $this->addSelector('FLAGS');
    return $this;
  }

  public function get() {
    $uri = $this->uri . $this->makeUriParams() . '/';
    if(count($this->selectors)) {
      $uri .= '?selector=' . implode($this->selectors, ',');
    }
    return $this->client->makeRequest($this->method, $uri, $this->request);
  }

}
