<?php
    $input = $_REQUEST["n"];
    if ($input > 30000){
      echo '<img src="https://images-wixmp-ed30a86b8c4ca887773594c2.wixmp.com/f/5a1f5c71-b0e5-4fdd-9e46-983dca48630e/dd6aoql-d28fced8-6395-489e-9485-c468832a6ec6.jpg/v1/fill/w_600,h_897,q_75,strp/got_em_by_starfruit_boi_dd6aoql-fullview.jpg?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOiJ1cm46YXBwOjdlMGQxODg5ODIyNjQzNzNhNWYwZDQxNWVhMGQyNmUwIiwiaXNzIjoidXJuOmFwcDo3ZTBkMTg4OTgyMjY0MzczYTVmMGQ0MTVlYTBkMjZlMCIsIm9iaiI6W1t7ImhlaWdodCI6Ijw9ODk3IiwicGF0aCI6IlwvZlwvNWExZjVjNzEtYjBlNS00ZmRkLTllNDYtOTgzZGNhNDg2MzBlXC9kZDZhb3FsLWQyOGZjZWQ4LTYzOTUtNDg5ZS05NDg1LWM0Njg4MzJhNmVjNi5qcGciLCJ3aWR0aCI6Ijw9NjAwIn1dXSwiYXVkIjpbInVybjpzZXJ2aWNlOmltYWdlLm9wZXJhdGlvbnMiXX0.7on5KNz1S7m8LosjwfLkgvMWmji-zbCwQf_1xMyAcdA">';
      exit();
    }
    function createArray($n) {
      $arr = [];
      for ($i = 0; $i <= $n; $i++){
        if ($i % 2 == 0) //only fill array with uneven numbers
          continue;
        else
          $arr[] = $i;
      };
      return $arr;
    };

    function calcLuckyNums($array,$x=3){
      $pointer = -1;
      for($i = 0; $i <= count($array); $i++){
        if($i == ($x+$pointer)){
          //unset($array[$i]);
          //array_splice($array,$1,1);
          $array[$i] = 'X';
          $pointer+=$x;
        }
      }
      for ($i = 0; $i < count($array); $i++) {
        if ($array[$i]=='X')
          array_splice($array,$i,1);
      }
      for($i = 0; $i < count($array); $i++){
        if($array[$i]==$x){
          if(!isset($array[$i+1])){ //edgecases n={3,..,6}_______
            foreach ($array as $value) {
              echo $value.',';
            }
            return;//____________________________________________
          }
          else {
            $newX = $array[$i+1];
          }
        }
      }
      if (!isset($newX)){ //edgecases n={1,2}____________________
        foreach ($array as $value) {
          echo $value.',';
        }
        return;//________________________________________________
      }
      if(($newX-1)<count($array)){
        calcLuckyNums($array,$newX);

      }
      else {
        foreach ($array as $value) {
          echo $value.',';
        }
      }
    };
    calcLuckyNums(createArray($input));


?>
