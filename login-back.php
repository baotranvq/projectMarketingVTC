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
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $date = date("Y-m-d H:i:s");

    $sql = "SELECT * FROM users WHERE phone = '$phone'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        $message = "Số điện thoại đã được đăng ký!";
        echo "<script type='text/javascript'>
            setTimeout(function() {
                alert('$message');
                window.location.href = 'index.php';
            }, 100); // Chuyển hướng sau 1 giây (1000 milliseconds)
          </script>";
    } else {
        $sql1 = "INSERT INTO users (name, phone, email, majors, date) 
                        VALUES ('$name', '$phone', '$email', '$majors','$date') ";
        $result1 = mysqli_query($conn, $sql1);
        echo '<script>window.open("./users/topic.php");</script>';
    }
?>