<?php
  $filePath =  $_POST['filePath'];
  $fileEdition =  $_POST['fileEdition'];

  if (is_writable($filePath)) {
    if (!$handle = fopen($filePath, 'w+')) {
         echo "Impossible d'ouvrir le fichier ($filePath)";
         exit;
    }

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

