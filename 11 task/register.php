<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Design by foolishdeveloper.com -->
    <title>Glassmorphism login Form Tutorial in html css</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    <!--Stylesheet-->

    <style media="screen">
        *,
        *:before,
        *:after {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        body {
            background-color: #080710;
        }

        .background {
            width: 430px;
            height: 520px;
            position: absolute;
            transform: translate(-50%, -50%);
            left: 50%;
            top: 50%;
        }

        .background .shape {
            height: 200px;
            width: 200px;
            position: absolute;
            border-radius: 50%;
        }

        .shape:first-child {
            background: linear-gradient(#1845ad,
                    #23a2f6);
            left: -80px;
            top: 40%;
        }

        .shape:last-child {
            background: linear-gradient(to right,
                    #ff512f,
                    #f09819);
            right: -30px;
            bottom: -65%;
        }

        form {
            margin-top: 300px;
            margin-bottom: 300px;
            height: fit-content;
            width: 400px;
            background-color: rgba(255, 255, 255, 0.13);
            position: absolute;
            transform: translate(-50%, -50%);
            top: 50%;
            left: 50%;
            border-radius: 10px;
            backdrop-filter: blur(10px);
            border: 2px solid rgba(255, 255, 255, 0.1);
            box-shadow: 0 0 40px rgba(8, 7, 16, 0.6);
            padding: 50px 35px;
        }

        form * {
            font-family: 'Poppins', sans-serif;
            color: #ffffff;
            letter-spacing: 0.5px;
            outline: none;
            border: none;
        }

        form h3 {
            font-size: 32px;
            font-weight: 500;
            line-height: 42px;
            text-align: center;
        }

        label {
            display: block;
            margin-top: 30px;
            font-size: 16px;
            font-weight: 500;
        }

        input {
            display: block;
            height: 50px;
            width: 100%;
            background-color: rgba(255, 255, 255, 0.07);
            border-radius: 3px;
            padding: 0 10px;
            margin-top: 8px;
            font-size: 14px;
            font-weight: 300;
        }

        ::placeholder {
            color: #e5e5e5;
        }

        button {
            margin-top: 50px;
            width: 100%;
            background-color: #ffffff;
            color: #080710;
            padding: 15px 0;
            font-size: 18px;
            font-weight: 600;
            border-radius: 5px;
            cursor: pointer;
        }

        .social {
            margin-top: 30px;
            display: flex;
        }

        .social div {
            background: red;
            width: 150px;
            border-radius: 3px;
            padding: 5px 10px 10px 5px;
            background-color: rgba(255, 255, 255, 0.27);
            color: #eaf0fb;
            text-align: center;
        }

        .social div:hover {
            background-color: rgba(255, 255, 255, 0.47);
        }

        .social .fb {
            margin-left: 25px;
        }

        .social i {
            margin-right: 4px;
        }

        input[type=radio] {
            height: 25px;
            width: 25px;
            display: inline-block;
        }

        .spn-radio {
            display: inline;
            padding-right: 5px;
            font-size: 20px;
            color: #EB901A;
        }
    </style>

</head>

<body>
    <div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>
    <form action="check_register.php" method="post" enctype="multipart/form-data">
        <h3>Register Here</h3>

        <label for="username">Username</label>
        <input name="username" type="text" placeholder="username" id="username" value="<?= @$_SESSION['person']['username'] ?? '' ?>" />

        <?php if (isset($_SESSION['errors']['username'])) : ?>
            <div style="color: #ff7777;padding-top: 10px"><?= $_SESSION['errors']['username'] ?></div>
        <?php endif; ?>

        <label for="email">Email</label>
        <input name="email" type="email" placeholder="email" id="email" value="<?= @$_SESSION['person']['email'] ?? '' ?>" />

        <?php if (isset($_SESSION['errors']['email'])) : ?>
            <div style="color: #ff7777;padding-top: 10px"><?= $_SESSION['errors']['email'] ?></div>
        <?php endif; ?>

        <!-- <label for="img">Profile Image</label>
        <input name="image" type="file" id="img"> -->

        <?php if (isset($_SESSION['errors']['image'])) : ?>
            <div style="color: #ff7777;padding-top: 10px"><?= $_SESSION['errors']['image'] ?></div>
        <?php endif; ?>

        <label>Gender</label>
        <input name="gender" value="0" type="radio" id="male" <?= isset($_SESSION['person']['gender']) ? ($_SESSION['person']['gender'] == '0' ? 'checked' : '') : ''?> checked><label for="male" class="spn-radio">male</label>
        <input name="gender" value="1" type="radio" id="female" <?= isset($_SESSION['person']['gender']) ? ($_SESSION['person']['gender'] == '1' ? 'checked' : '' ): ''?>><label for="female" class="spn-radio">female</label>

        <?php if (isset($_SESSION['errors']['gender'])) : ?>
            <div style="color: #ff7777;padding-top: 10px"><?= $_SESSION['errors']['gender'] ?></div>
        <?php endif; ?>

        <select name="type" id="type" style='background: black'>
            <option <?= @$_SESSION['person']['type'] == 'owner' ? 'selected' : '' ?> value="owner">owner</option>
            <option <?= @$_SESSION['person']['type'] == 'manager' ? 'selected' : '' ?> value="manager">manager</option>
            <option <?= @$_SESSION['person']['type'] == 'normal_user' ? 'selected' : '' ?> selected value="normal_user">normal_user</option>
        </select>

        <?php if (isset($_SESSION['errors']['type'])) : ?>
            <div style="color: #ff7777;padding-top: 10px"><?= $_SESSION['errors']['type'] ?></div>
        <?php endif; ?>

        <label for="password">Password</label>
        <input name="password1" type="password" placeholder="Password" id="password" value="<?= @$_SESSION['person']['password1'] ?? '' ?>">

        <?php if (isset($_SESSION['errors']['password'])) : ?>
            <div style="color: #ff7777;padding-top: 10px"><?= $_SESSION['errors']['password'] ?></div>
        <?php endif; ?>

        <label for="co-password">confirm Password</label>
        <input name="password2" type="password" placeholder="Confirm Password" id="co-password" value="<?= @$_SESSION['person']['password2'] ?? '' ?>">

        <?php if (isset($_SESSION['errors']['password2'])) : ?>
            <div style="color: #ff7777;padding-top: 10px"><?= $_SESSION['errors']['password2'] ?></div>
        <?php endif; ?>

        <button>Register</button>

    </form>
</body>

</html>