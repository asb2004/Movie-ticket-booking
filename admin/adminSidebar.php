<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <style>
        *{
            box-sizing: border-box;
            margin: 0px;
            padding: 0px;
        }
        .sidebar{
            width: 200px;
            background-color: lightblue;
            min-height: 100vh;
        }

        .sidebar img{
            width: inherit;
        }

        h3{
            margin-bottom: 20px;
        }

        .sidebar a{
            display: flex;
            align-items: center;
            text-decoration: none;
            color: black;
            padding: 10px;
            margin: 5px 10px;
            transition: all 0.5s;
        }

        .sidebar a span{
            margin: 5px;
        }

        .sidebar a:hover{
            border-radius: 10px;
            background-color: rgba(255, 255, 255, 0.462);
        }

    </style>
</head>
<body>
    <nav>
        <div class="sidebar">
            <img src="../person.png" alt="Admin"><center><h3>Admin</h3></center>
            <a href="adminMovieDetails.php"><span class="material-symbols-outlined">movie</span>Movies Details</a>
            <a href="adminUserDetails.php"><span class="material-symbols-outlined">person</span>User Details</a>
            <a href="adminTicketsDetails.php"><span class="material-symbols-outlined">confirmation_number</span>Tickets Data</a>
        </div>
    </nav>
</body>
</html>