<?php

namespace App;

use App\Key;

/**
 * Keyboard
 * 
 * @see Key
 * @author Théo Labetowiez
 */
class Keyboard
{
    private array $keys;

    /**
     * Constructor of Keyboard
     *  
     * @param string $args Array of Key object.
     */
    public function __construct(array $args)
    {
        $this->setKeys($args);
    }
    
    /**
     * Get the array of Key needed to print the Character
     * 
     * @return array Array of Key object
     */
    public function getKeys(): array
    {
        return $this->keys;
    }

    /**
     * Set the keys needed to print a character
     * 
     * @param array $args Array of Key object. Minimum lenght: 1.
     * @return self Instance of Character
     */
    public function setKeys(array $args): self
    {
        if($args === []){
            trigger_error("Empty array given", E_USER_ERROR);
        }

        foreach($args as $arg){
            if (!($arg instanceof Key)){
                trigger_error("Wrong type given. Expect Key object",E_USER_ERROR);
            }
        }
        $this->keys = $args;
        return $this;
    }
}