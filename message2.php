<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <title>Document</title>
</head>

<body>
<header>

    <nav class="header"">
    <h1 class="titleHeader">Welcome to 51 area</h1>
    <div class="logo">
        <img src="image/logo.png" alt="Retour à l'accueil" class="Logo" />
    </div>

    </nav>

</header>

<main class="main">
    <h1 class="titleHeader">Welcome to 51 area</h1>
    <div class="mainImage3">
        <p>


            <img class="image" alt="" title="">
        </p>


    </div>

    <div class="paragraphe">
        <p>Tu as répondu oui : voilà un choix éclairé qui ne sera pas sans conséquence… puisque la vérité va t’être dévoilée. Elle a éclaté l’été dernier, en plein « Storm Area 51 », le rassemblement qui prévoyait d’envahir la zone 51. C’est à ce moment, en plein cœur du Nevada, aux États-Unis, que nous avons découvert ces mots. Ceux d’une langue inconnue sur Terre… Le message venu d’ailleurs a bien été décrypté mais sauras-tu, toi aussi, lire le message des étoiles ?</p>
        <p>Pour t’aider, nous te proposons un petit coup de main avec un indice... </p>

    </div>
    <h2>Deuxième partie du message</h2>

<?php

require "src/functions.php";

$words = ['HELLO', 'HUMAN', 'WELCOME', 'CONGRATULATION', 'MARS', 'SPACESHIP', 'GALAXY', 'SPACE', 'STELLAR', 'PARTY', 'ALIEN', 'TRAVEL'];



if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $cryptedMessage = $_GET['cryptedWord'] . ' ';
    $playerDecryption = $_GET['decryption'] . ' ';
    $key = (int)$_GET['cryptedKey'];
    $word = $words[rand(0,count($words)-1)];
    $cryptedWord = crypting($word, $key);
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
