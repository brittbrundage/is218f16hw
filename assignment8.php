<?php
echo "Working with Objects and References<br><br>";

//ReflectionClass getExtension 

$class = new ReflectionClass('ReflectionClass');
$extension = $class->getExtension();
var_dump($extension);

echo "<br><br>";

//ReflectionClass toString

$string = new ReflectionClass('Exception');
echo $string->__toString();

echo "<br><br>";

//ReflectionProperty Construct

class dog {
    public $x = 1;
    protected $y = 2;
    private $z = 3;
}

$obj = new dog;

$prop = new ReflectionProperty('dog', 'y');
$prop->setAccessible(true); 
var_dump($prop->getValue($obj)); 

$prop = new ReflectionProperty('dog', 'z');
$prop->setAccessible(true); 
var_dump($prop->getValue($obj)); 


echo "<br><br>";




?>