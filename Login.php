<?php
// Database credentials
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

// Retrieve the username and password from the form
$user = $_POST['username'];
$pass = $_POST['password'];

// Prepare and bind
$stmt = $conn->prepare("SELECT * FROM users WHERE username = ? AND password = ?");
$stmt->bind_param("ss", $user, $pass);

// Execute the query
$stmt->execute();

// Get the result
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // Output data of each row (for demonstration purposes)
    while($row = $result->fetch_assoc()) {
        echo "ID: " . $row["id"]. " - Name: " . $row["username"]. " - Password: " . $row["password"]. "<br>";
    }
    // Redirect to another HTML page
    header("Location: HomePage.html");
    exit(); 
} else {
    echo "Invalid username or password";
}

// Close connection
$stmt->close();
$conn->close();
?>
