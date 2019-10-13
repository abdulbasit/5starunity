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
    *  english
    ******************************************************************************************/

$_ISP[0]  = "<b>MYSQL - Installation</b>";
$_ISP[1]  = "Please fill in your mysql database connection info<br> and click on <b>Install now</b>.";
$_ISP[2]  = "<font color=\"red\"><b>You did not set all file permissions to writable!</b></font><br>Please do this installation step before, as described in the <b><a href=\"install.htm\" target=\"_blank\" style=\"color:white\">install.htm</a></b>.<br>After that you can go on with this MYSQL installation.";
$_ISP[3]  = "All file permissions are set.";
$_ISP[4]  = "Could not connect to the MYSQL server. Please check <B>all</B> of your details!<br>(MYSQL error: <b>%s</b>)";
$_ISP[5]  = "Could not connect to the <B>MYSQL database</B> '%s', please check your database name!<br>(MYSQL error: <b>%s</b>)";
$_ISP[6]  = "Could not create <b>config.php</b> file, did you set write permissions to the folder <b>incs</b> already?";
$_ISP[7]  = "MYSQL username:";
$_ISP[8]  = "MYSQL password:";
$_ISP[9]  = "MYSQL name of database:";
$_ISP[10] = "MYSQL server hostname:";
$_ISP[11] = "Install now";
$_ISP[12] = "<font color=\"yellow\"><B>MYSQL - Installation successfull!</B></font>";
$_ISP[13] = "<font color=\"yellow\"><i><B>Important:</B></i></font><br><B>Please delete the folder <font color=\"yellow\"><i><B>install</B></i></font> and all files in it from your server now!</B>";
$_ISP[14] = "<font color=\"yellow\"><i><B>Note:</B></i></font><br>Your pixel page is now ready to start and can be access over your <a href=\"../index.php\">domain</a>.<br>To get access to your control area, simply type <font color=\"yellow\"><i><a href=\"../control/index.php\">http://yourdomain/control</a></i></font> in your internet browser and use the standard password <B>admin</B> (please change). Have fun!";
$_ISP[15] = "Please insert the <B>MYSQL username</B>";
$_ISP[16] = "You did not set a <B>MYSQL password</B>, if you don't use one, we strongly recommend to use one!";
$_ISP[17] = "Please insert the <B>name of your MYSQL database</B>, which you created or want to use for your million script. In this database, the tables will be created automatically.";
$_ISP[18] = "Please insert the <B>MYSQL hostname</B> to get access to the MYSQL server.";
$_ISP[19] = "Could not create tables in the datase!<br>(MYSQL error: <b>%s</b>)<br>Please try again.";






?>