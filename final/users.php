<head>
<title> Registered Users</title>
<link rel="stylesheet" href="style.css" type="text/css">

<ul class="topnav" id="myTopnav">
  <li><a  href="https://web.njit.edu/~bmb23/is218f16/final/home.php">Home</a></li>
  <li><a  href="https://web.njit.edu/~bmb23/is218f16/final/welcome.php">My Account</a></li>
  <li><a  href="https://web.njit.edu/~bmb23/is218f16/final/update.php?user_id=<?php echo $userRow['user_id'];?>">Edit Account</a></li>
   <li><a class="active"  href="https://web.njit.edu/~bmb23/is218f16/final/users.php">Registered Users</a></li>
  <li><a href="logout.php"> Logout</a></li>
    
</ul>


<style>
table, th, td {
     border: 1px solid black;
	 
}

</style>
</head>
<body>
<center>

<br>
<br>

<?php


$servername = "sql1.njit.edu";
$username = "bmb23";
$password = "KBbJwvUJ";
$dbname = "bmb23";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT user_name, user_email FROM users";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
     echo "<table><tr><th>Name</th><th>Email</th></tr>";
     // output data of each row
     while($row = $result->fetch_assoc()) {
         echo "<tr><td>" . $row["user_name"]. "</td><td>" . $row["user_email"]. " " . $row[""]. "</td></tr>";
     }
     echo "</table>";
} else {
     echo "0 results";
}

$conn->close();
?>  

