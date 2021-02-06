<?php include('server.php'); 
require 'dbconnect.php';
$books = query("SELECT * FROM booking");

// button find click
if (isset($_POST["cari"])) {
    $anime = cari($_POST["keyword"]);
}

// if user not logged in, they cannot access this page
if (empty($_SESSION['username'])) {
    header('location: login.php');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UUM Sports Managment System</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="header">
        <h2>UUM Sports Booking System</h2>
    </div>

    <div class="content">
        <?php if (isset($_SESSION['success'])): ?>
            <div class="error success">
                <h3>
                    <?php
                        echo $_SESSION['success'];
                        unset($_SESSION['success']);
                    ?>
                </h3>
            </div>
        <?php endif ?>

        <?php if (isset($_SESSION["username"])): ?>
                <p>Welcome <strong><?php echo $_SESSION['username']; ?></strong></p>
                
                <p><a href="index.php?logout='1'" style="color: red";>logout</a></p>
        <?php endif ?>
    </div>

    <h4>Booking List</h4>

    <br>

    <table border="1" cellpadding="10" cellspacing="1">
        <tr>
            <th>No.</th>
            <th>Action</th>
            <th>Name</th>
            <th>Venue</th>
            <th>Price</th>
            <th>Description</th>
            <th>PhoneNo</th>
        </tr>

        <?php $i = 1; ?>
        <?php foreach ($books as $book) : ?>
            <tr>
                <td><?= $i; ?></td>
                <td>
                    <a href="update.php?id=<?= $book["id"]; ?>">Update</a> |
                    <a href="delete.php?id=<?= $book["id"]; ?>" onclick="return confirm('Are you sure to delete this book?');">Delete</a>
                </td>
                <td><?= $book["name"]; ?></td>
                <td><?= $book["venue"]; ?></td>
                <td><?= $book["price"]; ?></td>
                <td><?= $book["description"]; ?></td>
                <td><?= $book["phone"]; ?></td>
            </tr>
            <?php $i++; ?>
        <?php endforeach; ?>
    </table>

    <br><br>
    <a class="add" href="add.php">Add New Booking</a>

</body>
</html>