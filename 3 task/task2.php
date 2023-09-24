<?php

$max_int = PHP_INT_MAX;

$arr = [];
$arr[1] = 'last name';

$arr[$max_int] = 'this is max of array ';

$arr[0] = 'first name';

/*
  error
  - Cannot add element to the array as the next element is already occupied
*/
// $arr[] = 'this may be at the last of array';

// solution

$arr[$max_int - 1] = 'this may be at the last of array';
