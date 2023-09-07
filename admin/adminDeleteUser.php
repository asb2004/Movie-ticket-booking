<?php
    include 'connection.php';
    if(isset($_GET['uid'])) {
        $query = "delete from tbluser where uid={$_GET['uid']}";
        mysqli_query($con, $query) or die("Not Deleted");
        header('location: adminUserDetails.php');
    }
?>