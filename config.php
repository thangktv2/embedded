<?php
// Connect to database
$server = "127.0.0.1";
$user = "thangktv"; 
$pass = "Spkt@5079";
$dbname = "dashboard";

$conn = mysqli_connect($server,$user,$pass,$dbname);

// Check connection
if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>