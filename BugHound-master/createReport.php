<?php
session_start();

if ((!isset($_SESSION['login'])) && (!isset($_SESSION['login_client'])) && (!isset($_SESSION['login_manager'])) && (!isset($_SESSION['login_dev']))) {
    header("Location: index.html");
}
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.                                                                                                                                                             
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Create Bug Report</title>
        <link rel="stylesheet" href="assets/css/main.css"/>
    
    </head>
    <body>
        <form action="insertReport.php" name="createRep" onsubmit="return createReportValidate()" method="post">
            <?php
            $con = mysqli_connect('localhost', 'root', '', 'testdatabase');
            if (!$con) {
                die('Could not connect!' . mysqli_error());
            }
            mysqli_select_db($con, "testdatabase");
            ?>
            <h2> New Bug Report Entry Page</h2><br/>

            <b> Program</b> <select name="program" id="pgm"><option value =""></option></select>
            <b> Release</b> <select name="release" id="rel"></select>
            <b> Version</b> <select name="version" id="ver"></select>
            <br><br><b> Report Type </b>
            <select name="reportType" id="reportType">
                <option value="0" selected> </option>
                <option value="Coding Error"> Coding Error </option>
                <option value="Design Issue"> Design Issue </option>
                <option value="Suggestion"> Suggestion </option>
                <option value="Documentation"> Documentation </option>
                <option value="Hardware"> Hardware</option>
                <option value="Query"> Query </option>
            </select>

            <b> Severity </b>
            <select name="severity" id="severity">
                <option value="0" selected> </option>
                <option value="Fatal"> Fatal</option>
                <option value="Severe"> Severe</option>
                <option value="Minor"> Minor </option>
            </select><br/></br>

            <b>Problem Summary </b>
            <input type="text" name="probSummary" id="probSummary" size="60">

            <b> Reproducible?</b>
            <select name="reprod">
                <option value="Yes">Yes</option>
                <option value="No">No</option>
            </select>
            <br><br><table><tr><td><b>Problem&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b><br></td>
                    <td><textarea name="problem" id="problem" rows="2" cols="150"> </textarea></td></tr></table>

            <br><b><table><tr><td>Suggested Fix</b><br></td>
                        <td><textarea name="fix" id="fix" rows="2" cols="150"> </textarea></td></tr></table>

                <br><b>&nbsp;Reported by</b>
                <select name="reportedBy" id="reportedBy">
                    <option value="0" selected> </option>
                    <?php
                    $reportedBy = mysqli_query($con, "SELECT EmployeeID,EmployeeName FROM employees");
                    while (($row = mysqli_fetch_array($reportedBy)) != NULL) {
                        echo "<option value=" . $row['EmployeeName'] . ">" . $row['EmployeeID'] . "  " . $row['EmployeeName'] . "</option>";
                    }
                    ?>
                </select>

                <b>&nbsp;Date</b>
                <input type="date" id="dated"  value="<?php echo date('Y-m-d'); ?>" name="dated" />
                <br><br>
                <input type="submit" value='Submit' name="submitCreate" id="submitCreate"/>
                <button type="reset" value="Reset" onclick="window.location.reload()">Reset</button>
                <input type='submit' value="Cancel" onclick="window.location.href='list.php'" />
                
                <script src="scripts/jquery-1.11.3.min.js"></script>
                <script src="fetch.js"></script>
                <script src="scripts/createReportValidate.js"></script>
        </form>
    </body>
</html>
