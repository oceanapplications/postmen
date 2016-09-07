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
        $client = new Client($this->api_key);

        $item = new Item();
        $item->description('description')->quantity(1)->price(new Money(100, 'INR'))->weight(new Weight("1",'lb'));

        $parcel = new Parcel();
        $parcel->box_type('custom')->dimension(new Dimension("4",4,4,"cm"))->items($item)->description('descr')->weight(new Weight(2, 'lb'));

        $fromAddress = new Address();
        $fromAddress->city('New Delhi')->company_name('company India')->country('IND')->contact_name('Name')->street1('street1')
            ->postal_code('110045')->state('Delhi')->phone('9654444444');
        $toAddress = new Address();
        $toAddress->city('New Delhi')->company_name('company India')->country('IND')->contact_name('Name')->street1('street1')
            ->postal_code('110045')->state('Delhi')->phone('9654444444');

        $shipment = new Shipment();
        $shipment->ship_from($fromAddress);
        $shipment->ship_to($toAddress);
        $shipment->parcels(array($parcel));


        $label = new Label();
        $label->service_type('bluedart_surface')->shipper_account($this->shipper_id)
            ->shipment($shipment)->invoice(new Invoice())->COD(new Money("100", 'INR'));

        $response = $client->createLabel($label);
var_dump($response);
        $this->assertTrue(true);
    }



}