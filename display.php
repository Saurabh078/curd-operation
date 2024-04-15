<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #dddddd;
            text-align: center;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
    <title>Your Table Title</title>
</head>
<body>

<?php
include("connect.php");
error_reporting(0);

$query = "SELECT * FROM form_data";
$data = mysqli_query($conn, $query);
$total = mysqli_num_rows($data);

if ($total != 0) {
    echo "<table>
            <tr>
                <th>FirstName</th>
                <th>LastName</th>
                <th>Email</th>
                <th>Contact</th>
                <th>Actions</th>
            </tr>";

    while ($result = mysqli_fetch_assoc($data)) {
        echo "<tr>
                <td>".$result['username']."</td>
                <td>".$result['lastname']."</td>
                <td>".$result['email']."</td>
                <td>".$result['contact']."</td>
                <td>
                    <a href='update.php?id=".$result['id']."'>Update</a> ||
                    <a href='delete.php?id=".$result['id']."'>Delete</a>
                </td>
              </tr>";
    }

    echo "</table>";
} else {
    echo "No records found";
}
?>
<br/>
<a href="form.php">Add Data</a>

</body>
</html>
