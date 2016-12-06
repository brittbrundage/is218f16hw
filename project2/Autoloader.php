<?php
  class BrittaniAutoloader{
    public static function loader($class){
      $filename = strtolower($class) . '.php';
      $file = 'class/' . $filename;
      if (!file_exists($file)){
        return false;
      }
      include $file;
    }
  }
?>