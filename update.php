<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Record</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 400px;
            max-width: 90%;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            color: #333;
        }

        input[type="text"],
        input[type="email"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        button[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
            margin-top: 10px;
            font-size: 16px;
        }

        button[type="submit"]:hover {
            background-color: #45a049;
        }

        .error {
            color: red;
            margin-top: 5px;
        }
    </style>
</head>
<body>

    <div class="container">
        <?php
        include("connect.php");
        error_reporting(0);

        if(isset($_GET['id'])) {
            $id = $_GET['id'];
            $query = "SELECT * FROM form_data WHERE id='$id'";
            $data = mysqli_query($conn, $query);
            $result = mysqli_fetch_assoc($data);

            if ($result) {
                $username = $result['username'];
                $lastname = $result['lastname'];
                $email = $result['email'];
                $contact = $result['contact'];
            } else {
                echo "Record not found.";
                exit();
            }
        } else {
            echo "ID parameter not provided.";
            exit();
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Handle form submission
            $newUsername = $_POST['username'];
            $newLastname = $_POST['lastname'];
            $newEmail = $_POST['email'];
            $newContact = $_POST['contact'];

            $updateQuery = "UPDATE form_data SET username='$newUsername', lastname='$newLastname', email='$newEmail', contact='$newContact' WHERE id='$id'";
            $updateResult = mysqli_query($conn, $updateQuery);

            if ($updateResult) {
                echo "Record updated successfully.";
            } else {
                echo "Error updating record: " . mysqli_error($conn);
            }
        }
        ?>

        <h2>Update Record</h2>
        <form method="POST">
            <label for="username">First Name:</label>
            <input type="text" id="username" name="username" value="<?php echo $username; ?>">

            <label for="lastname">Last Name:</label>
            <input type="text" id="lastname" name="lastname" value="<?php echo $lastname; ?>">

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?php echo $email; ?>">

            <label for="contact">Contact:</label>
            <input type="text" id="contact" name="contact" value="<?php echo $contact; ?>">

            <button type="submit">Update</button>
        </form>
       
    </div>
</body>
</html>
