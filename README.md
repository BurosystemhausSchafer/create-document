# Create Document Repository
Teil für unsere ELO Programmierung (schaefer.common.as.createDocument).
Dieses Repository dient zur Erstellung von Dokumenten auf Grund einer JSON Datei.

<em>Die Klasse createDocument in ELO ist universell gehalten und kann theoretisch auch mit NodeJS angesprochen werden.
Aktuell haben wir aber Vorlagen dafür, wie man mit PHP Dokumente generiert. Deshalb ist dies hier die beste Wahl.</em>

### Ablauf
1. Der ELO AS wird via Direct Rule aufgerufen
2. Der ELO AS erstellt via der Klasse `schaefer.common.as.createDocument` einen neuen Ordner im Working Directory.
3. Dort wird eine JSON-Datei generiert. Der Dateiname ist `config.json`.
4. <em>Optional: Kann auch eine PDF, XLSX, ... mit ausgegegben werden als Vorlage. Diese Datei heißt dann `input.xxx`</em> 
5. Der AS ruft das PHP Skript via CMD auf. Mit Hilfe von MPDF oder jeder anderen PHP Library wird ein neues Dokument erstellt, namens `output.xxx`
6. Dieses wird in ebenfalls in das Working-Directory abgelegt. 
7. Anschließend importiert der ELO AS das Dokument wieder.

### Was wird benötigt
1. Man benötigt zunächst PHP. Das Skript ist kompatibel mit Version 8. (Download https://www.php.net/downloads.php)
2. Für manche Versionen benötigt man GhostScript. Grade wenn man Dateien teilen möchte. (Download https://ghostscript.com/releases/gsdnld.html)

### Übersicht der Dateien
- doc-generator.php = Die PHP Klasse, die man für sein Skript nutzt
- sample-generator.php = Ein Beispiel für einen Generator und zum Testen
