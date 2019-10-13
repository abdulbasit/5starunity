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
    *   ATENTIE:  Rugam sa nu traduceti numele campurilor, numai textul
    *             intre  " ". Sa fiti siguri sa nu uitati punct si virgula la
    *             sfarsitul fiecarei liniidupa ".
    *             Daca vedezi semnul %s in mijlocul textului, acesta este un simbol care va
    *             fi inlocuit cu un text in automat. Nu stergeti simbolul
    *             %s dar fiti siguri sa fie in mijlocul frazei la locul potrivit.
    *             ex:.
    *                   $_ISP[0] = "Poti alege %s blocuri gratis!";
    *
    *             ...va fi vazut in pagina:
    *
    *                   Poti alege 4 blocuri gratis!
    *
    *             Incercati sa evitati folosirea simbolului " in text, pentru ca
    *             este interpretat ca si cod sursa. Folositi &quot; sau \" in loc de ".
    *
    *             Daca intr-o pagine iese eroare (ex: pagina goala) sigur ati gresit ceva
    *             in acest fisier (lipsa ; sau folosirea  " in text).
    ******************************************************************************************/

$_ISP = array();

    /******************************************************************************************
    *  romanian
    ******************************************************************************************/

$_ISP[0]  = "<b>MYSQL - Instalare</b>";
$_ISP[1]  = "Introduceti informatiile pentru conecsiunea la serverul mysql<br> si dati clik pe <b>Instaleaza acum</b>.";
$_ISP[2]  = "<font color=\"red\"><b>Nu ati introdus permisul pentru a scrie in fisiere!</b></font><br>Inainte trebuie sa faceti acest lucru, asa cum este scris in fisierul <b><a href=\"install.htm\" target=\"_blank\" style=\"color:white\">install.htm</a></b>.<br>Dupa aceea incercati sa instalati fisierele de database MYSQL.";
$_ISP[3]  = "Toate permisele au fost setate.";
$_ISP[4]  = "Nu se poate conecta la MYSQL server. Controlati va rog <B>toate</B> detaliile!<br>(MYSQL error: <b>%s</b>)";
$_ISP[5]  = "Nu se poate conecta la <B>MYSQL database</B> '%s', controlati va rog numele databaseului!<br>(MYSQL error: <b>%s</b>)";
$_ISP[6]  = "Nu se poate crea fisierul <b>config.php</b>, ati setat corect permisele de scriere a cartelelor <b>incs</b> ?";
$_ISP[7]  = "MYSQL username:";
$_ISP[8]  = "MYSQL password:";
$_ISP[9]  = "MYSQL numele databaseului:";
$_ISP[10] = "MYSQL numele host al serverului:";
$_ISP[11] = "Instaleaza acum";
$_ISP[12] = "<font color=\"yellow\"><B>MYSQL - Instalarea terminata cu succes!</B></font>";
$_ISP[13] = "<font color=\"yellow\"><i><B>Important:</B></i></font><br><B>Stergeti va rog directorul <font color=\"yellow\"><i><B>install</B></i></font> si toate fisierele din director acum!</B>";
$_ISP[14] = "<font color=\"yellow\"><i><B>Note:</B></i></font><br>Pagina dumneavoastra de pixels esta gata si puteti accesa la <a href=\"../index.php\">dominiu</a>.<br>Ca sa accesati la pagina de control, scrieti <font color=\"yellow\"><i><a href=\"../control/index.php\">http://yourdomain/control</a></i></font> in bara d adrese din browser si folositi parola de ordina standard <B>admin</B> (rugam sa o schimbati). Distractie placuta!";
$_ISP[15] = "Introduceti va rog <B>MYSQL username</B>";
$_ISP[16] = "Nu ati setat <B>MYSQL password</B>, daca nu folositi parola, va recomandam sa o folositi!";
$_ISP[17] = "Introduceti <B>numele databaseului MYSQL</B>, care a fost creat si pe care doriti sa-l folositi pentu million script. In acest database, tabelele vor fi create automat.";
$_ISP[18] = "Introduceti <B>MYSQL numele host</B> pentru a accesa la serverul MYSQL.";
$_ISP[19] = "Nu se pot crea tabele in datab!<br>(MYSQL error: <b>%s</b>)<br>Incercati din nou.";






?>
