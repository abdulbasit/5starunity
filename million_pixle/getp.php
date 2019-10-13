<?php
/******************************************************************************************
 *   Million Pixel Script (R)
 *   (C) 2005-2019 by texmedia.de, all rights reserved.
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
@ini_set('include_path', ".");
$getprocess = (int)$_REQUEST['gr'];
include_once ('incs/functions.php');
$VERSIONS[basename(__FILE__) ] = "3.7 PRO";
if (!$GRID[(int)$_REQUEST['gr']]['active'] || ($GRID[(int)$_REQUEST['gr']]['dontbuy'] && !$_SESSION['pass'])) {
    header("Location: index.php");
}
$newpoint = '<img src="' . $designpath . 'x.gif" align=absmiddle hspace=3><font class="getpixelerror">';
$newpoint2 = '<img src="' . $designpath . 'i.gif" align=absmiddle hspace=3><font class="getpixelinfo">';
$max_felder = $GRID[(int)$_GET['gr']]['maxfields'];
$min_felder = $GRID[(int)$_GET['gr']]['minfields'];
$BLOCKSIZE_X = $GRID[(int)$_GET['gr']]['blocksize_x'];
$BLOCKSIZE_Y = $GRID[(int)$_GET['gr']]['blocksize_y'];
$MWST = $GRID[(int)$_GET['gr']]['vat'];
$MWST_ADD = $GRID[(int)$_GET['gr']]['vat_add'];
if ($GRID[(int)$_GET['gr']]['grid_type']) {
    $x_plus = $gridsizes[$GRID[(int)$_GET['gr']]['grid_type']]['x+'];
    $y_plus = $gridsizes[$GRID[(int)$_GET['gr']]['grid_type']]['y+'];
    $x1 = $gridsizes[$GRID[(int)$_GET['gr']]['grid_type']]['x1'];
    $y1 = $gridsizes[$GRID[(int)$_GET['gr']]['grid_type']]['y1'];
    $x2 = $gridsizes[$GRID[(int)$_GET['gr']]['grid_type']]['x2'];
    $y2 = $gridsizes[$GRID[(int)$_GET['gr']]['grid_type']]['y2'];
    $MAPMAX_X = $gridsizes[$GRID[(int)$_GET['gr']]['grid_type']]['x'];
    $MAPMAX_Y = $gridsizes[$GRID[(int)$_GET['gr']]['grid_type']]['y'];
    $MAPMAX_X = (int)(((int)$MAPMAX_X + $BLOCKSIZE_X) / $BLOCKSIZE_X);
    $MAPMAX_Y = (int)(((int)$MAPMAX_Y) / $BLOCKSIZE_Y);
    $BANNER = true;
}
else {
    $MAPMAX_X = $GRID[(int)$_GET['gr']]['x'];
    $MAPMAX_Y = $GRID[(int)$_GET['gr']]['y'];
}
$MAPMAX = 100 * $MAPMAX_Y;
$CURR = $GRID[(int)$_GET['gr']]['currency'];
$MAXKB = (int)$GRID[(int)$_GET['gr']]['image_upload_kbytes'];
$CURR_DEC = (int)DB_query("SELECT `dec` FROM " . $dbprefix . "currency WHERE iso='" . $CURR . "'", 'dec');
$dhandle = opendir("logos/");
while ($files = readdir($dhandle)) {
    if ($files != "." && $files != ".." && strtolower($files) != ".htaccess" && strtolower($files) != ".htuser" && strtolower($files) != ".htgroup") {
        if (!$_SP[$files]) {
            $_SP[$files] = $files;
        }
    }
}
closedir($dhandle);
clearstatcache();
while (list($logodir, $logoname) = each($_SP)) {
    if (is_string($logodir) && substr($logodir, 0, 8) != 'pagename' && substr($logodir, 0, 10) != 'pageslogan') $LOGOS[] = array(
        $logodir => $logoname
    );
}
$spi_felder_array = $besetzte_felder = $geblockte_felder = $blocked_felder = array();
if ($spi_felder = DB_array("SELECT felder FROM " . $dbprefix . "user WHERE gridid='" . (int)$_GET['gr'] . "'", '*')) {
    while (list(, $spi_val) = each($spi_felder)) $spi_felder_array = array_merge($spi_felder_array, explode(',', $spi_val['felder']));
    for ($i = 0;$i < count($spi_felder_array);$i++) $besetzte_felder[$spi_felder_array[$i]] = true;
}
if ($blocked_felder = DB_query("SELECT felder FROM " . $dbprefix . "zones WHERE gridid='" . (int)$_GET['gr'] . "' AND zonetype=0 LIMIT 1", 'felder')) {
    $blocked_felder = explode(',', $blocked_felder);
    for ($i = 0;$i < count($blocked_felder);$i++) $geblockte_felder[$blocked_felder[$i]] = true;
}
if ($_SESSION['f'] != $_SESSION['fc']) unset($_SESSION['p']);
$f_hidden = array();
if ($_SESSION['f'] && $_SESSION['p'] && $_POST['end']) {
    $link_form = true;
    $temp_pic = $_SESSION['p'];
    $f_hidden = explode(',', $_SESSION['f']);
    if (check_manipulate($f_hidden, (int)$_POST['gr'], $geblockte_felder + $besetzte_felder)) {
        header("Location: " . $DOMAIN);
        exit;
    }
    $_POST['url'] = trim(strip_tags(str_replace('http://', '', str_replace('https://', '', $_POST['url']))));
    if (empty($_POST['url']) && !$GRID[(int)$_POST['gr']]['popup']) {
        $Nachricht .= $newpoint . $_SP[0] . '<br>';
        $Fehlerfeld['url'] = true;
    }
    elseif (!empty($_POST['url']) && eregi("[^-a-z����0-9_/?&=%+()*;,#@.:~\]", $_POST['url'])) {
        $Nachricht .= $newpoint . $_SP[2] . '<br>';
        $Fehlerfeld['url'] = true;
    }
    elseif (!empty($_POST['url']) && strpos($_POST['url'], '.') === false) {
        $Nachricht .= $newpoint . $_SP[1] . '<br>';
        $Fehlerfeld['url'] = true;
    }
    $URL = empty($_POST['url']) ? '' : $http[(int)$_POST['host']] . $_POST['url'];
    if (!empty($_POST['title']) && strlen($_POST['title']) > $GRID[(int)$_POST['gr']]['title_chars']) {
        $Nachricht .= $newpoint . sprintf($_SP[3], $GRID[(int)$_POST['gr']]['title_chars']) . '<br>';
        $Fehlerfeld['title'] = true;
    }
    $_POST['email'] = trim(strip_tags($_POST['email']));
    $_POST['email2'] = trim(strip_tags($_POST['email2']));
    if (empty($_POST['email'])) {
        $Nachricht .= $newpoint . $_SP[4] . '<br>';
        $Fehlerfeld['email'] = true;
    }
    elseif (!eregi("^[_a-z����0-9-]+(\.[_a-z����0-9-]+)*@([a-z����0-9-]+\.){1,3}([a-z����0-9-]{2,4})$", $_POST['email'])) {
        $Nachricht .= $newpoint . $_SP[5] . '<br>';
        $Fehlerfeld['email'] = true;
    }
    if (empty($_POST['email2'])) {
        $Nachricht .= $newpoint . $_SP[6] . '<br>';
        $Fehlerfeld['email2'] = true;;
    }
    elseif ($_POST['email'] != $_POST['email2']) {
        $Nachricht .= $newpoint . $_SP[7] . '<br>';
        $Fehlerfeld['email'] = true;
        $Fehlerfeld['email2'] = true;
    }
    $KOSTEN = calculate_costs($f_hidden, (int)$_GET['gr']);
    $BETRAG = $KOSTEN['summe_private'];
    if ($GRID[(int)$_POST['gr']]['unique_url'] && !empty($_POST['url'])) {
        if ($regdat = DB_query("SELECT DATE_FORMAT(regdat,'%d.%m.%Y') AS d FROM " . $dbprefix . "user WHERE gridid='" . (int)$_POST['gr'] . "'AND (email='" . mysql_real_escape_string($_POST['email']) . "' OR url='" . mysql_real_escape_string($http[(int)$_POST['host']] . strtolower($_POST['url'])) . "' OR url='" . mysql_real_escape_string(str_replace('www.', '', $http[(int)$_POST['host']] . $_POST['url'])) . "')", 'd')) {
            $Nachricht .= $newpoint . sprintf($_SP[8], $regdat);
            $Fehlerfeld['url'] = true;
            $Fehlerfeld['email'] = true;
        }
    }
    if ($BAN_DATA = DB_array("SELECT ban,ban_url,ban_title,ban_email FROM " . $dbprefix . "ban WHERE ban_url=1 OR ban_title=1 OR ban_email", '*')) {
        while (list(, $d) = each($BAN_DATA)) {
            if (strpos($d['ban'], '%') === false) $checkban = "/\b" . preg_quote($d['ban'], "/") . "\b/i";
            else $checkban = "/\b" . str_replace('%', '(.*)', preg_quote($d['ban'], "/")) . "\b/i";
            if ($d['ban_email'] && preg_match($checkban, $_POST['email'])) $Nachricht .= $newpoint . $_SP[122] . '<br>';
            if ($d['ban_url'] && preg_match($checkban, $_POST['url'])) $Nachricht .= $newpoint . $_SP[123] . '<br>';
            if ($d['ban_title'] && preg_match($checkban, $_POST['title'])) $Nachricht .= $newpoint . $_SP[124] . '<br>';
            if ($Nachricht) break;
        }
    }
    if (!$Nachricht) {
        $uniqid = uniqid('');
        if ($MWST > 0) {
            $tmp['%[BASE_AMOUNT]%'] = number_format($BETRAG, $CURR_DEC, $LANG_ACTIVE[$lang]['dec_point'], $LANG_ACTIVE[$lang]['thousands']) . ' ' . $CURR;
            if ($MWST_ADD) {
                $BETRAG_MWST = ($BETRAG * $MWST / 100);
                $tmp['%[VAT]%'] = $tmp['%[MWST]%'] = number_format($BETRAG_MWST, $CURR_DEC, $LANG_ACTIVE[$lang]['dec_point'], $LANG_ACTIVE[$lang]['thousands']) . ' ' . $CURR;
                $BETRAG = $BETRAG + $BETRAG_MWST;
            }
            else {
                $BETRAG_MWST = $BETRAG - (($BETRAG * 100) / ($MWST + 100));
                $tmp['%[VAT]%'] = $tmp['%[MWST]%'] = number_format($BETRAG_MWST, $CURR_DEC, $LANG_ACTIVE[$lang]['dec_point'], $LANG_ACTIVE[$lang]['thousands']) . ' ' . $CURR;
            }
            $tmp['%[VAT_INFO]%'] = $tmp['%[MWST_INFO]%'] = sprintf($_SP[100], $tmp['%[VAT]%']);
            $tmp['%[B]%'] = $tmp['%[AMOUNT]%'] = number_format($BETRAG, $CURR_DEC, $LANG_ACTIVE[$lang]['dec_point'], $LANG_ACTIVE[$lang]['thousands']) . ' ' . $CURR . ' ' . $tmp['%[VAT_INFO]%'];
        }
        else {
            $tmp['%[B]%'] = $tmp['%[BASE_AMOUNT]%'] = $tmp['%[AMOUNT]%'] = number_format($BETRAG, $CURR_DEC, $LANG_ACTIVE[$lang]['dec_point'], $LANG_ACTIVE[$lang]['thousands']) . ' ' . $CURR;
        }
        if (!$uid = DB_query("INSERT INTO " . $dbprefix . "user SET " . "gridid='" . (int)$_POST['gr'] . "'," . "email='" . mysql_real_escape_string($_POST['email']) . "'," . "url='" . mysql_real_escape_string($URL) . "'," . "title='" . mysql_real_escape_string($_POST['title']) . "'," . "felder='" . mysql_real_escape_string($_SESSION['f']) . "'," . "kaesten='" . count(explode(',', $_SESSION['f'])) . "'," . "bild='" . mysql_real_escape_string($_SESSION['p']) . "'," . "lang='" . mysql_real_escape_string($lang) . "'," . "bildext='" . mysql_real_escape_string($_SESSION['bildext']) . "'," . "kosten='" . mysql_real_escape_string($tmp['%[B]%']) . "'," . "amount='" . (float)$BETRAG . "'," . "currency='" . $CURR . "'," . "vat='" . (float)$BETRAG_MWST . "'," . "vat_add='" . (int)$MWST_ADD . "'," . "logincode='" . gcode() . "'," . "regdat=NOW(),uniqueid='" . $uniqid . "'", '##')) {
            $Nachricht .= $newpoint . $_SP[9] . '<br>';
        }
        else {
            if ($_SESSION['origimg'] && $GRID[(int)$_POST['gr']]['image_saveorig']) {
                if ($handle = fopen('grids/u' . $uid . '_orig' . $_SESSION['bildext'], 'wb')) {
                    fwrite($handle, base64_decode($_SESSION['origimg']));
                }
                fclose($handle);
                unset($_SESSION['origimg']);
            }
            if ($handle = fopen('grids/u' . $uid . '.png', 'wb')) {
                fwrite($handle, base64_decode($_SESSION['p']));
            }
            fclose($handle);
            $tmp['%[URL]%'] = $http[(int)$_POST['host']] . $_POST['url'];
            $tmp['%[PAYLINK]%'] = $CONFIG['scriptpath'] . '/pay.php?u=' . $uid;
            $tmp['%[KLINK]%'] = $CONFIG['scriptpath'] . '/index.php?i=' . $uid . '&k=' . $uniqid;
            $tmp['%[ALINK]%'] = $CONFIG['scriptpath'] . '/index.php?a=' . $uniqid;
            $tmp['%[DELETE_DAYS]%'] = $CONFIG['delete_days'];
            $tmp['%[USERID]%'] = $uid;
            $mailtemplate = $BETRAG > 0 ? 'mail_payment.txt' : 'mail_activate.txt';
            sendmail($_POST['email'], template($LANGDIR . $mailtemplate, $tmp) , '', '"' . $CONFIG['domainname'] . '" <' . $CONFIG['email_webmaster'] . '>');
            makemap(false, false, (int)$_POST['gr']);
            if ($GRID[(int)$_POST['gr']]['adminmail'] && $BETRAG > 0) {
                $tmp['%[TITLE]%'] = stripslashes($_POST['title']);
                $tmp['%[EMAIL]%'] = stripslashes($_POST['email']);
                $tmp['%[BLOCKS]%'] = count(explode(',', $_SESSION['f']));
                $tmp['%[LANGUAGE]%'] = $lang;
                $tmp['%[GRID]%'] = $GRID[(int)$_POST['gr']]['name'];
                $tmp['%[STATUS]%'] = $_SP[70];
                sendmail($CONFIG['email_webmaster'], template($CONFIG['admindir'] . '/lang/mail_admin_pixelinfo_' . $CONFIG['admin_language'] . '.txt', $tmp) , '', '"' . $CONFIG['domainname'] . '" <' . $CONFIG['email_webmaster'] . '>');
            }
            unset($_SESSION['f']);
            unset($_SESSION['fc']);
            unset($_SESSION['p']);
            unset($_SESSION['origimg']);
            unset($_SESSION['bildext']);
            if ($BETRAG > 0) {
                header("Location: " . $CONFIG['scriptpath'] . "/pay.php?u=$uid");
            }
            else {
                include_once ('header.php');
                print Template($LANGDIR . 'getend_free.htm', $tmp);
                include_once ('footer.php');
            }
            exit;
        }
    }
}
elseif ($_SESSION['f'] && ($_GET['ok'] || $_POST['upl'] || $_GET['v'])) {
    $f_hidden = explode(',', $_SESSION['f']);
    $link_logo = true;
    $_SESSION['fc'] = $_SESSION['f'];
    if (check_manipulate($f_hidden, (int)$_GET['gr'], $geblockte_felder + $besetzte_felder)) {
        header("Location: " . $DOMAIN);
        exit;
    }
    while (list(, $v) = each($f_hidden)) {
        $tops[] = (int)(($v - 1) / 100) * $BLOCKSIZE_Y;
        $lefts[] = fsubstr($v - 1, -2) * $BLOCKSIZE_X;
    }
    sort($tops);
    sort($lefts);
    $hoehe = $tops[count($tops) - 1] - $tops[0];
    $breite = $lefts[count($lefts) - 1] - $lefts[0];
    reset($f_hidden);
    $xy = array();
    while (list(, $v) = each($f_hidden)) {
        $top = (int)(($v - 1) / 100) * $BLOCKSIZE_Y;
        $left = fsubstr($v - 1, -2) * $BLOCKSIZE_X;
        $xy[(int)$i]['x'] = $left - $lefts[0];
        $xy[(int)$i++]['y'] = $top - $tops[0];
    }
    reset($f_hidden);
    if ($_POST['upl'] && is_array($_FILES)) {
        if (empty($_FILES['upload']['tmp_name']) || $_FILES['upload']['error'] == 4) $upl_error = $newpoint . $_SP[10] . '</font><br><br>';
        elseif ($_FILES['upload']['error'] == 1 || $_FILES['upload']['error'] == 2 || $_FILES['upload']['size'] > $MAXKB * 1024) $upl_error = $newpoint . sprintf($_SP[11], $MAXKB) . '</font><br><br>';
        elseif ($_FILES['upload']['error'] == 3) $upl_error = $newpoint . $_SP[12] . '</font><br><br>';
        elseif (is_uploaded_file($_FILES['upload']['tmp_name']) && $_FILES['upload']['size'] > 0) {
            $imageinfo = getimagesize($_FILES['upload']['tmp_name']);
            $imagetype = array(
                1 => '.gif',
                '.jpg',
                '.png'
            );
            if ($imageinfo[2] > 0 && $imageinfo[2] < 4) $Ext = $imagetype[$imageinfo[2]];
            $image = $_FILES['upload']['tmp_name'];
            if ($Ext) {
                $pictemp = true;
                if ($temp_pic = include_once ('ci.php')) {
                    $link_form = true;
                    $Focusform = 'u';
                    $Focusfeld = 'url';
                    $_SESSION['p'] = $temp_pic;
                }
            }
            else {
                $upl_error = $newpoint . $_SP[13] . '</font><br><br>';
            }
        }
        else {
            $upl_error = $newpoint . $_SP[12] . '</font><br><br>';
        }
    }
    if (!$temp_pic && $_SESSION['p'] && !$_GET['v']) {
        $temp_pic = $_SESSION['p'];
    }
    elseif (!$temp_pic) {
        $logodir = 'logos/' . key($LOGOS[(int)$_GET['ld']]) . '/';
        $image = ($_GET['v'] && file_exists($logodir . $_GET['v'])) ? $logodir . $_GET['v'] : $designpath . 'pre_pic.png';
        $imageinfo = getimagesize($image);
        $imagetype = array(
            1 => '.gif',
            '.jpg',
            '.png'
        );
        if ($imageinfo[2] > 0 && $imageinfo[2] < 4) $Ext = $imagetype[$imageinfo[2]];
        if ($_GET['v']) $pictemp = true;
        $temp_pic = include_once ('ci.php');
        $_SESSION['p'] = $temp_pic;
        if ($_GET['v'] && $temp_pic) {
            $link_form = true;
            $Focusform = 'u';
            $Focusfeld = 'url';
        }
    }
    $KOSTEN = calculate_costs($f_hidden, (int)$_GET['gr']);
    $BETRAG = $KOSTEN['summe_private'];
}
elseif ((isset($_GET['x']) && isset($_GET['y'])) || $_GET['back'] || $_GET['r']) {
    $Y = (int)(((int)$_GET['y'] - $y_plus) / $BLOCKSIZE_Y);
    $X = (int)(((int)$_GET['x'] - $x_plus + $BLOCKSIZE_X) / $BLOCKSIZE_X);
    $F = $X + ($Y * 100);
    if ($_SESSION['f']) {
        $f_hidden = explode(',', $_SESSION['f']);
    }
    if ($_GET['ms']) {
        if ($ms_hidden = explode('-', $_GET['ms'])) {
            $all_hidden = array_merge($f_hidden, $ms_hidden);
            $all_hidden = array_unique($all_hidden);
            $ff_hidden = array();
            if (count($all_hidden) > 1 && $Z == sub()) {
                for ($e = 0;$e < count($all_hidden);$e++) {
                    if ($all_hidden[$e] > 0) {
                        for ($i = 0;$i < count($all_hidden);$i++) {
                            if (!$besetzte_felder[$all_hidden[$e]] && !$geblockte_felder[$all_hidden[$e]] && $all_hidden[$e] > 0 && ($all_hidden[$i] + 100 == $all_hidden[$e] || $all_hidden[$i] - 100 == $all_hidden[$e] || $all_hidden[$i] + 1 == $all_hidden[$e] || $all_hidden[$i] - 1 == $all_hidden[$e])) {
                                $ff_hidden[] = $all_hidden[$e];
                                break(1);
                            }
                        }
                    }
                }
                if (!empty($ff_hidden)) {
                    $f_hidden = $ff_hidden;
                }
            }
        }
    }
    function checknbs($feld) {
        global $f_hidden, $zielfelder, $felder_checked;
        $felder_checked[] = $feld;
        if (in_array($feld - 100, $f_hidden) && !in_array($feld - 100, $felder_checked)) $local_feld[] = $feld - 100;
        if (in_array($feld + 1, $f_hidden) && !in_array($feld + 1, $felder_checked)) $local_feld[] = $feld + 1;
        if (in_array($feld + 100, $f_hidden) && !in_array($feld + 100, $felder_checked)) $local_feld[] = $feld + 100;
        if (in_array($feld - 1, $f_hidden) && !in_array($feld - 1, $felder_checked)) $local_feld[] = $feld - 1;
        for ($i = 0;$i < count($local_feld);$i++) {
            if (in_array($local_feld[$i], $zielfelder)) {
                $zielfelder = array_remove($zielfelder, $local_feld[$i]);
            }
            if (empty($zielfelder)) return true;
            else checknbs($local_feld[$i]);
        }
        if (empty($zielfelder)) return true;
        else return false;
    }
    if ($_GET['md']) {
        if ($all_hidden = explode('-', $_GET['md'])) {
            for ($i = 0;$i < count($all_hidden);$i++) {
                $zielfelder = array();
                for ($e = 0;$e < count($all_hidden);$e++) {
                    if ($all_hidden[$e] > 0 && in_array($all_hidden[$e], $f_hidden)) {
                        $zielfelder = $felder_checked = array();
                        if (in_array($all_hidden[$e] - 100, $f_hidden)) $zielfelder[] = $all_hidden[$e] - 100;
                        if (in_array($all_hidden[$e] + 1, $f_hidden)) $zielfelder[] = $all_hidden[$e] + 1;
                        if (in_array($all_hidden[$e] + 100, $f_hidden)) $zielfelder[] = $all_hidden[$e] + 100;
                        if (in_array($all_hidden[$e] - 1, $f_hidden)) $zielfelder[] = $all_hidden[$e] - 1;
                        if (count($zielfelder) == 1) {
                            $f_hidden = array_remove($f_hidden, $all_hidden[$e]);
                        }
                        elseif (count($zielfelder) > 1) {
                            $md_startfeld = array_pop($zielfelder);
                            $felder_checked[] = $all_hidden[$e];
                            if (checknbs($md_startfeld)) {
                                $f_hidden = array_remove($f_hidden, $all_hidden[$e]);
                                $i++;
                            }
                        }
                    }
                }
            }
        }
    }
    if (!$_GET['back'] && !$_GET['r']) {
        if (in_array($F, $f_hidden) && !$_GET['ms'] && !$_GET['md']) {
            $b_url = $newpoint2 . $_SP[14];
        }
        elseif ($besetzte_felder[$F]) $b_url = $newpoint . '<font class="getpixelinfo">' . sprintf($_SP[16], $F);
        elseif ($geblockte_felder[$F]) $b_url = $newpoint . '<font class="getpixelinfo">' . sprintf($_SP[15], $F);
        elseif ($X > $MAPMAX_X || $Y >= $MAPMAX_Y) $b_url = $newpoint2 . $_SP[17];
        elseif ($BANNER && (int)$_GET['x'] >= $x1 && (int)$_GET['x'] <= $x2 && (int)$_GET['y'] >= $y1 && (int)$_GET['y'] <= $y2) $b_url = $newpoint2 . $_SP[17];
        elseif ($Z != sub()) {
            $b_url = $newpoint2 . $_SP[17];
            add($RGRID);
        }
        elseif (empty($f_hidden) && !$_GET['md']) $f_hidden[] = $F;
        elseif ((count($f_hidden) < $max_felder || $max_felder == false) && !$_GET['md'] && !$_GET['ms']) {
            reset($f_hidden);
            $cF = (int)fsubstr($F, -2);
            while (list(, $v) = each($f_hidden)) {
                if ($cF == 0) {
                    if ($v == $F - 1 || (($F == 100 && $v == 100 * 2) || ($F == $MAPMAX && $v == $MAPMAX - 100) || ($F > 100 && $F < $MAPMAX && ($v == $F + 100 || $v == $F - 100)))) $ok = true;
                }
                elseif ($cF == 1) {
                    if ($v == $F + 1 || (($F == 1 && $v == 2) || ($F == $MAPMAX - 99 && $v == $MAPMAX - 199) || ($F > 1 && $F < $MAPMAX - 99 && ($v == $F + 100 || $v == $F - 100)))) $ok = true;
                }
                elseif ($v == $F + 100 || $v == $F - 100 || $v == $F - 1 || $v == $F + 1) {
                    $ok = true;
                }
                if ($ok) break;
            }
            reset($f_hidden);
            if ($ok) $f_hidden[] = $F;
            else $b_url = $newpoint . $_SP[18];
        }
        elseif ((count($f_hidden) > $max_felder && $max_felder > 0) || (count($f_hidden) == $max_felder && !$_GET['md'] && !$_GET['ms'])) {
            $b_url = $newpoint . sprintf($_SP[19], $max_felder);
            $anzahl_entfernen = count($f_hidden) - $max_felder;
            for ($i = 0;$i < $anzahl_entfernen;$i++) {
                $dummy = array_pop($f_hidden);
            }
        }
    }
    if (count($f_hidden)) {
        $_SESSION['f'] = implode(',', $f_hidden);
        if (count($f_hidden) >= $min_felder) {
            $SUBMIT = '<input type="submit" name="ok" value=" ' . $_SP[20] . '" class="linkpixel_button">';
            $BACKLINK = '<a href="getp.php?gr=' . (int)$_GET['gr'] . '&pa=' . (int)$_REQUEST['pa'] . '">' . $_SP[21] . '</a>';
        }
        $KOSTEN = calculate_costs($f_hidden, (int)$_GET['gr']);
        $BETRAG = $KOSTEN['summe_private'];
    }
    elseif ($_GET['r']) {
        unset($_SESSION['f']);
    }
    if (count($f_hidden) == $max_felder && $max_felder == 1 && !$_GET['back'] && !$_GET['r']) header("Location: getp.php?gr=" . (int)$_GET['gr'] . "&pa=" . (int)$_REQUEST['pa'] . "&ok=1");
}
else {
    unset($_SESSION['f']);
    unset($_SESSION['fc']);
    unset($_SESSION['p']);
}
include_once ('header.php');
if ($link_form) {
    if ($BETRAG > 0) {
        $tmp['%[INFO_PAY_START]%'] = '';
        $tmp['%[INFO_PAY_END]%'] = '';
        $tmp['%[INFO_FREE_START]%'] = '<!--';
        $tmp['%[INFO_FREE_END]%'] = '-->';
    }
    else {
        $tmp['%[INFO_PAY_START]%'] = '<!--';
        $tmp['%[INFO_PAY_END]%'] = '-->';
        $tmp['%[INFO_FREE_START]%'] = '';
        $tmp['%[INFO_FREE_END]%'] = '';
    }
    $tmp['%[BACKLINK]%'] = 'getp.php?gr=' . (int)$_GET['gr'] . '&ok=1&pa=' . (int)$_REQUEST['pa'] . '&ld=' . urlencode($_GET['ld']);
    $tmp['%[IMAGE]%'] = '<img src="sp.php">';
    $tmp['%[NACHRICHT]%'] = $Nachricht;
    $tmp['%[FORM]%'] = '<form method="POST" name="u" action="">';
    $tmp['%[FORM]%'] .= '<input type="hidden" name="xy" value="' . serialize($xy) . '">';
    $tmp['%[FORM]%'] .= '<input type="hidden" name="gr" value="' . (int)$_GET['gr'] . '">';
    $tmp['%[FORM]%'] .= '<input type="hidden" name="pa" value="' . (int)$_REQUEST['pa'] . '">';
    $tmp['%[EXPIRE_DAYS]%'] = $GRID[(int)$_GET['gr']]['expire_days'] ? $GRID[(int)$_GET['gr']]['expire_days'] : '';
    $tmp['%[EXPIRE_MONTHS]%'] = $GRID[(int)$_GET['gr']]['expire_days'] ? (int)($GRID[(int)$_GET['gr']]['expire_days'] / 30) : '';
    $tmp['%[EXPIRE_YEARS]%'] = $GRID[(int)$_GET['gr']]['expire_days'] ? (int)($GRID[(int)$_GET['gr']]['expire_days'] / 365) : '';
    $tmp['%[MAXCHARS]%'] = $GRID[(int)$_GET['gr']]['title_chars'];
    $selected[1] = ' selected';
    $tmp['%[INPUT_URL]%'] = '<select name="host" class="savepixel_http"><option value="0"' . $selected[(int)$_POST['host']] . '>http://</option><option value="1"' . $selected[(int)$_POST['host']] . '>https://</option></select>';
    $tmp['%[INPUT_URL]%'] .= '<input type="text" name="url" class="savepixel_url" maxlength="1000" value="' . htmlspecialcharsISO(stripslashes($_POST['url'])) . '" tabindex="1"';
    if ($Fehlerfeld['url']) $tmp['%[INPUT_URL]%'] .= ' style="border: 1px solid red"';
    $tmp['%[INPUT_URL]%'] .= '">';
    $tmp['%[INPUT_TITLE]%'] = '<input type="text" name="title" class="savepixel_inputs" maxlength="' . $GRID[(int)$_POST['gr']]['title_chars'] . '" value="' . htmlspecialcharsISO(stripslashes($_POST['title'])) . '" tabindex="2"';
    if ($Fehlerfeld['title']) $tmp['%[INPUT_TITLE]%'] .= ' style="border: 1px solid red"';
    $tmp['%[INPUT_TITLE]%'] .= '">';
    $tmp['%[INPUT_EMAIL1]%'] = '<input type="text" name="email" class="savepixel_inputs" maxlength="90" tabindex="3" value="' . htmlspecialcharsISO(stripslashes($_POST['email'])) . '"';
    if ($Fehlerfeld['email']) $tmp['%[INPUT_EMAIL1]%'] .= ' style="border: 1px solid red"';
    $tmp['%[INPUT_EMAIL1]%'] .= '">';
    $tmp['%[INPUT_EMAIL2]%'] = '<input type="text" name="email2" class="savepixel_inputs" maxlength="90" tabindex="3" value="' . htmlspecialcharsISO(stripslashes($_POST['email2'])) . '"';
    if ($Fehlerfeld['email2']) $tmp['%[INPUT_EMAIL2]%'] .= ' style="border: 1px solid red"';
    $tmp['%[INPUT_EMAIL2]%'] .= '">';
    $tmp['%[SUBMIT]%'] = '<input type="submit" name="end" value=" ' . $_SP[22] . ' "  class="savepixel_submitbutton">';
    if ($MWST > 0) {
        $tmp['%[VAT]%'] = $tmp['%[MWST]%'] = number_format($MWST, 1, $LANG_ACTIVE[$lang]['dec_point'], $LANG_ACTIVE[$lang]['thousands']) . ' %';
        if ($MWST_ADD) $BETRAG = $BETRAG + ($BETRAG * $MWST / 100);
        $tmp['%[BETRAG]%'] = $tmp['%[AMOUNT]%'] = number_format($BETRAG, $CURR_DEC, $LANG_ACTIVE[$lang]['dec_point'], $LANG_ACTIVE[$lang]['thousands']) . ' ' . $CURR . ' ' . sprintf($_SP[100], $tmp['%[VAT]%']);
    }
    else {
        $tmp['%[BETRAG]%'] = $tmp['%[AMOUNT]%'] = number_format($BETRAG, $CURR_DEC, $LANG_ACTIVE[$lang]['dec_point'], $LANG_ACTIVE[$lang]['thousands']) . ' ' . $CURR;
        $tmp['%[VAT]%'] = $tmp['%[MWST]%'] = '';
    }
    print Template($LANGDIR . 'grid_' . (int)$_GET['gr'] . '_getstep4_save.htm', $tmp);
    include_once ('incs/java_focus.php');
}
elseif ($link_logo) {
    $tmp['%[FORM]%'] = $tmp['%[INPUT_FILE]%'] = $tmp['%[SUBMIT]%'] = $tmp['%[UPLOAD_START]%'] = $tmp['%[UPLOAD_END]%'] = $tmp['%[LOGOS_START]%'] = $tmp['%[LOGOS_END]%'] = '';
    $tmp['%[BACKLINK]%'] = 'getp.php?gr=' . (int)$_GET['gr'] . '&pa=' . (int)$_REQUEST['pa'] . '&back=1';
    $tmp['%[IMAGE]%'] = '<img src="sp.php">';
    $tmp['%[NACHRICHT]%'] = $upl_error;
    $tmp['%[KBYTE]%'] = $MAXKB;
    if ($GRID[(int)$_GET['gr']]['image_upload']) {
        $tmp['%[FORM]%'] = '<form method="POST" enctype="multipart/form-data" name="up"><input type="hidden" name="f" value="' . implode(',', $f_hidden) . '">';
        $tmp['%[FORM]%'] .= '<input type="hidden" name="gr"  value="' . (int)$_GET['gr'] . '">';
        $tmp['%[FORM]%'] .= '<input type="hidden" name="pa"  value="' . (int)$_REQUEST['pa'] . '">';
        $tmp['%[INPUT_FILE]%'] = '<input type="file" name="upload" maxbyte="' . ($MAXKB * 1024) . '" class="savepixel_fileupload" onChange="document.getElementById(\'previewImage\').src = this.value;">';
        $tmp['%[SUBMIT]%'] = '<input type="submit" name="upl" value="&gt;&gt;&gt; ' . $_SP[23] . '" class="savepixel_fileupload_button">';
        $tmp['%[UPLOAD_END]%'] = '<img src="' . $designpath . 'b.gif" id="previewImage" style="margin-top:5;">';
    }
    else {
        $tmp['%[UPLOAD_START]%'] = '<!--';
        $tmp['%[UPLOAD_END]%'] = '-->';
    }
    ob_start(); ?>   <table cellspacing=8 width="100%">    </form>    <form method="GET" name="vo">    <input type="hidden" name="v" value=1>    <input type="hidden" name="gr" value=<?=(int)$_GET['gr'] ?>>    <input type="hidden" name="pa" value=<?=(int)$_REQUEST['pa'] ?>>    <input type="hidden" name="ld" value="<?php print $_GET['ld']; ?>">    <?php print '<tr><td colspan=21><table cellspacing=10><tr>';
    while (list(, $lv) = each($LOGOS)) print '<td align=center style="padding:2px 15px" class="' . ((int)$_GET['ld'] == (int)($k) ? 'logos_highlighted' : 'logos') . '"><a class="logos" href="getp.php?gr=' . (int)$_GET['gr'] . '&pa=' . (int)$_REQUEST['pa'] . '&ok=1&ld=' . (int)($k++) . '">' . current($lv) . '</a></td>';
    $logodir = 'logos/' . key($LOGOS[(int)$_GET['ld']]) . '/';
    $handle = opendir($logodir);
    print '</tr></table></td></tr><tr>';
    while ($file = readdir($handle)) {
        if ($file != "." && $file != ".." && strtolower($file) != ".htaccess" && strtolower($file) != ".htuser" && strtolower($file) != ".htgroup") {
            if ($td > 20) {
                $td = 0;
                print '</tr><tr>';
            }
            print '<td><input type="image" src="' . $logodir . $file . '" onClick="this.form.v.value=\'' . $file . '\'"></td>';
            $td++;
        }
    }
    print '</tr>';
    closedir($handle); ?>   </table></form>   <?php if ($GRID[(int)$_GET['gr']]['image_logos']) {
        $tmp['%[LOGOS]%'] = ob_get_contents();
    }
    else {
        $tmp['%[LOGOS_START]%'] = '<!--';
        $tmp['%[LOGOS_END]%'] = '-->';
        $tmp['%[LOGOS]%'] = '';
    }
    ob_end_clean();
    print Template($LANGDIR . 'grid_' . (int)$_GET['gr'] . '_getstep3_upload.htm', $tmp);
}
else {
    $gridtype = $GRID[(int)$_GET['gr']]['grid_type'];
    $gwidth = ($gridtype) ? $gridsizes[$gridtype]['x'] : (int)($GRID[(int)$_GET['gr']]['x'] * $GRID[(int)$_GET['gr']]['blocksize_x']);
    $gheight = ($gridtype) ? $gridsizes[$gridtype]['y'] : (int)($GRID[(int)$_GET['gr']]['y'] * $GRID[(int)$_GET['gr']]['blocksize_y']);
    $gridfile = 'grids/pregrid_' . (int)$_GET['gr'] . '.' . $iformat[$GRID[(int)$_GET['gr']]['image_format']];
    $blockimg = !empty($GRID[(int)$_GET['gr']]['blockimage']) ? $designpath . $GRID[(int)$_GET['gr']]['blockimage'] : $designpath . 'fa.gif';
    $tmp['%[MINFIELDS]%'] = $min_felder ? sprintf($_SP[79], $min_felder) : '';
    $tmp['%[MAXFIELDS]%'] = $max_felder ? sprintf($_SP[24], $max_felder) : $_SP[25];
    $tmp['%[LINKBUTTON]%'] = $SUBMIT;
    $tmp['%[INFO]%'] = $b_url;
    $tmp['%[BACKLINK]%'] = $BACKLINK;
    $tmp['%[SELECTED_PIXEL_INFO]%'] = $tmp['%[AMOUNT]%'] = '';
    $tmp['%[FORM]%'] = '<form method="GET" name="spi" action="getp.php"><input type="hidden" name="gr" value="' . $_GET['gr'] . '"><input type="hidden" name="pa" value="' . $_REQUEST['pa'] . '"><input type="hidden" name="ms" value=""><input type="hidden" name="md" value="">';
    if (is_array($f_hidden)) {
        if (count($f_hidden) > 0) $tmp['%[BETRAG]%'] = $tmp['%[AMOUNT]%'] = $BETRAG > 0 ? '<br>' . $_SP[26] . ' ' . number_format($BETRAG, $CURR_DEC, $LANG_ACTIVE[$lang]['dec_point'], $LANG_ACTIVE[$lang]['thousands']) . ' ' . $CURR : '';
        if (count($f_hidden) > 0 && $MWST > 0) {
            $tmp['%[VAT]%'] = $tmp['%[MWST]%'] = number_format($MWST, 1, $LANG_ACTIVE[$lang]['dec_point'], $LANG_ACTIVE[$lang]['thousands']) . ' %';
            $tmp['%[BETRAG]%'] = $tmp['%[AMOUNT]%'] = $tmp['%[AMOUNT]%'] . '<br>' . ($MWST_ADD ? sprintf($_SP[101], $tmp['%[VAT]%']) : sprintf($_SP[100], $tmp['%[VAT]%']));
        }
        else {
            $tmp['%[VAT]%'] = $tmp['%[MWST]%'] = '';
        }
        if (count($f_hidden) > 1) $tmp['%[SELECTED_PIXEL_INFO]%'] = count($f_hidden) . ' ' . $_SP[28] . ' ';
        elseif (count($f_hidden) == 1) $tmp['%[SELECTED_PIXEL_INFO]%'] = count($f_hidden) . ' ' . $_SP[27] . ' ';
        while (list(, $v) = each($f_hidden)) {
            $FL .= '<img src="' . $blockimg . '" height="' . $BLOCKSIZE_Y . '" width="' . $BLOCKSIZE_X . '" border="0" style="position:absolute;left:' . ((fsubstr($v - 1, -2) * $BLOCKSIZE_X) + $x_plus) . 'px;top:' . (((int)(($v - 1) / 100) * $BLOCKSIZE_Y) + $y_plus) . 'px;z-index:0">';
        }
    }
    ob_start(); ?>   <table width=<?=$gwidth ?> height=<?=$gheight ?> style="background: url(<?=$gridfile ?>?x=<?=@filemtime($gridfile) ?>) no-repeat;background-position:top center" style="margin-top:15px">  <tr><td><div style="position:relative;width:<?=$gwidth ?>;height:<?=$gheight ?>" id=pixfl  onMouseup="stopdraw()" onMousedown="startdraw()">    <input type="image" src="style/b.gif" width=<?=$gwidth ?> height=<?=$gheight ?> style="position:absolute;z-index:1" id="pixb">    <?=$FL ?>    </div></td></tr>    </form>   </table>   <?php $tmp['%[PIXELGRID]%'] = ob_get_contents();
    ob_end_clean();
    if ($_GET['y']) {
        $scrollpage = '     <script type="text/javascript">   var a = window.innerHeight ? window.innerHeight : document.body.offsetHeight;   if(a < document.all.pixfl.offsetTop+' . $_GET['y'] . ')    window.scrollTo(' . $_GET['x'] . ', ' . $_GET['y'] . ');     </script>     ';
    }
    print Template($LANGDIR . 'grid_' . (int)$_GET['gr'] . '_getstep2_select.htm', $tmp);
    include ('select.php');
}
include_once ('footer.php'); ?>
