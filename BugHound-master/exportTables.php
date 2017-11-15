<?php
session_start();
if (!(isset($_SESSION['login_manager']))) {
    header("Location: index.html");
}

$con = mysqli_connect('localhost', 'root', '', 'testdatabase');
if (!$con) {
    die('Could not connect!' . mysqli_error());
}
mysqli_select_db($con, "testdatabase");
?>

<html>
    <head>
        <title>Bughound</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="stylesheet" href="assets/css/main.css"/>
    </head>
    <body align="center" bgcolor="#99ccff">
        <form action="fetchTables.php" name="fetchTables" method="GET" align="center">
            Table Name: <select name="table" id="table" required>
                <option selected="selected" value=""></option>
                <option value="Buginfo"> Bug Information </option>
                <option value="Dept">  Departments </option>
                <option value="employees"> employees </option>
                <option value="functional"> Functional Areas </option>
                <option value="pgms"> Programs</option>
                <option value="userlist"> Users </option>
            </select>  <br>

            Format&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: 
            <select name="format" id="format" required>
                <option selected="selected" value=""></option>
                <option value="ascii"> ASCII </option>
                <option value="xml">  XML </option> 
            </select>
            <br><br>

            <input type='submit' value='Export'/>
            <input type="button" value="Cancel" onclick='window.location.href = "list.php"' />

        </form>
    </body>
</html>