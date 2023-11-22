<?php 
$LastnameErr = $FirstnameErr = $ProvinceErr = $CityErr = $StreetErr = $HouseErr = $ContErr = $NationalityErr = $GenderErr = $checkboxERR = $BirthdateErr = $HeightErr =  $WeightErr = $LicenseErr = $SkillErr = $EducationErr = $bloodtypeErr = $DonorErr = $CivilErr = $HairErr = $EyesErr = $BuiltErr = $ComplexionErr =  $Province1Err = $City1Err = "";
$Middlename = $Tin = $FatherLastname = $FatherFirstname = $FatherMiddlename = $MotherLastname = $MotherMiddlename = $MotherFirstname = $SpouseFirstname = $SpouseMiddlename = $SpouseLastname =  $businessname = $prevlastname = $prevfirstname = $prevmiddlename = $signature ="";
$ContLenErr ="";
$variables = ['Lastname', 'Firstname', 'Province', 'City', 'Street', 'House', 'Nationality', 'Gender', 'Height', 'Weight', 'bloodtype', 'Hair' , 'Civil' , 'Donor' , 'Eyes' , 'Built' , 'Complexion'];

foreach ($variables as $variable) {
    if (empty($_POST[$variable])) {
        ${$variable . 'Err'} = ucfirst($variable) . " is required";
    } else {
        ${$variable . 'Err'} = "";
    }
}

// Check if any validation errors occurred
$validationPassed = true;
foreach ($variables as $variable) {
    if (!empty(${$variable . 'Err'})) {
        $validationPassed = false;
        break;
    }
}

if (empty($_POST['Tin'])) {
    $Tin = "000-000-000-000";
} else {
    $Tin = $_POST['Tin'];
}

if (empty($_POST['Middlename'])) {
    $Middlename = "NA";
} else {
    $Middlename = $_POST['Middlename'];
}

if (empty($_POST['FatherLastname'])) {
    $FatherLastname = "Cruz";
} else {
    $FatherLastname = $_POST['FatherLastname'];
}

if (empty($_POST['MotherLastname'])) {
    $MotherLastname = "Cruz";
} else {
    $MotherLastname = $_POST['MotherLastname'];
}

if (empty($_POST['SpouseLastname'])) {
    $SpouseLastname = "Cruz";
} else {
    $SpouseLastname = $_POST['SpouseLastname'];
}

if (empty($_POST['FatherFirstname'])) {
    $FatherFirstname = "Juan";
} else {
    $FatherFirstname = $_POST['FatherFirstname'];
}

if (empty($_POST['MotherFirstname'])) {
    $MotherFirstname = "Maria";
} else {
    $MotherFirstname = $_POST['MotherFirstname'];
}

if (empty($_POST['SpouseFirstname'])) {
    $SpouseFirstname = "Juan";
} else {
    $SpouseFirstname = $_POST['SpouseFirstname'];
}

if (empty($_POST['FatherMiddlename'])) {
    $FatherMiddlename = "Dela";
} else {
    $FatherMiddlename = $_POST['FatherMiddlename'];
}

if (empty($_POST['MotherMiddlename'])) {
    $MotherMiddlename = "Dela";
} else {
    $MotherMiddlename = $_POST['MotherMiddlename'];
}

if (empty($_POST['SpouseMiddlename'])) {
    $SpouseMiddlename = "Dela";
} else {
    $SpouseMiddlename = $_POST['SpouseMiddlename'];
}

if (empty($_POST['PrevLastname'])) {
    $prevlastname = "Cruz";
} else {
    $prevlastname = $_POST['PrevLastname'];
}

if (empty($_POST['PrevFirstname'])) {
    $prevfirstname = "Juan";
} else {
    $prevfirstname = $_POST['PrevFirstname'];
}

if (empty($_POST['PrevMiddlename'])) {
    $prevmiddlename = "Dela";
} else {
    $prevmiddlename = $_POST['PrevMiddlename'];
}


if (empty($_POST['Province1'])){
    $Province1Err = "Select Birthplace Province";
}

if (empty($_POST['City1'])){
    $City1Err = "Select Birthplace City";
}

if (empty($_POST['Businessname'])){
    $businessname = 'ABC Corporation';
} else {
    $businessname = $_POST['Businessname'];
}

