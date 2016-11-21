<?php

echo "Exception Handling";

echo "<br><br>";

if(!file_exists("abc.csv")) {
      die("File not found");
   }
   
else {
      $file = fopen("abc.csv","r");
      print "File Opened sucessfully";
   }


?>
