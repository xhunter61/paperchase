
<?php
$file = $_POST['filename'];
if(file_exists($file)){
    $file = uniqid() . ".txt";
}
$handle= fopen($file,'a');
// Öffnet die Datei, um den vorhandenen Inhalt zu laden
$current = file_get_contents($file);
// Fügt eine neue Person zur Datei hinzu
$current = $_POST['content'];
// Schreibt den Inhalt in die Datei zurück
fwrite($handle, $current);

fclose($handle);

?>
