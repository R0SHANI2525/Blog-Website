<?php
$servername = "localhost";
$username = "root";
$password = ""; //change this to your password
$database = "contact"; //change this to your database name

//Connection to the database
$conn = mysqli_connect($servername, $username, $password, $database);
//Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
// echo "Connected successfully";
//retrieve data
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    $phone_no = $_POST['phone'];
    //sanitize data
    $name = mysqli_real_escape_string($conn, $name);
    $email = mysqli_real_escape_string($conn, $email);
    $phone_no = mysqli_real_escape_string($conn, $phone_no);
    $message = mysqli_real_escape_string($conn, $message);

    //query
    $sql = "INSERT INTO contactData(name,email,phone,message) VALUES('$name','$email','$phone_no','$message')";

    if ($conn->query($sql) === true) {
        // echo 'thanks for contacting us';
        header("Location: contact.html");
        exit;
        
    }
}
$conn->close();
