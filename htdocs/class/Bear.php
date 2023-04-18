<?php

class Bear extends Animals{
    

    public function __construct(array $data)
    {
        parent::__construct($data);


    }

    public function getImage(){
        return './image/istockphoto-171136250-612x612.jpg';
    }
}