<?php

namespace App;

use App\Key;

/**
 * Character
 * 
 * Used to describe a text character
 * @see Key
 * @author Théo Labetowiez
 */
class Character
{
    private string $char;
    private array $keys;

    /**
     * Constructor of Character
     * 
     * @param string $char Character. 
     * @param string $args Array of Key object.
     */
    public function __construct(string $char, array $args){
        $this->setChar($char);
        $this->setKeys($args);
    }

    /**
     * Get the character
     * 
     * @return string Character string
     */
    public function getChar(): string
    {
        return $this->char;
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
     * Set the character
     * 
     * @param string $char Character string. Needs to be 1 long.
     * @return self Instance of Character
     */
    public function setchar(string $char): self
    {
        if (strlen($char) < 1){
            trigger_error("Insufficient String length. String should me 1 character long", E_USER_ERROR);
        }

        if (!is_string($char)){
            trigger_error("Wrong type given. Expect String", E_USER_ERROR);
        }

        $this->char = substr($char, 0, 1);
        return $this;
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
                echo(get_class($arg));
                trigger_error("Wrong type given. Expect Key object",E_USER_ERROR);
            }
        }
        $this->keys = $args;
        return $this;
    }
}