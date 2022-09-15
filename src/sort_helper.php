<?php
function recursive($array) {
            if (count($array) < 2) {
                return $array;
            }
            else {
                $array1 = array_slice($array, 0, (int)(count($array) / 2));
                $array2 = array_slice($array, (int) (count($array) / 2), count($array));
                $array1 = recursive($array1);
                $array2 = recursive($array2);
                $i = 0; $j = 0;
                $result = array();
                while($i < count($array1) and $j < count($array2)) {
                    if($array1[$i] < $array2[$j]) {
                        $result[count($result)] = $array1[$i++];
                    }
                    else {
                        $result[count($result)] = $array2[$j++];
                    }
                }
                while($i < count($array1)) {
                    $result[count($result)] = $array1[$i++];
                }
                while($j < count($array2)) {
                    $result[count($result)] = $array2[$j++];
                }
                return $result;
            }
        }
?>