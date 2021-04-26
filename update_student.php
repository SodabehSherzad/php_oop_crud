<?php
// set page header
$page_title = "Update student";
include_once "header.php";

// get ID of the student to be edited
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

// set ID property of student to be edited
$student->id = $id;

// read the details of student to be edited
$student->readOne();

// if the form was submitted
if ($_POST) {

    // set student property values
    $student->first_name = $_POST['first_name'];
    $student->last_name = $_POST['last_name'];
    $student->username = $_POST['username'];
    $student->department_id = $_POST['department_id'];
    $student->address = $_POST['address'];
    $student->email = $_POST['email'];
    $student->country = $_POST['country'];
    $student->phone = $_POST['phone'];
    // update the student
    if ($student->update()) {
        echo "<div class='alert alert-success alert-dismissable'>";
        echo "student was updated.";
        echo "</div>";
    }

    // if unable to update the student, tell the user
    else {
        echo "<div class='alert alert-danger alert-dismissable'>";
        echo "Unable to update student.";
        echo "</div>";
    }
}

// Set the header
echo "<div class='right-button-margin'>";
echo "<a href='index.php' class='btn btn-default pull-right'>Read students</a>";
echo "</div>";
?>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"] . "?id={$id}"); ?>" method="post">
    <table class='table table-hover table-responsive table-bordered'>
    <tr>
            <td>First Name</td>
            <td><input type='text' name='first_name' value='<?php echo $student->first_name; ?>' class='form-control' /></td>
        </tr>
        <tr>
            <td>Last Name</td>
            <td><input type='text' name='last_name' value='<?php echo $student->last_name; ?>' class='form-control' /></td>
        </tr>
        <tr>
            <td>Username</td>
            <td><input type='text' name='username' value='<?php echo $student->username; ?>' class='form-control' /></td>
        </tr>
        <tr>
            <td>Address</td>
            <td><input type='text' name='address' value='<?php echo $student->address; ?>' class='form-control' /></td>
        </tr>
        <tr>
            <td>Email</td>
            <td><input type='text' name='email' value='<?php echo $student->email; ?>' class='form-control' /></td>
        </tr>
        <tr>
            <td>Country</td>
            <td><input type='text' name='country' value='<?php echo $student->country; ?>' class='form-control' /></td>


        </tr>

        <tr>
            <td>Phone</td>
            <td><input type='text' name='phone' value='<?php echo $student->phone; ?>' class='form-control' /></td>
        </tr>
        <tr>
            <td>department</td>
            <td>
                <!-- categories select drop-down will be here -->
                <?php
$stmt = $department->read();

// put them in a select drop-down
echo "<select class='form-control' name='department_id'>";

echo "<option>Please select...</option>";
while ($row_department = $stmt->fetch(PDO::FETCH_ASSOC)) {
    extract($row_department);

    // current department of the student must be selected
    if ($student->department_id == $id) {
        echo "<option value='$id' selected>";
    } else {
        echo "<option value='$id'>";
    }

    echo "$name</option>";
}
echo "</select>";
?>
            </td>
        </tr>
        <tr>
            <td></td>
            <td>
                <button type="submit" class="btn btn-primary">Update</button>
            </td>
        </tr>
    </table>
</form>
<?php
// set page footer
include_once "footer.php";
?>