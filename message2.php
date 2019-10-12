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
        <p>
            1 - D’où partons-nous ?


            Tu viens de connecter sur (titre du site). Tu as raison. Tu n’y es pas arrivé par hasard. Tu t’interroges. Et ta soif de question t’as conduit jusqu’ici parce que tu cherches des réponses : qui sommes-nous? Où allons-nous, que faisons-nous… ? La vérité est-elle ailleurs ?

            Oui, elle l’est. Mais peut-être pas si éloignée.,Parce qu’en répondant aux questions qui vont suivre, tu vas comprendre que nous ne sommes pas seuls dans l’univers. Tu en veux la preuve ?

            Une première question avant de poursuivre :

            D’où vient-tu, toi qui veux percer le mystère universel... ?
        </p>
    </div>
    <h2>Sauriez-vous décrypter ce message</h2>

<?php

require "src/functions.php";

$words = ['HELLO', 'HUMAN', 'WELCOME', 'CONGRATULATION', 'MARS', 'SPACESHIP', 'GALAXY', 'SPACE', 'STELLAR', 'PARTY', 'ALIEN', 'TRAVEL'];

if (empty($_GET)) {
    header("Location: message.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $cryptedMessage = $_GET['cryptedWord'] . ' ';
    $playerDecryption = $_GET['decryption'] . ' ';
    $key = (int)$_GET['cryptedKey'];
    $word = $words[rand(0,count($words)-1)];
    $cryptedWord = crypting($word, $key);
    if (strtoupper(trim($_GET['decryption'])) === decrypting(trim($_GET['cryptedWord']), (int)$_GET['cryptedKey'])) {
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
