<?php
// set page headers
$page_title = "Read One student";
include_once "header.php";

// get ID of the student to be read
$id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: missing ID.');

// include database and object files
include_once 'config/database.php';
include_once 'objects/student.php';
include_once 'objects/department.php';

// get database connection
$database = new Database();
$db = $database->getConnection();

// prepare objects
$student = new student($db);
$department = new department($db);

// set ID property of student to be read
$student->id = $id;

// read the details of student to be read
$student->readOne();

// read students button
echo "<div class='right-button-margin'>";
echo "<a href='index.php' class='btn btn-primary pull-right'>";
echo "<span class='glyphicon glyphicon-list'></span> Read students";
echo "</a>";
echo "</div>";

// HTML table for displaying a student details
echo "<table class='table table-hover table-responsive table-bordered'>";

echo "<tr>";
echo "<td>First Name</td>";
echo "<td>{$student->first_name}</td>";
echo "</tr>";

echo "<tr>";
echo "<td>Last Name</td>";
echo "<td>{$student->last_name}</td>";
echo "</tr>";

echo "<tr>";
echo "<td>Username</td>";
echo "<td>{$student->username}</td>";
echo "</tr>";

echo "<tr>";
echo "<td>Department</td>";
echo "<td>";
// display department name
$department->id = $student->department_id;
$department->readName();
echo $department->name;
echo "</td>";
echo "</tr>";

echo "<tr>";
echo "<td>Country</td>";
echo "<td>{$student->country}</td>";
echo "</tr>";

echo "<tr>";
echo "<td>Address</td>";
echo "<td>{$student->address}</td>";
echo "</tr>";

echo "<tr>";
echo "<td>Image</td>";
echo "<td>";
myProfile($student);
// echo $student->image ? "<img src='uploads/{$student->image}' style='width:300px;' />" : "No image found.";
echo $student->image ? "<img src='images/{$student->image}' style='width:300px;' />" : "No image found.";
// echo $student->image ? "<img src='".myProfile($student)."' />" : "No image found.";
echo "</td>";
echo "</tr>";

echo "</table>";
function myProfile($student)
{
    $im_php = imagecreatefromjpeg("uploads/{$student->image}");
    $im_php = imagescale($im_php, 800);
    $im_php_inv = imagescale($im_php, 800);

    $im_width = imagesx($im_php);
    $im_height = imagesy($im_php);

    $textColor = imagecolorallocate($im_php_inv, 1, 1, 1);
    $white = imagecolorallocate($im_php_inv, 255, 255, 255);
    ImageFilledRectangle($im_php_inv, $im_width, $im_width, 0, ($im_width - $im_height) + 200, $white);
    imagettftext($im_php_inv, 35, 0, $im_width - 355, $im_height - 20,
        $textColor, __DIR__ . "/images/Pacifico-Regular.ttf", "$student->username");

    imagefilter($im_php_inv, IMG_FILTER_NEGATE);
    imagecopy($im_php, $im_php_inv, $im_width / 2, 0, $im_width / 2, 0, $im_width / 2, $im_height);

    $new_name = "images/{$student->image}";
    imagejpeg($im_php, $new_name);}
// set footer
include_once "footer.php";
