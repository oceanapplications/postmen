<?php

namespace OceanApplications\Postmen\Requests;


use OceanApplications\Postmen\Models\Billing;
use OceanApplications\Postmen\Models\Customs;
use OceanApplications\Postmen\Models\Invoice;
use OceanApplications\Postmen\Models\Model;
use OceanApplications\Postmen\Models\Money;
use OceanApplications\Postmen\Models\Shipment;

class Label extends Model
{

    public $paper_size = "default";
    public $service_type;
    public $is_document = false;
    public $shipper_account;
    public $shipment;
    public $async = false;
    public $return_shipment = false;
    public $ship_date;
    public $service_options = null;
    public $invoice;
    public $references;
    public $billing;
    public $customs;

    public function __construct()
    {
        $this->ship_date = date('Y-m-d');
    }


    /**
     * @param string $size
     * @return $this
     */
    public function paper_size($size="default")
    {
        $this->paper_size = $size;
        return $this;
    }

    /**
     * @param $service
     * @return $this
     */
    public function service_type($service)
    {
        $this->service_type = $service;
        return $this;
    }

    /**
     * @param bool $value
     * @return $this
     */
    public function is_document($value=true)
    {
        if ($value == true) {
            $$this->is_document = true;
        } else if ($value == false) {
            $this->is_document = false;
        }
        return $this;
    }

    /**
     * @param $id
     * @return $this
     */
    public function shipper_account($id, $prepaid_customer_code=null)
    {
        $shipper_account = new \stdClass();
        $shipper_account->id = $id;

        if ($prepaid_customer_code != null) {
            $credentials = new \stdClass();
            $credentials->prepaid_customer_code = $prepaid_customer_code;
            $shipper_account->credentials = $credentials;
        }
        $this->shipper_account = $shipper_account;
        return $this;
    }

    /**
     * @param Shipment $shipment
     * @return $this
     */
    public function shipment(Shipment $shipment)
    {
        $this->shipment = $shipment;
        return $this;
    }

    /**
     * @param bool $value
     * @return $this
     */
    public function async($value = true)
    {
        if ($value == true) {
            $$this->async = true;
        } else if ($value == false) {
            $this->async = false;
        }
        return $this;
    }

    /**
     * @param bool $value
     * @return $this
     */
    public function return_shipment($value=true)
    {
        if ($value == true) {
            $$this->return_shipment = true;
        } else if ($value == false) {
            $this->return_shipment = false;
        }
        return $this;
    }

    /**
     * @param $value YYYY-MM-DD formatted date
     * @return $this
     */
    public function ship_date($value)
    {
        $this->ship_date = $value;
        return $this;
    }

    /**
     * @param Money $money
     * @return $this
     */
    public function COD(Money $money)
    {
        if ($this->service_options == null){
            $this->service_options = array();
        }
        $option = new \stdClass();
        $option->type = "cod";
        $option->money = $money;
        array_push($this->service_options, $option);
        return $this;
    }

    /**
     * @param Invoice $invoice
     * @return $this
     */
    public function invoice(Invoice $invoice){
        $this->invoice = $invoice;
        return $this;
    }

    /**
     * @param array $references
     * @return $this
     */
    public function references(array $references){
        $this->references = $references;
        return $this;
    }

    public function billing(Billing $billing){
        $this->billing = $billing;
        return $this;
    }

    /**
     * @param Customs $customs
     * @return $this
     */
    public function customs(Customs $customs){
        $this->customs = $customs;
        return $this;
    }
    
}