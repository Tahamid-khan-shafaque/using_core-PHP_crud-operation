<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "per";

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Retrieve record to be edited
$id = $_GET['id'];
$sql = "SELECT * FROM users WHERE id='$id'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
?>

<!-- HTML form for editing a record -->
<form method="POST" action="update.php">
    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
    <label for="name">Name:</label>
    <input type="text" name="name" id="name" value="<?php echo $row['name']; ?>" required>
    <label for="email">Email:</label>
    <input type="email" name="email" id="email" value="<?php echo $row['email']; ?>" required>
    <label for="phone">Phone:</label>
    <input type="tel" name="phone" id="phone" value="<?php echo $row['phone']; ?>" required>
    <label for="address">Address:</label>
    <textarea name="address" id="address" required><?php echo $row['address']; ?></textarea>
    <button type="submit" name="submit">Update</button>
</form>
