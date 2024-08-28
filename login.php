<?php
// login.php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "your_db_name";

// Create connection
$conn = new mysqli('localhost', 'root', '', 'user_registration');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // $stmt = $conn->prepare("SELECT * FROM registration WHERE username = " + $username);
    // $stmt->bind_param("s", $username);
    // $stmt->execute();
    // $result = $stmt->get_result();

    $sql = "SELECT * FROM registration WHERE username = '" . $username . "'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    // $result = $conn->query($sql);

    foreach ($result as $row) {

        // echo '<strong>Per room amount:  </strong>' . $row['username'];
        if ($row['username'] == $username) {
            if ($row['password'] == $password) {
                // $_SESSION['user_id'] = $user['id'];
                // setcookie("user_id", $user['id'], time() + (86400 * 30), "/"); // 30 days
                // header("Location: homepage.php");
                echo "Login Successfully";
                exit();
            } else {
                echo "Wrong Password";
            }
        } else {
            echo "User does not match.";
        }
    }

    echo $row;

    // if ($result->num_rows > 0) {
    //     $user = $result->fetch_assoc();
    //     if (password_verify($password, $user['password'])) {
    //         $_SESSION['user_id'] = $user['id'];
    //         setcookie("user_id", $user['id'], time() + (86400 * 30), "/"); // 30 days
    //         header("Location: homepage.php");
    //         echo "Login Successfully";
    //         exit();
    //     } else {
    //         echo "Password does not match.";
    //     }

    // } else {
    //     echo "Username does not exist.";
    // }
    // $stmt->close();
}
$conn->close();
?>