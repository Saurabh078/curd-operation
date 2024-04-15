<?php
include("connect.php");

if(isset($_GET['id'])) {
    $id = $_GET['id'];

    // Delete record from the database
    $deleteQuery = "DELETE FROM form_data WHERE id='$id'";
    $deleteResult = mysqli_query($conn, $deleteQuery);

    if ($deleteResult) {
        echo "Record deleted successfully.";
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
} else {
    echo "ID parameter not provided.";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="display.php">Display</a>
</body>
</html>