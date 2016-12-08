<?php
  class HTMLCreator{
	  
	  public function UnorderedList($array){
      echo '<ul>';
      foreach($array as $item){
        echo "<li>$item</li>";
      }
      echo '</ul>';
    }
  }
?>