<?php


if ($_SERVER['REQUEST_METHOD'] === 'POST') {


    $data = array_map('trim', $_POST);

    $errors = [];
    if (empty($data['pilule'])) {
        $errors['pilule1'][] = 'Le champ ne doit pas etre vide';
    }
    if($data['pilule'] > 255) {
        $errors['pilule1'][] = 'Le champ ne doit pas depasser 255 caractères';
    }
    if (empty($errors)) {
        header('Location: message.php?success=ok');
        exit();
    }

}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="styleend.css">
    <title>Continue</title>
</head>
<body>

    <h1>La vérité est ailleurs... </h1>

    <p>Puisque tu prolonges ta visite, nous nous devons d’être honnête avec toi...</p>
    <p>Ici, tu vas avoir la certitude que les extra-terrestres existent bel et bien…</p>
    <p>Prêt ? Oui ou non ? La pilule bleue ou la rouge... ?</p>

    <form action="" method="post">
        <div>
            <label for="pilule"></label>
            <input class="champ" type="text"  size=15 name="pilule" required value="<?php if(isset($_POST['pilule'])) echo $_POST['pilule']; ?>" />
            <p><?php if(isset($errors['pilule1'])) echo $errors['pilule1']; ?></p>
        </div>
        <div class="button">
            <button class="repo" type="submit">Send the message</button>
        </div>


    </form>

</body>
</html>
