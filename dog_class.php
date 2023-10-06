<?php

interface Age{
    public function getAge();
}

interface Foot{
    public function run();
    public function walk();
}

class Dog implements Age, Foot{
    public $age;
    
    public function getAge(){
        return $this->age * 7 .'<br>';
    }

    public function run(){
        return "我用四隻腳跑步<br>";
    }

    public function walk(){
        return "我用四隻腳走路<br>";
    }

}

$Dog = new Dog();
$Dog->age = 2;
echo $Dog->getAge();
echo $Dog->run();
echo $Dog->walk();
