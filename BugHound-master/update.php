<?php

session_start();
if ((!isset($_SESSION['login'])) && (!isset($_SESSION['login_manager'])) && (!isset($_SESSION['login_dev']))) {
    header("Location: index.html");
}
$bug = $_SESSION['bug'];

if (isset($_POST['submitCreate'])) {//if the submit button is clicked
    $conManager = mysqli_connect('localhost', 'root', '', 'testdatabase');
    if (!$conManager) {
        die('Could not connect!' . mysqli_error());
    }
    mysqli_select_db($conManager, "testdatabase");

    $program = $_POST['program'];
    $release = $_POST['release'];
    $version = $_POST['version'];
    $reportType = $_POST['reportType'];
    $severity = $_POST['severity'];
    $probSummary = $_POST['probSummary'];
    $reprod = $_POST['reprod'];
    $problem = $_POST['problem'];
    $fix = $_POST['fix'];
    $reportedBy = $_POST['reportedBy'];
    $dated = $_POST['dated'];
    $assigned = $_POST['assignedTo'];
    if (isset($_SESSION['login_manager'])) {
        $prior = $_POST['priority'];
    }
    $func = $_POST['functional'];
    $comm = $_POST['comments'];
    $stat = $_POST['status'];
    $res = $_POST['resolution'];
    $resv = $_POST['resolutionVersion'];
    $resB = $_POST['resolutionBy'];
    $dateSol = $_POST['dateSolved'];
    $tested = $_POST['testedBy'];
    $testedDate = $_POST['dateTested'];
    $isDefer = $_POST['defer'];

    if (isset($_SESSION['login_manager'])) {
        $updateManager = "UPDATE `buginfo` SET `TestedBy`='$tested',`TestedDate`='$testedDate',`TreatAsDeffered`='$isDefer',`ProgramName`='$program',`release_`='$release',`version`='$version',`ReportType`='$reportType', `Severity`='$severity',`ProblemSummary`='$probSummary', `Reproducible`='$reprod',`problem`='$problem',`SuggestedFix`='$fix',`ReportedBy`='$reportedBy', `ReportedDate`='$dated',`AssignedTo`='$assigned', `Priority`='$prior', `FunctionalArea`='$func', `Comments`='$comm', `Status`='$stat', `Resolution`='$res', `ResolutionVersion`='$resv', `ResolvedBy`='$resB', `ResolvedDate`='$dateSol' WHERE `BugID`='$bug'";
    } else {
        $updateManager = "UPDATE `buginfo` SET `TestedBy`='$tested',`TestedDate`='$testedDate',`TreatAsDeffered`='$isDefer',`ProgramName`='$program',`release_`='$release',`version`='$version',`ReportType`='$reportType', `Severity`='$severity',`ProblemSummary`='$probSummary', `Reproducible`='$reprod',`problem`='$problem',`SuggestedFix`='$fix',`ReportedBy`='$reportedBy', `ReportedDate`='$dated',`AssignedTo`='$assigned', `FunctionalArea`='$func', `Comments`='$comm', `Status`='$stat', `Resolution`='$res', `ResolutionVersion`='$resv', `ResolvedBy`='$resB', `ResolvedDate`='$dateSol' WHERE `BugID`='$bug'";
    }
    $result = mysqli_query($conManager, $updateManager);
    if ($result == TRUE) {

        echo ("<SCRIPT>
    window.alert('Record updated successfully for ID '+$bug);
    window.location.href='list.php';
    </SCRIPT>");
    } else {
        echo "Error: " . $updateManager . "<br>" . $conManager->error;
    }
    mysqli_close($conManager);
}
