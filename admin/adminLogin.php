<?php 
    if(isset($_POST['btnlogin'])) {
        if($_POST['txtname'] == "Admin" && $_POST['txtpass'] == "Admin") {
            header('location: adminMovieDetails.php');
        } else {
            header('location: adminLogin.php');
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
</head>
<body>
    <div class="login-container">
        <form method="post">
            Username
            <input type="text" name="txtname">
            Password
            <input type="Password" name="txtpass">
            <input type="submit" value="Log in" name="btnlogin">
        </form>
    </div>
</body>
</html>