<?php
require_once('../models/connect.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    /* header  */
    .home-header-logo {
        background-color: #014EB9;
        padding: 20px 60px;
    }

    .home-header-logo img {
        width: 220px;
    }

    /* BUTTON  */
    .fill:hover,
    .fill:focus {
        -webkit-box-shadow: inset 0 0 0 2em var(--hover);
        box-shadow: inset 0 0 0 2em var(--hover);
    }

    .pulse:hover,
    .pulse:focus {
        -webkit-animation: pulse 1s;
        animation: pulse 1s;
        -webkit-box-shadow: 0 0 0 2em rgba(255, 255, 255, 0);
        box-shadow: 0 0 0 2em rgba(255, 255, 255, 0);
    }

    @-webkit-keyframes pulse {
        0% {
            -webkit-box-shadow: 0 0 0 0 var(--hover);
            box-shadow: 0 0 0 0 var(--hover);
        }
    }

    @keyframes pulse {
        0% {
            -webkit-box-shadow: 0 0 0 0 var(--hover);
            box-shadow: 0 0 0 0 var(--hover);
        }
    }

    .close:hover,
    .close:focus {
        -webkit-box-shadow: inset -3.5em 0 0 0 var(--hover), inset 3.5em 0 0 0 var(--hover);
        box-shadow: inset -3.5em 0 0 0 var(--hover), inset 3.5em 0 0 0 var(--hover);
    }

    .raise:hover,
    .raise:focus {
        -webkit-box-shadow: 0 0.5em 0.5em -0.4em var(--hover);
        box-shadow: 0 0.5em 0.5em -0.4em var(--hover);
        -webkit-transform: translateY(-0.25em);
        transform: translateY(-0.25em);
    }

    .up:hover,
    .up:focus {
        -webkit-box-shadow: inset 0 -3.25em 0 0 var(--hover);
        box-shadow: inset 0 -3.25em 0 0 var(--hover);
    }

    .slide:hover,
    .slide:focus {
        -webkit-box-shadow: inset 6.5em 0 0 0 var(--hover);
        box-shadow: inset 6.5em 0 0 0 var(--hover);
    }

    .offset {
        -webkit-box-shadow: 0.3em 0.3em 0 0 var(--color), inset 0.3em 0.3em 0 0 var(--color);
        box-shadow: 0.3em 0.3em 0 0 var(--color), inset 0.3em 0.3em 0 0 var(--color);
    }

    .offset:hover,
    .offset:focus {
        -webkit-box-shadow: 0 0 0 0 var(--hover), inset 6em 3.5em 0 0 var(--hover);
        box-shadow: 0 0 0 0 var(--hover), inset 6em 3.5em 0 0 var(--hover);
    }

    .pulse {
        --color: #ef6eae;
        --hover: #ef8f6e;
    }

    .raise {
        --color: #ffa260;
        --hover: #e5ff60;
    }

    .slide {
        --color: #8fc866;
        --hover: #66c887;
    }


    button {
        color: var(--color);
        -webkit-transition: 0.25s;
        transition: 0.25s;
    }

    button:hover,
    button:focus {
        border-color: var(--hover);
        color: #014EB9;
    }

    .body-button {
        /* color: #fff; */
        /* background: #17181c; */
        font: 300 1em "Fira Sans", sans-serif;
        -webkit-box-pack: center;
        -ms-flex-pack: center;
        justify-content: center;
        -ms-flex-line-pack: center;
        align-content: center;
        -webkit-box-align: center;
        -ms-flex-align: center;
        align-items: center;
        text-align: center;
        /* min-height: 100vh; */
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        padding-top: 30px;
    }

    button {
        background: none;
        border: 2px solid;
        font: inherit;
        line-height: 1;
        margin: 10px;
        padding: 20px 40px;
        border-radius: 300px;
    }

    h2 {
        font-weight: 600;
    }
    h1{
        text-align: center;
        color: #014EB9;
    }
    code {
        color: #e4cb58;
        font: inherit;
    }
    /* container  */
    .tab-content{
        display: flex;
        justify-content: center;
        padding: 0px 20px;
    }
    input[type="radio"] {
        width: 20px; 
        height: 20px; 
    }
    label {
        font-size: 20px; 
        margin-left: 5px; 
    }
    .btn-submit{
        display: flex;
        justify-content: center;
        padding-top: 50px;
    }
    .btn-submit > input{
        width: 250px;
        height: 40px;
        border-radius: 20px;
        font-size: 22px;
        font-weight: 600;
    }
    /* Logic  */
    .active {
        display: none;
    }

    .tab-pane {
        display: none;
    }

    .active-tab-pane {
        display: block;
    }

    /* TIME  */
 
    #timer {
        margin-top: 10px;
        display: flex;
        justify-content: center;
        font-size: 20px;
        color:rgb(252, 81, 7);
    }
</style>

