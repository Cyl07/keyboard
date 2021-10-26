<?php
namespace App\Model;

use App\Model\Key;

class Finger
{
    private string $name;
    private Key $defaultKey;
    private Key $actualKey;
    private array $availableKeys;
    private float $distanceMoved;

    public function __construct(string $str, Key $key, array $args){
        $this->name = $str;
        $this->defaultKey = $key;
        $this->actualKey = $key;
        $this->availableKeys = $args;
        $this->distanceMoved = 0;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $str): self
    {
        $this->name = $str;
        return $this;
    }

    public function getDefaultKey(): Key
    {
        return $this->defaultKey;
    }

    public function setDefaultKey(Key $key): self
    {
        $this->defaultKey = $key;
        return $this;
    }

    public function getActualKey(): Key
    {
        return $this->actualKey;
    }

    private function setActualKey(Key $key): self
    {
        $this->actualKey = $key;
        return $this;
    }

    public function getDistanceMoved(): float
    {
        return $this->distanceMoved;
    }

    public function move(Key $key): self
    {
        $finalPosition = $key->getPosition();
        $initialPosition = $this->actualKey->getPosition();
        $this->distanceMoved += sqrt(pow($finalPosition[0]-$initialPosition[0], 2) + pow($finalPosition[1]-$initialPosition[1], 2));
        $this->setActualKey($key);
        return $this;
    }

    public function getAvailableKeys(): array
    {
        return $this->availableKeys;
    }

    public function setAvailableKeys(array $args): self
    {
        foreach($args as $arg){
            if(!($arg instanceof Key)){
                trigger_error("Wrong type given. Expect Key object",E_USER_ERROR);
            }
        }
        $this->availableKeys = $args;
        return $this;
    }
}