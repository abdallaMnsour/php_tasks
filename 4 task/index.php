<?php
include 'layout/header.php';
require_once 'userData/data.php';
?>

<div class="d-flex justify-content-between align-items-center m-5">
  <h1 class="text-secondary m-3">Canada states...</h1>
  <a href="aboutus.php" class="btn btn-primary">aboutUs</a>
</div>

<ul class="list-group m-5 w-50">

  <?php foreach ($stateList['CA'] as $key => $value) : ?>
    <li class="list-group-item"><?= "[ $key ] -> " . $value ?></li>
  <?php endforeach; ?>

</ul>
<?php include 'layout/footer.php'; ?>