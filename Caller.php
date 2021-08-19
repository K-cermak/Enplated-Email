<?php
    require_once 'EnplatedEmail.php';
    $EM = new EM;

    $name = "karel";
    $mail = $EM->init("#707070","#222222");
    $mail = $EM->createText($mail, "h2", "<u>Ahoj, registrace je úspěšná</u> " . $name, "'Ubuntu', sans-serif", "red");
    $mail = $EM->createRow($mail);
    $mail = $EM->createLogo($mail, "https://mirror.k-cermak.com/data/logo-v3/favicon-apple.png");
    $mail = $EM->createLogo($mail, "https://mirror.k-cermak.com/data/logo-v3/favicon-apple.png");
    $mail = $EM->createLogo($mail, "https://mirror.k-cermak.com/data/logo-v3/favicon-apple.png");
    $mail = $EM->createLogo($mail, "https://mirror.k-cermak.com/data/logo-v3/favicon-apple.png");
    $mail = $EM->createLogo($mail, "https://mirror.k-cermak.com/data/logo-v3/favicon-apple.png");
    $mail = $EM->finishRow($mail);

    $mail = $EM->createLink($mail, "https://k-cermak.com", "Navštivte naše ", "webové stránky", " a něco.", "'Ubuntu', sans-serif", "orange", "red");
    $mail = $EM->createSeparator($mail, "red", 0.5);
    $mail = $EM->createSpace($mail, 25, "#707070");
    $mail = $EM->createSeparator($mail, "red", 0.5);
    $mail = $EM->createButton($mail, "https://k-cermak.com", "Klikni zde", "'Ubuntu', sans-serif", "red", "blue");
    $mail = $EM->finish($mail, true, "'Ubuntu', sans-serif", "black","red");

    echo $mail;
?>