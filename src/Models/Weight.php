<?php
namespace OceanApplications\Postmen\Models;


class Weight extends Model
{
    public $unit;
    public $value;

    public function __construct($value = null, $unit = null)
    {
        if ($value != null && $unit != null){
            $this->value($value);
            $this->unit($unit);
        }
    }

    /**
     * @param $value
     * @return $this
     */
    public function unit($value){
        if ($value == "lb" || $value == "kg")
        { $this->unit = $value; }
        else {
            $error = "Unit must be lb or kg";
            throw new \Exception($error);
        }
        return $this;
    }

    /**
     * @param init $value
     * @return $this
     */
    public function value($value){
        $this->value = $value;
        return $this;
    }

}