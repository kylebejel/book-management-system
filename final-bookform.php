<?php
session_start();
include "config.php";
// echo "session started and config loaded";
$id = $_GET['sid'];
// echo $id;
$show = mysqli_query($link, "SELECT professorID, authorName, edition, publisher, bookTitle, isbn FROM book WHERE semesterID = '$sid' ORDER BY professorID");
$echo mysqli_stmt_num_rows($show);
$echo 'we here';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Book Form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body{ font: 14px sans-serif; }
        .wrapper{ width: 360px; padding: 20px; }
    </style>
</head>
<body>
    <div class="wrapper">
        <table class="table">
            <tr>
                <td><strong>PROFESSOR ID</strong></td>
                <td><strong>AUTHOR NAME</strong></td>
                <td><strong>EDITION</strong></td>
                <td><strong>PUBLISHER</strong></td>
                <td><strong>BOOK TITLE</strong></td>
                <td><strong>ISBN</strong></td>
            </tr>
            <?php while($s = mysqli_fetch_array($show)){?>
                    <tr>
                        <td><?php echo $s['professorID'];?></td> 
                        <td><?php echo $s['authorName'];?></td> 
                        <td><?php echo $s['edition'];?></td>
                        <td><?php echo $s['publisher'];?></td>
                        <td><?php echo $s['bookTitle'];?></td>
                        <td><?php echo $s['isbn'];?></td>
                    </tr>
            <?php }?>
        </table>
    </div>
</body>
</html>
