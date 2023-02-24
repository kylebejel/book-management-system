<?php
// $bookTitle = $authorName = $edition = $publisher = $isbn = $semesterID = "";
session_start();
include "config.php";

$bookTitle = $_REQUEST['title'];
$authorName = $_REQUEST['author'];
$edition = $_REQUEST['edition'];
$publisher = $_REQUEST['publisher'];
$isbn = $_REQUEST['isbn'];
$id = $_GET['id'];
echo gettype($id);
echo $id;
$semesterID = $_REQUEST['semesterID'];


$stmt = "INSERT INTO book (semesterID, professorID, authorName, edition, publisher, bookTitle, isbn) VALUES ('$semesterID', '$id', '$authorName', '$edition', '$publisher', '$bookTitle', '$isbn')";

if($link === false){
    echo("ERROR");
}

if (mysqli_query($link, $stmt)){
    // echo "Records inserted successfully.";
    mysqli_close($link);
    header("location:newbookrequestform.php");
    exit;
}else{
    echo "ERROR: Could not able to execute .". mysqli_error($link);
}
?>