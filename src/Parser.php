<?php
/**
 * Created by PhpStorm.
 * User: Mateusz
 * Date: 24.04.2016
 * Time: 23:32
 */

namespace MateuszBlaszczyk\RunkeeperPathParser;



class Parser
{
    protected $data;
    
    protected $vt;

    public function __construct($xml)
    {
        $this->data = $xml;
        $this->vt = new ValueTransformer();
    }

    public function parse()
    {
        $results = [];
        
        if(!isset($this->data['path'])){
            return [];
        }

        foreach ($this->data['path'] as $row) {
            $item = [
                'latitude' => $this->vt->substrGPSCoordinate($row['latitude']),
                'longitude' => $this->vt->substrGPSCoordinate($row['longitude']),
                'altitude' => $this->vt->roundAltitude($row['altitude']),
                'distance' => $this->vt->roundDistance($this->findDistanceByTimestamp($row['timestamp'])),
                'timestamp' => $this->vt->roundTimestamp($row['timestamp']),
            ];
            $results[] = $item;
        }

        return $results;
    }

    public function getJson()
    {
        $results = $this->parse();
        return json_encode($results);
    }

    public function findDistanceByTimestamp($timestamp)
    {
        foreach ($this->data['distance'] as $row) {
            if ($row['timestamp'] === $timestamp) {
                return $row['distance'];
            }
        }

        return null;
    }

}