<?php

require_once 'F:/webdev/htdocs/google-drive/src/google-drive/lib/functions.php';

$service = getDriveService();
$optParams = array(
  'fields' => 'files(id, name)'
);
$results = $service->files->listFiles($optParams);

if (count($results->getFiles()) == 0) {
  print "No files found.\n";
} else {
  printf("Files: <br />");
  foreach ($results->getFiles() as $file) {
    printf("<b>%s</b> - %s", $file->getName(), $file->getId());
    printf("<br />");
  }
}