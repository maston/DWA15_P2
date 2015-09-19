<?php
// set up arrays of words and symbols
$words = Array('chair', 'two', 'window', 'cords', 'musical', 'zebra', 'xylophone', 'penguin', 'home', 'dog', 'final', 'ink', 'teacher', 'fun', 'website', 'banana', 'uncle', 'softly', 'mega', 'ten', 'awesome', 'attach', 'blue');
$symbols = Array('$', '#', '&', '*', '^', '@', '%');

// get password length from user settings
$pwd_length = $_POST['num_words'];

// get first word for password
$first_word = array_rand($words);
$pwd = $words[$first_word];

// enter loop to build the password concatenating each word
// the iterator starts at 1 because we have already burned a word above
for ($i=1; $i<$pwd_length; $i++) {
  $pwd .= '-';  // concat hyphen to password
  $next_word = array_rand($words);  // get next word for password
  $pwd .= $words[$next_word];  // concat next word to password
}

// if adding a number was selected we add one from the range 1 to 100
if ($_POST['add_number']==true) {
  $pwd .= rand(1, 100);
}

// if adding a symbol was selected we add one from $symbols array
if ($_POST['add_number']==true) {
  $get_symbol = array_rand($symbols);
  $pwd .= $symbols[$get_symbol];
}

?>
