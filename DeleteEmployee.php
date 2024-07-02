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

// Retrieve the ID from the form
$id = $_POST['id'];

// Prepare and bind
$stmt = $conn->prepare("DELETE FROM employeeusers WHERE id = ?");
$stmt->bind_param("s", $id);

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
