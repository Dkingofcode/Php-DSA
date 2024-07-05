<?php

 // Brute force solution
 function twoSum( array $numbers, int $target) {
     for( $i = 0; $i < count($numbers); $i++){
        for($j = $i + 1; $j < count($numbers); $j++){
             $x = $numbers[$i];
            if($numbers[$j] == $target - $x){
               return [$i, $j];
            }
        }
     }
     throw new Exception("No twoSum solution");
}

function twoSumHash(array $numbers, int $target) {
     $map = [];
     for( $i = 0; $i < count($numbers); $i++){
        $complement = $target - $numbers[$i];
        if(array_key_exists($complement, $map)){
            return [$map[$complement], $i];
        }
        $map[$numbers[$i]] = $i;

        }
    return [];  

}

    // Main code
     $numbers = [2, 7, 11, 15];
      $target = 22;
     
      $result = twoSumHash($numbers, $target); 
    

    echo "Indices:" . $result[0] . ", " . $result[1];






?>