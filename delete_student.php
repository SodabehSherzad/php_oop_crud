<?php
// check if value was posted
if($_POST){
 
    // include database and object file
    include_once 'config/database.php';
    include_once 'objects/student.php';
 
    // get database connection
    $database = new Database();
    $db = $database->getConnection();
 
    // prepare student object
    $student = new student($db);
     
    // set student id to be deleted
    $student->id = $_POST['object_id'];
     
    // delete the student
    if($student->delete()){
        echo "Object was deleted.";
    }
     
    // if unable to delete the student
    else{
        echo "Unable to delete object.";
    }
}
?>