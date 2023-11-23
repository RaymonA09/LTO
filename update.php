<?php
session_start();

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

$userData = array();

if (isset($_GET['userid'])) {
    $userid = $_GET['userid'];
    $_SESSION['editUserID'] = $userid; // Store user ID in session for later use

    // Prepare the SQL statement to prevent SQL injection
    $sql = "SELECT * FROM USER_DATA WHERE USERID = ?";
    $params = array($userid);
    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt === false) {
        die(print_r(sqlsrv_errors(), true));
    }

    $userData = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
}
// Function to echo value if it exists
function value($field, $userData) {
    echo isset($userData[$field]) ? htmlspecialchars($userData[$field]) : '';
}

function set_selected($currentValue, $fieldValue) {
    if ($currentValue == $fieldValue) {
        echo 'selected';
    }
}

if (isset($userData['BIRTHDATE']) && $userData['BIRTHDATE'] instanceof DateTime) {
    $birthdate = $userData['BIRTHDATE']->format('Y-m-d');
} else {
    echo "Birthdate is not set or not a DateTime object.";
}

?>



<!DOCTYPE html>
<html lang="en"> 
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="form.css">

    <title>Edit Application for Driver's License</title>
    <!-- Your CSS links here -->

    <script type="text/JavaScript">

function showPlacesDropdown(provinceDropdownId, placeSelectId) {
        var provinceDropdown = document.getElementById(provinceDropdownId);
        var placeSelect = document.getElementById(placeSelectId);
        var selectedProvince = provinceDropdown.value;

        placeSelect.innerHTML = '<option value="">Select a City</option>';

        if (selectedProvince !== "") {
            var cities = cityPlaces[selectedProvince];
            for (var i = 0; i < cities.length; i++) {
                var option = document.createElement("option");
                option.value = cities[i];
                option.textContent = cities[i];
                placeSelect.appendChild(option);
            }
        }
    }


        var cityPlaces = {
                "BATANGAS": ["AGONCILLO", "ALITAGTAG", "BALAYAN", "BALETE", "BATANGAS", "BAUAN", "CALACA", "CALATAGAN", "CUENCA", "IBAAN", "LAUREL", "LEMERY", "LIAN", "LIPA", "LOBO", "MABINI", "MALVAR", "MATAASNAKAHOY", "NASUGBU", "PADRE GARCIA", "ROSARIO", "SAN JOSE", "SAN LUIS", "SAN NICOLAS", "SAN PASCUAL", "SANTA TERESITA", "SANTO TOMAS", "TAAL", "TALISAY", "TANAUAN", "TAYSAN", "TINGLOY", "TUY"],
                "CAVITE": ["ALFONSO", "AMADEO", "BACOOR", "CARMONA", "CAVITE CITY", "DASMARINAS", "GENERAL EMILIO AGUINALDO", "GENERAL MARIANO ALVAREZ", "GENERAL TRIAS", "IMUS", "INDANG", "KAWIT", "MAGALLANES", "MENDEZ", "MENDEZ", "NAIC", "NOVELETA", "ROSARIO", "TAGAYTAY CITY", "TANZA", "TERNATE", "TRECE MARTIRES CITY",],
                "LAGUNA": ["ALAMINOS", "BANILAN", "BAY", "BINAN", "CABUYAO", "CALAMBA", "CALAUAN", "CAVINTI", "DEL REMEDIO", "FAMY", "KALAYAAN", "KAY-ANLOG, CALAMBA", "LILIW", "LOS BANOS", "LUISIANA", "MABITAC", "MAGDALENA", "MAJAYJAY", "MAKILING", "MAKATI", "MARIKINA", "MUNTINLUPA", "NAGCARLAN", "PAGSANJAN", "PAETE", "PANGIL", "PARIAN", "PILA", "PUNTA", "REAL", "RIZAL", "SAN ANTONIO", "SAN FRANCISCO", "SAN JUAN", "SAN NARCISO", "SAN PABLO", "SAN PEDRO", "SANTA CRUZ", "SANTA MARIA", "SANTA ROSA", "SANTO ANGEL", "SINILOAN", "TURBINA", "VICTORIA"],
                "NCR": ["CALOOCAN NORTH", "CALOOCAN SOUTH", "LAS PINAS", "MAKATI", "MALABON", "MANDALUYONG", "MANILA", "MARIKINA", "MUNTINLUPA", "NAVOTAS", "PARANAQUE", "PASAY", "PASIG", "PATEROS", "QUEZON CITY", "SAN JUAN", "TAGUIG", "VALENZUELA"],
                "QUEZON": ["AGDANGAN", "ALABAT", "BUENAVISTA", "BURDEOS", "CALAUAG", "CANDELARIA", "CATANAUAN", "DOLORES", "GENERAL LUNA", "GENERAL NAKAR", "GUINAYANGAN", "GUMACA", "INFANTA", "JOMALIG", "LOPEZ", "LUCBAN", "MACALELON", "MAUBAN", "MULANAY", "PADRE BURGOS", "PAGBILAO", "PANUKULAN", "PATNANUNGAN", "PEREZ", "PITOGO", "PLARIDEL", "POLILO", "QUEZON", "REAL", "SAMPALOC", "SAN ANDRES", "SAN ANTONIO", "SAN FRANCISCO", "SAN NARCISO", "SARIAYA", "TAGKAWAYAN", "TIAONG", "UNISAN"],
                "RIZAL": ["ANGONO", "ANTIPOLO", "BARAS", "BINANGONAN", "CAINTA", "CARDONA", "JALA-JALA", "MARIKINA", "MORONG", "PASIG", "PILILLA", "RODRIGUEZ", "SAN MATEO", "SANTO DOMINGO", "TANAY", "TERESA"]
            };

    </script>
