<?php
session_start();

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

// Retrieve the ID and password from the form
$id = $_POST['id'];
$pass = $_POST['password'];

// Prepare and bind
$stmt = $conn->prepare("SELECT * FROM employeeusers WHERE id = ? AND password = ?");
$stmt->bind_param("ss", $id, $pass);

// Execute the query
$stmt->execute();

// Get the result
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // Fetch the employee details
    $employee = $result->fetch_assoc();
    $_SESSION['employee'] = $employee; // Store employee details in session
    header("Location: EmployeeDashboard.php"); // Redirect to employee dashboard
} else {
    echo "Invalid ID or password";
}

// Close connection
$stmt->close();
$conn->close();
?>