if (empty($_POST['Province2'])){
    $Province2 = 'ABC Province';
} else {
    $Province2 = $_POST['Province2'];
}

if (empty($_POST['City2'])){
    $City2 = 'ABC City';
} else {
    $City2 = $_POST['City2'];
}

if (empty($_POST['Street1'])){
    $Street2 = 'ABC Street';
} else {
    $Street2 = $_POST['Street1'];
}

if (empty($_POST['EmployerNo'])){
    $businesscontact = '9999-999-9999';
} else {
    $businesscontact = $_POST['EmployerNo'];
}

if (empty($_POST['signaturecert'])){
    $signature = 'Empty';
} else {
    $signature = $_POST['signaturecert'];
}

if (isset($_POST['Cont']) && strlen($_POST['Cont']) != 11){
    $ContLenErr = "Enter 11 digits Contact Number";
}


if (
    empty($_POST['A']) &&
    empty($_POST['B']) &&
    empty($_POST['C1']) &&
    empty($_POST['C2']) &&
    empty($_POST['D']) &&
    empty($_POST['E']) &&
    empty($_POST['F']) &&
    empty($_POST['G']) &&
    empty($_POST['H1']) &&
    empty($_POST['H2']) &&
    empty($_POST['H3']) &&
    empty($_POST['H4']) &&
    empty($_POST['H5']) &&
    empty($_POST['H6'])
) { 
    $checkboxERR = "Select one TOA (TYPE OF APPLICATION)";
}   

if (empty($_POST['License'])){
    $LicenseErr = "Select one TLA (TYPE OF LICENSE APPLIED FOR)";
}
if (empty($_POST['Skill'])){
    $SkillErr = "Select one DSA (DRIVING SKILL ACQUIRED OR WILL BE ACQUIRED THRU)";
}
if (empty($_POST['Education'])){
    $EducationErr = "Select one EA (EDUCATIONAL ATTAINMENT)";
}

if (empty($_POST['Bday'])){
    $BirthdateErr = "Birthdate is required";
}

if (empty($_POST['Cont'])){
    $ContErr = "Please input Contact Number";
}



?>


<?php 
$serverName="LAPTOP-50DT4DQ6\SQLEXPRESS";
$connectionOptions=[
    "Database"=>"WEBAPP",
    "Uid"=>"",
    "PWD"=>""
];

$conn=sqlsrv_connect($serverName,$connectionOptions);
if($conn==false){
    die(print_r(sqlsrv_error(),true));
}else {echo 'Connection Successfully established';}



