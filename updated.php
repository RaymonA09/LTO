<?php
session_start();

// Database connection
$serverName = "LAPTOP-50DT4DQ6\SQLEXPRESS";
$connectionOptions = [
    "Database" => "WEBAPP",
    "Uid" => "",
    "PWD" => ""
];

$conn = sqlsrv_connect($serverName, $connectionOptions);
if ($conn === false) {
    die(print_r(sqlsrv_errors(), true));
}

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_SESSION['editUserID'])) {
    $userid = $_SESSION['editUserID'];
    $lastname = $_POST['lastname'] ?? '';
    $firstname = $_POST['firstname'] ?? '';
    $middlename = $_POST['middlename'] ?? '';
    $province = $_POST['Province'] ?? '';
    $city = $_POST['City'] ?? '';
    $street = $_POST['street'] ?? '';
    $house_no = $_POST['house_no'] ?? '';
    $contact = $_POST['contact'] ?? '';
    $tin = $_POST['tin'] ?? '';
    $nationality = $_POST['nationality'] ?? '';
    $gender = $_POST['gender'] ?? '';
    $birthdate = $_POST['birthdate'] ?? '';
    $height = $_POST['height'] ?? '';
    $weight = $_POST['weight'] ?? '';

    // SQL Update query
    $sql = "UPDATE USER_DATA SET 
                LASTNAME = ?, 
                FIRSTNAME = ?, 
                MIDDLENAME = ?, 
                PROVINCE = ?, 
                CITY = ?, 
                STREET = ?, 
                HOUSE_NO = ?, 
                CONTACT = ?, 
                TIN = ?, 
                NATIONALITY = ?, 
                GENDER = ?, 
                BIRTHDATE = ?, 
                HEIGHT = ?, 
                WEIGHT = ?
            WHERE USERID = ?";

    $params = [
        $lastname, 
        $firstname, 
        $middlename, 
        $province, 
        $city, 
        $street, 
        $house_no, 
        $contact, 
        $tin, 
        $nationality, 
        $gender, 
        $birthdate, 
        $height, 
        $weight, 
        $userid
    ];

    $stmt = sqlsrv_query($conn, $sql, $params);
    if ($stmt === false) {
        die(print_r(sqlsrv_errors(), true));
    } else {
        echo "Record updated successfully.";
        echo "<a href='registerget.php?userid=" . urlencode($userid) . "'><button>View My Updated Record</button></a>";

    }
} else {
    echo "Invalid request";
}
?>
