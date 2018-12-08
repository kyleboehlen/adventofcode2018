<?php 
//take input and put it into an array
$array = explode(" ", $_POST['input']);
//determine whether this is part one or part two
$part_two = ($_POST['part'] == 'parttwo');
//inital var values
$frequency = 0;
$frequencies = array();
$found_value = false;
$output = '';

//loop until correct value is found
while(!$found_value){
    //loop through input array
    foreach($array as $key => $value){
        //calculate new frequency
        $frequency += intval(trim($value));
        if($part_two && !$found_value){
            /*if part two and the value hasn't been found yet
            check if the current frequency has already occured
            in the past*/
            if(in_array($frequency, $frequencies)){
                //set output to current frequency
                $output = $frequency;
                //value has been found, set flag
                $found_value = true;
            }
        }elseif(!$part_two){
            //if part one just assign the current frequency to the output
            $output = $frequency;
        }
    
        //add current frequency to array of historical frequencies
        array_push($frequencies, $frequency);
    }
    if(!$part_two){
        //if part one, set flag after first input foreach
        $found_value = true;
    }
}

echo $output;
?>