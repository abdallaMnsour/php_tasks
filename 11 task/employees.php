<?php

require_once 'connect.php';

$query = 'SELECT * FROM employees';

$query = mysqli_query($conn, $query);

?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
  <div class="p-5">
    <table class="table table-bordered">
      <tr>
        <th>first_name</th>
        <th>last_name</th>
        <th>email</th>
        <th>phone_number</th>
        <th>hire_date</th>
        <th>job_id</th>
        <th>salary</th>
        <th>commission_pct</th>
        <th>manager_id</th>
        <th>department_id</th>
        <th>gender</th>
      </tr>
      <?php while ($emp = mysqli_fetch_assoc($query)) : ?>

        <tr>
          <td><?= $emp['first_name'] == NULL ? 'NULL' : $emp['first_name'] ?></td>
          <td><?= $emp['last_name'] == NULL ? 'NULL' : $emp['last_name'] ?></td>
          <td><?= $emp['email'] == NULL ? 'NULL' : $emp['email'] ?></td>
          <td><?= $emp['phone_number'] == NULL ? 'NULL' : $emp['phone_number'] ?></td>
          <td><?= $emp['hire_date'] == NULL ? 'NULL' : $emp['hire_date'] ?></td>
          <td><?= $emp['job_id'] == NULL ? 'NULL' : $emp['job_id'] ?></td>
          <td><?= $emp['salary'] == NULL ? 'NULL' : $emp['salary'] ?></td>
          <td><?= $emp['commission_pct'] == NULL ? 'NULL' : $emp['commission_pct'] ?></td>
          <td><?= $emp['manager_id'] == NULL ? 'NULL' : $emp['manager_id'] ?></td>
          <td><?= $emp['department_id'] == NULL ? 'NULL' : $emp['department_id'] ?></td>
          <td><?= $emp['gender'] == NULL ? 'NULL' : $emp['gender'] ?></td>
        </tr>

      <?php endwhile; ?>
    </table>
  </div>
</body>

</html>