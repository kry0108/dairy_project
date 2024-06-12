<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/styles.css">
    <title>Dairy</title>
</head>
<body style="background-image: url(images/backgroundimg.jpg);
            background-size: position; background-position: side center; background-repeat: no-repeat;
            background-attachment: fixed;">

<div id="header">
    <div>
        <img src="images/logo.png" id="logo"></img>
        <h1 id="heading2">Daily Summary</h1>
    </div>
</div>

<form action="" method="POST" class="forms" style="height: 200px; width: 500px;">
    <label class="labels">Enter The Date:</label>
    <span>
        <input type="date" class="dateselector" name="date" id="ddlProducts" required/><br><br>
        <div style="display: flex; justify-content: space-between;">
            <input type="submit" name="submit" value="Submit" class="buttons">
            <button type="button" class="buttons" onclick="goToHomePage()"
                    style="background-color: rgb(17, 12, 86); font-size: 20px; color: white;margin-right:20px;" >
                Back
            </button>
        </div>
    </span>
</form>


<h2 align="center">Daily Data Record</h2>
<table class="datatable">
    <tr>
        <th>Farmer ID</th>
        <th>Date</th>
        <th>Time</th>
        <th>Quantity</th>
        <th>Fat</th>
        <th>Rate</th>
        <th>Amount</th>
    </tr>

    <?php
    include('db_conn.php');
    $totalAmount=0;

    if(isset($_POST['submit'])){
        $dt = $_POST['date'];
        $formatted_date = date('Y-m-d', strtotime($dt)); // Convert HTML date format to MySQL date format
        $qry = "SELECT * FROM `dailyentryrecord` WHERE `date` = ?";
        $stmt = mysqli_prepare($conn, $qry);
        mysqli_stmt_bind_param($stmt, "s", $formatted_date); // Bind the formatted date
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
    
        if(mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['farmer_id'] . "</td>";
                echo "<td>" . $row['date'] . "</td>";
                echo "<td>" . $row['time'] . "</td>";
                echo "<td>" . $row['quantity'] . "</td>";
                echo "<td>" . $row['fat'] . "</td>";
                echo "<td>" . $row['rate'] . "</td>";
                echo "<td>" . $row['amount'] . "</td>";
                echo "</tr>";     // Accumulate amount for total
                $totalAmount += $row["amount"];
            }
             // Display total row
            echo "<tr>";
            echo "<td colspan='6'>Total</td>";
            echo "<td>" . $totalAmount . "</td>";
            echo "</tr>";
        } else {
            echo "<tr><td colspan='7'>No records found</td></tr>";
        }
    }
    
    ?>
</table>

<script>
    function goToHomePage() {
        window.location.href = "index.php"; // Change "index.html" to the path of your home page
    }
</script>

</body>
</html>
