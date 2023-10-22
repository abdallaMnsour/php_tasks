<?php

session_start();

// لا اريد ان ادمر الجلسه لان هناك مستخدمين قد يتم مسح بياناتهم
// اذا اراد المستخدم تسجيل الخروج فإن بياناته فقت هي اللتي تحذف من الجلسه
// session_destroy();

for ($i = 0; $i < count($_SESSION['users']); $i++) {
  if ($_SESSION['users'][$i]['email'] == $_SESSION['user']['email']) {
    unset($_SESSION['users'][$i]);
  }
}
$_SESSION['user'] = null;
header('location: login.php');
