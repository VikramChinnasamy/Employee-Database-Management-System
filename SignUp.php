<?php
// Database configuration
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "login";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$id = $_POST['id'];
$user = $_POST['username'];
$pass = $_POST['password'];

// Insert data into the database
$sql = "INSERT INTO users (id,username, password) VALUES ('$id','$user', '$pass')";

if ($conn->query($sql) === TRUE) {
    header("Location: Login.html");
    exit();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close connection
$conn->close();
?>
