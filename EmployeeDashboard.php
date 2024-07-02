<?php
session_start();
if (!isset($_SESSION['employee'])) {
    header("Location: EmployeeLogin.html"); // Redirect to login if session is not set
    exit();
}
$employee = $_SESSION['employee'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Dashboard</title>
    <link rel="stylesheet" href="EmployeeDashboard.css">
</head>
<body>
    <div class="container">
        <h2>Welcome, <?php echo htmlspecialchars($employee['username']); ?>!</h2>
        <table>
            <tr>
                <th>ID</th>
                <td><?php echo htmlspecialchars($employee['id']); ?></td>
            </tr>
            <tr>
                <th>Username</th>
                <td><?php echo htmlspecialchars($employee['username']); ?></td>
            </tr>
            <tr>
                <th>Password</th>
                <td><?php echo htmlspecialchars($employee['password']); ?></td>
            </tr>
        </table>
        <button onclick="window.location.href='HomePage.html'">Back</button>
    </div>
</body>
</html>
