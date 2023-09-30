<?php
include 'layout/header.php';
require_once 'userData/data.php';
?>

<div class="d-flex justify-content-between align-items-center m-5">
  <h1 class="text-secondary m-3">Canada states...</h1>
  <a href="aboutus.php" class="btn btn-primary">aboutUs</a>
</div>

<?php foreach ($stateList['CA'] as $key => $value) : ?>
  <p class="alert alert-primary w-50 m-3 mb-2"><?= "[ $key ] -> " . $value ?></p>
<?php endforeach;
include 'layout/footer.php';
?>
