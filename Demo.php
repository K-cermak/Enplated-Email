<?php
    /*
    ENPLATED EMAIL v1.1 by Karel Cermak (info@karlosoft.com)
    WEBSITE: https://enplated.karlosoft.com/email/
    DOCUMENTATION: https://enplated.karlosoft.com/email/docs
    LICENSE: https://enplated.karlosoft.com/email/license
    */

    require_once 'EnplatedEmail.php';
    $EM = new EM;

    $EM->init("#707070","#bfbfbf");
    $EM->createLogo("https://cdn.karlosoft.com/cdn-data/ks/img/main/ks-main-white.png");
    $EM->createSpace(30, "#707070");

    $username = "Christine Carter";
    $EM->createText("h2", "Hi " . $username . ",", "'Montserrat', sans-serif", "#ffffff");
    $EM->createLink("https://example.com", "Your registration on ", "example.com", " has been almost finished.", "'Montserrat', sans-serif", "#ffffff", "#003f70");
    $EM->createSpace(50, "#707070");

    $EM->createText("h4", "Please complete your registration on link below:", "'Montserrat', sans-serif", "#ffffff");
    $EM->createButton("https://example.com/registry-confirm", "Click to confirm", "'Montserrat', sans-serif", "#ffffff", "#003f70");

    $EM->createSpace(30, "#707070");
    $EM->createSeparator("#919191", 0.5);

    $EM->createText("p", "Follow us on:", "'Montserrat', sans-serif", "#ffffff");

    $EM->createRow();
    $EM->createLink("https://instagram.com", "", "Instagram", "", "'Montserrat', sans-serif", "#ffffff", "#003f70");
    $EM->createLink("https://twitter.com", "", "X (Twitter)", "", "'Montserrat', sans-serif", "#ffffff", "#003f70");
    $EM->finishRow();

    $emailForm = $EM->finish(true, "'Montserrat', sans-serif", "#ffffff","#003f70");

    echo $emailForm;
    //mail("name@example.com", "Example emailForm", $emailForm); //would send an e-mail
?>