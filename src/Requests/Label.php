<?php

namespace OceanApplications\Postmen\Requests;


class Label
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
    }

    public function paper_size($size="default")
    {
        $this->paper_size = $size;
    }

    public function service_type($service)
    {
        $this->service_type = $service;
    }

    public function shipper_account($id)
    {
        $shipper_account = new \stdClass();
        $shipper_account->id = $id;
        $this->shipper_account = $shipper_account;
    }
}