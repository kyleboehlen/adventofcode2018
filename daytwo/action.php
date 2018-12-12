<?php
//take input and put it into an array
$array = explode(" ", $_POST['input']);
//determine whether this is part one or part two
$part_two = ($_POST['part'] == 'parttwo');
//create other arrays for splitting chars and tracking differences
$char_array = array();
$char_array2 = array();
$track_array = array();
//other vars
$output = '';
$two = 0;
$three = 0;
$num_diff = 0;
$found_two = false;
$found_three = false;

//depending on which part
if(!$part_two){
    //iterate through each input string
    foreach($input_array as $key => $value){
        //split string into chars to compare
        $char_array = str_split($value);
        //count letter count for each char
        foreach($char_array as $key => $value){
            //add number of times char occurs to tracking array
            $track_array[$value]++;
        }
        //check tracking array for occurances of exactly 2 or 3 same chars
        foreach($track_array as $key => $value){
            //if an occurance of 2 is found, increment the tracking var for 2s
            if(!$found_two && $value == 2){
                $two++;
                //change flag to only count it once
                $found_two = true;
            }
            //if an occurance of 2 is found, increment the tracking var for 2s
            if(!$found_three && $value == 3){
                $three++;
                //change flag to only count it once
                $found_three = true;
            }
        }
        //reset tracking array for next string
        $track_array = array();
        //reset flags for next string
        $found_two = false;
        $found_three = false;
    }
    //calculate checksum
    $output = $two * $three;
}else{
    //loop through each string in the input array
    for($i = 0; $i < count($array); $i++){
        //split input array string into a char array
        $char_array = str_split($array[$i]);
        //loop through each string in the input array
        for($j = 0; $j < count($array); $j++){
            //split input array string into a char array
            $char_array2 = str_split($array[$j]);
            //loop through char arrays and compare differences
            for($k = 0; $k < count($char_array); $k++){
                //if the chars in the same position are not equal, increment the number of differences
                if($char_array[$k] != $char_array2[$k]){
                    $num_diff++;
                //otherwise if the same add the potential char to the output string
                }else{
                    $output .= $char_array[$k];
                }
            }
            //if the number of differences is exactly one, end the process as the result is now in output
            if($num_diff == 1){
                break(2);
            //otherwise, reset the output string and number of differences counter
            }else{
                $output = '';
                $num_diff = 0;
            }
        }
    }
}

echo $output;
?>