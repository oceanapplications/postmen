<?php
/**
 * Created by PhpStorm.
 * User: Ocean
 * Date: 8/25/2016
 * Time: 11:09 PM
 */

namespace OceanApplications\Postmen\Models;


class Billing extends Model
{
    protected $paid_by;
    public $method;

    /**
     * @param string $value shipper or third_party
     * @return $this
     * @throws \Exception
     */
    public function paid_by($value){
        if ($value == "shipper" || $value == "third_party"){
            $this->paid_by = $value;
        } else {
            $error = "Paid by must be shipper or third_party";
            throw new \Exception($error);
        }
        return $this;
    }

    /**
     * @param PaymentMethod $value
     * @return $this
     */
    public function method(PaymentMethod $value){
        $this->method = $value;
        return $this;
    }

}