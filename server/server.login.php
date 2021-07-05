<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = mysqli_real_escape_string($db_conn, htmlspecialchars($_POST['username']));
    $password = mysqli_real_escape_string($db_conn, htmlspecialchars($_POST['password']));

    if (empty($_POST['username'])) {
        header("Location:login.php?Warning");
        exit();
    }
    if (empty($_POST['password'])) {
        header("Location:login.php?Warning");
        exit();
    } else {
        // Login scripts for 2
    }
}
