<?php
error_reporting(E_ALL); # Report errors/warnings/notices encountered
// ini_set('display_errors', 1); # display errors on page
?>

<!DOCTYPE html>
<html>
<head>
	<title>Maston's xkcd Password Generator</title>
  <meta charset="utf-8">
	<meta name="author" content="Sarah Maston">
	<meta name="description" content="CSCI E-15 - Dynamic Web Applications - Project Two - xkcd password generator">
	<!-- stylesheets: bootstrap, lavish-bootstrap theme and site -->
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/lavish-bootstrap.css">
	<link rel="stylesheet" href="css/site.css">
  <!-- PHP require statment -->
	<?php
	   require('logic.php');
	?>
</head>

<body>
<!-- begin bootstrap container -->
<div class="container">

<header class="row">
  <h1>Maston's xkcd Password Generator</h1>
  <p class="intro-copy">
    Welcome to Maston's xkcd password generator.<br>
    This app will generate a <a href="http://xkcd.com/936/">xkcd styled password</a> for you.<br>
    All you need to do is pick the word count and pick your options.<br>
    And Voila! A password will be generated for you with random words.<br>
    Enjoy!
  </p>
</header>

<!--  begin main content for index.html -->
<main>

  <section class="row password-section">
      <div class="col-md-12 create-password">
    <form method="POST" action="index.php" id="password-form">
      <h3>Create Your Password</h3>
      <fieldset>
        <legend>Basic Structure:</legend>
          <label for="txt-num-words">Enter # of words (1 to 9):</lable>
            <input type="number" name="num_words" id="txt-num-words" min="1" max="9" maxlength="1"><br>

          <label for="chk-add-number">Add a number?</lable>
            <input type="checkbox" name="add_number" id="chk-add-number"><br>

          <label for="chk-add-symbol">Add a symbol?</lable>
            <input type="checkbox" name="add_symbol" id="chk-add-symbol"><br>
      </fieldset>
      <fieldset>
        <legend>Enhanced Options (Optional):</legend>
          <input type="radio" name="options_type" value="upper" id="radio-uppercase">
          <label for="radio-uppercase">Uppercase</label><br>
          <input type="radio" name="options_type" value="lower" id="radio-lowercase">
          <label for="radio-lowercase">Lowercase</label><br>
          <input type="radio" name="options_type" value="first_letter" id="radio-firstletter">
          <label for="radio-firstletter">First Letters Uppercase</label><br>
          <input type="radio" name="options_type" value="special_symbols" id="radio-symbol">
          <label for="radio-symbol">Special Symbols for Letters</label><br>

      </fieldset>
      <input type="submit" value="I can haz password, plz?" id="param-submit-button">


    </form>
    </div>
    <div class="col-md-12 the-password-output">
        <h3>Your password is:</h3>
        <p class=<?= $pwd_text_class?>><?php echo $pwd ?></p>
    </div>

  </section>


<!--  begin row for about section  -->
  <section class="row">
<!--  begin section for about  -->
  <div class="col-md-12 about-section">
      <h3>Password Strength</h3>
      <a href="http://xkcd.com/936/"><img border="0" alt="xkcd password strength explained" src="img/password_strength.png"></a>
  </div>
<!--  end section for about  -->
  </section>
<!--  end row for about section  -->



</body>
</html>
