<?php
// Database credentials
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "admin"; 

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve the ID, username, and password from the form
$id = $_POST['id'];
$user = $_POST['username'];
$pass = $_POST['password'];

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO adminusers (id, username, password) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $id, $user, $pass);

// Execute the query
if ($stmt->execute()) {
    // Redirect to another HTML page upon successful signup
    header("Location: AdminLogin.html");
    exit(); // Make sure to exit after redirecting
} else {
    echo "Error: " . $stmt->error;
}

// Close connection
$stmt->close();
$conn->close();
?>
