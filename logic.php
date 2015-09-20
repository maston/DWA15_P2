<?php
// Maston's xkcd Password Generator
// DWA15 - P2
// logic.php

//php site vars
$pwd_text_class = 'password-text';

//vars from index.php in $_GET
// num_words -> number of words user wants in a password, 1-9 words
// options_type -> special options added to password;upper/lower/first case or symbols.
// add_number -> checkbox to add a number to end of password
// add_symbol -> checkbox to add a symbol to end of password

// MAIN
if ($_GET['num_words']=='') {
  //if this is first visit or num_words is empty
  $pwd = '(password parameters not set yet)';
  $pwd_text_class = 'password-text-not-set';
}
else {
  //builds the password.
  $pwd = buildPassword($_GET['num_words']);
}

// ****************************
// function: buildPassword
// param: $pwd_length - user entered number of words to be in password
// summary: primary function of app to build the password given user params
// submitted.
// returns: the password
// ****************************
function buildPassword($pwd_length) {
  $words = str_getcsv(file_get_contents('random_words.txt'));
  $symbols = Array('$', '#', '&', '*', '^', '@', '%');

  // get first word for password
  $first_word = array_rand($words);
  $pwd = specialOptions($words[$first_word], $_GET['options_type']);

  for ($i=1; $i<$pwd_length; $i++) {
    $pwd .= '-';  // concat hyphen to password
    $next_word_key = array_rand($words);  // get random key for next word for password
    $pwd .= specialOptions($words[$next_word_key], $_GET['options_type']);  // concat next word to password
  }

  // if adding a number was selected we add one from the range 1 to 100
  if ($_GET['add_number']==true) {
    $pwd .= rand(1, 100);
  }

  // if adding a symbol was selected we add one from $symbols array
  if ($_GET['add_symbol']==true) {
    $get_symbol = array_rand($symbols);
    $pwd .= $symbols[$get_symbol];
  }
  return $pwd;
}

// ****************************
// function: specialOptions
// param: $word - a word to process the passed option on
//        $special_option_value - the option that was selected
// summary: depedning on what option the user has selected this function
// will transform the word to uppercase, lowercase, first letter upper case or
// call changeToSymbols() to replace letters with special symbols.
// returns: transormed word
// ****************************
function specialOptions($word, $special_option_value) {

  if($special_option_value == 'lower') {
    $word = strtolower($word);
  }
  elseif ($special_option_value == 'upper') {
    $word = strtoupper($word);
  }
  elseif ($special_option_value == 'first_letter') {
    $word = ucfirst($word);
  }
  elseif ($special_option_value == 'special_symbols') {
    $word = changeToSymbols($word);
  }
    return $word;
}

// ****************************
// function: changeToSymbols
// param: $word - a word to change to special symbols
// summary: a word with certain letters will be translated into symbols
// where there is a match.
// returns: the new word with symbols
// ****************************
function changeToSymbols ($word) {
  //the symbol array for translation
  $letter_symbol_array = Array('@'=>'a', '3'=>'e', '$'=>'s', '!'=>'l');
  $new_word = '';

  for($i=0; $i<strlen($word); $i++) {

    $symbol = array_search(substr($word, $i, 1), $letter_symbol_array);
    if ($symbol) {
      //if a symbol was found it is added to the new word in place of letter
      $new_word .= $symbol;
    }
    else {
      //else keep the original letter when no symbol found
      $new_word .= substr($word, $i, 1);
    }
  }
  return $new_word;
}


?>
