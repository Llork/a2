<?php require('generateAnagrams.php'); ?>

<!DOCTYPE html>
<html>
<head>
<title>David Kroll - DWA15 Assignment 2</title>
<meta charset='utf-8'>
<link type="text/css" rel="stylesheet" href="css/styles.css">
</head>
<body>

<div class="container">

<h2>Anagram Generator</h2>

<p>Click the submit button as often as you'd like, to see different ways to rearrange the letters.</p>

<form method="GET" action="index.php">

<label for='phraseToAnagram'>Word or phrase to anagram (required):</label>
<input type='text' size="50" name='phraseToAnagram' id='phraseToAnagram' value='<?=$form->prefill('phraseToAnagram')?>'><br><br>

<fieldset class='radios'>
    <legend>Case</legend>
    <label><input type='radio' name='case' value='lower' <?=$radio1?> > Convert to lower case &#160;&#160;</label>
    <label><input type='radio' name='case' value='upper' <?=$radio2?> > Convert to upper case &#160;&#160;</label>
    <label><input type='radio' name='case' value='keep'  <?=$radio3?> > Leave as is</label>
</fieldset><br>

<label><input type='checkbox' name='removeBlanks' value='yes' <?=$checkbox1?> > Remove blanks from output</label><br><br>

<input type="submit"><br><br>

</form>

<div class="output_area">
    <?=$shuffledString?>
    <?php if($errors): ?>
        <?php foreach($errors as $error): ?>
            <?=$error?><br>
        <?php endforeach; ?>
    <?php endif; ?>
</div>

</div>