<?php

// Database connection
$servername = "localhost"; 
$username = "root";
$password = ""; 
$dbname = "test";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) { 
    die("Connection failed: " . $conn->connect_error);
}

// Fetch results from the database
$query = "SELECT * FROM result";
$result = $conn->query($query);

// Handle delete result action
if (isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];
    $delete_query = "DELETE FROM result WHERE result_id = $delete_id";
    if ($conn->query($delete_query)) {
        echo "Result deleted successfully!";
        header('Location: view_result_details.php'); // Redirect to refresh the page
        exit;
    } else {
        echo "Error deleting result: " . $conn->error;
    }
}

// Handle edit result action
if (isset($_POST['edit_result'])) {
    $edit_id = $_POST['result_id'];
    $user_id = $_POST['user_id'];
    $score = $_POST['score'];
    $grade = $_POST['grade'];
    $date = $_POST['date'];

    $update_query = "UPDATE result SET user_id = '$user_id', score = '$score', grade = '$grade', date = '$date' WHERE result_id = $edit_id";
    if ($conn->query($update_query)) {
        echo "Result updated successfully!";
        header('Location: view_result_details.php'); // Redirect to refresh the page
        exit;
    } else {
        echo "Error updating result: " . $conn->error;
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Results</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .sidebar { background-color: #2c3e50; width: 250px; height: 100vh; position: fixed; top: 0; left: 0; padding-top: 20px; }
        .sidebar ul { list-style-type: none; padding: 0; }
        .sidebar ul li { padding: 15px; text-align: left; }
        .sidebar ul li a { color: white; text-decoration: none; display: block; padding: 10px; font-size: 18px; }
        .sidebar ul li a:hover { background-color: #34495e; }
        .content { margin-left: 250px; padding: 20px; background-color: #34495e; min-height: 100vh; }
        .content .header { background-color: #16a085; color: white; padding: 15px 20px; text-align: center; font-size: 24px; }
        table { width: 100%; margin-top: 20px; border-collapse: collapse; color: #ecf0f1; }
        table th, table td { padding: 10px; text-align: center; }
        table th { background-color: #16a085; }
        table tr:nth-child(even) { background-color: #2c3e50; }
        table tr:hover { background-color: #34495e; }
        input[type="text"], input[type="email"] { padding: 5px; margin-right: 5px; border: none; border-radius: 5px; background-color: #ecf0f1; }
        button { padding: 7px 15px; background-color: #16a085; border: none; border-radius: 5px; color: white; cursor: pointer; }
        button:hover { background-color: #1abc9c; }
        a { color: #e74c3c; text-decoration: none; margin-left: 10px; }
        a:hover { color: #c0392b; }
    </style>
</head>
<body>
    <div class="sidebar">
        <ul>
            <li><a href="adminprem.php">Dashboard</a></li>
            <li><a href="manage_users.php">Users</a></li>
            <li><a href="manage_questions.php">Questions</a></li>
            <!-- <li><a href="view_result_details.php">Results</a></li>
            <li><a href="powerbi_dashboard.php">Power BI Dashboard</a></li> -->
        </ul>
    </div>

    <div class="content">
        <div class="header">
            <h1>Manage Results</h1>
        </div>

        <table>
            <tr>
                <th>Result ID</th>
                <th>User ID</th>
                <th>Score</th>
                <th>Grade</th>
                <th>Date</th>
                <th>Actions</th>
            </tr>

            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>" . $row['result_id'] . "</td>
                            <td>" . $row['user_id'] . "</td>
                            <td>" . $row['score'] . "</td>
                            <td>" . $row['grade'] . "</td>
                            <td>" . $row['date'] . "</td>
                            <td>
                                <form action='' method='POST' style='display:inline-block;'>
                                    <input type='hidden' name='result_id' value='" . $row['result_id'] . "'>
                                    <input type='text' name='user_id' value='" . $row['user_id'] . "' required>
                                    <input type='text' name='score' value='" . $row['score'] . "' required>
                                    <input type='text' name='grade' value='" . $row['grade'] . "' required>
                                    <input type='text' name='date' value='" . $row['date'] . "' required>
                                    <button type='submit' name='edit_result'>Edit</button>
                                </form> 
                                <a href='?delete_id=" . $row['result_id'] . "'>Delete</a>
                            </td>
                        </tr>";
                }
            } else {
                echo "<tr><td colspan='6'>No results found</td></tr>";
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
