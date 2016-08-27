<?php

namespace OceanApplications\Postmen\Models;


class Customs extends Model
{
    public $purpose;
    public $terms_of_trade;
    public $eei;
    public $billing;
    public $importer_address;
    public $passport;

    /**
     * @param $value
     * @return $this
     * @throws \Exception
     */
    public function purpose($value){
        $purposes = array('gift', 'merchandise', 'sample', 'return', 'repair');
        if(in_array($value, $purposes)){
            $this->purpose = $value;
        } else {
            $error = "Purpose must be gift, merchandise, sample, return, or repair";
            throw new \Exception($error);
        }
        return $this;
    }

    /**
     * @param $value
     * @return $this
     * @throws \Exception
     */
    public function terms_of_trade($value){
        $terms = array('dat','ddu','ddp','dap');
        if(in_array($value, $terms)){
            $this->terms_of_trade = $value;
        } else {
            $error = "Terms must be dat, ddu, ddp, or dap";
            throw new \Exception($error);
        }
        return $this;
    }

    /**
     * @param no_eei $value
     * @return $this
     */
    public function no_eei(no_eei $value){
        $this->eei = $value;
        return $this;
    }

    /**
     * @param aes $value
     * @return $this
     */
    public function aes(aes $value){
        $this->eei = $value;
        return $this;
    }

    /**
     * @param CustomsBilling $value
     * @return $this
     */
    public function customs_billing(CustomsBilling $value){
        $this->billing = $value;
        return $this;
    }

    /**
     * @param Address $value
     * @return $this
     */
    public function importer_address(Address $value){
        $this->importer_address = $value;
        return $this;
    }

    /**
     * @param Passport $value
     * @return $this
     */
    public function passport(Passport $value){
        $this->passport = $value;
        return $this;
    }

}