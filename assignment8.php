<?php
echo "Working with Objects and References<br><br>";

//ReflectionClass getExtension 

$class = new ReflectionClass('ReflectionClass');
$extension = $class->getExtension();
var_dump($extension);

echo "<br><br>";



?>