<?php
    include 'connection.php';
    if(isset($_GET['mid'])) {
        $query = "delete from tblmovie where mid={$_GET['mid']}";
        mysqli_query($con, $query) or die("Not Deleted");
        header('location: adminMovieDetails.php');
    }
?>