</head>
<body>
    <section class="form" style = "margin-top: 1%";>
    <form action="updated.php" method="post">
        <h1 align="center">APPLICATION FOR DRIVER'S LICENSE</h1>
        


        <div class="Fullname"> 
            <h3 style="margin-bottom: 5px;">NAME</h3>
            <div class="fullname">

        <div class="padding">
            <label for="Lastname">Lastname:</label><br>
            <input type="text" id="Lastname" name="lastname" value="<?php value('LASTNAME', $userData); ?>" required pattern="[A-Z][A-Za-z ]+" >
        </div> 

        <div class="padding">
            <label for="Firstname">Firstname:</label><br>
            <input type="text" id="Firstname" name="firstname" value="<?php value('FIRSTNAME', $userData); ?>" required pattern="[A-Z][A-Za-z ]+" >
        </div>

        <div class="padding">
            <label for="Middlename">Middlename:</label><br>
            <input type="text" id="Middlename" name="middlename" value="<?php value('MIDDLENAME', $userData); ?>" required pattern="[A-Z][A-Za-z ]+" >
        </div>
         </div>
                </div>



        <!-- ADDRESS SECTION -->
        <div class="Address">
            <h3 style="margin-bottom: 5px;">PRESENT ADDRESS</h3>
            <div class="address">
                <!-- Province Dropdown -->
                <div class="info">
    <label>Province</label><br>
    <select name="Province" id="province-dropdown-1" onchange="showPlacesDropdown('province-dropdown-1', 'place-select-1')">
        <option value="">Select a Province</option>
        <option value="NCR" <?php set_selected('NCR', $userData['PROVINCE']); ?>>METRO-MANILA</option>
        <option value="CAVITE" <?php set_selected('CAVITE', $userData['PROVINCE']); ?>>CAVITE</option>
        <option value="LAGUNA" <?php set_selected('LAGUNA', $userData['PROVINCE']); ?>>LAGUNA</option>
        <option value="BATANGAS" <?php set_selected('BATANGAS', $userData['PROVINCE']); ?>>BATANGAS</option>
        <option value="RIZAL" <?php set_selected('RIZAL', $userData['PROVINCE']); ?>>RIZAL</option>
        <option value="QUEZON" <?php set_selected('QUEZON', $userData['PROVINCE']); ?>>QUEZON</option>
    </select>
