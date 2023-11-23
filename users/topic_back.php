<?php
require_once('../models/connect.php');


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Assuming you have sanitized the input for security
    $selectedAnswer = $_POST["answer"];
    $correctAnswer = $_POST["correct_answer"];

    if ($selectedAnswer === $correctAnswer) {
        echo '<script>
        window.location.href = "https://vqmm.xspin.vn/vie-kor";
        </script> ';
        exit();
    } else {
        $message = "Câu trả lời của bạn đã sai!";
        echo "<script type='text/javascript'>
            setTimeout(function() {
                alert('$message');
                window.location.href = '../index.php';
            }, 100); // Chuyển hướng sau 1 giây (1000 milliseconds)
          </script>";
        exit();
    }
}
?>
