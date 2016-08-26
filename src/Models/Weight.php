<?php
namespace OceanApplications\Postmen\Models;


class Weight extends Model
{
    private $unit;
    private $value;

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

    public function JsonSerialize()
    {
        $vars = get_object_vars($this);

        return $vars;
    }
}