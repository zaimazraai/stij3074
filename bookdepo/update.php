<?php
require 'dbconnect.php';

// ambil data di URL
$id = $_GET["id"];

// query data anime berdasarkan id
$book = query("SELECT * FROM Book WHERE id = $id")[0];


// check apakah button submit sudah ditekan atau belum
if (isset($_POST["submit"])) {



    // check adakah data berhasil diubah atau tidak
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
    <title>Update Book</title>

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
    <h1>Update Book</h1>

    <form method="post" action="" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $book["id"]; ?>">
        <ul>
            <li>
                <label for="title">Title : </label>
                <input type="text" name="title" id="title" value="<?= $book["title"]; ?>">
            </li>
            <li>
                <label for="author">Author : </label>
                <input type="text" name="author" id="author" value="<?= $book["author"]; ?>">
            </li>
            <li>
                <label for="price">Price : </label>
                <input type="text" name="price" id="price" value="<?= $book["price"]; ?>">
            </li>
            <li>
                <label for="descriptions">Description : </label>
                <!-- <input type="text" name="descriptions" id="descriptions" cols="30" rows="10" value="<?= $book["descriptions"]; ?>"> -->
                <textarea name="descriptions" id="descriptions" cols="30" rows="10"><?= $book["descriptions"]; ?></textarea>
            </li>
            <li>
                <label for="publisher">Publisher : </label>
                <input type="text" name="publisher" id="publisher" value="<?= $book["publisher"]; ?>">
            </li>
            <li>
                <label for="isbn">ISBN : </label>
                <input type="text" name="isbn" id="isbn" value="<?= $book["isbn"]; ?>">
            </li>
            <li>
                <button type=" submit" name="submit">Submit!</button>
            </li>
        </ul>
        <a href="index.php">Cancel</a>
    </form>

</body>

</html>