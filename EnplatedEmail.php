<?php
    class EM {
        private $debugAllow = false;
        private $tableActive = false;

        function init($bodyColor, $backgroundColor) {
          $this->debugMessage("EM debug: Interface initialization");
            return <<<HTML
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
                    <tbody>
                        <tr>
                            <td width='100%' align='center'>
                                <table border='0' cellspacing='0' cellpadding='0' align='center' style='border-collapse:collapse'>
                                    <tbody>
                                        <tr>
                                            <td width='600' align='center' class='content' style='background-color: $bodyColor; height: auto; border-radius: 25px; text-align: center; padding: 50px 2%;' bgcolor='$bodyColor'>
                                                <table border='0' cellspacing='0' cellpadding='0' align='center' style='border-collapse:collapse;max-width:420px;margin:0 auto'>
                                                    <tbody>
                                                        <tr>
            HTML;
        }

        function finish($html, $allowInfo, $font, $color, $linkColor) {
          $this->debugMessage("EM debug: Interface processing completed");
          if ($allowInfo == true) {
            return <<<HTML
            $html
                                    <p style="font-family: $font; color: $color;font-size:0.8em;">Generated with Enplated Email. Email looks broken? Please report any errors <a href="https://enplated-email.k-cermak.com/report" target='_blank' style='color: $linkColor;'>here</a>.</p>
                                    </tr>
                                  </tbody>
                                </table>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </body>
            </html>
            HTML;
          } else {
            return <<<HTML
              $html
                                    </tr>
                                  </tbody>
                                </table>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </body>
            </html>
            HTML;
          }
        }

        function createRow($html) {
          $this->debugMessage("EM debug: Created new row");
          $this->tableActive = true;
          return <<<HTML
          $html
          <table border='0' cellspacing='10' cellpadding='10' align='center' class='row' style='text-align: center;'>
            <tr>
          HTML;
        }

        function finishRow($html) {
          $this->debugMessage("EM debug: Row finished");
          $this->tableActive = false;
          return <<<HTML
          $html
            </tr>
          </table>
          HTML;
        }


        function createLogo($html, $link) {
          $this->debugMessage("EM debug: Creating new logo");
          if ($this->tableActive == true) {
            $this->debugMessage("EM row info: Currently generating with row settings");
            return <<<HTML
              $html
              <td><img src='$link' style='margin: 20px; height: 70px;' height='70'></td>
              HTML;
          } else {
            return <<<HTML
              $html
              <img src='$link' style='margin: 20px; height: 70px;' height='70'>
              HTML;
          }
        }

        function createText($html, $element, $text, $font, $color) {
          $this->debugMessage("EM debug: Creating new text");
          if ($this->tableActive == true) {
            $this->debugMessage("EM row info: Currently generating with row settings");
            return <<<HTML
              $html
              <td><$element style="font-family: $font; color: $color;">$text</$element></td>
              HTML;
            } else {
              return <<<HTML
              $html
              <$element style="font-family: $font; color: $color;">$text</$element>
              HTML;
            }
        }

        function createLink($html, $link, $preText, $linkText, $postText, $font, $textColor, $linkColor) {
          $this->debugMessage("EM debug: Creating new link");
          if ($this->tableActive == true) {
            $this->debugMessage("EM row info: Currently generating with row settings");
            return <<<HTML
              $html
              <td><p style="font-family: $font; color: $textColor;">$preText<a href='$link' target='_blank' style='color: $linkColor;'>$linkText</a>$postText</p><td>
              HTML;
          } else {
            return <<<HTML
              $html
              <p style="font-family: $font; color: $textColor;">$preText<a href='$link' target='_blank' style='color: $linkColor;'>$linkText</a>$postText</p>
              HTML;
          }
        }

        function createButton($html, $link, $text, $font, $textColor, $buttonColor) {
          $this->debugMessage("EM debug: Creating new button");
          if ($this->tableActive == true) {
            $this->debugMessage("EM row info: Currently generating with row settings");
            return <<<HTML
              $html
              <td><p style='margin: 50px 0px;'><a href='$link' target='_blank' style="background-color: $buttonColor; padding: 20px 50px; border-radius: 25px; text-decoration: none; font-size: 1.4em; color: $textColor; font-family: $font;">$text</a></p></td>
              HTML;
          } else {
            return <<<HTML
              $html
              <p style='margin: 50px 0px;'><a href='$link' target='_blank' style="background-color: $buttonColor; padding: 20px 50px; border-radius: 25px; text-decoration: none; font-size: 1.4em; color: $textColor; font-family: $font;">$text</a></p>
              HTML;
          }
        }

        function createSpace($html, $spaceSize, $backgroundColor) {
          $this->debugMessage("EM debug: Creating new space");
          $spaceSize .="px";
          if ($spaceSize == 10 || $spaceSize == 25 || $spaceSize == 75 || $spaceSize == 100 || $spaceSize == 200 || $spaceSize == 250) {
            $this->debugMessage("EM space info: Space size ok");
            if ($this->tableActive == true) {
              $this->debugMessage("EM row info: Currently generating with row settings");
              return <<<HTML
                $html
                <td><p style="padding-bottom: $spaceSize; background-color: $backgroundColor;">&#10240;</p></td>
                HTML;
            } else {
              return <<<HTML
              $html
              <p style="padding-bottom: $spaceSize; background-color: $backgroundColor;">&#10240;</p>
              HTML;
            }
          } else {
            $this->debugMessage("EM space info: Space not defined correctly, no change made with template");
            return $html;
          }
        }

        function createSeparator($html, $borderColor, $borderSize) {
          $this->debugMessage("EM debug: Creating new separator");
          $borderSize .= "px";
          if ($this->tableActive == true) {
            $this->debugMessage("EM row info: Currently generating with row settings");
            return <<<HTML
            $html
            <td><hr style='width: 96%; border: $borderSize solid $borderColor; margin: 10px 0px;background-color: $borderColor;'></td>
            HTML;
          } else {
            return <<<HTML
            $html
            <hr style='width: 96%; border: $borderSize solid $borderColor; margin: 10px 0px;background-color: $borderColor;'>
            HTML;
          }
        }


        function debugAllow() {
          $this->debugAllow = true;
        }

        function debugDisable() {
          $this->debugAllow = false;
        }

        function debugMessage($message) {
          if ($this->debugAllow == true) {
            echo $message . "<br>";
          }
        }
    }
?>