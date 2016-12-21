<?php
include_once 'dbconfig.php';
if(!$user->is_loggedin())
{
 $user->redirect('signin.php');
}
$user_id = $_SESSION['user_session'];
$stmt = $DB_con->prepare("SELECT * FROM users WHERE user_id=:user_id");
$stmt->execute(array(":user_id"=>$user_id));
$userRow=$stmt->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css"  />
<link rel="stylesheet" href="style.css" type="text/css"  />

<ul class="topnav" id="myTopnav">
  <li><a class="active" href="https://web.njit.edu/~bmb23/is218f16/final/index.php">Home</a></li>
  <li><a href="https://web.njit.edu/~bmb23/is218f16/final/signin.php">Log In</a></li>
  <li><a href="https://web.njit.edu/~bmb23/is218f16/final/signup.php">Sign Up</a></li>
  <div class="right">
  <li><a href="logout.php?logout=true"><i class="glyphicon glyphicon-log-out"></i> Logout</a></li>
    </div>
</ul>

<title>Welcome: <?php print($userRow['user_name']); ?></title>




</head>

<body>


<div class="content">
Welcome: <?php print($userRow['user_name']); ?>
</div>
</body>
</html>