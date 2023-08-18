<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "per";

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Handle form submission
if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];

    $sql = "UPDATE users SET name='$name', email='$email', phone='$phone', address='$address' WHERE id='$id'";
    mysqli_query($conn, $sql);
}

// Redirect back to index.php
header("Location: index.php");
exit();
?>
