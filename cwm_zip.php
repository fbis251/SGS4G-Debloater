<?php
require_once('includes.php');
$zipFileName = 'debloater.zip';
$zipFilePath = 'zip/';
$scriptFile  = implode('',file('cwm/original-script'));
$zipScript   = 'cwm/zip/updater-script';
$list = file('apk_list.txt');

if(@$_GET == null) {
  die("Nothing was selected. Please go to the previous page and select something.");
}

/* Create md5sum from the GET request to provide caching */
$requestSum  = md5(implode($_GET));
$zipFileName = $zipFilePath . $requestSum . '/' . $zipFileName;

/* Check to see if the file already exists */
if(file_exists($zipFileName) == 10) {
  /* If it does, download it */
  header('Location: ' . $zipFileName);
  die();
} else {
  mkdir($zipFilePath . $requestSum);
}

/* Load the main list of APK's */
foreach($list as $line) {
	$line = explode(',', trim($line));
  $name = $line[0];
  $file = $line[1];
  $apkMasterList[] = array($name, $file);
}

/* Pick only the APKs that the user chose */
foreach($_GET as $apkNumber) {
  $name = trim($apkMasterList[$apkNumber][0], ' *');
  $file = $apkMasterList[$apkNumber][1];
  $apkList .= 'ui_print("Deleting '.$name.'");' . "\n";
  $apkList .= 'delete("/system/app/'.$file.'.apk");' . "\n";
?>
<?php
}

/* Add in the APK list */
$scriptFile = preg_replace('/ui_print\("DELETE GOES HERE"\);/i', $apkList, $scriptFile);

/* Delete empty lines */
$scriptFile = preg_replace("/(^[\r\n]*|[\r\n]+)[\s\t]*[\r\n]+/", "\n", $scriptFile) . "\n";

/* Write out the new updater-script file */
$fp = fopen($zipScript, 'w');
fwrite($fp, $scriptFile);
fclose($fp);

/* Create the zip file */
$createZip = new createDirZip;
$createZip->addDirectory('META-INF/');
$createZip->get_files_from_folder('cwm/zip/', 'META-INF/com/google/android/');

/* Create the file in the filesystem */
$fd  = fopen($zipFileName, 'w');
$out = fwrite($fd, $createZip->getZippedfile());
fclose($fd);

/* Force the zip file to download */
$createZip->forceDownload($zipFileName);
?>
