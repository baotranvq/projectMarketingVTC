<?php
    require_once('./models/connect.php');
    if (isset($_POST['name'])) {
        $name = $_POST['name'];
    }
    if (isset($_POST['phone'])) {
        $phone = $_POST['phone'];
    }
    if (isset($_POST['email'])) {
        $email = $_POST['email'];
    }
    if (isset($_POST['majors'])) {
        $majors = $_POST['majors'];
    }
    
    if (isset($_POST['course'])) {
        $course = $_POST['course'];
    }
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $date = date("Y-m-d H:i:s");

    $sql = "SELECT * FROM users WHERE phone = '$phone'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        $message = "Số điện thoại đã được đăng ký!";
        echo "<script type='text/javascript'>
            setTimeout(function() {
                alert('$message');
                window.location.href = './index.php';
            }, 100); // Chuyển hướng sau 1 giây (1000 milliseconds)
          </script>";
        
    } else {
        $sql1 = "INSERT INTO users (name, phone, email, majors, date,course) 
                        VALUES ('$name', '$phone', '$email', '$majors','$date','$course') ";
        $result1 = mysqli_query($conn, $sql1);
        echo '<script>window.location.href ="./users/topic.php";</script>; ';   
    }
?>