<body>
    <!-- HEADER  -->
    <div>
        <div class="home-header-logo">
            <a href="../index.php"><img src="../public/images/logo-vtc-academy-white-20220812062339.png" alt=""></a>
        </div>
    </div>
    <!-- BUTTON  -->
    <div class="body-button">
        <div class="tab-item">
            <button id="btb-service" class="pulse" onclick="startTimer()">KPOP MUSIC</button>
        </div>
        <div class="tab-item">
            <button id="btb-service" class="raise" onclick="startTimer()" >GAMING</button>
        </div>
        <div class="tab-item">
            <button id="btb-service" class="slide" onclick="startTimer()">COSPLAY & MANGA</button>
        </div>
    </div>
    <!-- TIME  -->
    <div class="time-remaining" id="timer"></div>
    <!-- Tab content -->
    <div class="tab-content">
        <div class="tab-pane">
        <h1> Câu hỏi về chủ đề Music</h1>
            <?php
            $sql = "
    SELECT * FROM answers_musics 
    JOIN questions_music ON answers_musics.id_question_music = questions_music.id_question_music 
    ORDER BY RAND() 
    LIMIT 1
";
            $result = mysqli_query($conn, $sql);

            while ($kq = mysqli_fetch_assoc($result)) {
            ?>
                <h2><?php echo $kq['question_music']; ?></h2>
                <form action="topic_back.php" method="post">
                    <input type="radio" name="answer" value="A" id="answer_a">
                    <label for="answer_a">A. <?php echo $kq['answer_a']; ?></label><br>

                    <input type="radio" name="answer" value="B" id="answer_b">
                    <label for="answer_b">B. <?php echo $kq['answer_b']; ?></label><br>

                    <input type="radio" name="answer" value="C" id="answer_c">
                    <label for="answer_c">C. <?php echo $kq['answer_c']; ?></label><br>

                    <input type="hidden" name="correct_answer" value="<?php echo $kq['correct_answer']; ?>">
                    <!-- Add more radio buttons if needed -->

                    <div class="btn-submit">
                        <input type="submit" value="Submit">
                    </div>
                </form>
        </div>
    <?php
            }
    ?>
    <div class="tab-pane">
        <h1>Câu hỏi về chủ đề Gaming</h1>
        <?php
        $sql = "
    SELECT * FROM answers_gaming 
    JOIN questions_gaming ON answers_gaming.id_gaming  = questions_gaming.id_gaming 
    ORDER BY RAND() 
    LIMIT 1
";
        $result = mysqli_query($conn, $sql);

        while ($kq = mysqli_fetch_assoc($result)) {
        ?>
            <h2><?php echo $kq['question_gaming']; ?></h2>
            <form action="topic_back.php" method="post">
                <input type="radio" name="answer" value="A" id="answer_a">
                <label for="answer_a">A. <?php echo $kq['answer_a']; ?></label><br>

                <input type="radio" name="answer" value="B" id="answer_b">
                <label for="answer_b">B. <?php echo $kq['answer_b']; ?></label><br>

                <input type="radio" name="answer" value="C" id="answer_c">
                <label for="answer_c">C. <?php echo $kq['answer_c']; ?></label><br>

                <input type="hidden" name="correct_answer" value="<?php echo $kq['correct_answer']; ?>">
                <!-- Add more radio buttons if needed -->

                <div class="btn-submit">
                    <input type="submit" value="Submit">
                </div>
            </form>
    </div>
<?php
        }
?>

<div class="tab-pane">
    <h1>Câu hỏi về chủ đề Cosplay & Manga</h1>
    <?php
    $sql = "
    SELECT * FROM answers_cosplay 
    JOIN questions_cosplay ON answers_cosplay.id_cosplay  = questions_cosplay.id_cosplay 
    ORDER BY RAND() 
    LIMIT 1
";
    $result = mysqli_query($conn, $sql);

    while ($kq = mysqli_fetch_assoc($result)) {
    ?>
        <h2><?php echo $kq['question_cosplay']; ?></h2>
        <form action="topic_back.php" method="post">
            <input type="radio" name="answer" value="A" id="answer_a">
            <label for="answer_a">A. <?php echo $kq['answer_a']; ?></label><br>

            <input type="radio" name="answer" value="B" id="answer_b">
            <label for="answer_b">B. <?php echo $kq['answer_b']; ?></label><br>

            <input type="radio" name="answer" value="C" id="answer_c">
            <label for="answer_c">C. <?php echo $kq['answer_c']; ?></label><br>

            <input type="hidden" name="correct_answer" value="<?php echo $kq['correct_answer']; ?>">
            <!-- Add more radio buttons if needed -->

            <div class="btn-submit">
                <input type="submit" value="Submit">
            </div>
        </form>
</div>
<?php
    }
?>
</div>

</div>
<script>
    const $ = document.querySelector.bind(document)
    const $$ = document.querySelectorAll.bind(document)

    const tabs = $$('.tab-item')
    const panes = $$('.tab-pane')
    tabs.forEach((tab, index) => {
        const pane = panes[index]
        tab.onclick = function() {
            $('.tab-pane').classList.remove('active-tab-pane')
            tabs.forEach((tab) => {
                tab.classList.add('active');
            });
            this.classList.remove('active')
            pane.classList.add('active-tab-pane')
        }
    })

    // TIME 
    function startTimer() {
        var countdown = 10; // set time đếm ngược
        var timerDisplay = document.getElementById("timer");

        var countdownInterval = setInterval(function () {
            timerDisplay.textContent = "Time remaining: " + countdown + " seconds";

            if (countdown <= 0) {
                clearInterval(countdownInterval);
                window.location.href = "your_redirect_page.php";
            }

            countdown--;
        }, 1000);
    }
</script>
</body>

</html>