<?php
session_start();
include "config.php";
$sem = $_REQUEST['semester'];
$rem = $_REQUEST['reminder']
$dead = $_REQUEST['deadline']
if($_SERVER['REQUEST_METHOD'] == "POST"){
        $insert_form_sql = mysqli_query($link,"INSERT INTO requestform (semesterID, reminder, deadline) VALUES ('$sem','$rem','$dead')");
        // $insert_form_sql = "INSERT INTO requestform (semesterID, reminder, deadline) VALUES (?, ?, ?)";
        // $stmt = mysqli_prepare($link, $insert_form_sql));
        // mysqli_stmt_bind_param($link, $sql);
        // $stmt = mysqli_prepare($link, $sql);
        if($insert_form_sql){
            mysqli_close($link);
            header("location:staff.php");
        }
        else{
            echo "insert didn't work.";
        }
    }

    ?>