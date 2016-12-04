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
    public $type = 'residential';
    public $tax_id;

    /**
     * @param string $value
     *
     * @throws \Exception
     *
     * @return $this
     */
    public function country($value)
    {
        if (in_array($value, $this->acceptedCountries)) {
            $this->country = $value;
        } else {
            $error = 'Country code invalid or not serviceable';
            throw new \Exception($error);
        }

        return $this;
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function contact_name($value)
    {
        $this->contact_name = strval($value);

        return $this;
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function phone($value)
    {
        $this->phone = strval($value);

        return $this;
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function fax($value)
    {
        $this->fax = strval($value);

        return $this;
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function email($value)
    {
        $this->email = strval($value);

        return $this;
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function company_name($value)
    {
        $this->company_name = strval($value);

        return $this;
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function street1($value)
    {
        $this->street1 = strval($value);

        return $this;
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function street2($value)
    {
        if (empty($value)) {
            $this->street2 = null;
        } else {
            $this->street2 = strval($value);
        }

        return $this;
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function street3($value)
    {
        if (empty($value)) {
            $this->street3 = null;
        } else {
            $this->street3 = strval($value);
        }

        return $this;
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function city($value)
    {
        $this->city = strval($value);

        return $this;
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function state($value)
    {
        $this->state = strval($value);

        return $this;
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function postal_code($value)
    {
        $this->postal_code = strval($value);

        return $this;
    }

    /**
     * @param string $value
     *
     * @throws \Exception
     *
     * @return $this
     */
    public function type($value)
    {
        if ($value != 'residential' || $value != 'business') {
            $error = 'Type must be residential or business.';
            throw new \Exception($error);
        }
        $this->type = $value;

        return $this;
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function tax_id($value)
    {
        $this->tax_id = strval($value);

        return $this;
    }
}
