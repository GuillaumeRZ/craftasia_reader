<?php
  $filePath =  $_POST['filePath'];
  $fileEdition =  $_POST['fileEdition'];
  $filePathBackup =  $_POST['filePathBackup'];
  $fileEditionBackup =  $_POST['fileEditionBackup'];

  /* Access to normal path */
  if (is_writable($filePath)) {
    
    /* Open the file with the right perm */
    if (!$handle = fopen($filePath, 'w+')) {
      echo "Impossible d'ouvrir le fichier ($filePath)";
      exit;
    }

    /* Write the content into the file */
    if (fwrite($handle, $fileEdition) === FALSE) {
      echo "Impossible d'écrire dans le fichier ($filePath)";
      exit;
    }

    echo "L'écriture de ($fileEdition) dans le fichier ($filePath) a réussi";
    fclose($handle);

  } else {
    echo "Le fichier $filePath n'est pas accessible en écriture.";
  }
?>

