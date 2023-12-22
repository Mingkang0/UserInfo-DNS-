<?php

$user_id = $_GET['user_id'];

$db = new mysqli("localhost", "root", "", "mydb");

if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

$query = "SELECT username, email FROM userinfo WHERE userid = $user_id";
$result = $db->query($query);

if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $username = $row['username'];
    $email = $row['email'];

    echo "Register Success<br>";
    echo "Username: $username<br>";
    echo "Email: $email<br>";
} else {
    echo "Error fetching user details: " . $db->error;
}

$db->close();
?>
