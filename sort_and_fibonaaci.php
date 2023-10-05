<?php
 //function to check if a number is a fibonacci numbeer
 function isFibonacci($num){
    $a = 0;
    $b = 1;
    while($b < $num){
        $temp = $a;
        $a = $b;
        $b = $temp + $b;
    }
    return $b == $num;
 }
 //genrate an array of number from 0 to 100
 $numbers = range(0, 100);
 // initialize an empty array to hold fibo numbers
 $fibonacciNumbers = array();
 //check if the array is sorted in descending order
 if(rsort($numbers)){
    //filter and keep only fibonacci number from the 7th number
    $fibonacciNumbers = array_filter(array_slice($numbers,6),'isFibonacci');
 }
 // convert the array to JSON for easy display in the browser
 $jsonOutput = json_encode($fibonacciNumbers);
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <title> Question 1: Sorted Fibonacci Numbers starting from 7th Number</title>
</head>
<body>
    <h1>Sorted Fibonacci Numbers starting from 7th Number</h1>
    <p>JSON representation of the array:</p>
    <pre><?php echo $jsonOutput; ?></pre>

</body>
</html>