<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>

<h1>Sauriez-vous décrypter ce message</h1>

<?php

require "src/functions.php";

$words = ['HELLO', 'HUMAN', 'WELCOME', 'CONGRATULATION'];
$key = rand(1, 26);
$word = $words[rand(0,count($words)-1)];
$cryptedWord = crypting($word, $key);

?>

<p>Le message secret est: <?= $cryptedWord ?> </p>
<p>L'indice est: <?= $key ?> </p>

<form action="message2.php" method="GET">
    <label for="decryption">Quel est le message secret:</label>
    <input type="text" id="decryption" name="decryption" REQUIRED>
    <input name="cryptedWord" type="hidden" value="<?= $cryptedWord ?> "/>
    <input name="cryptedKey" type="hidden" value="<?= $key ?> "/>
    <button>Valider</button>

</form>

</body>
</html>
