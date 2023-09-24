<?php
echo '<pre>';

// arrays for test
$array = [
  'username' => 'abdalla',
  'password' => '123',
  'email' => 'bodemansour8@gmail.com',
  4
];
$nums = [1, 4, 6, 1];

if (count($array) == 3) {
  echo 'true<br>';
}

if (in_array('123', $array)) {
  echo 'true<br>';
}

if (array_key_exists('username', $array)) {
  echo 'hello ' . $array['username'] . '<br>';
}

print_r(array_keys($array)); // return array has keys as a value
print_r(array_values($array)); // return indexed array
print_r(array_merge($array, $nums)); // return one array has $array & $nums  
print_r(array_replace($array, $nums)); // return one array, replace similar

echo array_sum($nums); // sum all values
echo end($array); // return last element in array or object
echo array_rand($array); // return random key

array_shift($array); // remove in first
array_pop($array); // remove in last
array_unshift($array); // remove add in first
array_push($array); // remove add in last

array_slice($array, 1, 2); // copy from array and change array
array_splice($array, 1, 2); // cut from array and change array
