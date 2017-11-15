<?php

if ((!isset($_SESSION['login'])) && (!isset($_SESSION['login_client'])) && (!isset($_SESSION['login_manager'])) && (!isset($_SESSION['login_dev']))) {
    header("Location: index.html");
}
session_start();
unset($_SESSION);
session_regenerate_id(true);
session_destroy();
header('LOCATION: index.html');
