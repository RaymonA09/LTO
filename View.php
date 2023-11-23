<?php
        $serverName = "LAPTOP-50DT4DQ6\SQLEXPRESS";
        $connectionOptions = [
            "Database" => "WEBAPP",
            "Uid" => "",
            "PWD" => ""
        ];


        $conn = sqlsrv_connect($serverName, $connectionOptions);
        if($conn == false){
            die(print_r(sqlsrv_error(), true));
        }

        $sql = "SELECT LASTNAME, FIRSTNAME FROM USER_DATA WHERE USERID = (SELECT IDENT_CURRENT('USER_DATA'))";
        $result = sqlsrv_query($conn, $sql);
        $userID = sqlsrv_fetch_array($result);

    ?>

<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml"> 
  <head>
    <meta charset="utf-8">
    <meta name="viewport" 
    content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="form.css">
    <title>LTO Form</title>
    <style>
        body, html {
            height: 100%;
            margin: 0;
            font-family: 'Arial', sans-serif;
            background-color: #eceff1; /* Change the background color as per your preference */
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
        }

        .card {
            background-color: #ffffff;
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            width: 300px; /* Adjust width as needed */
            margin-top: 50px; /* Adjust margin as needed */
        }

        h2 {
            color: #444;
            margin-bottom: 20px;
        }

        button {
            background-color: #0056b3; /* Adjust button color as needed */
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px; /* Rounded corners for the button */
            font-size: 16px;
            cursor: pointer;
            margin-top: 20px;
            width: 100%; /* Button width is the same as the card width */
        }

        button:hover {
            background-color: #004494;
        }

        a {
            color: white;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
  </head>
  <body>
    <div class="card">
        <h2>Welcome, <?php echo $userID['FIRSTNAME']; ?> <?php echo $userID['LASTNAME']; ?></h2>
        <button><a href="Registerget.php">View my records</a></button>
        <button><a href="TOAupdate.php">Change Application Details</a></button>
    </div>
</body>
  </body>