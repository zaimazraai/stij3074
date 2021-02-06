<?php
require 'dbconnect.php';

// fetch data in url
$id = $_GET["id"];

// query book data base on id
$book = query("SELECT * FROM booking WHERE id = $id")[0];


// check if submit button are click or not
if (isset($_POST["submit"])) {



    // check if data has been change or not
    if (update($_POST) > 0) {
        echo "
            <script>
                alert('Update Successful!');
                document.location.href = 'index.php'
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Update Fail!');
                document.location.href = 'index.php'
            </script>
        ";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Booking</title>

    <style>
        textarea {
            width: 100%;
            height: 150px;
            padding: 12px 20px;
            box-sizing: border-box;
            border: 2px solid #ccc;
            border-radius: 4px;
            resize: none;
        }
    </style>

</head>

<body>
    <h1>Update Booking</h1>

    <form method="post" action="" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $book["id"]; ?>">
        <ul>
            <li>
                <label for="name">Name : </label>
                <input type="text" name="name" id="name" value="<?= $book["name"]; ?>">
            </li>
            <li>
                <label for="venue">Venue : </label>
                <input type="text" name="venue" id="venue" value="<?= $book["venue"]; ?>">
            </li>
            <li>
                <label for="price">Price : </label>
                <input type="text" name="price" id="price" value="<?= $book["price"]; ?>">
            </li>
            <li>
                <label for="description">Description : </label>
                <!-- <input type="text" name="descriptions" id="descriptions" cols="30" rows="10" value="<?= $book["description"]; ?>"> -->
                <textarea name="description" id="description" cols="30" rows="10"><?= $book["description"]; ?></textarea>
            </li>
            <li>
                <label for="phone">Phone No : </label>
                <input type="text" name="phone" id="phone" value="<?= $book["phone"]; ?>">
            </li>
            <li>
                <button type=" submit" name="submit">Submit!</button>
            </li>
        </ul>
        <a href="index.php">Cancel</a>
    </form>

</body>

</html>