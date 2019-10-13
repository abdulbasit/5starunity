<?php
    /*
    PHP MillionPixel (C) 2005 by texmedia.de and millionpixelpage.com.
    All Rights Reserved.

    This program is not for free, you have to buy a copy-license for your domain.
    This copyright notice and the header above have to remain intact.
    You do not have the permission to sell the code or parts of this code or chanced
    parts of this code for this program.
    This program is distributed "as is" and without warranty of any
    kind, either express or implied.

    Please check
    http://www.millionpixelpage.com
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
    *  french
    ******************************************************************************************/

$_ISP[0]  = "<b>MYSQL - Installation</b>";
$_ISP[1]  = "Entrez les informations nécessaire à la connexion à votre base mySql<br> et appuyer sur <b>Installer maintenant</b>.";
$_ISP[2]  = "<font color=\"red\"><b>Tous les droits en ecriture n'ont pas été mis correctement !</b></font><br>Merci de procéder d'abord à cette étape, comme décrit dans le fichier <b><a href=\"install.htm\" target=\"_blank\" style=\"color:white\">install.htm</a></b>.<br>Après seulement, vous pourrez continuer avec cette installation de base MYSQL.";
$_ISP[3]  = "Toutes les permissions sur les fichiers ont été effectuées.";
$_ISP[4]  = "Impossible de se connecter au serveur MySQL. Merci de vérifier <B>toutes</B> les informations rentrées !<br>(Erreur MYSQL : <b>%s</b>)";
$_ISP[5]  = "Impossible de se connecter à la <B>base MYSQL</B> '%s', merci de vérifier le nom de la base entrée !<br>(Erreur MYSQL: <b>%s</b>)";
$_ISP[6]  = "Impossible de créer le fichier <b>config.php</b>, avez-vous déjà mis les permissions en écriture sur le répertoire <b>incs</b> ?";
$_ISP[7]  = "Nom d'utilisateur :";
$_ISP[8]  = "Mot de passe MYSQL :";
$_ISP[9]  = "Nom de la Base MYSQL :";
$_ISP[10] = "Hostname du serveur MYSQL :";
$_ISP[11] = "Installer maintenant";
$_ISP[12] = "<font color=\"yellow\"><B>MYSQL - Installation réussie !</B></font>";
$_ISP[13] = "<font color=\"yellow\"><i><B>Important :</B></i></font><br><B>Merci d'effacer maintenant du serveur le répertoire <font color=\"yellow\"><i><B>install</B></i></font> et tous ses fichiers !</B>";
$_ISP[14] = "<font color=\"yellow\"><i><B>Note :</B></i></font><br>Votre page à Pixels est maintenant prête à l'emploi et est accessible sur votre nom de <a href=\"../index.php\">domaine</a>.<br>Pour accéder à la zone d'administration, taper l'URL <font color=\"yellow\"><i><a href=\"../control/index.php\">http://yourdomain/control</a></i></font> dans votre browser et utiliser le mot de passe standard <B>admin</B> (pensez à le change ensuite). Bon courage !";
$_ISP[15] = "Merci de taper votre <B>nom d'utilisateur MYSQL</B>";
$_ISP[16] = "Vous n'avez pas tapé de <B>mot de passe MYSQL</B>, si vous n'en avez pas, nous vous recommandons vivement d'en mettre un !";
$_ISP[17] = "Merci de taper le <B>nom de votre base MYSQL</B>, celle que vous avez créée ou que vous souhaitez utiliser pour votre script. Dans cette base, les tables seront automatiquement créées.";
$_ISP[18] = "Merci de taper le <B>hostname MYSQL</B> pour accéder au serveur MySQL.";
$_ISP[19] = "Impossible de créer les tables dans la base !<br>(Erreur MYSQL: <b>%s</b>)<br>Merci de recommencer.";






?>