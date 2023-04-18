<?php

class Fish extends Animals{
    

    public function __construct(array $data)
    {
        parent::__construct($data);
    }

    public function getImage(){
        return './image/pngwing.com.png(2)';
    }
}