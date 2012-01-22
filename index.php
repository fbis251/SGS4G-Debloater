<?php
$list = file('apk_list.txt');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
  <head>
    <meta name="generator" content=
    "HTML Tidy for Windows (vers 14 February 2006), see www.w3.org">
    <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
    <title>
      SGS4G Debloater | Team Acid
    </title>
    <link type="text/css" rel="stylesheet" href="css/style.css">
    <meta name="viewport" content=
    "width=device-width, initial-scale=1.0, user-scalable=no">
  </head>
  <body>
    <div class="wrapper ui-widget">
      <div id="header">
        <strong>SGS4G Debloater</strong><br>
        <form action="https://www.paypal.com/cgi-bin/webscr" method="post">
          <input type="hidden" name="cmd" value="_s-xclick">
          <input type="hidden" name="hosted_button_id" value="4DKZJMZ2ALJ7L">
          <input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
          <img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
        </form>
      </div>
      <div id="instructions">
        Please tap/click the name of each APK you'd like to remove. The
        files that are <span class="apkNameImportant">blue</span> contain some
        essential phone functions. If you don't have a replacement APK or don't
        know exactly what they do, it is recommended you don't remove them.
      </div>
      <form name="apkForm" action="cwm_zip.php" method="get" id="apkForm">
        <table id="apkTable">
          <tr>
            <td>
              <input type="checkbox" id="checkAll" class="ui-button ui-state-default ui-corner-all">
            </td>
            <td>
              <div id="checkAllText" style="font-size:24px">
                Select All (Non-essential APKs)
              </div>
            </td>
            <td></td>
          </tr>
          <tr><td></td><td></td></tr>
          <?php
            $i = 0;
            foreach($list as $line) {
              $apk         = explode(',', trim($line));
              $apkName     = $apk[0];
              $apkFilename = $apk[1];
              $class       = (preg_match('/^\*.*?$/i', $apkName)) ? 'apkNameImportant' : 'apkName';
              $checkClass  = (preg_match('/^\*.*?$/i', $apkName)) ? 'warningCheckbox' : 'normalCheckbox';
              if($class == 'apkNameImportant') {
                $apkName = trim($apkName, '*');
              }
            ?>
          <tr class="apkRow">
            <td>
              <input class="<?=$checkClass;?>" type="checkbox" name="apk<?=$i;?>"
              value="<?=$i;?>" />
            </td>
            <td class="<?=$class;?>">
              <?=$apkName;?>
              </td>
          </tr>
          <?php
            $i++;
            }
          ?>
        </table>
        <div align="center">
          <input id="submitButton" type="submit" value="Download CWM zip"
          class="ui-button ui-state-default ui-corner-all">
        </div>
      </form>
    </div>
    <div id="footer">
        <form action="https://www.paypal.com/cgi-bin/webscr" method="post">
          <input type="hidden" name="cmd" value="_s-xclick">
          <input type="hidden" name="hosted_button_id" value="4DKZJMZ2ALJ7L">
          <input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
          <img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
        </form>
      Page Design by <a href="http://goo.gl/Vu3k7">Bilal Ayub</a><br />
      <a rel="license" href="http://creativecommons.org/licenses/by-sa/3.0/"><img alt="Creative Commons License" style="border-width:0" src="http://i.creativecommons.org/l/by-sa/3.0/88x31.png" /></a><br /><span xmlns:dct="http://purl.org/dc/terms/" href="http://purl.org/dc/dcmitype/Text" property="dct:title" rel="dct:type">SGS4G Debloater</span> by <a xmlns:cc="http://creativecommons.org/ns#" href="http://www.fernandobarillas.com" property="cc:attributionName" rel="cc:attributionURL">Fernando Barillas (FBis251)</a> is licensed under a <a rel="license" href="http://creativecommons.org/licenses/by-sa/3.0/">Creative Commons Attribution-ShareAlike 3.0 Unported License</a>.
    </div>
    <script type="text/javascript" src="js/jquery-1.6.2.min.js"></script>
    <script type="text/javascript" src="js/main.js"></script>
  </body>
</html>
