<?php
  class FileExceptionHandling{
    private $priv = true;
    
    public function __construct(){
    }
    
    function exists($name){
      $exists = file_exists($name);
      if ($exists) {
        echo "The file does exist.";
      }
      else{
        echo "The file doesn't exists.<br>";
		die();
      }
      return $exists;
    }
    
    function ableToWrite($name){
      $write = is_writable($name);

      return $write;
    }
    
    function writing($name, $txt){
        $fp = fopen($name, "w");
        fwrite($fp, $txt);
        fclose($fp);
    }
  }
  
?>




