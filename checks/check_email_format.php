<?php
$email = $_POST['email'];
$valid = '';
if (preg_match("/^[a-zA-Z0-9_.-]+@[a-zA-Z0-9-]+.[a-zA-Z0-9-.]+$/", $email)) {
    $valid = '';
} else {
    $valid = 'Email format should be username@gmail.com';
}

echo $valid;
