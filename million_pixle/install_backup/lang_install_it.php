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
    *  ATTENTION: Non tradurre mai i nomi delle variabili, solo il testo che si trova tra le
    *             virgolette  (" "). Fai attenzione a non scordarti il punto e virgola (;)
    *             alla fine di ogni linea e dopo le virgolette (";).
    *            Se vedi il simbolo %s in mezzo al testo, questo è un simbolo che verrà
    *            sostituito con del testo automaticamente dallo script, non cancellarlo ma fai
    *            in modo che si trovi al giusto posto nella frase
    *
    *            .
    *             i.e.
    *                   $_ISP[0] = "Puoi scegliere %s blocchi gratis!";
    *
    *             ...Sarà visualizzato nel sito web in questo modo
    *
    *                   Puoi scegliere 4 blocchi gratis!
    *
    *             Inoltre evita di utilizzare le virgolette (") nel tuo testo, perchè lo script
    *             lo interpreta come codice. Usa &quot; o \".
    *
    *             Se dovessi ricevere un errore(tipicamente una pagina bianca) sicuramente
    *              hai commesso un errore all'interno di questo file della lingua,
    *            (; dimenticato o utilizzo di " nel tuo testo).
    ******************************************************************************************/

$_ISP = array();

    /******************************************************************************************
    *  italiano
    ******************************************************************************************/

$_ISP[0]  = "<b>MYSQL - installazione</b>";
$_ISP[1]  = "Inserisci le informazioni relative alla tua connessione al database MySql<br> e clicca su<b> Installa adesso</b>.";
$_ISP[2]  = "<font color=\"red\"><b>Non hai impostato il permesso di scrittura dei file!</b></font><br>Prima di andare avanti impostali come viene descritto in <b><a href=\"install.htm\" target=\"_blank\" style=\"color:white\">install.htm</a></b>.<br>dopodichè puoi procedere all'installazione di MYSQL.";
$_ISP[3]  = "Tutte le impostazioni di scrittura sono state effettuate.";
$_ISP[4]  = "Non riesco a collegarmi al server MYSQL. Controlla <B>Tutte</B> le informazioni inserite!<br>(errore MYSQL: <b>%s</b>)";
$_ISP[5]  = "Non riesco a collegarmi al <B>database MySql</B> '%s', Controlla il nome del tuo database!<br>(errore MYSQL: <b>%s</b>)";
$_ISP[6]  = "Non riesco a creare il file <b>config.php</b> Hai impostato i permessi di scrittura della cartella <b>incs</b?";
$_ISP[7]  = "Nome utente MYSQL:";
$_ISP[8]  = "Password di MYSQL:";
$_ISP[9]  = "Nome del database MYSQL:";
$_ISP[10] = "Nome del server host di MYSQL:";
$_ISP[11] = "Installa adesso";
$_ISP[12] = "<font color=\"yellow\"><B>MYSQL - Installazione riuscita!</B></font>";
$_ISP[13] = "<font color=\"yellow\"><i><B>Importante:</B></i></font><br><B>Cancella dal server la cartella <font color=\"yellow\"><i><B>install</B></i></font> e tutti i file contenuti in essa!</B>";
$_ISP[14] = "<font color=\"yellow\"><i><B>Nota:</B></i></font><br>Il tuo sito web è pronto e puoi accedervi digitando il tuo <a href=\"../index.php\">dominio</a>.<br>Per accedere alla tua area di controllo digita <font color=\"yellow\"><i><a href=\"../control/index.php\">http://yourdomain/control</a></i></font> nel tuo browser web e digita la password standard <B>admin</B> (Modificala subito). Divertiti!";
$_ISP[15] = "Inserisci il <B>nome utente di MYSQL </B>";
$_ISP[16] = "Non hai impostato la <B>password di MYSQL</B>, Se non ne usi nessuna, ti raccomandiamo di usarne una!";
$_ISP[17] = "Inserisci il <B>Nome del database MYSQL</B>, che hai creato e che vuoi usare con PHP Pixel script. Le tabelle nel database saranno create automaticamente.";
$_ISP[18] = "Inserisci il <B>Nome del server host di MYSQL</B> per accedere al server MYSQL.";
$_ISP[19] = "Non riesco a creare le tabelle nel database!<br>(errore MYSQL: <b>%s</b>)<br>Riprova.";






?>