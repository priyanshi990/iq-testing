<?php 
    $con = mysqli_connect("localhost","root","");
    mysqli_select_db($con,"test") or die("please check database");
    if(isset($_POST["answer"]))
    {
        session_start();
        $email = $_SESSION['email'];
        $r1 = $_POST["r1"];
        $r2 = $_POST["r2"];
        $r3 = $_POST["r3"];
        $r4 = $_POST["r4"];
        $r5 = $_POST["r5"];
        $r6 = $_POST["r6"];
        $r7 = $_POST["r7"];
        $r8 = $_POST["r8"];
        $r9 = $_POST["r9"];
        $r10 = $_POST["r10"];
        
        $ins = mysqli_query($con,"update free set q1 = '$r1', q2 = '$r2',q3= '$r3',q4= '$r4',q5= '$r5',q6= '$r6',q7= '$r7',q8= '$r8',q9= '$r9',q10= '$r10' where email = '$email'");
        if($ins)
        {
            echo"<script>alert('YOUR ANSWERS HAVE BEEN RECORDED! THANK YOU')</script>";
        }
        else
        {
            echo"<script>alert('Error in record..! Sorry')</script>";   
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IQ Test</title>
    <link rel="icon" href="images/logo.png">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <style>
body {
    background-image: url("images/bb.avif");
            background-size: cover;
            background-attachment: fixed;
            background-position: center;
            font-family: 'Arial', sans-serif;
            color: #333;
}
.container {
    max-width: 900px;
    margin: 50px auto;
    background-color: rgba(255, 255, 255, 0.9);
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    backdrop-filter: blur(10px);
}

.timer {
    font-weight: bold;
    font-size: 24px;
    color: #ff6b6b;
    text-align: center;
    padding: 10px;
    border: 2px solid #ff6b6b;
    border-radius: 8px;
    background-color: #fff;
    box-shadow: 0 3px 6px rgba(0, 0, 0, 0.1);
    transition: background-color 0.3s, color 0.3s;
}

.timer:hover {
    background-color: #ff6b6b;
    color: #fff;
}

.navigation {
    display: flex;
    justify-content: space-between;
    margin-top: 20px;
}

.navigation button {
    background-color: #007bff;
    color: #fff;
    padding: 10px 15px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s;
}

.navigation button:hover {
    background-color: #0056b3;
}

.instructions {
    background-color: #f1f1f1;
    padding: 20px;
    margin-bottom: 20px;
    border: 1px solid #ddd;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    font-size: 16px;
    line-height: 1.6;
}

.instructions h3 {
    font-size: 18px;
    color: #333;
}

.instructions p {
    margin: 10px 0;
}

@media (max-width: 768px) {
    .container {
        max-width: 100%;
        padding: 15px;
    }
    
    .navigation {
        flex-direction: column;
    }

    .navigation button {
        margin-bottom: 10px;
    }
}
        .home-btn {
            position: absolute;
            top: 20px;
            left: 20px;
            background-color: #1e4b7a;
            color: white;
            border-radius: 30px;
            padding: 10px 20px;
            text-decoration: none;
            font-size: 16px;
            border: 2px solid #ffffff;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }
        .home-btn:hover {
            background-color: #e65100;
            transform: translateY(-3px);
        }
    </style>
</head>
<body>
<a href="i.php" class="home-btn">&larr; Home</a>
<div class="container border p-3" style="background-color: #ffdddd;">
    <h2 class="text-center">IQ Test</h2>
    <div class="instructions">
        <h4>Instructions:</h4>
        <ul>
            <li>Read each question carefully before answering.</li>
            <li>Click "Show Hint" if you're stuck on a question.</li>
            <li>You have a total of 10 minutes to complete the test.</li>
            <li>Once time runs out, your answers will be submitted automatically.</li>
        </ul>
    </div>

    <div id="timer" class="timer">Time Left: 10:00</div>
    
    <form action="" method="post" id="quizForm">
        <div class="question" id="q1">
            <div>Question 1: What number comes next in the series: 2, 4, 8, 16, _?</div>
            <button type="button" class="btn btn-info btn-sm mt-2" onclick="showHint('Hint:  It’s like the number is doing jumping jacks—always doubling!.')">Show Hint</button>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="r1" value="20" id="r1a"> 
                <label class="form-check-label" for="r1a">20</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="r1" value="24" id="r1b">
                <label class="form-check-label" for="r1b">24</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="r1" value="32" id="r1c">
                <label class="form-check-label" for="r1c">32</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="r1" value="40" id="r1d">
                <label class="form-check-label" for="r1d">40</label>
            </div>
            <br>
            <div class="navigation">
                <button type="button" class="btn btn-primary next">Next</button>
            </div>
        </div>
        <div class="question" id="q2" style="display:none;">
            <div>Question 2:  If you rearrange the letters "CIFAIPC," you would have the name of a(n):</div>
            <button type="button" class="btn btn-info btn-sm mt-2" onclick="showHint('Hint: It sounds like a place where you might go surfing or get lost!')">Show Hint</button>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="r2" value=" Magnificent" id="r2a">
                <label class="form-check-label" for="r2a"> Magnificent</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="r2" value=" Pacific" id="r2b">
                <label class="form-check-label" for="r2b"> Pacific</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="r2" value=" Typical" id="r2c">
                <label class="form-check-label" for="r2c"> Typical</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="r2" value="Specific" id="r2d">
                <label class="form-check-label" for="r2d">Specific</label>
            </div>
            <br>
            <div class="navigation">
                <button type="button" class="btn btn-secondary prev">Previous</button>
                <button type="button" class="btn btn-primary next">Next</button>
            </div>
        </div>
        <div class="question" id="q3" style="display:none;">
            <div>Question 3: In a family of six members P, Q, R, S, T, and U, there are two married couples. R is a doctor and is married to S. U is a teacher and is the brother of Q. How is P related to T?</div>
            <button type="button" class="btn btn-info btn-sm mt-2" onclick="showHint('Hint: Think of family trees as the most confusing game of Twister you’ve ever played!')">Show Hint</button>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="r3" value=" Cousin" id="r3a">
                <label class="form-check-label" for="r3a"> Cousin</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="r3" value=" In-law" id="r3b">
                <label class="form-check-label" for="r3b"> In-law</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="r3" value="  Sibling" id="r3c">
                <label class="form-check-label" for="r3c">  Sibling</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="r3" value="Unknown" id="r3d">
                <label class="form-check-label" for="r3d">Unknown</label>
            </div>
            <br>
            <div class="navigation">
                <button type="button" class="btn btn-secondary prev">Previous</button>
                <button type="button" class="btn btn-primary next">Next</button>
            </div>
        </div>
        <div class="question" id="q4" style="display:none;">
            <div>Question 4: Which of the following shapes does not belong in the group: Circle, Triangle, Square, Rectangle, Hexagon?</div>
            <button type="button" class="btn btn-info btn-sm mt-2" onclick="showHint('Hint:  One of these shapes just doesn’t fit in at the geometry party!')">Show Hint</button>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="r4" value=" Hexagon" id="r4a">
                <label class="form-check-label" for="r4a"> Hexagon</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="r4" value="Rectangle" id="r4b">
                <label class="form-check-label" for="r4b"> Rectangle</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="r4" value=" Triangle" id="r4c">
                <label class="form-check-label" for="r4c"> Triangle</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="r4" value="Circle" id="r4d">
                <label class="form-check-label" for="r4d">Circle</label>
            </div>
            <br>
            <div class="navigation">
                <button type="button" class="btn btn-secondary prev">Previous</button>
                <button type="button" class="btn btn-primary next">Next</button>
            </div>
        </div>
        <div class="question" id="q5" style="display:none;">
            <div>Question 5: A farmer has 17 sheep, and all but 9 die. How many are left?</div>
            <button type="button" class="btn btn-info btn-sm mt-2" onclick="showHint('Hint: Count the sheep that are still bouncing around—no need for any sleep!')">Show Hint</button>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="r5" value="17" id="r5a">
                <label class="form-check-label" for="r5a">17</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="r5" value=" 9" id="r5b">
                <label class="form-check-label" for="r5b"> 9</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="r5" value="8" id="r5c">
                <label class="form-check-label" for="r5c">8</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="r5" value="0" id="r5d">
                <label class="form-check-label" for="r5d">0</label>
            </div>
            <br>
            <div class="navigation">
                <button type="button" class="btn btn-secondary prev">Previous</button>
                <button type="button" class="btn btn-primary next">Next</button>
            </div>
        </div>
        <div class="question" id="q6" style="display:none;">
            <div>Question 6:  If it takes 5 machines 5 minutes to make 5 widgets, how long will it take 100 machines to make 100 widgets?</div>
            <button type="button" class="btn btn-info btn-sm mt-2" onclick="showHint('Hint: Machines love to work together, like a team of superheroes!')">Show Hint</button>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="r6" value=" 5 minutes" id="r6a">
                <label class="form-check-label" for="r6a"> 5 minutes</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="r6" value="10 minutes" id="r6b">
                <label class="form-check-label" for="r6b">10 minutes</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="r6" value=" 100 minutes" id="r6c">
                <label class="form-check-label" for="r6c">  100 minutes</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="r6" value=" 1 minute" id="r6d">
                <label class="form-check-label" for="r6d"> 1 minute</label>
            </div>
            <br>
            <div class="navigation">
                <button type="button" class="btn btn-secondary prev">Previous</button>
                <button type="button" class="btn btn-primary next">Next</button>
            </div>
        </div>
        <div class="question" id="q7" style="display:none;">
            <div>Question 7: What is the next letter in this sequence: A, C, F, J, O, _?</div>
            <button type="button" class="btn btn-info btn-sm mt-2" onclick="showHint('Hint: These letters are playing hopscotch—can you keep up with their jumps?')">Show Hint</button>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="r7" value=" T" id="r7a">
                <label class="form-check-label" for="r7a"> T</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="r7" value=" P" id="r7b">
                <label class="form-check-label" for="r7b">P</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="r7" value=" R" id="r7c">
                <label class="form-check-label" for="r7c">R</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="r7" value="Z" id="r7d">
                <label class="form-check-label" for="r7d">Z</label>
            </div>
            <br>
            <div class="navigation">
                <button type="button" class="btn btn-secondary prev">Previous</button>
                <button type="button" class="btn btn-primary next">Next</button>
            </div>
        </div>
        <div class="question" id="q8" style="display:none;">
            <div>Question 8: If two's company and three's a crowd, what do you call four and five?</div>
            <button type="button" class="btn btn-info btn-sm mt-2" onclick="showHint('Hint:  It sounds like a fun party waiting to happen!')">Show Hint</button>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="r8" value="A festival" id="r8a">
                <label class="form-check-label" for="r8a">A festival</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="r8" value="A nightmare" id="r8b">
                <label class="form-check-label" for="r8b">A nightmare</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="r8" value="  Nine" id="r8c">
                <label class="form-check-label" for="r8c"> Nine</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="r8" value=" A gathering" id="r8d">
                <label class="form-check-label" for="r8d"> A gathering</label>
            </div>
            <br>
            <div class="navigation">
                <button type="button" class="btn btn-secondary prev">Previous</button>
                <button type="button" class="btn btn-primary next">Next</button>
            </div>
        </div>
        <div class="question" id="q9" style="display:none;">
            <div>Question 9: A plane crashes on the border of two countries. Where do they bury the survivors?</div>
            <button type="button" class="btn btn-info btn-sm mt-2" onclick="showHint('Hint: Survivors don’t need a spot in the ground; they need a high-five instead!')">Show Hint</button>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="r9" value="In a cemetery" id="r9a">
                <label class="form-check-label" for="r9a">In a cemetery</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="r9" value=" Nowhere" id="r9b">
                <label class="form-check-label" for="r9b">  Nowhere</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="r9" value=" In the nearest country" id="r9c">
                <label class="form-check-label" for="r9c"> In the nearest country</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="r9" value=" On the border" id="r9d">
                <label class="form-check-label" for="r9d"> On the border</label>
            </div>
            <br>
            <div class="navigation">
                <button type="button" class="btn btn-secondary prev">Previous</button>
                <button type="button" class="btn btn-primary next">Next</button>
            </div>
        </div>
        <div class="question" id="q4" style="display:none;">
            <div>Question 10: You see a boat filled with people. It has not sunk, but when you look again you don’t see a single person on the boat. Why?</div>
            <button type="button" class="btn btn-info btn-sm mt-2" onclick="showHint('Hint: They must have found a secret island for a group hug!')">Show Hint</button>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="r10" value="  They’re hiding" id="r10a">
                <label class="form-check-label" for="r10a"> They’re hiding</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="r10" value="They’ve vanished into thin air" id="r10b">
                <label class="form-check-label" for="r10b">They’ve vanished into thin air</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="r10" value=" They jumped overboard" id="r10c">
                <label class="form-check-label" for="r10c"> They jumped overboard</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="r10" value=" They’re all married" id="r10d">
                <label class="form-check-label" for="r10d"> They’re all married</label>
            </div>
            <br>
            <div class="navigation">
                <button type="button" class="btn btn-secondary prev">Previous</button>
                <button type="button" class="btn btn-primary next">Next</button>
            </div>
        </div>
        <div class="text-center mt-4">
            <input type="submit" name="answer" value="Submit Answer" class="btn btn-dark" style="width: 300px;" onclick="stopTimer()">
        </div>
    <div class="text-center mt-4">
        <a href="http://localhost/proskillmind1/pr.php" class="btn btn-success" role="button" style="width: 300px;">View Result</a>
    </div>
    </form>
    <div id="result" class="mt-3"></div>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

<script>
    var timeLeft = 600; // 10 minutes in seconds
    var timerId = setInterval(updateTimer, 1000);
    function updateTimer() {
        var minutes = Math.floor(timeLeft / 60);
        var seconds = timeLeft % 60;
        if (seconds < 10) seconds = "0" + seconds;
        document.getElementById('timer').innerHTML = 'Time Left: ' + minutes + ":" + seconds;
        if (timeLeft <= 0) {
            clearInterval(timerId);
            document.getElementById('quizForm').submit(); 
        }
        timeLeft--;
    }
    function stopTimer() {
        clearInterval(timerId);
    }
    function showHint(hintMessage) {
        alert(hintMessage);
    }
    $('.next').click(function () {
        $(this).closest('.question').hide().next('.question').show();
    });

    $('.prev').click(function () {
        $(this).closest('.question').hide().prev('.question').show();
    });
       document.querySelector('.toggle-nav').addEventListener('click', function() {
            const navMenu = document.getElementById('navMenu');
            navMenu.style.display = navMenu.style.display === 'none' || navMenu.style.display === '' ? 'block' : 'none';
        });
</script>
</body>
</html>