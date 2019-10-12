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
$key = rand(1, 25);
$word = $words[rand(0,count($words)-1)];
$cryptedWord = crypting($word, $key);


if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $cryptedMessage = $_GET['cryptedWord'] . ' ';
    $playerDecryption = $_GET['decryption'] . ' ';
    if(trim($_GET['decryption']) === decrypting(trim($_GET['cryptedWord']), (int)$_GET['cryptedKey'])) {
        $count = (int)$_GET['count']+1;
        ?>
        <p>Tu es sur la bonne voie</p>
        <?php
    }else {
        $count = (int)$_GET['count'];
        ?>
        <p>Tu es encore loin</p>
    <?php } ?>

    <p>Le second message est: <?= $cryptedWord ?> </p>
    <p>L'indice est: <?= $key ?> </p>

    <form action="message3.php" method="GET">
        <label for="decryption">Quel est le message secret:</label>
        <input type="text" id="decryption" name="decryption" REQUIRED>
        <input name="cryptedWord" type="hidden" value="<?= $cryptedWord ?> "/>
        <input name="cryptedKey" type="hidden" value="<?= $key ?> "/>
        <input name="cryptedMessage" type="hidden" value="<?= $cryptedMessage ?> "/>
        <input name="playerDecryption" type="hidden" value="<?= $playerDecryption ?> "/>
        <input name="count" type="hidden" value="<?= $count ?> "/>
        <button>Valider</button>
    </form>

<?php
}

?>

</body>
</html>