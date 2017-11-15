<?php
require "opendb.php";
$sqlquery="SELECT DISTINCT name FROM pgms";
$data=  mysqli_query($con,$sqlquery);

$pgms=array();

while($row= mysqli_fetch_array($data))
{
        array_push ($pgms, $row["name"]);
}
echo json_encode($pgms);

require "closedb.php";