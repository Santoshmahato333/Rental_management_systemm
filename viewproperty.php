<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Properties List</title>
</head>
<body>
    <h1>Property List</h1>
    <table border="1" width="100%">
        <thead>
            <tr>
                <th>PID</th>
                <th>Type</th>
                <th>Original Price</th>
                <th>Discount</th>
                <th>District</th>
                <th>City</th>
                <th>Address</th>
                <th>image</th>
                <th>Description</th>
                <th>Registration Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Include database connection
            include 'connection.php';

            // Fetch products from the database
            $sql = "SELECT * FROM properties";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <tr>
                    <td><?=$row['pid']?>  </td>
                    <td><?=$row['type'] ?></td>
                    <td><?=$row['original_price'] ?></td>
                    <td><?=$row['discount'] ?></td>
                    <td><?=$row['district'] ?></td>
                    <td><?=$row['city'] ?></td>
                    <td><?=$row['address'] ?></td>
                    <td>
                    <?= $row['image'] ?>
                    <img src="upload/<?= $row['image'] ?>" width='80' alt="">
                    </td>
                    <td><?=$row['description'] ?></td>
                    <td><?=$row['registration_date'] ?></td>
                    <td> 
                    <a href="updateproperty.php?pid=<?= $row['pid'] ?>">update</a> 

                    <a href="deleteproperty.php?pid=<?= $row['pid'] ?> &image=<?= $row['image'] ?>">delete</a>
                    </td>
                    </tr>
                <?php
                }
            } else {
                echo "<tr><td colspan='10'>No products found</td></tr>";
            }

            // Close database connection
            mysqli_close($conn);
            ?>
        </tbody>
    </table>
</body>
</html>

