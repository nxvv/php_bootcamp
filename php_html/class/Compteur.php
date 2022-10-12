<?php

class Compteur {

    const INCREMENT = 1;
    protected $filePath = '';

    public function __construct(string $filePath)
    {
        $this->filePath = $filePath;
    }

    public function incrementer():void
    {
        $fichier = $this->filePath;
        $compteur = 1;
        if(file_exists($fichier)){
            $compteur = (int)file_get_contents($fichier);
            // $compteur++;
            // $compteur += self::INCREMENT;
            $compteur += static::INCREMENT;
        }
        file_put_contents($fichier, $compteur);
    }

    public function recuperer():int
    {
        if(!file_exists($this->filePath)){
            return 0;
        }
        return file_get_contents($this->filePath);
    }
}