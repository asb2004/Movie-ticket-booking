

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <title>Ticket Details</title>
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

        table{
            width: 90%;
            border: 2px solid black;
            margin: 20px auto;
        }

        thead{
            background-color: lightblue;
            font-weight: bold;
        }

        td{
            text-align: center;
            border: 1px solid black;
            padding: 10px;
        }
        .search-area{
            margin-left: 5%;
            margin-top: 20px;
        }
        .search-area input{
            border: 1px solid black;
            border-radius: 5px;
            padding: 10px;
            width: 20%;
        }
        h1{
            text-align: center;
            margin-top: 20px;
            margin-left: 5%;
            width: 90%;
            background-color: lightblue;
            border-radius: 10px;
            padding: 10px;
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

        <div class="content">
            <h1>User's Details</h1>
            <!-- <div class="search-area">
            Movie Name : <input type="text" name="txtsearch" id="txtsearch" placeholder="Enter Movie Name">
            </div> -->
            <?php 
                include 'connection.php';
                $query = "select * from tbltickets t, tbluser u, tblmovie m where t.mid=m.mid and t.uid=u.uid order by t.tid";
                $data = mysqli_query($con, $query) or die("can't load data...");
                if(mysqli_num_rows($data) > 0) { ?>
                    
            <table>
                <thead>
                    <tr>
                        <td>EmailID</td>
                        <td>Movie Name</td>
                        <td>Theater</td>
                        <td>City</td>
                        <td>Date</td>
                        <td>Show Time</td>
                        <td>Price</td>
                        <td>Tickets</td>
                        <td>Total Pay</td>
                    </tr>
                </thead>

                <tbody id="showdata">
                    <?php while($r = mysqli_fetch_assoc($data)) { ?>
                    <tr>
                        <td><?php echo $r['email']; ?></td>
                        <td><?php echo $r['mname']; ?></td>
                        <td><?php echo $r['theater']; ?></td>
                        <td><?php echo $r['city']; ?></td>
                        <td><?php echo $r['date']; ?></td>
                        <td><?php echo $r['show_time']; ?></td>
                        <td><?php echo $r['price']; ?></td>
                        <td><?php echo $r['no_of_ticket']; ?></td>
                        <td><?php echo $r['total_amt']; ?></td>
                    </tr>
                    <?php } ?>
                </tbody>

            <?php 
                } else {
                    echo "No Data Found!!";
                }
            ?>
            </table>
        </div>

        
    </div>

    <script>

        // $(document).ready(function() {
        //     $('#txtsearch').on("keyup", function() {
                
        //         let c = $(this).val();
        //         $.ajax({
        //             method: 'post',
        //             url: 'adminSearchMovie.php',
        //             data: {mname: c},
        //             success:function(response) {
        //                 $("#showdata").html(response);
        //             }
        //         });
        //     });
        // });

    </script>
</body>
</html>