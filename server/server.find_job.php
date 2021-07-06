<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $full_name = mysqli_real_escape_string($db_conn, htmlspecialchars($_POST['full_name']));
    $phone_number = mysqli_real_escape_string($db_conn, htmlspecialchars($_POST['phone_number']));
    $job_area = mysqli_real_escape_string($db_conn, htmlspecialchars($_POST['job_area']));
    $job_title = mysqli_real_escape_string($db_conn, htmlspecialchars($_POST['job_title']));
    // $username = mysqli_real_escape_string($db_conn, htmlspecialchars($_POST['username']));
    // $password = mysqli_real_escape_string($db_conn, htmlspecialchars($_POST['password']));
    $cv_file = $_FILES['cv_file']['name'];
    $file_ext = pathinfo($cv_file, PATHINFO_EXTENSION);
    $allowed_ext = array('doc', 'pdf', 'docx');
    // Ver
    $maxsize = 5 * 1024 * 1024;
    if (empty($cv_file)) {
        echo("<script>alert('Please add your CV');</script>");
    }
    if($_FILES['cv_file']['size'] <= 0 || $_FILES['cv_file']['size'] > $maxsize){
        echo ("<script>alert('This file size is not allowed');</script>");
    } 
    if(!in_array($file_ext,$allowed_ext)){
        echo "<script>alert('Only PDF and DOC file format allowed');</script>";
    }
    else {
        #--- preparing the query
        $sql = "INSERT INTO jobseekers(full_name,phone_numb,job_area,job_title,cv_files) VALUES(?,?,?,?,?);";
        $stmt = mysqli_stmt_init($db_conn); //prepare statement
        
        if (!mysqli_stmt_prepare($stmt, $sql)) { // check if is prepared
            echo ("Something missing");
        } else {
            mysqli_stmt_bind_param($stmt, 'sssss', $full_name, $phone_number, $job_area, $job_title,$cv_file);
            move_uploaded_file($_FILES["cv_file"]["tmp_name"], "./uploads" . $cv_file);
            mysqli_stmt_execute($stmt);
            echo ("<script>
                window.alert('Your submition has been received successfully.');
                window.location.href='./index.html'; 
                </script>");
            exit;
        }
    }
}
