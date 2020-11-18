<?php

//php validation on server side
$error = "";
$successMessage = "";
if ($_POST) {

    if (!$_POST['nameF']) {
        $error .= "First name field is required.<br>";
    }

    if (!$_POST['nameL']) {
        $error .= "Last name field is required.<br>";
    }

    if (!$_POST['email']) {
        $error .= "An email address is required.<br>";
    }

    if (!$_POST['phone']) {
        $error .= "A phone number is required.<br>";
    }

    if (!$_POST['address']) {
        $error .= "An address is required.<br>";
    }

    if (!$_POST['textfield']) {
        $error .= "A message is required.<br>";
    }

    if ($_POST['email'] && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) === false) { // if there is no email and if filter is false - not valid
        $error .= "The email address is invalid. <br>";
    }

    if ($error != "") {
        $error = '<div class="alert alert-danger" role="alert"><p><strong>There were error(s) in your form:</strong></p>' . $error . '</div>';
    } else {
        $to      = "j.necesanek@hotmail.com";
        $subject = "Vodex";

        $nameF = $_POST['nameF'];
        $nameL = $_POST['nameL'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $textField = $_POST['textfield'];

        $message = "Jmeno a prijmeni: " . $nameF . ", Tel.cislo: " . $phone . ", Adresa: " . $address . ", Zprava: " . $textField;

        $headers = 'From: ' . $_POST['email'] . "\r\n" .
            'Reply-To: ' . $_POST['email'] . "\r\n" .
            'X-Mailer: PHP/' . phpversion();

        if (mail($to, $subject, $message, $headers)) {
            $successMessage = '<div class="alert alert-success" role="alert">Your message has been sent!</div>';
        } else {
            $error = '<div class="alert alert-danger" role="alert"><p><strong>Could not send out the form!</strong></p></div>';
        }
    }
}


?>



<!DOCTYPE html>
<html lang="cs-cz">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
    <title>Vodex-Kontakt</title>
</head>

<body>
    <nav class="navbar navbar-expand-md navbar-fixed-top navbar-light bg-light">

        <div class="container">
            <a class="navbar-brand" href="index.html"><img src="images/logo.png" alt="" id="logo-header"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <div class="name-header">
                        <a href="index.html" id="name-company">ING. JANA NEČESÁNKOVÁ</a>
                        <hr>
                        <a href="index.html" id="header-subtitle">Plánování - realizace - udržitelný rozvoj</a>
                    </div>

                    <li class="nav-item">
                        <a class="nav-link" href="index.html">Úvod<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Činnosti
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="cinnosti.html#povoden">Povodňové plány</a>
                            <a class="dropdown-item" href="cinnosti.html#havarijni">Havarijní plány</a>
                            <a class="dropdown-item" href="cinnosti.html#sucho">Problematika sucha</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="profil.html">Profesní profil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="reference.html">Reference</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="kontakt.php">Kontakt</a>
                    </li>

                </ul>
            </div>

        </div>
    </nav>
    <div class="main-page">


        <div class="introduction2">
            <div class="container">
                <h1>Kontaktní formulář</h1>
                <hr class="hr-title">
            </div>
        </div>
        <div class="container">
            <div id="error">
                <? echo $error.$successMessage; ?>
            </div>
            <form id="contact-form" method="POST">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="nameF">Jméno</label>
                        <input type="text" class="form-control" id="nameF" name="nameF">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="nameL">Příjmení</label>
                        <input type="text" class="form-control" id="nameL" name="nameL">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="phone">Telefon</label>
                        <input type="tel" class="form-control" id="phone" name="phone">
                    </div>
                </div>
                <div class="form-group">
                    <label for="address">Adresa</label>
                    <input type="text" class="form-control" id="address" name="address">
                </div>
                <div class="form-group">
                    <label for="textarea-field">Zde napište zprávu</label>
                    <textarea class="form-control" id="textarea-field" rows="6" style="resize:none" name="textfield"></textarea>
                </div>
                <button type="submit" class="button">Odeslat</button>
            </form>
        </div>
        <footer>
            <div class="contact">
                <div class="container">
                    <h3>Kontakt</h3>
                    <hr>
                    <span>Ing. Jana Nečesánková</span>
                    <div class="icons">
                        <div><img src="images/icons/tel-icon.png" alt="vodex-telefon">+420 739 592 991</div>
                        <div><img src="images/icons/map-icon.png" alt="vodex-adresa">Jižní 588, Smržice, 79817</div>
                        <div><img src="images/icons/email-icon.png" alt="vodex-email">necesankova.vh@gmail.com</div>
                    </div>
                </div>
            </div>
            <div class="copyright">
                <div class="container">
                    © 2019 Ing. Jana Nečesánková, IČ 05309565, Vodex.cz
                </div>
            </div>
        </footer>

    </div>





    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
    </script>
    <script src="parallax/parallax.js"></script>
</body>

</html>