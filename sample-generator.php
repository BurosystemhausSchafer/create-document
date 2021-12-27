<?php 

// Dokumenten Generator importieren
require_once(__DIR__.'/vendor/autoload.php');
require_once(__DIR__.'/doc-generator.php');


// Neuen Documenten Generator erstellen
$d = new DocGenerator();

$mpdf = new \Mpdf\Mpdf([
    'mode' => 'c',
    'format' => 'A4',
    'margin_top' => 25,
    'margin_bottom' => 25
]);

// MPDF schreiben
$mpdf->WriteHTML(print_r($this->config, true));

// Ausgeben
$mpdf->Output($d->workingDir.'/output.pdf', \Mpdf\Output\Destination::FILE);


?>