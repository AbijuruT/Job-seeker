<?php
// session_start();
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
        $sql = "SELECT Username,Password FROM companies WHERE username = ? AND password = ?;";
        $stmt = mysqli_stmt_init($db_conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            print("Ooops!");
        } else {
            mysqli_stmt_bind_param($stmt, "ss", $username, md5($password));
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if ($result->num_rows > 0) {
                $_SESSION['username'] = $username;
                $_SESSION['password'] = $password;
                header("Location: ./dashboard");
                exit();
            } else {
                header("Location:./login.php?incorrect_inputs");
                exit();
            }
        }
    }
}
