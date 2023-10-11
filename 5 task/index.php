<?php

############
## task 1 ##
############

function factorial(int ...$nums): int
{
  $total = 1;
  foreach ($nums as $num) {
    if ($num < 0) {
      throw new Exception('you have <span style="color:red">negative</span> number');
    } else {
      $total *= $num;
    }
  }
  return $total;
}

try {
  echo factorial(2, 3, -2);
} catch (Exception $e) {
  echo $e->getMessage();
}

##################
## task 2 and 3 ##
##################
echo '<br>===================<br>';

echo strrev('ahmed') . '<br>'; // demha
echo my_strrev('ahmed'); // demha

function my_strrev(string $string): string
{
  $str = '';
  for ($i = strlen($string) - 1; $i >= 0; $i--) {
    $str .= $string[$i];
  }
  return $str;
}

############
## task 4 ##
############
echo '<br>===================<br>';

$name = 'hello my name is abdalla and my age is 22 year\'s old';

echo explode(' ', $name, 2)[0];

############
## task 5 ##
############
echo '<br>===================<br>';

function random(int $length = 6): string
{
  $my_str = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcefghijklmnopqrstuvwxyz';
  $pass = '';
  if ($length >= 6) {
    for ($i = 0; $i < $length; $i++) {
      $rand = mt_rand(0, strlen($my_str) - 1);
      $pass .= $my_str[$rand];
    }
    return $pass;
  } else {
    return 'The minimum number of letters is 6';
  }
}

# min 6 letters
echo random(12);

############
## task 6 ##
############
echo '<br>===================<br>';

function p_nums(int $number): string
{
  $string = '';
  if ($number >= 1) {
    for ($i = 1; $i <= $number; $i++) {
      $string .= $i . '<br>';
    }
  }
  return $string;
}

echo p_nums(10);
