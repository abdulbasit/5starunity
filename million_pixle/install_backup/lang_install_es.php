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

$_ISP[0]  = "<b>MYSQL - Instalación</b>";
$_ISP[1]  = "Por favor complete la información de la base de datos mysql<br> y cliquee en <b>Instalar ahora</b>.";
$_ISP[2]  = "<font color=\"red\"><b>No estableció todos los permisos de escritura de archivos!</b></font><br>Por favor efectúe este paso de la instalación antes, como se describe en  <b><a href=\"install.htm\" target=\"_blank\" style=\"color:white\">install.htm</a></b>.<br>Después de eso puede seguir con la instalación MYSQL.";
$_ISP[3]  = "Todos los permisos de archivo están determinados.";
$_ISP[4]  = "No se pudo conectar al servidor MYSQL. Por favor verifique <B>todos</B> sus detalles!<br>(MYSQL error: <b>%s</b>)";
$_ISP[5]  = "No se pudo conectar a <B>base de datos MYSQL</B> '%s', por favor verifique el nombre de su base de datos!<br>(MYSQL error: <b>%s</b>)";
$_ISP[6]  = "No se pudo crear el archivo <b>config.php</b> , usted ya ha establecido permisos de escritura a la carpeta <b>incs</b> ?";
$_ISP[7]  = "nombre de usuario MYSQL:";
$_ISP[8]  = "contraseña MYSQL:";
$_ISP[9]  = "nombre de base de datos MYSQL:";
$_ISP[10] = "nombre del servidor de hospedaje MYSQL:";
$_ISP[11] = "Instalar ahora";
$_ISP[12] = "<font color=\"yellow\"><B>MYSQL - Instalación exitosa!</B></font>";
$_ISP[13] = "<font color=\"yellow\"><i><B>Importante:</B></i></font><br><B>Por favor elimine la carpeta <font color=\"yellow\"><i><B>install</B></i></font> y todos los archivos en ella de su servidor ahora!</B>";
$_ISP[14] = "<font color=\"yellow\"><i><B>Nota:</B></i></font><br>Su página de píxeles está lista para comenzar y puede acceder desde su <a href=\"../index.php\">dominio</a>.<br>Para acceder a su área de control, simplemente cliquee <font color=\"yellow\"><i><a href=\"../control/index.php\">http://yourdomain/control</a></i></font> en su navegador de internet y utilice la contraseña estándar <B>admin</B> (cambiar por favor). Que se divierta!";
$_ISP[15] = "Por favor ingrese el <B>nombre de usuario MYSQL</B>";
$_ISP[16] = "No ha establecido una <B>contraseña MYSQL</B>, si no utiliza una, le recomendamos que utilice alguna!";
$_ISP[17] = "Por favor ingrese el <B>nombre de su base de datos MYSQL</B>, que ha creado o quiere utilizar para su million script. En esta base de datos, las tablas serán creadas automáticamente.";
$_ISP[18] = "Por favor inserte el <B>nombre de servidor MYSQL</B> para acceder al servidor MYSQL.";
$_ISP[19] = "No se pudieron crear tablas en la base de datos!<br>(MYSQL error: <b>%s</b>)<br>Por favor pruebe otra vez.";






?>