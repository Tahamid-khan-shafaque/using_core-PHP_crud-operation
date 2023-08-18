<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "per";

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Delete record
$id = $_GET['id'];
$sql = "DELETE FROM users WHERE id='$id'";
mysqli_query($conn, $sql);

// Redirect back to index.php
header("Location: index.php");
exit();
?>
