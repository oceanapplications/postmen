<?php
namespace OceanApplications\Postmen\Models;


class Address extends Model
{
    private $country;
    private $contact_name;
    private $phone;
    private $fax;
    private $email;
    private $company_name;
    private $street1;
    private $street2;
    private $street3;
    private $city;
    private $state;
    private $postal_code;
    private $type = "residential";
    private $tax_id;

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

    public function JsonSerialize()
    {
        $vars = get_object_vars($this);

        return $vars;
    }
}