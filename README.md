# Create Document Repository
Teil für unsere ELO Programmierung (schaefer.common.as.createDocument).
Dieses Repository dient zur Erstellung von Dokumenten auf Grund einer JSON Datei.

### Ablauf
1. Der ELO AS wird via Direct Rule aufgerufen
2. Der ELO AS erstellt via der Klasse `schaefer.common.as.createDocument` einen neuen Ordner im Working Directory.
3. Dort wird eine JSON-Datei generiert. Der Dateiname ist `config.json`.
4. <em>Optional: Kann auch eine PDF, XLSX, ... mit ausgegegben werden als Vorlage. Diese Datei heißt dann `input.xxx`</em> 
5. Der AS ruft das PHP Skript via CMD auf. Mit Hilfe von MPDF oder jeder anderen PHP Library wird ein neues Dokument erstellt, namens `output.xxx`
6. Dieses wird in ebenfalls in das Working-Directory abgelegt. 
7. Anschließend importiert der ELO AS das Dokument wieder.

