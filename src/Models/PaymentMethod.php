<?php

namespace OceanApplications\Postmen\Models;

class PaymentMethod extends Model
{
    public $type = 'account';
    public $account_number;
    public $postal_code;
    public $country;

    /**
     * @param string $value
     *
     * @return $this
     */
    public function account_number($value)
    {
        $this->account_number = strval($value);

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
}
