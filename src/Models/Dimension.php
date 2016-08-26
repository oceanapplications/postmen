<?php

namespace OceanApplications\Postmen\Models;


class Dimension extends Model
{
    private $width;
    private $height;
    private $depth;
    private $unit;

    /**
     * @param $value
     * @return $this
     */
    public function width($value) {
        $this->width = $value;
        return $this;
    }

    /**
     * @param $value
     * @return $this
     */
    public function height($value) {
        $this->height = $value;
        return $this;
    }

    /**
     * @param $value
     * @return $this
     */
    public function depth($value) {
        $this->depth = $value;
        return $this;
    }

    /**
     * @param $value in or cm
     * @return $this
     * @throws \Exception
     */
    public function unit($value) {
        if ($value == "in" || $value = "cm")
        {$this->unit = $value; }
        else {
            $error = "Unit must be in or cm";
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