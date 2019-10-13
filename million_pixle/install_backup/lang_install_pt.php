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

$_ISP[0]  = "<b>Instalação-MYSQL</b>";
$_ISP[1]  = "Por favor preencha a informação sobre a base de dados da sua ligação mysql<br> e clique em <b>Instalar agora</b>.";
$_ISP[2]  = "<font color=\"red\"><b>Não activou todas as permissões de ecrita dos ficheiros!</b></font><br>Por favor faça este passo, como descrito em <b><a href=\"install.htm\" target=\"_blank\" style=\"color:white\">install.htm</a></b>.<br>Depois de efectado esse passo, poderá continuar com esta instalação-MYSQL.";
$_ISP[3]  = "Todos as permissões de escrita dos ficheiros estão activadas.";
$_ISP[4]  = "Não foi possivel ligar ao servidor MYSQL. Por favor verifique <B>todos</B> os seus detalhes!<br>(MYSQL error: <b>%s</b>)";
$_ISP[5]  = "Não foi possivel ligar á <B>Base de dados MYSQL</B> '%s', Por favor verifique o nome da sua database!<br>(MYSQL error: <b>%s</b>)";
$_ISP[6]  = "Não foi possivel criar o ficheiro <b>config.php</b>, ja definiu as permissões de escrita para a pasta <b>incs</b>?";
$_ISP[7]  = "Nome de utilizador MYSQL:";
$_ISP[8]  = "Password MYSQL:";
$_ISP[9]  = "Nome da base de dados MYSQL:";
$_ISP[10] = "Nome do servidor de alojamento MYSQL:";
$_ISP[11] = "Instalar agora";
$_ISP[12] = "<font color=\"yellow\"><B>MYSQL - Installation successfull!</B></font>";
$_ISP[13] = "<font color=\"yellow\"><i><B>Importante:</B></i></font><br><B>Por favor apague a pasta <font color=\"yellow\"><i><B>instalar</B></i></font> e todos os seus ficheiros, do seu servidor agora!</B>";
$_ISP[14] = "<font color=\"yellow\"><i><B>Nota:</B></i></font><br>A sua pixel page esta pronta para começar e pode ser acedida através do seu <a href=\"../index.php\">domínio</a>.<br>Para conseguir aceder á sua área de controlo, escreva simplesmente <font color=\"yellow\"><i><a href=\"../control/index.php\">http://yourdomain/control</a></i></font> no seu browser e use a password padrão <B>admin</B> (Por favor altere-a). Divirta-se!";
$_ISP[15] = "Por favor insira o <B>Nome de utilizador MYSQL</B>";
$_ISP[16] = "Não definiu a <B>Password MYSQL</B>, se não usar uma, nós recomendamos-lhe que é da maior importância que use uma!";
$_ISP[17] = "Por favor insira o <B>nome da base de dados MYSQL</B>, que foi criada por si ou a que você quer usar no seu million script. Nesta base de dados, as tabelas serão criadas automaticamente.";
$_ISP[18] = "Por favor insira o <B>Nome do alojador MYSQL</B> para ter acesso ao servidor MYSQL.";
$_ISP[19] = "Não foi possível criar tabelas na base de dados!<br>(MYSQL error: <b>%s</b>)<br>Por favor tente de novo.";






?>