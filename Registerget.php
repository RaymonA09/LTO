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

    $sql = "SELECT * FROM USER_DATA WHERE USERID = (SELECT MAX(USERID) FROM USER_DATA)";
    $result = sqlsrv_query($conn, $sql);
    if ($result === false){
        die(print_r(sqlsrv_error(), true));
    }
?>

<!DOCTYPE html>
<html lang="en"> 
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LTO Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
        th {
            background-color: #0056b3;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        .edit-btn {
            background-color: #4CAF50; /* Green */
            color: white;
            padding: 5px 10px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
            border-radius: 5px;
        }
    </style>
</head>
<body>

    <table>
        <thead>
            <th>Lastname</th>
            <th>Firstname</th>
            <th>Middlename</th>
            <th>Province</th>
            <th>City</th>
            <th>Street</th>
            <th>House</th>
            <th>Contact</th>
            <th>TIN</th>
            <th>Nationality</th>
            <th>Gender</th>
            <th>Birthdate</th>
            <th>Height</th>
            <th>Weight</th>
            <th>Action</th>
        </thead>
        <tbody>
        <?php
            while ($rows = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)){
                echo '<tr>
                    <td>'.htmlspecialchars($rows['LASTNAME']).'</td>
                    <td>'.htmlspecialchars($rows['FIRSTNAME']).'</td>
                    <td>'.htmlspecialchars($rows['MIDDLENAME']).'</td>
                    <td>'.htmlspecialchars($rows['PROVINCE']).'</td>
                    <td>'.htmlspecialchars($rows['CITY']).'</td>
                    <td>'.htmlspecialchars($rows['STREET']).'</td>
                    <td>'.htmlspecialchars($rows['HOUSE_NO']).'</td>
                    <td>'.htmlspecialchars($rows['CONTACT']).'</td>
                    <td>'.htmlspecialchars($rows['TIN']).'</td>
                    <td>'.htmlspecialchars($rows['NATIONALITY']).'</td>
                    <td>'.htmlspecialchars($rows['GENDER']).'</td>
                    <td>'.htmlspecialchars($rows['BIRTHDATE']->format('Y-m-d')).'</td>
                    <td>'.htmlspecialchars($rows['HEIGHT']).'</td>
                    <td>'.htmlspecialchars($rows['WEIGHT']).'</td>
                    <td><a href="update.php?userid='.urlencode($rows['USERID']).'" class="edit-btn">Edit</a></td>
                    <td><a href="view.php" class="edit-btn">Done</a></td>
                </tr>';
            }
        ?>
        </tbody>
    </table>

</body>
</html>
