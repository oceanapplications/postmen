<?php

use OceanApplications\Postmen\Client;
use OceanApplications\Postmen\Requests\Label;
use OceanApplications\Postmen\Models\Shipment;
use OceanApplications\Postmen\Models\Address;
use OceanApplications\Postmen\Models\Parcel;
use OceanApplications\Postmen\Models\Item;
use OceanApplications\Postmen\Models\Money;
use OceanApplications\Postmen\Models\Weight;
use OceanApplications\Postmen\Models\Dimension;
use OceanApplications\Postmen\Models\Invoice;
use PHPUnit\Framework\TestCase;



class ClientTest extends TestCase {

    //API KEY from postmen.com
    private $api_key = "";
    //SHIPPER ID from postmen.com
    private $shipper_id = "";

    protected function setUp(){
        $dotEnv = new Dotenv\Dotenv(__DIR__);
        $dotEnv->load();

        $this->api_key = $_ENV['API_KEY'];
        $this->shipper_id = $_ENV['SHIPPER_ID'];
    }

    public function testLabel()
    {
        $client = new Client($this->api_key, true);

        $item = new Item();
        $item->description('description')->quantity(1)->price(new Money(100, 'USD'))->weight(new Weight(10,'lb'));

        $parcel = new Parcel();
        $parcel->box_type('custom')->dimension(new Dimension(4,4,4,"cm"))->items($item)->description('descr')->weight(new Weight(12, 'lb'));

        $fromAddress = new Address();
        $fromAddress->city('city')->company_name('company_name')->country('IND')->contact_name('c_name')->street1('street1')
            ->postal_code('10016')->state('NY');
        $toAddress = new Address();
        $toAddress->city('city')->company_name('company_name')->country('IND')->contact_name('c_name')->street1('street2')
            ->postal_code('10016')->state('NY');

        $shipment = new Shipment();
        $shipment->ship_from($fromAddress);
        $shipment->ship_to($toAddress);
        $shipment->parcels(array($parcel));


        $label = new Label();
        $label->service_type('bluedart_surface')->shipper_account($this->shipper_id, '3777')
            ->shipment($shipment)->invoice(new Invoice());//->COD(new Money(100, 'USD'));

        $response = $client->createLabel($label);
        var_dump($response);

        $this->assertTrue(true);
    }



}