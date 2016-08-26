<?php
namespace OceanApplications\Postmen\Models;

class Item extends Model
{
    private $description;
    private $quantity;
    private $price;
    private $weight;
    private $item_id;
    private $origin_country;
    private $sku;
    private $hs_code;

    /**
     * @param string $value
     * @return $this
     */
    public function description($value){
        $this->description = $value;
        return $this;
    }

    /**
     * @param integer $value
     * @return $this
     */
    public function quantity($value){
        $this->quantity = $value;
        return $this;
    }

    /**
     * @param Money $price
     * @return $this
     */
    public function price(Money $price){
        $this->price = $price;
        return $this;
    }

    /**
     * @param Weight $weight
     * @return $this
     */
    public function weight(Weight $weight){
        $this->weight = $weight;
        return $this;
    }

    /**
     * @param string $value
     * @return $this
     */
    public function item_id($value){
        $this->item_id = $value;
        return $this;
    }

    /**
     * @param $value
     * @return $this
     * @throws \Exception
     */
    public function origin_country($value){
       if (in_array($value, $this->acceptedCountries)) {
            $this->origin_country = $value;
        } else {
            $error = "Country code invalid or not serviceable";
            throw new \Exception($error);
        }
        return $this;
    }

    /**
     * @param $value
     * @return $this
     */
    public function sku($value){
        $this->sku = $value;
        return $this;
    }

    /**
     * @param $value
     * @return $this
     */
    public function hs_code($value){
        $this->hs_code = $value;
        return $this;
    }


    public function JsonSerialize()
    {
        $vars = get_object_vars($this);

        return $vars;
    }
}