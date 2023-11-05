<?php
// Database connection settings
$db_host = "localhost";
$db_user = "root";
$db_password = "";
$db_name = "wqmsystem";

// Establish a database connection
$conn = new mysqli($db_host, $db_user, $db_password, $db_name);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve user input from the registration form
$email = $_POST['email'];
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$password = password_hash($_POST['password'], PASSWORD_BCRYPT);

// Insert the user data into the database
$sql = "INSERT INTO user (email, firstname, lastname, password) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssss", $email, $firstname, $lastname, $password);

if ($stmt->execute()) {
    echo "Registration successful!";
    
    // Redirect to the login page (index.php)
    header("Location: index.php");
    exit(); // Stop script execution after the redirect
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
