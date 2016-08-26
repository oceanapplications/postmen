<?php
namespace OceanApplications\Postmen\Models;


class Address implements \JsonSerializable
{
    private $country;
    private $contact_name;
    private $phone;
    private $fax;
    private $email;
    private $company_name;
    private $street1;
    private $street2;
    private $street3;
    private $city;
    private $state;
    private $postal_code;
    private $type = "residential";
    private $tax_id;

    public function country($value)
    {
        $acceptedCountries = ['ABW','AFG','AGO','AIA','ALA','ALB','AND','ARE','ARG','ARM','ASM','ATA','ATF','ATG','AUS',
            'AUT','AZE','BDI','BEL','BEN','BES','BFA','BGD','BGR','BHR','BHS','BIH','BLM','BLR','BLZ','BMU','BOL','BRA',
            'BRB','BRN','BTN','BVT','BWA','CAF','CAN','CCK','CHE','CHL','CHN','CIV','CMR','COD','COG','COK','COL','COM',
            'CPV','CRI','CUB','CUW','CXR','CYM','CYP','CZE','DEU','DJI','DMA','DNK','DOM','DZA','ECU','EGY','ERI','ESH',
            'ESP','EST','ETH','FIN','FJI','FLK','FRA','FRO','FSM','GAB','GBR','GEO','GGY','GHA','GIB','GIN','GLP','GMB',
            'GNB','GNQ','GRC','GRD','GRL','GTM','GUF','GUM','GUY','HKG','HMD','HND','HRV','HTI','HUN','IDN','IMN','IND',
            'IOT','IRL','IRN','IRQ','ISL','ISR','ITA','JAM','JEY','JOR','JPN','KAZ','KEN','KGZ','KHM','KIR','KNA','KOR',
            'KWT','LAO','LBN','LBR','LBY','LCA','LIE','LKA','LSO','LTU','LUX','LVA','MAC','MAF','MAR','MCO','MDA','MDG',
            'MDV','MEX','MHL','MKD','MLI','MLT','MMR','MNE','MNG','MNP','MOZ','MRT','MSR','MTQ','MUS','MWI','MYS','MYT',
            'NAM','NCL','NER','NFK','NGA','NIC','NIU','NLD','NOR','NPL','NRU','NZL','OMN','PAK','PAN','PCN','PER','PHL',
            'PLW','PNG','POL','PRI','PRK','PRT','PRY','PSE','PYF','QAT','REU','ROU','RUS','RWA','SAU','SDN','SEN','SGP',
            'SGS','SHN','SJM','SLB','SLE','SLV','SMR','SOM','SPM','SRB','SSD','STP','SUR','SVK','SVN','SWE','SWZ','SXM',
            'SYC','SYR','TCA','TCD','TGO','THA','TJK','TKL','TKM','TLS','TON','TTO','TUN','TUR','TUV','TWN','TZA','UGA',
            'UKR','UMI','URY','USA','UZB','VAT','VCT','VEN','VGB','VIR','VNM','VUT','WLF','WSM','YEM','ZAF','ZMB','ZWE'];

        if (in_array($value, $acceptedCountries)) {
            $this->country = $value;
        } else {
            $error = "Country code invalid or not serviceable";
            throw new \Exception($error);
        }
        return $this;
    }

    /**
     * @param string $value
     * @return $this
     */
    public function contact_name($value){
        $this->contact_name = $value;
        return $this;
    }

    /**
     * @param string $value
     * @return $this
     */
    public function phone($value){
        $this->phone = $value;
        return $this;
    }


    /**
     * @param string $value
     * @return $this
     */
    public function fax($value){
        $this->fax = $value;
        return $this;
    }


    /**
     * @param string $value
     * @return $this
     */
    public function email($value){
        $this->email = $value;
        return $this;
    }


    /**
     * @param string $value
     * @return $this
     */
    public function company_name($value){
        $this->company_name = $value;
        return $this;
    }

    /**
     * @param string $value
     * @return $this
     */
    public function street1($value){
        $this->street1 = $value;
        return $this;
    }

    /**
     * @param string $value
     * @return $this
     */
    public function street2($value){
        $this->street2 = $value;
        return $this;
    }

    /**
     * @param string $value
     * @return $this
     */
    public function street3($value){
        $this->street3 = $value;
        return $this;
    }

    /**
     * @param string $value
     * @return $this
     */
    public function city($value){
        $this->city= $value;
        return $this;
    }

    /**
     * @param string $value
     * @return $this
     */
    public function state($value){
        $this->state = $value;
        return $this;
    }

    /**
     * @param string $value
     * @return $this
     */
    public function postal_code($value){
        $this->postal_code = $value;
        return $this;
    }

    /**
     * @param string $value
     * @return $this
     * @throws \Exception
     */
    public function type($value){
        if($value != "residential" || $value != "business")
        {
            $error = "Type must be residential or business.";
            throw new \Exception($error);
        }
        $this->type = $value;
        return $this;
    }

    /**
     * @param string $value
     * @return $this
     */
    public function tax_id($value){
        $this->tax_id = $value;
        return $this;
    }

    public function JsonSerialize()
    {
        $vars = get_object_vars($this);

        return $vars;
    }
}