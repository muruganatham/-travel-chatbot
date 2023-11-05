<!DOCTYPE html>
<html>
<head>
    <title>Chatbot</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<button id="increaseFontSizeBtn">A+</button>
        <button id="decreaseFontSizeBtn">A-</button>
<body>
    <header class="header" style="position: relative;">
        <div class="logo">
            <img src="bot1.jpg" alt="Chatbot Logo">
            <img src="bor.png" alt="bor">
            <h1 class="header-title">Intellect<span class="header-title-accent">Interact</span></h1>
            <img src="bor.png" alt="bor">
        </div>
        <nav class="nav">
            <ul>
                <li><a href="#" class="nav-link-home">Home</a></li>
                <li><a href="about.html" class="nav-link-about">About</a></li>
                <li><a href="WEBSITE.HTML" class="nav-link-contact">Contact</a></li>
                <li><a href="feedback.php" class="nav-link-contact">Feedback</a></li>
            </ul>
        </nav>
    </header>
    <div class="body1">
        <div class="login-page">
            <div class="login-container">
                <form class="login-form" id="login-form" action="" method="POST">
                    <h2>Login</h2>
                    <label for="login-email"><i class="fas fa-envelope"></i> Username:</label>
                    <input type="email" id="login-email" name="login-email" required>
                    <label for="login-password"><i class="fas fa-lock"></i> Password:</label>
                    <input type="password" id="login-password" name="login-password" required>
                    <button type="submit" name="login"><i class="fas fa-sign-in-alt"></i> Log In</button>
                    <button id="showSignupBtn" type="button">Signup</button>
                </form>
            </div>
        </div>
    
        <div class="form-container signup-form" id="signupForm">
            <h2>Sign Up</h2>
            <form id="signup-form" method="POST">
                <label for="firstname"><i class="fas fa-user"></i> First Name:</label>
                <input type="text" id="firstname" name="firstname" required>
                <label for="lastname"><i class="fas fa-user"></i> Last Name:</label>
                <input type="text" id="lastname" name="lastname" required>
                <label for="email"><i class="fas fa-envelope"></i> Email:</label>
                <input type="email" id="email" name="email" required>
                <label for="password"><i class="fas fa-lock"></i> Password:</label>
                <input type="password" id="password" name="password" required>
                <button type="submit" name="register"><i class="fas fa-user-plus"></i> Register</button>
            </form>
        </div>
    </div>

    <?php
    session_start();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Database configuration
        $host = "localhost";
        $username = "root"; // Replace with your MySQL username
        $password = ""; // Replace with your MySQL password
        $database = "user_management_db";

        $conn = new mysqli($host, $username, $password, $database);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        if (isset($_POST["register"])) {
            // Registration Form Submission
            $firstname = $_POST["firstname"];
            $lastname = $_POST["lastname"];
            $email = $_POST["email"];
            $password = $_POST["password"]; // Store password in plaintext (not recommended)

            // Check if the email is already registered
            $checkEmail = "SELECT * FROM users WHERE email = '$email'";
            $result = $conn->query($checkEmail);

            if ($result->num_rows > 0) {
                echo "<center><p>Email is already registered. Please choose another email.</p></center>";
            } else {
                $sql = "INSERT INTO users (firstname, lastname, email, password) VALUES ('$firstname', '$lastname', '$email', '$password')";

                if ($conn->query($sql) === TRUE) {
                    echo "<p><center>Registration successful!</center></p>";
                } else {
                    echo "<p>Error: " . $sql . "<br>" . $conn->error . "</p>";
                }
            }
        } 
        if (isset($_POST["login"])) {
            // Login Form Submission
            $loginEmail = $_POST["login-email"];
            $loginPassword = $_POST["login-password"];

            $sql = "SELECT * FROM users WHERE email = '$loginEmail'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                if ($loginPassword === $row["password"]) {
                    $_SESSION["user"] = $row["email"]; // Store user's email in session
     // Execute the Python script and capture its output
                    header('Location: http://127.0.0.1:5001/');
                } else {
                    echo "<p><center>Invalid password. Please try again.</center></p>";
                }
            } else {
                echo "<p><center>Email not found. Please register first.</center></p>";
            }
        }

        $conn->close();
    }
    ?>

    <script>
        function signUp() {
            var firstname = document.getElementById('firstname').value;
            var lastname = document.getElementById('lastname').value;
            var email = document.getElementById('email').value;
            var password = document.getElementById('password').value;
        }

        // Handle user login
        function login() {
            var loginEmail = document.getElementById('login-email').value;
            var loginPassword = document.getElementById('login-password').value;
            if (loginEmail === '' && loginPassword === '') {
                window.location.href = 'http://127.0.0.1:5001/';
            } else {
                alert('Invalid credentials');
            }
        }

        // Toggle signup form visibility
        const showSignupBtn = document.getElementById('showSignupBtn');
        const signupForm = document.querySelector('.signup-form');

        showSignupBtn.addEventListener('click', function () {
            signupForm.style.display = signupForm.style.display === 'block' ? 'none' : 'block';
        });
    </script>

    <center>
        <div class="counselling">
            <a href="www.google.com" target="_blank"><img src="logoo.png" alt="small"></a>
        </div>
    </center>

    <div class="row">
        <div class="column feature-single">
            <div>
                <img src="collect.png" alt="Collect.chat will help you collect data 24x7" class="value-icon">
            </div>
            <h2 class="font-thick">Collect Data 24x7</h2>
            <p class="feature-desc">
                <h3>Collect.chat is always ready to ask questions to your customers. It doesn't need breaks, coffee breaks, or even lunch breaks! The Collect.chat bot will be with you all the time - day and night, all year round!
                </h3><br></h3>
        </div>
        <div class="column feature-single">
            <div>
                <img src="de.png" alt="" class="value-icon">
            </div>
            <h2 class="font-thick">Delight Customers</h2>
            <p class="feature-desc">
                <h3>Since our chatbot is constantly interacting with visitors proactively, they are more likely to enter their information. We provide you with insights about the conversion along with their data!</h3></p></div>
    </div>
    <div class="how-it-works">
        <p>HOW CHATBOT WORK</p><br>
        <img src="how.png" alt="How Chatbot Works">
    </div>
    <h1 align="left" style="color:darkgreen">&nbsp;&nbsp;ABSTRACT&nbsp;&nbsp;:</h1>
    <p style="font-size: xx-large">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;This project is about creating a friendly chatbot that can talk to people using both written messages and spoken words. We're using smart language and voice technology to make the chatbot helpful and easy to use. The chatbot lives on a website, so people can talk to it by visiting the site.</p>
    <br>
    <h1 align="left" style="color:darkgreen">&nbsp;&nbsp;WHY IT'S COOL&nbsp;&nbsp;:</h1>
    <p style="font-size: xx-large">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Combining typing and talking makes this chatbot special. You can choose how you want to chat with it. It's like having a smart friend that can understand your words, whether you write them or say them out loud.</p>
    <br>
    <h1 align="left" style="color:darkgreen">&nbsp;&nbsp;WHAT IT CAN DO&nbsp;&nbsp;:</h1>
    <h1 align="middle-text" style="color: rgba(255, 0, 64, 0.911);">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;i)Type to Chat: </h1>
    <p style="font-size: xx-large">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;People can write their questions in a box on the website, and the chatbot will understand what they're saying and give helpful answers. The conversation shows up on the screen like a chat.</p><br>
    <h1 align="middle-text" style="color: rgba(255, 0, 64, 0.911);">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ii)Talk with Voice: </h1>
    <p align="left" style="font-size: xx-large">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;There's a button you can click to talk to the chatbot. When you say something, it turns your words into text and answers your questions. You don't need to type.</p>
    <h1 align="middle-text" style="color: rgba(255, 0, 64, 0.911);">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;iii)Smart Answers: </h1>
    <p style="font-size: xx-large">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;The chatbot is pretty smart! It gives good answers that make sense based on what you ask, whether you type or talk.</p><br>
    <h1 align="middle-text" style="color: rgba(255, 0, 64, 0.911);">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;iv)Chatbot Talks Back: </h1>
    <p style="font-size: xx-large">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; When the chatbot answers, it can also talk back to you. It uses a computer voice to say the answers out loud.</p><br>
    <h1 align="middle-text" style="color: rgba(255, 0, 64, 0.911);">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;v)Easy to Use: </h1>
    <p style="font-size: xx-large">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; The chatbot's home is a simple website. You type or talk, and the chatbot responds, showing the conversation on the screen. It's easy to understand and use.</p>
    <footer class="footer">
        <div class="bu1">
            <a href="https://b-u.ac.in//"><img src="logo2.png" alt="bu" width="550" height="550"></a>
        </div>
        <div class="bu2">
            <center>
                <p>Bharathiar University,</p>
                <p> Coimbatore - 641 046</p>
                <b><p>Project Organizer:</p></b>
                <p>Dr.Rajaswari </p>
            </center>
        </div>
        <div class="elementor-social-icons-wrapper">
            <a class="elementor-icon elementor-social-icon elementor-social-icon-facebook-f"
                href="https://www.facebook.com/profile.php?id=100052510386950&mibextid=9R9pXO" target="_blank"
                aria-label="Facebook">
                <img src="face.png" alt="Facebook" width="35" height="35">
            </a>
            <a class="elementor-icon elementor-social-icon elementor-social-icon-instagram"
                href="https://instagram.com/mr_anand_2002_?utm_source=qr&igshid=ZDc4ODBmNjlmNQ%3D%3D" target="_blank"
                aria-label="Instagram">
                <img src="insta.jfif" alt="Instagram" width="35" height="35">
            </a>
            <a class="elementor-icon elementor-social-icon elementor-social-icon-linkedin-in"
                href="https://www.linkedin.com/in/muruganantham-c-b47811236" target="_blank" aria-label="LinkedIn">
                <img src="link.png" alt="LinkedIn" width="35" height="35">
            </a>
            <a class="elementor-icon elementor-social-icon elementor-social-icon-youtube"
                href="https://youtube.com/@offline1426?si=RR8I8gbYLJLCiJne" target="_blank" aria-label="YouTube">
                <img src="you.png" alt="YouTube" width="35" height="35">
            </a>
        </div>
        <script>
             document.getElementById('increaseFontSizeBtn').addEventListener('click', function () {
            increaseFontSize();
        });

        document.getElementById('decreaseFontSizeBtn').addEventListener('click', function () {
            decreaseFontSize();
        });

        function increaseFontSize() {
            const body = document.body;
            const currentSize = parseFloat(getComputedStyle(body).fontSize);
            const newSize = currentSize * 1.1; // Increase by 10%
            body.style.fontSize = newSize + 'px';
        }

        function decreaseFontSize() {
            const body = document.body;
            const currentSize = parseFloat(getComputedStyle(body).fontSize);
            const newSize = currentSize / 1.1; // Decrease by 10%
            body.style.fontSize = newSize + 'px';
        }
    </script>
        <script>
            const footer = document.querySelector('.footer');
            const colors = ['#6414e6', '#6414e9', '#641443', '#641442']; // Add more colors as needed
            let colorIndex = 0;

            function changeFooterColor() {
                footer.style.backgroundColor = colors[colorIndex];
                colorIndex = (colorIndex + 1) % colors.length;
            }

            setInterval(changeFooterColor, 3000); // Change color every 3 seconds (adjust as needed)
        </script>
    </footer>
</body>
</html>
