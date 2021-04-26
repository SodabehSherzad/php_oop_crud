<?php
// core.php holds pagination variables
include_once 'config/core.php';

// include database and object files
include_once 'config/database.php';
include_once 'objects/student.php';
include_once 'objects/department.php';
 
// instantiate database and objects
$database = new Database();
$db = $database->getConnection();
 
$student = new student($db);
$department = new department($db);

// set page header
$page_title = "Read students";
include_once "header.php";
 
// query students
$stmt = $student->readAll($from_record_num, $records_per_page);

// specify the page where paging is used
$page_url = "index.php?";
 
// count total rows - used for pagination
$total_rows=$student->countAll();
 
// read_template.php controls how the student list will be rendered
include_once "read_template.php";
 
// set page footer
include_once "footer.php";
?>