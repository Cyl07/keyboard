<?php
/**
 * Key
 * 
 * Used to describe keys of a keyboard
 * 
 * @author Théo Labetowiez
 */
class Key{
    private string $name;
    private array $position;

    /**
     * Constructor of Key
     * 
     * @param string $str Name of the key
     * @param array $args Position of the Key [x,y]. Default [0,0].  
     */
    public function __construct(string $str, array $args = [0,0])
    {
        $this->str = $str;
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
        if(count($args) != 2){
            return $this;
        }

        foreach($args as $arg){
            if (!is_float($arg) || $arg < 0){
                return $this;
            }
        }

        $this->position = $args;
        return $this;
    }
}