<?php
namespace OceanApplications\Postmen\Models;


class Address extends Model
{
    public $country;
    public $contact_name;
    public $phone;
    public $fax;
    public $email;
    public $company_name;
    public $street1;
    public $street2;
    public $street3;
    public $city;
    public $state;
    public $postal_code;
    public $type = "residential";
    public $tax_id;

    /**
     * @param string $value
     * @return $this
     * @throws \Exception
     */
    public function country($value)
    {
        if (in_array($value, $this->acceptedCountries)) {
            $this->country = $value;
        } else {
            $error = "Country code invalid or not serviceable";
            throw new \Exception($error);
        }
        return $this;
    }

    /**
     * @param string $value
     * @return $this
     */
    public function contact_name($value){
        $this->contact_name = $value;
        return $this;
    }

    /**
     * @param string $value
     * @return $this
     */
    public function phone($value){
        $this->phone = $value;
        return $this;
    }


    /**
     * @param string $value
     * @return $this
     */
    public function fax($value){
        $this->fax = $value;
        return $this;
    }


    /**
     * @param string $value
     * @return $this
     */
    public function email($value){
        $this->email = $value;
        return $this;
    }


    /**
     * @param string $value
     * @return $this
     */
    public function company_name($value){
        $this->company_name = $value;
        return $this;
    }

    /**
     * @param string $value
     * @return $this
     */
    public function street1($value){
        $this->street1 = $value;
        return $this;
    }

    /**
     * @param string $value
     * @return $this
     */
    public function street2($value){
        $this->street2 = $value;
        return $this;
    }

    /**
     * @param string $value
     * @return $this
     */
    public function street3($value){
        $this->street3 = $value;
        return $this;
    }

    /**
     * @param string $value
     * @return $this
     */
    public function city($value){
        $this->city= $value;
        return $this;
    }

    /**
     * @param string $value
     * @return $this
     */
    public function state($value){
        $this->state = $value;
        return $this;
    }

    /**
     * @param string $value
     * @return $this
     */
    public function postal_code($value){
        $this->postal_code = $value;
        return $this;
    }

    /**
     * @param string $value
     * @return $this
     * @throws \Exception
     */
    public function type($value){
        if($value != "residential" || $value != "business")
        {
            $error = "Type must be residential or business.";
            throw new \Exception($error);
        }
        $this->type = $value;
        return $this;
    }

    /**
     * @param string $value
     * @return $this
     */
    public function tax_id($value){
        $this->tax_id = $value;
        return $this;
    }

}