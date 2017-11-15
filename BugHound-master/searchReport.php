<?PHP
session_start();
if ((!isset($_SESSION['login'])) && (!isset($_SESSION['login_manager'])) && (!isset($_SESSION['login_dev']))) {
    header("Location: index.html");
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Create Bug Report</title>
        <link rel="stylesheet" href="assets/css/main.css"/>
    </head>
    <body>
        <form action="searchResults.php" name="searchRep" method="post">
            <?php
            $con = mysqli_connect('localhost', 'root', '', 'testdatabase');
            if (!$con) {
                die('Could not connect!' . mysqli_error());
            }
            mysqli_select_db($con, "testdatabase");
            ?>
            <h2> Search for bugs </h2><br/>

            <table cellpadding='5'>           

                <tr> <td> <b> Program</b> </td> 
                    <td> <select name="program" id="pgm" style="" >
                            <option selected="selected" value="all">All</option>
                        </select>  </td> </tr>


                <tr> <td>  <b> Report Type </b></td> 
                    <td> <select name="reportType" id="reportType">
                            <option selected="selected" value="all">All</option>
                            <option value="Coding Error"> Coding Error </option>
                            <option value="Design Issue"> Design Issue </option>
                            <option value="Suggestion"> Suggestion </option>
                            <option value="Documentation"> Documentation </option>
                            <option value="Hardware"> Hardware</option>
                            <option value="Query"> Query </option>
                        </select>   </td> </tr>



                <tr> <td> <b> Severity </b> </td>
                    <td> <select name="severity" id="severity">
                            <option selected="selected" value="all">All</option>
                            <option value="Fatal"> Fatal</option>
                            <option value="Severe"> Severe</option>
                            <option value="Minor"> Minor </option>
                        </select> </td> </tr>


                <tr> <td>   <b> Functional Area</b> </td>
                    <td> <select name="functionalArea" id="functionalArea"> <option selected="selected" value="all">All</option></select> </td></tr>



                <tr> <td>   <b> Assigned To</b> </td>
                    <td><select name="assignedTo" id="assignedTo"> <option selected="selected" value="all">All</option></select> </td> </tr>




                <tr> <td> <b> Status</b> </td>
                    <td>  <select name="status" id="status">
                            <option selected="selected" value="all">All</option>
                            <option value="open"> open </option>
                            <option value="closed"> closed </option>

                        </select> </td> </tr>



                <tr> <td> <b> Priority </b> </td>
                    <td> <select name="priority" id="priority">
                            <option selected="selected" value="all">All</option>
                            <option value="fixImmediately"> fix Immediately </option>
                            <option value="fixAsap"> fix Asap </option>
                            <option value="fixBeforeNextMileStone"> fix Before Next Mile Stone </option>
                            <option value="fixBeforeRelease"> fix Before Release </option>
                            <option value="fixIfPossible"> fix If Possible</option>
                            <option value="optional"> optional </option>

                        </select> </td> </tr>



                <tr> <td> <b> Resolution </b> </td>
                    <td><select name="resolution" id="resolution">
                            <option selected="selected" value="all">All</option>
                            <option value="pending"> pending </option>
                            <option value="fixed"> fixed</option>
                            <option value="irreproducible"> Irreproducible </option>
                            <option value="defferred"> defferred </option>
                            <option value="asDesigned"> As Designed</option>
                            <option value="withdrawnByReporter"> Withdrawn By Reporter </option>
                            <option value="needMoreInfo"> Need more info </option>
                            <option value="disagreeWithSuggestion">Disagree with suggestion</option>
                            <option value="duplicate"> Duplicate </option>

                        </select>
                    </td>
                </tr>


                <tr> 
                    <td><b> Reported by</b> </td> 
                    <td> 
                        <select name="reportedBy" id="reportedBy"> 
                            <option selected="selected" value="all">All</option>
                        </select>
                    </td>
                </tr>




                <tr> <td>   <b>&nbsp;ReportDate</b> </td>
                    <td>  <input type="date" id="reportDate" name="reportDate" /> </td> </tr>



                <tr> <td>   <b> Resolved by</b> </td> 
                    <td> <select name="resolvedBy" id="resolvedBy"> <option selected="selected" value="all">All</option></option></select> </td> </tr>






                <tr> <td> </td> <td> 
                        <input type="submit" name="submitCreate" id="submitCreate"/> 
                        <button type="reset" value="Reset">Reset</button> 
                        <a href="list.php">
                            <input type="button" value="Cancel" />
                        </a> </td> </tr> </table>   
            <script src="scripts/jquery-1.11.3.min.js"></script>
            <script src="fetch.js"></script>


        </form>
    </body>
</html>




