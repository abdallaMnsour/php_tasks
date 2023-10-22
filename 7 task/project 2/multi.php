<?php

$errors = [];
$bool = false;
$upload_success = false;

if (isset($_FILES['image'])) {
  $image = $_FILES['image'];

  $image_name = $image['name'];
  $image_tmp = $image['tmp_name'];
  $image_error = $image['error'];
  $image_size = $image['size'];

  $count_images = count($image_name);

  if ($image_error[0] == 0) {
    for ($i = 0; $i < $count_images; $i++) {
      $image_types = ['jpg', 'jpeg', 'png'];
      $type = @end(explode('.', $image_name[$i]));
      if (in_array($type, $image_types)) {
        if ($image_size[$i] < 2 * 1024 * 1024) {
        } else {
          $errors[$image_name[$i]] = 'you\'r image is too big';
        }
      } else {
        $errors[$image_name[$i]] = 'you have to upload validate image';
      }
    }
  } elseif ($image_error[0] == 4) {
    $errors[$image_name[$i]] = 'you have to upload one or more pictures';
  }
  // لن يتم رفع اي صوره اذا كانت احدي الصور بها مشكله
  if (empty($errors)) {
    for ($i = 0; $i < $count_images; $i++) {
      move_uploaded_file($image_tmp[$i], 'images/' . uniqid() . '.' . $type);
    }
    $upload_success = true;
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

  <form method="post" class="w-50 m-auto mt-5" enctype="multipart/form-data">

    <?php if ($upload_success) : ?>
      <div class="alert alert-success" role="alert">
        the photos have been uploaded successfully
      </div>
    <?php elseif (!empty($errors)) : ?>
      <div class="alert alert-danger" role="alert">
        no images were uploaded due to an error
      </div>
    <?php endif; ?>

    <div class="mb-3">
      <label for="img" class="form-label">Multiple files input example</label>
      <input name="image[]" class="form-control" type="file" id="img" multiple />
    </div>
    <?php
    if (!empty($errors)) :
      foreach ($errors as $key => $error) :
    ?>
        <div class="alert alert-danger" role="alert">
          <?= '<strong>' . $error . '</strong><br>image name : ' . $key ?>
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