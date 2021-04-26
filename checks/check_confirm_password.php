<?php
$valid = '';
$password = $_POST['password'];
$confirmPassword = $_POST['confirmPassword'];
if ($password == $confirmPassword) {
    $valid = '';
} else {
    $valid = 'Password do not match!';
}

echo $valid;
