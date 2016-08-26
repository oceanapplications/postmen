<?php
namespace OceanApplications\Postmen\Models;


class Passport extends Model
{
    private $number;
    private $issue_date;

    /**
     * @param string $value
     * @return $this
     */
    public function number($value){
        $this->number = $value;
        return $this;
    }

    /**
     * @param string $value
     * @return $this
     */
    public function issue_date($value){
        $this->issue_date = $value;
        return $this;
    }

}