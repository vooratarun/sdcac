<?php
$zip = new ZipArchive;
if ($zip->open('../Brainbox.zip') === TRUE) {
    $zip->extractTo('../Brainbox');
    $zip->close();
    echo 'ok';
} else {
    echo "failed";
} 
?>
