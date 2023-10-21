<?php
echo '<pre>';
session_start();
// يرسلك الي صفحه الداتا اول مره فقت لتعريف بعض المتغيرات
if (!@$_SESSION['visit']) {
  header('location: data.php?page=' . basename(__FILE__));
  exit;
}

// print_r($_FILES);

$image_errors = [];
$image_types = ['jpg', 'jpeg', 'png'];

$errors = [];
$i = 0;
function input_is_empty($value)
{
  // ب1 $i في كل مناداه للفونكشن تزيد ال
  global $errors, $i;
  if ($value == '') {
    $errors[$i] = 'you\'r input is empty';
  }
  $i++;
}

$users = $_SESSION['users'];
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $email = trim($_POST['email']);
  $username = trim($_POST['username']);
  $password1 = trim($_POST['password1']);
  $password2 = trim($_POST['password2']);

  $bool_email = false;
  $bool_username = false;
  $bool_password = false;
  $bool_image = false;

  input_is_empty($email); // 0
  input_is_empty($username); // 1
  input_is_empty($password1); // 2

  if (!isset($errors[0])) {
    if (filter_var($email, FILTER_VALIDATE_EMAIL) != false) {
      $bool_email = true;
    } else {
      $errors[0] = 'this is not correct email';
    }
  }

  if (!isset($errors[1])) {
    if (strlen($username) >= 3) {
      $bool_username = true;
    } else {
      $errors[1] = 'you\'r name must be larger or equal 3 character';
    }
  }

  if (!isset($errors[2])) {
    if (strlen($password1) >= 8) {
      if ($password1 === $password2) {
        $bool_password = true;
      } else {
        $errors[2] = 'the password must be the same';
      }
    } else {
      $errors[2] = 'you\'r password must be larger or equal 8 character';
    }
  }

  foreach ($users as $user) {
    // if (!isset($errors[2])) {
    if ($email == $user['email']) {
      $errors['register'] = '<strong>email already exists</strong> : try type another email';
      break;
    }
    // } else {
    //   $errors['register'] = 'the password must be the same';
    // }
  }

  if (isset($_FILES['image'])) {
    $image = $_FILES['image'];
    if ($image['error'] == 0) {
      if ($image['size'] < (2 * 1024 * 1024)) {
        $type = end(explode('.', $image['name']));
        var_dump($type);
        if (in_array($type, $image_types)) {
          $image_name = uniqid() . '.' . $type;
          move_uploaded_file($image['tmp_name'], 'images/' . $image_name);
          $bool_image = true;
        } else {
          $image_errors['type'] = 'You cannot upload files, only images';
        }
      } else {
        $image_errors['size'] = 'filesize is too big';
      }
    }
  }

  // print_r($_FILES);
  // print_r($image_errors);
  if (empty($image_errors)) {

    if (!isset($errors['register']) && $bool_image && $bool_email && $bool_password && $bool_username) {

      $_SESSION['user'] = $users[] = [
        'name' => $username,
        'image' => $image_name,
        'email' => $email,
        'password' => $password1
      ];
      header('location: index.php');
      exit;
    } elseif (!isset($errors['register']) && $bool_email && $bool_password && $bool_username) {
      $_SESSION['user'] = $users[] = [
        'name' => $username,
        'image' => 'default.png',
        'email' => $email,
        'password' => $password1
      ];
      header('location: index.php');
      exit;
    }
  }
}
echo '</pre>'
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

  <form method="post" class="w-50 m-auto mt-5" enctype="multipart/form-data">
    <div class="mb-3">
      <label for="username" class="form-label">you'r name</label>
      <input name="username" type="text" class="form-control" id="username" placeholder="you'r name min(3) character">
    </div>
    <?php if (isset($errors[1])) : ?>
      <div class="alert alert-danger" role="alert">
        <?= $errors[1] ?>
      </div>
    <?php endif; ?>
    <div class="mb-3">
      <label for="email" class="form-label">Email address</label>
      <input name="email" type="email" class="form-control" id="email" placeholder="name@example.com">
    </div>
    <?php if (isset($errors[0])) : ?>
      <div class="alert alert-danger" role="alert">
        <?= $errors[0] ?>
      </div>
    <?php elseif (isset($errors['register'])) : ?>
      <div class="alert alert-danger" role="alert">
        <?= $errors['register'] ?>
      </div>
    <?php endif; ?>
    <div class="mb-3">
      <label for="password1" class="form-label">password</label>
      <input name="password1" type="password" class="form-control" id="password1" placeholder="you'r password (0-9 A-a)">
    </div>
    <?php if (isset($errors[2])) : ?>
      <div class="alert alert-danger" role="alert">
        <?= $errors[2] ?>
      </div>
    <?php endif; ?>
    <div class="mb-3">
      <label for="password2" class="form-label">password again</label>
      <input name="password2" type="password" class="form-control" id="password2" placeholder="you'r password again">
    </div>
    <div class="mb-3">
      <label for="formFileMultiple" class="form-label">Multiple files input example</label>
      <input name="image" class="form-control" type="file" id="formFileMultiple" />
    </div>
    <?php
    if (!empty($image_errors)) :
      foreach ($image_errors as $value) :
    ?>
        <div class="alert alert-danger" role="alert">
          <?= $value?>
        </div>
    <?php
      endforeach;
    endif;
    ?>
    <input type="submit" value="submit" class="btn btn-primary">
  </form>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>