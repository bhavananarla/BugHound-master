<?php

if (isset($_GET["name"])) {
    require "opendb.php";
    $name = $_GET["name"];
    $sqlquery = "SELECT DISTINCT `release` FROM `pgms` WHERE `name` = '$name' ";
    $data = mysqli_query($con, $sqlquery);
    $rels = array();
    while ($row = mysqli_fetch_array($data)) {
        array_push($rels, $row["release"]);
    }
    echo json_encode($rels);

    require "closedb.php";
}

