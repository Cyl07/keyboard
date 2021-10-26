<?php

namespace App\Model;

use App\Model\Key;


/**
 * KeyStats
 * 
 * @see Key
 * @author Théo Labetowiez
 */
class KeyStats extends Key
{
    private int $nbTap;

     /**
     * Constructor of KeyStats
     * 
     * @param string $str Name of the key
     * @param array $args Position of the Key [x,y]. Default [0,0]. Only Positives
     */
    public function __construct(string $str, array $args = [0,0])
    {
        parent::__construct($str, $args);
        $this->nbTap = 0;
    }

    /**
     * Get the number of time the key is taped
     * 
     * @return int Number of time a key is taped
     */
    public function getNbTap(): int
    {
        return $this->nbTap;
    }

    /**
     * Add a key tap on the stat
     * 
     * @return self KeyStats object
     */
    public function addTap(): self
    {
        $this->nbTap++;
        return $this;
    }
}