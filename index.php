<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "per";

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Handle form submission
if (isset($_POST['submit'])) {
    // Check if the required fields are present
    if (isset($_POST['name'], $_POST['email'], $_POST['phone'], $_POST['address'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];

        $sql = "INSERT INTO users (name, email, phone, address) VALUES ('$name', '$email', '$phone', '$address')";
        mysqli_query($conn, $sql);
    }
}

// Retrieve all records from the database
$sql = "SELECT * FROM users";
$result = mysqli_query($conn, $sql);
?>

<!-- HTML form for adding new records -->
<form method="POST" style="max-width: 500px; margin: 0 auto; padding: 20px; border: 1px solid #ccc; border-radius: 5px; background-color: #f2f2f2;">
    <label for="name" style="display: block; margin-bottom: 10px; font-weight: bold;">Name:</label>
    <input type="text" name="name" id="name" required style="width: 100%; padding: 10px; margin-bottom: 20px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box;">
    <label for="email" style="display: block; margin-bottom: 10px; font-weight: bold;">Email:</label>
    <input type="email" name="email" id="email" required style="width: 100%; padding: 10px; margin-bottom: 20px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box;">
    <label for="phone" style="display: block; margin-bottom: 10px; font-weight: bold;">Phone:</label>
    <input type="tel" name="phone" id="phone" required style="width: 100%; padding: 10px; margin-bottom: 20px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box;">
    <label for="address" style="display: block; margin-bottom: 10px; font-weight: bold;">Address:</label>
    <textarea name="address" id="address" required style="width: 100%; padding: 10px; margin-bottom: 20px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box;"></textarea>
    <button type="submit" name="submit" style="background-color: #4CAF50; color: white; padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer;">Add</button>
</form>


<!-- Display all records in a table -->
<table style="border-collapse: collapse; width: 100%;">
    <thead>
        <tr style="background-color: #f2f2f2;">
            <th style="padding: 10px; border: 1px solid #ddd;">ID</th>
            <th style="padding: 10px; border: 1px solid #ddd;">Name</th>
            <th style="padding: 10px; border: 1px solid #ddd;">Email</th>
            <th style="padding: 10px; border: 1px solid #ddd;">Phone</th>
            <th style="padding: 10px; border: 1px solid #ddd;">Address</th>
            <th style="padding: 10px; border: 1px solid #ddd;">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <tr style="background-color: #fff;">
                <td style="padding: 10px; border: 1px solid #ddd;"><?php echo $row['id']; ?></td>
                <td style="padding: 10px; border: 1px solid #ddd;"><?php echo isset($row['name']) ? $row['name'] : ''; ?></td>
                <td style="padding: 10px; border: 1px solid #ddd;"><?php echo isset($row['email']) ? $row['email'] : ''; ?></td>
                <td style="padding: 10px; border: 1px solid #ddd;"><?php echo isset($row['phone']) ? $row['phone'] : ''; ?></td>
                <td style="padding: 10px; border: 1px solid #ddd;"><?php echo isset($row['address']) ? $row['address'] : ''; ?></td>
                <td style="padding: 10px; border: 1px solid #ddd;">
                    <a href="edit.php?id=<?php echo $row['id']; ?>" style="text-decoration: none; color: #4CAF50;">Edit</a>
                    <a href="delete.php?id=<?php echo $row['id']; ?>" style="text-decoration: none; color: #f44336; margin-left: 10px;">Delete</a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>







