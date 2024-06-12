
<?php
session_start(); // Start the session

// Check if the user is not logged in
if (!isset($_SESSION['loggedin'])) {
    header("Location: login.php"); // Redirect to login.php
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <title>Dairy</title>
</head>

<body style=" background-image: url(images/backgroundimg.jpg);
background-size: position; background-position:side center;    background-repeat: no-repeat;
    background-attachment: fixed;">
    <!-- Header code -->
    <div id="header">
        <div>
            <img src="images/logo.png" id="logo"></img>
            <h1 id="heading2">Dairy Management System</h1>
        </div>
    </div>

    <!-- main - body -->
    <a href="addfarmer.html">
        <div id="card" class="cardalign">
            <div id="name">
                <span>Add Farmers</span>
            </div>
        </div>
    </a>
    <a href="deletefarmer.php">
        <div id="card" class="cardalign">
            <div id="name">
                <span>Delete Farmers</span>
            </div>
        </div>
    </a>
    <a href="modifyrates.php">
        <div id="card" class="cardalign">
            <div id="name">
                <span>Modify Ratelist</span>
            </div>
        </div>
    </a>
    <a href="calculatebill.php">
        <div id="card" class="cardalign">
            <div id="name">
                <span>Daily Data Entry</span>
            </div>
        </div>
    </a>
    <a href="billcreation.php">
        <div id="card" class="cardalign">
            <div id="name">
                <span>Create Bill</span>
            </div>
        </div>
    </a>
    <a href="summary.php">
        <div id="card" class="cardalign">
            <div id="name">
                <span>Daily Summary</span>
            </div>
        </div>
    </a>
</body>

</html>