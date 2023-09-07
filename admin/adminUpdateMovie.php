<?php 
    include 'connection.php';
    $mid;
    if(isset($_GET['mid'])) {
        $mid = $_GET['mid'];
        $selectQuery = "select * from tblmovie where mid={$_GET['mid']}";
        $data = mysqli_query($con, $selectQuery) or die('no data found');
        if(mysqli_num_rows($data) > 0) {
            $r = mysqli_fetch_assoc($data);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Movie Details</title>
    <style>
        *{
            box-sizing: border-box;
            margin: 0px;
            padding: 0px;
        }
        .main-container{
            display: flex;
            flex-direction: row;
        }

        .content{
            width: 100%;
        }
        form{
            width: 70%;
            margin: 30px auto;
            padding: 30px;
            border-radius: 30px;
            display: flex;
            flex-direction: column;
        }

        td{
            padding: 10px 20px;
        }

        input{
            background: none;
            width: 100%;
            margin-top: 7px;
            margin-bottom: 15px;
            background-color: lightblue;
            border: none;
            border-radius: 10px;
            padding: 10px;
            outline: none;
        }
        .btn{
            background-color: black;
            color: white;
            width: 50%;
            align-self: center;
            transition: all 0.3s ease-in-out;
        }
        .btn:hover{
            box-shadow: 0px 0px 10px gray;
            cursor: pointer;
        }
        h2{
            align-self: center;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="main-container">
        <div class="sidebar">
        <?php 
            include 'adminSidebar.php';
        ?>
        </div>
        <form enctype="multipart/form-data" action="adminUpdateMovieDetails.php?mid=<?php echo $mid;?>" method="post">
        <h2>Movie Details</h2>
            <table>
                <tbody>
                    <tr>
                        <td>
                            Movie Name
                            <input type="text" name="txtmname" value="<?php echo $r['mname'];?>" placeholder="Movie Name" required>
                        </td>
                        <td>
                            Languages
                            <input type="text" name="txtmlang" value="<?php echo $r['mlang'];?>" placeholder="Langues" required>
                        </td>
                        <td>
                            Duration
                            <input type="text" name="txtduration" value="<?php echo $r['duration'];?>" placeholder="Movie Play Time" required>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            Poster
                            <input type="file" name="poster" value="<?php echo $r['poster'];?>" >
                        </td>
                        <td>
                            Release Date
                            <input type="text" name="txtreleaseDate" value="<?php echo $r['release_date'];?>" placeholder="Release Date" required>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            Trailer Link
                            <input type="url" name="txttrailer" placeholder="Trailer Link" value="<?php echo $r['trailer'];?>" required>
                        </td>
                        <td>
                            Type
                            <input type="text" name="txttype" value="<?php echo $r['type'];?>" placeholder="Type" required>
                        </td>
                    </tr>

                    <tr>
                        <td colspan="3">
                            Star Cast
                            <input type="text" name="txtcast" value="<?php echo $r['cast'];?>" placeholder="Star Cast" required>
                        </td>
                    </tr>
                </tbody>
<?php 
        }
    }
?>
            </table>
            <input type="submit" value="Update Movie Details" name="btnupdate" class="btn">
    </form>
    </div>
</body>
</html>