<?php 
    include 'connection.php';
    $ch = $_POST['mname'];
    $query = "select * from tblmovie where mname like '%$ch%'";
    $data = mysqli_query($con, $query) or die('no data found');
    $rows = "";
    if(mysqli_num_rows($data) > 0) {
        while($r = mysqli_fetch_assoc($data)) {
            $rows .= "<tr><td>".$r['mname']."</td><td>".$r['mlang']."</td><td>".$r['duration']."</td><td>".$r['type']."</td><td>".$r['release_date']."</td><td>".$r['cast']."</td><td><a href='adminUpdateMovie.php?mid=".$r['mid']."'>Edit</a> &nbsp;&nbsp; <a href='adminDeleteMovie.php?mid=".$r['mid']."'>Delete</a></td></tr>";
        }
    }
    echo $rows;
?>