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

$words = ['HELLO', 'HUMAN', 'WELCOME', 'CONGRATULATION', 'MARS', 'SPACESHIP', 'GALAXY', 'SPACE', 'STELLAR', 'PARTY', 'ALIEN', 'TRAVEL'];



if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $cryptedMessage = $_GET['cryptedMessage'] . $_GET['cryptedWord'] . ' ';
    $playerDecryption = $_GET['playerDecryption'] . $_GET['decryption'] . ' ';
    $key = $_GET['cryptedKey'];
    $word = $words[rand(0,count($words)-1)];
    $cryptedWord = crypting($word, $key);
    if(trim($_GET['decryption']) === decrypting(trim($_GET['cryptedWord']), (int)$_GET['cryptedKey'])) {
        $count = (int)$_GET['count']+1;
        ?>
        <p>Tu es très proche</p>
        <?php
    }else {
        $count = (int)$_GET['count'];
        ?>
        <p>Tu es complètement perdu</p>
    <?php } ?>

    <p>Le dernier message est: <?= $cryptedWord ?> </p>
    <p>L'indice est: <?= $key ?> </p>

    <form action="final.php" method="GET">
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
