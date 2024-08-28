<?php
    // register.php
    $servername = "localhost";
    $username = "root"; 
    $password = ""; 
    $dbname = "your_db_name";

    // Create connection
    $conn = new mysqli('localhost','root', '' , 'user_registration');

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $stmt = $conn->prepare("INSERT INTO registration (username, email, password) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $username, $email, $password);
        $stmt->execute();

        echo "Registration successful!";
        $stmt->close();
    }
    $conn->close();
?>