<?php
    /*
    PHP MillionPixel (C) 2005 by texmedia.de
    All Rights Reserved.

    This program is not for free, you have to buy a copy-license for your domain.
    This copyright notice and the header above have to remain intact.
    You do not have the permission to sell the code or parts of this code or chanced
    parts of this code for this program.
    This program is distributed "as is" and without warranty of any
    kind, either express or implied.

    Please check
    http://www.texmedia.de
    for Bugfixes, Updates and Support.
    */

    /******************************************************************************************
    *  ATTENTION: Please do not translate the names of the variables, only the text
    *             between the " ". Make sure that you don't forget the semicolon at
    *             the end of each line after the ".
    *             If you see an %s within the text, this is a placeholder which will
    *             be filled out with text from the script automatically. Do not delete
    *             the %s but integrate it at the right place in your text.
    *             i.e.
    *                   $_ISP[0] = "You can choose %s blocks for free!";
    *
    *             ...will shown on the website like
    *
    *                   You can choose 4 blocks for free!
    *
    *             Furthermore make sure, that you do not use " within your text, because
    *             it is interpreted as code. Use &quot; or \" instead.
    *
    *             If you will get an error on your webpage (white site) you likely made this
    *             error within this language file (missing semicolon or using of ").
    ******************************************************************************************/

$_ISP = array();

    /******************************************************************************************
    *  German
    ******************************************************************************************/

$_ISP[0]  = "<b>MYSQL - Installation</b>";
$_ISP[1]  = "Bitte geben Sie die Verbindungsdaten zu Ihrer MYSQL-Datenbank ein<br> und klicken Sie auf <b>Installieren</b>.";
$_ISP[2]  = "<font color=\"red\"><b>Sie haben noch nicht alle Schreibrechte gesetzt!</b></font><br>Bitte führen Sie diesen Installations-Schritt zuerst aus, wie in der <b><a href=\"install.htm\" target=\"_blank\" style=\"color:white\">install.htm</a></b> beschrieben.<br>Erst im Anschluss daran können Sie diese MYSQL-Installation vornehmen.";
$_ISP[3]  = "Alle Schreibrechte sind gesetzt.";
$_ISP[4]  = "Konnte keine Verbindung zum MYSQL Server herstellen. Bitte überprüfen Sie <B>alle</B> Ihre Angaben!<br>(MYSQL Fehler: <b>%s</b>)";
$_ISP[5]  = "Konnte keine Verbindung zur <B>MYSQL Datenbank</B> '%s' herstellen, bitte überpüfen Sie Ihre Angabe!<br>(MYSQL Fehler: <b>%s</b>)";
$_ISP[6]  = "Kann keine <b>config.php</b> Datei erstellen, haben Sie die Schreibrechte für das Verzeichnis <b>incs</b> gesetzt?";
$_ISP[7]  = "MYSQL Username:";
$_ISP[8]  = "MYSQL Passwort:";
$_ISP[9]  = "MYSQL Name Datenbank:";
$_ISP[10] = "MYSQL Server Hostname:";
$_ISP[11] = "Installieren";
$_ISP[12] = "<font color=\"yellow\"><B>MYSQL-Installation erfolgreich abgeschlossen!</B></font>";
$_ISP[13] = "<font color=\"yellow\"><i><B>Wichtig:</B></i></font><br><B>Bitte löschen Sie nun noch das Verzeichnis namens <font color=\"yellow\"><i><B>install</B></i></font> von Ihrem Server!</B>";
$_ISP[14] = "<font color=\"yellow\"><i><B>Hinweis:</B></i></font><br>Ihre Pixel Seite ist nun einsatzbereit und kann über Ihre <a href=\"../index.php\">Domain</a> aufgerufen werden.<br>In Ihre Administrations-Ebene gelangen Sie über <font color=\"yellow\"><i><a href=\"../control/index.php\">http://ihredomain/control</a></i></font> mit dem Standard-Passwort <B>admin</B> (Bitte ändern). Viel Spaß!";
$_ISP[15] = "Bitte geben Sie den <B>MYSQL Usernamen</B> an, über den Sie Zugriff auf Ihre Datenbank haben.";
$_ISP[16] = "Sie haben kein <B>MYSQL Passwort</B> angegeben, sollten Sie wirklich keins besitzen, empfehlen wir Ihnen dringend eins zu setzen.";
$_ISP[17] = "Bitte geben Sie den <B>Namen der MYSQL Datenbank</B> an, die Sie für das Million Pixel Script erstellt haben bzw. benutzen möchten. Darin werden dann die notwendigen Tabellen erstellt.";
$_ISP[18] = "Bitte geben Sie den <B>MYSQL Hostnamen</B> an um eine Verbindung zu MYSQL herstellen zu können.";
$_ISP[19] = "Konnte Mysql Tabellen <B>nicht</B> in der Datenbank erstellen!<br>(MYSQL Fehler: <b>%s</b>)<br>Bitte versuchen Sie es noch einmal.";






?>