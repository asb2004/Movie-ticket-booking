<?php
    include 'connection.php';
    $selectQueryMovie = "select * from  tblmovie where mid={$_GET['mid']}";
    $movie = mysqli_query($con, $selectQueryMovie) or die('No data Found');
    $mdata = mysqli_fetch_assoc($movie);

    $selectQueryUser = "select * from tbluser where uid={$_GET['uid']}";
    $user = mysqli_query($con, $selectQueryUser) or die('No User Data Found');
    $udata = mysqli_fetch_assoc($user);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Ticket</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu&display=swap" rel="stylesheet">
    <style>
        *{
            margin: 0px;
            padding: 0px;
            box-sizing: border-box;
        }

        body{
            background-color: #471aa02b;
        }
        .title-book{
            font-family: 'Ubuntu', sans-serif;
            font-size: 2.7rem;
            text-align: center;
            margin-top: 20px;
            font-weight: bold;
            color: #471AA0;
            animation: ticket 3s ease-in-out 0s infinite;
        }
        @keyframes ticket {
            0%{
                opacity: 0;
            }
            50%{
                opacity: 1;
            }
            100%{
                opacity: 0;
            }
        }
        .movie-container{
            display: flex;
            flex-direction: row;
            flex-wrap: wrap;
            font-family: 'Ubuntu', sans-serif;
            width: 80%;
            margin: auto;
            margin-top: 50px;
        }
        .movie-poster{
            position: relative;
            height: 400px;
            width: 300px;
            border-radius: 20px;
            overflow: hidden;
            margin-right: 40px;
        }
        .movie-poster img{
            height: inherit;
            width: inherit;
            opacity: 1;
        }

        .movie-poster a{
            text-decoration: none;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: #00000083;
            color: white;
            padding: 10px 20px;
            border-radius: 20px;
            cursor: pointer;
        }
       .movie-details{
            display: flex;
            justify-content: center;
            flex-direction: column;
        }

        .movie-name{
            margin-bottom: 30px;
        }

        .movie-details p{
            font-size: 20px;
            margin: 10px 0px;
        }
        form{
            width: 100%;
            margin-top: 50px;
            padding: 50px;
            border-top-left-radius: 50px;
            border-top-right-radius: 50px;
            background-color: white;
        }

        table{
            width: 100%;
        }

        tr{
            display: flex;
            flex-direction: row;
        }

        td{
            padding: 10px 20px;
            display: flex;
            flex-direction: column;
            width: 30%;
            margin: auto;
        }

        select,input{
            width: 70%;
            margin-top: 7px;
            margin-bottom: 15px;
            background-color: #471aa02b;
            border: none;
            border-radius: 10px;
            padding: 10px;
            outline: none;
        }
        .no{
            display: flex;
        }
        .noi{
            width: 20%;
            border-top-right-radius: 0px;
            border-bottom-right-radius: 0px;
        }
        .plus{
            border-left: 0px;
            border-right: 0px;
            outline: none;
            border-radius: 0px;
        }
        .minus{
            outline: none;
            border-radius: 0px;
            border-top-right-radius: 10px;
            border-bottom-right-radius: 10px;
        }
        .btn{
            width: 10%;
            cursor: pointer;
            background-color: #471aa02b;
            font-weight: bold;
        }
        h2 input{
            background-color: white;
            width: 30%;
            font-size: 1.3rem;
            font-weight: bold;
        }
        .btnbook{
            background-color: #471AA0;
            border: none;
            color: white;
            font-weight: bold;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="title-book">
        Book Your Tickets Now!!
    </div>
    <div class="movie-container">
        <div class="movie-poster">
            <img src="<?php echo $mdata['poster']; ?>" alt="Bachubhai">
            <a href="<?php echo $mdata['trailer']; ?>" target="blank"><i class="fa fa-play" style="color: white"></i>&nbsp;&nbsp;Trailer</a>
        </div>

        <div class="movie-details">
            <h1 class="movie-name"><?php echo $mdata['mname']; ?></h1>
            <p><?php echo $mdata['mlang']; ?></p>
            <p><?php echo $mdata['duration']; ?></p>
            <p><?php echo $mdata['type']; ?></p>
            <p><?php echo $mdata['release_date']; ?></p>
            <p><?php echo $mdata['cast']; ?></p>
        </div>
    </div>

    <div class="ticket-book">
        <form action="" method="post">
            <table>
                <tr>
                    <td>
                        User Name
                        <input type="text" name="txtusername" value="<?php echo $udata['name']; ?>" readonly>
                    </td>
                    <td>
                        Email ID
                        <input type="email" name="txtemail" value="<?php echo $udata['email']; ?>" readonly>
                    </td>
                    <td>
                        Mobile No
                        <input type="number" name="txtmobile" value="<?php echo $udata['mobileno']; ?>" readonly>
                    </td>
                </tr>

                <tr>
                    <td>
                        Movie Name
                        <input type="text" name="txtmovie" value="<?php echo $mdata['mname']; ?>" readonly>
                    </td>
                    <td>
                        Theater Name
                        <select name="txttheater">
                            <option value="Raj Imperial">Raj Imperial</option>
                            <option value="PVR">PVR</option>
                            <option value="Raj Hans">Raj Hans</option>
                        </select>
                    </td>
                    <td></td>
                </tr>

                <tr>
                    <td>
                        City
                        <select name="txtcity">
                            <option value="Surat">Surat</option>
                            <option value="Ahemdabad">Ahemdabad</option>
                            <option value="Baroda">Baroda</option>
                            <option value="Delhi">Delhi</option>
                            <option value="Mumbai">Mumbai</option>
                            <option value="Rajkot">Rajkot</option>
                            <option value="Pune">Pune</option>
                            <option value="Morvi">Morvi</option>
                        </select>
                    </td>

                    <td>
                        Date
                        <!-- <input type="date" name="txtdate"> -->
                        <select name="txtdate">
                            <option value="<?php echo date("d-m-y"); ?>"><?php echo date("d-m-y"); ?></option>
                            <option value="<?php echo date("d-m-y"); ?>"><?php echo date("d-m-y", strtotime('+1 day')); ?></option>
                            <option value="<?php echo date("d-m-y"); ?>"><?php echo date("d-m-y", strtotime('+2 day')); ?></option>
                        </select>
                    </td>
                    <td></td>
                </tr>

                <tr>
                    <td>
                        Show Time
                        <select name="txtshowtime">
                            <option value="09:00">Morning 09:00</option>
                            <option value="01:00">After-Noon 01:00</option>
                            <option value="07:00">Evening 07:00</option>
                        </select>
                    </td>
                    
                    <td>
                        Price
                        <select name="txtprice" id="txtprice" onchange="price()">
                            <option value="150">Silver 150</option>
                            <option value="200">Gold 200</option>
                            <option value="300">Platinum 300</option>
                        </select>
                    </td>

                    <td >
                        Tickets
                        <div class="no">
                            <input type="text" name="txtnoofticket" id="txtnoofticket" class="noi" value="1" readonly>
                            <input type="button" value="+" width="20px" class="btn plus" onclick="plus()">
                            <input type="button" value="-" width="20px" class="btn minus" onclick="minus()">
                        </div>
                    </td>
                </tr>

                <tr>
                    <td></td>
                    <td>
                        <h2>Total Payable Amount : 
                        <input type="text" name="txttotalamt" id="total" value="150" readonly></h2>
                    </td>
                    <td>
                        <input class="btnbook" type="submit" value="Book Show" name="book">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</body>
</html>

<script>
    let amt = parseInt(document.getElementById("txtprice").value);
    let cnt = parseInt(document.getElementById("txtnoofticket").value);

    function plus() {
        cnt = parseInt(document.getElementById("txtnoofticket").value);
        amt = parseInt(document.getElementById("txtprice").value);

        if (cnt > 0) {
            cnt++;
        }
        document.getElementById("txtnoofticket").value = cnt.toString();
        amt = amt * cnt;
        document.getElementById("total").value = amt.toString();
    }
    function minus() {
        cnt = parseInt(document.getElementById("txtnoofticket").value);
        amt = parseInt(document.getElementById("txtprice").value);
        if (cnt > 1) {
            cnt--;
        }
        document.getElementById("txtnoofticket").value = cnt.toString();
        amt = amt * cnt;
        document.getElementById("total").value = amt.toString();
    }

    function price() {
        amt = parseInt(document.getElementById("txtprice").value);
        cnt = parseInt(document.getElementById("txtnoofticket").value);
        amt = amt * cnt;
        document.getElementById("total").value = amt.toString();
    }
</script>

<?php 
    if(@($_POST['book'])) {
        $insertQuery = "insert into tbltickets(mid,uid,city,theater,date,show_time,price,no_of_ticket,total_amt) values({$_GET['mid']},{$_GET['uid']},'{$_POST['txtcity']}','{$_POST['txttheater']}','{$_POST['txtdate']}','{$_POST['txtshowtime']}',{$_POST['txtprice']},{$_POST['txtnoofticket']},{$_POST['txttotalamt']})";
        $res = mysqli_query($con, $insertQuery) or die("Not Inserted!");
        if ($res) {
            //header('location: ThankYou.php');
            echo "<script>alert('Ticket Booked!!');
                window.location.href = 'ThankYou.php';
                </script>";
        } else {
            echo "<script>alert('Ticket Not Booked!!/nTry Again...')</script>";
        }
       //header('location: ThankYou.php');
       
    }
?>