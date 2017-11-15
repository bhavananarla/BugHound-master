<?php

session_start();
if ((!isset($_SESSION['login'])) && (!isset($_SESSION['login_client'])) && (!isset($_SESSION['login_manager'])) && (!isset($_SESSION['login_dev']))) {
    header("Location: index.html");
}
require "opendb.php";
$sqlquery = "SELECT DISTINCT EmployeeName FROM employees";
$data = mysqli_query($con, $sqlquery);

$assignedTo = array();

while ($row = mysqli_fetch_array($data)) {
    array_push($assignedTo, $row["EmployeeName"]);
}
echo json_encode($assignedTo);

require "closedb.php";