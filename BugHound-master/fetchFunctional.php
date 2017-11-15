<?php

session_start();
if ((!isset($_SESSION['login'])) && (!isset($_SESSION['login_client'])) && (!isset($_SESSION['login_manager'])) && (!isset($_SESSION['login_dev']))) {
    header("Location: index.html");
}
require "opendb.php";
$sqlquery = "SELECT DISTINCT functionalname FROM functional";
$data = mysqli_query($con, $sqlquery);

$functionalArea = array();

while ($row = mysqli_fetch_array($data)) {
    array_push($functionalArea, $row["functionalname"]);
}
echo json_encode($functionalArea);

require "closedb.php";