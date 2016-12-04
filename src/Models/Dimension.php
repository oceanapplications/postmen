<?php

namespace OceanApplications\Postmen\Models;

class Dimension extends Model
{
    public $width;
    public $height;
    public $depth;
    public $unit;

    public function __construct($width = null, $height = null, $depth = null, $unit = null)
    {
        if ($width != null && $height != null && $depth != null && $unit != null) {
            $this->width($width);
            $this->height($height);
            $this->depth($depth);
            $this->unit($unit);
        }
    }

    /**
     * @param $value
     *
     * @return $this
     */
    public function width($value)
    {
        $this->width = floatval($value);

        return $this;
    }

    /**
     * @param $value
     *
     * @return $this
     */
    public function height($value)
    {
        $this->height = floatval($value);

        return $this;
    }

    /**
     * @param $value
     *
     * @return $this
     */
    public function depth($value)
    {
        $this->depth = floatval($value);

        return $this;
    }

    /**
     * @param $value in or cm
     *
     * @throws \Exception
     *
     * @return $this
     */
    public function unit($value)
    {
        if ($value == 'in' || $value = 'cm') {
            $this->unit = $value;
        } else {
            $error = 'Unit must be in or cm';
            throw new \Exception($error);
        }

        return $this;
    }
}
