<?php
namespace OceanApplications\Postmen;


class Client
{
    private $apiKey = "";
    private $baseUrl = "";


    public function __construct($apiKey, $sandbox = false)
    {
        $this->$apiKey = $apiKey;

        if ($sandbox == true) {
            $this->baseUrl = 'https://sandbox-api.postmen.com/v3/';
        } else {
            $this->baseUrl = 'https://production-api.postmen.com/v3/';
        }
    }

    public function createLabel(Label $label)
    {
        return $this->sendRequest($label, 'labels');
    }


    private function sendRequest($data, $endpoint){
        $method = 'POST';
        $headers = array(
            "content-type: application/json",
            "postmen-api-key: ".$this->apiKey
        );
        $body = json_encode($data);

    //'{"async":false,"billing":{"paid_by":"shipper"},"return_shipment":false,"is_document":false,"service_type":"bluedart_dart_apex","paper_size":"default","shipper_account":{"id":"00000000-0000-0000-0000-000000000000"},"invoice":{"date":"2015-09-21"},"references":[],"shipment":{"ship_from":{"contact_name":"Jameson McLaughlin","company_name":"Bode, Lind and Powlowski","email":"jameson@yahoo.com","phone":"12345678910","street1":"8918 Borer Ramp","city":"Nord-Trøndelag","state":"CA","postal_code":"560084","country":"IND","type":"business"},"ship_to":{"contact_name":"Dr. Moises Corwin","phone":"12345678910","email":"Giovanna42@yahoo.com","street1":"28292 Daugherty Orchard","city":"Bangalore","postal_code":"560084","state":"CA","country":"IND","type":"residential"},"parcels":[{"description":"Food XS","box_type":"custom","weight":{"value":2,"unit":"kg"},"dimension":{"width":20,"height":40,"depth":40,"unit":"cm"},"items":[{"description":"Food Bar","origin_country":"USA","quantity":2,"price":{"amount":3,"currency":"USD"},"weight":{"value":0.6,"unit":"kg"},"sku":"imac2014"}]}]}}';

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_URL => $this->baseUrl.$endpoint,
            CURLOPT_CUSTOMREQUEST => $method,
            CURLOPT_HTTPHEADER => $headers,
            CURLOPT_POSTFIELDS => $body
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            return $response;
        }
    }
}