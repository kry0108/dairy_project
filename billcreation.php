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
    <div id="header">
        <div>
            <img src="images/logo.png" id="logo"></img>
            <h1 id="heading2">generate bill</h1>
        </div>
    </div>

  <h1 class="heading" align ="center">Bill generation </h1>
  <div id="adding-form">
  
      <form action="bill.php"  method="POST" class="forms"  style = height:400px ;>
      <label for="fid" class="labels">Farmer  ID :</label>
          <input type="text"name="fid" class="inputfield">
            <br><br>
              <label class="labels">  from-date:</label>
              <span> <input type="date"  class="dateselector" name="from-date" id="ddlProducts"required/></span>&nbsp;&nbsp;&nbsp;
              
               <label class="labels">to-date</label>
              <span><input type="date"class="dateselector" name="to-date" id="ddlProducts"required/> </span>
              <br> 
             <br>
             <button type="submit" class="buttons" name="submit" onclick="redirect()" style="background-color: green; font-size: 20px; color: white;">Submit</button>

         <button type="clear" class="buttons"
             style="background-color: red;font-size: 20px;color: white;">Clear</button>
             
             <script>
    function redirect() {
        window.location.href = "billcreation.php";
    }
</script>

            
      </form>
      <script>
        function goToHomePage() {
            window.location.href = "index.php"; // Change "index.html" to the path of your home page
        }
    </script>
    <button type="submit" class="buttons"  onclick="goToHomePage()"
        style="background-color: rgb(17, 12, 86);font-size: 20px;color: white;margin-left:40%; margin-top: 2px;">Back</button>

</body>
</html>