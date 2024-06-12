<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <title>Dairy</title>
</head>

<body style="background-image: url(images/backgroundimg.jpg);
    background-size: position; background-position:side center; background-repeat: no-repeat;
    background-attachment: fixed;">
    <div id="header">
        <div>
            <img src="images/logo.png" id="logo">
            </img>
            <h1 id="heading2">Generated Bill</h1>
        </div>
    </div>

    <?php
    // Connect to the database
    include("db_conn.php");

    // Initialize $res to null
    $res = null;

    // Check if the form has been submitted
    if (isset($_POST['submit'])) {
        // Get the farmer ID and date range from the form
        $farmer_id = $_POST['fid'];
        $from_date = $_POST['from-date'];
        $to_date = $_POST['to-date'];

        // Query the database for the desired information
        $sql = "SELECT d.date, d.time, d.quantity, d.fat, d.rate, d.amount
                FROM farmer f
                JOIN dailyentryrecord d ON f.farmer_id = d.farmer_id
                WHERE f.farmer_id = $farmer_id AND d.date BETWEEN '$from_date' AND '$to_date'";
        $res = mysqli_query($conn, $sql);

        if (!$res) {
            die("Database query failed: " . mysqli_error($conn));
        }
    }
    ?>

    <!-- Display the information in an HTML table-->
    <table class="datatable">
        <tr>
            <th>Date</th>
            <th>Time</th>
            <th>Quantity</th>
            <th>Fat</th>
            <th>Rate</th>
            <th>Amount</th>
        </tr>

        <?php
        $totalAmount = 0; // Initialize total amount
        if ($res && mysqli_num_rows($res) > 0) {
            while ($row = mysqli_fetch_assoc($res)) {
                echo "<tr>";
                echo "<td>" . $row["date"] . "</td>";
                echo "<td>" . $row["time"] . "</td>";
                echo "<td>" . $row["quantity"] . "</td>";
                echo "<td>" . $row["fat"] . "</td>";
                echo "<td>" . $row["rate"] . "</td>";
                echo "<td>" . $row["amount"] . "</td>";
                echo "</tr>";

                // Accumulate amount for total
                $totalAmount += $row["amount"];
            }
           

            // Display total row
            echo "<tr>";
            echo "<td colspan='5'>Total</td>";
            echo "<td>" . $totalAmount . "</td>";
            echo "</tr>";
        } else {
            echo "<tr><td colspan='6'>No result found</td></tr>";
        }
        ?>

    </table>

    <button type="submit" class="buttons" onclick="goToHomePage()"
        style="background-color: rgb(17, 12, 86);font-size: 20px;color: white;margin-left:40%; margin-top: 2px;">Back
    </button>

    <script>
        function goToHomePage() {
            window.location.href = "index.php";
        }
    </script>



</body>

</html>
