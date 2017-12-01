<?php

namespace Pndata\iRaiser\Tests;

use Pndata\iRaiser\Client as iRaiser;

class Test extends \PHPUnit_Framework_TestCase {

  public function testQueryWithDonations() {

    $iraiser = new iRaiser('ssvp_api', '4Oz8oMmP');

    $query = $iraiser
              ->contacts()
              ->withDonations()
              ->fromDate('2017-11-28')
              ->toDate('2017-12-01');

    $contacts = $query->get();

    $this->assertTrue(count($contacts) > 0);

  }

}
?>
