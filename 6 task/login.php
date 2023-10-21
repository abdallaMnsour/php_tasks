<?php

$users = [
  'abdalla' => 'bode',
  'mazin' => 'mezo',
  'ali' => 'elwa',
  'kamal' => 'koko',
  'mohsin' => 'moho',
];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  if (array_key_exists($_POST['username'], $users) && $_POST['password'] == $users[$_POST['username']]) {
    header('location: https://themes.themesbrand.com/themebau/react/');
  } else {
    $error = 'the username or password is wrong <strong>try again</strong>';
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

  <form class="m-auto w-50 mt-5" method="post">
    <?php if (isset($error)) : ?>
      <div class="alert alert-danger" role="alert">
        <?= $error ?>
      </div>
    <?php endif; ?>
    <div class="mb-3">
      <label for="name" class="form-label">Username</label>
      <input type="text" name="username" class="form-control" id="name" value="<?= $_POST['username'] ?? ''?>" />
    </div>
    <div class="mb-3">
      <label for="password" class="form-label">Password</label>
      <input type="password" name="password" class="form-control" id="password" />
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>