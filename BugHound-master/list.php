<?PHP
session_start();
if ((!isset($_SESSION['login'])) && (!isset($_SESSION['login_client'])) && (!isset($_SESSION['login_manager'])) && (!isset($_SESSION['login_dev']))) {
    header("Location: index.html");
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Welcome!</title>
        <script type = "text/javascript" >
            history.pushState(null, null, 'list.php');
            window.addEventListener('popstate', function (event) {
                history.pushState(null, null, 'list.php');
            });
        </script>
    </head>
    <body>

        <?php if (isset($_SESSION['login'])) { ?>
            <h2>Bug Hound</h2>
            <h3>Welcome Tester</h3> <a href="logout.php">Logout</a>
            <ul>
                <li><a href="createReport.php">Create Bug Report</a></li>
                <li><a href="searchReport.php">Search Report</a></li>
            </ul>
        <?php } else if (isset($_SESSION['login_client'])) { ?>
            <h2>Bug Hound</h2>
            <h3>Welcome User</h3> <a href="logout.php">Logout</a>
            <ul>
                <li><a href="createReport.php">Create Bug Report</a></li>
                <li><a href="searchReport.php">Search Report</a></li>
            </ul>
        <?php } else if (isset($_SESSION['login_dev'])) { ?>
            <h2>Bug Hound</h2>
            <h3>Welcome Developer</h3> <a href="logout.php">Logout</a>
            <ul>
                <li><a href="createReport.php">Create Bug Report</a></li>
                <li><a href="searchReport.php">Search Report</a></li>
            </ul>
        <?php } else if (isset($_SESSION['login_manager'])) { ?>
            <h2>Bug Hound</h2>
            <h3>Welcome Manager</h3> <a href="logout.php">Logout</a>
            <ul>
                <li><a href="createReport.php">Create Report</a></li> 
                <li><a href="searchReport.php">Search Report</a></li>
                <li><a href="exportTables.php">Export Tables</a></li>   
                <li><a href="dbEmp.php">Employee maintenance</a></li> 
                <li><a href="dbProgram.php">Program maintenance</a></li> 
                <li><a href="dbFunctional.php">Functional maintenance</a></li>
            <?php } ?>
        </ul>
    </body>
</html>
