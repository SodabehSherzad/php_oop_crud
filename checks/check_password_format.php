<?php
$password = $_POST['password'];
$valid = '';
// at least length 8
// containing at least one lowercase letter
// at least one uppercase letter
// at least one number
if (preg_match('/^\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$/', $password)) {
    $valid = '';
} else {
    $valid = 'Password is not strong enough!';
}

echo $valid;
