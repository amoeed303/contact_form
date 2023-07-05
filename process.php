<?php
$name = $_POST["name"];
$email = $_POST["email"];
$company = $_POST["company"];
$phone = $_POST["phone"];
$subject = $_POST["subject"];
$message = $_POST["message"];

//dataabase connection
$hostName = "localhost";
$userName = "moeed";
$password = "123abc";
$dbName = "contact_form";
$conn = new mysqli($hostName, $userName, $password, $dbName);
if ($conn->connect_error) {
    echo "$conn->connect_error";
    die("Connection Failed :" . $conn->connect_error);
} else {

    $stmt = $conn->prepare("insert into user_data(name, email, company, phone, subject, message) values(?,?,?,?,?,?)");
    $stmt->bind_param("sssiss", $name, $email, $company, $phone, $subject, $message);
    $execval = $stmt->execute();
    echo "Response Saved we will get  back to you";
    $stmt->close();
    $conn->close();
}



?>