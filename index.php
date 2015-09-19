<?php
error_reporting(E_ALL); # Report errors/warnings/notices encountered
ini_set('display_errors', 1); # display errors on page
?>

<!DOCTYPE html>
<html>
<head>
	<title>Maston's xkcd password generator</title>
  <meta charset="utf-8">
	<meta name="author" content="Sarah Maston">
	<meta name="description" content="CSCI E-15 - Dynamic Web Applications - Project Two - xkcd password generator">
	<!-- stylesheets: bootstrap and site -->
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
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
  <h1>Maston's xkcd password generator</h1>
</header>

<!--  begin main content for index.html -->
<main>

<section class="row">
  <div class="col-md-12 intro-section">
    <p class="intro-copy">
      Welcome to Maston's xkcd password generator.<br>
      This app will generate a <a href="http://xkcd.com/936/">xkcd styled password</a> for you.<br>
      All you need to do is pick the word count and pick your options.<br>
      Enjoy!
    </p>
  </div>

  <section class="row">
      <div class="col-md-3 create-password-section">
    <h3>Create your password:</h3>
    <form method="POST" action="index.php" id="password-form">
      <label for="txt-num-words">Enter # of words:</lable>
      <input type="number" name="num_words" id="txt-num-words" min="1" max="10"><br>

      <label for="chk-add-number">Add a number?</lable>
      <input type="checkbox" name="add_number" id="chk-add-number"><br>

      <label for="chk-add-symbol">Add a symbol?</lable>
      <input type="checkbox" name="add_symbol" id="chk-add-symbol"><br>

      <input type="submit" value="I can haz password, plz?">
    </form>
    </div>
    <div class="col-md-9 the-password-output-section">
        <h3>Your password is:</h3>
        <p><?php echo $pwd ?></p>
    </div>

  </section>


<!--  begin row for about section  -->
  <section class="row">
<!--  begin section for about  -->
  <div class="col-md-9 about-section">
      <a href="http://xkcd.com/936/"><img border="0" alt="xkcd password strength explained" src="img/password_strength.png"></a>
  </div>
<!--  end section for about  -->
  </section>
<!--  end row for about section  -->



</body>
</html>
