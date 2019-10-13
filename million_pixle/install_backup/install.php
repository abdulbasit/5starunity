<?php
/******************************************************************************************
*   Million Pixel Script (R)
*   (C) 2005-2006 by texmedia.de, all rights reserved.
*   "Million Pixel Script" and "Pixel Script" is a registered Trademark of texmedia.
*
*   This script code is protected by international Copyright Law.
*   Any violations of copyright will be dealt with seriously,
*   and offenders will be prosecuted to the fullest extent of the law.
*
*   This program is not for free, you have to buy a copy-license for your domain.
*   This copyright notice and the header above have to remain intact.
*   You do not have the permission to sell the code or parts of this code or chanced
*   parts of this code for this program.
*   This program is distributed "as is" and without warranty of any
*   kind, either express or implied.
*
*   Please check
*   http://www.texmedia.de
*   for Bugfixes, Updates and Support.
******************************************************************************************/

// INSTALL-ROUTINE
// v3.7
//
// 26.03.2019
//
// DO NOT CHANGE ANYTHING

define("VERSION", "3.7");
define("COPYRIGHT", '&copy; 2006-2019 <a href="http://www.texmedia.de/">texmedia.de</a> | All rights reserved.');
define("SAFEMODE", @ini_get("safe_mode"));
define("PMF_ROOT_DIR", dirname(dirname(__FILE__)).'/');
define("UPDATEDIR", dirname(__FILE__).'/');


// Sprache
$lang = strtolower(substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2));
if(!@include('lang_install_'.$lang.'.php')) {
    $lang = "en";
    include('lang_install_'.$lang.'.php');
}


error_reporting(0);
$errortext = array();

function DB_query($anfrage,$wert='') {
	global $mycon;
    if(!$ergebnis = mysql_query($anfrage)) {
    	#print 'Mysql-Import-Error: '.mysql_error() ;
		return false;
	}
    if($wert=="#")
        if(strstr($anfrage,"SELECT"))  return mysql_num_rows($ergebnis);
        else                           return mysql_affected_rows($mycon);
    elseif($wert=="##") return mysql_insert_id();
    elseif($wert=="")   return @mysql_fetch_array($ergebnis);
    elseif($wert=="*")  return @mysql_fetch_array($ergebnis,MYSQLI_ASSOC);
    else {
        $dbwert = mysql_fetch_array($ergebnis);
        @mysql_free_result($ergebnis);
        return $dbwert[$wert];
    }
}


// Checke Schreibrechte
$checkfolders = array('incs',
                      'grids',
                      'lang',
                      'mydir'
                     );

$faileddirs = array();
foreach ($checkfolders AS $dir) {
    if (!is_writable(PMF_ROOT_DIR.$dir)) {
        $errortext[] = sprintf($_ISP[2],$lang);
        $stop = true;
        $schreibrechte = true;
        break;
    }
}


//-----------------------------------
if($_GET['posted'] && !$stop) {

    if(!$_GET['sql_name'])   $errortext[] = $_ISP[15];
    if(!$_GET['sql_dbname']) $errortext[] = $_ISP[17];
    if(!$_GET['sql_host'])   $errortext[] = $_ISP[18];

    $dbprefix = 'pixel_';

    if(!empty($errortext)) {
        $stop = true;
    }
    if(!$_GET['sql_pass'])   $errortext[] = $_ISP[16];

    $dbhost = $_GET['sql_host'];
    $dbuser = $_GET['sql_name'];
    $dbpwd = $_GET['sql_pass'];
    $dbname = $_GET['sql_dbname'];

    include('../incs/dblib.php');

    if(!$mycon = DBconnect()) {
        $errortext[] = sprintf($_ISP[4],mysql_error());
        $stop = true;

    } elseif(!$handle = fopen(PMF_ROOT_DIR.'incs/config.php', "w")) {
        $errortext[] = $_ISP[6];
        $stop = true;
    } else {
        fwrite($handle, "<?PHP \n ".'$dbuser'." = '".$_GET['sql_name']."';\n ".'$dbpwd'." = '".$_GET['sql_pass']."';\n ".'$dbname'." = '".$_GET['sql_dbname']."';\n ".'$dbhost'." = '".$_GET['sql_host']."';\n ".'$dbprefix'." = '".$dbprefix."';\n?>");
        fclose($handle);

        if(!include('createtables.php')) {
            $errortext[] = sprintf($_ISP[19],mysql_error());
            $stop = true;
            unlink('incs/config.php');
        } else {
            $finish = true;
        }
    }

}

if(!empty($errortext)) $Nachricht = '&middot;'.implode('<br>&middot;',$errortext);


?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>PHP Million Script Installation</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</head>
<style>
<!--
body,table,td {  font-family:  Arial, Helvetica, sans-serif; font-size: 13px; }
h1   {  font-family:  Arial, Helvetica, sans-serif; font-size: 16px; }
-->
</style>

<body bgcolor="#6275D6" style="margin:0 20" text="#FFFFFF">
<a href="<?=__FILE__?>"><img src="ilo_pro.gif" border=0></a><br>
<img src="install.gif"><br>
<img src="hr.gif" width=100%>


<form method="GET" name="millionform" action="">
<input type="hidden" name="posted" value="1">
<?php
        if($stop) {
            print '<table cellpadding=6 style="border:2px dashed #FF0000;"><tr><td><font color="#FFFFFF">'.$Nachricht.'</td></tr></table>';
        } elseif($_GET['posted']) {
            if($Nachricht) {
                print '<table cellpadding=6 style="border:1px dashed #FF0000;"><tr><td><font color="#FFFFFF">'.$Nachricht.'</td></tr></table>';
            }


        }

        if((!$_GET['posted'] || $stop) && !$schreibrechte) {
            ?>
            <h1><?=$_ISP[0]?></h1>

            <?=$_ISP[1]?>
            <br><br>


            <table border=0>
                <tr><td nowrap><b><font color="#FEC501"><?php print $_ISP[7];?></td><td><input type="text" name="sql_name"   value="<?=htmlentities($_GET['sql_name'])?>" style="width:250"></td></tr>
                <tr><td nowrap><b><font color="#FEC501"><?php print $_ISP[8];?></td><td><input type="password" name="sql_pass"   value="<?=htmlentities($_GET['sql_pass'])?>" style="width:250"></td></tr>
                <tr><td nowrap><b><font color="#FEC501"><?php print $_ISP[9];?></td><td><input type="text" name="sql_dbname" value="<?=htmlentities($_GET['sql_dbname'])?>" style="width:250"></td></tr>
                <tr><td nowrap><b><font color="#FEC501"><?php print $_ISP[10];?></td><td><input type="text" name="sql_host"  value="<?=htmlentities($_GET['sql_host'])?>" style="width:250"></td></tr>
            </table>

            <br><br>
            <img src="hr.gif" width=100%>

            <input type="submit" style="font-weight:bold" value="   <?php print $_ISP[11];?>   ">
            <br><br>
            <?php
        } elseif(!$schreibrechte) {
            ?>
            <h1><?PHP print $_ISP[12].'<br><br>'.$_ISP[14].'<br><br>'.$_ISP[13].'<br><br>'.$_ISP[13];?></h1>
            <?php
        }


?>

</form>
</body>
</html>
