<?php

namespace OceanApplications\Postmen\Models;

class Shipment implements \JsonSerializable
{
    private $ship_from;
    private $ship_to;
    private $parcel;

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

    public function JsonSerialize()
    {
        $vars = get_object_vars($this);

        return $vars;
    }
}