if ($_SERVER["REQUEST_METHOD"] == "POST" && $validationPassed){
$Lastname=$_POST['Lastname'];
$Firstname=$_POST['Firstname'];
$Province=$_POST['Province'];
$City=$_POST['City'];
$Street=$_POST['Street'];
$House=$_POST['House'];
$Cont=$_POST['Cont'];
$Nationality=$_POST['Nationality'];
$Gender = isset($_POST['Gender']) ? $_POST['Gender'] : '';
$Birthdate=$_POST['Bday'];
$Height=$_POST['Height'];
$Weight=$_POST['Weight'];

$A = isset($_POST['A']) ? $_POST['A'] : 0;
$B = isset($_POST['B']) ? $_POST['B'] : 0;
$C1 = isset($_POST['C1']) ? $_POST['C1'] : 0;
$C2 = isset($_POST['C2']) ? $_POST['C2'] : 0;
$D = isset($_POST['D']) ? $_POST['D'] : 0;
$E = isset($_POST['E']) ? $_POST['E'] : 0;
$F = isset($_POST['F']) ? $_POST['F'] : 0;
$G = isset($_POST['G']) ? $_POST['G'] : 0;
$H1 = isset($_POST['H']) ? $_POST['H'] : 0;
$H2 = isset($_POST['H2']) ? $_POST['H2'] : 0;
$H3 = isset($_POST['H3']) ? $_POST['H3'] : 0;
$H4 = isset($_POST['H4']) ? $_POST['H4'] : 0;
$H5 = isset($_POST['H5']) ? $_POST['H5'] : 0;
$H6 = isset($_POST['H6']) ? $_POST['H6'] : 0;

$t1 = isset($_POST['License']) && $_POST['License'] === '1' ? 1 : 0;
$t2 = isset($_POST['License']) && $_POST['License'] === '2' ? 1 : 0;
$t3 = isset($_POST['License']) && $_POST['License'] === '3' ? 1 : 0;
$t4 = isset($_POST['License']) && $_POST['License'] === '4' ? 1 : 0;
$d1 = isset($_POST['Skill']) && $_POST['Skill'] === '1' ? 1 : 0;
$d2 = isset($_POST['Skill']) && $_POST['Skill'] === '2' ? 1 : 0;
$e1 = isset($_POST['Education']) && $_POST['Education'] === '1' ? 1 : 0;
$e2 = isset($_POST['Education']) && $_POST['Education'] === '2' ? 1 : 0;
$e3 = isset($_POST['Education']) && $_POST['Education'] === '3' ? 1 : 0;
$e4 = isset($_POST['Education']) && $_POST['Education'] === '4' ? 1 : 0;
$e5 = isset($_POST['Education']) && $_POST['Education'] === '5' ? 1 : 0;
$e6 = isset($_POST['Education']) && $_POST['Education'] === '6' ? 1 : 0;


    //User  Bio
$bloodtype=$_POST['bloodtype'];
$Donor = isset($_POST['Donor']) ? $_POST['Donor'] : '';
$Civil = isset($_POST['Civil']) ? $_POST['Civil'] : '';
$Hair = isset($_POST['Hair']) ? $_POST['Hair'] : '';
$Eyes = isset($_POST['Eyes']) ? $_POST['Eyes'] : '';
$Built = isset($_POST['Built']) ? $_POST['Built'] : '';
$Complexion = isset($_POST['Complexion']) ? $_POST['Complexion'] : '';
$Province1=$_POST['Province1'];
$City1=$_POST['City1'];




$Query1 = "SELECT MAX(USERID) AS LatestUserID FROM USER_DATA"; 
$sourceResult1 = sqlsrv_query($conn, $Query1);

if ($sourceResult1 === false) {
die(print_r(sqlsrv_errors(), true));
}

$row1 = sqlsrv_fetch_array($sourceResult1, SQLSRV_FETCH_ASSOC);
$latestUserID = $row1['LatestUserID'];

if ($latestUserID === null) {
    $userID = 100;
} else {
    $userID = $latestUserID + 1;
}

$Query2 = "SELECT MAX(APPLICATIONID) AS LatestApplicationID FROM APPLICATION_DETAILS"; 
$Resultappid = sqlsrv_query($conn, $Query2);

if ($Resultappid === false) {
die(print_r(sqlsrv_errors(), true));
}

$row2 = sqlsrv_fetch_array($Resultappid, SQLSRV_FETCH_ASSOC);
$latestApplicationID = $row2['LatestApplicationID'];

if ($latestApplicationID === null) {
    $applicationID = 200;
} else {
    $applicationID = $latestApplicationID + 1;
}


    $sql = "INSERT INTO USER_DATA (LASTNAME, FIRSTNAME, MIDDLENAME, PROVINCE, CITY, STREET, HOUSE_NO, CONTACT, TIN, NATIONALITY, GENDER, BIRTHDATE, HEIGHT, WEIGHT) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $params = array ($Lastname, $Firstname, $Middlename, $Province, $City, $Street, $House, $Cont, $Tin, $Nationality, $Gender, $Birthdate, $Height, $Weight);
    
    // Prepare and execute the statement
    $stmt = sqlsrv_prepare($conn, $sql, $params);
    
    if (sqlsrv_execute($stmt)) {
        echo 'Registration Successfully' . "<br/>" ;
    } else {
        echo 'ERROR: ' . "<br/>" . print_r(sqlsrv_errors(), true);
    } 

    $sql2 = "INSERT INTO APPLICATION_DETAILS (USERID, A, B, C1, C2, D, E, F, G, H1, H2, H3, H4, H5, H6, STUDENT_PERMIT, NON_PROFESSIONAL, PROFESSIONAL, CONDUCTOR, DRIVING_SCHOOL, LICENSED_PRIVATE_PERSON, INFORMAL_SCHOOLING, ELEMENTARY, HIGH_SCHOOL, VOCATIONAL, COLLEGE, POST_GRADUATE) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $params1 = array(

    $userID, $A, $B, $C1, $C2, $D, $E, $F, $G, $H1, $H2, $H3, $H4, $H5, $H6, $t1, $t2, $t3, $t4, $d1, $d2, $e1, $e2, $e3, $e4, $e5, $e6);

    
    // Prepare and execute the statement
    $stmt1 = sqlsrv_prepare($conn, $sql2, $params1);
    
    if (sqlsrv_execute($stmt1)) {
        echo 'Registration success' . "<br/>" ;
    } else {
        echo 'ERROR: ' . "<br/>" . print_r(sqlsrv_errors(), true);
    }
    


    $sql3 = "INSERT INTO USER_BIO (BLOODTYPE, ORGAN_DONOR, CIVIL_STATUS, HAIR, EYES, BUILT, COMPLEXION, USERID, APPLICATIONID, PROVINCE, CITY, FATHER_LASTNAME, FATHER_FIRSTNAME, FATHER_MIDDLENAME, MOTHER_LASTNAME, MOTHER_FIRSTNAME, MOTHER_MIDDLENAME, SPOUSE_LASTNAME, SPOUSE_FIRSTNAME, SPOUSE_MIDDLENAME) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $params2 = array(
        $bloodtype, $Donor, $Civil, $Hair, $Eyes, $Built, $Complexion, $userID, $applicationID, $Province1, $City1, $FatherLastname, $FatherFirstname, $FatherMiddlename, $MotherLastname, $MotherFirstname, $MotherMiddlename, $SpouseLastname, $SpouseFirstname, $SpouseMiddlename
    );
    
    // Prepare and execute the statement
    $stmt2 = sqlsrv_prepare($conn, $sql3, $params2);
    
    if (sqlsrv_execute($stmt2)) {
        echo 'Registration success' . "<br/>" ;
    } else {
        echo 'ERROR: ' . "<br/>" . print_r(sqlsrv_errors(), true);
    }
    


    // SQL Insert Statement for WORK
