<?php

class Animals{
    
    private $id;
    private $name;
    private $height;
    private $weight;
    private $age;
    private $class;
    private $enclosId;


    public function __construct(array $data)
    {
        if(isset($data['id'])){
         $this->setId($data['id']);
        }
        if(isset($data['class'])){
         $this->setClass($data['class']);
        }
        if(isset($data['name'])){
         $this->setName($data['name']);
        }
        if(isset($data['height'])){
         $this->setHeight($data['height']);
        }
        if(isset($data['weight'])){
         $this->setWeight($data['weight']);
        }
        if(isset($data['age'])){
         $this->setAge($data['age']);
        }
        if(isset($data['id_enclosure'])){
            $this->setEnclosId($data['id_enclosure']);
        }

    }

    public function setEnclosId($enclosId){
        $this->enclosId = $enclosId;
    }

    public function getEnclosId(){
        return $this->enclosId;
    }

    public function setClass($class){
        $this->class = $class;
    }

    public function getClass(){
        return $this->class;
    }

    public function setHeight($height){
        $this->height = $height;
    }

    public function getHeight(){
        return $this->height;
    }

    public function setWeight($weight){
        $this->weight = $weight;
    }

    public function getWeight(){
        return $this->weight;
    }

    public function setAge($age){
        $this->age = $age;
    }

    public function getAge(){
        return $this->age;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getId(){
        return $this->id;
    }

    public function setName($name){
        $this->name = $name;
    }

    public function getName(){
        return $this->name;
    }

    
}