<?php

echo "Exception Handling";

echo "<br><br>";

class FileExistException extends Exception{}
class FileReadException extends Exception{}
class FileWriteException extends Exception{}

$csvfile = 'zyx.csv';
try{
  try{
    $data = file_get_contents($csvfile);
    if($data === false){
      throw new Exception();
    }
  }
  catch(Exception $e){
    if(!file_exists($csvfile)){
      throw new FileExistException($csvfile." does not exist \n");
    }
    elseif(!is_readable($csvfile)){
      throw new FileReadException($csvfile." is not readable \n");
    }
    elseif(!is_writable($csvfile)){
      throw new FileWriteException($csvfile." is not writable \n");
    }
    else{
      throw new Exception(" Unknown error accessing file.");
    }
  }
}  
catch(FileExistException $fe){
  echo $fe->getMessage();
  error_log($fe->getTraceAsString());
}
catch(FileReadException $fr){
  echo $fr->getMessage();
  error_log($fr->getTraceAsString());
}
catch(FileWriteException $fw){
  echo $fw->getMessage();
  error_log($fw->getTraceAsString());
}



?>
