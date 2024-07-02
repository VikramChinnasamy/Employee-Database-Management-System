<?php
// Database credentials
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "admin"; // Make sure the database exists and is properly configured

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve the ID and password from the form
$id = $_POST['id'];
$pass = $_POST['password'];

// Prepare and bind
$stmt = $conn->prepare("SELECT * FROM adminusers WHERE id = ? AND password = ?");
$stmt->bind_param("ss", $id, $pass);

// Execute the query
$stmt->execute();

// Get the result
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // Redirect to another HTML page upon successful login
    header("Location: AdminDashboard.html");
    exit(); // Make sure to exit after redirecting
} else {
    echo "Invalid ID or password";
}

// Close connection
$stmt->close();
$conn->close();
?>
