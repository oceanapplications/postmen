<?php

use OceanApplications\Postmen\Client;
use OceanApplications\Postmen\Requests\Label;


class ClientTest extends PHPUnit_Framework_TestCase {

    public function testLabel()
    {
        $label = new Label();
        $label->service_type('bluedart_surface')->shipper_account('shipper_account_id');

        var_dump(json_encode($label));
        $this->assertTrue(true);
    }

}