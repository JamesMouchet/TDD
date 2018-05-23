<?php

namespace Tests\Unit;

use App\DonationFee;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Exception;

/**
 * Class DonationFeeTest
 * @package Tests\Unit
 */
class DonationFeeTest extends TestCase
{
    /**
     * Test de la commission prélevée par le site.
     *
     * @throws \Exception
     */
    public function testCommissionAmountGetter()
    {
        // Etant donné une donation de 100 et commission de 10%
        $donationFees = new DonationFee(500, 23);

        // Lorsque qu'on appel la méthode getCommissionAmount()
        $actual = $donationFees->getCommissionAmount();

        // Alors la Valeur de la commission doit être de 10
        $expected = 500*23/100;
        $this->assertEquals($expected, $actual);
    }

    /**
     * @throws Exception
     */
    public function testAmountCollectedGetter()
    {
        // Etant donné une donation de 100 et commission de 10%
        $donationFees = new DonationFee(150, 10);

        // Lorsque qu'on appel la méthode getAmountCollected()
        $actual = $donationFees->getAmountCollected();

        // Alors la Valeur de la donation doit être de 90
        $expected = 150 - 150 * 10 /100;
        $this->assertEquals($expected, $actual);
    }

    /**
     * @throws Exception
     */
    public function testFixedAndCommissionFeeAmount()
    {
        $donationFees = new DonationFee(150, 24);
        $actual = $donationFees->getFixedAndCommissionFeeAmount();
        $excepted = 150*24/100 + 50;
        $this->assertEquals($excepted, $actual);
    }
    /**
     * @throws Exception
     */
    public function testFixedAndCommissionFeeAmountWith500()
    {
        $donationFees = new DonationFee(5000, 9);
        $actual = $donationFees->getFixedAndCommissionFeeAmount();
        $excepted = 500;
        $this->assertEquals($excepted, $actual);
    }
    /**
     * @throws Exception
     */
    public function testGetSummary()
    {
        $donationsFees = new DonationFee(500, 10);
        $actual = $donationsFees->getSummary();
        $excepted = array(500, 50, 10, 100, 450);
        $this->assertEquals($excepted, $actual);
    }

}
