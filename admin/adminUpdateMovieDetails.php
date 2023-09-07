<?php

    include 'connection.php';
    $mid = $_GET['mid'];
    if(isset($_POST['btnupdate'])) {
        $updateQuery = "update tblmovie set mname='{$_POST['txtmname']}', mlang='{$_POST['txtmlang']}',duration='{$_POST['txtduration']}',release_date='{$_POST['txtreleaseDate']}',trailer='{$_POST['txttrailer']}',type='{$_POST['txttype']}',cast='{$_POST['txtcast']}' where mid=$mid";
        
        mysqli_query($con, $updateQuery) or die('record not updated!!');
        header('location: adminMovieDetails.php');
    }
?>