<?php
include_once('db_conn.php');

if(isset($_POST['update'])) {
    if(($_REQUEST['type']=="")||($_REQUEST['rate']=="")||($_REQUEST['fat']=="")) {
        echo "Fill out all the fields.......";
    }
    else {
        $type= $_REQUEST['type'];
        $rate= $_REQUEST['rate'];
        $fat= $_REQUEST['fat'];
    }
    
    $sql1= "UPDATE `ratelist` SET `type`='$type',`rate`='$rate',`fat`='$fat' WHERE `product_id`={$_REQUEST['id']}"; 
    if(mysqli_query($conn,$sql1)) {
        //echo "Updated.";
    }
    else {
       die("Error in updating data: " . mysqli_error($conn));  
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <title>Dairy</title>
</head>


<body style=" background-image: url(images/backgroundimg.jpg);
background-size: position; background-position:side center;    background-repeat: no-repeat;
    background-attachment: fixed;">
    <div id="header">
        <div>
            <img src="images/logo.png" id="logo"></img>
            <h1 id="heading2">Modify Rates</h1>
        </div>
    </div>
    <?php
    if(isset($_REQUEST['edit'])){
        $sql2 = "SELECT * FROM `ratelist` WHERE product_id={$_REQUEST['id']}";
        $res = mysqli_query($conn, $sql2);
        $rws = mysqli_fetch_assoc($res);
    }
    ?>
   
    </div>

    <!-- Data Block  -->
    <div>
        <table class="datatable">
            <tr>
                <th>Type</th>
                <th>Rate</th>
                <th>Fat</th>
                <th>Modify</th>
            </tr>

            <?php
            $sql="SELECT * FROM `ratelist`;";
            $result = mysqli_query($conn,$sql);
            while($row = mysqli_fetch_assoc($result)) {
            ?>

            <tr>
                <td><?php echo $row['type'];?></td>
                <td><?php echo $row['rate'];?></td>
                <td><?php echo $row['fat'];?></td>

                <td>
                    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                        <input type="hidden" name="id" value="<?php echo $row['product_id'] ?>" />
                        <input type="hidden" name="rate" value="<?php echo $row['rate'] ?>" />
                        <input type="hidden" name="updated_rate" value="<?php echo $row['rate'] ?>" /> <!-- New hidden field for updated rate -->
                        <input type="submit" class="tablebuttons" style="background-color:green;" value="Edit" name="edit"></input>
                    </form>
                </td>
            </tr>
            <?php
             } 
            ?>
        </table>
    </div>
    
    <div>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" class="forms"  style="height:400px;">
            <div>
                <label for="type" class="labels">Type</label>&nbsp;&nbsp;<br>
                <input type="text" id="type" name="type" class="inputfield" value="<?php if(isset($rws['type'])){echo $rws['type'];}?>" required>
                <br/><br>
                <label for="newrate" class="labels">New Rate </label>&nbsp;&nbsp;
                <input type="text" id="newrate" class="inputfield" name="rate" value="<?php if(isset($rws['rate'])){echo $rws['rate'];}?>"  required>
                <br/><br/>
                <label for="fat" class="labels">New Fat </label>&nbsp;&nbsp;
                <input type="text" id="newfat" class="inputfield" name="fat" value="<?php if(isset($rws['fat'])){echo $rws['fat'];}?>" required>
                <br/><br/>
                <input type="hidden" name="id" value="<?php echo $rws['product_id']?>">
                <button type="submit" name="update" class="buttons" style="background-color:cyan;font-size:20px;">Update</button>
            </div>
        </form>
    </div>

    <script>
        function goToHomePage() {
            window.location.href = "index.php"; // Change "index.html" to the path of your home page
        }
    </script>
    <button type="submit" class="buttons"  onclick="goToHomePage()"
        style="background-color: rgb(17, 12, 86);font-size: 20px;color: white;margin-left:40%; margin-top: 2px;">Back</button>
  

</body>

</html>
