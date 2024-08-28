<?php
// send_mail.php
$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "your_db_name";

$conn = new mysqli('localhost','root', '' , 'user_registration');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $to = $_POST['to'];
    $from = $_POST['from'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    $stmt = $conn->prepare("INSERT INTO mail_list (sender, recipient, subject, message) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $from, $to, $subject, $message);
    $stmt->execute();

    echo "Mail sent successfully!";
    $stmt->close();
}
$conn->close();
?>