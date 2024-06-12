<?php
    include('db_conn.php');

    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $farmer_name = $_POST['f_name'];
        $farmer_mob = $_POST['f_mob'];
        $account_no = $_POST['f_acc'];
        $address = $_POST['f_addr'];
        $email = $_POST['f_email'];
        $aadhaar = $_POST['f_adhar'];

        // Construct the query with user inputs directly
        $qry = "INSERT INTO `farmer` (`farmer_name`, `farmer_mobile`, `farmer_accountno`, `farmer_address`, `farmer_email`, `farmer_aadhaar`) 
                VALUES ('$farmer_name', '$farmer_mob', '$account_no', '$address', '$email', '$aadhaar')";

        // Execute the query
        $sql = mysqli_query($conn, $qry);

        // Check if the query was successful
        if (!$sql) {
            echo "Error Occurred while inserting data: " . mysqli_error($conn);
        } else {
            echo "Data inserted successfully";
            // Redirect to prevent resubmission
            header("Location: addfarmer.html");
            exit; 
        }
    }
?>
