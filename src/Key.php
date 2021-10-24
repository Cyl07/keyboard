<?php

namespace App;

/**
 * Key
 * 
 * Used to describe a key of a keyboard
 * 
 * @author Théo Labetowiez
 */
class Key{

    protected string $name;
    protected array $position;

    /**
     * Constructor of Key
     * 
     * @param string $str Name of the key
     * @param array $args Position of the Key [x,y]. Default [0,0]. Only Positives
     */
    public function __construct(string $str, array $args = [0,0])
    {
        $this->name = $str;
        $this->setPosition($args);
    }

    /**
     * Get the name of the key
     * 
     * @return string Name of the key
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Get the position of the key
     * 
     * @return array Position of the Key [x,y]
     */
    public function getPosition(): array
    {
        return $this->position;
    }

    /**
     * Set the name of the key
     * 
     * @param string $str Name of the key
     * @return self Instance of the key
     */
    public function setName(string $str): self
    {
        $this->name = $str;
        return $this;
    }

    /**
     * Set the position of the key 
     * 
     * @param array $args Position of the Key [x,y]. Default [0,0]. Only Positives
     * @return self Instance of the key
     */
    public function setPosition(array $args = [0,0]): self
    {
        if(count($args) < 2){
            trigger_error("Insufficient array length. Array length should be two.", E_USER_ERROR);
        }

        foreach($args as $arg){
            if (!is_numeric($arg)){
                trigger_error("Wrong type given. Expect Float", E_USER_ERROR);
            }
            if ($arg < 0){
                trigger_error("Wrong value. Value needs to be positive", E_USER_ERROR);
            }
        }

        $this->position = $args;
        return $this;
    }
}