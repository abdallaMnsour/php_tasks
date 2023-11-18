<?php

require_once 'connect.php';

$query = 'SELECT * FROM users';

$query = mysqli_query($conn, $query);

?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
  <a href="register.php" class="btn btn-primary p-2 m-5">add user</a>
  <div class="p-5">
    <table class="table table-bordered">
      <tr>
        <th>username</th>
        <th>email</th>
        <th>type</th>
        <th>gender</th>
      </tr>
      <?php while ($user = mysqli_fetch_assoc($query)) : ?>

        <tr>
          <td><?= $user['username'] ?></td>
          <td><?= $user['email'] ?></td>
          <td><?= $user['type'] ?></td>
          <td><?= $user['gender'] == 0 ? 'male' : 'female' ?></td>
        </tr>

      <?php endwhile; ?>
    </table>
  </div>
</body>

</html>