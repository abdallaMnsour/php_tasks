<?php
session_start();

// يرسلك الي صفحه الداتا اول مره فقت لتعريف بعض المتغيرات
if (!@$_SESSION['visit']) {
  header('location: data.php?page=' . basename(__FILE__));
  exit;
}

$users = $_SESSION['users'];

$errors = [];
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  foreach ($users as $user) {
    if ($_POST['email'] == $user['email']) {
      if ($_POST['password'] == $user['password']) {
        $_SESSION['user'] = $user;
        header('location: index.php');
      } else {
        $errors['login'] = 'you\'r password is wrong';
      }
      break;
    } else {
      $errors['login'] = '<strong>undefined email</strong> : please type you\'r email and try again';
    }
  }
}

?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Bootstrap demo</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>

  <form method="post" class="w-50 m-auto mt-5">
    <?php
    if (!empty($errors)) :
      foreach ($errors as $value) : ?>
        <div class="alert alert-danger" role="alert">
          <?= $value ?>
        </div>
    <?php
      endforeach;
    endif; ?>

    <div class="mb-3">
      <label for="email" class="form-label">Email address</label>
      <input name="email" type="email" class="form-control" id="email" placeholder="name@example.com">
    </div>
    <div class="mb-3">
      <label for="password" class="form-label">password</label>
      <input name="password" type="password" class="form-control" id="password" placeholder="you'r password (0-9 A-a)">
    </div>

    <div class="d-flex justify-content-between">
      <input type="submit" value="submit" class="btn btn-primary">
      <a class="link-opacity-75-hover mt-3" href="register.php">register</a>
    </div>
  </form>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>