<?php
// set page headers
$page_title = "Create student";
// $data = (isset($_POST['username']))? $_POST['username'] : "";
include_once "header.php";

// include database and object files
include_once 'config/database.php';
include_once 'objects/student.php';
include_once 'objects/department.php';

$countries = array("Afghanistan", "Albania", "Algeria",
  "American Samoa",
  "Andorra",
  "Angola",
  "Anguilla",
  "Antarctica",
  "Antigua and Barbuda",
  "Argentina",
  "Armenia",
  "Aruba",
  "Australia",
  "Austria",
  "Azerbaijan",
  "Bahamas",
  "Bahrain",
  "Bangladesh",
  "Barbados",
  "Belarus",
  "Belgium",
  "Belize",
  "Benin",
  "Bermuda",
  "Bhutan",
  "Bolivia",
  "Bosnia and Herzegovina",
  "Botswana",
  "Bouvet Island",
  "Brazil",
  "British Indian Ocean Territory",
  "Brunei Darussalam",
  "Bulgaria",
  "Burkina Faso",
  "Burundi",
  "Cambodia",
  "Cameroon",
  "Canada",
  "Cape Verde",
  "Cayman Islands",
  "Central African Republic",
  "Chad",
  "Chile",
  "China",
  "Christmas Island",
  "Cocos (Keeling) Islands",
  "Colombia",
  "Comoros",
  "Congo",
  "Congo, the Democratic Republic of the",
  "Cook Islands",
  "Costa Rica",
  "Cote D'Ivoire",
  "Croatia",
  "Cuba",
  "Cyprus",
  "Czech Republic",
  "Denmark",
  "Djibouti",
  "Dominica",
  "Dominican Republic",
  "Ecuador",
  "Egypt",
  "El Salvador",
  "Equatorial Guinea",
  "Eritrea",
  "Estonia",
  "Ethiopia",
  "Falkland Islands (Malvinas)",
  "Faroe Islands",
  "Fiji",
  "Finland",
  "France",
  "French Guiana",
  "French Polynesia",
  "French Southern Territories",
  "Gabon",
  "Gambia",
  "Georgia",
  "Germany",
  "Ghana",
  "Gibraltar",
  "Greece",
  "Greenland",
  "Grenada",
  "Guadeloupe",
  "Guam",
  "Guatemala",
  "Guinea",
  "Guinea-Bissau",
  "Guyana",
  "Haiti",
  "Heard Island and Mcdonald Islands",
  "Holy See (Vatican City State)",
  "Honduras",
  "Hong Kong",
  "Hungary",
  "Iceland",
  "India",
  "Indonesia",
  "Iran, Islamic Republic of",
  "Iraq",
  "Ireland",
  "Israel",
  "Italy",
  "Jamaica",
  "Japan",
  "Jordan",
  "Kazakhstan",
  "Kenya",
  "Kiribati",
  "Korea, Democratic People's Republic of",
  "Korea, Republic of",
  "Kuwait",
  "Kyrgyzstan",
  "Lao People's Democratic Republic",
  "Latvia",
  "Lebanon",
  "Lesotho",
  "Liberia",
  "Libyan Arab Jamahiriya",
  "Liechtenstein",
  "Lithuania",
  "Luxembourg",
  "Macao",
  "Macedonia, the Former Yugoslav Republic of",
  "Madagascar",
  "Malawi",
  "Malaysia",
  "Maldives",
  "Mali",
  "Malta",
  "Marshall Islands",
  "Martinique",
  "Mauritania",
  "Mauritius",
  "Mayotte",
  "Mexico",
  "Micronesia, Federated States of",
  "Moldova, Republic of",
  "Monaco",
  "Mongolia",
  "Montserrat",
  "Morocco",
  "Mozambique",
  "Myanmar",
  "Namibia",
  "Nauru",
  "Nepal",
  "Netherlands",
  "Netherlands Antilles",
  "New Caledonia",
  "New Zealand",
  "Nicaragua",
  "Niger",
  "Nigeria",
  "Niue",
  "Norfolk Island",
  "Northern Mariana Islands",
  "Norway",
  "Oman",
  "Pakistan",
  "Palau",
  "Palestinian Territory, Occupied",
  "Panama",
  "Papua New Guinea",
  "Paraguay",
  "Peru",
  "Philippines",
  "Pitcairn",
  "Poland",
  "Portugal",
  "Puerto Rico",
  "Qatar",
  "Reunion",
  "Romania",
  "Russian Federation",
  "Rwanda",
  "Saint Helena",
  "Saint Kitts and Nevis",
  "Saint Lucia",
  "Saint Pierre and Miquelon",
  "Saint Vincent and the Grenadines",
  "Samoa",
  "San Marino",
  "Sao Tome and Principe",
  "Saudi Arabia",
  "Senegal",
  "Serbia and Montenegro",
  "Seychelles",
  "Sierra Leone",
  "Singapore",
  "Slovakia",
  "Slovenia",
  "Solomon Islands",
  "Somalia",
  "South Africa",
  "South Georgia and the South Sandwich Islands",
  "Spain",
  "Sri Lanka",
  "Sudan",
  "Suriname",
  "Svalbard and Jan Mayen",
  "Swaziland",
  "Sweden",
  "Switzerland",
  "Syrian Arab Republic",
  "Taiwan, Province of China",
  "Tajikistan",
  "Tanzania, United Republic of",
  "Thailand",
  "Timor-Leste",
  "Togo",
  "Tokelau",
  "Tonga",
  "Trinidad and Tobago",
  "Tunisia",
  "Turkey",
  "Turkmenistan",
  "Turks and Caicos Islands",
  "Tuvalu",
  "Uganda",
  "Ukraine",
  "United Arab Emirates",
  "United Kingdom",
  "United States",
  "United States Minor Outlying Islands",
  "Uruguay",
  "Uzbekistan",
  "Vanuatu",
  "Venezuela",
  "Viet Nam",
  "Virgin Islands, British",
  "Virgin Islands, U.s.",
  "Wallis and Futuna",
  "Western Sahara",
  "Yemen",
  "Zambia",
  "Zimbabwe"
);
// get database connection
$database = new Database();
$db = $database->getConnection();

