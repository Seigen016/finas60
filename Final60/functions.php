<?php
//register
include 'connection.php'; // Include your database connection file

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data and sanitize inputs
    $username = htmlspecialchars($_POST["username"]);
    $email = htmlspecialchars($_POST["email"]);
    $password = htmlspecialchars($_POST["password"]);

        // Validate username
        if (empty($username)) {
            $errors[] = "Username is required";
        } elseif (strlen($username) < 2) {
            $errors[] = "Username must be at least 2 characters long";
        }

        // Validate email
        if (empty($email)) {
            $errors[] = "Email is required";
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = "Invalid email format";
        }

        // Validate password
        if (empty($password)) {
            $errors[] = "Password is required";
        } elseif (strlen($password) < 4) {
            $errors[] = "Password must be at least 4 characters long";
        }

        // Check if there are any validation errors
        if (empty($errors)) {
            // Check if the email is already registered
            $check_email_sql = "SELECT * FROM users WHERE email='$email'";
            $check_email_result = $conn->query($check_email_sql);

            if ($check_email_result->num_rows > 0) {
                // Email is already registered
                $errors[] = "This email is already registered";
            } else {
                // Hash the password for security
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);

                // Insert user data into the database
                $insert_sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$hashed_password')";

                if ($conn->query($insert_sql) === TRUE) {
                    echo '<script>alert("Registration successful")</script>'; 
                    
                    // Redirect to login page or any other page
                    header("Location: main.php");
                } else {
                    $errors[] = "Error: " . $insert_sql . "<br>" . $conn->error;
                }
            }
        }

        // Display validation errors, if any
        if (!empty($errors)) {
            foreach ($errors as $error) {

                echo '<script>alert($error . "<br>")</script>'; 
            }
        }
    }

?>

<?php
// login.php

include 'connection.php'; // Include your database connection file

session_start(); // Start session at the beginning

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data and sanitize inputs
    $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
    $password = htmlspecialchars($_POST["password"]);

    // Validate form inputs
    $errors = array();

    // Validate email
    if (empty($email)) {
        $errors[] = "Email is required";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format";
    }

    // Validate password
    if (empty($password)) {
        $errors[] = "Password is required";
    }

    // Check if there are any validation errors
    if (empty($errors)) {
        // Prepare a statement to fetch user data (including username) from the database based on the provided email
        $stmt = $conn->prepare("SELECT username, password FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            // User exists, verify password
            $user_data = $result->fetch_assoc();
            if (password_verify($password, $user_data['password'])) {
                // Password is correct, start session and store user's email and username
                $_SESSION["email"] = $email;
                $_SESSION["username"] = $user_data['username'];
                
                echo '<script>alert("Login successful")</script>'; 

                // Redirect to dashboard or home page
                header("Location: index.php");
                exit(); // Ensure no further code is executed after redirection
            } else {
                // Incorrect password
                echo '<script>alert("Incorrect email or password")</script>'; 
            }
        } else {
            // User does not exist
            echo '<script>alert("User does not exist")</script>'; 
        }

        $stmt->close();
    } else {
        // Display validation errors
        foreach ($errors as $error) {
            echo htmlspecialchars($error) . "<br>";
        }
    }
}

$conn->close();
?>


