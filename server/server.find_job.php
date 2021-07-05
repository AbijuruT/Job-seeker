<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $full_name = mysqli_real_escape_string($db_conn, htmlspecialchars($_POST['full_name']));
    $phone_number = mysqli_real_escape_string($db_conn, htmlspecialchars($_POST['phone_number']));
    $job_area = mysqli_real_escape_string($db_conn, htmlspecialchars($_POST['job_area']));
    $job_title = mysqli_real_escape_string($db_conn, htmlspecialchars($_POST['job_title']));
    $username = mysqli_real_escape_string($db_conn, htmlspecialchars($_POST['username']));
    $password = mysqli_real_escape_string($db_conn, htmlspecialchars($_POST['password']));
    // Add uploads script

    #--- preparing the query
    $sql = "INSERT INTO jobseekers(full_name,phone_numb,job_area,job_title,username,password,cv_files) VALUES(?,?,?,?,?,?,?);";
    $stmt = mysqli_stmt_init($db_conn); //prepare statement

    if (!mysqli_stmt_prepare($stmt, $sql)) { // check if is prepared
        echo ("Something missing");
    } else {
        mysqli_stmt_bind_param($stmt, 'sssssss', $full_name,$phone_number,$job_area,$job_title,$username,$password,$cv_file);
        mysqli_stmt_execute($stmt);
        echo ("<script>
                window.alert('Your submition has been received successfully.');
                window.location.href='./login.php';
                </script>");
        exit;
    }
}