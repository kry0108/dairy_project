<?php
include('db_conn.php');
$qry1 = 'SELECT date_format(CURRENT_DATE,"%d-%m-%Y") as date from dual';
$res = mysqli_query($conn,$qry1);
$result = mysqli_fetch_fields($res);
echo $result;
