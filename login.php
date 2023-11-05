<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database connection settings
    include('authentication.php');
    
    // Retrieve user input from the login form
    $email = $_POST['inputEmail'];
    $password = $_POST['inputPassword'];

    // Query the database to find a matching user
    $sql = "SELECT * FROM user WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);

    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        // User with the provided email exists
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            // Password matches, user is authenticated
            // You can set a session variable to indicate the user is logged in
            session_start();
            $_SESSION['user_id'] = $user['id']; // Store user ID or relevant information

            // Redirect to the user's dashboard
            header("Location: dashboard.php");
            exit();
        } else {
            echo "Incorrect password";
        }
    } else {
        echo "User not found";
    }

    $stmt->close();
    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Head content remains the same -->
</head>
<body class="bg-primary">
    <!-- Rest of your HTML content remains the same -->
</body>
</html>
