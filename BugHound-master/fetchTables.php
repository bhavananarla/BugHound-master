<?php

session_start();
if (!(isset($_SESSION['login_manager']))) {
    header("Location: index.html");
}

$host = "localhost";
$uname = "root";
$pass = "";
$database = "testdatabase";

$connection = mysql_connect($host, $uname, $pass);

echo mysql_error();

//or die("Database Connection Failed");
$selectdb = mysql_select_db($database) or
        die("Database could not be selected");
$result = mysql_select_db($database)
        or die("database cannot be selected <br>");

$table = filter_input(INPUT_GET, 'table');
$format = filter_input(INPUT_GET, 'format');
$output = "";

$sql = mysql_query("select * from $table ");
$columns_total = mysql_num_fields($sql);

if (strcmp($format, "ascii") == 0) {

    for ($i = 0; $i < $columns_total; $i++) {
        $heading = mysql_field_name($sql, $i);
        $output .= '"' . $heading . '",';
    }
    $output .="\n";

    while ($row = mysql_fetch_array($sql)) {
        for ($i = 0; $i < $columns_total; $i++) {
            $output .='"' . $row["$i"] . '",';
        }
        $output .="\n";
    }

    $myfile = fopen("ASCII.txt", "w") or die("Unable to open file!");


    fwrite($myfile, $output);



    header('Content-Disposition: attachment; filename="newfile.txt"');
    header('Content-Type: text/plain');
    header('Content-Length: ' . strlen($output));
    header('Connection: close');


    echo $output;

    exit;
} else if (strcmp($format, 'xml') == 0) {

    $output .="<?xml version=\"1.0\" encoding=\"UTF-8\" ?>\n";


    while ($row = mysql_fetch_array($sql)) {

        $output .="<$table> \n";
        for ($i = 0; $i < $columns_total; $i++) {

            $heading = mysql_field_name($sql, $i);

            $output .="\t";
            $output .= '<"' . $heading . '">';
            $output .='"' . $row["$i"] . '"';
            $output .= '</"' . $heading . '">';
            $output .="\n";
        }
        $output .="</$table> \n";
    }

    $myfile = fopen("BugHound.xml", "w") or die("Unable to open file!");


    fwrite($myfile, $output);



    header('Content-Disposition: attachment; filename="newfile.xml"');
    header('Content-Type: xml');
    header('Content-Length: ' . strlen($output));
    header('Connection: close');


    echo $output;

    exit;
} else {
    echo 'table Empty';
}


        
            


