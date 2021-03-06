<html>

<ul class="topnav" id="myTopnav">
  <li><a href="https://web.njit.edu/~bmb23/is218f16/final/index.php">Home</a></li>
  <li><a class="active" href="https://web.njit.edu/~bmb23/is218f16/final/signin.php">Log In</a></li>
  <li><a href="https://web.njit.edu/~bmb23/is218f16/final/signup.php">Sign Up</a></li>
</ul>



<body>

<?php
require_once 'dbconfig.php';

if($user->is_loggedin()!="")
{
 $user->redirect('welcome.php');
}

if(isset($_POST['btn-login']))
{
 $uname = $_POST['txt_uname_email'];
 $umail = $_POST['txt_uname_email'];
 $upass = $_POST['txt_password'];
  
 if($user->login($uname,$umail,$upass))
 {
  $user->redirect('welcome.php');
 }
 else
 {
  $error = "Try Again!";
 } 
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login</title>
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css"  />
<link rel="stylesheet" href="style.css" type="text/css"  />
</head>
<body>
<div class="container">
     <div class="form-container">
        <form method="post">
            <h2>Log in</h2><hr />
            <?php
            if(isset($error))
            {
                  ?>
                  <div class="alert alert-danger">
                      <i class="glyphicon glyphicon-warning-sign"></i> &nbsp; <?php echo $error; ?> !
                  </div>
                  <?php
            }
            ?>
            <div class="form-group">
             <input type="text" class="form-control" name="txt_uname_email" placeholder="Name or Email" required />
            </div>
            <br />
            <div class="form-group">
             <input type="password" class="form-control" name="txt_password" placeholder="Password" required />
            </div>
            <div class="clearfix"></div><hr />
            <div class="form-group">
             <button type="submit" name="btn-login" class="btn btn-block btn-primary">
                 <i class="glyphicon glyphicon-log-in"></i>Log in
                </button>
            </div>
            <br />
            <label>No account? <a href="signup.php">Sign Up</a></label>
        </form>
       </div>
</div>

</body>
</html>