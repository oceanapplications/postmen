<?php

namespace OceanApplications\Postmen\Models;

class Parcel extends Model
{
    private $box_type;
    private $dimension;
    private $items = array();
    private $description;
    private $weight;

    /**
     * @param String $value
     * @return $this
     */
    public function box_type($value) {
        $this->box_type = $value;
        return $this;
    }

    /**
     * @param Dimension $dimension
     * @return $this
     */
    public function dimension(Dimension $dimension){
        $this->dimension = $dimension;
        return $this;
    }

    /**
     * @param Item $item
     * @return $this
     */
    public function items(Item $item) {
        array_push($this->items, $item);
        return $this;
    }

    /**
     * @param $value
     * @return $this
     */
    public function description($value){
        $this->description = $value;
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

    public function JsonSerialize()
    {
        $vars = get_object_vars($this);

        return $vars;
    }
}