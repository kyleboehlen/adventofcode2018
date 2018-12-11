<?php
$input_array = explode(" ", $_POST['input']);
$char_array = array();
$track_array = array();
$output = '';
$two = 0;
$three = 0;
$found_two = false;
$found_three = false;
$i = 0;

foreach($input_array as $key => $value){
    $char_array = str_split($value);
    foreach($char_array as $key => $value){
        $track_array[$value]++;
    }
    foreach($track_array as $key => $value){
        if(!$found_two && $value == 2){
            $two++;
            $found_two = true;
        }
        if(!$found_three && $value == 3){
            $three++;
            $found_three = true;
        }
    }
    $track_array = array();
    $found_two = false;
    $found_three = false;
}

$output = $two * $three;
echo $output;
?>