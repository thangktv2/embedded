<?php
// ket noi database
include("config.php");

if (!empty($_POST['fan'])) {
    $fan_state = $_POST['fan'];
    $sql = "update control set fan_state='$fan_state'";
}
if (!empty($_POST['light'])) {
    $light_state = $_POST['light'];
    $sql = "update control set light_state='$light_state'";
}
if (!empty($_POST['air'])) {
    $air_state = $_POST['air'];
    $sql = "update control set air_state='$air_state'";
}

mysqli_query($conn, $sql);
mysqli_close($conn);
?>