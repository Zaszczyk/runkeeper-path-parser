<?php
use MateuszBlaszczyk\RunkeeperPathParser\ValueTransformer;

/**
 * Created by PhpStorm.
 * User: Mateusz
 * Date: 25.04.2016
 * Time: 00:08
 */
class ValueTransformerTest extends PHPUnit_Framework_TestCase
{
    public function setUp(){
    }
    
    public function testSubstrGPSCoordinateValid1()
    {
        $vt = new ValueTransformer();
        $result = $vt->substrGPSCoordinate('19.123456');
        $this->assertEquals('19.123456', $result);
    }


    public function testSubstrGPSCoordinateValid2()
    {
        $vt = new ValueTransformer();
        $result = $vt->substrGPSCoordinate('19.1234567');
        $this->assertEquals('19.123456', $result);
    }


    public function testSubstrGPSCoordinateValid3()
    {
        $vt = new ValueTransformer();
        $result = $vt->substrGPSCoordinate('192.123456');
        $this->assertEquals('192.123456', $result);
    }


    public function testSubstrGPSCoordinateValid4()
    {
        $vt = new ValueTransformer();
        $result = $vt->substrGPSCoordinate('192.1234567');
        $this->assertEquals('192.123456', $result);
    }


    public function testSubstrGPSCoordinateValid5()
    {
        $vt = new ValueTransformer();
        $result = $vt->substrGPSCoordinate('192.12');
        $this->assertEquals('192.12', $result);
    }

    public function testRoundDistance1()
    {
        $vt = new ValueTransformer();
        $result = $vt->roundDistance('0.0');
        $this->assertEquals('0.0', $result);
    }

    public function testRoundDistance2()
    {
        $vt = new ValueTransformer();
        $result = $vt->roundDistance('0.00');
        $this->assertEquals('0.00', $result);
    }

    public function testRoundDistance3()
    {
        $vt = new ValueTransformer();
        $result = $vt->roundDistance('0.000');
        $this->assertEquals('0.000', $result);
    }

    public function testRoundDistance4()
    {
        $vt = new ValueTransformer();
        $result = $vt->roundDistance('0.999');
        $this->assertEquals('0.001', $result);
    }
    public function testRoundDistance5()
    {
        $vt = new ValueTransformer();
        $result = $vt->roundDistance('0');
        $this->assertEquals('0.00', $result);
    }

    public function testRoundAltitude1()
    {
        $vt = new ValueTransformer();
        $result = $vt->roundAltitude('0.999');
        $this->assertEquals('1.00', $result);
    }
    
    public function testRoundAltitude2()
    {
        $vt = new ValueTransformer();
        $result = $vt->roundAltitude('158.999');
        $this->assertEquals('159.00', $result);
    }

    public function testRoundAltitude3()
    {
        $vt = new ValueTransformer();
        $result = $vt->roundAltitude('158.9');
        $this->assertEquals('158.90', $result);
    }

    public function testRoundAltitude4()
    {
        $vt = new ValueTransformer();
        $result = $vt->roundAltitude('0.99');
        $this->assertEquals('0.99', $result);
    }
}
