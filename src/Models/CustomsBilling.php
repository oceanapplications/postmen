<?php
/**
 * Created by PhpStorm.
 * User: Ocean
 * Date: 8/25/2016
 * Time: 11:32 PM.
 */

namespace OceanApplications\Postmen\Models;

class CustomsBilling extends Billing
{
    /**
     * @param string $value shipper or third_party
     *
     * @throws \Exception
     *
     * @return $this
     */
    public function paid_by($value)
    {
        if ($value == 'shipper' || $value == 'third_party' || $value == 'recipient') {
            $this->paid_by = $value;
        } else {
            $error = 'Paid by must be shipper or third_party';
            throw new \Exception($error);
        }

        return $this;
    }
}
