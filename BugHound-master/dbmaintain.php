<?php
    
if((filter_input(INPUT_POST,'delete_emp')) && filter_input(INPUT_POST,'empid'))
{
    // $empid=$_POST['empid'];
     $empid=filter_input(INPUT_POST,'empid');
        require 'opendb.php';
        $query = mysqli_query($conn,"DELETE FROM `emp` WHERE `id`=$empid");
        require 'closedb.php';
}
if(isset($_POST['delete_func']) && $_POST['functional'])
{
     $name=$_POST['functional'];
        require 'opendb.php';
        $query = mysqli_query($conn,"DELETE FROM `functional` WHERE `name`='$name'");
        require 'closedb.php';
}
if(isset($_POST['delete_pgm']) && $_POST['program_name'])
{
     $pgm_name=$_POST['program_name'];
        require 'opendb.php';
        $query = mysqli_query($conn,"DELETE FROM `pgms` WHERE `name`='$pgm_name'");
        require 'closedb.php';
}
if(isset($_POST['delete_release']) && $_POST['release_name'] && $_POST['program_name'])
{
     $release_name=$_POST['release_name'];
     $pgm_name=$_POST['program_name'];
        require 'opendb.php';
        $query = mysqli_query($conn,"DELETE FROM `pgms` WHERE `name`='$pgm_name' AND `release`=$release_name ");
        require 'closedb.php';
}
if(isset($_POST['delete_version']) && $_POST['release_name'] && $_POST['program_name'] && $_POST['version_name'])
{
     $version_name=$_POST['version_name'];
     $release_name=$_POST['release_name'];
     $pgm_name=$_POST['program_name'];
        require 'opendb.php';
        $query = mysqli_query($conn,"DELETE FROM `pgms` WHERE `name`='$pgm_name' AND `release`=$release_name AND `version`=$version_name ");
        require 'closedb.php';
}
if(isset($_POST['insert_emp']) && $_POST['id'] && $_POST['name'] && $_POST['designation'])
{
     $empid=$_POST['id'];
     $name=$_POST['name'];
     $designation=$_POST['designation'];
        require 'opendb.php';
        $query = mysqli_query($conn,"INSERT INTO `testdatabase`.`emp` (`id`, `name`, `designation`) VALUES ('$empid', '$name', '$designation');");
        if($query==TRUE){
    echo ("<SCRIPT>
    window.alert($empid+' : succefully inserted')
        window.location.href('index.php')
        </SCRIPT>");}
        else
        {
            echo ("<SCRIPT>
    window.alert($empid+' alreay exist')
        </SCRIPT>");
        }
        
    
}
if(isset($_POST['insert']) && $_POST['name'] && $_POST['release'] && $_POST['version'])
{
     $pgm_name=$_POST['name'];
     $release=$_POST['release'];
     $version=$_POST['version'];
        require 'opendb.php';
        $query = mysqli_query($conn,"INSERT INTO `testdatabase`.`pgms` (`id`,`name`,`release`, `version`) VALUES ('NULL','$pgm_name', '$release', '$version');");
        require 'closedb.php';
}
if(isset($_POST['fa_insert']) && $_POST['fa_name'])
{
     $name=$_POST['fa_name'];
        require 'opendb.php';
        $query = mysqli_query($conn,"INSERT INTO `testdatabase`.`functional` (`id`, `name`) VALUES ('NULL', '$name');");
        require 'closedb.php';
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <script>
         function validateForm() {
        var x = document.forms["emp_reset"]["id"].value;
        var y = document.forms["emp_reset"]["name"].value;
        var z = document.forms["emp_reset"]["designation"].value;
        if (x == null || x == ""||y == null || y == ""||z == null || z == "") {
        alert("Fields cannot be blank");
        }
        }
        function validateForm2() {
        var x = document.forms["program_reset"]["name"].value;
        var y = document.forms["program_reset"]["release"].value;
        var z = document.forms["program_reset"]["version"].value;
        if (x == null || x == ""||y == null || y == ""||z == null || z == "") {
        alert("Fields cannot be blank");
        }
        }
        function validateForm3() {
        var x = document.forms["func_reset"]["fa_name"].value;
        if (x == null || x == "") {
        alert("Field cannot be blank");
        }
        }
        
        </script>
    </head>
    <body bgcolor="#FFFF00">
        <b>List existing employee</b>
        <?php
        require 'opendb.php';
        echo '<table border=1>
        <tr>
        <th>id</th>
        <th>name</th>
        <th>designation</th>
        </tr>';
        $query = mysqli_query($con, "SELECT * FROM `employees`;");
        while ($row = mysqli_fetch_array($query)) {
            echo '<tr>';
            echo '<td>' . $row['EmployeeID'] . '</td>';
            echo '<td>' . $row['EmployeeName'] . '</td>';
            echo '<td>' . $row['designation'] . '</td>';
            echo '</tr>';
        }
        echo "</table>";
        require 'closedb.php';
        ?> 
        <b>List existing program</b>
        <?php
        require 'opendb.php';
        echo '<table border=1>
        <tr>
        <th>name</th>
        <th>release</th>
        <th>version</th>
        </tr>';
        $query = mysqli_query($con,"SELECT * FROM `pgms`;");
        while($row = mysqli_fetch_array($query)) {
           echo '<tr>';
           echo '<td>'.$row['name'].'</td>';
           echo '<td>'.$row['release'].'</td>';
           echo '<td>'.$row['version'].'</td>';
           echo '</tr>';
        }
        echo "</table>";
        require 'closedb.php';
        ?>
        <b>List existing functional areas</b>
        <?php
        require 'opendb.php';
        echo '<table border=1>
        <tr>
        <th>id</th>
        <th>name</th>
        </tr>';
        $query = mysqli_query($con,"SELECT * FROM `functional`;");
        while($row = mysqli_fetch_array($query)) {
           echo '<tr>';
           echo '<td>'.$row['functionalid'].'</td>';
           echo '<td>'.$row['functionalname'].'</td>';
           echo '</tr>';
        }
        echo "</table>";
        require 'closedb.php';
        ?>
        <b>Delete an existing employee</b>
    
    <form action="." method="POST">
        <?php
        require 'opendb.php';
        $query = mysqli_query($con,"SELECT * FROM `employees`;");
        echo "<select name='empid' style='width:100px;'>";
       echo '<option value="select">Select</option>';
        while($row = mysqli_fetch_array($query)) {
           echo "<option value='".$row['EmployeeID']."'>".$row['EmployeeID']."</option>";
        }
        echo "</select>";
        ?>      
        <input type="submit" id="delete_emp" name="delete_emp" value="delete">
    </form>
        <b>Insert a new employee</b>
    <form action="." method="POST" id="emp_reset" onsubmit="validateForm()">
            <input type="text" id="id" name="id" size="10" min="100" max="999"></br>
            <input type="text" id="name" name="name" size="10"></br>
            <select name="designation" id="designation">
                <option value="Client">Client</option>
                <option value="Tester">Tester</option>
                <option value="Developer">Developer</option>
                <option value="Manager">Manager</option>
            </select> <br>
            <input type="submit" id="insert_emp" name="insert_emp" value="insert" size="10">
            <input type="button" onclick="myFunction()" value="Reset">
    </form>
         <b>Delete an existing program</b>
    <form action="." method="POST">
        <?php
        require 'opendb.php';
        $query = mysqli_query($con,"SELECT DISTINCT `name` FROM `pgms`;");
        echo "<select name='program_name' style='width:100px;'>";
        echo '<option value="select">Select</option>';
        while($row = mysqli_fetch_array($query)) {
           echo "<option value='".$row['name']."'>".$row['name']."</option>";
        }
        echo "</select>";
        ?>
       <input type="submit" id="delete_pgm" name="delete_pgm" value="delete"> 
    </form>
       <b>Delete an existing release</b>
    <form action="." method="POST">
        <b> Program</b> <select id="pgm1" name="program_name"> <option value="Select">Select</option></select>
        <b> Release</b> <select id="rel1" name="release_name"> <option value="s1">*</option></select>
        <br>       
        <input type="submit" id="delete_release" name="delete_release" value="delete">
    </form> 
        <b>Delete an existing version</b> 
    <form action="." method="POST">
        <b> Program</b> <select id="pgm" name="program_name"> <option value="Select1">Select</option></select>
        <b> Release</b> <select id="rel" name="release_name"> <option value="s2">*</option></select>
        <b> Version</b> <select id="ver" name="version_name"> <option value="s2">*</option></select>
        
        <br>
        
    <input type="submit" id="delete_version" name="delete_version" value="delete">
    </form> 
         <b>Insert a new version</b>
    <form action="." method="POST" id="program_reset" onsubmit="validateForm2()">
            <input type="text" id="name" name="name" size="10"></br>
            <input type="text" id="release" name="release" size="10"></br>
            <input type="text" id="version" name="version" size="10"> <br>
            <input type="submit" id="insert" name="insert" value="insert" size="10">
            <input type="button" onclick="myFunction()" value="Reset">
    </form>
         <b>Delete an existing functional area</b>
    <form action="." method="POST">
        <?php
        require 'opendb.php';
        $query = mysqli_query($con,"SELECT * FROM `functional`;");
        echo "<select name='functional' style='width:100px;'>";
        echo '<option value="select">Select</option>';
        while($row = mysqli_fetch_array($query)) {
           echo "<option value='".$row['functionalname']."'>".$row['functionalname']."</option>";
        }
        echo "</select>";
        ?>      
        <input type="submit" id="delete_func" name="delete_func" value="delete">
    </form>
         <b>Insert a new functional area</b>
    <form action="." method="POST" id="func_reset" onsubmit="validateForm3()">
            <input type="text" id="fa_name" name="fa_name" size="10">
            <input type="submit" id="fa_insert" name="fa_insert" value="insert" size="10">
            <input type="button" onclick="myFunction()" value="Reset">
    </form>
         
        <script src="jquery-1.11.3.min.js"></script>
        <script src="fetch1.js"></script>
        <script src="fetch2.js"></script>
        <script>
        function myFunction() {
        document.getElementById("func_reset").reset();
        document.getElementById("emp_reset").reset()
        document.getElementById("program_reset").reset()
        }
    </script>    
    </body>
</html>

