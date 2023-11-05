<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback</title>
    <style>
        /* Add your CSS styles here */
        body {
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            animation: changeBackgroundColor 10s infinite alternate;
        }

        @keyframes changeBackgroundColor {
            0% {
                background-color: #ff5733;
            }
            50% {
                background-color: #33ff57;
            }
            100% {
                background-color: #5733ff;
            }
        }

        h1 {
            font-size: 3rem;
            color: white;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        }

        /* Feedback form styles */
        .feedback-form {
            width: 300px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
        }

        .feedback-form h2 {
            text-align: center;
            font-size: 24px;
            margin-bottom: 20px;
        }

        .feedback-form label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
        }

        .feedback-form input[type="text"],
        .feedback-form input[type="email"],
        .feedback-form textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .feedback-form button {
            background-color: #3498db;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }

        .feedback-form button:hover {
            background-color: #2980b9;
        }

        /* Thank-you message styles */
        .feedback-success {
            text-align: center;
            font-size: 18px;
            margin-top: 20px;
            display: none; /* Initially hidden */
            color: green; /* You can change the color to your preference */
        }

        /* Previous button styles */
        .previous-button {
            display: block;
            margin: 20px auto;
            background-color: red;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .previous-button:hover {
            background-color: #999;
        }
    </style>
</head>
<body>
<center>
    <div id="step1">
    
        <div class="feedback-form" id="feedback-form">
            <h2>Provide Your Feedback</h2>
            <form action="" method="POST">
                <label for="name"><b>Name:</b></label>
                <input type="text" id="name" name="name" required>
                <label for="email"><b>Email:</b></label>
                <input type="email" id="email" name="email" required>
                <label for="feedback"><b>Feedback:</b></label>
                <textarea id="feedback" name="feedback" required></textarea>
                <button type="submit" name="submit-feedback">Submit</button>
                <br >
                <br>
                <div class="feedback-success" id="feedback-success" style="display: none;">
                   Feedback submitted successfully!
        </div>
        </form>
        <button onclick="backAndSave()">Previous</button>
    </div>
    </center>
   
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit-feedback"])) {
            // Database configuration
            $host = "localhost";
            $username = "root"; // Replace with your MySQL username
            $password = ""; // Replace with your MySQL password
            $database = "feedback_db"; // Replace with your database name

            $conn = new mysqli($host, $username, $password, $database);

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Retrieve form data
            $name = $_POST["name"];
            $email = $_POST["email"];
            $feedback = $_POST["feedback"];

            // Insert feedback into the database
            $sql = "INSERT INTO names (name, email, feedback) VALUES ('$name', '$email', '$feedback')";

            if ($conn->query($sql) === TRUE) {
                echo '<div class="feedback-success" id="feedback-thank-you">Thank you for your feedback!</div>';
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }

            $conn->close();
        }
        ?>

        <script>
             function backAndSave(){
                window.location.href = "index.php"; // Replace with the actual path to your index page
            }     // Function to go back to the previous page
            
        </script>

</body>
</html>
