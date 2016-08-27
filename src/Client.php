<?php
namespace OceanApplications\Postmen;

use OceanApplications\Postmen\Requests\Label;

class Client
{
    private $apiKey = "";
    private $baseUrl = "";


    public function __construct($apiKey, $sandbox = false)
    {
        $this->apiKey = $apiKey;

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

        var_dump($body);
echo "\n";
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_URL => $this->baseUrl.$endpoint,
            CURLOPT_CUSTOMREQUEST => $method,
            CURLOPT_HTTPHEADER => $headers,
            CURLOPT_POSTFIELDS => $body,
            CURLOPT_SSL_VERIFYPEER => false
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