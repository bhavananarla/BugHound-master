<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Bug Hound Login Page</title>
    </head>
    <body>
        <?php
        $con = mysqli_connect('localhost', 'root', '', 'testdatabase');
        if (!$con) {
            die('Could not connect ' . mysqli_connect_error());
        }

        mysqli_select_db($con, "testdatabase");

        $query = mysqli_query($con, "select *  from `userlist` where user = '" . filter_input(INPUT_POST, 'username') . "' AND password = '" . filter_input(INPUT_POST, 'pass') . "'");
        $row = mysqli_num_rows($query);
        if ($row == 1) {
            if ($_POST['username'] === 'test') {
                $_SESSION['login'] = 'test';
                header('location: list.php');
            } else if ($_POST['username'] === 'manager') {
                $_SESSION['login_manager'] = 'manager';
                header('location: list.php');
            } else if ($_POST['username'] === 'developer') {
                $_SESSION['login_dev'] = 'developer';
                header('location: list.php');
            } else if ($_POST['username'] === 'client') {
                $_SESSION['login_client'] = 'client';
                header('location: list.php');
            }
        } else {
            echo ("<SCRIPT>
    window.alert('Username/Password do not match. Please re-try!');
    window.location.href='index.html';
    </SCRIPT>");
        }
        mysqli_close($con);
        ?>
    </body>
</html>
