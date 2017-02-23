<?php

require('Form.php');
require('tools.php');

# Create instance of the Form object
$form = new DWA\Form($_GET);

if($form->isSubmitted()) {

    $errors = $form->validate(['phraseToAnagram' => 'required|alpha']); // validate text field

    $phraseToAnagram = $form->get('phraseToAnagram', $default = ''); // get phrase to anagram from user-submitted form
    $sanitizedPhrase = sanitize($phraseToAnagram); // sanitize input
    $arrayOfInputString = str_split($sanitizedPhrase); // convert input to an array
    shuffle($arrayOfInputString); // shuffle the array, thus creating an anagram
    $outputString = implode($arrayOfInputString); // convert array back to a string

    // Convert case or leave case as is, depending on what user chose:
    if($_GET['case']=='lower') {
        $outputString = strtolower($outputString);
        $radio1='checked';
        $radio2='';
        $radio3='';
    }
    else if($_GET['case']=='upper') {
        $outputString = strtoupper($outputString);
        $radio1='';
        $radio2='checked';
        $radio3='';
    }
    else if($_GET['case']=='keep') { // keep case as is
        $radio1='';
        $radio2='';
        $radio3='checked';
    }

    // Strip blanks from output if user wants this done:
    if(isset($_GET['removeBlanks'])) {
        if($_GET['removeBlanks']=='yes') { // blanks should be removed
            $checkbox1 = 'checked';
            $outputString = str_replace(' ', '', $outputString);
        }
        else {
            $checkbox1='';
        }
    }
    else {
        $checkbox1='';
    }

    $shuffledString = "Anagram: " . $outputString;

    if($errors) {
        $shuffledString = ''; 
    } // if error in text field, don't show an anagram, but retain user's form choices.

}
else { // Form was NOT submitted

    $shuffledString = " ";
    $radio1 = 'checked';
    $radio2='';
    $radio3='';
    $checkbox1 = 'checked';
    $errors = '';
}

# closing PHP tag intentionally omitted