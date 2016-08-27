# Postmen
API wrapper for Postmen.com

###Install with composer

`
composer require oceanapplications/postmen
`

###Create label

```php

//create item
$item = new Item();
$item->description('description')->quantity(1)->price(new Money(100, 'INR'))->weight(new Weight(1,'lb'));

//create parcel
$parcel = new Parcel();
$parcel->box_type('custom')->dimension(new Dimension(4,4,4,"cm"))->items($item)->description('descr')->weight(new Weight(2, 'lb'));

//create from address
$fromAddress = new Address();
$fromAddress->city('New Delhi')->company_name('company India')->country('IND')->contact_name('Name')->street1('street1')
    ->postal_code('110045')->state('Delhi')->phone('9654444444');
    
//create send address
$toAddress = new Address();
$toAddress->city('New Delhi')->company_name('company India')->country('IND')->contact_name('Name')->street1('street1')
    ->postal_code('110045')->state('Delhi')->phone('9654444444');

//create shipment and assign addresses and parcel
$shipment = new Shipment();
$shipment->ship_from($fromAddress);
$shipment->ship_to($toAddress);
$shipment->parcels(array($parcel));

//create label and assign shipment
$label = new Label();
$label->service_type('bluedart_surface')->shipper_account('shipper id from postmen')
    ->shipment($shipment)->invoice(new Invoice())->COD(new Money(100, 'INR'));

//finally create client and send request
$client = new Client('postmen api_key');
$response = $client->createLabel($label);

```
