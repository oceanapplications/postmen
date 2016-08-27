<?php

namespace OceanApplications\Postmen\Models;

class Shipment extends Model
{
    public $ship_from;
    public $ship_to;
    public $parcel;

    public function ship_from(Address $address)
    {
        $this->ship_from = $address;
        return $this;
    }

    public function ship_to(Address $address)
    {
        $this->ship_to = $address;
        return $this;
    }

    public function parcels(array $parcels)
    {
        $this->parcel = $parcels;
        return $this;
    }
}