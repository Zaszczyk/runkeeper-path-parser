<?php
/**
 * Created by PhpStorm.
 * User: Mateusz
 * Date: 24.04.2016
 * Time: 23:32
 */

namespace MateuszBlaszczyk\RunkeeperPathParser;



class ValueTransformer
{
    protected $gpsAccuracy = 6;

    protected $distanceAccuracy = 5;

    protected $altitudeAccuracy = 2;

    protected $timestampAccuracy = 0;

    public function substrGPSCoordinate($value)
    {
        $dotPos = strpos((string) $value, '.');

        if (!$dotPos) {
            return (string) $value;
        }

        return substr($value, 0, $dotPos + $this->gpsAccuracy + 1);
    }

    public function roundAltitude($value)
    {
        return round($value, $this->altitudeAccuracy);
    }
    
    public function roundTimestamp($value)
    {
        return round($value, $this->timestampAccuracy);
    }

    public function roundDistance($value)
    {
        return round($value/1000, $this->distanceAccuracy);
    }

}
