<?php
header('Content-Type: application/json');
include("config.php");

$sql = "select * from monitor order by `stt` desc limit 6" ;
$result = mysqli_query($conn,$sql);
$data = array();
foreach ($result as $row){
    $data[]=$row;
}

$sql2 = "select * from control";
$result2 = mysqli_query($conn,$sql2);
$data2 = array();
foreach ($result2 as $row){
    $data2[]=$row;
}

mysqli_close($conn);

$returnObj = (object) [
    'monitor' => $data,
    'control' => $data2
];

echo json_encode($returnObj);
?>