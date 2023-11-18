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

    /* form nhap thông tin */

    .container-form {
        display: flex;
        flex-direction: column;
        align-items: center;
        /* justify-content: center; */
    }

    .title {
        text-align: center;
        font-size: 24px;
        margin-bottom: 20px;
        color: #FEDA00;
        font-size: 28px;
        font-weight: 700;
    }

    .card {
        width: 500px;
        margin: 50px 0px;
        background-color: #fff;
        padding: 20px;
        border-radius: 10px;
        border: 4px solid #203F7D !important;
        box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
    }

    form {
        display: flex;
        flex-direction: column;
        gap: 10px;
    }

    input {
        padding: 10px;
        border: none;
        background-color: transparent;
        border-bottom: 1px solid #ccc;
        color: #fff;
        transition: box-shadow 0.3s;
    }

    input:focus {
        box-shadow: 0 0 20px #014EB9;
    }

    .buttons {
        text-align: center;
    }

    .login-button,
    .register-link {
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s, box-shadow 0.3s, color 0.3s;
        text-decoration: none;
    }

    .login-button {
        background-color: #203F7D;
        color: #FEDA00;
        width: 100%;
        font-size: 20px;
        font-weight: 800;
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

    .register-link {
        color: #ccc;
        background-color: transparent;
    }

    .register-link:hover {
        color: #fff;
    }

    .register-link:active {
        box-shadow: 0 0 10px #ccc;
    }

    @media (max-width: 480px) {
        .card {
            width: 100%;
            max-width: 300px;
        }
    }

    .card input {
        color: #203F7D;
    }

    select {
        padding: 10px;
        border: none;
        background-color: transparent;
        border-bottom: 1px solid #ccc;
    }

    option {
        color: blue;
    }
</style>

<body>
    <div>
    <div class="home-header-logo">
            <a href="#"><img src="./public/images/logo-vtc-academy-white-20220812062339.png" alt=""></a>
        </div>
    </div>
    <?php include('header.php'); ?>
        <div class="container-form">
            <div class="card">
                <h1 class="title">NHẬP THÔNG TIN THÍ SINH</h1>
                <form action="login-back.php" method="POST">
                    <label>Họ Tên</label>
                    <input type="text" name="name" placeholder="Vd: Nguyễn Văn A" required>
                    <label>Số điện thoại</label>
                    <input type="tel" id="phone" name="phone" placeholder="Vd: 0934888901" pattern="[0]{1}[0-9]{3}[0-9]{3}[0-9]{3}" required>
                    <label>Email</label>
                    <input type="email" id="email" name="email" placeholder="Vd: nguyenvana@gmail.com">
                    <label>Chọn ngành bạn quan tâm</label>
                    <select name="majors">
                        <option value="ktpm">Kỹ Thuật Phần Mềm</option>
                        <option value="dmkt">Digital Marketing</option>
                        <option value="tk3d">Thiết Kế 3D</option>
                    </select>
                    <div class="buttons">
                        <button type="submit" class="login-button">BẮT ĐẦU</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- // Import footer -->
    <?php include('footer.php'); ?>
</body>

</html>