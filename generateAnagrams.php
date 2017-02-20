<?php

require('Form.php');
require('tools.php');

# Create instance of the Form object
$form = new DWA\Form($_GET);

if($form->isSubmitted()) {

    $phraseToAnagram = $form->get('phraseToAnagram', $default = '');
    $sanitizedPhrase = sanitize($phraseToAnagram);
    $arrayOfInputString = str_split($sanitizedPhrase);
    shuffle($arrayOfInputString);
    $outputString = implode($arrayOfInputString);

    if($_GET['case']=='lower') {
        $outputString = strtolower($outputString);
        $radio1='checked'; $radio2=''; $radio3=''; }
    else if($_GET['case']=='upper') {
        $outputString = strtoupper($outputString);
        $radio1=''; $radio2='checked'; $radio3=''; }
    else if($_GET['case']=='keep') { // keep case as is
              $radio1=''; $radio2=''; $radio3='checked'; }

    $shuffledString = "Anagram: " . $outputString;
}
else { // Form was NOT submitted

    $shuffledString = " ";
    $radio1='checked'; $radio2=''; $radio3='';
}

# closing PHP tag intentionally omitted