<?php
include('db_conn.php');

if (isset($_POST['submit'])) {
    $farmerid = $_POST['farmerid'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $milk = $_POST['milk'];
    $fat = $_POST['fat'];
    $rate = $_POST['rate'];

    $qry = "SELECT farmer_id FROM `farmer` WHERE farmer_id = $farmerid";
    $result = mysqli_query($conn, $qry);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $farmerid = $row['farmer_id'];

        $qry2 = "INSERT INTO `collectiondata` (`farmer_id`, `date`, `time`, `milk`, `fat`)
                 VALUES ('$farmerid', '$date', '$time', '$milk', '$fat')";

        if (mysqli_query($conn, $qry2)) {
            if (!empty($date) && !empty($rate)) {
                $qry1 = "SELECT rate FROM `ratelist` WHERE rate = $rate";
                $res = mysqli_query($conn, $qry1);

                if ($res) {
                    $rw = mysqli_fetch_assoc($res);
                    $rate = $rw['rate'];
                    $amount = $milk * $rate * $fat;

                    $qry3 = "INSERT INTO `dailyentryrecord` (`farmer_id`, `date`, `time`, `quantity`, `fat`, `rate`, `amount`) 
                             VALUES ('$farmerid', '$date', '$time', '$milk', '$fat', '$rate', '$amount')";

                    if (mysqli_query($conn, $qry3)) {
                        header("Location: calculatebill.php");
                        exit;
                    } else {
                        echo "Error: " . mysqli_error($conn);
                    }
                } else {
                    echo "Error: Rate not found in the database";
                }
            } else {
                echo "Error: Date or rate is not set";
            }
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>
