<!DOCTYPE html>
<head>
    <link rel="stylesheet" href="css/styles.css">
    <title>Dairy</title>
</head>

<body style=" background-image: url(images/backgroundimg.jpg);
background-size: position; background-position:side center;    background-repeat: no-repeat;
    background-attachment: fixed;">
    <div id="header">
        <div>
            <img src="images/logo.png" id="logo"></img>
            <h1 id="heading2">Calculate Bill</h1>
        </div>
    </div>
    <div id="adding-form">
        <form action="calculatebillins.php" method="POST" class="forms" 
         style = height:400px ;>
            <label for="fid" class="labels">Farmer  ID :</label>
            <select name="farmerid" id="ddlProducts"required>
            <option value="farmer id" selected>Choose Farmer ID</option>
            <?php
                include_once('db_conn.php');
                $qry="select * from `farmer`;";
                $result = mysqli_query($conn,$qry);
                while($row = mysqli_fetch_assoc($result)){
                    
                    echo '<option value="'.$row['farmer_id'].'">'.$row['farmer_id'].'.'.$row['farmer_name'].'</option>';
                    
                    }
                ?>
             
            </select> &nbsp; &nbsp; &nbsp;
            <label for="date" class="labels">Date:</label>
            <input type="date" id="ddlProducts" name="date"required></input>
             &nbsp; &nbsp;<br><br><br>
             &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<label for="time" class="labels">Time :</label>
            <select name="time" id="ddlProducts"required>
                <option value="morning">Morning</option>
                <option value="evening">Evening</option>
            </select>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
            <label for="type" class="labels">Type :</label>
<select name="rate" id="ddlProducts" required>
    <option value="" selected disabled>Choose rate (type)</option>
    <?php
    include_once('db_conn.php'); // Make sure this file includes the database connection
    $qry1 = "SELECT `rate` FROM `ratelist`;";
    $res = mysqli_query($conn, $qry1);
    while ($row = mysqli_fetch_assoc($res)) {
        echo '<option value="'. $row['rate'].'">'.$row['rate'].'</option>';
    }
    ?>
</select>
               
            <br><br><br>
            <label for="fname" class="labels">Milk(Litres) :</label>
            <input type="text" name="milk" class="inputfield"required><br><br>
            <label for="fat" class="labels">Fat :</label><br>
            <input type="text" name="fat" class="inputfield"required><br><br>
            <button type="submit" class="buttons" name="submit"
                style="background-color: green;font-size: 20px;color: white;">Submit</button>
            <button type="clear" class="buttons"
                style="background-color: red;font-size: 20px;color: white;">Clear</button>
        </form>
    </div>
    <br><br>
    <script>
        function goToHomePage() {
            window.location.href = "index.php"; // Change "index.html" to the path of your home page
        }
    </script>
    <button type="submit" class="buttons"  onclick="goToHomePage()"
        style="background-color: rgb(17, 12, 86);font-size: 20px;color: white;margin-left:40%; margin-top: 2px;">Back</button>
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
    $qry = "SELECT * FROM `dailyentryrecord`";
    $result = mysqli_query($conn, $qry);
    while ($row = mysqli_fetch_assoc($result)) {
      echo "<tr>";
      echo "<td>" . $row['farmer_id'] . "</td>";
      echo "<td>" . $row['date'] . "</td>";
      echo "<td>" . $row['time'] . "</td>";
      echo "<td>" . $row['quantity'] . "</td>";
      echo "<td>" . $row['fat'] . "</td>";
      echo "<td>" . $row['rate'] . "</td>";
      echo "<td>" . $row['amount'] . "</td>";
      echo "</tr>";
    }
  ?>
</table>
    </body> 



     </html>

