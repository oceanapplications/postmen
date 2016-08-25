<?php

namespace OceanApplications\Postmen\Requests;


class Label implements \JsonSerializable
{
    //properties
    private $async = false;
    private $paper_size = "default";
    private $service_type;
    private $shipper_account;

    public function async($async = true) {
        if ($async == true) {
            $$this->async = true;
        } else if ($async == false) {
            $this->async = false;
        }
        return $this;
    }

    public function paper_size($size="default")
    {
        $this->paper_size = $size;
        return $this;
    }

    public function service_type($service)
    {
        $this->service_type = $service;
        return $this;
    }

    public function shipper_account($id)
    {
        $shipper_account = new \stdClass();
        $shipper_account->id = $id;
        $this->shipper_account = $shipper_account;
        return $this;
    }

    public function JsonSerialize()
    {
        $vars = get_object_vars($this);

        return $vars;
    }
}