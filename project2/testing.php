<html>
<head></head>
<body>
<?php
include('bootstrap.php');

echo 'Brittani Brundage Project 2';

//Unordered List
echo 'Cars';
$cars = array('Toyota Supra','Ford Mustang GT', 'Dodge Challengar Hellcat', 'Mitshubushi Eclipse GSX');
$bmb->UnorderedList($cars);

//Link
echo '<br><b>Link Creator:</b>';
echo '<br>Lets go to Facebook! ';
$bmb->link('facebook','http://www.facebook.com/');

//html elements
$attributes = array(
    "Name" => array('Brittani', 'Dalibor', 'Tiffani'), 
    "Age" => array('23' , '26' , '20'),
    "Current Car" => array('Cobalt SS' , 'Eclipse GSX' , 'Honda Civic')
);

$vals = array_values($attributes);
$headers = True;
$bmb = new HTMLCreator();
$bmb->table($attributes, $headers);







?>
</body>
</html>
