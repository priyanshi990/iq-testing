<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Instructions</title>
    <link rel="icon" href="images/logo.png">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
    <style>
        * {
            box-sizing: border-box;
        }
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 40px 20px;
            min-height: 100vh;
            background: radial-gradient(circle at top left, #93c5fd, #a78bfa, #f9a8d4);;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow-x: hidden;
        }

        .glass-container {
            position: relative;
            background: rgba(255, 255, 255, 0.15);
            border: 2px solid rgba(255, 255, 255, 0.2);
            border-radius: 24px;
            padding: 40px 30px;
            width: 100%;
            max-width: 1100px;
            backdrop-filter: blur(20px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.15);
            animation: slideFadeIn 1.2s ease-out both;
            overflow: hidden;
        }

        @keyframes slideFadeIn {
            0% {
                opacity: 0;
                transform: scale(0.92) translateY(40px);
            }

            100% {
                opacity: 1;
                transform: scale(1) translateY(0);
            }
        }

        .glass-container::before {
            content: '';
            position: absolute;
            top: -2px;
            left: -2px;
            right: -2px;
            bottom: -2px;
            z-index: -1;
            background: linear-gradient(135deg, #93c5fd, #a78bfa, #f9a8d4);
            background-size: 400% 400%;
            animation: borderGlow 12s ease infinite;
            border-radius: 28px;
        }

        @keyframes borderGlow {

            0%,
            100% {
                background-position: 0% 50%;
            }

            50% {
                background-position: 100% 50%;
            }
        }

        h1 {
            text-align: center;
            font-weight: 700;
            font-size: 2rem;
            color: #1e3a8a;
            margin-bottom: 30px;
        }

        .accordion .card {
            background: rgba(255, 255, 255, 0.9);
            border: none;
            border-radius: 16px;
            margin-bottom: 18px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
            transition: transform 0.3s ease;
        }

        .accordion .card:hover {
            transform: scale(1.01);
        }

        .btn-link {
            font-size: 1.2rem;
            font-weight: 600;
            color: #4f46e5;
            padding: 18px;
            text-align: left;
            width: 100%;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .btn-link:hover {
            color: #1e3a8a;
        }

        .card-body {
            font-size: 1.05rem;
            padding: 20px 28px;
            color: #374151;
        }

        .btn-start {
            display: inline-block;
            margin-top: 30px;
            font-size: 1.2rem;
            padding: 14px 36px;
            border-radius: 14px;
            background: linear-gradient(to right, #6366f1, #7c3aed);
            color: white;
            border: none;
            cursor: pointer;
            box-shadow: 0 0 18px rgba(124, 58, 237, 0.5);
            transition: all 0.4s ease;
        }

        .btn-start:hover {
            transform: translateY(-3px);
            box-shadow: 0 0 24px rgba(99, 102, 241, 0.6);
        }

        ul {
            padding-left: 20px;
        }

        li {
            margin-bottom: 10px;
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
    <div class="glass-container animate__animated animate__fadeIn">
        <h1>🧠 "HOW TO USE PROSKILL LIKE A PRO"</h1>

        <div class="accordion" id="accordionInstructions">
            <div class="card">
                <div class="card-header">
                    <h2>
                        <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne">1. 🧩 Format &
                            Levels</button>
                    </h2>
                </div>
                <div id="collapseOne" class="collapse" data-parent="#accordionInstructions">
                    <div class="card-body">
                        <ul>
                            <li><strong>Total Questions:</strong> 25</li>
                            <li><strong>Levels:</strong>
                                <ul>
                                    <li>🧮 Math</li>
                                    <li>🧠 Logical</li>
                                    <li>🌈 MBTI</li>
                                    <li>📚 Quiz</li>
                                    <li>🧏 Memory</li>
                                </ul>
                            </li>
                            <li>One question appears at a time</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h2><button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo">2. ⏱️
                            Time Limit</button></h2>
                </div>
                <div id="collapseTwo" class="collapse" data-parent="#accordionInstructions">
                    <div class="card-body">
                        <p>You have <strong>57 seconds</strong> per question. Auto-next after time expires.</p>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h2><button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree">3. 🔄
                            Navigation</button></h2>
                </div>
                <div id="collapseThree" class="collapse" data-parent="#accordionInstructions">
                    <div class="card-body">
                        <ul>
                            <li>Use ⬅️ Previous and ➡️ Next buttons</li>
                            <li>Hint is available once per question (if enabled)</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header" id="headingFour">
                    <h2>
                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFour"
                            aria-expanded="false" aria-controls="collapseFour">
                            4. 📌 Final Guidelines
                        </button>
                    </h2>
                </div>
                <div id="collapseFour" class="collapse" aria-labelledby="headingFour"
                    data-parent="#accordionInstructions">
                    <div class="card-body">
                        <ul>
                        <li>All <strong>5 types of tests</strong> are compulsory to attempt in order to receive your certificate or test results.</li>
                            <li>Your answers are <strong>automatically saved</strong> as you go — no need to worry about
                                losing progress.</li>
                            <li>If you log out, you’ll be redirected back to the instruction page for
                                reactivation/payment.</li>
                            <li>Once you're finished, click the <strong>Submit</strong> button to see your results
                                immediately.</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="text-center">
            <button class="btn btn-start animate__animated animate__pulse animate__infinite"
                onclick="startPremiumTest()">▶️ Start IQ Test</button>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function startPremiumTest() {
            window.location.href = 'account.php';
        }
    </script>
</body>
</html>