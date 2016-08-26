<?php
namespace OceanApplications\Postmen\Models;


class PaymentMethod extends Model
{
    private $type = "account";
    private $account_number;
    private $postal_code;
    private $country;

    /**
     * @param string $value
     * @return $this
     */
    public function account_number($value){
        $this->account_number = $value;
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

    public function JsonSerialize()
    {
        $vars = get_object_vars($this);

        return $vars;
    }
}