<?php
  /*
  ENPLATED EMAIL v1.1 by Karel Cermak (info@karlosoft.com)
  WEBSITE: https://enplated.karlosoft.com/email/
  DOCUMENTATION: https://enplated.karlosoft.com/email/docs
  LICENSE: https://enplated.karlosoft.com/email/license
  */

  class EM {
    private $debugAllow = false;
    private $tableActive = false;
    public $html = "";

    function init($bodyColor, $backgroundColor) {
      $this->debugMessage("EM debug: Interface initialization");

      $this->html = <<<HTML
        <!DOCTYPE html>
        <html>
        <head>
          <meta charset='utf-8'>
          <meta http-equiv='Content-Type' content='text/html charset=UTF-8'>
          <title>Email</title>
          <meta name='viewport' content='width=device-width, initial-scale=1'>
        </head>
        <body style='margin: 0px;'>
          <style type='text/css'>
            @media (min-width: 767px) {
              .fullBody {
                background-color: $backgroundColor;
                padding: 50px 0px;
              }
            }
          </style>
          <style type='text/css'>
            .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td {line-height: 100%;}
            .ExternalClass {width: 100%;}
          </style>
            <table border='0' width='100%' cellspacing='0' cellpadding='0' style='margin: 0px; padding: 0px; border-collapse: collapse;' class='fullBody'>
            <tbody><tr><td width='100%' align='center'><table border='0' cellspacing='0' cellpadding='0' align='center' style='border-collapse:collapse'><tbody><tr><td width='600' align='center' style='background-color: $bodyColor; height: auto; border-radius: 25px; text-align: center; padding: 50px 2%;' bgcolor='$bodyColor'><table border='0' cellspacing='0' cellpadding='0' align='center' style='border-collapse:collapse;max-width:420px;margin:0 auto'><tbody><tr>
      HTML;
    }

    function finish($allowInfo, $font, $color, $linkColor) {
      $this->debugMessage("EM debug: Interface processing completed");

      if ($allowInfo) {
        $this->html .= <<<HTML
          <p style="font-family: $font; color: $color;font-size:0.8em;">Generated with Enplated Email. Email looks broken? Please report any errors <a href="https://enplated.karlosoft.com/email/report" target='_blank' style='color: $linkColor;'>here</a>.
          </p></tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table></body></html>
        HTML;

      } else {
        $this->html .= <<<HTML
          </tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table></body></html>
        HTML;
      }

      return $this->html;
    }

    function createRow() {
      $this->debugMessage("EM debug: Created new row");
      $this->tableActive = true;

      $this->html .= <<<HTML
        <table border='0' cellspacing='0' cellpadding='10' align='center' style='text-align: center;'><tr>
      HTML;
    }

    function finishRow() {
      $this->debugMessage("EM debug: Row finished");
      $this->tableActive = false;

      $this->html .= <<<HTML
        </tr></table>
      HTML;
    }

    function createLogo($link) {
      $this->debugMessage("EM debug: Creating new logo");

      if ($this->tableActive) {
        $this->debugMessage("EM row info: Currently generating with row settings");
        $this->html .= <<<HTML
          <td><img src='$link' style='margin: 20px; height: 90px;' height='90'></td>
        HTML;

      } else {
        $this->html .= <<<HTML
          <img src='$link' style='margin: 20px; height: 90px;' height='90'>
        HTML;
      }
    }

    function createText($element, $text, $font, $color) {
      $this->debugMessage("EM debug: Creating new text");

      if ($this->tableActive) {
        $this->debugMessage("EM row info: Currently generating with row settings");
        $this->html .= <<<HTML
          <td><$element style="font-family: $font; color: $color;margin:0px">$text</$element></td>
        HTML;

      } else {
        $this->html .= <<<HTML
          <$element style="font-family: $font; color: $color;margin:0px">$text</$element>
        HTML;
      }
    }

    function createLink($link, $preText, $linkText, $postText, $font, $textColor, $linkColor) {
      $this->debugMessage("EM debug: Creating new link");

      if ($this->tableActive) {
        $this->debugMessage("EM row info: Currently generating with row settings");
        $this->html .= <<<HTML
          <td><p style="font-family: $font; color: $textColor;">$preText<a href='$link' target='_blank' style='color: $linkColor;'>$linkText</a>$postText</p><td>
        HTML;

      } else {
        $this->html .= <<<HTML
          <p style="font-family: $font; color: $textColor;">$preText<a href='$link' target='_blank' style='color: $linkColor;'>$linkText</a>$postText</p>
        HTML;
      }
    }

    function createButton($link, $text, $font, $textColor, $buttonColor) {
      $this->debugMessage("EM debug: Creating new button");

      if ($this->tableActive) {
        $this->debugMessage("EM row info: Currently generating with row settings");
        $this->html .= <<<HTML
          <td><p style='margin: 50px 0px;'><a href='$link' target='_blank' style="background-color: $buttonColor; padding: 20px 50px; border-radius: 25px; text-decoration: none; font-size: 1.4em; color: $textColor; font-family: $font;">$text</a></p></td>
        HTML;

      } else {
        $this->html .= <<<HTML
          <p style='margin: 50px 0px;'><a href='$link' target='_blank' style="background-color: $buttonColor; padding: 20px 50px; border-radius: 25px; text-decoration: none; font-size: 1.4em; color: $textColor; font-family: $font;">$text</a></p>
        HTML;
      }
    }

    function createSpace($spaceSize, $backgroundColor) {
      $this->debugMessage("EM debug: Creating new space");
      $spaceSize .="px";

      if ($this->tableActive) {
        $this->debugMessage("EM row info: Currently generating with row settings");
        $this->html .= <<<HTML
          <td><p style="padding-bottom: $spaceSize; background-color: $backgroundColor;margin:0px;font-size:0em;">&#10240;</p></td>
        HTML;

      } else {
        $this->html .= <<<HTML
          <p style="padding-bottom: $spaceSize; background-color: $backgroundColor;margin:0px;font-size:0em;">&#10240;</p>
        HTML;
      }
    }

    function createSeparator($borderColor, $borderSize) {
      $this->debugMessage("EM debug: Creating new separator");
      $borderSize .= "px";

      if ($this->tableActive) {
        $this->debugMessage("EM row info: Currently generating with row settings");
        $this->html .= <<<HTML
          <td><hr style='width: 96%; border: $borderSize solid $borderColor; margin: 10px 0px;background-color: $borderColor;'></td>
        HTML;

      } else {
        $this->html .= <<<HTML
          <hr style='width: 96%; border: $borderSize solid $borderColor; margin: 10px 0px;background-color: $borderColor;'>
        HTML;
      }
    }

    // DEBUG FUNCTIONS
    function debugAllow() {
      $this->debugAllow = true;
    }

    function debugDisable() {
      $this->debugAllow = false;
    }

    function debugMessage($message) {
      if ($this->debugAllow) {
        echo $message . "<br>";
      }
    }
  }
?>