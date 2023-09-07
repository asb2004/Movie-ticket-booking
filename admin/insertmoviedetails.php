<?php
    include 'connection.php';
    if(isset($_POST['btnsave'])) {
        $uploadFile = 'images/'. basename($_FILES['poster']['name']);
        $savePath = '../images/'. basename($_FILES['poster']['name']);
        if(move_uploaded_file($_FILES['poster']['tmp_name'], $savePath)) {
            echo "file saved successfully";
        } else {
            echo "not saved.";
        }

        $query = "insert into tblmovie(mname,mlang,poster,duration,type,release_date,cast,trailer) values('{$_POST['txtmname']}','{$_POST['txtmlang']}','{$uploadFile}','{$_POST['txtduration']}','{$_POST['txttype']}','{$_POST['txtreleaseDate']}','{$_POST['txtcast']}','{$_POST['txttrailer']}')";
        mysqli_query($con, $query) or die("Not Saved!");
        header('location: adminMovieDetails.php');
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Movie Details</title>
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
        <form enctype="multipart/form-data" action="" method="post">
        <h2>Movie Details</h2>
            <table>
                <tbody>
                    <tr>
                        <td>
                            Movie Name
                            <input type="text" name="txtmname" placeholder="Movie Name" required>
                        </td>
                        <td>
                            Languages
                            <input type="text" name="txtmlang" placeholder="Langues" required>
                        </td>
                        <td>
                            Duration
                            <input type="text" name="txtduration" placeholder="Movie Play Time" required>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            Poster
                            <input type="file" name="poster" required>
                        </td>
                        <td>
                            Release Date
                            <input type="text" name="txtreleaseDate" placeholder="Release Date" required>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            Trailer Link
                            <input type="url" name="txttrailer" placeholder="Trailer Link" required>
                        </td>
                        <td>
                            Type
                            <input type="text" name="txttype" placeholder="Type" required>
                        </td>
                    </tr>

                    <tr>
                        <td colspan="3">
                            Star Cast
                            <input type="text" name="txtcast" placeholder="Star Cast" required>
                        </td>
                    </tr>
                </tbody>
            </table>
            <input type="submit" value="Add Movie" name="btnsave" class="btn">
    </form>
    </div>
</body>
</html>