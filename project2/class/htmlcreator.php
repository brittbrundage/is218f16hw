<?php
  class HTMLCreator{
	  
	  public function UnorderedList($array){
      echo '<ul>';
      foreach($array as $item){
        echo "<li>$item</li>";
      }
      echo '</ul>';
    }
	
	public function link($txt, $link){
      echo "<a href=$link>$txt</a>";
    }
	
	public function table($tablearray, $head=False){
      echo '<table border=2>';
      if ($head == True){
        $len = count($tablearray[0]);
        $arraykeys = array_keys($tablearray);
        echo '<tr><thead>';
        foreach($arraykeys as $head){
          echo '<th>'.$head.'</th>';
        }
        echo '</thead></tr>';
        $c = "0";
        foreach($tablearray as $attribute){
          $tmparray = array();
          foreach($tablearray as $innerarray){
            array_push($tmparray, $innerarray[$c]);
          }
          echo '<tr>';
          foreach($tmparray as $key){
            echo '<td>'.$key.'</td>';
          }
          echo '</tr>';
          $c+="1";
        }
      }
      else{
        foreach($tablearray as $attribute){
          echo '<tr>';
          foreach($attribute as $key){
            echo '<td>'.$key.'</td>';
          }
          echo '</tr>';
        }
      }
      echo '</table>';
    }
	
  }
?>