</div>

                <!-- City Dropdown -->
                <div>
                    <span>City</span><br>
                    <div id="city-dropdown-1">
                    <select id="place-select-1" name="City" data-last-province="">
                        <option value="<?php value('CITY', $userData); ?>" selected><?php value('CITY', $userData); ?></option>
                        </select>
                    </div>
                </div>
                <div class="info"><label for="Street">Street</label><br><input type="text" id="Street" name="street" value="<?php value('STREET', $userData); ?>"></div>
                <div class="info"><label for="House">No.</label><br><input type="text" id="House" name="house_no" value="<?php value('HOUSE_NO', $userData); ?>"></div>

            </div>
        </div>

        <div style="border: solid #003366; border-radius: 15px;">
                <div class="Information">
                    <h3 style="margin-bottom: 5px;">INFORMATION</h3>
                    <div class="information">
                    <div class="info"><label for="Cont">TEL NO. / CP.NO.</label><br><input type="tel" id="Cont" name="contact" value="<?php value('CONTACT', $userData); ?>" maxlength="11"></div>
                    <div class="info"><label for="Tin">TIN</label><br><input type="text" id="Tin" name="tin" value="<?php value('TIN', $userData); ?>" pattern="[0-9]{3}-[0-9]{3}-[0-9]{3}-[0-9]{3}" placeholder="XXX-XXX-XXX-XXX"></div>
                    
                    
                    <div class="info"><label for="Nationality">NATIONALITY</label><br>
                        <select name="nationality">
                            <option value="">Select Nationality</option>
                            <option value="FILIPINO" <?php set_selected('FILIPINO', $userData['NATIONALITY']); ?>>FILIPINO</option>
                            <option value="FOREIGNER" <?php set_selected('FOREIGNER', $userData['NATIONALITY']); ?>>FOREIGNER</option>
                            <option value="OTHERS" <?php set_selected('OTHERS', $userData['NATIONALITY']); ?>>OTHERS</option>
                            </select>
                         </div>
                    </div>
                </div>


                <div class="Minformation">
                    <div class="minformation">
                        <div class="info"><span>GENDER</span>
                        <input type="radio" id="Male" name="gender" value="Male" <?php if (isset($userData['GENDER']) && $userData['GENDER'] == 'Male') echo 'checked'; ?>><label for="Male">M</label>
                        <input style="margin-bottom: 5px;" type="radio" id="Female" name="gender" value="Female" <?php if (isset($userData['GENDER']) && $userData['GENDER'] == 'Female') echo 'checked'; ?>><label for="Female">F</label></div>
                        <div class="info"><label for="Bday">BIRTH DATE</label><br>
                        <input type="date" id="Bday" name="birthdate" min="1940-01-01" max="2007-12-31" value="<?php if (isset($birthdate)) { echo $birthdate; } ?>" style="font-size: large;"></div>
                        <div class="info"><label for="Height">HEIGHT(cm)</label><br><input type="text" id="Height" name="height" value="<?php value('HEIGHT', $userData); ?>"></div>
                        <div class="info"><label for="weight">WEIGHT(kg)</label><br><input type="text" id="weight" name="weight" value="<?php value('WEIGHT', $userData); ?>"></div>
                    </div>
                    <input type="submit" value="Submit">
                </div> 
            </div>        
    </form>
    </section>

    <script>
        window.onload = function() {
        var provinceDropdown = document.getElementById('province-dropdown-1');
        if (provinceDropdown.value) {
            showPlacesDropdown('province-dropdown-1', 'place-select-1');
        }

        var cityDropdown = document.getElementById('place-select-1');
        var selectedCity = "<?php echo isset($userData['CITY']) ? $userData['CITY'] : ''; ?>";
        
        for (var i = 0; i < cityDropdown.options.length; i++) {
            if (cityDropdown.options[i].value === selectedCity) {
                cityDropdown.selectedIndex = i;
                break;
            }
        }
    };
        
    </script>


</body>
</html>
