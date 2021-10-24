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
    private array $characters;

    /**
     * Constructor of Keyboard
     *  
     * @param string $args Array of Key object.
     * @param string $argv Array of Character object.
     */
    public function __construct(array $args, array $argv)
    {
        $this->setKeys($args);
        $this->setCharacters($argv);
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

    /**
     * Get the array of Character available on the keyboard
     * 
     * You can set if you want an array of Character entity or an array of string.
     * 
     * @param bool $textForm Optional. Set the format of the result (true: ["a",...] | false: [Character, ...])
     * @return array Array of Character object
     */
    public function getCharacters(bool $textForm = false): array
    {
        if (!$textForm){
            return $this->characters;
        }

        $args = [];
        foreach ($this->characters as $char){
            $args[] = $char->getChar();
        }
        return $args;
    }

    /**
     * Set the available characters on the keyboard
     * 
     * @param array $args Array of Character object.
     * @return self Instance of Character
     */
    public function setCharacters(array $args): self
    {

        foreach($args as $arg){
            if (!($arg instanceof Character)){
                trigger_error("Wrong type given. Expect Character object",E_USER_ERROR);
            }
        }
        $this->characters = $args;
        return $this;
    }

    /**
     * Get one character available on the keyboard
     * 
     * @param string $str Search for this character on the keyboard
     * @return null|Character Character object. null if missing
     */
    private function getCharacterByText(string $str): ?Character
    {
        foreach($this->characters as $char){
            if($char->getChar() == $str){
                return $char;
            }
        }
        return null;
    }

    /**
     * Get an Array of Keystats on the keyboard
     * 
     * @return array Array of Keystats object
     */
    public function getKeysStats(): array
    {
        $result = [];
        foreach($this->keys as $key){
            if($key instanceof KeyStats){
                $result[] = $key;
            }
        }
        return $result;
    }

    public function write(string $str, bool $strict = false): void
    {
        $haystack = $this->getCharacters(true);
        foreach(str_split($str, 1) as $char){
            if (!in_array($char, $haystack)){
                if ($strict){
                    trigger_error("The Keyboard object cannot print this text", E_USER_ERROR);
                }
                trigger_error("The Keyboard object cannot print this text", E_USER_WARNING);
            } else {
                $searchedChar = $this->getCharacterByText($char);
                foreach($searchedChar->getKeys() as $key){
                    if ($key instanceof KeyStats){
                        $key->addTap();
                    }
                    echo $key->getName();
                }
                echo "\n";
            }
        }
    }
}