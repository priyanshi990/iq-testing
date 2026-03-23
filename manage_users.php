<?php
$servername = "localhost"; 
$username = "root";
 $password = ""; 
 $dbname = "test";
  $conn = new mysqli($servername, $username, $password, $dbname);

  if ($conn->connect_error) {
    header('Content-Type: application/json');
    echo json_encode(["error" => "Connection failed: " . $conn->connect_error]);
    exit;
}
$query = "SELECT * FROM register";
$result = $conn->query($query);
if (isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];
    $delete_query = "DELETE FROM register WHERE user_id = $delete_id";
    if ($conn->query($delete_query)) {
        echo "User deleted successfully!";
        header('Location: manage_users.php');
        exit;
    } else {
        echo "Error deleting user: " . $conn->error;
    }
}
if (isset($_POST['edit_user'])) {
    $edit_id = $_POST['user_id'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];

    $update_query = "UPDATE register SET first_name = '$first_name', last_name = '$last_name', email = '$email' WHERE user_id = $edit_id";
    if ($conn->query($update_query)) {
        echo "User updated successfully!";
        header('Location: manage_users.php'); 
        exit;
    } else {
        echo "Error updating user: " . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Users</title>
    <link rel="stylesheet" href="style.css"> 
    <style>
        .sidebar {
            background-color: #2c3e50;
            width: 250px;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            padding-top: 20px;
        }
        .sidebar ul {
            list-style-type: none;
            padding: 0;
        }
        .sidebar ul li {
            padding: 15px;
            text-align: left;
        }
        .sidebar ul li a {
            color: white;
            text-decoration: none;
            display: block;
            padding: 10px;
            font-size: 18px;
        }
        .sidebar ul li a:hover {
            background-color: #34495e;
        }
        .content {
            margin-left: 250px;
            padding: 20px;
            background-color: #34495e;
            min-height: 100vh;
        }
        .content .header {
            background-color: #16a085;
            color: white;
            padding: 15px 20px;
            text-align: center;
            font-size: 24px;
        }
        table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
            color: #ecf0f1;
        }
        table th, table td {
            padding: 10px;
            text-align: center;
        }
        table th {
            background-color: #16a085;
        }
        table tr:nth-child(even) {
            background-color: #2c3e50;
        }
        table tr:hover {
            background-color: #34495e;
        }
        input[type="text"], input[type="email"] {
            padding: 5px;
            margin-right: 5px;
            border: none;
            border-radius: 5px;
            background-color: #ecf0f1;
        }
        button {
            padding: 7px 15px;
            background-color: #16a085;
            border: none;
            border-radius: 5px;
            color: white;
            cursor: pointer;
        }
        button:hover {
            background-color: #1abc9c;
        }

        a {
            color: #e74c3c;
            text-decoration: none;
            margin-left: 10px;
        }
        a:hover {
            color: #c0392b;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <ul>
            <li><a href="adminprem.php">Dashboard</a></li>
            <li><a href="manage_users.php">Users</a></li>
            <li><a href="manage_questions.php">Questions</a></li>
            <li><a href="view_result_details.php">Results</a></li>
            <li><a href="i.php">Home</a></li>
        </ul>
    </div>

    <div class="content">
        <div class="header">
            <h1>Manage Users</h1>
        </div>

        <table>
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>

            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>" . $row['user_id'] . "</td>
                            <td>" . $row['first_name'] . "</td>
                            <td>" . $row['last_name'] . "</td>
                            <td>" . $row['email'] . "</td>
                            <td>
                                <form action='' method='POST' style='display:inline-block;'>
                                    <input type='hidden' name='user_id' value='" . $row['user_id'] . "'>
                                    <input type='text' name='first_name' value='" . $row['first_name'] . "' required>
                                    <input type='text' name='last_name' value='" . $row['last_name'] . "' required>
                                    <input type='email' name='email' value='" . $row['email'] . "' required>
                                    <button type='submit' name='edit_user'>Edit</button>
                                </form> 
                                <a href='?delete_id=" . $row['user_id'] . "'>Delete</a>
                            </td>
                        </tr>";
                }
            } else {
                echo "<tr><td colspan='5'>No users found</td></tr>";
            }
            ?>
        </table>
    </div>
</body>
</html>

<?php
// Close the database connection
$conn->close();
?>
