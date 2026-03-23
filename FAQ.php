<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAQ Page - ProSkill Mind</title>
    <link rel="icon" href="images/logo.png">
    <style>
        body, html {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background: linear-gradient(to bottom right, #a1c4fd, #c2e9fb); 
            color: #333;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px 20px;
            text-align: center;
            background-color: rgba(255, 255, 255, 0.9); 
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1); 
        }
        .faq-section h1 {
            font-size: 28px;
            color: #005f99;
            margin-bottom: 10px;
        }
        .faq-section p {
            font-size: 18px;
            margin: 10px 0 30px;
        }
        .accordion {
            background-color: #fff;
            color: #333;
            cursor: pointer;
            padding: 15px;
            width: 100%;
            border: 1px solid #ccc;
            text-align: left;
            outline: none;
            font-size: 18px;
            transition: background-color 0.3s;
            border-radius: 4px;
            margin-bottom: 10px;
        }
        .accordion:hover {
            background-color: #e6f7ff;
        }
        .panel {
            padding: 0 15px;
            background-color: #f9f9f9;
            display: none;
            overflow: hidden;
            border-left: 2px solid #005f99;
            border-right: 2px solid #005f99;
            border-bottom: 2px solid #005f99;
            border-radius: 0 0 4px 4px;
        }
        .toggle-all, .favorite-btn {
            margin-top: 20px;
            background-color: #005f99;
            color: white;
            border: none;
            border-radius: 4px;
            padding: 10px 15px;
            cursor: pointer;
        }
        #faqContainer {
            margin-top: 20px;
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
<div class="container">
    <div class="faq-section">
        <h1>Frequently Asked Questions</h1>
        <p>Explore questions and answers about ProSkill Mind.</p>

        <button class="toggle-all" id="toggleAll">Toggle All</button>

        <div id="faqContainer">
            <div class="faq-item">
                <button class="accordion">What are the features of the Premium plan?</button>
                <div class="panel">
                    <p>The Premium plan costs 200, allowing multiple test attempts with dynamic questions, detailed performance analysis, and a certification on completion.</p>
                </div>
            </div>
            <div class="faq-item">
                <button class="accordion">How does the Free plan work?</button>
                <div class="panel">
                    <p>The Free plan offers a single test attempt with static questions and a basic result summary.</p>
                </div>
            </div>
            <div class="faq-item">
                <button class="accordion">Can I attempt the test multiple times in the Premium plan?</button>
                <div class="panel">
                    <p>Yes, the Premium plan allows unlimited test attempts, helping you track improvement over time.</p>
                </div>
            </div>
            <div class="faq-item">
                <button class="accordion">Will I receive a certificate in the Free plan?</button>
                <div class="panel">
                    <p>No, certificates are only available in the Premium plan upon successful test completion.</p>
                </div>
            </div>
            <div class="faq-item">
                <button class="accordion">How is the detailed analysis generated in the Premium plan?</button>
                <div class="panel">
                    <p>The Premium plan provides an in-depth report on your strengths and areas of improvement based on your test performance.</p>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const accordions = document.querySelectorAll('.accordion');
        accordions.forEach((accordion) => {
            accordion.addEventListener('click', function() {
                this.classList.toggle('active');
                const panel = this.nextElementSibling;
                panel.style.display = panel.style.display === "block" ? "none" : "block";
            });
        });
        document.getElementById('toggleAll').addEventListener('click', function() {
            const allOpen = [...accordions].every(acc => acc.nextElementSibling.style.display === "block");
            accordions.forEach(accordion => {
                accordion.classList.toggle('active', !allOpen);
                accordion.nextElementSibling.style.display = !allOpen ? "block" : "none";
            });
        });
    });
</script>
</body>
</html>
