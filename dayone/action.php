<?php 
$array = explode(" ", $_POST['input']);
$output = 0;
foreach($array as $key => $value){
    $output += intval(trim($value));
}
echo $output;
?>