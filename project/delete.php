<?php
require 'dbconnect.php';

$id = $_GET["id"];

if (delete($id) > 0) {
    echo "
            <script>
                alert('Delete Successful!');
                document.location.href = 'index.php'
            </script>
        ";
} else {
    echo "
            <script>
                alert('Delete Fail!');
                document.location.href = 'index.php'
            </script>
        ";
}