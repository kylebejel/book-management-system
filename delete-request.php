<?php
session_start();
include "config.php";
// echo "session started and config loaded";
// $id = $_GET['id'];
$sid = $_GET['semesterID'];
// echo $id;
$del = mysqli_query($link, "DELETE FROM requestform WHERE semesterID = '$sid'");
$del2 = mysqli_query($link, "DELETE FROM book WHERE semesterID = '$sid'");
if($del && $del2){
    // echo "del true";
    mysqli_close($link);
    header("location:staff.php");
    exit;
}
else{
    echo "Error with Delete";
}
?>