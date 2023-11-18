<?php
require_once('../models/connect.php');


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Assuming you have sanitized the input for security
    $selectedAnswer = $_POST["answer"];
    $correctAnswer = $_POST["correct_answer"];

    if ($selectedAnswer === $correctAnswer) {
        echo '<script>window.open("https://vongquaymayman.one/", "_blank");</script>';
        exit();
    } else {
        // Redirect to the incorrect page
        header("Location:topic.php");
        exit();
    }
}
?>
