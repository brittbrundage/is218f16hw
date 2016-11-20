<html>
<body>
<?php

echo "Super Globals<br><br>";

//$GLOBALS

function globals() {
    $test = "local variable";

    echo '$test in global scope: ' . $GLOBALS["test"] . "\n";
	echo "<br><br>";
    echo '$test in current scope: ' . $test . "\n";
	echo "<br><br>";
}

$test = "Example content";
globals();

//$_SERVER

echo $_SERVER['SERVER_NAME'];

//$_GET

print_r($_GET);
if($_GET["a"] === "") echo "a is an empty string\n";
if($_GET["a"] === false) echo "a is false\n";
if($_GET["a"] === null) echo "a is null\n";
if(isset($_GET["a"])) echo "a is set\n";
if(!empty($_GET["a"])) echo "a is not empty";

echo "<br><br>"

?>

<!-- $POST -->
<form action="post.php" method="get">
Name: <input type="text" name="name"><br>
<input type="submit">
</form>

<!--$_FILES -->
<form action="upload.php" method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload Image" name="submit">
</form>


<?php

//$_COOKIES

$cookie_name = "user";
$cookie_value = "Brittani";
setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); 

if(!isset($_COOKIE[$cookie_name])) {
     echo "Cookie named '" . $cookie_name . "' is not set!";
} else {
     echo "Cookie '" . $cookie_name . "' is set!<br>";
     echo "Value is: " . $_COOKIE[$cookie_name];
}

echo "<br>**Refresh page to see cookie value<br><br>";

//$_SESSION

session_start();

$_SESSION["favoritecolor"] = "red<br>";
$_SESSION["favoriteanimal"] = "dog<br>";
echo "Session variables are set.<br>";

print_r($_SESSION)

//$_REQUEST
?>
<br><br>
<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
  Name: <input type="text" name="fname">
  <input type="submit">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_REQUEST['fname'];
    if (empty($name)) {
        echo "Name is empty";
    } else {
        echo $name;
    }
}
 echo "<br><br>";

//$_ENV

echo 'My username is ' .$_ENV["username"] . '!';


?>
</body>
</html>