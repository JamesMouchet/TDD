<?php
/**
 * Created by PhpStorm.
 * User: laurentbeauvisage
 * Date: 07/05/2018
 * Time: 14:07
 */

namespace App;
use Exception;
use Validator;
use Illuminate\Validation\ValidationException;

class DonationFee
{

    private $donation;
    private $commissionPercentage;

    /**
     * DonationFee constructor.
     * @param $donation
     * @param $commissionPercentage
     * @throws Exception
     */
    public function __construct($donation, $commissionPercentage)
    {
        $this->donation = $donation;
        $this->commissionPercentage = $commissionPercentage;
        if ($this->commissionPercentage > 30 || $this->commissionPercentage < 0) {
            throw new Exception('Le pourcentage de commission doit être entre 0 et 30%');
        }
    }

    public function getCommissionAmount()
    {
        $commissionAmount = $this->donation * $this->commissionPercentage / 100;
        return $commissionAmount;

    }

    public function getAmountCollected()
    {
        $amountCollected = $this->donation - $this->getCommissionAmount();
        return $amountCollected;
    }
}