$sql4 = "INSERT INTO WORK (USERID, BUSINESS_NAME, PROVINCE, CITY, STREET, BUSINESS_NUMBER, PREVIOUS_LASTNAME, PREVIOUS_FIRSTNAME, PREVIOUS_MIDDLENAME, SIGNATURE) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

// Assuming 'WORKID' is an identity column, don't include it in the INSERT statement.

$params3 = array(
    $userID, $businessname, $Province2, $City2, $Street2, $businesscontact,
    $prevlastname, $prevfirstname, $prevmiddlename,
    $signature
);
    
    // Prepare and execute the statement
    $stmt3 = sqlsrv_prepare($conn, $sql4, $params3);
    
    if (sqlsrv_execute($stmt3)) {
        echo 'Registration success' . "<br/>";
        header("Location: Registerget.html");
    } else {
        echo 'ERROR:' . "<br/>" . print_r(sqlsrv_errors(), true);
    }
    
}

else {
    echo "Form is incomplete. Please fill in the following:<br>";
    echo $LastnameErr . "<br>";
    echo $FirstnameErr . "<br>";
    echo $ProvinceErr . "<br>";
    echo $CityErr . "<br>";
    echo $StreetErr . "<br>";
    echo $HouseErr . "<br>";
    echo $ContErr . "<br>";
    echo $ContLenErr . "<br>";
    echo $NationalityErr . "<br>";
    echo $GenderErr . "<br>";
    echo $BirthdateErr . "<br>";
    echo $HeightErr . "<br>";
    echo $WeightErr . "<br>";
    echo $checkboxERR . "<br>";
    echo $LicenseErr . "<br>";
    echo $SkillErr . "<br>";
    echo $EducationErr . "<br>";
    echo $bloodtypeErr . "<br>";
    echo $DonorErr . "<br>";
    echo $CivilErr . "<br>";
    echo $HairErr . "<br>";
    echo $EyesErr . "<br>";
    echo $BuiltErr . "<br>";
    echo $ComplexionErr . "<br>";
    echo $Province1Err . "<br>";
    echo $City1Err . "<br>";
}
