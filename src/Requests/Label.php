<?php

namespace OceanApplications\Postmen\Requests;


use OceanApplications\Postmen\Models\Model;
use OceanApplications\Postmen\Models\Money;
use OceanApplications\Postmen\Models\Shipment;

class Label extends Model
{

    private $paper_size = "default";
    private $service_type;
    private $is_document = false;
    private $shipper_account;
    private $shipment;
    private $async = false;
    private $return_shipment = false;
    private $ship_date;
    private $service_options = array();
    private $invoice;
    private $references;
    private $billing;
    private $customs;

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
    public function shipper_account($id)
    {
        $shipper_account = new \stdClass();
        $shipper_account->id = $id;
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
        $option = new \stdClass();
        $option->type = "cod";
        $option->money = $money;
        array_push($this->service_options, $option);
        return $this;
    }

    public function JsonSerialize()
    {
        $vars = get_object_vars($this);

        return $vars;
    }
}