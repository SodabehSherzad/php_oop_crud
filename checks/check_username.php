<?php
include_once '../config/database.php';

$database = new Database();
$db = $database->getConnection();
$valid = '';

if (isset($_POST)) {
    $username = $_POST['username'];
    $query = "SELECT username
        FROM students
        WHERE username = ? LIMIT 1 ";

    $stmt = $db->prepare($query);
    $stmt->bindParam(1, $username);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        $valid = 'Username already taken by someone else!';
    }
}
echo $valid;
