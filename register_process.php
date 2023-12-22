<?php
$db = new mysqli("localhost", "root", "", "mydb");

if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

$username = $_GET['username'];
$password = $_GET['password'];
$confirmpassword = $_GET['confirmpassword'];
$email = $_GET['email'];

// Validate passwords match
if ($password == $confirmpassword) {
    $query = "INSERT INTO userinfo (username, email, password) VALUES ('$username', '$email', '$password')";

    if ($db->query($query) === TRUE) {
        // Get the ID of the inserted user
        $user_id = $db->insert_id;

        // Redirect to another page with the user ID as a parameter
        header("Location: Register_Success.php?user_id=$user_id");
        exit();
    } else {
        echo "Error: " . $db->error;
    }
} else {
    echo '<script>alert("Your password and confirm password do not match")</script>';
}

$db->close();
?>
