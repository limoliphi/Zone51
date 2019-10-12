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

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (trim($_GET['decryption']) === decrypting(trim($_GET['cryptedWord']), (int)$_GET['cryptedKey'])) {
        ?>
        <p>Victoire</p>
        <?php
    } else {
        ?>
        <p>Défaite</p>
    <?php }
}?>

</body>
</html>
