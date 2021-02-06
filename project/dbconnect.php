<?php
// connect to database
$conn = mysqli_connect("localhost", "root", "", "registration");

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

    $name = $data["name"];
    $venue = $data["venue"];
    $price = $data["price"];
    $description = $data["description"];
    $phone = $data["phone"];


    // query insert 
    $query = "INSERT INTO booking
              VALUES
              ('', '$name', '$venue', '$price', '$description', '$phone')           
            ";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}


function delete($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM booking WHERE id = $id");

    return mysqli_affected_rows($conn);
}

function update($data)
{
    global $conn;
    $id = $data["id"];
    $name = $data["name"];
    $venue = $data["venue"];
    $price = $data["price"];
    $description = $data["description"];
    $phone = $data["phone"];


    // query insert ada
    $query = "UPDATE booking SET
              name = '$name',
              venue = '$venue',
              price = '$price',
              descriptions = '$description',
              phone = '$phone',
              WHERE id = $id         
            ";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}