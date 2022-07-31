<?php 

class Room 
{
    public function addLight($array) 
    {
        $horizontal = count($array[0]);
        $horizontalLine = 0;
        $vertical = count($array);
        $verticalLine = 0;
        
        $right = 0;
        $down = 0;
        $text = 'F';

        while($down < $vertical) {
            for($h = $right; $h < $horizontal; $h++) {
                if ($array[$verticalLine][$h] == 1) {
                    $right = ++$h;
                    break;
                }
                if ($array[$verticalLine][$h] == 0) {
                    if ($text == 'F') {
                        $horizontalLine = $h;
                    }
                    $array[$verticalLine][$h] = $text;
                    $text = 'L';
                }
            }

            for($v = $down; $v < $vertical; $v++) {
                if ($array[$v][$horizontalLine] == 1) break;
                if ($array[$v][$horizontalLine] == 0) {
                    $array[$v][$horizontalLine] = $text;
                }
            }

            if ($h >= $horizontal) {
                $right = 0;
                $verticalLine++;
                $down++;
            }

            $text = 'F';
        }

        return $array;
    }
}