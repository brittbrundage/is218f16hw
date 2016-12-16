<?php
  class FileExceptionHandling{
    private $priv = true;
    
    public function __construct(){
    }
    
    function exists($firstname){
      $exists = file_exists($firstname);
      if ($exists) {
        echo "The file does exist.";
      }
      else{
        echo "The file doesn't exists.<br>";
		die();
      }
      return $exists;
    }
    
    function ableToWrite($firstname){
      $write = is_writable($firstname);

      return $write;
    }
    
    function writing($firstname, $txt){
        $fp = fopen($firstname, "w");
        fwrite($fp, $txt);
        fclose($fp);
    }
  }
  
?>




