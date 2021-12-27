<?php

// Dokumenten Generator importieren
require_once(__DIR__ . '/vendor/autoload.php');
require_once(__DIR__ . '/doc-generator.php');


// Neuen Documenten Generator erstellen
$d = new DocGenerator();

$mpdf = new \Mpdf\Mpdf([
    'mode' => 'c',
    'format' => 'A4',
    'margin_top' => 25,
    'margin_bottom' => 25
]);

$stylesheet = "
    body {
        font-family: Arial, Helvetica, sans-serif;
    }
";


$mpdf->WriteHTML($stylesheet, \Mpdf\HTMLParserMode::HEADER_CSS);


$friwo = '<img src="' . __DIR__ . '/assets/friemann_wolf.jpg" style="width: 150px;">';
$tadiran = '<img src="' . __DIR__ . '/assets/tadiran.jpg" style="width: 150px;">';

$html = "<table style='width: 100%;'>
    <tr>
        <td>" . $tadiran . "</td>
        <td style='text-align:center;'><h2>Schulungsplan</h2></td>
        <td style='text-align:right;'>" . $friwo . "</td>
    </tr>

</table>";

$html .= "<br><br><p>Schulung: Thema XYZ<br>Datum: 27.12.2021 um 10:00<br>Dauer: 02:00</p><br><br>";


$html .= "<table style='width: 100%;'>
    <tr>
        <th style='text-align:left;'>Teilnehmer</th>
        <th style='text-align:left;'>Bestätigung</th>
    </tr>
    <tr>
        <td>Hans Wurst</td>
        <td>Ja</td>
    </tr>
    <tr>
        <td>Hans Wurst 2</td>
        <td>Ja</td>
    </tr>

</table>";






// MPDF schreiben
$mpdf->WriteHTML($html);


// Ausgeben
$mpdf->Output($d->workingDir . '/output.pdf', \Mpdf\Output\Destination::FILE);
