<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {


    $data = array_map('trim', $_POST);

    $errors = [];
    if (empty($data['answer'])) {
        $errors['answer'][] = 'Le champ ne doit pas etre vide';
    }
    if($data['answer'] > 255) {
        $errors['answer'][] = 'Le champ ne doit pas depasser 255 caractères';
    }
    if (empty($errors)) {
        header('Location: index.php?success=ok');
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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="stylefinal.css">
    <title>Document</title>
</head>
<body>
<html lang="en-US"><head>
    <meta charset="UTF-8">
    <title>MNSTR</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

<h1>Alors c'est quoi ce foutu message des étoiles ? </h1>
    <div class="trip">
        <p>As-tu découvert quel était le message de l'extra-terrestre ?</p>
        <form action="" method="post">
            <div>
                <label for="answer"></label>
                <input type="text" id="answer" name="answer" required value="<?php if(isset($_POST['answer'])) echo $_POST['answer']; ?>" />
                <p><?php if(isset($errors['answer1'])) echo $errors['answer1']; ?></p>
            </div>
            <div class="button">
                <button type="submit">Send the message</button>
            </div>
        </form>
        <p>Tu n'as pas tout décodé ? Rien de grave. Retente ta chance...</p>
    </div>

    <div class="buttonTwo">
        <a class="btn btn-info" href="index.php" class="card-link">Back to homepage</a>
    </div>

    <div id="dude">
        <div class="face">
         <div class="eye">
             <div class="eyelid"></div>
            </div>
            <div class="eye">
                <div class="eyelid"></div>
            </div>
            <div class="mouth"></div>
        </div>
    </div>



</body>
</html>