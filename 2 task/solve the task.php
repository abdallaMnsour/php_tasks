<?php

# string data type
$str = 'my name is abdalla ';

# string data type in constant
define('AGE', 'and my age is ');

# integer data type
$int = 22;

# float | double data type
$float = .6;

# boolean data type
$active = true;

/**
 * this function say hello 'username'
 * 
 * 1 - use all variable 
 * 2 - use all constant
 * 3 - use if condition
 * 4 - return string
 */

function test_func(): string
{
  global $str, $int, $float, $active;
  if ($active) {
    $string = $str . AGE . $int + $float;
  } else {
    $string = 'you are not active';
  }
  return $string;
}

echo test_func();
echo '<br>################<br>';
echo gettype(test_func());
echo '<br>################<br>';
var_dump(test_func());
echo '<br>################<br>';
print_r(test_func());
