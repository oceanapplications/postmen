<?php

namespace OceanApplications\Postmen\Models;

class Passport extends Model
{
    public $number;
    public $issue_date;

    /**
     * @param string $value
     *
     * @return $this
     */
    public function number($value)
    {
        $this->number = strval($value);

        return $this;
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function issue_date($value)
    {
        $this->issue_date = strval($value);

        return $this;
    }
}
