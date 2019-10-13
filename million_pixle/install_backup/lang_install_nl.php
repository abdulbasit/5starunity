<?php
    /*
    PHP MillionPixel (C) 2005 by texmedia.de
    All Rights Reserved.

    Dit programma is niet gratis, u moet een licentie per domein kopen.
    Dit copyright moet intact blijven boven boven in de header.
    U heeft geen toestemming om het door te verkopen, veranderen of stukken te verwerken in andere software.
    Dit programma is gedistribueerd "als het is" zonder welke vorm van garantie dan ook.

    Check voor meer informatie
    http://www.texmedia.de
    Voor Bugfixes, Updates en Support.
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
    *  Nederlands
    ******************************************************************************************/

$_ISP[0]  = "<b>MYSQL - Installatie</b>";
$_ISP[1]  = "Vul hier uw mysql database connectie infomatie ino<br> en klik op <b>Installeer nu</b>.";
$_ISP[2]  = "<font color=\"red\"><b>U heeft niet alle bestandstoestemmingen naar schrijfbaar veranderd!</b></font><br>Doe deze installatie stap alstublieft eerst, zoals beschreven in de <b><a href=\"install.htm\" target=\"_blank\" style=\"color:white\">INSTALL_NL.txt</a></b>.<br>Pas hierna kunt u weer verder gaan met deze MYSQL installatie.";
$_ISP[3]  = "Alle bestandstoestemmingen zijn ingesteld.";
$_ISP[4]  = "Kon geen verbinding maken met de MYSQL server. Check a.u.b. <U><B>al</B></U> uw details!<br>(MYSQL fout: <b>%s</b>)";
$_ISP[5]  = "Kon geen verbinding maken met de <B>MYSQL database</B> '%s', check a.u.b. uw database naam!<br>(MYSQL fout: <b>%s</b>)";
$_ISP[6]  = "Kon het bestand <b>config.php</b> niet maken, heeft u de toestemmingen van de map <b>incs</b> al ingesteld (CMOD 777!)?";
$_ISP[7]  = "MYSQL gebruikersnaam:";
$_ISP[8]  = "MYSQL wachtwoord:";
$_ISP[9]  = "MYSQL naam van de database:";
$_ISP[10] = "MYSQL server hostname:";
$_ISP[11] = "Installeer nu";
$_ISP[12] = "<font color=\"yellow\"><B>MYSQL - Installatie succesvol!</B></font>";
$_ISP[13] = "<font color=\"yellow\"><i><B>Belangrijk:</B></i></font><br><B>Verwijder alstublieft de map <font color=\"yellow\"><i><B>install</B></i></font> en alle bestanden erin van uw server nu!</B>";
$_ISP[14] = "<font color=\"yellow\"><i><B>Melding:</B></i></font><br>Uw pixel pagina is nu klaar om van start te gaan en kan worden opgevraagd via uw <a href=\"../index.php\">domein</a>.<br>Om toegang te krijgen tot uw administrator gedeelte, hoeft u alleen naar <font color=\"yellow\"><i><a href=\"../control/index.php\">http://www.uwdomeinnaam.nl/control</a></i></font> te surfen via uw browser en het standaard wachtwoord <B>admin</B> in te vullen (veranderen a.u.b.). Veel plezier!";
$_ISP[15] = "Vul hier in de  <B>MYSQL gebruikersnaam</B>";
$_ISP[16] = "U heeft geen <B>MYSQL wachtwoord</B> ingevuld, als u er geen gebruikt raden wij u sterk aan dit snel te veranderen!";
$_ISP[17] = "Vul hier de <B>naam van uw MYSQL database</B>, welke u heeft gemaakt of wilt gaan maken voor uw million script. In deze database zullen de tabellen automatisch worden gemaakt.";
$_ISP[18] = "Vul hier de <B>MYSQL gebruikersnaam</B> in om toegang te krijgen tot de MYSQL server.";
$_ISP[19] = "Kon geen tabellen maken in de database!<br>(MYSQL fout: <b>%s</b>)<br>Probeer opnieuw.";






?>