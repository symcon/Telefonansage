# Telefonansage
	
Das Telefonansage-Modul ermöglicht die komfortable Verknüpfung einer VoIP-Instanz und einer Text-to-Speech-Instanz (Polly) um eine Telefonnummer anzurufen und bei Annahme des Anrufs einen Text auszugeben. Darüber hinaus, kann das Modul auf DTMF-Töne reagieren und weitere Texte ausgeben.

### Inhaltsverzeichnis

1. [Funktionsumfang](#1-funktionsumfang)
2. [Voraussetzungen](#2-voraussetzungen)
3. [Software-Installation](#3-software-installation)
4. [Einrichten der Instanzen in IP-Symcon](#4-einrichten-der-instanzen-in-ip-symcon)
5. [Statusvariablen und Profile](#5-statusvariablen-und-profile)
6. [WebFront](#6-webfront)
7. [PHP-Befehlsreferenz](#7-php-befehlsreferenz)

### 1. Funktionsumfang

* Anrufen einer Telefonnummer und Ausgabe eines Textes
* Auswerten von DTMF-Tönen
* Ausgabe von weiteren Texten auf einer bestehenden Verbindung

### 2. Vorraussetzungen

- IP-Symcon ab Version 5.5
- Eingerichtete VoIP-Instanz
- [Eingerichtete Text-to-Speech-Instanz (AWS Polly)](https://github.com/symcon/TTSAWSPolly/tree/master/TTSAWSPolly)

### 3. Software-Installation

* Über den Module Store das 'Telefonansage'-Modul installieren.
* Alternativ über das Module Control folgende URL hinzufügen: https://github.com/symcon/Telefonansage

### 4. Einrichten der Instanzen in IP-Symcon

 Unter 'Instanz hinzufügen' kann das 'Telefonansage'-Modul mithilfe des Schnellfilters gefunden werden.  
	- Weitere Informationen zum Hinzufügen von Instanzen in der [Dokumentation der Instanzen](https://www.symcon.de/service/dokumentation/konzepte/instanzen/#Instanz_hinzufügen)

__Konfigurationsseite__:

Name                                   | Beschreibung
-------------------------------------- | ------------------
VoIP-Instanz                           | Die VoIP-Instanz, welche die Anrufe verwaltet
Text-to-Speech-Instanz (Polly)         | Die Text-to-Speech-Instanz, welche die Texte in Tondaten umwandelt
Dauer bis die Verbindung getrennt wird | Die maximale Zeit, die gewartet wird, dass ein Anruf angenommen wird

### 5. Statusvariablen und Profile

Die Statusvariablen/Kategorien werden automatisch angelegt. Das Löschen einzelner kann zu Fehlfunktionen führen.

#### Statusvariablen

Name          | Typ     | Beschreibung
------------- | ------- | ------------
Telefonnummer | String  | Die Telefonnummer, welche bei der Betätigung von "Anruf starten" angerufen wird
Text          | String  | Der Text, welcher bei der Betätigung von "Anruf starten" initial ausgegeben wird. Wird diese Variable geschaltet während eine Verbindung besteht, wird der neue Text direkt ausgegeben
DTMF-Ton      | String  | Wird während des Anrufs ein DTMF-Ton verwendet, wird er in dieser Variable gespeichert
Anruf starten | Skript  | Startet einen Anruf mit der aktuell eingestellten Telefonnummer und dem aktuellen Text

#### Profile

Es werden keine Profile angelegt.

### 6. WebFront

Über das WebFront werden keine zusätzlichen Informationen angezeigt.

### 7. PHP-Befehlsreferenz

`void TA_StartCall(integer $InstanzID);`
Startet einen Anruf auf Basis der aktuellen Einstellung.

Beispiel:
`TA_StartCall(12345);`

`void TA_StartCallEx(integer $InstanzID, string $Telefonnummer, string $Text);`
Startet einen Anruf an die Telefonnummer $Telefonnummer und gibt den Text $Text aus.

Beispiel:
`TA_StartCallEx(12345, "+4945130500511", "Ich liebe IP-Symcon!");`