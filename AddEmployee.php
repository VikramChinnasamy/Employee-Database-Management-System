<?php
// Database credentials
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "employee";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve the ID, username, and password from the form
$id = $_POST['id'];
$username = $_POST['username'];
$password = $_POST['password'];

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO employeeusers (id, username, password) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $id, $username, $password);

// Execute the query
if ($stmt->execute()) {
    header("Location: AdminDashboard.html");
    exit();
} else {
    echo "Error: " . $stmt->error;
}

// Close connection
$stmt->close();
$conn->close();
?>
