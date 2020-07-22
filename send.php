<?php

require_once 'sms.php';

$csv = htmlspecialchars(trim($_POST['csv']));
$text = htmlspecialchars(trim($_POST['text']));
$translitHidden = htmlspecialchars(trim($_POST['translitHidden']));
$postpone = intval(htmlspecialchars(trim($_POST['postponeHidden'])));

$translit = false;

if($translitHidden === 'true') {
    $translit = true;
}

send_mult('79514762444', 'Hello\nворлд!', $postpone, $translit);

?>