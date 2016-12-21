<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css"  />
<link rel="stylesheet" href="style.css" type="text/css"  />

<ul class="topnav" id="myTopnav">
  <li><a  href="https://web.njit.edu/~bmb23/is218f16/final/index.php">Home</a></li>
  <li><a  href="https://web.njit.edu/~bmb23/is218f16/final/welcome.php">My Account</a></li>
  <li><a class="active"  href="https://web.njit.edu/~bmb23/is218f16/final/update.php?user_id=<?php echo $userRow['user_id'];?>">Edit Account</a></li>
  <li><a href="https://web.njit.edu/~bmb23/is218f16/final/welcome.php">Back</a></li>
  <li><a href="logout.php"><i class="glyphicon glyphicon-log-out"></i> Logout</a></li>
</ul>
</head>



<?php


	function renderForm($user_id, $user_name, $user_email, $user_pass, $error)

	{

?>


<html>
<head>
<title>Edit Account</title>
</head>
<body>

<?php
	if ($error != ''){

		echo '<div style="padding:4px; border:1px solid red; color:red;">'.$error.'</div>';
	}

?>

<form action="" method="post">

<input type="hidden" name="id" value="<?php echo $id; ?>"/>

<div>

<p><strong>ID:</strong> <?php echo $user_id; ?></p>

<strong>Name: *</strong> <input type="text" name="name" value="<?php echo $user_name; ?>"/><br/>

<strong>Email: *</strong> <input type="text" name="email" value="<?php echo $user_email; ?>"/><br/>

<strong>Password: *</strong> <input type="text" name="password" value="<?php echo $user_pass; ?>"/><br/>

<p>* Required</p>

<input type="submit" name="submit" value="Submit">

</div>

</form>

</body>
</html>

<?php

}

include('dbconfig.php');

	if (isset($_POST['submit'])){


		if (is_numeric($_POST['user_id'])){

			$user_id = $_POST['user_id'];

			$user_namee = mysql_real_escape_string(htmlspecialchars($_POST['user_name']));
	
			$user_email = mysql_real_escape_string(htmlspecialchars($_POST['user_email']));

			$user_pass = mysql_real_escape_string(htmlspecialchars($_POST['user_pass']));



				if ($user_name == '' || $user_email == '' || $user_pass == ''){

				$error = 'ERROR: Please fill in all required fields!';

				renderForm($user_id, $user_name, $user_email, $user_pass, $error);
				}

				else {

				$sql("UPDATE users SET user_name='$user_name', user_email='$user-email' WHERE user_id='$user_id'")

				or die(mysql_error());

				header("Location: users.php");
				}

		}

	else {
		echo 'Error!';
		}

	}

	else{


		if (isset($_GET['user_id']) && is_numeric($_GET['user_id']) && $_GET['user_id'] > 0){


			$user_id = $_GET['user_id'];
			$sql= "SELECT * FROM users WHERE user_id=$user_id";

			$stmt = $DB_con->prepare($sql);
			$stmt->execute(array(":user_id"=>$user_id));
			$userRow=$stmt->fetch(PDO::FETCH_ASSOC);


			//print_r($userRow);
			//$result = mysql_query("SELECT * FROM users WHERE user_id=$user_id")
			//or die(mysql_error());
			//$row = mysql_fetch_array($result);

				if($userRow){
					$user_name = $userRow['user_name'];

					$user_email = $userRow['user_email'];

					$user_pass = $userRow['user_pass'];

					renderForm($user_id, $user_name, $user_email, $user_pass, '');
				}

				else {

					echo "No results!";
				}

			}

	else {
		echo 'Error!';
	}

}

?>