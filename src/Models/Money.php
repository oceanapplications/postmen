<?php

namespace OceanApplications\Postmen\Models;


class Money implements \JsonSerializable
{
    private $amount;
    private $currency;

    public function amount($value){
        $this->amount = $value;
        return $this;
    }


    public function currency($value){
        $acceptedCurrencies = ['AED','AFN','ALL','AMD','ANG','AOA','ARS','AUD','AWG','AZN','BAM','BBD','BDT','BGN','BHD',
            'BIF','BMD','BND','BOB','BOV','BRL','BSD','BTN','BWP','BYR','BZD','CAD','CDF','CHE','CHF','CHW','CLF','CLP',
            'CNY','COP','COU','CRC','CUC','CUP','CVE','CZK','DJF','DKK','DOP','DZD','EGP','ERN','ETB','EUR','FJD','FKP',
            'GBP','GEL','GHS','GIP','GMD','GNF','GTQ','GYD','HKD','HNL','HRK','HTG','HUF','IDR','ILS','INR','IQD','IRR',
            'ISK','JMD','JOD','JPY','KES','KGS','KHR','KMF','KPW','KRW','KWD','KYD','KZT','LAK','LBP','LKR','LRD','LSL',
            'LTL','LVL','LYD','MAD','MDL','MGA','MKD','MMK','MNT','MOP','MRO','MUR','MVR','MWK','MXN','MXV','MYR','MZN',
            'NAD','NGN','NIO','NOK','NPR','NZD','OMR','PAB','PEN','PGK','PHP','PKR','PLN','PYG','QAR','RON','RSD','RUB',
            'RWF','SAR','SBD','SCR','SDG','SEK','SGD','SHP','SLL','SOS','SRD','SSP','STD','SYP','SZL','THB','TJS','TMT',
            'TND','TOP','TRY','TTD','TWD','TZS','UAH','UGX','USD','USN','USS','UYI','UYU','UZS','VEF','VND','VUV','WST',
            'XAF','XAG','XAU','XBA','XBB','XBC','XBD','XCD','XDR','XFU','XOF','XPD','XPF','XPT','XTS','XXX','YER','ZAR',
            'ZMW'];
        if (in_array($value, $acceptedCurrencies)){
            $this->currency = $value;
        }else {
            $error = "Currency code invalid or not serviceable";
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