// pass connection to objects
$student = new Student($db);
$department = new Department($db);

// contents will be here
echo "<div class='right-button-margin'>";
    echo "<a href='index.php' class='btn btn-default pull-right'>Read students</a>";
echo "</div>";

// if the form was submitted - PHP OOP CRUD Tutorial
if($_POST){
    // $data = $_POST['username'];
    // set student property values
    $student->first_name = $_POST['first_name'];
    $student->last_name = $_POST['last_name'];
    $student->username = $_POST['username'];
    $student->department_id = $_POST['department_id'];
    $student->address = $_POST['address'];
    $student->email = $_POST['email'];
    $student->country = $_POST['country'];
    $student->phone = $_POST['phone'];
    $student->password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    $image=!empty($_FILES["image"]["name"])
            ? sha1_file($_FILES['image']['tmp_name']) . "-" . basename($_FILES["image"]["name"]) : "";
    $student->image = $image;

    // try to upload the submitted file
    // uploadPhoto() method will return an error message, if any.
    echo $student->uploadPhoto();
    
    // create the student
    if($student->create()){
        echo "<div class='alert alert-success'>student was created.</div>";
        $arr = array("username"=> $student->username, "password"=> $student->password);
        
        try {
			$myfile = fopen("./checks/info.json", "a");
            fwrite($myfile, json_encode($arr). ",\r\n");
        }
        catch (Exception $e) {
            echo "Error (File: ".$e->getFile().", line ".
                  $e->getLine()."): ".$e->getMessage();
        }
        
    }
    // if unable to create the student, tell the user
    else{
        echo "<div class='alert alert-danger'>Unable to create student.</div>";
    }
}
?>
<!-- HTML form for creating a student -->
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">

    <table class='table table-hover table-responsive table-bordered'>
        <tr>
            <td>First Name</td>
            <td><input type='text' name='first_name' class='form-control' /></td>
        </tr>
        <tr>
            <td>Last Name</td>
            <td><input type='text' name='last_name' class='form-control' /></td>
        </tr>
        <tr>
            <td>Username</td>
            <td>                  
                <input type='text' id="username" name='username' onkeyup="check_username(event)" class='form-control' />
                <label for="username" class="text-black"><span class="text-danger" id="usernameLable"></span></label>
            </td>
        </tr>
        <tr>
            <td>Address</td>
            <td><input type='text' name='address' class='form-control' /></td>
        </tr>
        <tr>
            <td>Email</td>
            <td>
                <input type='text' name='email' class='form-control' onkeyup="check_email_format(event)"/>
                <label for="email" class="text-black"><span class="text-danger" id="emailLable"></span></label>
            </td>
        </tr>
        <tr>
            <td>Country</td>
            <td>
                <select id="country" class="form-control" name="country">
                    <?php foreach($countries as $countryName): ?>
                    <option value="<?= $countryName; ?>"><?= $countryName; ?></option>
                    <?php endforeach; ?>
                </select>
                <!-- <input type='text' name='country' class='form-control' /> -->
            </td>
           
        </tr>
        <tr>
            <td>Phone</td>
            <td><input type='text' name='phone' class='form-control' /></td>
        </tr>
        <tr>
            <td>Password</td>
            <td>
                <input id="password" name='password' class='form-control' type="password" onkeyup="getPassword(event)"/>
                <label for="password" class="text-black"><span class="text-danger" id="passwordLable"></span></label>
            </td>
        </tr>
        <tr>
            <td>Confirm Password</td>
            <td>
                <input id="confirm_password" name='confirm_password' onkeyup="check_confirm_password(event)" class='form-control' type="password"/>
                <label for="confirm_password" class="text-black"><span class="text-danger" id="confirmPasswordLable"></span></label>
            </td>
        </tr>
        <tr>
            <td>Department</td>
            <td>
            <!-- categories from database will be here -->
            <?php
            // read the student categories from the database
            $stmt = $department->read();

            // put them in a select drop-down
            echo "<select class='form-control' name='department_id'>";
                echo "<option>Select department...</option>";

                while ($row_department = $stmt->fetch(PDO::FETCH_ASSOC)){
                    extract($row_department);
                    echo "<option value='{$id}'>{$name}</option>";
                }

            echo "</select>";
            ?>
            </td>
        </tr>
        <tr>
            <td>Photo</td>
            <td><input type="file" name="image" /></td>
        </tr>
        <tr>
            <td></td>
            <td>
                <button type="submit" class="btn btn-primary">Create</button>
            </td>
        </tr>

    </table>
</form>
<?php
// footer
include_once "footer.php";
?>