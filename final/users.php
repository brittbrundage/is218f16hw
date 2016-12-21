<head>
<title> Registered Users</title>
<link rel="stylesheet" href="style.css" type="text/css">
<style>
table, th, td {
     border: 1px solid black;
}
</style>
</head>
<body>
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

