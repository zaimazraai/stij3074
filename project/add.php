<?php
require 'dbconnect.php';

// check apakah button submit sudah ditekan atau belum
if (isset($_POST["submit"])) {



    // check if the data has been add or not
    if (add($_POST) > 0) {
        echo "
            <script>
                alert('Successful!');
                document.location.href = 'index.php'
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Fail!');
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
    <title>Add Booking</title>

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
    <h1>Add New Booking</h1>

    <form method="post" action="" enctype="multipart/form-data">
        <ul>
            <li>
                <label for="name">Name : </label>
                <input type="text" name="name" id="name">
            </li>
            <li>
                <label for="venue">Venue : </label>
                <input type="text" name="venue" id="venue">
            </li>
            <li>
                <label for="price">Price : </label>
                <input type="text" name="price" id="price">
            </li>
            <li>
                <label for="description">Description : </label>
                <textarea name="description" id="description" cols="30" rows="10"></textarea>
            </li>
            <li>
                <label for="phone">PhoneNo : </label>
                <input type="text" name="phone" id="phone">
            </li>
            <li>
                <button type="submit" name="submit">Submit!</button>
            </li>
        </ul>
    </form>

</body>

</html>