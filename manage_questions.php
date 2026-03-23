<?php
$servername = "localhost"; 
$username = "root";
 $password = ""; 
 $dbname = "test";
  $conn = new mysqli($servername, $username, $password, $dbname);

  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$query = "SELECT * FROM question";
$result = $conn->query($query);
if (isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];
    $delete_query = "DELETE FROM question WHERE q_no = $delete_id";
    if ($conn->query($delete_query)) {
        echo "Question deleted successfully!";
        header('Location: manage_questions.php'); 
        exit;
    } else {
        echo "Error deleting question: " . $conn->error;
    }
}
if (isset($_POST['add_question'])) {
    $question_text = $_POST['q_text'];
    $option_a = $_POST['op_a'];
    $option_b = $_POST['op_b'];
    $option_c = $_POST['op_c'];
    $option_d = $_POST['op_d'];
    $correct_option = $_POST['correct_answer'];

    $insert_query = "INSERT INTO question (q_text, op_a, op_b, op_c, op_d, correct_answer) 
                     VALUES ('$question_text', '$option_a', '$option_b', '$option_c', '$option_d', '$correct_option')";
    if ($conn->query($insert_query)) {
        echo "Question added successfully!";
        header('Location: manage_questions.php'); 
        exit;
    } else {
        echo "Error adding question: " . $conn->error;
    }
}
if (isset($_POST['edit_question'])) {
    $edit_id = $_POST['q_no'];
    $question_text = $_POST['q_text'];
    $option_a = $_POST['op_a'];
    $option_b = $_POST['op_b'];
    $option_c = $_POST['op_c'];
    $option_d = $_POST['op_d'];
    $correct_option = $_POST['correct_answer'];

    $update_query = "UPDATE question SET q_text = '$question_text', op_a = '$option_a', op_b = '$option_b', 
                     op_c = '$option_c', op_d = '$option_d', correct_answer = '$correct_option' WHERE q_no = $edit_id";
    if ($conn->query($update_query)) {
        echo "Question updated successfully!";
        header('Location: manage_questions.php'); 
        exit;
    } else {
        echo "Error updating question: " . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Questions</title>
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
        input[type="text"], input[type="email"], textarea {
            padding: 5px;
            margin-right: 5px;
            border: none;
            border-radius: 5px;
            background-color: #ecf0f1;
            width: 100%;
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
            <h1>Manage Questions</h1>
        </div>
        <h3>Add New Question</h3>
        <form method="POST" action="">
            <input type="text" name="q_text" placeholder="Enter Question Text" required><br><br>
            <input type="text" name="op_a" placeholder="Option A" required><br><br>
            <input type="text" name="op_b" placeholder="Option B" required><br><br>
            <input type="text" name="op_c" placeholder="Option C" required><br><br>
            <input type="text" name="op_d" placeholder="Option D" required><br><br>
            <select name="correct_answer" required>
                <option value="">Select Correct Option</option>
                <option value="A">Option A</option>
                <option value="B">Option B</option>
                <option value="C">Option C</option>
                <option value="D">Option D</option>
            </select><br><br>
            <button type="submit" name="add_question">Add Question</button>
        </form>
        <table>
            <tr>
                <th>ID</th>
                <th>Question Text</th>
                <th>Option A</th>
                <th>Option B</th>
                <th>Option C</th>
                <th>Option D</th>
                <th>Correct Option</th>
                <th>Actions</th>
            </tr>

            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>" . $row['q_no'] . "</td>
                            <td>" . $row['q_text'] . "</td>
                            <td>" . $row['op_a'] . "</td>
                            <td>" . $row['op_b'] . "</td>
                            <td>" . $row['op_c'] . "</td>
                            <td>" . $row['op_d'] . "</td>
                            <td>" . $row['correct_answer'] . "</td>
                            <td>
                                <form action='' method='POST' style='display:inline-block;'>
                                    <input type='hidden' name='question_id' value='" . $row['q_no'] . "'>
                                    <input type='text' name='question_text' value='" . $row['q_text'] . "' required>
                                    <input type='text' name='option_a' value='" . $row['op_a'] . "' required>
                                    <input type='text' name='option_b' value='" . $row['op_b'] . "' required>
                                    <input type='text' name='option_c' value='" . $row['op_c'] . "' required>
                                    <input type='text' name='option_d' value='" . $row['op_d'] . "' required>
                                    <select name='correct_answer' required>
                                        <option value='" . $row['correct_answer'] . "'>" . $row['correct_answer'] . "</option>
                                        <option value='A'>Option A</option>
                                        <option value='B'>Option B</option>
                                        <option value='C'>Option C</option>
                                        <option value='D'>Option D</option>
                                    </select>
                                    <button type='submit' name='edit_question'>Edit</button>
                                </form>
                                <a href='?delete_id=" . $row['q_no'] . "' onclick='return confirm(\"Are you sure you want to delete this question?\");'>Delete</a>
                            </td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='8'>No questions found.</td></tr>";
            }
            ?>
        </table>
    </div>
</body>
</html>
