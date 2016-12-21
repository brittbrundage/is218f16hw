<html>

<ul class="topnav" id="myTopnav">
  <li><a href="https://web.njit.edu/~bmb23/is218f16/final/index.php">Home</a></li>
  <li><a href="https://web.njit.edu/~bmb23/is218f16/final/signin.php">Log In</a></li>
  <li><a class="active" href="https://web.njit.edu/~bmb23/is218f16/final/signup.php">Sign Up</a></li>
</ul>

<body>

<?php
require_once 'dbconfig.php';

//if($user->is_loggedin()!="")
//{
   // $user->redirect('home.php');
//}

if(isset($_POST['btn-signup']))
{
   $uname = trim($_POST['txt_uname']);
   $umail = trim($_POST['txt_umail']);
   $upass = trim($_POST['txt_upass']); 
 
   if($uname=="") {
      $error[] = "Missing username!"; 
   }
   else if($umail=="") {
      $error[] = "Missing email!"; 
   }
   else if(!filter_var($umail, FILTER_VALIDATE_EMAIL)) {
      $error[] = 'Please enter a valid email address!';
   }
   else if($upass=="") {
      $error[] = "Missing password!";
   }
   else if(strlen($upass) < 6){
      $error[] = "Password must be longer than 6 characters"; 
   }
   else
   {
      try
      {
         $stmt = $DB_con->prepare("SELECT user_name,user_email FROM users WHERE user_name=:uname OR user_email=:umail");
         $stmt->execute(array(':uname'=>$uname, ':umail'=>$umail));
         $row=$stmt->fetch(PDO::FETCH_ASSOC);
    
         if($row['user_name']==$uname) {
            $error[] = "Username is already registered!";
         }
         else if($row['user_email']==$umail) {
            $error[] = "Email is already registered!";
         }
         else
         {
            if($user->register($fname,$lname,$uname,$umail,$upass)) 
            {
                $user->redirect('welcome.php');
            }
         }
     }
     catch(PDOException $e)
     {
        echo $e->getMessage();
     }
  } 
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Sign up</title>
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css"  />
<link rel="stylesheet" href="style.css" type="text/css"  />
</head>
<body>
<div class="container">
     <div class="form-container">
        <form method="post">
            <h2>Sign up</h2><hr />
            <?php
            if(isset($error))
            {
               foreach($error as $error)
               {
                  ?>
                  <div class="alert alert-danger">
                      <i class="glyphicon glyphicon-warning-sign"></i> &nbsp; <?php echo $error; ?>
                  </div>
                  <?php
               }
            }
            else if(isset($_GET['joined']))
            {
                 ?>
                 <div class="alert alert-info">
                      <i class="glyphicon glyphicon-log-in"></i> &nbsp; Successfully registered <a href='index.php'>login</a> here
                 </div>
                 <?php
            }
            ?>
            <div class="form-group">
            <input type="text" class="form-control" name="txt_uname" placeholder="Name" value="<?php if(isset($error)){echo $uname;}?>" /> 
            </div>
            <br />
            <div class="form-group">
            <input type="text" class="form-control" name="txt_umail" placeholder="Email" value="<?php if(isset($error)){echo $umail;}?>" />
            </div>
            <br />
            <div class="form-group">
             <input type="password" class="form-control" name="txt_upass" placeholder="Password" />
            </div>
            <div class="clearfix"></div><hr />
            <div class="form-group">
             <button type="submit" class="btn btn-block btn-primary" name="btn-signup">
                 <i class="glyphicon glyphicon-open-file"></i>Sign up
                </button>
            </div>
            <br />
            <label>Have an account? <a href="index.php">Sign In</a></label>
        </form>
       </div>
</div>

</body>
</html>