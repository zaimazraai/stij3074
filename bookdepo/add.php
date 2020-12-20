<?php
require 'dbconnect.php';

// check apakah button submit sudah ditekan atau belum
if (isset($_POST["submit"])) {



    // check adakah data berhasil ditambahkan atau tidak
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
    <title>Add New Book</title>

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
    <h1>Add New Book</h1>

    <form method="post" action="" enctype="multipart/form-data">
        <ul>
            <li>
                <label for="title">Title : </label>
                <input type="text" name="title" id="title">
            </li>
            <li>
                <label for="author">Author : </label>
                <input type="text" name="author" id="author">
            </li>
            <li>
                <label for="price">Price : </label>
                <input type="text" name="price" id="price">
            </li>
            <li>
                <label for="descriptions">Description : </label>
                <textarea name="descriptions" id="descriptions" cols="30" rows="10"></textarea>
            </li>
            <li>
                <label for="publisher">Publisher : </label>
                <input type="text" name="publisher" id="publisher">
            </li>
            <li>
                <label for="isbn">ISBN : </label>
                <input type="text" name="isbn" id="isbn">
            </li>
            <li>
                <button type="submit" name="submit">Submit!</button>
            </li>
        </ul>
    </form>

</body>

</html>