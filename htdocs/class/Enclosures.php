<?php

class Enclosures{
    
    private $id;
    private $name;
    private $type;
    private $nbAnimal = 0;
    private $nbAnimalMax = 0;

    public function __construct(array $data)
    {
        if(isset($data['id'])){
            $this->setId($data['id']);
           }
           if(isset($data['name'])){
            $this->setName($data['name']);
           }
           if(isset($data['type'])){
            $this->setType($data['type']);
           }
           if(isset($data['nb_animals'])){
            $this->setNbAnimal($data['nb_animals']);
           }
           if(isset($data['nbAnimalMax'])){
            $this->setNbAnimalMax($data['nbAnimalMax']);
           }
    }
    public function setNbAnimal($nbAnimal){
        $this->nbAnimal = $nbAnimal;
    }

    public function getNbAnimal(){
        return $this->nbAnimal;
    }
    public function setType($type){
        $this->type = $type;
    }

    public function getType(){
        return $this->type;
    }

    public function setName($name){
        $this->name = $name;
    }

    public function getName(){
        return $this->name;
    }
    public function setId($id){
        $this->id = $id;
    }

    public function getId(){
        return $this->id;
    }

    public function setNbAnimalMax($nbAnimalMax){
        $this->nbAnimalMax = $nbAnimalMax;
    }

    public function getNbAnimalMax(){
        return $this->nbAnimalMax;
    }
 

 
}