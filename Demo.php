<?php
    /*
    ENPLATED Email 1.0 by Karel Cermak (info@karlosoft.com)
    WEBSITE: https://enplated.karlosoft.com/email/1.0
    DOCUMENTATION: https://enplated.karlosoft.com/email/1.0/docs
    LICENSE: https://enplated.karlosoft.com/email/1.0/license
    */

    require_once 'EnplatedEmail.php';
    $EM = new EM;

    $emailForm = $EM->init("#707070","#bfbfbf");
    $emailForm = $EM->createLogo($emailForm, "https://mirror.k-cermak.com/data/logo-v3/logo-kcermak-png.png");
    $emailForm = $EM->createSpace($emailForm, 30, "#707070");

    $username = "Christine Carter";
    $emailForm = $EM->createText($emailForm, "h2", "Hi " . $username . ",", "'Ubuntu', sans-serif", "#ffffff");
    $emailForm = $EM->createLink($emailForm, "https://example.com", "Your registration on ", "example.com", " has been almost finished.", "'Ubuntu', sans-serif", "#ffffff", "#003f70");
    $emailForm = $EM->createSpace($emailForm, 50, "#707070");

    $emailForm = $EM->createText($emailForm, "h4", "Please complete your registration on link below:", "'Ubuntu', sans-serif", "#ffffff");
    $emailForm = $EM->createButton($emailForm, "https://example.com/registry-confirm", "Click to confirm", "'Ubuntu', sans-serif", "#ffffff", "#003f70");


    $emailForm = $EM->createSpace($emailForm, 30, "#707070");
    $emailForm = $EM->createSeparator($emailForm, "#919191", 0.5);

    $emailForm = $EM->createText($emailForm, "p", "Follow us on:", "'Ubuntu', sans-serif", "#ffffff");

    $emailForm = $EM->createRow($emailForm);
    $emailForm = $EM->createLink($emailForm, "https://instagram.com", "", "Instagram", "", "'Ubuntu', sans-serif", "#ffffff", "#003f70");
    $emailForm = $EM->createLink($emailForm, "https://twitter.com", "", "Twitter", "", "'Ubuntu', sans-serif", "#ffffff", "#003f70");
    $emailForm = $EM->finishRow($emailForm);



    $emailForm = $EM->finish($emailForm, true, "'Ubuntu', sans-serif", "#ffffff","#003f70");

    echo $emailForm;
    mail("name@example.com", "Example emailForm", $emailForm);
?>