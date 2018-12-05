<?php

namespace Pndata\iRaiser\Tests;

use PHPUnit\Framework\TestCase;
use Pndata\iRaiser\Client as iRaiser;

class Test extends TestCase
{

    public function testQueryWithDonations()
    {

        $iraiser = new iRaiser('ssvp_api', '4Oz8oMmP');

        $query = $iraiser
            ->contacts()
            ->fromDate('2017-11-28')
            ->toDate('2017-12-01')
            ->page(1)
            ->limit(50)
            ->withDonations();

        try {
            $contacts = $query->get();
        }

        catch(\Exception $e) {
            echo $e->getMessage();
        }

        $this->assertTrue(count($contacts) > 0);

    }

}

?>
