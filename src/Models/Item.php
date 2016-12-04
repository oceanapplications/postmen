<?php

namespace OceanApplications\Postmen\Models;

class Item extends Model
{
    public $description;
    public $quantity;
    public $price;
    public $weight;
    public $item_id;
    public $origin_country;
    public $sku;
    public $hs_code;

    /**
     * @param string $value
     *
     * @return $this
     */
    public function description($value)
    {
        $this->description = strval($value);

        return $this;
    }

    /**
     * @param int $value
     *
     * @return $this
     */
    public function quantity($value)
    {
        $this->quantity = intval($value);

        return $this;
    }

    /**
     * @param Money $price
     *
     * @return $this
     */
    public function price(Money $price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * @param Weight $weight
     *
     * @return $this
     */
    public function weight(Weight $weight)
    {
        $this->weight = $weight;

        return $this;
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function item_id($value)
    {
        $this->item_id = strval($value);

        return $this;
    }

    /**
     * @param $value
     *
     * @throws \Exception
     *
     * @return $this
     */
    public function origin_country($value)
    {
        if (in_array($value, $this->acceptedCountries)) {
            $this->origin_country = $value;
        } else {
            $error = 'Country code invalid or not serviceable';
            throw new \Exception($error);
        }

        return $this;
    }

    /**
     * @param $value
     *
     * @return $this
     */
    public function sku($value)
    {
        $this->sku = strval($value);

        return $this;
    }

    /**
     * @param $value
     *
     * @return $this
     */
    public function hs_code($value)
    {
        $this->hs_code = strval($value);

        return $this;
    }
}
