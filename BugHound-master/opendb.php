<?php
require "config.php";

$con=mysqli_connect($host, $user, $password)
        or die("connection failed");
mysqli_select_db($con, $database);
?>  