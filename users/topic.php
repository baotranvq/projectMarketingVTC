<?php
require_once('../models/connect.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GameShow</title>

</head>
<style>
    body {
        margin: unset;
        background-image: url('../public/images/background.png');
        background-size: cover;
        background-repeat: no-repeat;
        font-family:sans-serif;
    }

    /* header  */
    .home-header-logo {
        /* background-color: #014EB9; */
        padding: 20px 60px;
    }

    .home-header-logo img {
        width: 220px;
    }

    /* BUTTON   */

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
        padding-top: 10px;
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

    .tab-item {
        padding: 0px 20px;
    }

    .tab-item>button {
        height: 60px;
        border-radius: 30px;

    }

    h2 {
        font-weight: 600;
    }

    h1 {
        text-align: center;
        color: #014EB9;
    }

    code {
        color: #e4cb58;
        font: inherit;
    }

    /* container  */
    .tab-content {
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

    .buttons {
        text-align: center;
        padding-top: 20px;
    }

    .login-button {
        background-color: #203F7D;
        color: #FEDA00;
        width: 100%;
        font-size: 20px;
        font-weight: 800;
    }

    .login-button {
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s, box-shadow 0.3s, color 0.3s;
        text-decoration: none;
    }

    .login-button:hover {
        background-color: #203F7D;
        color: #fff;
        width: 100%;
        box-shadow: none;
    }

    .login-button:active {
        box-shadow: 0 0 10px #19d4ca;
    }

    /* Logic  */
    .active {
        display: none;
    }

    .tab-pane {
        display: none;
        background-color: #fff;
        opacity: 0.9;
        padding: 20px;
        border-radius: 20px;
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
        color: rgb(252, 81, 7);
    }

    @media screen and (max-width:480px) {
        h1 {
            font-size: 20px;
        }

        .body-button {
            display: unset !important;
        }

        .login-button {
            width: unset;
        }

        .home-header-logo {
            padding: 10px;
        }

        h2 {
            font-size: 18px;
        }

        .login-button:hover {
            width: unset;
        }

        .home-header-logo img {
            width: 150px;
        }

        .tab-item>button {
            height: 40px;
            font-size: 18px;
            font-weight: 600;
        }

    }
</style>

<body>
    <!-- HEADER  -->
    <div>
        <div class="home-header-logo">
            <a href="../index.php"><img src="../public/images/logoVTC.png" alt=""></a>
        </div>
    </div>

    <div class="topic">
        <h1>Chào bạn!<br>Mời bạn lựa chọn chủ đề tham gia minigame trả lời câu hỏi nhận quà nhé!</h1>
    </div>
    <!-- BUTTON  -->
    <div class="body-button">

        <div class="tab-item ">
            <button onclick="startTimer()" class="login-button">GAMING</button>
        </div>
        <div class="tab-item ">
            <button onclick="startTimer()" class="login-button">KPOP MUSIC</button>
        </div>
        <div class="tab-item">
            <button onclick="startTimer()" class="login-button">COSPLAY & MANGA</button>
        </div>

        <!-- <div class="tab-item">
            <button id="btb-service" class="pulse" onclick="startTimer()">KPOP MUSIC</button>
        </div>
        <div class="tab-item">
            <button id="btb-service" class="raise" onclick="startTimer()">GAMING</button>
        </div>
        <div class="tab-item">
            <button id="btb-service" class="slide" onclick="startTimer()">COSPLAY & MANGA</button>
        </div> -->
    </div>
    <!-- TIME  -->
    <div class="time-remaining" id="timer"></div>
    <!-- Tab content -->
    <div class="tab-content">

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

                    <div class="buttons">
                        <button type="submit" class="login-button">Trả Lời</button>
                    </div>
                </form>
        </div>
    <?php
            }
    ?>

    <div class="tab-pane">
        <h1> Câu hỏi về chủ đề KPOP Music</h1>
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

                <div class="buttons">
                    <button type="submit" class="login-button">Trả Lời</button>
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

            <div class="buttons">
                <button type="submit" class="login-button">Trả Lời</button>
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
                    $('.topic').classList.add('active')
                });
                this.classList.remove('active')
                pane.classList.add('active-tab-pane')
            }
        })

        // TIME 
        function startTimer() {
            var countdown = 15; // set time đếm ngược
            var timerDisplay = document.getElementById("timer");

            var countdownInterval = setInterval(function() {
                timerDisplay.textContent = "Time remaining: " + countdown + " seconds";

                if (countdown <= 0) {
                    clearInterval(countdownInterval);
                    alert('Đã hết thời gian trả lời.\nCảm ơn bạn đã tham gia!')
                    window.location.href = "../index.php";
                }

                countdown--;
            }, 1000);
        }
    </script>
</body>

</html>