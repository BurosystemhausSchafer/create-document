<?php

/**
 * Documenten Generator
 * 
 * 
 * 
 */
class DocGenerator {
    

    // Constructor
    public function __construct() {
        
        global $argv;

        // Argumenten übernehmen
        $this->args = $argv;

        // Prüfen, dass ein Working-Directory übergeben wurde
        if(!isset($argv[1])) {
            throw new Exception("Es wurde kein Working-Directory übergeben!", 1);
        }

        // Das erste Argument muss immer das Working Directory sein
        $this->workingDir = __DIR__."\\working\\".$argv[1];

        // Directory überprüfgen
        if(!is_dir($this->workingDir)) {
            throw new Exception("Das Übergebene Working-Directory wurde nicht gefunden!", 1);
        }    

        // Konfiguration lesen
        $this->readConfigFile();
    }

    // Diese Funktion kann überschrieben werden, wenn es keine Config gibt
    // Dies ist zum Beispiel bei einem Kunden der Fall, wo eine .prn zu einer PDF konvertiert wird
    public function readConfigFile() {

        // Config Datei
        $this->configFile = $this->workingDir."\\config.json";

        // Config Datei prüfen
        if(is_file($this->configFile)) {

            // Konfigurationsdatei lesen
            $this->config = json_decode(file_get_contents($this->configFile), true);

        } else {
            $this->throwError("Config-Datei wurde nicht gefunden!");
        }
    }



    // Einen Fehler werfen
    public function throwError($error) {


        // Error Array
        $errorArray = [
            'error' => $error
        ];

        // Datei schreiben
        file_put_contents($this->workingDir."/error.log", json_encode($errorArray));
    }




}






?>