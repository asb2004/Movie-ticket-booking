<?php
    include 'connection.php';
    //$con = mysqli_connect('localhost','root','','abhi') or die('not connected');
    $query = "select * from tblmovie order by mid desc";
    $data = mysqli_query($con, $query) or die('no data found');
    $login = false;
    $uid = 0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FilmShow</title>
    <link rel="stylesheet" href="homePageStyle.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        .userprofile{
            position: absolute;
            right: 35px;
            width: 25%;
            display: none;
            justify-content: end;
            align-items: center;
            flex-direction: row;
        }

        .userprofile .name{
            display: flex;
            flex-direction: column;
            align-items: end;
        }

        .userprofile p{
            margin-top: 5px;
        }

        .userprofile img{
            width: 70px;
        }

        .footer{
            display: flex;
            justify-content: center;
            background-color: black;
            color: white;
        }
        .search-bar{
            width: 140%;
            display: flex;
            justify-content: end;
        }
        .search-bar form{
            display: flex;
            flex-direction: row;
            padding: 10px;
        }

        .search-bar input{
            padding: 10px;
            border: 1px solid #471AA0;
            border-radius: 5px;
            font-size: 15px;
            margin: 5px;
        }
    </style>
</head>
<body>
    <nav class="navbar">
        <div class="nav-items">
            <img class="logo" src="filmshow_logo.png" alt="FilmShow">
            <div class="search-bar">
                <form action="" method="post"><input type="search" name="txtsearch" placeholder="Search" aria-label="Search">
                <input type="submit" class="signin" value="Search" name="btnsearch"></form>
            </div>
            <div class="nav-button">
                <input class="signin" type="button" value="Signup" id="signup">
                <input class="login" type="button" value="Login" id="login">
            </div>
            <div class="userprofile">
                <div class="name">
                    <p>Welcome!</p>
                    <h2 id="username"></h2>
                </div>
                <img src="person.png" alt="">
                <form action="" method="post"><input class="signin" type="submit" value="Sign out" id="signout" name="signout"></form>
            </div>
        </div>
    </nav>

    <?php

        if(isset($_POST['btnsearch'])) {
            $query = "select * from tblmovie where mname='{$_POST['txtsearch']}'";
            $data = mysqli_query($con, $query) or die('no data found');
        }

        if(isset($_POST['signout'])) {
            $login = false;
        }
    ?>

    <div class="login-popup-bg"></div>

    <div class="login-popup" id="loginPopup">
        <input class="login-close" type="button" name="closeLogin" id="closeLogin" value="x">
        <h2>Log in</h2>
        <form action="" method="post" class="hpform">
            <label for="txtemail">EmailID</label>
            <input class="login-txtfield" type="email" name="txtemail" id="txtemail" placeholder="abcd@xyz.com">
            <label for="password">Password</label>
            <input class="login-txtfield" type="password" name="txtpassword" id="txtpassword" placeholder="Password">
            <input class="btnlogin" type="submit" name="btnLogin" id="loginbtn" value="Login">
            <a href="">Forgot password?</a>
            <p>Don't have an account?<a id="lregistration"><u>Register</u></a></p>
        </form>
    </div>

    <?php
        $username;
        if(isset($_POST['btnLogin'])) {
            $selectQuery = "select * from tbluser where email='{$_POST['txtemail']}' and password='{$_POST['txtpassword']}'";
            $q = mysqli_query($con, $selectQuery);
            if(mysqli_num_rows($q) > 0) {
                $row = mysqli_fetch_assoc($q);
                $username = $row['name'];
                $uid = $row['uid'];
                $login = true; ?>

            <script>
                document.querySelector("#login").style.display = "none";
                document.querySelector("#signup").style.display = "none";
                document.querySelector('.userprofile').style.display = "flex";
                document.querySelector("#username").innerHTML = "<?php echo $username; ?>";
            </script>
                
            <?php } else { ?>
                <script>
                    alert('invalid Email or Password!');
                    document.querySelector(".login-popup-bg").classList.add("show-login-popup-bg");
                    document.querySelector("#loginPopup").classList.add("show-login-popup");
                </script>
            <?php }
        }
    ?>

    <div class="registration-popup" id="registrationPopup">
        <input class="login-close" type="button" name="closeRegistration" id="closeRegistration" value="x">
        <h2>Registration</h2>
        <form action="" method="post" class="hpform">
            <label for="txtrname">Name</label>
            <input class="login-txtfield" type="text" name="txtrname" id="txtrname" placeholder="Enter Your Name">
            <label for="txtrmobile">Mobile No.</label>
            <input class="login-txtfield" type="number" name="txtrmobile" id="txtrmobile" placeholder="Enter Mobile No.">
            <label for="txtremail">EmailID</label>
            <input class="login-txtfield" type="email" name="txtremail" id="txtremail" placeholder="abc@xyz.com">
            <label for="txtrpassword">Password</label>
            <input class="login-txtfield" type="password" name="txtrpassword" id="txtrpassword" placeholder="Password">
            <label for="txtrcpassword">Confirm Password</label>
            <input class="login-txtfield" type="password" name="txtrcpassword" id="txtrcpassword" placeholder="Confirm Password">
            <input class="btnlogin" type="submit" value="Registration" name="btnsignup">
            <p>Already have an account?<a id="rlogin"><u>Login</u></a></p>
        </form>
    </div>

    <?php 
        if(isset($_POST['btnsignup'])) {
            $selectQuery = "select * from tbluser where email='{$_POST['txtremail']}'";
            $q = mysqli_query($con, $selectQuery) or die('not found');
            if(mysqli_num_rows($q) > 0) { ?>
            
                <script>
                    alert('User Already Exists!');
                    document.querySelector(".login-popup-bg").classList.add("show-login-popup-bg");
                    document.querySelector(".registration-popup").classList.add("show-registration-popup");
                    document.querySelector("#loginPopup").classList.remove("show-login-popup");
                </script>
                
            <?php } else {
                $insertQuery = "insert into tbluser(name,mobileno,email,password) values('{$_POST['txtrname']}','{$_POST['txtrmobile']}','{$_POST['txtremail']}','{$_POST['txtrpassword']}')";
                mysqli_query($con, $insertQuery) or die('Not Registered!');
                $login = true; ?>
                
                <script>
                    alert('Registration Successfully!');
                    document.querySelector(".login-popup-bg").classList.add("show-login-popup-bg");
                    document.querySelector("#loginPopup").classList.add("show-login-popup");
                </script>
                
            <?php }
        }
    ?>

    <div class="movie-list">
        <?php
            if(mysqli_num_rows($data) > 0) {
                while($r = mysqli_fetch_assoc($data)) {
        ?>
        <div class="movie-container">
            <div class="movie-img">
                <img src="<?php echo $r['poster']; ?>" alt="<?php echo $r['mname']; ?>">
            </div>
            <div class="movie-dis">
                <p class="title"><?php echo $r['mname']; ?></p>
                <p class="sub-title"><?php echo $r['mlang']; ?></p>
            </div>
            <hr>
            <input type="button" value="Book Ticket" class="book-button" onclick="bookticket(<?php echo $r['mid']?>)">
        </div>
        <?php
                }
            } else {
                echo 'no data found!';
            }
        ?>
    </div>

    <div class="footer">
        &copy;Copyrights www.filmshow.com
    </div>

    <script>
        function bookticket(mid) {
            let login = <?php if($login) { echo "true"; } else { echo "false"; } ?>;
            let uid = <?php echo $uid ?>;
            if(login) {
                window.location.href = `ticketBook.php?mid=${mid}&uid=${uid}`;
            } else {
                document.documentElement.scrollTop = 0;
                document.querySelector(".login-popup-bg").classList.add("show-login-popup-bg");
                document.querySelector("#loginPopup").classList.add("show-login-popup");
            }
        } 
    </script>

    <script src="HomePage.js"></script>
</body>
</html>