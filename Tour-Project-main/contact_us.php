<?php
$serverName = "localhost";
$Username = "root";
$password = "";
$database = "test";

$conn = mysqli_connect($serverName, $Username, $password, $database);
if (!$conn) {
    die("Connection Failed: " . mysqli_connect_error());
}

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $subject = $_POST['subject'];
    $messageText = $_POST['message'];

    $sql = "INSERT INTO contact (Name, Email, Phone, Subject, Message) VALUES (?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql);
    if (!$stmt) {
        echo "Error: " . mysqli_error($conn);
        exit;
    }
    mysqli_stmt_bind_param($stmt, "sssss", $name, $email, $phone, $subject, $messageText);
    if (mysqli_stmt_execute($stmt)) {
        $message = "Thank you for visiting us! We will contact you to assist regarding the same.";
        echo $message;
    } else {
        echo "Error: " . mysqli_error($conn);
    }
    mysqli_stmt_close($stmt);
}
mysqli_close($conn);
?>
