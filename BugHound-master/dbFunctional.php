<?php
session_start();
if (!(isset($_SESSION['login_manager']))) {
    header("Location: index.html");
}
if (isset($_POST['delete_func']) && $_POST['functional']) {
    $name = $_POST['functional'];
    require 'opendb.php';
    $query = mysqli_query($con, "DELETE FROM `functional` WHERE `functionalname`='$name'");
    require 'closedb.php';
}

if (isset($_POST['fa_insert']) && $_POST['fa_name']) {
    $name = $_POST['fa_name'];
    require 'opendb.php';
    $query = mysqli_query($con, "INSERT INTO `functional` VALUES (`functioanlid`, `functionalname`) VALUES ('NULL', '$name');");
    require 'closedb.php';
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Functional Maintenance</title>

    </head>
    <body bgcolor="#FFFF00">
        <b>List existing functional areas</b>
        <?php
        require 'opendb.php';
        echo '<table border=1>
        <tr>
        <th>id</th>
        <th>name</th>
        </tr>';
        $query = mysqli_query($con, "SELECT * FROM `functional`;");
        while ($row = mysqli_fetch_array($query)) {
            echo '<tr>';
            echo '<td>' . $row['functionalid'] . '</td>';
            echo '<td>' . $row['functionalname'] . '</td>';
            echo '</tr>';
        }
        echo "</table>";
        require 'closedb.php';
        ?>

        <br> <b>Delete an existing functional area</b>
        <form action="dbFunctional.php" method="POST">
            <?php
            require 'opendb.php';
            $query = mysqli_query($con, "SELECT * FROM `functional`;");
            echo "<select name='functional' style='width:100px;'>";
            echo '<option value="select">Select</option>';
            while ($row = mysqli_fetch_array($query)) {
                echo "<option value='" . $row['functionalname'] . "'>" . $row['functionalname'] . "</option>";
            }
            echo "</select>";
            ?>      
            <input type="submit" id="delete_func" name="delete_func" value="Delete">
        </form>
        <b>Insert a new functional area</b>
        <form action="dbFunctional.php" method="POST" onsubmit="validateForm3()">
            <input type="text" name="fa_name" size="10">
            <input type="submit" name="fa_insert" value="Add" size="10">
            <input type="button" value="Reset">
        </form>

        <script src="jquery-1.11.3.min.js"></script>
        <script src="fetch1.js"></script>
        <script src="fetch2.js"></script>
    </body>
</html>

