

<!DOCTYPE html>

<head>
  
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
            <h1 id="heading2">Delete Farmers</h1>
        </div>
    </div>
   <?php  include('db_conn.php');
    if(isset($_POST['delete'])){
        $sql2 = "DELETE FROM `farmer` WHERE farmer_id={$_POST['farmer_id']}";
        if(mysqli_query($conn, $sql2)){
            echo"<script>alert('Record deleted');</script>";
        }else{
            echo "error unable to find record.....";
        }}?>
    <!-- Data Avaliable -->
    <table class="datatable">
        <tr>
            <th>Farmer ID</th>
            <th>Farmer Name</th>
            <th>Farmer location</th>
            <th>Farmer Mobile</th>
            <th>Delete</th>
        </tr>
        <?php 
   
    $sql = "select * from `farmer`";
    $result = mysqli_query($conn,$sql);
    while($rows=mysqli_fetch_assoc($result))
    {
?>
<tr>
    <!-- FETCHING DATA FROM EACH
        ROW OF EVERY COLUMN -->
    <td><?php echo $rows['farmer_id'];?></td>
    <td><?php echo $rows['farmer_name'];?></td>
    <td><?php echo $rows['farmer_address'];?></td>
    <td><?php echo $rows['farmer_mobile'];?></td>
    <td><form method="POST">
                <input type="submit" name="delete" value="Delete" class= "tablebuttons"/>
                <input type="hidden" value="<?php echo $rows['farmer_id'];?>" name="farmer_id"/>
            </form></td>
</tr>

        <?php
            }
        ?>
      
    </table>
    <script>
        function goToHomePage() {
            window.location.href = "index.php"; // Change "index.html" to the path of your home page
        }
    </script>
    <button type="submit" class="buttons"  onclick="goToHomePage()"
        style="background-color: rgb(17, 12, 86);font-size: 20px;color: white;margin-left:40%; margin-top: 2px;">Back</button>
</body>
</html>
