<?php
include('connection.php');

// Assuming you're retrieving data from a table named 'users'
$query = "SELECT * FROM users";
$result = mysqli_query($conn, $query);

if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User List</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
    </style>
</head>
<body>
    <h1>User List</h1>
    <table>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Age</th>
            <th>Gender</th>
            <th>Phone</th>
            <th>Role</th>
            <th>Image</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['age']; ?></td>
                <td><?php echo $row['gender']; ?></td>
                <td><?php echo $row['phone']; ?></td>
                <td><?php echo $row['role']; ?></td>
                <td><img src="uploads/<?php echo $row['image']; ?>" alt="User Image" style="width: 100px;"></td> <!-- Assuming 'uploads' is the folder where images are stored -->
            </tr>
        <?php } ?>
    </table>
</body>
</html>

<?php
// Release the result set
mysqli_free_result($result);

// Close the database connection
mysqli_close($conn);
?>
