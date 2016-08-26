<?php

namespace OceanApplications\Postmen\Models;


class Invoice extends Model
{
    private $date;
    private $number;
    private $type;
    private $number_of_copies = 1;

    public function __construct()
    {
        $this->date = date('Y-m-d');
    }

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
    public function type($value){
        $this->type = $value;
        return $this;
    }

    /**
     * @param integer $value between 1 and 4
     * @return $this
     * @throws \Exception
     */
    public function number_of_copies($value){
        if ($value >= 1 && $value <= 4 )
        {$this->number_of_copies = $value; }
        else {
            $error = "Number of copies must be between 1 and 4";
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