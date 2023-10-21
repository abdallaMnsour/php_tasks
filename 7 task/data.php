<?php

session_start();
$_SESSION['visit'] = true;

$_SESSION['users'] = [
  [
    'name' => 'abdalla',
    'image' => 'default.png',
    'email' => 'abdalla@gmail.com',
    'password' => 'Abdalla123'
  ],
  [
    'name' => 'kareem',
    'image' => 'default.png',
    'email' => 'kareem@gmail.com',
    'password' => 'Kareem789'
  ],
  [
    'name' => 'ali',
    'image' => 'default.png',
    'email' => 'ali@gmail.com',
    'password' => 'Ali456'
  ]
];


/*
اذا قمت بالدخول الي هذه الصفحه بطريقه مباشره يقوم بتحويلك الي صفحه الاندكس

السبب
- هذه الصفحه استعملها لتعريف المتغيرات ولا يوجد اي جرافيك فيها 
*/
if (isset($_GET['page'])) {
  header('location: ' . $_GET['page']);
} else {
  header('location: index.php');
}
