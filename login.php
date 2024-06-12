<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
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
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        h2 {
            text-align: center;
        }
        form {
            text-align: center;
        }
        input[type="text"],
        input[type="password"],
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
            border: 1px solid #ccc;
            border-radius: 3px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background-color: #4caf50;
            color: white;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        .error {
            color: red;
            text-align: center;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Login Form</h2>
        <?php if(isset($error)) { ?>
            <div class="error"><?php echo $error; ?></div>
        <?php } ?>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            User ID: <input type="text" name="userid"><br><br>
            Password: <input type="password" name="password"><br><br>
            <input type="submit" value="Login">
        </form>
    </div>
</body>
</html>
<?php
session_start(); // Start the session

// Database connection
include('db_conn.php');

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get user ID and password from form
    $userid = $_POST["userid"];
    $password = $_POST["password"];

    // Prepare a SQL statement
    $sql = "SELECT * FROM loginuserid WHERE username = '$userid' AND pass = '$password';";

    // Execute the query
    $result = $conn->query($sql);

    // Check if any rows were returned
    if ($result !== false && $result->num_rows > 0) {
        // User authenticated
        $_SESSION['loggedin'] = true; // Set session variable
        header("Location: index.php"); // Redirect to index.html
        exit();
    } else {
        // Invalid credentials
        $error = "Invalid username or password!";
    }
}

// Close connection
$conn->close();
?>


