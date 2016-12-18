<html>
<head></head>
<body>
<?php
include('bootstrap.php');
$bmb = new HTMLCreator();

echo '<b>Brittani Brundage Project 2</b>';

//Exception Handling
echo '<br><br><b>Exception Handling:</b><br>';
echo 'Writing...<br>';
$filehandler= new ExceptionHandling();
if ($filehandler -> exists("testingfile.txt")){
	if ($filehandler -> ableToWrite("testingfile.txt")){
		$filehandler -> writing("testingfile.txt");
	}
}

echo '<br><br>';

//Unordered List
echo '<b>Cars List:</b>';
$cars = array('Toyota Supra','Ford Mustang GT', 'Dodge Challengar Hellcat', 'Mitshubushi Eclipse GSX');
$bmb->UnorderedList($cars);

//Link
echo '<br><b>Link Creator:</b>';
echo '<br>Lets go to Facebook! ';
$bmb->link('facebook','http://www.facebook.com/');

//html elements
echo '<br><br><b>Table:</b><br>';
$attributes = array(
    "Name" => array(' Brittani ', ' Dalibor ', ' Tiffani '), 
    "Age" => array(' 23 ' , ' 26 ' , ' 20 '),
    "Current Car" => array(' Cobalt SS ' , ' Eclipse GSX ' , ' Honda Civic ')
);

$vals = array_values($attributes);
$headers = True;
$bmb->table($attributes, $headers);

?>
</body>
</html>
