<?php
session_start();
if (!(isset($_SESSION['login_manager']))) {
    header("Location: index.html");
}
if (isset($_POST['delete_pgm']) && $_POST['program_name']) {
    $pgm_name = $_POST['program_name'];
    require 'opendb.php';
    $query = mysqli_query($con, "DELETE FROM `pgms` WHERE `name`='$pgm_name'");
    require 'closedb.php';
}
if (isset($_POST['delete_release']) && $_POST['release_name'] && $_POST['program_name']) {
    $release_name = $_POST['release_name'];
    $pgm_name = $_POST['program_name'];
    require 'opendb.php';
    $query = mysqli_query($con, "DELETE FROM `pgms` WHERE `name`='$pgm_name' AND `release`=$release_name ");
    require 'closedb.php';
}
if (isset($_POST['delete_version']) && $_POST['release_name'] && $_POST['program_name'] && $_POST['version_name']) {
    $version_name = $_POST['version_name'];
    $release_name = $_POST['release_name'];
    $pgm_name = $_POST['program_name'];
    require 'opendb.php';
    $query = mysqli_query($con, "DELETE FROM `pgms` WHERE `name`='$pgm_name' AND `release`=$release_name AND `version`=$version_name ");
    require 'closedb.php';
}

if (isset($_POST['insert']) && $_POST['name'] && $_POST['release'] && $_POST['version']) {
    $pgm_name = $_POST['name'];
    $release = $_POST['release'];
    $version = $_POST['version'];
    require 'opendb.php';
    $query = mysqli_query($con, "INSERT INTO `testdatabase`.`pgms` (`id`,`name`,`release`, `version`) VALUES ('NULL','$pgm_name', '$release', '$version');");
    require 'closedb.php';
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Program Maintenance</title>

    </head>
    <body bgcolor="#FFFF00">

        <b>List existing program</b>
        <?php
        require 'opendb.php';
        echo '<table border=1>
        <tr>
        <th>name</th>
        <th>release</th>
        <th>version</th>
        </tr>';
        $query = mysqli_query($con, "SELECT * FROM `pgms`;");
        while ($row = mysqli_fetch_array($query)) {
            echo '<tr>';
            echo '<td>' . $row['name'] . '</td>';
            echo '<td>' . $row['release'] . '</td>';
            echo '<td>' . $row['version'] . '</td>';
            echo '</tr>';
        }
        echo "</table>";
        require 'closedb.php';
        ?>

        <br><b>Delete an existing program</b>
        <form action="dbProgram.php" method="POST">
            <?php
            require 'opendb.php';
            $query = mysqli_query($con, "SELECT DISTINCT `name` FROM `pgms`;");
            echo "<select name='program_name' style='width:100px;'>";
            echo '<option value="select">Select</option>';
            while ($row = mysqli_fetch_array($query)) {
                echo "<option value='" . $row['name'] . "'>" . $row['name'] . "</option>";
            }
            echo "</select>";
            ?>
            <input type="submit" id="delete_pgm" name="delete_pgm" value="delete"> 
        </form>
        <b>Delete an existing release</b><br>
        <form action="dbProgram.php" method="POST">
            <b> Program</b> <select id="pgm1" name="program_name"> <option value="Select">Select</option></select>
            <b> Release</b> <select id="rel1" name="release_name"> <option value="s1">*</option></select>
            <br>       
            <input type="submit" id="delete_release" name="delete_release" value="delete">
        </form> 
        <b>Delete an existing version</b><br> 
        <form action="dbProgram.php" method="POST">
            <b> Program</b> <select id="pgm" name="program_name"> <option value="Select1">Select</option></select>
            <b> Release</b> <select id="rel" name="release_name"> <option value="s2">*</option></select>
            <b> Version</b> <select id="ver" name="version_name"> <option value="s2">*</option></select>

            <br>

            <input type="submit" id="delete_version" name="delete_version" value="delete">
        </form> 
        <b>Insert a new version</b>
        <form action="dbProgram.php" method="POST" id="program_reset" onsubmit="validateForm2()">
            <table><b>
                    <tr>Program Type</tr> <tr><input type="text" name="name" size="20"></tr>
                    <tr>&nbsp;Release</tr><tr> <input type="number" name="release" size="10"></tr>
                    <tr>&nbsp;Version</tr><tr> <input type="number" name="version" size="10"></tr> </b><br>
            </table>
            <input type="submit" name="insert" value="insert" size="10">
            <input type="button" value="Reset">
        </form>


        <script src="jquery-1.11.3.min.js"></script>
        <script src="fetch1.js"></script>
        <script src="fetch2.js"></script>
        <script>

        </script>    
    </body>
</html>

