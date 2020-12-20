<?php
// connect ke database
$conn = mysqli_connect("localhost", "root", "", "bookdepo");

function query($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}


function add($data)
{
    global $conn;

    $title = $data["title"];
    $author = $data["author"];
    $price = $data["price"];
    $descriptions = $data["descriptions"];
    $publisher = $data["publisher"];
    $isbn = $data["isbn"];


    // query insert ada
    $query = "INSERT INTO Book
              VALUES
              ('', '$title', '$author', '$price', '$descriptions', '$publisher', '$isbn')           
            ";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}


function delete($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM Book WHERE id = $id");

    return mysqli_affected_rows($conn);
}

function update($data)
{
    global $conn;
    $id = $data["id"];
    $title = $data["title"];
    $author = $data["author"];
    $price = $data["price"];
    $descriptions = $data["descriptions"];
    $publisher = $data["publisher"];
    $isbn = $data["isbn"];


    // query insert ada
    $query = "UPDATE Book SET
              title = '$title',
              author = '$author',
              price = '$price',
              descriptions = '$descriptions',
              publisher = '$publisher',
              isbn = '$isbn'
              WHERE id = $id         
            ";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}