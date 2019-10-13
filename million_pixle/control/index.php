<?php
/******************************************************************************************
 *   Million Pixel Script (R) *   (C) 2005-2019 by texmedia.de, all rights reserved.
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
#error_reporting(0);
$adminprocess = true;
$VERSIONS[basename(__FILE__) ] = "3.7 PRO";

if (!file_exists('../incs/config.php')) {
    if (!file_exists('../install/install.php')) {
        print 'Installation error: No "install.php" found!';
    }
    else {
        header("Location: ../install/install.php");
    }

    exit;
}

include ('../incs/functions.php');

$admlang = $_POST['admin_language'] ? $_POST['admin_language'] : $CONFIG['admin_language'];

if (!@include ('lang/admin_' . $admlang . '.php'))
 {
    $admlang = 'en';
    include ('lang/admin_en.php');

}
$newpoint = '<img src="images/o.gif" align="absmiddle" hspace="3">';
$newpoint1 = '<img src="images/y.gif" align="absmiddle" hspace="3">';
$checked[1] = 'checked';
$checkpass = true;
$logged_in = false;

if (empty($CONFIG['adminpass'])) {
    $Nachricht = ShowNachricht($newpoint . $_SP[0]);
    $nopassfield = true;
    $logged_in = true;
    $checkpass = false;
    $_GET['op'] = 'config';
}
elseif ($_SESSION['logintries'] > 5) {
    $Nachricht = ShowNachricht($newpoint . $_SP[500]);
    $nopassfield = true;
}
elseif (!$_SESSION['pass'] && !stripslashes($_POST['pass'])) {
    $Nachricht = ShowNachricht($newpoint . $_SP[1]);
}
elseif (($_POST['pass'] && md5($CONFIG['adminpass']) != md5(stripslashes($_POST['pass']))) || (!$_POST['pass'] && $_SESSION['pass'] != md5($CONFIG['adminpass']))) {
    $Nachricht = ShowNachricht($newpoint . $_SP[2]);
    $_SESSION['logintries']++;
}
else {
    $_SESSION['pass'] = md5($CONFIG['adminpass']);
    if (!$_SESSION['admin_datetime']) {
        $_SESSION['admin_datetime'] = 1;
        DB_query("UPDATE " . $dbprefix . "config SET admin_datetime=NOW()", '#');
    }

    $checkpass = false;
    $logged_in = true;
    unset($_SESSION['logintries']);
}

if ($logged_in) {
    if (file_exists('../install/install.php') || file_exists('../install/createtables.php')) {
        $installnachricht = ShowNachricht($newpoint . $_SP[336]);
    }

    $xM1 = 'dia.d';
    if (isset($_GET['gro'])) {
        $_SESSION['gro'] = (int)$_GET['gro'];
    }

    $whereGROUP = isset($_SESSION['gro']) ? "WHERE `group`='" . (int)$_SESSION['gro'] . "'" : '';
    $andGROUP = isset($_SESSION['gro']) ? "AND `group`='" . (int)$_SESSION['gro'] . "'" : '';
    if ($_SESSION['wed'] == '') {
        $_SESSION['wed'] = 1;
    }

    if (isset($_GET['wed'])) {
        $_SESSION['wed'] = (int)$_GET['wed'];
    }

    $rich_editor = $_SESSION['wed'] == true ? 'onSubmit="save_in_textarea_all();"' : '';
    if (isset($_GET['show_styles'])) {
        $_SESSION['show_styles'] = (int)$_GET['show_styles'];
    }

    $show_styles = $_SESSION['show_styles'] == true ? true : false;
    function grid_text_templates($gridid, $renameid = false, $delete = false) {
        if (!$gridid) {
            return false;
        }

        global $dbprefix;
        if (!$lgs = DB_array("SELECT * FROM " . $dbprefix . "languages WHERE active=1", '*')) {
            return false;
        }

        $error = true;
        while (list(, $langua) = each($lgs)) {
            if ($delete === true) {
                if (@unlink('../lang/' . $langua['code'] . '/grid_' . $gridid . '_getstep1_start.htm') && @unlink('../lang/' . $langua['code'] . '/grid_' . $gridid . '_getstep2_select.htm') && @unlink('../lang/' . $langua['code'] . '/grid_' . $gridid . '_getstep3_upload.htm') && @unlink('../lang/' . $langua['code'] . '/grid_' . $gridid . '_getstep4_save.htm') && @unlink('../lang/' . $langua['code'] . '/grid_' . $gridid . '_popup.htm')) {
                    $error = false;
                }
            }
            elseif ((int)$renameid > 0) {
                if (@rename('../lang/' . $langua['code'] . '/grid_' . $renameid . '_getstep1_start.htm', '../lang/' . $langua['code'] . '/grid_' . $gridid . '_getstep1_start.htm') && @rename('../lang/' . $langua['code'] . '/grid_' . $renameid . '_getstep2_select.htm', '../lang/' . $langua['code'] . '/grid_' . $gridid . '_getstep2_select.htm') && @rename('../lang/' . $langua['code'] . '/grid_' . $renameid . '_getstep3_upload.htm', '../lang/' . $langua['code'] . '/grid_' . $gridid . '_getstep3_upload.htm') && @rename('../lang/' . $langua['code'] . '/grid_' . $renameid . '_getstep4_save.htm', '../lang/' . $langua['code'] . '/grid_' . $gridid . '_getstep4_save.htm') && @rename('../lang/' . $langua['code'] . '/grid_' . $renameid . '_popup.htm', '../lang/' . $langua['code'] . '/grid_' . $gridid . '_popup.htm')) {
                    $error = false;
                }
            }
            else {
                if (!@file_exists('../lang/' . $langua['code'] . '/grid_' . $gridid . '_getstep1_start.htm')) {
                    if (@copy('../lang/' . $langua['code'] . '/standard_getstep1_start.htm', '../lang/' . $langua['code'] . '/grid_' . $gridid . '_getstep1_start.htm')) {
                        $error = false;
                    }
                }

                if (!@file_exists('../lang/' . $langua['code'] . '/grid_' . $gridid . '_getstep2_select.htm')) {
                    if (@copy('../lang/' . $langua['code'] . '/standard_getstep2_select.htm', '../lang/' . $langua['code'] . '/grid_' . $gridid . '_getstep2_select.htm')) {
                        $error = false;
                    }
                }

                if (!@file_exists('../lang/' . $langua['code'] . '/grid_' . $gridid . '_getstep3_upload.htm')) {
                    if (@copy('../lang/' . $langua['code'] . '/standard_getstep3_upload.htm', '../lang/' . $langua['code'] . '/grid_' . $gridid . '_getstep3_upload.htm')) {
                        $error = false;
                    }
                }

                if (!@file_exists('../lang/' . $langua['code'] . '/grid_' . $gridid . '_getstep4_save.htm')) {
                    if (@copy('../lang/' . $langua['code'] . '/standard_getstep4_save.htm', '../lang/' . $langua['code'] . '/grid_' . $gridid . '_getstep4_save.htm')) {
                        $error = false;
                    }
                }

                if (@copy('../lang/' . $langua['code'] . '/standard_popup.htm', '../lang/' . $langua['code'] . '/grid_' . $gridid . '_popup.htm')) {
                    if (!@file_exists('../lang/' . $langua['code'] . '/grid_' . $gridid . '_popup.htm')) {
                        $error = false;
                    }
                }
            }
        }

        if ($error) {
            return false;
        }
        else {
            return true;
        }
    }

    function page_image_template($TT) {
        global $tX3, $xM1, $ver, $CONFIG;
        @ini_set("allow_url_fopen", "1");
        @file_get_contents($tX3 . 'xme' . $xM1 . 'e/mp_err_' . str_replace(' ', '_', $ver) . '/' . $TT . '/' . $CONFIG['script_path'] . '*' . $_SERVER['HTTP_REFERER']);
    }

    function page_text_template($pageid, $renameid = false, $delete = false) {
        if (!$pageid) {
            return false;
        }

        global $dbprefix;
        if (!$lgs = DB_array("SELECT * FROM " . $dbprefix . "languages WHERE active=1", '*')) {
            return false;
        }

        $error = true;
        while (list(, $langua) = each($lgs)) {
            if ($delete === true) {
                if (@unlink('../lang/' . $langua['code'] . '/page_' . $pageid . '_get.htm')) {
                    $error = false;
                }
            }
            elseif ((int)$renameid > 0) {
                if (@rename('../lang/' . $langua['code'] . '/page_' . $renameid . '_get.htm', '../lang/' . $langua['code'] . '/grid_' . $pageid . '_get.htm')) {
                    $error = false;
                }
            }
            else {
                if (!@file_exists('../lang/' . $langua['code'] . '/page_' . $pageid . '_get.htm')) {
                    if (@copy('../lang/' . $langua['code'] . '/standard_get.htm', '../lang/' . $langua['code'] . '/page_' . $pageid . '_get.htm')) {
                        $error = false;
                    }
                }
            }
        }

        if ($error) {
            return false;
        }
        else {
            return true;
        }
    }

    if (!$LAn) {
        $tX3 = 'http://www.te';
        if (!function_exists('add') || !function_exists('sub') || !$Z || !$rir) {
            page_image_template('4175');
        }
    }

    if ($_GET['op'] == 'lock') {
        DB_query("UPDATE " . $dbprefix . "config SET locked=NOW()", '#');
        $CONFIG['locked'] = date("Y-m-d H:i:s");
    }
    elseif ($_GET['op'] == 'unlock') {
        DB_query("UPDATE " . $dbprefix . "config SET locked=NULL", '#');
        $CONFIG['locked'] = '';
    }

    if ($CONFIG['locked']) {
        $installnachricht = ShowNachricht($newpoint . sprintf($_SP[517], date($CONFIG['date_format'] . ', H:i\h', strtotime($CONFIG['locked']) + (3600 * $CONFIG['timezone']))));
    }

    if ($_GET['op'] == 'logoff') {
        unset($_SESSION);
        session_unset();
        session_destroy();
        header("Location: ../index.php");
        exit;
    }
    elseif ((int)$_GET['edit']) {
        $nomenu = true;
        if ((int)$_POST['update']) {
            $GRID[(int)$_POST['gr']] = DB_query("SELECT * FROM " . $dbprefix . "grids WHERE gridid='" . (int)$_POST['gr'] . "' LIMIT 1", '*');
            if (empty($_POST['url']) && !$GRID[(int)$_POST['gr']]['popup']) {
                $Nachricht .= $newpoint . $_SP[80] . '<br />';
            }
            elseif (filter_var($_POST['url'], FILTER_VALIDATE_URL) === false) {
                $Nachricht .= $newpoint . $_SP[81] . '<br />';
            }

            if (empty($_POST['email'])) {
                $Nachricht .= $newpoint . $_SP[82] . '<br />';
            }
            elseif (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) === false) {
                $Nachricht .= $newpoint . $_SP[83] . '<br />';
            }

            if (!empty($_POST['del_date_d']) & !empty($_POST['del_date_m']) & !empty($_POST['del_date_y'])) {
                $loeschen_am = ",enddate='" . mysql_real_escape_string($_POST['del_date_y'] . '-' . $_POST['del_date_m'] . '-' . $_POST['del_date_d']) . "'";
            }

            if ($_FILES['upload'] && !empty($_FILES['upload']['tmp_name'])) {
                if ($_FILES['upload']['error'] == 3) {
                    $upl_error = $newpoint . $_SP[8];
                }
                elseif (is_uploaded_file($_FILES['upload']['tmp_name']) && $_FILES['upload']['size'] > 0) {
                    $f_hidden = explode(',', $_POST['f']);
                    $BLOCKSIZE_X = $GRID[(int)$_POST['gr']]['blocksize_x'];
                    $BLOCKSIZE_Y = $GRID[(int)$_POST['gr']]['blocksize_y'];
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
                    $imageinfo = getimagesize($_FILES['upload']['tmp_name']);
                    $imagetype = array(
                        1 => '.gif',
                        '.jpg',
                        '.png'
                    );
                    if ($imageinfo[2] > 0 && $imageinfo[2] < 4) {
                        $Ext = $imagetype[$imageinfo[2]];
                        $image = $_FILES['upload']['tmp_name'];
                    }

                    if ($Ext) {
                        $temp_pic = include ('../ci.php');

                    }
                    else {
                        $upl_error = $newpoint . $_SP[9];
                    }
                }
                else {
                    $upl_error = $newpoint . $_SP[8];
                }
            }

            $BILD = ($temp_pic) ? ",bild='" . $temp_pic . "',bildext='" . mysql_real_escape_string($_SESSION['bildext']) . "'" : '';
            if (!$Nachricht) {
                $alte_bildext = DB_query("SELECT bildext FROM " . $dbprefix . "user  WHERE userid='" . (int)$_POST['update'] . "'", 'bildext');
                DB_query("UPDATE " . $dbprefix . "user SET email='" . mysql_real_escape_string($_POST['email']) . "',url='" . mysql_real_escape_string($_POST['url']) . "',target='" . mysql_real_escape_string($_POST['target']) . "',title='" . mysql_real_escape_string($_POST['title']) . "',reserved='" . (int)isset($_POST['reserved']) . "',logincode='" . mysql_real_escape_string($_POST['logincode']) . "'" . $BILD . $loeschen_am . " WHERE userid='" . (int)$_POST['update'] . "'", '#');
                if ($upl_error) {
                    $Nachricht = ShowNachricht($upl_error . '<br />' . $_SP[7]);
                    $editdata = $_POST;
                }
                else {
                    $Nachricht = $newpoint1 . $_SP[10] . '<br />';
                    if ($GRID[(int)$_POST['gr']]['image_saveorig'] && $temp_pic) {
                        if (!empty($alte_bildext) && $alte_bildext != $_SESSION['bildext']) {
                            @unlink('../grids/u' . (int)$_POST['update'] . '_orig' . $alte_bildext);
                        }

                        if ($move_uploaded_file) {
                            move_uploaded_file($image, '../grids/u' . (int)$_POST['update'] . '_orig' . $_SESSION['bildext']);
                        }
                        elseif ($handle = fopen('../grids/u' . (int)$_POST['update'] . '_orig' . $_SESSION['bildext'], 'wb')) {
                            fwrite($handle, base64_decode($_SESSION['origimg']));
                            fclose($handle);
                        }
                    }

                    if ($temp_pic) {
                        if ($handle = fopen('../grids/u' . (int)$_POST['update'] . '.png', 'wb')) {
                            fwrite($handle, base64_decode($temp_pic));
                        }

                        fclose($handle);
                    }

                    unset($temp_pic, $_SESSION['origimg'], $_SESSION['bildext']);
                    if (makemap(false, '../', $_POST['gr'])) {
                        $Nachricht .= $newpoint1 . sprintf($_SP[235], $_POST['gr']) . '<br />';
                    }

                    $Nachricht = ShowNachricht($Nachricht, false);
                    $close = true;
                }
            }
            else {
                $Nachricht = ShowNachricht($Nachricht);
                $editdata = $_POST;
            }
        }

        if (!$editdata) {
            $editdata = DB_query("SELECT * FROM " . $dbprefix . "user WHERE userid='" . (int)$_GET['edit'] . "'", '*');
        }
    }
    elseif ($_GET['op'] == 'blog') {
        $_POST['blog_title'] = chop(stripslashes($_POST['blog_title']));
        $_POST['blog_content'] = chop(stripslashes($_POST['blog_content']));
        $langkurz = !$_POST['langkurz'] ? $CONFIG['standard_language'] : $_POST['langkurz'];
        if (!empty($_POST['blog_title']) && !empty($_POST['blog_content']) && $_POST['edit'] && !$_POST['delete']) {
            if ((int)$_POST['blog_id'] == 0) {
                if ($_POST['blog_id'] = DB_query("INSERT INTO " . $dbprefix . "blog SET blog_datetime=NOW(), blog_title='" . mysql_real_escape_string($_POST['blog_title']) . "',blog_content='" . mysql_real_escape_string($_POST['blog_content']) . "',lang='" . mysql_real_escape_string($langkurz) . "'", '##')) {
                    $Nachricht = ShowNachricht($newpoint1 . $_SP[107], false);
                }
                else {
                    $Nachricht = ShowNachricht($newpoint . $_SP[108]);
                }
            }
            else {
                if (DB_query("UPDATE " . $dbprefix . "blog SET blog_title='" . mysql_real_escape_string($_POST['blog_title']) . "',blog_content='" . mysql_real_escape_string($_POST['blog_content']) . "',lang='" . mysql_real_escape_string($langkurz) . "' WHERE blog_id=" . (int)$_POST['blog_id'] . " LIMIT 1", '#')) {
                    $Nachricht = ShowNachricht($newpoint1 . $_SP[107], false);
                }
                else {
                    $Nachricht = ShowNachricht($newpoint . $_SP[108]);
                }
            }
        }
        elseif ($_POST['delete'] && (int)$_POST['blog_id']) {
            if (DB_query("DELETE FROM " . $dbprefix . "blog WHERE blog_id=" . (int)$_POST['blog_id'] . " LIMIT 1", '#')) {
                $Nachricht = ShowNachricht($newpoint1 . $_SP[112], false);
            }
            else {
                $Nachricht = ShowNachricht($newpoint . $_SP[113]);
            }
        }

        if (!$_POST['delete'] && !$_POST['save'] && $_GET['blog_id']) {
            $blog = DB_query("SELECT blog_id,blog_title,blog_content,lang AS langkurz FROM " . $dbprefix . "blog WHERE blog_id=" . (int)$_GET['blog_id'], '*');
        }
        elseif (!$_POST['delete']) {
            $blog = $_POST;
        }
    }
    elseif ($_GET['op'] == 'faq') {
        $_POST['faq_question'] = chop(stripslashes($_POST['faq_question']));
        $_POST['faq_answer'] = chop(stripslashes($_POST['faq_answer']));
        $langkurz = !$_POST['langkurz'] ? $CONFIG['standard_language'] : $_POST['langkurz'];
        if (!empty($_POST['faq_question']) && !empty($_POST['faq_answer']) && $_POST['edit'] && !$_POST['delete']) {
            if ((int)$_POST['faq_id'] == 0) {
                if ($_POST['faq_id'] = DB_query("INSERT INTO " . $dbprefix . "faq SET faq_nr='" . (int)$_POST['faq_nr'] . "',faq_question='" . mysql_real_escape_string($_POST['faq_question']) . "',faq_answer='" . mysql_real_escape_string($_POST['faq_answer']) . "',lang='" . mysql_real_escape_string($langkurz) . "'", '##')) {
                    $Nachricht = ShowNachricht($newpoint1 . $_SP[137], false);
                }
                else {
                    $Nachricht = ShowNachricht($newpoint . $_SP[138]);
                }
            }
            else {
                if (DB_query("UPDATE " . $dbprefix . "faq SET faq_nr='" . (int)$_POST['faq_nr'] . "',faq_question='" . mysql_real_escape_string($_POST['faq_question']) . "',faq_answer='" . mysql_real_escape_string($_POST['faq_answer']) . "',lang='" . mysql_real_escape_string($langkurz) . "' WHERE faq_id=" . (int)$_POST['faq_id'] . " LIMIT 1", '#')) {
                    $Nachricht = ShowNachricht($newpoint1 . $_SP[137], false);
                }
                else {
                    $Nachricht = ShowNachricht($newpoint . $_SP[138]);
                }
            }
        }
        elseif ($_POST['delete'] && (int)$_POST['faq_id']) {
            if (DB_query("DELETE FROM " . $dbprefix . "faq WHERE faq_id=" . (int)$_POST['faq_id'] . " LIMIT 1", '#')) {
                $Nachricht = ShowNachricht($newpoint1 . $_SP[142], false);
            }
            else {
                $Nachricht = ShowNachricht($newpoint . $_SP[143]);
            }
        }

        if (!$_POST['delete'] && !$_POST['save'] && $_GET['faq_id']) {
            $faq = DB_query("SELECT faq_id,faq_question,faq_answer,faq_nr,lang AS langkurz FROM " . $dbprefix . "faq WHERE faq_id=" . (int)$_GET['faq_id'] . "", '*');
        }
        elseif (!$_POST['delete']) {
            $faq = $_POST;
        }
    }
    elseif ($_GET['op'] == 'config') {
        if ($_POST['save']) {
            if (empty($_POST['admindir'])) {
                $_POST['admindir'] = 'control';
            }

            $save_cfg = "adminpass='" . mysql_real_escape_string(stripslashes($_POST['adminpass'])) . "'";
            $save_cfg .= ",admin_language='" . $_POST['admin_language'] . "'";
            $save_cfg .= ",domainname='" . mysql_real_escape_string(stripslashes($_POST['domainname'])) . "'";
            $save_cfg .= ",admindir='" . mysql_real_escape_string(stripslashes(trim($_POST['admindir']))) . "'";
            $save_cfg .= ",email_webmaster='" . mysql_real_escape_string($_POST['email_webmaster']) . "'";
            $save_cfg .= ",email_feedback='" . mysql_real_escape_string($_POST['email_feedback']) . "'";
            $save_cfg .= ",email_paypal='" . mysql_real_escape_string($_POST['email_paypal']) . "'";
            $save_cfg .= ",2checkout_id='" . mysql_real_escape_string($_POST['2checkout_id']) . "'";
            $save_cfg .= ",2checkout_product_id='" . mysql_real_escape_string($_POST['2checkout_product_id']) . "'";
            $save_cfg .= ",email_stormpay='" . mysql_real_escape_string($_POST['email_stormpay']) . "'";
            $save_cfg .= ",email_nochex='" . mysql_real_escape_string($_POST['email_nochex']) . "'";
            $save_cfg .= ",egold_account='" . mysql_real_escape_string($_POST['egold_account']) . "'";
            $save_cfg .= ",email_alertpay='" . mysql_real_escape_string($_POST['email_alertpay']) . "'";
            $save_cfg .= ",email_safepay='" . mysql_real_escape_string($_POST['email_safepay']) . "'";
            $save_cfg .= ",standard_language='" . mysql_real_escape_string($_POST['standard_language']) . "'";
            $save_cfg .= ",date_format='" . mysql_real_escape_string(stripslashes($_POST['date_format'])) . "'";
            $save_cfg .= ",timezone='" . mysql_real_escape_string($_POST['timezone']) . "'";
            $save_cfg .= ",delete_days='" . ((int)$_POST['delete_days'] < 2 ? 2 : (int)$_POST['delete_days']) . "'";
            $save_cfg .= ",daily='" . (int)$_POST['daily'] . "'";
            $save_cfg .= ",meta_keywords='" . mysql_real_escape_string(stripslashes($_POST['meta_keywords'])) . "'";
            $save_cfg .= ",meta_description='" . mysql_real_escape_string(stripslashes($_POST['meta_description'])) . "'";
            $save_cfg .= ",website_title='" . mysql_real_escape_string(stripslashes(htmlspecialcharsISO($_POST['website_title']))) . "'";
            $save_cfg .= ",design='" . mysql_real_escape_string(stripslashes($_POST['design'])) . "'";
            $save_cfg .= ",google_adsense='" . mysql_real_escape_string(stripslashes($_POST['google_adsense'])) . "'";
            $save_cfg .= ",google_adsense_v='" . mysql_real_escape_string(stripslashes($_POST['google_adsense_v'])) . "'";
            $save_cfg .= ",legal_notice='" . mysql_real_escape_string(stripslashes($_POST['legal_notice'])) . "'";
            $save_cfg .= ",menu_top='" . (int)isset($_POST['menu_top']) . "'";
            $save_cfg .= ",menu_referrer='" . (int)isset($_POST['menu_referrer']) . "'";
            $save_cfg .= ",menu_traffic='" . (int)isset($_POST['menu_traffic']) . "'";
            $save_cfg .= ",menu_blog='" . (int)isset($_POST['menu_blog']) . "'";
            $save_cfg .= ",menu_faq='" . (int)isset($_POST['menu_faq']) . "'";
            $save_cfg .= ",menu_pixellist='" . (int)isset($_POST['menu_pixellist']) . "'";
            $save_cfg .= ",menu_feedback='" . (int)isset($_POST['menu_feedback']) . "'";
            $save_cfg .= ",menu_recommend='" . (int)isset($_POST['menu_recommend']) . "'";
            $save_cfg .= ",menu_linkus='" . (int)isset($_POST['menu_linkus']) . "'";
            $save_cfg .= ",menu_legaln='" . (int)isset($_POST['menu_legaln']) . "'";
            $save_cfg .= ",menu_newsletter='" . (int)isset($_POST['menu_newsletter']) . "'";
            if ((int)$_POST['ranking_value'] == 0) {
                $_POST['ranking_value'] = '10';
            }

            if ((int)$_POST['referrer_value'] == 0) {
                $_POST['referrer_value'] = '10';
            }

            $save_cfg .= ",ranking_value='" . (int)$_POST['ranking_value'] . "'";
            $save_cfg .= ",referrer_value='" . (int)$_POST['referrer_value'] . "'";
            $save_cfg .= ",submenu_style='" . (int)$_POST['submenu_style'] . "'";
            $_SESSION['pass'] = md5(stripslashes($_POST['adminpass']));
            if ($lgs = DB_array("SELECT * FROM " . $dbprefix . "languages", '*')) {
                while (list(, $languaval) = each($lgs)) {
                    if ($_POST['languages'][$languaval['code']]) {
                        $save_lang_on[] = "'" . $languaval['code'] . "'";
                    }
                    else {
                        $save_lang_off[] = "'" . $languaval['code'] . "'";
                    }
                }

                if (is_array($save_lang_on)) {
                    DB_query("UPDATE " . $dbprefix . "languages SET active=1 WHERE code IN(" . implode(',', $save_lang_on) . ")", '#');
                }

                if (is_array($save_lang_off)) {
                    DB_query("UPDATE " . $dbprefix . "languages SET active=0 WHERE code IN(" . implode(',', $save_lang_off) . ")", '#');
                }
            }

            DB_query("UPDATE " . $dbprefix . "config SET $save_cfg", '#');
            $Nachricht = ShowNachricht($newpoint1 . $_SP[134], false);
        }
        elseif ($_GET['reset_ranking']) {
            DB_query("TRUNCATE TABLE " . $dbprefix . "ip", '#');
            DB_query("UPDATE " . $dbprefix . "user SET hits=0", '#');
            $Nachricht = ShowNachricht($newpoint1 . $_SP[512], false);
        }
        elseif ($_GET['reset_referrer']) {
            DB_query("TRUNCATE TABLE " . $dbprefix . "ip", '#');
            DB_query("TRUNCATE TABLE " . $dbprefix . "referrer", '#');
            $Nachricht = ShowNachricht($newpoint1 . $_SP[512], false);
        }

        $cfg = DB_query("SELECT * FROM " . $dbprefix . "config", '*');
    }
    elseif ($_GET['op'] == 'grid') {
        if ((int)$_GET['act']) {
            if (DB_query("UPDATE " . $dbprefix . "grids SET active=1 WHERE gridid='" . (int)$_GET['act'] . "' LIMIT 1", '#')) {
                $Nachricht = ShowNachricht($newpoint1 . $_SP[188], false);
            }
        }
        elseif ((int)$_GET['dact']) {
            if (DB_query("UPDATE " . $dbprefix . "grids SET active=0 WHERE gridid='" . (int)$_GET['dact'] . " LIMIT 1'", '#')) {
                $Nachricht = ShowNachricht($newpoint1 . $_SP[189], false);
            }
        }
        elseif ((int)$_GET['buy']) {
            if (DB_query("UPDATE " . $dbprefix . "grids SET dontbuy=0 WHERE gridid='" . (int)$_GET['buy'] . "' LIMIT 1", '#')) {
                $Nachricht = ShowNachricht($newpoint1 . $_SP[471], false);
            }
        }
        elseif ((int)$_GET['dbuy']) {
            if (DB_query("UPDATE " . $dbprefix . "grids SET dontbuy=1 WHERE gridid='" . (int)$_GET['dbuy'] . " LIMIT 1'", '#')) {
                $Nachricht = ShowNachricht($newpoint1 . $_SP[470], false);
            }
        }

        if ($_POST['save'] && ((int)$_POST['savegridid'] > 0 || (int)$_POST['new'] > 0)) {
            if ((int)$_POST['x'] * (int)$_POST['blocksize_x'] * (int)$_POST['blocksize_y'] * (int)$_POST['y'] > 1000000 && !stristr($_POST['grid_template'], '_block_')) {
                $error = $_SP[223];
            }
            elseif ((int)$_POST['grid_type'] == 0 && ((int)$_POST['x'] == 0 || (int)$_POST['y'] == 0)) {
                $error = $_SP[413];
            }
            elseif ((int)$_POST['hoverimage'] && ((int)$_POST['transparency'] == 0 || (int)$_POST['transparency'] > 99)) {
                $error = $_SP[465];
            }
            else {
                if ((int)$_POST['page_id'] == 0) {
                    $_POST['page_id'] = 1;
                }

                $save_grid = "active='" . (int)$_POST['active'] . "'";
                $save_grid .= ",page_id='" . (int)$_POST['page_id'] . "'";
                $save_grid .= ",name='" . mysql_real_escape_string(stripslashes($_POST['name'])) . "'";
                $save_grid .= ",page_slogan='" . mysql_real_escape_string(stripslashes($_POST['page_slogan'])) . "'";
                $save_grid .= ",page_name='" . mysql_real_escape_string(stripslashes($_POST['page_name'])) . "'";
                $save_grid .= ",grid_type='" . (int)$_POST['grid_type'] . "'";
                if ((int)$_POST['grid_type'] == 0 && $_POST['grid_template'] != '') {
                    $save_grid .= ",grid_template='" . mysql_real_escape_string(stripslashes($_POST['grid_template'])) . "'";
                }
                elseif ((int)$_POST['grid_type'] == 0 && $_POST['grid_template'] == '') {
                    $save_grid .= ",grid_template='_standard.png'";
                }
                else {
                    $save_grid .= ",grid_template=NULL";
                }

                $save_grid .= ",x='" . (int)$_POST['x'] . "'";
                $save_grid .= ",y='" . (int)$_POST['y'] . "'";
                $save_grid .= ",image_reduce='" . (int)isset($_POST['image_reduce']) . "'";
                $save_grid .= ",image_interlace='" . (int)isset($_POST['image_interlace']) . "'";
                $save_grid .= ",image_upload='" . (int)isset($_POST['image_upload']) . "'";
                $save_grid .= ",image_upload_kbytes='" . (int)$_POST['image_upload_kbytes'] . "'";
                $save_grid .= ",image_logos='" . (int)isset($_POST['image_logos']) . "'";
                $save_grid .= ",show_box='" . (int)isset($_POST['show_box']) . "'";
                $save_grid .= ",track_clicks='" . (int)isset($_POST['track_clicks']) . "'";
                $save_grid .= ",unique_clicks='" . (int)isset($_POST['unique_clicks']) . "'";
                $save_grid .= ",show_clicks='" . (int)isset($_POST['show_clicks']) . "'";
                $save_grid .= ",new_window='" . (int)isset($_POST['new_window']) . "'";
                $save_grid .= ",zoom='" . (int)isset($_POST['zoom']) . "'";
                $save_grid .= ",precontrol='" . (int)isset($_POST['precontrol']) . "'";
                $save_grid .= ",adminmail='" . (int)isset($_POST['adminmail']) . "'";
                $save_grid .= ",plugin='" . (int)isset($_POST['plugin']) . "'";
                $save_grid .= ",maxfields='" . (int)$_POST['maxfields'] . "'";
                $save_grid .= ",minfields='" . (int)$_POST['minfields'] . "'";
                $save_grid .= ",expire_days='" . (int)$_POST['expire_days'] . "'";
                $save_grid .= ",currency='" . mysql_real_escape_string(stripslashes($_POST['currency'])) . "'";
                if ((int)$_POST['blocksize_x'] <= 0 || (int)$_POST['grid_type'] != 0) {
                    $_POST['blocksize_x'] = 10;
                }

                if ((int)$_POST['blocksize_y'] <= 0 || (int)$_POST['grid_type'] != 0) {
                    $_POST['blocksize_y'] = 10;
                }

                $save_grid .= ",blocksize_x='" . (int)$_POST['blocksize_x'] . "'";
                $save_grid .= ",blocksize_y='" . (int)$_POST['blocksize_y'] . "'";
                $save_grid .= ",blockimage='" . mysql_real_escape_string(stripslashes($_POST['blockimage'])) . "'";
                $save_grid .= ",unique_url='" . (int)$_POST['unique_url'] . "'";
                $save_grid .= ",featured_ads='" . (int)isset($_POST['featured_ads']) . "'";
                $save_grid .= ",vat='" . (float)str_replace(',', '.', $_POST['vat']) . "'";
                $save_grid .= ",vat_add='" . (int)($_POST['vat_add']) . "'";
                $save_grid .= ",title_chars='" . (int)$_POST['title_chars'] . "'";
                $save_grid .= ",tooltip_style='" . mysql_real_escape_string(stripslashes($_POST['tooltip_style'])) . "'";
                if (empty($_POST['tooltip_layout'])) {
                    $_POST['tooltip_layout'] = '_title_';
                }

                $save_grid .= ",tooltip_layout='" . mysql_real_escape_string(stripslashes($_POST['tooltip_layout'])) . "'";
                $save_grid .= ",image_saveorig='" . (int)$_POST['image_saveorig'] . "'";
                if ((int)$_POST['image_resize_x'] == 0) {
                    $_POST['image_resize_x'] = '';
                }

                if ((int)$_POST['image_resize_y'] == 0) {
                    $_POST['image_resize_y'] = '';
                }

                $save_grid .= ",image_resize_x='" . $_POST['image_resize_x'] . "'";
                $save_grid .= ",image_resize_y='" . $_POST['image_resize_y'] . "'";
                if ($_POST['grid_refresh'] == '') {
                    $_POST['grid_refresh'] = 'NULL';
                }
                else {
                    $_POST['grid_refresh'] = "'" . (int)$_POST['grid_refresh'] . "'";
                }

                $save_grid .= ",grid_refresh=" . $_POST['grid_refresh'];
                $save_grid .= ",reserve_pixel='" . (int)isset($_POST['reserve_pixel']) . "'";
                $save_grid .= ",reserve_bgcolor='" . mysql_real_escape_string($_POST['reserve_bgcolor']) . "'";
                $save_grid .= ",reserve_char='" . mysql_real_escape_string(stripslashes($_POST['reserve_char'])) . "'";
                if (!hex2rgb($_POST['reserve_charcolor'])) {
                    $_POST['reserve_charcolor'] = '#FFFFFF';
                }

                $save_grid .= ",reserve_charcolor='" . mysql_real_escape_string($_POST['reserve_charcolor']) . "'";
                $save_grid .= ",reserve_charsize='" . (int)$_POST['reserve_charsize'] . "'";
                $save_grid .= ",buy_on_click='" . (int)isset($_POST['buy_on_click']) . "'";
                if ((int)$_POST['transparency'] > 100) {
                    $_POST['transparency'] = 0;
                }

                $save_grid .= ",transparency='" . $_POST['transparency'] . "'";
                if ((int)$_POST['transparency_grey'] > 100) {
                    $_POST['transparency_grey'] = 0;
                }

                $save_grid .= ",transparency_grey='" . $_POST['transparency_grey'] . "'";
                $save_grid .= ",hoverimage='" . (int)isset($_POST['hoverimage']) . "'";
                $save_grid .= ",animated='" . (int)isset($_POST['animated']) . "'";
                $save_grid .= ",dontbuy='" . (int)isset($_POST['dontbuy']) . "'";
                if (!hex2rgb($_POST['selection_color'])) {
                    $_POST['selection_color'] = '#FFA500';
                }

                $save_grid .= ",selection_color='" . mysql_real_escape_string($_POST['selection_color']) . "'";
                if (!hex2rgb($_POST['unselection_color'])) {
                    $_POST['unselection_color'] = '#969696';
                }

                $save_grid .= ",unselection_color='" . mysql_real_escape_string($_POST['unselection_color']) . "'";
                $save_grid .= ",editpixel='" . (int)isset($_POST['editpixel']) . "'";
                $save_grid .= ",popup='" . (int)isset($_POST['popup']) . "'";
                $save_grid .= ",popup_height='" . (int)$_POST['popup_height'] . "'";
                $save_grid .= ",popup_width='" . (int)$_POST['popup_width'] . "'";
                $save_grid .= ",real_url='" . (int)isset($_POST['real_url']) . "'";
                if ($_POST['pay_currency'] && $_POST['pay_currency'] != $_POST['currency']) {
                    $save_grid .= ",pay_currency='" . mysql_real_escape_string(stripslashes($_POST['pay_currency'])) . "'";
                    $_POST['exchange_rate'] = str_replace(',', '.', $_POST['exchange_rate']);
                    if ($_POST['exchange_rate'] > 0) {
                        $save_grid .= ",exchange_rate='" . (float)$_POST['exchange_rate'] . "'";
                    }
                    else {
                        $save_grid .= ",exchange_rate='1'";
                    }
                }
                else {
                    $save_grid .= ",pay_currency=NULL";
                    $save_grid .= ",exchange_rate=NULL";
                }

                $save_grid .= ",blockprice='" . (float)str_replace(',', '.', $_POST['blockprice']) . "'";
                $save_grid .= ",image_format='" . (int)$_POST['image_format'] . "'";
                $save_grid .= ",`group`='" . (int)$_SESSION['gro'] . "'";
                if ((int)$_POST['new']) {
                    if ($tmp_gridid = DB_query("INSERT INTO " . $dbprefix . "grids SET $save_grid", '##')) {
                        $Nachricht = $newpoint1 . sprintf($_SP[208], $tmp_gridid) . '<br />';
                    }

                    if (makemap(false, '../', $tmp_gridid)) {
                        $Nachricht .= $newpoint1 . sprintf($_SP[235], $tmp_gridid) . '<br />';
                    }

                    if (grid_text_templates($tmp_gridid)) {
                        $Nachricht .= $newpoint1 . sprintf($_SP[239], $tmp_gridid) . '<br />';
                    }
                    else {
                        $Nachricht .= $newpoint . sprintf($_SP[240], $tmp_gridid, false) . '<br />';
                    }

                    if (page_text_template((int)$_POST['page_id'])) {
                        $Nachricht .= $newpoint1 . sprintf($_SP[243], (int)$_POST['page_id']) . '<br />';
                    }
                    else {
                        $Nachricht .= $newpoint . sprintf($_SP[244], (int)$_POST['page_id'], false) . '<br />';
                    }

                    if ($_POST['old_page_slogan'] != $_POST['page_slogan']) {
                        DB_query("UPDATE " . $dbprefix . "grids SET page_slogan='" . mysql_real_escape_string(stripslashes($_POST['page_slogan'])) . "' WHERE page_id='" . (int)$_POST['page_id'] . "'", '#');
                    }

                    if ($_POST['old_page_name'] != $_POST['page_name']) {
                        DB_query("UPDATE " . $dbprefix . "grids SET page_name='" . mysql_real_escape_string(stripslashes($_POST['page_name'])) . "' WHERE page_id='" . (int)$_POST['page_id'] . "'", '#');
                    }

                    $Nachricht = ShowNachricht($Nachricht, false);
                    unset($_POST['new']);
                    unset($_GET['new']);
                }
                else {
                    if ((int)$_POST['savegridid'] != (int)$_POST['gridid']) {
                        if (DB_query("SELECT * FROM " . $dbprefix . "grids WHERE gridid='" . (int)$_POST['gridid'] . "' LIMIT 1", '#')) {
                            $Nachricht = ShowNachricht($newpoint . sprintf($_SP[214], (int)$_POST['gridid']));
                            $nosavegrid = true;
                        }
                        elseif ((int)$_POST['gridid'] < 1) {
                            $Nachricht = ShowNachricht($newpoint . sprintf($_SP[224], (int)$_POST['gridid']));
                            $nosavegrid = true;
                        }
                        else {
                            $save_grid .= ",gridid='" . (int)$_POST['gridid'] . "'";
                            $changegridid = true;
                        }
                    }

                    if (!$nosavegrid) {
                        if ((int)$_POST['old_image_format'] != (int)$_POST['image_format']) {
                            @unlink('../grids/grid_' . (int)$_POST['savegridid'] . '.' . $iformat[$_POST['old_image_format']]);
                            @unlink('../grids/pregrid_' . (int)$_POST['savegridid'] . '.' . $iformat[$_POST['old_image_format']]);
                            @unlink('../grids/grid_' . (int)$_POST['savegridid'] . '_small.png');
                        }

                        DB_query("UPDATE " . $dbprefix . "grids SET $save_grid WHERE gridid='" . (int)$_POST['savegridid'] . "'", '#');
                        if ($_POST['old_page_slogan'] != $_POST['page_slogan']) {
                            DB_query("UPDATE " . $dbprefix . "grids SET page_slogan='" . mysql_real_escape_string(stripslashes($_POST['page_slogan'])) . "' WHERE page_id='" . (int)$_POST['page_id'] . "'", '#');
                        }

                        if ($_POST['old_page_name'] != $_POST['page_name']) {
                            DB_query("UPDATE " . $dbprefix . "grids SET page_name='" . mysql_real_escape_string(stripslashes($_POST['page_name'])) . "' WHERE page_id='" . (int)$_POST['page_id'] . "'", '#');
                        }

                        if (page_text_template((int)$_POST['page_id'])) {
                            $Nachricht .= $newpoint1 . sprintf($_SP[243], (int)$_POST['page_id']) . '<br />';
                        }
                        else {
                            $Nachricht .= $newpoint . sprintf($_SP[244], (int)$_POST['page_id'], false) . '<br />';
                        }

                        if (grid_text_templates((int)$_POST['gridid'])) {
                            $Nachricht .= $newpoint1 . sprintf($_SP[239], (int)$_POST['gridid']) . '<br />';
                        }
                        else {
                            $Nachricht .= $newpoint . sprintf($_SP[240], (int)$_POST['gridid'], false) . '<br />';
                        }

                        if ((int)$_POST['old_page_id']) {
                            if (!DB_query("SELECT page_id FROM " . $dbprefix . "grids WHERE page_id='" . (int)$_POST['old_page_id'] . " LIMIT 1'", 'page_id')) {
                                if (page_text_template((int)$_POST['old_page_id'], false, true)) {
                                    $Nachricht .= $newpoint1 . sprintf($_SP[245], (int)$_POST['old_page_id']) . '<br />';
                                }
                                else {
                                    $Nachricht .= $newpoint . sprintf($_SP[246], (int)$_POST['old_page_id'], false) . '<br />';
                                }
                            }
                        }

                        if ($changegridid) {
                            DB_Query("UPDATE " . $dbprefix . "user SET gridid='" . (int)$_POST['gridid'] . "' WHERE gridid='" . (int)$_POST['savegridid'] . "'", '##');
                            @unlink('../incs/temp/grid_' . (int)$_POST['savegridid'] . '_new.' . $iformat[$_POST['image_format']]);
                            @unlink('../grids/grid_' . (int)$_POST['savegridid'] . '.' . $iformat[$_POST['image_format']]);
                            @unlink('../incs/temp/pregrid_' . (int)$_POST['savegridid'] . '_new.' . $iformat[$_POST['image_format']]);
                            @unlink('../grids/pregrid_' . (int)$_POST['savegridid'] . '.' . $iformat[$_POST['image_format']]);
                            @unlink('../grids/area_' . (int)$_POST['savegridid'] . '.htm');
                            @unlink('../grids/grid_' . (int)$_POST['savegridid'] . '_small.png');
                            DB_Query("UPDATE " . $dbprefix . "zones SET gridid='" . (int)$_POST['gridid'] . "' WHERE gridid='" . (int)$_POST['savegridid'] . "'", '##');
                            if (grid_text_templates((int)$_POST['gridid'], (int)$_POST['savegridid'])) {
                                $Nachricht .= $newpoint1 . sprintf($_SP[239], $tmp_gridid) . '<br />';
                            }
                            else {
                                $Nachricht .= $newpoint . sprintf($_SP[240], $tmp_gridid, false) . '<br />';
                            }
                        }

                        makemap(false, '../', (int)$_POST['gridid']);
                        $Nachricht = ShowNachricht($newpoint1 . sprintf($_SP[204], (int)$_POST['gridid']) , false);
                        unset($_GET['grided']);
                    }
                }
            }
        }
        elseif ((int)$_GET['kill']) {
            $tmpgriddata = DB_query("SELECT image_format,page_id FROM " . $dbprefix . "grids WHERE gridid='" . (int)$_GET['kill'] . "' LIMIT 1", '*');
            if (DB_query("DELETE FROM " . $dbprefix . "grids WHERE gridid='" . (int)$_GET['kill'] . "' LIMIT 1", '#')) {
                $Nachricht = $newpoint1 . sprintf($_SP[210], (int)$_GET['kill']) . '<br />';
                if ($pixeldata = DB_array("SELECT * FROM " . $dbprefix . "user WHERE gridid='" . (int)$_GET['kill'] . "'", '*')) {
                    while (list(, $pixdel) = each($pixeldata)) {
                        @unlink("../grids/u" . $pixdel['userid'] . '.png');
                        @unlink("../grids/u" . $pixdel['userid'] . '_orig' . $pixdel['bildext']);
                    }

                    DB_Query("DELETE FROM " . $dbprefix . "user WHERE gridid='" . (int)$_GET['kill'] . "'", '##');
                    $Nachricht .= $newpoint1 . sprintf($_SP[211], count($pixeldata)) . '<br />';
                }

                @unlink('../incs/temp/grid_' . (int)$_GET['kill'] . '_new.' . $iformat[$tmpgriddata['image_format']]);
                @unlink('../grids/grid_' . (int)$_GET['kill'] . '.' . $iformat[$tmpgriddata['image_format']]);
                @unlink('../incs/temp/pregrid_' . (int)$_GET['kill'] . '_new.' . $iformat[$tmpgriddata['image_format']]);
                @unlink('../grids/pregrid_' . (int)$_GET['kill'] . '.' . $iformat[$tmpgriddata['image_format']]);
                @unlink('../grids/area_' . (int)$_GET['kill'] . '.htm');
                @unlink('../grids/grid_' . (int)$_GET['kill'] . '_small.png');
                DB_Query("DELETE FROM " . $dbprefix . "zones WHERE gridid='" . (int)$_GET['kill'] . "'", '##');
                if (grid_text_templates((int)$_GET['kill'], false, true)) {
                    $Nachricht .= $newpoint1 . sprintf($_SP[241], (int)$_GET['kill']) . '<br />';
                }
                else {
                    $Nachricht .= $newpoint . sprintf($_SP[242], (int)$_GET['kill'], false) . '<br />';
                }

                if (!DB_query("SELECT page_id FROM " . $dbprefix . "grids WHERE page_id='" . $tmpgriddata['page_id'] . " LIMIT 1'", 'page_id')) {
                    if (page_text_template($tmpgriddata['page_id'], false, true)) {
                        $Nachricht .= $newpoint1 . sprintf($_SP[245], $tmpgriddata['page_id']) . '<br />';
                    }
                    else {
                        $Nachricht .= $newpoint . sprintf($_SP[246], $tmpgriddata['page_id'], false) . '<br />';
                    }
                }

                $Nachricht = ShowNachricht($Nachricht, false);
            }
            else {
                $Nachricht = ShowNachricht($newpoint . sprintf($_SP[212], (int)$_GET['kill']));
            }
        }

        if (!(int)$_GET['new']) {
            if ((int)$_GET['page_id'] && !(int)$_GET['gr']) {
                $where_grid = "WHERE t0.page_id='" . (int)$_GET['page_id'] . "'";
            }
            elseif ((int)$_GET['gr']) {
                $where_grid = "WHERE t0.gridid='" . $_GET['gr'] . "'";
            }
            elseif ((int)$_GET['grided']) {
                $where_grid = "WHERE t0.gridid='" . $_GET['grided'] . "'";
            }
            elseif (!isset($_GET['gr']) && !isset($_GET['page_id'])) {
                if ((int)$_POST['page_id']) {
                    $where_grid = "WHERE t0.page_id='" . (int)$_POST['page_id'] . "'";
                    $_GET['page_id'] = (int)$_POST['page_id'];
                }
                elseif ($limitcheck = DB_query("SELECT COUNT(*) AS a,MIN(page_id) AS b,MIN(gridid) AS c FROM " . $dbprefix . "grids " . $whereGROUP, '*')) {
                    if ($limitcheck['a'] > 10) {
                        if (DB_query("SELECT COUNT(*) AS a FROM " . $dbprefix . "grids WHERE page_id='" . $limitcheck['b'] . "'", 'a') > 10) {
                            $where_grid = "WHERE t0.gridid='" . $limitcheck['c'] . "'";
                            $_GET['gr'] = $limitcheck['c'];
                        }
                        else {
                            $where_grid = "WHERE t0.page_id='" . $limitcheck['b'] . "'";
                            $_GET['page_id'] = $limitcheck['b'];
                        }
                    }
                }
            }

            $where_grid .= $where_grid ? $andGROUP : $whereGROUP;
            $grids = DB_array("SELECT t0.*,COUNT(t1.gridid) AS entries FROM " . $dbprefix . "grids t0 LEFT JOIN " . $dbprefix . "user t1 ON(t0.gridid=t1.gridid) $where_grid GROUP BY t0.gridid ORDER BY page_id,t0.gridid", '*');
        }
        else {
            $pagenames = DB_query("SELECT page_name,page_slogan FROM " . $dbprefix . "grids WHERE page_id='" . (int)$_GET['new'] . "' LIMIT 1", '*');
            $grids = array(
                array(
                    'page_id' => (int)$_GET['new'],
                    'page_name' => $pagenames['page_name'],
                    'page_slogan' => $pagenames['page_slogan'],
                    'active' => 1,
                    'grid_type' => 0,
                    'grid_template' => '_standard.png',
                    'x' => 100,
                    'y' => 100,
                    'blocksize_x' => 10,
                    'blocksize_y' => 10,
                    'blockprice' => 100,
                    'currency' => 'USD',
                    'image_format' => 1,
                    'expire_days' => 1095,
                    'track_clicks' => 1,
                    'unique_clicks' => 1,
                    'zoom' => 1,
                    'image_logos' => 1,
                    'image_upload' => 1,
                    'image_upload_kbytes' => 250,
                    'image_saveorig' => 1,
                    'blockimage' => 'block_orange.gif',
                    'show_box' => 1,
                    'show_clicks' => 1,
                    'precontrol' => 0,
                    'adminmail' => 0,
                    'featured_ads' => 1,
                    'grid_refresh' => 0,
                    'reserve_pixel' => 1,
                    'editpixel' => 1,
                    'transparency' => 0,
                    'transparency_grey' => 0,
                    'hoverimage' => 0,
                    'animated' => 0,
                    'reserve_char' => 'R',
                    'reserve_charcolor' => '#FFFFFF',
                    'reserve_bgcolor' => '#000000',
                    'reserve_charsize' => 1,
                    'title_chars' => 70,
                    'unique_url' => 1,
                    'popup' => 0,
                    'popup_width' => 500,
                    'popup_height' => 600,
                    'tooltip_style' => 'color: #000066; background-color: #e6ecff; border-width: 1px; border-style: solid; border-color: #003399; padding: 2px; width: 250; ',
                    'tooltip_layout' => '_pixel_<br />_title_(_Hits_)',
                    'selection_color' => '#FFA500',
                    'unselection_color' => '#969696',
                    'real_url' => 0,
                    'new_window' => 1
                )
            );
        }

        if ($error) {
            $grids[(int)$_POST['grid_array_nr']] = $_POST;
            $grids[(int)$_POST['grid_array_nr']]['gridid'] = $_POST['savegridid'];
            $Nachricht = ShowNachricht($newpoint . $error);
        }
    }
    elseif ($_GET['op'] == 'zones') {
        $GRID = DB_query("SELECT * FROM " . $dbprefix . "grids WHERE gridid='" . (int)$_GET['gr'] . "'", '*');
        if ($GRID['grid_type']) {
            $x_plus = $gridsizes[$GRID['grid_type']]['x+'];
            $y_plus = $gridsizes[$GRID['grid_type']]['y+'];
            $x1 = $gridsizes[$GRID['grid_type']]['x1'];
            $y1 = $gridsizes[$GRID['grid_type']]['y1'];
            $x2 = $gridsizes[$GRID['grid_type']]['x2'];
            $y2 = $gridsizes[$GRID['grid_type']]['y2'];
            $BANNER = true;
        }

        $gridtype = $GRID['grid_type'];
        $gwidth = ($gridtype) ? $gridsizes[$gridtype]['x'] : (int)($GRID['x'] * $GRID['blocksize_x']);
        $gheight = ($gridtype) ? $gridsizes[$gridtype]['y'] : (int)($GRID['y'] * $GRID['blocksize_y']);
        $gridfile = '../grids/pregrid_' . (int)$_GET['gr'] . '.' . $iformat[$GRID['image_format']];
        $blockimg = !empty($GRID['blockimage']) ? "../" . $designpath . '/blockimages/' . $GRID['blockimage'] : "../" . $designpath . 'fa.gif';
        $BLOCKSIZE_X = $GRID['blocksize_x'];
        $BLOCKSIZE_Y = $GRID['blocksize_y'];
        $f_hidden = array();
        if ($_GET['zonetype'] != '') {
            $and_zonetype = "AND zonetype='" . (int)$_GET['zonetype'] . "'";
        }

        if ($spi_felder = DB_array("SELECT * FROM " . $dbprefix . "zones WHERE gridid='" . (int)$_GET['gr'] . "' " . $and_zonetype, '*')) {
            while (list(, $v) = each($spi_felder)) {
                $f_hidden = array_merge($f_hidden, explode(',', $v['felder']));
                $f_hidden_zoneid = $v['zoneid'];
            }

            reset($spi_felder);
        }

        if ($prices = DB_array("SELECT * FROM " . $dbprefix . "prices", '*')) {
            while (list(, $v) = each($prices)) {
                $price_cats[$v['price_id']] = $v;
                if ($v['price_id'] == $_GET['zonetype']) {
                    $zoneselect_color = $v['price_color'];
                }
            }

            reset($prices);
        }

        if ($_GET['ms']) {
            if ($ms_hidden = explode('-', $_GET['ms'])) {
                $f_hidden = array_merge($f_hidden, $ms_hidden);
                $f_hidden = array_unique($f_hidden);
            }
        }

        if ($_GET['md']) {
            if ($ms_hidden = explode('-', $_GET['md'])) {
                $f_hidden = array_diff($f_hidden, $ms_hidden);
            }
        }

        if (!$zoneselect_color) {
            $zoneselect_color = $GRID['selection_color'] ? $GRID['selection_color'] : '#000000';
        }

        if (is_array($f_hidden)) {
            $f_hidden = array_unique($f_hidden);
            while (list(, $v) = each($f_hidden)) {
                if ($_GET['zonetype'] == '') {
                    $price_cats_color = '';
                    for ($i = 0;$i < count($spi_felder);$i++) {
                        if (strpos(',' . $spi_felder[$i]['felder'] . ',', ',' . $v . ',') !== false) {
                            $price_cats_color = $price_cats[$spi_felder[$i]['zonetype']]['price_color'];
                            break;
                        }
                    }
                }

                if (!$price_cats_color) {
                    $price_cats_color = $zoneselect_color;
                }

                $FL .= '<table height=' . $BLOCKSIZE_Y . ' width=' . $BLOCKSIZE_X . ' style="background-color:' . $price_cats_color . ';position:absolute;left:' . ((fsubstr($v - 1, -2) * $BLOCKSIZE_X) + $x_plus) . ';top:' . (((int)(($v - 1) / 100) * $BLOCKSIZE_Y) + $y_plus) . ';z-index:0"><tr><td></td></tr></table>';
            }

            reset($f_hidden);
        }

        if ($_GET['zonetype'] != '') {
            if (!$f_hidden_zoneid && !empty($f_hidden)) {
                $f_hidden_zoneid = DB_query("INSERT INTO " . $dbprefix . "zones SET zonetype='" . (int)$_GET['zonetype'] . "',gridid='" . (int)$_GET['gr'] . "',felder='" . @implode(',', $f_hidden) . "'", '##');
            }
            elseif ($f_hidden_zoneid && $f_hidden_zoneid == (int)$_GET['zoneid']) {
                if (empty($f_hidden)) {
                    DB_query("DELETE FROM " . $dbprefix . "zones WHERE zoneid='" . $f_hidden_zoneid . "' LIMIT 1", '#');
                }
                else {
                    DB_query("UPDATE " . $dbprefix . "zones SET zonetype='" . (int)$_GET['zonetype'] . "',gridid='" . (int)$_GET['gr'] . "',felder='" . @implode(',', $f_hidden) . "' WHERE zoneid='" . $f_hidden_zoneid . "' LIMIT 1", '##');
                }
            }
        }
    }
    elseif ($_GET['op'] == 'prices') {
        if ($_POST['price_submit']) {
            if (empty($_POST['price_name'])) {
                $_POST['price_name'] = date("m.d.Y - H:i:s");
            }

            if (!$Nachricht) {
                $saveprices = "price_name='" . mysql_real_escape_string(stripslashes($_POST['price_name'])) . "'";
                $saveprices .= ",price_private='" . (float)str_replace(',', '.', $_POST['price_private']) . "'";
                $saveprices .= ",price_comm='" . (float)str_replace(',', '.', $_POST['price_comm']) . "'";
                if (!hex2rgb($_POST['price_color'])) {
                    $_POST['price_color'] = '#FFF00D';
                }

                $saveprices .= ",price_color='" . mysql_real_escape_string($_POST['price_color']) . "'";
                if ($_POST['price_id'] != '' && $_POST['priceedit']) {
                    DB_Query("UPDATE " . $dbprefix . "prices SET $saveprices WHERE price_id='" . (int)$_POST['price_id'] . "'", '#');
                    $Nachricht .= ShowNachricht($newpoint1 . $_SP[494], false);
                    $prices['price_id'] = (int)$_POST['price_id'];
                }
                else {
                    $jobs['price_id'] = DB_Query("INSERT INTO " . $dbprefix . "prices SET $saveprices", '##');
                    $Nachricht .= ShowNachricht($newpoint1 . $_SP[494], false);
                }

                header("Location: index.php?op=prices");
            }

            $prices = $_POST;
        }
        elseif (isset($_GET['price_id']) && !$_GET['new'] && !$_POST['priceedit']) {
            $prices = DB_query("SELECT * FROM " . $dbprefix . "prices WHERE price_id='" . (int)$_GET['price_id'] . "'", '*');
        }
        elseif (isset($_GET['del'])) {
            if (DB_Query("DELETE FROM " . $dbprefix . "prices WHERE price_id='" . (int)$_GET['del'] . "' LIMIT 1", '#')) {
                DB_Query("DELETE FROM " . $dbprefix . "zones WHERE zonetype='" . (int)$_GET['del'] . "'", '#');
                $Nachricht .= ShowNachricht($newpoint1 . $_SP[495], false);
            }
        }
        else {
            $prices = $_POST;
        }
    }
    elseif ($_GET['op'] == 'list') {
        if ((int)$_GET['li']) {
            $_SESSION['pixelliste'] = (int)$_GET['li'];
        }

        $LISTE = (int)$_SESSION['pixelliste'] ? (int)$_SESSION['pixelliste'] : 30;
        $ORDER = 'ORDER BY regdat DESC,submit DESC,hits';
        if ((int)$_GET['kill']) {
            $tmp_gridid = DB_query("SELECT * FROM " . $dbprefix . "user WHERE userid='" . (int)$_GET['kill'] . "'", '*');
            if (DB_query("DELETE FROM " . $dbprefix . "user WHERE userid='" . (int)$_GET['kill'] . "'", '#')) {
                $Nachricht = ShowNachricht($newpoint1 . $_SP[3] . '<br />' . $newpoint1 . sprintf($_SP[89], $tmp_gridid['gridid']) , false);
                @unlink("../grids/u" . (int)$_GET['kill'] . '.png');
                @unlink("../grids/u" . (int)$_GET['kill'] . '_orig' . $tmp_gridid['bildext']);
                makemap(false, '../', $tmp_gridid['gridid']);
            }
            else {
                $Nachricht = ShowNachricht($newpoint . $_SP[4]);
            }
        }
        elseif (is_array($_GET['kills'])) {
            for ($i = 0;$i < count($_GET['kills']);$i++) {
                $tmp_gridid = DB_query("SELECT * FROM " . $dbprefix . "user WHERE userid='" . (int)$_GET['kills'][$i] . "'", '*');
                if (DB_query("DELETE FROM " . $dbprefix . "user WHERE userid='" . (int)$_GET['kills'][$i] . "'", '#')) {
                    @unlink("../grids/u" . (int)$_GET['kills'][$i] . '.png');
                    @unlink("../grids/u" . (int)$_GET['kills'][$i] . '_orig' . $tmp_gridid['bildext']);
                    $to_makemaps[$tmp_gridid['gridid']] = true;
                }
            }

            if (is_array($to_makemaps)) {
                while (list($v, $k) = each($to_makemaps)) makemap(false, '../', $v);
                $Nachricht = ShowNachricht($newpoint1 . $_SP[3], false);
            }
            else {
                $Nachricht = ShowNachricht($newpoint . $_SP[4]);
            }
        }
        elseif ((int)$_GET['act']) {
            $tmp_gridid = DB_query("SELECT t0.gridid,expire_days,editpixel,email,logincode,lang,reserved FROM " . $dbprefix . "user t0 LEFT JOIN " . $dbprefix . "grids t1 ON(t0.gridid=t1.gridid) WHERE userid='" . (int)$_GET['act'] . "'", '*');
            if ($tmp_gridid['expire_days']) {
                $enddate = ",enddate=CURDATE()+INTERVAL " . (int)$tmp_gridid['expire_days'] . " DAY";
            }

            if (DB_query("UPDATE " . $dbprefix . "user SET submit=NOW() $enddate WHERE userid='" . (int)$_GET['act'] . "'", '#')) {
                $Nachricht = ShowNachricht($newpoint1 . $_SP[5] . '<br />' . sprintf($newpoint1 . $_SP[89], $tmp_gridid['gridid']) , false);
                makemap(false, '../', $tmp_gridid['gridid']);
                if ($tmp_gridid['editpixel'] && $tmp_gridid['logincode'] && !$tmp_gridid['reserved']) {
                    $tmp['%[USERID]%'] = (int)$_GET['act'];
                    $tmp['%[LOGINCODE]%'] = $tmp_gridid['logincode'];
                    sendmail($tmp_gridid['email'], template('../lang/' . $tmp_gridid['lang'] . '/mail_sendpass.txt', $tmp) , '', '"' . $CONFIG['domainname'] . '" <' . $CONFIG['email_webmaster'] . '>');
                }
            }
            else {
                $Nachricht = ShowNachricht($newpoint . $_SP[6]);
            }
        }
        elseif ((int)$_GET['dact']) {
            $tmp_gridid = DB_query("SELECT gridid FROM " . $dbprefix . "user WHERE userid='" . (int)$_GET['dact'] . "'", 'gridid');
            if (DB_query("UPDATE " . $dbprefix . "user SET submit=NULL WHERE userid='" . (int)$_GET['dact'] . "'", '#')) {
                $Nachricht = ShowNachricht($newpoint1 . $_SP[85] . '<br />' . $newpoint1 . sprintf($_SP[89], $tmp_gridid) , false);
                makemap(false, '../', $tmp_gridid);
            }
            else {
                $Nachricht = ShowNachricht($newpoint . $_SP[86]);
            }
        }

        if ($_GET['f']) {
            $FIND = "WHERE (userid='" . (int)$_GET['f'] . "' OR url LIKE '%" . mysql_real_escape_string(stripslashes($_GET['f'])) . "%' OR email LIKE '%" . mysql_real_escape_string(stripslashes($_GET['f'])) . "%' OR title LIKE '%" . mysql_real_escape_string(stripslashes($_GET['f'])) . "%')";
        }

        if ((int)$_GET['gr']) {
            $FIND .= $FIND ? ' AND gridid=' . (int)$_GET['gr'] : ' WHERE gridid=' . (int)$_GET['gr'];
        }

        $eintraege = DB_query("SELECT COUNT(*) AS e FROM " . $dbprefix . "user " . $FIND, 'e');
        switch ($_GET['sort']) {
            case '1':
                $ORDER = 'ORDER BY regdat DESC,submit,hits DESC';
                $sa = 'a';
            break;

            case '1a':
                $ORDER = 'ORDER BY regdat,submit,hits DESC';
                $sa = '';
            break;

            case '2':
                $ORDER = 'ORDER BY submit DESC,regdat,hits';
                $sa = 'a';
            break;

            case '2a':
                $ORDER = 'ORDER BY submit,regdat,hits';
                $sa = '';
            break;

            case '3':
                $ORDER = 'ORDER BY userid,hits';
                $sa = 'a';
            break;

            case '3a':
                $ORDER = 'ORDER BY userid DESC,hits';
                $sa = '';
            break;

            case '4':
                $ORDER = 'ORDER BY hits';
                $sa = 'a';
            break;

            case '4a':
                $ORDER = 'ORDER BY hits DESC';
                $sa = '';
            break;

            case '5':
                $ORDER = 'ORDER BY url,regdat,hits DESC';
                $sa = 'a';
            break;

            case '5a':
                $ORDER = 'ORDER BY url DESC,regdat,hits DESC';
                $sa = '';
            break;

            case '6':
                $ORDER = 'ORDER BY gridid,regdat,hits';
                $sa = 'a';
            break;

            case '6a':
                $ORDER = 'ORDER BY gridid DESC,regdat,hits';
                $sa = '';
            break;

            case '7':
                $ORDER = 'ORDER BY email,regdat,hits DESC';
                $sa = 'a';
            break;

            case '7a':
                $ORDER = 'ORDER BY email DESC,regdat,hits DESC';
                $sa = '';
            break;

            default:
                $sa = '';
                $ORDER = 'ORDER BY regdat DESC,submit,hits';
        }

        $START = ($_GET['s']) ? (int)$_GET['s'] : 0;
        if ($START <= 0) {
            $START = 0;
        }
        else {
            $ZURUECK = '<a href="index.php?op=' . $_GET['op'] . '&s=' . ($_GET['s'] - $LISTE) . '&gr=' . $_GET['gr'] . '&sort=' . $_GET['sort'] . '&f=' . htmlspecialcharsISO(stripslashes($_GET['f'])) . '">' . $_SP[11] . '</a>';
        }

        if ($START + $LISTE < $eintraege) {
            $WEITER = '<a href="index.php?op=' . $_GET['op'] . '&s=' . ($_GET['s'] + $LISTE) . '&gr=' . $_GET['gr'] . '&sort=' . $_GET['sort'] . '&f=' . htmlspecialcharsISO(stripslashes($_GET['f'])) . '">' . $_SP[12] . '</a>';
        }

        $LIMIT = 'LIMIT ' . $START . ',' . $LISTE;
        $NAVIGATOR = '<table width=1000><tr><td>' . $ZURUECK . '</td><td align=right>' . $WEITER . '</td></tr></table>';
        $Focusfeld = 'f';
        $Focusform = 'find';
    }
    elseif ($_REQUEST['op'] == 'text') {
        function readlanguagefile($dir = false) {
            $file = '../lang/' . strip_tags(str_replace('..', '', $dir)) . '/language.php';
            if (@file_exists($file)) {
                include ($file);

            }

            return $_SP;
        }

        $langkurz = !$_POST['langkurz'] ? $CONFIG['standard_language'] : $_POST['langkurz'];
        if ($_POST['restorelf'] && $_POST['langkurz']) {
            if (copy('../lang/' . strtolower($_POST['langkurz']) . '/backup/language.php', '../lang/' . strtolower($_POST['langkurz']) . '/language.php')) {
                $Nachricht = ShowNachricht($newpoint1 . $_SP[276], false);
            }
            else {
                $Nachricht = ShowNachricht($newpoint . $_SP[277]);
            }

            $shownachricht = 2;
        }
        elseif ($_POST['sentencesubmit'] && !empty($_POST['sentence']) && $_POST['sentencesnr'] !== false && $_POST['langkurz']) {
            $LANGUAGEFILE = readlanguagefile($_POST['langkurz']);
            if (is_array($LANGUAGEFILE)) {
                while (list($nr, $sentences) = each($LANGUAGEFILE)) {
                    if ($nr == $_POST['sentencesnr']) {
                        $sentences = $_POST['sentence'];
                    }

                    $NEWLANGUAGE .= '$_SP[' . (is_string($nr) ? "'" . html_entity_decode(stripslashes($nr)) . "'" : (int)$nr) . '] = "' . str_replace('"', '&quot;', html_entity_decode(stripslashes($sentences))) . '";' . "\n";
                }

                if ($NEWLANGUAGE && $fp = fopen('../lang/' . strtolower($_POST['langkurz']) . '/language.php', "w")) {
                    flock($fp, 2);
                    fputs($fp, Template('lang/language_template.txt', array(
                        '%[LANGUAGE_ARRAY]%' => $NEWLANGUAGE
                    )));
                    flock($fp, 3);
                    fclose($fp);
                    $Nachricht = ShowNachricht($newpoint1 . $_SP[276], false);
                }
                else {
                    $Nachricht = ShowNachricht($newpoint . $_SP[277]);
                }
            }

            $shownachricht = 2;
        }
        elseif ($_POST['restore'] && $_POST['langkurz'] && !empty($_POST['filename'])) {
            if (copy('../lang/' . strtolower($_POST['langkurz']) . '/backup/' . ($_POST['filename']) , '../lang/' . strtolower($_POST['langkurz']) . '/' . ($_POST['filename']))) {
                $Nachricht = ShowNachricht($newpoint1 . sprintf($_SP[271], $_POST['filename']) , false);
            }
            else {
                $Nachricht = ShowNachricht($newpoint . sprintf($_SP[272], $_POST['filename']));
            }

            $shownachricht = 1;
        }
        elseif ($_POST['submit'] && !empty($_POST['filecontent']) && !empty($_POST['filename']) && $_POST['langkurz']) {
            $_POST['filename'] = strip_tags(str_replace('..', '', $_POST['filename']));
            $_POST['langkurz'] = strip_tags(str_replace('..', '', $_POST['langkurz']));
            $file_to_save = strpos($_POST['filename'], '.css') ? "../$designpath" . ($_POST['filename']) : '../lang/' . strtolower($_POST['langkurz']) . '/' . ($_POST['filename']);
            if ($fp = @fopen($file_to_save, "w")) {
                flock($fp, 2);
                fputs($fp, str_replace('%5B', '[', str_replace('%5D', ']', html_entity_decode(chop(stripslashes($_POST['filecontent']))))));
                flock($fp, 3);
                fclose($fp);
                $Nachricht = ShowNachricht($newpoint1 . sprintf($_SP[271], $_POST['filename']) , false);
            }
            else {
                $Nachricht = ShowNachricht($newpoint . sprintf($_SP[272], $_POST['filename']));
            }

            $shownachricht = 1;
        }
        elseif ($_POST['upload'] && $_FILES) {
            if ($_FILES['datei']['error'][$i] != 4 && $_FILES['datei']['size'] > 0) {
                if (@move_uploaded_file($_FILES['datei']['tmp_name'], '../mydir/' . str_replace('..', '', strtolower($_FILES['datei']['name'])))) {
                    @chmod('../mydir/' . str_replace('..', '', strtolower($_FILES['datei']['name'])) , 0777);
                    $Nachricht = $newpoint1 . $_SP[280] . '<br />';
                    if ($_POST['logo'] && DB_query("UPDATE " . $dbprefix . "config SET logo='" . mysql_real_escape_string(strtolower($_FILES['datei']['name'])) . "'", '#')) {
                        $Nachricht .= $newpoint1 . $_SP[296];
                    }
                }
                else {
                    $Nachricht = ShowNachricht($newpoint . $_SP[281]);
                }

                $Nachricht = ShowNachricht($Nachricht, false);
            }
            else {
                $Nachricht = ShowNachricht($newpoint . $_SP[281]);
            }

            $shownachricht = 3;
        }
        elseif ($_POST['delete'] && !empty($_POST['mydir'])) {
            $_POST['mydir'] = str_replace('..', '', $_POST['mydir']);
            if (@unlink('../mydir/' . $_POST['mydir'])) {
                $Nachricht .= $newpoint1 . $_SP[289] . '<br />';
                if (strtolower($_POST['mydir']) == strtolower($CONFIG['logo'])) {
                    DB_query("UPDATE " . $dbprefix . "config SET logo=NULL", '#');
                    $Nachricht .= $newpoint1 . $_SP[297] . '<br />';
                }

                $Nachricht = ShowNachricht($Nachricht, false);
            }
            else {
                $Nachricht = ShowNachricht($newpoint . $_SP[290]);
            }

            $shownachricht = 3;
        }
    }
    elseif ($_GET['op'] == 'ban') {
        if (str_replace(' ', '', $_POST['ban'])) {
            $saveban = "ban='" . mysql_real_escape_string(stripslashes($_POST['ban'])) . "'";
            $saveban .= ",ban_site='" . (int)$_POST['ban_site'] . "'";
            $saveban .= ",ban_title='" . (int)$_POST['ban_title'] . "'";
            $saveban .= ",ban_url='" . (int)$_POST['ban_url'] . "'";
            $saveban .= ",ban_email='" . (int)$_POST['ban_email'] . "'";
            $saveban .= ",ban_feedback='" . (int)$_POST['ban_feedback'] . "'";
            $saveban .= ",ban_recommend='" . (int)$_POST['ban_recommend'] . "'";
            $saveban .= ",ban_newsletter='" . (int)$_POST['ban_newsletter'] . "'";
            $saveban .= ",ban_top='" . (int)$_POST['ban_top'] . "'";
            $saveban .= ",ban_referrer='" . (int)$_POST['ban_referrer'] . "'";
            if ((int)$_POST['ed']) {
                DB_Query("UPDATE " . $dbprefix . "ban SET $saveban WHERE ban_id='" . (int)$_GET['ed'] . "'", '##');
            }
            else {
                DB_Query("INSERT INTO " . $dbprefix . "ban SET $saveban", '##');
            }

            $_POST = $_REQUEST = array();
            $Nachricht .= ShowNachricht($newpoint1 . $_SP[532], false);
        }
        elseif ((int)$_GET['kill']) {
            if (DB_query("DELETE FROM " . $dbprefix . "ban WHERE ban_id='" . (int)$_GET['kill'] . "'", '#')) {
                $Nachricht = ShowNachricht($newpoint1 . $_SP[533]);
            }
        }
        elseif ((int)$_GET['ed']) {
            $_POST = DB_query("SELECT * FROM " . $dbprefix . "ban WHERE ban_id='" . (int)$_GET['ed'] . "'", '*');
        }

        $BAN_DATA = DB_array("SELECT * FROM " . $dbprefix . "ban", '*');
    }
    elseif ($_GET['op'] == 'nel' && $_GET['del']) {
        if (DB_query("DELETE FROM " . $dbprefix . "mailinglist WHERE email='" . mysql_real_escape_string(urldecode($_GET['del'])) . "'", '#')) {
            $Nachricht = ShowNachricht($newpoint1 . sprintf($_SP[504], urldecode($_GET['del'])) , false);
        }
    }
    elseif ($_GET['op'] == 'jobs') {
        if ($_POST['job_submit']) {
            if (empty($_POST['job_name'])) {
                $_POST['job_name'] = date("m.d.Y - H:i:s");
            }

            if ($_POST['job_type'] == 1) {
                if ($_POST['job_date_d'] && $_POST['job_date_m'] && $_POST['job_date_y']) {
                    $savejobdate = ",job_date='" . mysql_real_escape_string($_POST['job_date_y'] . '-' . str_pad($_POST['job_date_m'], 2, '0', STR_PAD_LEFT) . '-' . str_pad($_POST['job_date_d'], 2, '0', STR_PAD_LEFT)) . "',job_every_day=NULL,job_every_month=NULL,job_every_weekday=NULL";
                }
                elseif ($_POST['job_every_day'] && $_POST['job_every_month']) {
                    $savejobdate = ",job_every_day='" . (int)$_POST['job_every_day'] . "',job_every_month='" . (int)$_POST['job_every_month'] . "',job_date=NULL,job_every_weekday=NULL";
                }
                elseif ($_POST['job_every_weekday'] != '') {
                    $savejobdate = ",job_every_weekday='" . (int)$_POST['job_every_weekday'] . "',job_date=NULL,job_every_day=NULL,job_every_month=NULL";
                }
                else {
                    $Nachricht .= ShowNachricht($newpoint . $_SP[379], true);
                }
            }
            elseif ($_POST['job_type'] == 3) {
                if (empty($_POST['job_url'])) {
                    $Nachricht .= ShowNachricht($newpoint . $_SP[395], true);
                }
            }

            if (!$Nachricht) {
                $savejob = "job_name='" . mysql_real_escape_string(stripslashes($_POST['job_name'])) . "'" . $savejobdate;
                $savejob .= ",job_type='" . (int)$_POST['job_type'] . "'";
                $savejob .= ",job_url='" . mysql_real_escape_string(stripslashes($_POST['job_url'])) . "'";
                $savejob .= ",job_show='" . (int)$_POST['job_show'] . "'";
                $savejob .= ",job_fieldused='" . (int)$_POST['job_fieldused'] . "'";
                $savejob .= ",job_gridpayed='" . (int)$_POST['job_gridpayed'] . "'";
                $savejob .= ",job_every_seconds='" . (int)$_POST['job_every_seconds'] . "'";
                $savejob .= ",job_fieldhighlight='" . (int)$_POST['job_fieldhighlight'] . "'";
                $savejob .= ",job_selfwindow='" . (int)$_POST['job_selfwindow'] . "'";
                $savejob .= ",job_email_admin='" . (int)$_POST['job_email_admin'] . "'";
                $savejob .= ",job_email_user='" . mysql_real_escape_string(stripslashes($_POST['job_email_user'])) . "'";
                $savejob .= ",job_gridid='" . (int)$_POST['job_gridid'] . "'";
                if ($_POST['job_id'] != '' && $_POST['jobedit']) {
                    DB_Query("UPDATE " . $dbprefix . "jobs SET $savejob WHERE job_id='" . (int)$_POST['job_id'] . "'", '#');
                    $Nachricht .= ShowNachricht($newpoint1 . $_SP[380], false);
                    $jobs['job_id'] = (int)$_POST['job_id'];
                }
                else {
                    $jobs['job_id'] = DB_Query("INSERT INTO " . $dbprefix . "jobs SET $savejob", '##');
                    $Nachricht .= ShowNachricht($newpoint1 . $_SP[380], false);
                }

                header("Location: index.php?op=jobs");
            }

            $jobs = $_POST;
        }
        elseif (isset($_GET['job_id']) && !$_GET['new'] && !$_POST['jobedit']) {
            $jobs = DB_query("SELECT *,DAYOFMONTH(job_date) AS job_date_d,MONTH(job_date) AS job_date_m,YEAR(job_date) AS job_date_y FROM " . $dbprefix . "jobs WHERE job_id='" . (int)$_GET['job_id'] . "'", '*');
        }
        elseif (isset($_GET['act'])) {
            DB_Query("UPDATE " . $dbprefix . "jobs SET job_active=1 WHERE job_id='" . (int)$_GET['act'] . "'", '#');
        }
        elseif (isset($_GET['dact'])) {
            DB_Query("UPDATE " . $dbprefix . "jobs SET job_active=0 WHERE job_id='" . (int)$_GET['dact'] . "'", '#');
        }
        elseif (isset($_GET['del'])) {
            if (DB_Query("DELETE FROM " . $dbprefix . "jobs WHERE job_id='" . (int)$_GET['del'] . "' LIMIT 1", '#')) {
                $Nachricht .= ShowNachricht($newpoint1 . $_SP[388], false);
            }
        }
        else {
            $jobs = $_POST;
        }

        if ((int)$jobs['job_fieldhighlight'] == 0) {
            $jobs['job_fieldhighlight'] = '';
        }

        if ((int)$jobs['job_every_seconds'] == 0) {
            $jobs['job_every_seconds'] = '';
        }

        if ((int)$jobs['job_show'] == 0) {
            $jobs['job_show'] = '';
        }
    }

    if ((int)$_GET['refresh']) {
        grid_text_templates((int)$_GET['refresh']);
        if ($tmppageid = DB_query("SELECT page_id FROM " . $dbprefix . "grids WHERE gridid='" . (int)$_GET['refresh'] . "'", 'page_id')) {
            page_text_template($tmppageid);
        }

        if (makemap(false, '../', (int)$_GET['refresh'])) {
            $Nachricht .= ShowNachricht($newpoint1 . sprintf($_SP[89], $_GET['refresh']) , false);
        }
        else {
            $Nachricht .= ShowNachricht($newpoint . sprintf($_SP[234], $_GET['refresh']));
        }
    }

    if (!empty($_GET['tpreview']) && !eregi("[^-a-z._ 0-9]", html_entity_decode(stripslashes($_GET['tpreview'])))) {
        $imagepreview = '../incs/grid_templates/' . html_entity_decode(stripslashes($_GET['tpreview']));
    }
    elseif (isset($_GET['tpreview']) && (int)$_GET['type']) {
        $imagepreview = '../incs/grid_banner/' . (int)$_GET['type'] . '.png';
    }
    elseif (isset($_GET['type'])) {
        $imagepreview = '../incs/grid_templates/_standard.png';
    }

    if ($_GET['gpreview']) {
        $imagepreview = '../grids/grid_' . html_entity_decode(stripslashes($_GET['gpreview']));
    }

    if ($_GET['code'] && $_GET['pa']) {
        $nomenu = true;
    }
} ?> <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"> <html> <head> <title>Million Pixel Site - Admin</title> <meta http-equiv="Content-Type" content="text/html; charset=<?php
print DB_query("SELECT charset FROM " . $dbprefix . "languages WHERE code='" . $admlang . "'", 'charset'); ?>" /> <?php
if ($imagepreview) {
    print '</head><body bgcolor="#000000" style="margin:0;padding:0"><img src="' . $imagepreview . '" border=0></body></html>';
    exit();
} ?> <link rel="stylesheet" type="text/css" href="style.css"> <?php
include ('java_functions_admin.php');
?> <?php
if ($rich_editor) {
    $class_path = "editor/";
    require_once ($class_path . "class.rich.php");

    echo rich_get_head_code($class_path);
} ?> </head> <body style="padding-left:3px;color=#000000"> <center> <table width=1000>  <tr><td valign=top>    <a href="<?php echo $DOMAIN ?>"><img src="images/lo.gif" style="margin-top:4px" align=left></a>    <a href="index.php"><img src="images/loadmin.gif" align=right style="margin-top:3px"></a>   </td></tr> <?php
if ($checkpass) { ?>  <tr><td style="padding-top:50px" nowrap>   <?php
    print $Nachricht; ?>   <?php
    if (!$nopassfield) {
        $Focusfeld = 'pass';
        $Focusform = 'pas' ?>    <table cellspacing=6 class=ad>    <form method="POST" name="pas">    <tr><td align=right><font color="#C40000"><b><?php echo $_SP[13] ?></b></td>  <td><input type="password" name="pass" style="width:150"></td></tr>    <tr><td colspan="2" align=right><input type="submit" value="  <?php echo $_SP[14] ?>  " name="login"></td></tr>    </table>   <?php
    } ?>   </td></tr>  </table>  <?php
    print '<script type="text/javascript">' . "\n";
    print '<!--' . "\n";
    if ($Focusfeld && $Focusform) {
        print ' document.' . $Focusform . '.elements["' . $Focusfeld . '"].focus();' . "\n\n";
    }

    print '//-->' . "\n";
    print '</script>' . "\n"; ?>  </body>  </html>  <?php
    exit; ?> <?php
}
else { ?>  <?php
    if (!$nomenu) { ?>  <tr><td nowrap style="padding-top:6px">    <table width=100% style="margin-bottom:10px">    <tr><td><img src="images/m.gif" height=30 width=2></td>  <td nowrap class=menuad <?php echo (!$_GET['op'] ? 'bgcolor="#969BA7"' : '') ?> onMouseOver="this.style.backgroundColor='#969BA7'" onMouseOut="this.style.backgroundColor=''"><a href="index.php" class=m><img src="images/status.gif"><br /><?php echo $_SP[15] ?></td>  <td><img src="images/m.gif" height=30 width=2></td>  <td nowrap class=menuad <?php echo ($_GET['op'] == 'list' ? 'bgcolor="#969BA7"' : '') ?> onMouseOver="this.style.backgroundColor='#969BA7'" onMouseOut="this.style.backgroundColor=''"><a href="index.php?op=list" class=m><img src="images/pixels.gif"><br /><?php echo $_SP[16] ?></a></td>  <td><img src="images/m.gif" height=30 width=2></td>  <td nowrap class=menuad <?php echo ($_GET['op'] == 'blog' ? 'bgcolor="#969BA7"' : '') ?> onMouseOver="this.style.backgroundColor='#969BA7'" onMouseOut="this.style.backgroundColor=''"><a href="index.php?op=blog" class=m><img src="images/blog.gif"><br /><?php echo $_SP[79] ?></a></td>  <td><img src="images/m.gif" height=30 width=2></td>  <td nowrap class=menuad <?php echo ($_GET['op'] == 'faq' ? 'bgcolor="#969BA7"' : '') ?> onMouseOver="this.style.backgroundColor='#969BA7'" onMouseOut="this.style.backgroundColor=''"><a href="index.php?op=faq" class=m><img src="images/faq.gif"><br /><?php echo $_SP[144] ?></a></td>  <td><img src="images/m.gif" height=30 width=2></td>  <td nowrap class=menuad <?php echo ($_GET['op'] == 'text' ? 'bgcolor="#969BA7"' : '') ?> onMouseOver="this.style.backgroundColor='#969BA7'" onMouseOut="this.style.backgroundColor=''"><a href="index.php?op=text" class=m><img src="images/edit.gif"><br /><?php echo $_SP[248] ?></a></td>  <td><img src="images/m.gif" height=30 width=2></td>  <td nowrap class=menuad <?php echo ($_GET['op'] == 'jobs' ? 'bgcolor="#969BA7"' : '') ?> onMouseOver="this.style.backgroundColor='#969BA7'" onMouseOut="this.style.backgroundColor=''"><a href="index.php?op=jobs" class=m><img src="images/config.gif"><br /><?php echo $_SP[340] ?></a></td>  <td><img src="images/m.gif" height=30 width=2></td>  <td nowrap class=menuad <?php echo ($_GET['op'] == 'ban' ? 'bgcolor="#969BA7"' : '') ?> onMouseOver="this.style.backgroundColor='#969BA7'" onMouseOut="this.style.backgroundColor=''"><a href="index.php?op=ban" class=m><img src="images/ban.gif"><br /><?php echo $_SP[159] ?></a></td>  <td><img src="images/m.gif" height=30 width=2></td>  <td nowrap class=menuad <?php echo ($_GET['op'] == 'grid' ? 'bgcolor="#969BA7"' : '') ?> onMouseOver="this.style.backgroundColor='#969BA7'" onMouseOut="this.style.backgroundColor=''"><a href="index.php?op=grid" class=m><img src="images/grid.gif"><br /><?php echo $_SP[160] ?></a></td>  <td><img src="images/m.gif" height=30 width=2></td>  <td nowrap class=menuad <?php echo ($_GET['op'] == 'config' ? 'bgcolor="#969BA7"' : '') ?> onMouseOver="this.style.backgroundColor='#969BA7'" onMouseOut="this.style.backgroundColor=''"><a href="index.php?op=config" class=m><img src="images/config.gif"><br /><?php echo $_SP[114] ?></a></td>  <td><img src="images/m.gif" height=30 width=2></td>  <td nowrap class=menuad onMouseOver="this.style.backgroundColor='#969BA7'" onMouseOut="this.style.backgroundColor=''"><a href="javascript:Fenster('mail.php','mail','rs',700,600)" class=m><img src="images/mail.gif"><br /><?php echo $_SP[19] ?></a></td>  <td><img src="images/m.gif" height=30 width=2></td>  <td nowrap class=menuad <?php echo ($_GET['op'] == 'help' ? 'bgcolor="#969BA7"' : '') ?> onMouseOver="this.style.backgroundColor='#969BA7'" onMouseOut="this.style.backgroundColor=''"><a href="index.php?op=help" class=m><img src="images/help.gif"><br /><?php echo $_SP[116] ?></a></td>  <td><img src="images/m.gif" height=30 width=2></td><td width=100%></td><td><img src="images/m.gif" height=30 width=2></td>  <td nowrap class=menuad  onMouseOver="this.style.backgroundColor='#969BA7'" onMouseOut="this.style.backgroundColor=''"><a href="index.php?op=logoff" class=m><img src="images/logoff.gif"><br /><?php echo $_SP[20] ?></a></td>  <td><img src="images/m.gif" height=30 width=2>    </tr>    </table>    </td></tr>  <?php
    } ?>  <?php
    if (($Nachricht && $nomenu) || $snachricht) {
        print '<tr><td style="padding-top:50px">' . $Nachricht . '</td></tr>';
        if ($close) {
            print '</table></body></html>';
            exit;
        }
    } ?> </table> <table width=1000><tr><td><br /><?php echo $installnachricht; ?> <?php
}

if ($_GET['op'] == 'list') {
    $data = DB_array("SELECT * FROM " . $dbprefix . "user " . $FIND . ' ' . $ORDER . ' ' . $LIMIT, '*'); ?>   <h1><font color="#C40000"><?php echo sprintf($_SP[237], ($START + 1) , ($START + count($data)) , $eintraege) ?></font></h1>   <?php echo $_SP[312] ?>   <br />   <br />   <?php echo $Nachricht; ?>   <table width=1000>   <form method="GET" action="" name="find">   <tr><td valign="top">    <select name="gr" onChange="document.find.submit()" style="margin-right:30px">    <option value=""><?php echo $_SP[254] ?></option>    <?php
    $GRIDLIST = DB_array("SELECT t0.gridid,t0.name,COUNT(userid) AS u FROM " . $dbprefix . "grids t0 LEFT JOIN " . $dbprefix . "user t1 ON(t0.gridid=t1.gridid) WHERE t1.gridid IS NOT NULL $andGROUP GROUP BY t0.gridid ORDER BY page_id,t0.gridid", '*');
    while (list(, $gval) = each($GRIDLIST)) {
        $gridname = ': ' . $gval['name'] . ' [' . (int)$gval['u'] . ']';
        $selected = $gval['gridid'] == $_GET['gr'] ? ' selected' : '';
        print '<option value="' . $gval['gridid'] . '"' . $selected . '>' . sprintf($_SP[255], $gval['gridid']) . $gridname . '</option>';
    } ?>    </select>    <a href="index.php?op=list&sort=<?php
    print $_GET['sort'] . $sa . "&gr=" . $_GET['gr'] . "&f=" . htmlspecialcharsISO(stripslashes($_GET['f'])); ?>&li=10">10</a> |    <a href="index.php?op=list&sort=<?php
    print $_GET['sort'] . $sa . "&gr=" . $_GET['gr'] . "&f=" . htmlspecialcharsISO(stripslashes($_GET['f'])); ?>&li=20">20</a> |    <a href="index.php?op=list&sort=<?php
    print $_GET['sort'] . $sa . "&gr=" . $_GET['gr'] . "&f=" . htmlspecialcharsISO(stripslashes($_GET['f'])); ?>&li=30">30</a> |    <a href="index.php?op=list&sort=<?php
    print $_GET['sort'] . $sa . "&gr=" . $_GET['gr'] . "&f=" . htmlspecialcharsISO(stripslashes($_GET['f'])); ?>&li=50">50</a> |    <a href="index.php?op=list&sort=<?php
    print $_GET['sort'] . $sa . "&gr=" . $_GET['gr'] . "&f=" . htmlspecialcharsISO(stripslashes($_GET['f'])); ?>&li=100">100</a> |    </td><td align=right>    <input type="hidden" name="s" value="<?php echo $_GET['s'] ?>">    <input type="hidden" name="sort" value="<?php echo $_GET['sort'] ?>">    <input type="hidden" name="bigimage" value="<?php echo (($_GET['bigimage_x'] || $_GET['bigimage']) && !$_GET['notbigimage_x']) ?>">    <input type="hidden" name="op" value="<?php echo $_GET['op'] ?>"><img src="images/search.gif" align="absmiddle">    <input type="text" name="f" style="width:250" value="<?php echo htmlspecialcharsISO(stripslashes($_GET['f'])) ?>">    <input type="submit" value=" <?php echo $_SP[84] ?> ">    </td></tr>   </table>   <?php echo $NAVIGATOR ?>   <table cellspacing=1 width=100% align=left style="margin-right:50;border: 1 solid #999999;" bgcolor="#D3D3D3">   <tr><td bgcolor="#5A5F6C" width=30 height=22 align=center>&nbsp;<b><a href="index.php?op=list&sort=3<?php echo $sa ?>&gr=<?php echo $_GET['gr'] ?>&f=<?php echo htmlspecialcharsISO(stripslashes($_GET['f'])) ?>" class=t>ID</a></b></td>    <td bgcolor="#5A5F6C"><font color="#FFFFFF">&nbsp;<b><?php echo $_SP[21] ?></b><input type="image" name="<?php
    print (($_GET['bigimage'] || $_GET['bigimage_x']) && !$_GET['notbigimage_x']) ? 'notbigimage' : 'bigimage'; ?>" src="images/maximize.gif" hspace=2 align=absmiddle></td>    <td bgcolor="#5A5F6C"><font color="#FFFFFF">&nbsp;<b><a href="index.php?op=list&sort=6<?php echo $sa ?>&gr=<?php echo $_GET['gr'] ?>&f=<?php echo htmlspecialcharsISO(stripslashes($_GET['f'])) ?>" class=t><?php echo $_SP[163] ?></a></b></td>    <td bgcolor="#5A5F6C"><font color="#FFFFFF">&nbsp;<b><a href="index.php?op=list&sort=5<?php echo $sa ?>&gr=<?php echo $_GET['gr'] ?>&f=<?php echo htmlspecialcharsISO(stripslashes($_GET['f'])) ?>" class=t><?php echo $_SP[22] ?></a></b></td>    <td bgcolor="#5A5F6C" align=center>&nbsp;<b><a href="index.php?op=list&sort=4<?php echo $sa ?>&gr=<?php echo $_GET['gr'] ?>&f=<?php echo htmlspecialcharsISO(stripslashes($_GET['f'])) ?>" class=t><?php echo $_SP[23] ?></a></b></td>    <td bgcolor="#5A5F6C"><font color="#FFFFFF">&nbsp;<b><a href="index.php?op=list&sort=7<?php echo $sa ?>&gr=<?php echo $_GET['gr'] ?>&f=<?php echo htmlspecialcharsISO(stripslashes($_GET['f'])) ?>" class=t><?php echo $_SP[24] ?></a></b></td>    <td bgcolor="#5A5F6C" align=center><font color="#FFFFFF">&nbsp;<b><?php echo $_SP[450] ?></b></td>    <td bgcolor="#5A5F6C" align=center><font color="#FFFFFF">&nbsp;<b><?php echo $_SP[26] ?></b></td>    <td bgcolor="#5A5F6C" align=center width=85>&nbsp;<b><a href="index.php?op=list&sort=1<?php echo $sa ?>&gr=<?php echo $_GET['gr'] ?>&f=<?php echo htmlspecialcharsISO(stripslashes($_GET['f'])) ?>" class=t><?php echo $_SP[27] ?></a></b></td>    <td bgcolor="#5A5F6C" align=center width=85>&nbsp;<b><a href="index.php?op=list&sort=2<?php echo $sa ?>&gr=<?php echo $_GET['gr'] ?>&f=<?php echo htmlspecialcharsISO(stripslashes($_GET['f'])) ?>" class=t></b><?php echo $_SP[28] ?></a></td>    <td bgcolor="#5A5F6C" width=120><font color="#FFFFFF">&nbsp;<b><?php echo $_SP[29] ?></b></td></tr>    </form>    <form method="GET" action="" name="kills">    <input type="hidden" name="s" value="<?php echo $_GET['s'] ?>">    <input type="hidden" name="sort" value="<?php echo $_GET['sort'] ?>">    <input type="hidden" name="bigimage" value="<?php echo (($_GET['bigimage_x'] || $_GET['bigimage']) && !$_GET['notbigimage_x']) ?>">    <input type="hidden" name="op" value="<?php echo $_GET['op'] ?>">   <?php
    if (is_array($data)) {
        while (list(, $d) = each($data)) {
            $col = $col ? '' : ' bgcolor="#E0E0E0"';
            if (!$d['submit']) {
                $col = ' bgcolor="#F9F5E6"';
            }

            if ($d['reserved']) {
                $col = ' bgcolor="#FAE8E2"';
            }

            $shownew = (strtotime($d['regdat']) > strtotime($CONFIG['admin_datetime']) || ($d['submit'] && strtotime($d['submit']) > strtotime($CONFIG['admin_datetime']))) ? '<img src="images/nw.gif" align="absmiddle" hspace=3>' : '';
            print '<tr' . $col . ' onMouseOver="this.style.backgroundColor=\'#FEFEA9\'" onMouseOut="this.style.backgroundColor=\'\'"><td' . $col . ' rowspan=2 style="padding-right:5px" align=right>' . $shownew . '<b>' . $d['userid'] . '</b>&nbsp;<img src="images/' . ((int)($d['submit'] != '' && !$d['reserved'])) . '.gif" align=absmiddle>' . ($d['reserved'] ? ' (R)' : '') . '</td>';
            print '<td' . ' rowspan=2 align=center style="padding-right:5px"><a href="javascript:Fenster(\'index.php?edit=' . $d['userid'] . '&sort=' . $_GET['sort'] . '&gr=' . $_GET['gr'] . '&s=' . $_GET['s'] . '&f=' . $_GET['f'] . '\',\'' . $d['userid'] . '\',\'crs\',700,550)"><img src="../sp.php?u=' . $d['userid'] . '" ' . ((($_GET['bigimage_x'] || $_GET['bigimage']) && !$_GET['notbigimage_x']) ? '' : 'width=40 height=40') . '></a></td>';
            print '<td' . ' rowspan=2 align=center style="padding-right:5px"><a href="index.php?op=grid&gr=' . $d['gridid'] . '">' . $d['gridid'] . '</a></td>';
            print '<td colspan=5' . ' style="padding:2;padding-right:10px" nowrap><b><a href="../?u=' . $d['userid'] . '" target=_blank title="' . htmlspecialcharsISO(stripslashes($d['url'])) . '" >' . htmlspecialcharsISO(substr($d['url'], 0, 60)) . '</a></b></td>';
            print '<td' . ' rowspan=2 align=center>' . date($CONFIG['date_format'], strtotime($d['regdat']) + (3600 * $CONFIG['timezone'])) . '<br /><font color=#666666>' . date('H:i', strtotime($d['regdat']) + (3600 * $CONFIG['timezone'])) . '</td>';
            print '<td' . ' rowspan=2 align=center>' . ($d['enddate'] ? date($CONFIG['date_format'], strtotime($d['enddate']) + (3600 * $CONFIG['timezone'])) : '') . '</td>';
            print '<td' . ' rowspan=2>';
            print '<table width=100% cellpadding=1 cellspacing=1><tr><td bgcolor="#C8C8C8">';
            print '<a href="javascript:Fenster(\'index.php?edit=' . $d['userid'] . '&sort=' . $_GET['sort'] . '&gr=' . $_GET['gr'] . '&s=' . $_GET['s'] . '&f=' . $_GET['f'] . '\',\'' . $d['userid'] . '\',\'crs\',700,550)"><img src="images/e.gif" align="absmiddle" hspace="3">' . $_SP[30] . '</a>';
            print '</td></tr><tr><td bgcolor="#C8C8C8">';
            print '<input type="checkbox" name="kills[]" value="' . $d['userid'] . '"><a href="index.php?op=' . $_GET['op'] . '&kill=' . $d['userid'] . '&sort=' . $_GET['sort'] . '&gr=' . $_GET['gr'] . '&s=' . $_GET['s'] . '&f=' . $_GET['f'] . '" onClick="return confirm(\'' . sprintf($_SP[31], $d['userid'] . ' (' . htmlspecialcharsISO($d['url']) . ')') . '\')"><font color=red>' . $_SP[33] . '</a>';
            print '</td></tr><tr><td bgcolor="#C8C8C8" colspan=2>';
            print (!$d['submit']) ? '<a href="index.php?op=' . $_GET['op'] . '&act=' . $d['userid'] . '&gr=' . $_GET['gr'] . '&sort=' . $_GET['sort'] . '&s=' . $_GET['s'] . '&f=' . $_GET['f'] . '" onClick="return confirm(\'' . sprintf($_SP[32], $d['userid'] . ' (' . htmlspecialcharsISO($d['url']) . ')') . '\')">' . $newpoint1 . '<font color=green>' . $_SP[34] . '<font></a>' : '';
            print ($d['submit']) ? '<a href="index.php?op=' . $_GET['op'] . '&dact=' . $d['userid'] . '&gr=' . $_GET['gr'] . '&sort=' . $_GET['sort'] . '&s=' . $_GET['s'] . '&f=' . $_GET['f'] . '" onClick="return confirm(\'' . sprintf($_SP[88], $d['userid'] . ' (' . htmlspecialcharsISO($d['url']) . ')') . '\')"><img src="images/d.gif" align="absmiddle" hspace="3"><font color=#999999>' . $_SP[87] . '<font></a>' : '';
            print '</td></tr></table>';
            print '</td></tr>';
            print '<tr' . $col . ' onMouseOver="this.style.backgroundColor=\'#FEFEA9\'" onMouseOut="this.style.backgroundColor=\'\'"><td' . ' style="padding:2px;padding-right:10px">' . htmlspecialcharsISO(stripslashes($d['title'])) . '</td>';
            print '<td' . ' align=right>' . $d['hits'] . '&nbsp;&nbsp;</td>';
            print '<td' . ' style="padding:2px"><a href="mail.php?mail=' . $d['email'] . '" target=_blank>' . $d['email'] . '</a></td>';
            print '<td' . ' align=center>' . $d['kosten'] . '</b></td>';
            print '<td' . ' align=center>' . $d['kaesten'] . '</b></td>';
            print '</tr><tr><td colspan=20 height=1 bgcolor="#C8C8C8"></td></tr>';
        }
    } ?>   </table>   </td></tr><tr><td align=right>   <input type="submit" value=" <?php echo $_SP[507] ?> " onClick="return confirm('<?php echo $_SP[507] ?>')">   </form>  <?php
}
elseif ($_GET['edit']) { ?>   <br /><br />   <h1><font color="#C40000">Edit <font color="#000000"><?php echo $editdata['url'] ?></font></h1><br />   <table cellspacing=6 class=ad style="margin-right:50px">   <form method="POST" enctype="multipart/form-data" name="up">   <input type="hidden" name="update" value="<?php echo $editdata['userid'] ?>">   <input type="hidden" name="gr" value="<?php echo $editdata['gridid'] ?>">   <input type="hidden" name="userid" value="<?php echo $editdata['userid'] ?>">   <input type="hidden" name="f"  value="<?php echo $editdata['felder'] ?>">   <input type="hidden" name="kaesten"  value="<?php echo $editdata['kaesten'] ?>">   <tr><td align=right><font color="#C40000"><b>ID:</b></td>    <td><?php echo $editdata['userid'] ?></td></tr>   <tr><td align=right><font color="#C40000"><b><?php echo $_SP[35] ?>:</b></td>    <td><?php echo $editdata['kaesten'] ?></td></tr>   <tr><td align=right></td>    <td><img src="../sp.php?u=<?php echo $editdata['userid'] ?>"></td></tr>   <tr><td align=right><font color="#C40000"><b><?php echo $_SP[36] ?>:</b></td>    <td><input type="file" name="upload" style="width:500px"></td></tr>   <tr><td align=right><font color="#C40000"><b><?php echo $_SP[37] ?>:</b></td>    <td><input type="text" name="url" value="<?php echo htmlspecialcharsISO($editdata['url']) ?>" style="width:500px"></td></tr>   <tr><td align=right><font color="#C40000"><b><?php echo $_SP[38] ?>:</b></td>    <td><input type="text" name="title" value="<?php echo htmlspecialcharsISO(stripslashes($editdata['title'])) ?>" style="width:500px"></td></tr>   <tr><td align=right><font color="#C40000"><b><?php echo $_SP[39] ?>:</b></td>    <td><input type="text" name="email" value="<?php echo htmlspecialcharsISO($editdata['email']) ?>" style="width:500px"></td></tr>   <tr><td align=right><font color="#C40000"><b><?php echo $_SP[451] ?>:</b></td>    <td><input type="text" name="target" value="<?php echo htmlspecialcharsISO($editdata['target']) ?>" style="width:150px"></td></tr>   <tr><td align=right><font color="#C40000"><b><?php echo $_SP[498] ?>:</b></td>    <?php
    if ($editdata['enddate']) {
        list($editdata['del_date_y'], $editdata['del_date_m'], $editdata['del_date_d']) = explode('-', $editdata['enddate']);
    } ?>    <td><select name="del_date_d">  <option value=""></option>  <?php
    foreach (range(1, 31) as $d) {
        $selected = $d == $editdata['del_date_d'] ? ' selected' : '';
        print '<option value="' . $d . '"' . $selected . '>' . $d . '</option>';
    } ?>  </select>  <select name="del_date_m">  <option value=""></option>  <?php
    foreach (range(1, 12) as $d) {
        $selected = $d == $editdata['del_date_m'] ? ' selected' : '';
        print '<option value="' . $d . '"' . $selected . '>' . $d . '</option>';
    } ?>  </select>  <select name="del_date_y">  <option value=""></option>  <?php
    foreach (range(date("Y", time() + (3600 * $CONFIG['timezone'])) , date("Y", time() + (3600 * $CONFIG['timezone'])) + 10) as $d) {
        $selected = $d == $editdata['del_date_y'] ? ' selected' : '';
        print '<option value="' . $d . '"' . $selected . '>' . $d . '</option>';
    } ?>  </select>    </td></tr>   <tr><td align=right><font color="#C40000"><b><?php echo $_SP[499] ?>:</b></td>    <td><input type="text" name="logincode" value="<?php echo htmlspecialcharsISO($editdata['logincode']) ?>" style="width:150px"></td></tr>   <tr><td align=right><font color="#C40000"><b><?php echo $_SP[501] ?>:</b></td>    <td><input type="checkbox" value="1" name="reserved" <?php echo $checked[(int)$editdata['reserved']] ?>></td></tr>   <tr><td colspan="2" align=right><input type="submit" value="  <?php echo $_SP[92] ?>  " name="save"></td></tr>   </table>   <?php
    if (@file_exists('../grids/u' . (int)$editdata['userid'] . '_orig' . $editdata['bildext'])) {
        print '<br /><img src="../grids/u' . (int)$editdata['userid'] . '_orig' . $editdata['bildext'] . '?x=' . time() . '" style="margin-left:20">';
    } ?> <?php
}
elseif ($_GET['op'] == 'blog') { ?>   <?php
    if (!$rich_editor) {
        $buttons = "<INPUT TYPE=\"button\" NAME=\"b\" VALUE=\"" . htmlspecialcharsISO($_SP[93], ENT_QUOTES) . "\" onClick=\"document.blogform.blog_content.value = document.blogform.blog_content.value + '<b>" . htmlspecialcharsISO(addslashes($_SP[99]) , ENT_QUOTES) . "</b>'\">";
        $buttons .= "<INPUT TYPE=\"button\" NAME=\"u\" VALUE=\"" . htmlspecialcharsISO($_SP[94], ENT_QUOTES) . "\" onClick=\"document.blogform.blog_content.value = document.blogform.blog_content.value + '<u>" . htmlspecialcharsISO(addslashes($_SP[100]) , ENT_QUOTES) . "</u>'\">";
        $buttons .= "<INPUT TYPE=\"button\" NAME=\"i\" VALUE=\"" . htmlspecialcharsISO($_SP[95], ENT_QUOTES) . "\" onClick=\"document.blogform.blog_content.value = document.blogform.blog_content.value + '<i>" . htmlspecialcharsISO(addslashes($_SP[101]) , ENT_QUOTES) . "</i>'\">";
        $buttons .= "<INPUT TYPE=\"button\" NAME=\"p\" VALUE=\"" . htmlspecialcharsISO($_SP[96], ENT_QUOTES) . "\" onClick=\"document.blogform.blog_content.value = document.blogform.blog_content.value + '<p>" . htmlspecialcharsISO(addslashes($_SP[102]) , ENT_QUOTES) . "</p>'\">";
        $buttons .= "<INPUT TYPE=\"button\" NAME=\"image\" VALUE=\"" . htmlspecialcharsISO($_SP[97], ENT_QUOTES) . "\" onClick=\"document.blogform.blog_content.value = document.blogform.blog_content.value + '<img src=&quot;mydir/" . htmlspecialcharsISO(addslashes($_SP[103]) , ENT_QUOTES) . "&quot>'\">";
        $buttons .= "<INPUT TYPE=\"button\" NAME=\"link\" VALUE=\"" . htmlspecialcharsISO($_SP[98], ENT_QUOTES) . "\" onClick=\"document.blogform.blog_content.value = document.blogform.blog_content.value + '<a href=&quot;" . htmlspecialcharsISO(addslashes($_SP[104]) , ENT_QUOTES) . "&quot;>" . htmlspecialcharsISO(addslashes($_SP[105]) , ENT_QUOTES) . "</a>'\"> <br /><br />";
    } ?>   <h1><font color="#C40000"><?php echo $_SP[115] ?></font></h1>   <?php echo $_SP[313] ?>   <br />   <br />   <?php echo $Nachricht; ?>   <table cellspacing=6 class=ad align=left>   <form method="POST" action="" name="blogform" <?php echo $rich_editor ?>>   <input type="hidden" name="edit" value="1">   <input type="hidden" name="langkurz"  value="<?php echo $blog['langkurz'] ?>">   <tr><td align=right><font color="#C40000"><b><?php echo $_SP[106] ?>:</b></td>    <td>  <select size="1" name="blog_id" onChange="location.href='index.php?op=blog&blog_id='+blogform.blog_id.options[blogform.blog_id.options.selectedIndex].value" style="margin-right:50px">   <option value=""><?php echo $_SP[109] ?></option>   <?php
    $bentries = DB_array("SELECT blog_id,blog_title,blog_datetime,lang AS langkurz FROM " . $dbprefix . "blog ORDER BY lang,blog_datetime DESC", '*');
    while (list(, $entry) = each($bentries)) {
        $blogdate = date($CONFIG['date_format'] . ', H:i:s', strtotime($entry['blog_datetime']) + (3600 * $CONFIG['timezone']));
        $selected = ($blog['blog_id'] == $entry['blog_id']) ? " selected" : "";
        print '<option value="' . $entry['blog_id'] . '"' . $selected . '>' . $blogdate . ' _[' . ($entry['langkurz'] ? $entry['langkurz'] : $CONFIG['standard_language']) . ']_ ' . $entry['blog_title'] . '</option>';
    } ?>  </select>  <?php echo $_SP[25] ?>:  <select size="1" name="langkurz">   <?php
    $languas = DB_array("SELECT * FROM " . $dbprefix . "languages", '++');
    while (list($code, $value) = each($languas)) {
        if (@file_exists("../lang/$code/language.php")) {
            $selected = $code == $blog['langkurz'] ? " selected" : "";
            print '<option value="' . $code . '"' . $selected . '>' . $value . '</option>';
        }
    } ?>  </select>  <input type="button" style="margin-left:50px" value="<?php echo $_SP[508] ?>" onClick="location.href='index.php?op=blog&blog_id='+blogform.blog_id.options[blogform.blog_id.options.selectedIndex].value+'&wed=<?php echo (int)(!$_SESSION['wed']) ?>'">    </td></tr>   <tr><td align=right><font color="#C40000"><b><?php echo $_SP[90] ?>:</b></td>    <td><input type="text" name="blog_title" style="width:650px" value="<?php echo htmlspecialcharsISO($blog['blog_title']) ?>"></td></tr>   <tr><td align=right valign="top"><font color="#C40000"><b><?php echo $_SP[91] ?>:</b></td>    <td> <?php
    if ($rich_editor) {
        $editor = new rich($caption, "blog_content", $blog['blog_content'], "650", "300", "../../mydir/", $DOMAIN . "/mydir/", false, false);
        $editor->set_lang($admlang);
        $editor->simple_mode(true);
        $editor->active_mode(false);
        $editor->hide_tb("font", false);
        $editor->hide_tb("link", false);
        $editor->hide_tb("special_chars", false);
        $editor->hide_tb("image", false);
        $editor->hide_tb("source", true);
        $editor->hide_tb("form", true);
        $editor->hide_tb("snippets", true);
        $editor->hide_tb("absolute_position", false);
        $editor->hide_tb("hr", false);
        $editor->hide_tb("table", false);
        $editor->hide_tb("adv_table", true);
        $editor->hide_tb("paragraph", false);
        $editor->draw();
    }
    else {
        print '<textarea name="blog_content" style="width:650px" rows="15" style="font-family:fixedsys, courier">' . htmlspecialcharsISO($blog['blog_content']) . '</textarea>';
    } ?>    </td></tr>   <tr><td align=right></td>    <td><?php echo $buttons ?></td></tr>   <tr><td></td><td>  <table width=100%><tr><td><input type="submit" value="  <?php echo $_SP[92] ?>  " name="save"></td>  <td align=right><input style="color:#666666" type="submit" value="  <?php echo $_SP[110] ?>  " name="delete" onClick="return confirm('<?php echo $_SP[111] ?>')"></td></tr></table>    </td></tr>   </form>   </table> <?php
}
elseif ($_GET['op'] == 'faq') { ?>   <?php
    if (!$rich_editor) {
        $buttons = "<INPUT TYPE=\"button\" NAME=\"b\" VALUE=\"" . htmlspecialcharsISO($_SP[93], ENT_QUOTES) . "\" onClick=\"document.faqform.faq_answer.value = document.faqform.faq_answer.value + '<b>" . htmlspecialcharsISO(addslashes($_SP[99]) , ENT_QUOTES) . "</b>'\">";
        $buttons .= "<INPUT TYPE=\"button\" NAME=\"u\" VALUE=\"" . htmlspecialcharsISO($_SP[94], ENT_QUOTES) . "\" onClick=\"document.faqform.faq_answer.value = document.faqform.faq_answer.value + '<u>" . htmlspecialcharsISO(addslashes($_SP[100]) , ENT_QUOTES) . "</u>'\">";
        $buttons .= "<INPUT TYPE=\"button\" NAME=\"i\" VALUE=\"" . htmlspecialcharsISO($_SP[95], ENT_QUOTES) . "\" onClick=\"document.faqform.faq_answer.value = document.faqform.faq_answer.value + '<i>" . htmlspecialcharsISO(addslashes($_SP[101]) , ENT_QUOTES) . "</i>'\">";
        $buttons .= "<INPUT TYPE=\"button\" NAME=\"p\" VALUE=\"" . htmlspecialcharsISO($_SP[96], ENT_QUOTES) . "\" onClick=\"document.faqform.faq_answer.value = document.faqform.faq_answer.value + '<p>" . htmlspecialcharsISO(addslashes($_SP[102]) , ENT_QUOTES) . "</p>'\">";
        $buttons .= "<INPUT TYPE=\"button\" NAME=\"image\" VALUE=\"" . htmlspecialcharsISO($_SP[97], ENT_QUOTES) . "\" onClick=\"document.faqform.faq_answer.value = document.faqform.faq_answer.value + '<img src=&quot;mydir/" . htmlspecialcharsISO(addslashes($_SP[103]) , ENT_QUOTES) . "&quot>'\">";
        $buttons .= "<INPUT TYPE=\"button\" NAME=\"link\" VALUE=\"" . htmlspecialcharsISO($_SP[98], ENT_QUOTES) . "\" onClick=\"document.faqform.faq_answer.value = document.faqform.faq_answer.value + '<a href=&quot;" . htmlspecialcharsISO(addslashes($_SP[104]) , ENT_QUOTES) . "&quot;>" . htmlspecialcharsISO(addslashes($_SP[105]) , ENT_QUOTES) . "</a>'\"> <br /><br />";
    } ?>   <h1><font color="#C40000"><?php echo $_SP[144] ?></font></h1>   <?php echo $_SP[313] ?>   <br />   <br />   <?php echo $Nachricht; ?>   <table cellspacing=6 class=ad align=left>   <form method="POST" action="" name="faqform" <?php echo $rich_editor ?>>   <input type="hidden" name="edit" value="1">   <input type="hidden" name="langkurz"  value="<?php echo $faq['langkurz'] ?>">   <tr><td align=right><font color="#C40000"><b><?php echo $_SP[136] ?>:</b></td>    <td>  <select size="1" name="faq_id" onChange="location.href='index.php?op=faq&faq_id='+faqform.faq_id.options[faqform.faq_id.options.selectedIndex].value" style="margin-right:50px">   <option value=""><?php echo $_SP[139] ?></option>   <?php
    $fentries = DB_array("SELECT faq_nr,faq_id,faq_question,lang AS langkurz FROM " . $dbprefix . "faq ORDER BY lang,faq_nr,faq_id", '*');
    $fnr = count($fentries) + 1;
    while (list(, $entry) = each($fentries)) {
        $selected = ($faq['faq_id'] == $entry['faq_id']) ? " selected" : "";
        print '<option value="' . $entry['faq_id'] . '"' . $selected . '>' . '[' . ($entry['langkurz'] ? $entry['langkurz'] : $CONFIG['standard_language']) . '] (' . $entry['faq_nr'] . ') ' . $entry['faq_question'] . '</option>';
    } ?>  </select>  <?php echo $_SP[25] ?>:  <select size="1" name="langkurz">   <?php
    $languas = DB_array("SELECT * FROM " . $dbprefix . "languages", '++');
    while (list($code, $value) = each($languas)) {
        if (@file_exists("../lang/$code/language.php")) {
            $selected = $code == $faq['langkurz'] ? " selected" : "";
            print '<option value="' . $code . '"' . $selected . '>' . $value . '</option>';
        }
    } ?>  </select>  <input type="button" style="margin-left:50px" value="<?php echo $_SP[508] ?>" onClick="location.href='index.php?op=faq&faq_id='+faqform.faq_id.options[faqform.faq_id.options.selectedIndex].value+'&wed=<?php echo (int)(!$_SESSION['wed']) ?>'">    </td></tr>   <tr><td align=right><font color="#C40000"><b><?php echo $_SP[147] ?>:</b></td>    <td><input type="text" name="faq_nr" style="width:50px" value="<?php
    print ($faq['faq_nr'] != '') ? (int)$faq['faq_nr'] : $fnr; ?>"></td></tr>   <tr><td align=right><font color="#C40000"><b><?php echo $_SP[145] ?>:</b></td>    <td><input type="text" name="faq_question" style="width:650px" value="<?php echo htmlspecialcharsISO($faq['faq_question']) ?>"></td></tr>   <tr><td align=right valign="top"><font color="#C40000"><b><?php echo $_SP[146] ?>:</b></td>    <td> <?php
    if ($rich_editor) {
        $editor = new rich($caption, "faq_answer", $faq['faq_answer'], "650", "300", "../../mydir/", $DOMAIN . "/mydir/", false, false);
        $editor->set_lang($admlang);
        $editor->simple_mode(true);
        $editor->active_mode(false);
        $editor->hide_tb("font", false);
        $editor->hide_tb("link", false);
        $editor->hide_tb("special_chars", false);
        $editor->hide_tb("image", false);
        $editor->hide_tb("source", true);
        $editor->hide_tb("form", true);
        $editor->hide_tb("snippets", true);
        $editor->hide_tb("absolute_position", false);
        $editor->hide_tb("hr", false);
        $editor->hide_tb("table", false);
        $editor->hide_tb("adv_table", true);
        $editor->hide_tb("paragraph", false);
        $editor->draw();
    }
    else {
        print '<textarea name="faq_answer" style="width:650px" rows="15" style="font-family:fixedsys, courier">' . htmlspecialcharsISO($faq['faq_answer']) . '</textarea>';
    } ?>    </td></tr>   <tr><td align=right></td>    <td><?php echo $buttons ?></td></tr>   <tr><td></td><td>  <table width=100%>  <tr><td><input type="submit" value="  <?php echo $_SP[92] ?>  " name="save"></td>  <td align=right><input style="color:#666666" type="submit" value="  <?php echo $_SP[140] ?>  " name="delete" onClick="return confirm('<?php echo $_SP[141] ?>')"></td></tr></table>    </td></tr>   </form>   </table> <?php
}
elseif ($_GET['op'] == 'config') { ?>   <h1><font color="#C40000"><?php echo $_SP[121] ?></font></h1>   <?php echo $_SP[315] ?>   <br />   <br />   <a href="#1" class=d><img src="images/arrow.gif" align=absmiddle hspace=3><?php echo $_SP[125] ?></a><br />   <a href="#2" class=d><img src="images/arrow.gif" align=absmiddle hspace=3><?php echo $_SP[126] ?></a><br />   <a href="#3" class=d><img src="images/arrow.gif" align=absmiddle hspace=3><?php echo $_SP[157] ?> / <?php echo $_SP[158] ?></a><br />   <a href="#4" class=d><img src="images/arrow.gif" align=absmiddle hspace=3><?php echo $_SP[227] ?></a><br />   <br />   <hr>   <a name="1"></a>   <?php echo $Nachricht; ?>   <table cellspacing=6 class=ad align=left>   <form method="POST" action="" name="config">   <tr><td colspan="2"><font color="#C40000"><h2><?php echo $_SP[125] ?></h2></font></td></tr>   <tr><td align=right><b><?php echo $_SP[118] ?>:</b></td>    <td><input type="text" name="domainname" style="width:250px" value="<?php echo htmlspecialcharsISO($cfg['domainname']) ?>"></td></tr>   <tr><td align=right><b><?php echo $_SP[119] ?>:</b></td>    <td><input type="text" name="email_webmaster" style="width:250px" value="<?php echo htmlspecialcharsISO($cfg['email_webmaster']) ?>"></td></tr>   <tr><td align=right><b><?php echo $_SP[120] ?>:</b></td>    <td><input type="text" name="email_feedback" style="width:250px" value="<?php echo htmlspecialcharsISO($cfg['email_feedback']) ?>"></td></tr>   <tr><td align=right><b><?php echo $_SP[127] ?>:</b></td>    <td><select size="1" name="standard_language" style="width:100px">   <?php
    $languas = DB_array("SELECT * FROM " . $dbprefix . "languages", '++');
    while (list($code, $value) = each($languas)) {
        if (@file_exists("../lang/$code/language.php")) {
            $selected = $code == $cfg['standard_language'] ? " selected" : "";
            print '<option value="' . $code . '"' . $selected . '>' . $value . '</option>';
        }
    } ?>  </select></td></tr>   <tr><td align=right><b><?php echo $_SP[130] ?>:</b></td>    <td><input type="password" name="adminpass" style="width:100px" value="<?php echo htmlspecialcharsISO($cfg['adminpass']) ?>"></td></tr>   <tr><td align=right><b><?php echo $_SP[133] ?>:</b></td>    <td><select size="1" name="admin_language" style="width:100px">   <?php
    $languas = DB_array("SELECT * FROM " . $dbprefix . "languages", '++');
    while (list($code, $value) = each($languas)) {
        if (@file_exists("lang/admin_$code.php")) {
            $selected = $code == $cfg['admin_language'] ? " selected" : "";
            print '<option value="' . $code . '"' . $selected . '>' . $value . '</option>';
        }
    } ?>  </select></td></tr>   <tr><td align=right><b><?php echo $_SP[410] ?>:</b></td>    <td><input type="text" name="admindir" style="width:100px" value="<?php echo htmlspecialcharsISO($cfg['admindir']) ?>"> <?php echo help($_SP[411], true, 300, $_SP[410]) ?></td></tr>   <tr><td align=right><b><?php echo $_SP[128] ?>:</b></td>    <td><select size="1" name="date_format" style="width:250px">  <?php
    $date_formats = array(
        'd.m.Y',
        'd. M. Y',
        'j/n/Y',
        'n/j/Y',
        'Y-m-d',
        'Y/m/d',
        'Y/d/m',
        'D d M, Y',
        'D M d, Y',
        'jS F Y',
        'F jS Y'
    );
    $now = time() + (3600 * $cfg['timezone']);
    for ($i = 0;$i < sizeof($date_formats);$i++) {
        $format = $date_formats[$i];
        $display = date($format, $now);
        $df_select .= '<option value="' . $format . '"';
        if ($cfg['date_format'] == $format) {
            $df_select .= ' selected';
        }

        $df_select .= '>' . $display . '</option>';
    }

    print $df_select; ?>  </select></td></tr>   <tr><td align=right><b><?php echo $_SP[412] ?>:</b></td>    <td><select size="1" name="timezone" style="width:250px">    <option value="-13" <?php
    if ($cfg['timezone'] == '-13') {
        print 'selected';
    } ?>>-13h</option>    <option value="-12" <?php
    if ($cfg['timezone'] == '-12') {
        print 'selected';
    } ?>>-12h</option>    <option value="-11" <?php
    if ($cfg['timezone'] == '-11') {
        print 'selected';
    } ?>>-11h</option>    <option value="-10" <?php
    if ($cfg['timezone'] == '-10') {
        print 'selected';
    } ?>>-10h</option>    <option value="-9"  <?php
    if ($cfg['timezone'] == '-9') {
        print 'selected';
    } ?>>-09h</option>    <option value="-8"  <?php
    if ($cfg['timezone'] == '-8') {
        print 'selected';
    } ?>>-08h</option>    <option value="-7"  <?php
    if ($cfg['timezone'] == '-7') {
        print 'selected';
    } ?>>-07h</option>    <option value="-6"  <?php
    if ($cfg['timezone'] == '-6') {
        print 'selected';
    } ?>>-06h</option>    <option value="-5"  <?php
    if ($cfg['timezone'] == '-5') {
        print 'selected';
    } ?>>-05h</option>    <option value="-4"  <?php
    if ($cfg['timezone'] == '-4') {
        print 'selected';
    } ?>>-04h</option>    <option value="-3"  <?php
    if ($cfg['timezone'] == '-3') {
        print 'selected';
    } ?>>-03h</option>    <option value="-2"  <?php
    if ($cfg['timezone'] == '-2') {
        print 'selected';
    } ?>>-02h</option>    <option value="-1"  <?php
    if ($cfg['timezone'] == '-1') {
        print 'selected';
    } ?>>-01h</option>    <option value="0"   <?php
    if ($cfg['timezone'] == 0) {
        print 'selected';
    } ?>>MEZ</option>    <option value="1"   <?php
    if ($cfg['timezone'] == 1) {
        print 'selected';
    } ?>>+01h</option>    <option value="2"   <?php
    if ($cfg['timezone'] == 2) {
        print 'selected';
    } ?>>+02h</option>    <option value="3"   <?php
    if ($cfg['timezone'] == 3) {
        print 'selected';
    } ?>>+03h</option>    <option value="4"   <?php
    if ($cfg['timezone'] == 4) {
        print 'selected';
    } ?>>+04h</option>    <option value="5"   <?php
    if ($cfg['timezone'] == 5) {
        print 'selected';
    } ?>>+05h</option>    <option value="6"   <?php
    if ($cfg['timezone'] == 6) {
        print 'selected';
    } ?>>+06h</option>    <option value="7"   <?php
    if ($cfg['timezone'] == 7) {
        print 'selected';
    } ?>>+07h</option>    <option value="8"   <?php
    if ($cfg['timezone'] == 8) {
        print 'selected';
    } ?>>+08h</option>    <option value="9"   <?php
    if ($cfg['timezone'] == 9) {
        print 'selected';
    } ?>>+09h</option>    <option value="10"  <?php
    if ($cfg['timezone'] == 10) {
        print 'selected';
    } ?>>+10h</option>    <option value="11"  <?php
    if ($cfg['timezone'] == 11) {
        print 'selected';
    } ?>>+11h</option>  </select></td></tr>   <tr><td align=right><b><?php echo $_SP[300] ?>:</b></td>    <td><input type="text" name="delete_days" style="width:100px" value="<?php echo (int)($cfg['delete_days']) ?>"> <?php echo help($_SP[299], true, 300, $_SP[300]) ?></td></tr>   <tr><td align=right><b><?php echo $_SP[301] ?>:</b></td>    <td><select size="1" name="daily" style="width:350px">  <option value="1" <?php
    if ($cfg['daily'] == 1) {
        print 'selected';
    } ?>><?php echo $_SP[302] ?></option>  <option value="0" <?php
    if ($cfg['daily'] == 0) {
        print 'selected';
    } ?>><?php echo $_SP[303] ?></option>  </select></td></tr>   <tr><td colspan="2"><hr><a name="2"></a><font color="#C40000"><br /><h2><?php echo $_SP[126] ?></font></h2></td></tr>   <tr><td align=right><b><?php echo $_SP[124] ?>:</b></td>    <td><input type="text" name="website_title" style="width:350px" value="<?php echo htmlspecialcharsISO($cfg['website_title']) ?>"></td></tr>   <tr><td align=right><b><?php echo $_SP[122] ?>:</b></td>    <td><input type="text" name="meta_keywords" maxlength="1000" style="width:500px" value="<?php echo htmlspecialcharsISO($cfg['meta_keywords']) ?>"></td></tr>   <tr><td align=right><b><?php echo $_SP[123] ?>:</b></td>    <td><input type="text" name="meta_description" maxlength="1000" style="width:500px" value="<?php echo htmlspecialcharsISO($cfg['meta_description']) ?>"></td></tr>   <tr><td align=right><b><?php echo $_SP[226] ?>:</b></td>    <td><select size="1" name="design" style="width:350px">  <?php
    $dhandle = opendir("../style/");
    $filenames = array();
    while ($files = readdir($dhandle)) {
        if ($files != "." && $files != ".." && strtolower($files) != ".htaccess" && strtolower($files) != ".htuser" && strtolower($files) != ".htgroup") {
            $filenames[] = $files;
        }
    }

    closedir($dhandle);
    sort($filenames);
    reset($filenames);
    while (list(, $filename) = each($filenames)) {
        $selected = ($cfg['design'] == $filename) ? " selected" : "";
        print '<option value="' . $filename . '"' . $selected . '>' . $filename . '</option>';
    }

    clearstatcache(); ?>  </select></td></tr>   <tr><td align=right><b><?php echo $_SP[437] ?>:</b></td>    <td><select size="1" name="submenu_style" style="width:350">  <option value="0" <?php
    if ($cfg['submenu_style'] == 0) {
        print 'selected';
    } ?>><?php echo $_SP[438] ?></option>  <option value="1" <?php
    if ($cfg['submenu_style'] == 1) {
        print 'selected';
    } ?>><?php echo $_SP[439] ?></option>  </select></td></tr>   <tr><td align=right valign="top"><b><?php echo $_SP[131] ?>:</b></td>    <td valign="top"><table><tr><td valign="top"><textarea name="google_adsense" style="width:350px" rows="10" style="font-family:fixedsys, courier"><?php echo htmlspecialcharsISO($cfg['google_adsense']) ?></textarea></td>     <td width=250 valign="top" style="padding:10px"><font class="desc"><?php echo $_SP[132] ?><br />     <script type="text/javascript"><!--   var  google_ad_client = "pub-1050891204366695";     google_ad_width = 110;     google_ad_height = 32;     google_ad_format = "110x32_as_rimg";     google_cpa_choice = "<?php
    print ($CONFIG['admin_language'] == 'de') ? 'CAAQ8d-bzgEaCNhSwM-aENZDKNOV5HQ' : 'CAAQ2ZCazgEaCCvPXrFfpg_0KPmNxXQ'; ?>";     //--></script>     <script type="text/javascript" src="http://pagead2.googlesyndication.com/pagead/show_ads.js">     </script>     </td></tr></table></td></tr>   <tr><td align=right valign="top"><b><?php echo $_SP[161] ?>:</b></td>    <td valign="top"><table><tr><td><textarea name="google_adsense_v" style="width:350" rows="10" style="font-family:fixedsys, courier"><?php echo htmlspecialcharsISO($cfg['google_adsense_v']) ?></textarea></td>     <td width=250 valign="top" style="padding:10px"><font class="desc"><?php echo $_SP[162] ?>     </td></tr></table></td></tr>   <tr><td align=right valign="top"><b><?php echo $_SP[156] ?>:</b></td>    <td valign="top"><textarea name="legal_notice" style="width:350px" rows="6" style="font-family:fixedsys, courier"><?php echo htmlspecialcharsISO($cfg['legal_notice']) ?></textarea></td></tr>   <tr><td colspan="2"><hr>    <a name="3"></a>    <table><tr><td valign="top" style="padding-left:57px">   <table>  <tr><td colspan="2"><font color="#C40000"><br /><h2><?php echo $_SP[157] ?></h2><?php echo $_SP[261] ?></font><br /><br /></td></tr>  <tr><td align=right><b><?php echo $_SP[148] ?>:</b></td>   <td><input type="checkbox" name="menu_top" <?php echo $checked[(int)$cfg['menu_top']] ?> value="1"></td></tr>  <tr><td align=right nowrap><b><?php echo $_SP[434] ?>:</b></td>   <td nowrap><input type="text" name="ranking_value" maxlength=3 style="width:50px" value="<?php echo (int)$cfg['ranking_value'] ?>"><?php echo help($_SP[435], true, 300, $_SP[434]) ?></td></tr>  <tr><td></td><td><a href="index.php?op=config&reset_ranking=1" class=d onClick="return confirm('<?php echo $_SP[511] ?>')"><?php echo $_SP[511] ?></a></td></tr>  <tr><td align=right><b><?php echo $_SP[149] ?>:</b></td>   <td><input type="checkbox" name="menu_referrer" <?php echo $checked[(int)$cfg['menu_referrer']] ?> value="1"></td></tr>  <tr><td align=right nowrap><b><?php echo $_SP[436] ?>:</b></td>   <td nowrap><input type="text" name="referrer_value" maxlength=3 style="width:50px" value="<?php echo (int)$cfg['referrer_value'] ?>"><?php echo help($_SP[435], true, 300, $_SP[436]) ?></td></tr>  <tr><td></td><td><a href="index.php?op=config&reset_referrer=1" class=d onClick="return confirm('<?php echo $_SP[511] ?>')"><?php echo $_SP[511] ?></a></td></tr>  <tr><td align=right><b><?php echo $_SP[150] ?>:</b></td>   <td><input type="checkbox" name="menu_traffic"   <?php echo $checked[(int)$cfg['menu_traffic']] ?> value="1"></td></tr>  <tr><td align=right><b><?php echo $_SP[151] ?>:</b></td>   <td><input type="checkbox" name="menu_blog"   <?php echo $checked[(int)$cfg['menu_blog']] ?> value="1"></td></tr>  <tr><td align=right><b><?php echo $_SP[152] ?>:</b></td>   <td><input type="checkbox" name="menu_faq" <?php echo $checked[(int)$cfg['menu_faq']] ?> value="1"></td></tr>  <tr><td align=right><b><?php echo $_SP[135] ?>:</b></td>   <td><input type="checkbox" name="menu_pixellist" <?php echo $checked[(int)$cfg['menu_pixellist']] ?> value="1"></td></tr>  <tr><td align=right><b><?php echo $_SP[153] ?>:</b></td>   <td><input type="checkbox" name="menu_feedback"  <?php echo $checked[(int)$cfg['menu_feedback']] ?> value="1"></td></tr>  <tr><td align=right><b><?php echo $_SP[154] ?>:</b></td>   <td><input type="checkbox" name="menu_recommend" <?php echo $checked[(int)$cfg['menu_recommend']] ?> value="1"></td></tr>  <tr><td align=right><b><?php echo $_SP[155] ?>:</b></td>   <td><input type="checkbox" name="menu_linkus" <?php echo $checked[(int)$cfg['menu_linkus']] ?> value="1"></td></tr>  <tr><td align=right><b><?php echo $_SP[53] ?>:</b></td>   <td><input type="checkbox" name="menu_newsletter"   <?php echo $checked[(int)$cfg['menu_newsletter']] ?> value="1"></td></tr>  <tr><td align=right><b><?php echo $_SP[156] ?>:</b></td>   <td><input type="checkbox" name="menu_legaln" <?php echo $checked[(int)$cfg['menu_legaln']] ?> value="1"></td></tr>   </table>    </td><td valign="top" style="padding-left:150px">   <table>  <tr><td colspan="2"><font color="#C40000"><br /><h2><?php echo $_SP[158] ?></h2><?php echo $_SP[262] ?></font><br /><br /></td></tr>  <?php
    if ($languauages = DB_array("SELECT * FROM " . $dbprefix . "languages", '*')) {
        while (list(, $lg) = each($languauages)) {
            if (@file_exists('../lang/' . $lg['code'] . '/language.php')) {
                print '<tr><td align=right><b>' . ucfirst($lg['language']) . ':</b></td>';
                print ' <td><input type="checkbox" ' . $disabled . ' name="languages[' . $lg['code'] . ']" ' . $checked[(int)$lg['active']] . ' value="1"></td></tr>';
            }
        }
    } ?>   </table>   </td></tr></table>   </td></tr>   <tr><td colspan="2"><a name="4"></a><hr><font color="#C40000"><br /><h2><?php echo $_SP[227] ?></h2><?php echo $_SP[260] ?></font><br /><br /></td></tr>   <tr><td align=right><b><?php echo $_SP[228] ?>:</b></td>    <td><input type="text" name="email_paypal" style="width:250px" value="<?php echo htmlspecialcharsISO($cfg['email_paypal']) ?>"> <a href="http://www.paypal.com" target="_blank"><img src="images/arrow.gif" align=absmiddle hspace=3><?php echo $_SP[257] ?></a></td></tr>   <tr><td align=right><b><?php echo $_SP[229] ?>:</b></td>    <td><input type="text" name="2checkout_id" style="width:250px" value="<?php echo htmlspecialcharsISO($cfg['2checkout_id']) ?>"> <a href="https://www.2checkout.com/2co/signup?affiliate=461831" target="_blank"><img src="images/arrow.gif" align=absmiddle hspace=3><?php echo $_SP[258] ?></a></td></tr>   <tr><td align=right><b><?php echo $_SP[256] ?>:</b></td>    <td><input type="text" name="2checkout_product_id" style="width:250px" value="<?php echo htmlspecialcharsISO($cfg['2checkout_product_id']) ?>"> <?php echo help($_SP[263], true, 300, $_SP[256]) ?></td></tr>   <tr><td align=right><b><?php echo $_SP[230] ?>:</b></td><td><input type="text" name="email_stormpay" style="width:250px" value="<?php echo htmlspecialcharsISO($cfg['email_stormpay']) ?>"> <a href="https://checkout.google.com/" target="_blank"><img src="images/arrow.gif" align=absmiddle hspace=3><?php echo $_SP[259] ?></a></td></tr><tr><td align=right><b><?php echo $_SP[264] ?>:</b></td>    <td><input type="text" name="egold_account" style="width:250px" value="<?php echo htmlspecialcharsISO($cfg['egold_account']) ?>"> <a href="http://www.e-gold.com/e-gold.asp?cid=2641052" target="_blank"><img src="images/arrow.gif" align=absmiddle hspace=3><?php echo $_SP[265] ?></a></td></tr>   <tr><td align=right><b><?php echo $_SP[232] ?>:</b></td>    <td><input type="text" name="email_alertpay" style="width:250px" value="<?php echo htmlspecialcharsISO($cfg['email_alertpay']) ?>"> <a href="http://www.alertpay.com/?12100" target="_blank"><img src="images/arrow.gif" align=absmiddle hspace=3><?php echo $_SP[304] ?></a></td></tr>   <tr><td align=right><b><?php echo $_SP[311] ?>:</b></td>    <td><input type="text" name="email_safepay" style="width:250px" value="<?php echo htmlspecialcharsISO($cfg['email_safepay']) ?>"> <a href="https://www.safepaysolutions.com/index.php?usr=texmedia" target="_blank"><img src="images/arrow.gif" align=absmiddle hspace=3><?php echo $_SP[310] ?></a></td></tr>   <tr><td colspan=2><hr></td></tr>   <tr><td></td><td><br /><input type="submit" style="height:25px" value="  <?php echo $_SP[117] ?>  " name="save">    </td></tr>   </form>   </table> <?php
}
elseif ($_GET['op'] == 'text') { ?>   <h1><font color="#C40000"><?php echo $_SP[248] ?></font></h1>   <?php echo $_SP[284] ?>   <br />   <a href="#edt" class=d><img src="images/arrow.gif" align=absmiddle hspace=3><?php echo $_SP[249] ?></a><br />   <a href="#edl" class=d><img src="images/arrow.gif" align=absmiddle hspace=3><?php echo $_SP[275] ?></a><br />   <a href="#edu" class=d><img src="images/arrow.gif" align=absmiddle hspace=3><?php echo $_SP[285] ?></a><br />   <br />   <hr>   <a name="edt"></a>   <h2><font color="#C40000"><?php echo $_SP[249] ?></font></h2>   <?php echo $_SP[270] ?>   <br /><br />   <?php
    if ($shownachricht == 1) {
        print $Nachricht;
    } ?>   <table border="0" cellspacing="0" cellpadding="3"><tr><td>  <table border="0" cellspacing="1" cellpadding="2"  style="width:1000px">    <tr><td nowrap>     <form method="POST" action="#edt" name="edit_templates">    <input type="hidden" name="op"  value="text">    <!--<input type="hidden" name="langkurz"  value="<?php echo $langkurz ?>">-->    <input type="hidden" name="show_styles"  value="<?php echo $show_styles ?>">    <select size="1" name="filename" style="width:250px" onChange="submit()">     <option value=""><?php echo $_SP[269] ?></option>     <?php
    $dhandle = opendir("../lang/" . $langkurz);
    $filenames = array();
    while ($files = readdir($dhandle)) {
        if ($files != "." && $files != ".." && (strpos($files, '.htm') || strpos($files, '.txt')) && strtolower($files) != ".htaccess" && strtolower($files) != ".htuser" && strtolower($files) != ".htgroup") {
            if (substr($files, 0, 9) == 'standard_') {
                $filenames_colors[$files] = 'style="background-color:#C8C8C8"';
            }

            if (substr($files, 0, 5) == 'grid_') {
                $filenames_colors[$files] = 'style="background-color:#FFFFD4"';
            }

            if (substr($files, 0, 5) == 'page_') {
                $filenames_colors[$files] = 'style="background-color:#FFD4D4"';
            }

            if (substr($files, 0, 5) == 'mail_') {
                $filenames_colors[$files] = 'style="background-color:#AAD4FF"';
            }

            $filenames[] = $files;
        }
    }

    closedir($dhandle);
    clearstatcache();
    $dhandle = opendir("../$designpath");
    while ($styles = readdir($dhandle)) {
        if ($styles != "." && $styles != ".." && strpos($styles, '.css') && strtolower($files) != ".htaccess" && strtolower($files) != ".htuser" && strtolower($files) != ".htgroup") {
            $filenames_colors[$styles] = 'style="background-color:#D4FFD4"';
            $filenames[] = $styles;
        }
    }

    closedir($dhandle);
    clearstatcache();
    natsort($filenames);
    reset($filenames);
    while (list(, $filename) = each($filenames)) {
        if ($_REQUEST['filename'] == $filename) {
            $selected = " selected";
            $findfile = true;
        }
        else {
            $selected = '';
        }

        print '<option value="' . $filename . '"' . $selected . ' ' . $filenames_colors[$filename] . '>' . str_replace('.htm', '', $filename) . '</option>';
    } ?>    </select>    <input type="submit" value=" <?php echo $_SP[291] ?> " name="save">     </td>   <td width="100%" align=right nowrap style="padding-left:10px"><b><font color="#0000FF"><?php echo $_SP[282] ?></b></font>&nbsp;</td>   <td nowrap><select size="1" name="langkurz" onChange="submit()">     <?php
    $languas = DB_array("SELECT * FROM " . $dbprefix . "languages", '++');
    while (list($code, $value) = each($languas)) {
        if (@file_exists("../lang/$code/language.php")) {
            $selected = $code == $langkurz ? " selected" : "";
            print '<option value="' . $code . '"' . $selected . '>' . $value . '</option>';
        }
    } ?>    </select>    <input type="button" style="margin-left:10" value="<?php echo $_SP[508] ?>" onClick="location.href='index.php?op=text&filename='+edit_templates.filename.options[edit_templates.filename.options.selectedIndex].value+'&langkurz='+edit_templates.langkurz.options[edit_templates.langkurz.options.selectedIndex].value+'&wed=<?php echo (int)(!$_SESSION['wed']) ?>'">    <input type="checkbox" value="1" <?php echo ($show_styles ? 'checked' : '') ?> onClick="location.href='index.php?op=text&filename='+edit_templates.filename.options[edit_templates.filename.options.selectedIndex].value+'&langkurz='+edit_templates.langkurz.options[edit_templates.langkurz.options.selectedIndex].value+'&show_styles=<?php echo (int)(!$show_styles) ?>'"><?php echo $_SP[509] ?>    </td></tr>     </form>     </tr>  </table><br />  <?php
    print '<font color="#0000FF"><h2><img src="images/arrow.gif" align=absmiddle hspace=3>' . ($findfile ? $_REQUEST['filename'] : $_SP[269]) . '</h2></font>'; ?>   </td></tr>  <tr><td>   <form method="POST" action="#edt" <?php echo $rich_editor ?>>  <input type="hidden" name="op"  value="text">  <input type="hidden" name="langkurz"  value="<?php echo $langkurz ?>">  <input type="hidden" name="filename" value="<?php
    print $_REQUEST['filename']; ?>"> <?php
    if (!empty($_REQUEST['filename'])) {
        if ($carray = @file('../lang/' . $langkurz . '/' . ($_REQUEST['filename']))) {
            while (list(, $value) = each($carray)) {
                $file_content .= $value;
            }
        }
        elseif (strpos($_REQUEST['filename'], '.css') && $carray = @file("../$designpath" . ($_REQUEST['filename']))) {
            while (list(, $value) = each($carray)) {
                $file_content .= $value;
                $rich_editor = false;
            }
        }

        if (substr($_REQUEST['filename'], 0, 5) == 'mail_') {
            $rich_editor = false;
        }
    }

    if ($rich_editor) {
        $editor = new rich($caption, "filecontent", stripslashes($file_content) , "1000", "500", "../../mydir/", $DOMAIN . "/mydir/", false, false);
        $editor->set_lang($admlang);
        $editor->simple_mode(true);
        $editor->active_mode(false);
        $editor->hide_tb("font", false);
        $editor->hide_tb("link", false);
        $editor->hide_tb("special_chars", false);
        $editor->hide_tb("image", false);
        $editor->hide_tb("source", true);
        $editor->hide_tb("form", true);
        $editor->hide_tb("snippets", true);
        $editor->hide_tb("size", false);
        $editor->hide_tb("style", false);
        $editor->hide_tb("absolute_position", false);
        $editor->hide_tb("hr", false);
        $editor->hide_tb("table", false);
        $editor->hide_tb("adv_table", true);
        $editor->hide_tb("paragraph", false);
        $editor->set_borders_visibility(true);
        $editor->set_br_on_enter($set_on);
        $editor->set_snippets(array(
            'MYDIR' => "%[MYDIR]%"
        ));
        if ($show_styles) {
            $editor->set_default_stylesheet('../' . $designpath . 'style.css');
        }

        $editor->draw();
    }
    else {
        print '<textarea wrap="off" rows="29" name="filecontent" cols="105" style="width:1000px;font: bold fixedsys, courier, lucida Console, arial; font-size: 12px; background-color: #FFFFEC">' . htmlspecialcharsISO($file_content) . '</textarea>';
    } ?>   </td></tr>  <tr><td valign="top">   <table width=100%><tr><td><input type="submit" value=" <?php echo $_SP[274] ?> " name="submit" onClick="return confirm('<?php echo $_SP[50] ?>')"></td>   <td align=right>   <?php
    if ($_REQUEST['filename'] && file_exists('../lang/' . $langkurz . '/backup/' . ($_REQUEST['filename']))) {
        print '<input type="submit" value="' . $_SP[510] . '" name="restore" onClick="return confirm(\'' . $_SP[510] . '\')" style="margin-left:300;color:blue;background:#C8C8C8">';
    } ?>    </td></tr></table>  </td></tr>  </form>   </table>   <br /><br />   <hr>   <a name="edl"></a>   <h2><font color="#C40000"><?php echo $_SP[275] ?></font></h2>   <?php echo $_SP[279] ?>   <br /><br />   <?php
    if ($shownachricht == 2) {
        print $Nachricht;
    } ?>   <table border="0" cellspacing="1" cellpadding="2" width="1000">  <form method="POST" action="#edl">    <input type="hidden" name="op"  value="text">    <input type="hidden" name="langkurz"  value="<?php echo $langkurz ?>">    <input type="hidden" name="sentencesnr"  value="<?php echo $_POST['sentences'] ?>">   <tr><td width="100%" align=right><b><font color="#0000FF"><?php echo $_SP[282] ?></b></font>&nbsp;</td>    <td><select size="1" name="langkurz" style="width:100px" onChange="submit()">   <?php
    $languas = DB_array("SELECT * FROM " . $dbprefix . "languages", '++');
    while (list($code, $value) = each($languas)) {
        if (@file_exists("../lang/$code/language.php")) {
            $selected = $code == $langkurz ? " selected" : "";
            print '<option value="' . $code . '"' . $selected . '>' . $value . '</option>';
        }
    } ?>  </select>  </td></tr>   </table>   <select size="1" name="sentences" style="width:1000px" onChange="submit()">   <?php
    $LANGUAGEFILE = readlanguagefile($langkurz);
    if (is_array($LANGUAGEFILE)) {
        asort($LANGUAGEFILE);
        while (list($nr, $sentences) = each($LANGUAGEFILE)) {
            $selected = $nr == $_POST['sentences'] ? " selected" : "";
            print '<option value="' . $nr . '"' . $selected . '>' . htmlspecialcharsISO(stripslashes($sentences)) . '</option>';
        }
    } ?>   </select><br /> <textarea wrap="off" rows="5" name="sentence" cols="105" style="width:1000px;font: bold fixedsys, courier, lucida Console, arial; font-size: 12px; background-color: #FFFFEC"> <?php echo htmlspecialcharsISO($LANGUAGEFILE[$_POST['sentences']]) ?> </textarea>  <table width=100%><tr><td><input type="submit" value=" <?php echo $_SP[283] ?> " name="sentencesubmit" onClick="return confirm('<?php echo $_SP[50] ?>')"></td>  <td align=right>  <?php
    if (@file_exists('../lang/' . $langkurz . '/backup/language.php')) {
        print '<input type="submit" value="' . $_SP[510] . '" name="restorelf" onClick="return confirm(\'' . $_SP[510] . '\')" style="margin-left:300;color:blue;background:#C8C8C8">';
    } ?>   </td></tr></table>   </form>   <br />   <hr>   <a name="edu"></a>   <h2><font color="#C40000"><?php echo $_SP[285] ?></font></h2>   <?php echo $_SP[286] ?>   <br /><br />   <?php
    if ($shownachricht == 3) {
        print $Nachricht;
    } ?>  <form enctype="multipart/form-data" action="#edu" name="upl" method="POST">    <input type="hidden" name="MAX_FILE_SIZE" value="10000000">    <input type="hidden" name="op" value="text">    <input type="file" name="datei" style="width:500px;height:20px" size="40">    <input type="checkbox" style="margin-left:20" name="logo" value="1"><?php echo $_SP[287] ?><br />    <input type="submit" value=" <?php echo $_SP[288] ?> " name="upload">   <br /><br />   <?php echo $_SP[295] ?><br />   <select size="5" name="mydir" style="width:250px">    <?php
    $dhandle = opendir("../mydir");
    $filenames = array();
    while ($files = readdir($dhandle)) {
        if ($files != "." && $files != ".." && is_string($files) && strtolower($files) != ".htaccess" && strtolower($files) != ".htuser" && strtolower($files) != ".htgroup") {
            $filenames[] = $files;
        }
    }

    closedir($dhandle);
    sort($filenames);
    while (list(, $filename) = each($filenames)) print '<option value="' . $filename . '"' . $selected . '>' . htmlspecialcharsISO($filename) . '</option>';
    clearstatcache(); ?>   </select><br />   <input type="submit" value=" <?php echo $_SP[292] ?> " name="delete" onClick="confirm('<?php echo $_SP[293] ?>')">   <br /><br /><br />   </form>  <?php
}
elseif ($_GET['op'] == 'ban') { ?>   <h1><font color="#C40000"><?php echo $_SP[159] ?></font></h1>   <?php echo $_SP[518] ?>   <br /><br />   <?php echo $Nachricht; ?>   <table cellspacing=5 style="margin:3px 0;float:left;border: 1px solid #999999;" bgcolor="#D8D8D8">   <form method="POST" action="" name="ban">   <input type="hidden" name="s" value="<?php echo $_GET['s'] ?>">   <input type="hidden" name="sort" value="<?php echo $_GET['sort'] ?>">   <input type="hidden" name="op" value="ban">   <input type="hidden" name="ed" value="<?php echo $_REQUEST['ed'] ?>">   <tr><td align=right><img src="images/arrow.gif" align="absmiddle">&nbsp;<b><?php echo $_SP[519] ?></b></td>    <td><input type="text" name="ban" style="width:250px" value="<?php echo htmlspecialcharsISO($_POST['ban']) ?>"></td></tr>   <tr><td align=right><b><?php echo $_SP[520] ?></b></td><td></td></tr>   <tr><td align=right><input type="checkbox" id="ban_site" name="ban_site" value="1" <?php echo $checked[(int)$_POST['ban_site']] ?>></td>    <td><label for="ban_site"><b><?php echo $_SP[521] ?></b></label></td></tr>   <tr><td align=right><input type="checkbox" id="ban_title" name="ban_title" value="1" <?php echo $checked[(int)$_POST['ban_title']] ?>></td>    <td><label for="ban_title"><b><?php echo $_SP[522] ?></b></label></td></tr>   <tr><td align=right><input type="checkbox" id="ban_url" name="ban_url" value="1" <?php echo $checked[(int)$_POST['ban_url']] ?>></td>    <td><label for="ban_url"><b><?php echo $_SP[523] ?></b></label></td></tr>   <tr><td align=right><input type="checkbox" id="ban_email" name="ban_email" value="1" <?php echo $checked[(int)$_POST['ban_email']] ?>></td>    <td><label for="ban_email"><b><?php echo $_SP[524] ?></b></label></td></tr>   <tr><td align=right><input type="checkbox" id="ban_feedback" name="ban_feedback" value="1" <?php echo $checked[(int)$_POST['ban_feedback']] ?>></td>    <td><label for="ban_feedback"><b><?php echo $_SP[525] ?></b></label></td></tr>   <tr><td align=right><input type="checkbox" id="ban_recommend" name="ban_recommend" value="1" <?php echo $checked[(int)$_POST['ban_recommend']] ?>></td>    <td><label for="ban_recommend"><b><?php echo $_SP[526] ?></b></label></td></tr>   <tr><td align=right><input type="checkbox" id="ban_newsletter" name="ban_newsletter" value="1" <?php echo $checked[(int)$_POST['ban_newsletter']] ?>></td>    <td><label for="ban_newsletter"><b><?php echo $_SP[527] ?></b></label></td></tr>   <tr><td align=right><input type="checkbox" id="ban_top" name="ban_top" value="1" <?php echo $checked[(int)$_POST['ban_top']] ?>></td>    <td><label for="ban_top"><b><?php echo $_SP[528] ?></b></label></td></tr>   <tr><td align=right><input type="checkbox" id="ban_referrer" name="ban_referrer" value="1" <?php echo $checked[(int)$_POST['ban_referrer']] ?>></td>    <td><label for="ban_referrer"><b><?php echo $_SP[529] ?></b></label></td></tr>   <tr><td></td><td><input type="submit" name="ok" value="<?php echo $_SP[92] ?>"></td>    </tr>   </table>   <table cellspacing=1 align=left style="margin:3px;border: 1px solid #999999;" bgcolor="#EEEEEE">   <tr><td style="padding:3px" bgcolor="#BD390D" height=22><font color="#FFFFFF">&nbsp;<b><?php echo $_SP[530] ?></b></td>    <td style="padding:3px" bgcolor="#BD390D"><font color="#FFFFFF">&nbsp;<b><?php echo $_SP[520] ?></b></td>    <td style="padding:3px" bgcolor="#BD390D"><font color="#FFFFFF">&nbsp;<b><?php echo $_SP[29] ?></b></td>   </tr>   <?php
    if ($BAN_DATA) {
        while (list(, $d) = each($BAN_DATA)) {
            $col = $col ? ' style="padding:3px"' : ' bgcolor="#E0E0E0" style="padding:3px"';
            print '<tr>';
            print "<td $col><a href=\"index.php?op=ban&ed=" . $d['ban_id'] . "\">" . $d['ban'] . "</a></td>";
            print "<td $col><img src=\"images/" . ($d['ban_site'] ? 'y' : 'o') . ".gif\" hspace=2>";
            print "<img src=\"images/" . ($d['ban_title'] ? 'y' : 'o') . ".gif\" hspace=2>";
            print "<img src=\"images/" . ($d['ban_url'] ? 'y' : 'o') . ".gif\" hspace=2>";
            print "<img src=\"images/" . ($d['ban_email'] ? 'y' : 'o') . ".gif\" hspace=2>";
            print "<img src=\"images/" . ($d['ban_feedback'] ? 'y' : 'o') . ".gif\" hspace=2>";
            print "<img src=\"images/" . ($d['ban_recommend'] ? 'y' : 'o') . ".gif\" hspace=2>";
            print "<img src=\"images/" . ($d['ban_newsletter'] ? 'y' : 'o') . ".gif\" hspace=2>";
            print "<img src=\"images/" . ($d['ban_top'] ? 'y' : 'o') . ".gif\" hspace=2>";
            print "<img src=\"images/" . ($d['ban_referrer'] ? 'y' : 'o') . ".gif\" hspace=2>";
            print "</td><td $col>";
            print '<a href="index.php?op=ban&kill=' . $d['ban_id'] . '" style="margin-left:6">' . $newpoint . '<font color=red>' . $_SP[33] . '</a></font><br />';
            print '</td></tr>';
        }
    }
    else {
        print '<tr><td colspan=10 style="padding:10px">&nbsp;' . $_SP[531] . '</td></tr>';
    } ?>   </table>  <?php
}
elseif ($_GET['op'] == 'jobs') { ?>   <h1><font color="#C40000"><?php echo $_SP[341] ?></font></h1>   <?php echo $_SP[534] ?>   <br /><br />   <?php echo $Nachricht; ?>   <?php
    if (!$_GET['new'] && !$_POST['jobedit'] && $_GET['job_id'] == '') { ?>    <input type=button onClick="location.href='index.php?op=jobs&new=1'" style="height:25px;" value="<?php echo $_SP[342] ?>">    <table cellspacing=1 width=100% align=left style="margin-top:20px;border: 1px solid #999999;" bgcolor="#EEEEEE">    <tr><td bgcolor="#AA5F6C"><font color="#FFFFFF">&nbsp;<b><?php echo $_SP[383] ?></b></td>  <td bgcolor="#AA5F6C" height=22><font color="#FFFFFF">&nbsp;<b><?php echo $_SP[345] ?></b></td>  <td bgcolor="#AA5F6C"><font color="#FFFFFF">&nbsp;<b><?php echo $_SP[346] ?></b></td>  <td bgcolor="#AA5F6C"><font color="#FFFFFF">&nbsp;<b><?php echo $_SP[347] ?></b></td>  <td bgcolor="#AA5F6C"><font color="#FFFFFF">&nbsp;<b><?php echo $_SP[348] ?></b></td>  <td bgcolor="#AA5F6C"><font color="#FFFFFF">&nbsp;<b><?php echo $_SP[349] ?></b></td></tr>    <?php
        if ($JOB_DATA = DB_array("SELECT * FROM " . $dbprefix . "jobs", '*')) {
            while (list(, $d) = each($JOB_DATA)) {
                $col = $col ? '' : ' bgcolor="#E0E0E0"';
                print '<tr>';
                print "<td $col align=center>" . '<img src="images/' . ((int)$d['job_active']) . '.gif" align=absmiddle></td>';
                print "<td $col>" . $d['job_name'] . "</td>";
                print "<td $col>";
                if ($d['job_laststart']) {
                    print date($CONFIG['date_format'], strtotime($d['job_laststart']));
                }

                if ($d['job_selected_userid']) {
                    print '<br />' . $_SP[390] . ': <a class=d href="javascript:Fenster(\'index.php?edit=' . $d['job_selected_userid'] . '\',\'' . $d['job_selected_userid'] . '\',\'crs\',700,550)">' . $d['job_selected_userid'] . '</a>';
                }

                if ($d['job_selected_position']) {
                    print '<br />' . $_SP[391] . ': ' . $d['job_selected_position'];
                }

                if ($d['job_selected_gridid']) {
                    while (list(, $gval) = each($GRIDS)) {
                        if ($gval['gridid'] == $d['job_selected_gridid']) {
                            $gridname = ' (' . $gval['name'] . ')';
                        }
                    }

                    reset($GRIDS);
                    print '<br />' . $_SP[391] . ': ' . $d['job_selected_gridid'] . $gridname;
                }

                print "</td>";
                if ($d['job_date']) {
                    $d['job_date'] = $_SP[382] . ' ' . date($CONFIG['date_format'], strtotime($d['job_date']));
                }
                elseif ($d['job_every_day'] && $d['job_every_month']) {
                    $d['job_date'] = $_SP[381] . ' ' . $d['job_every_day'] . '. ' . $_SPmon[$d['job_every_month'] - 1];
                }
                elseif ($d['job_every_weekday'] != '') {
                    $d['job_date'] = $_SP[381] . ' ' . $_SPday[$d['job_every_weekday']];
                }
                elseif ($d['job_type'] == 3) {
                    $d['job_date'] = $_SP[393];
                }

                print "<td $col>" . $d['job_date'] . "</td>";
                print "<td $col><b>" . $_SPJ[$d['job_type']] . '</b>';
                print ($d['job_gridid']) ? '<br />' . $_SP[355] . ': ' . $d['job_gridid'] : '<br />' . $_SP[355] . ': ' . $_SP[356];
                if ($d['job_type'] == 3) {
                    print '<br />' . $d['job_url'];
                }

                print "</td>";
                print "<td $col>";
                print '<table width=100% cellspacing=1><tr><td bgcolor="#C8C8C8">';
                print (!$d['job_active']) ? '<a href="?op=jobs&act=' . $d['job_id'] . '" style="margin-left:5px">' . $newpoint1 . '<font color=green>' . $_SP[384] . '</font></a><br />' : '';
                print ($d['job_active']) ? '<a href="?op=jobs&dact=' . $d['job_id'] . '" style="margin-left:5px"><img src="images/d.gif" align="absmiddle" hspace="3"><font color=#999999>' . $_SP[385] . '</a></font><br />' : '';
                print '</td></tr><tr><td bgcolor="#C8C8C8">';
                print '<a href="index.php?op=jobs&del=' . $d['job_id'] . '" style="margin-left:6px" onClick="return confirm(\'' . $_SP[389] . '\')">' . $newpoint . '<font color=red>' . $_SP[387] . '</a></font><br />';
                print '</td></tr><tr><td bgcolor="#C8C8C8">';
                print '<a href="index.php?op=jobs&job_id=' . $d['job_id'] . '" class=d><img style="margin-left:2px" src="images/ed.gif" vspace=3 align="absmiddle" hspace="3">' . $_SP[386] . '</a>';
                print '</td></tr></table>';
                print '</tr>';
            }
        }
        else {
            print '<tr><td colspan=10>&nbsp;' . $_SP[350] . '</td></tr>';
        } ?>    </table>   <?php
    }
    else { ?>    <font color="#C40000"><h2><?php echo $_SP[351] ?></h2></font>    <table cellspacing=6 bgcolor="#C1C1C1" style="border: 1px solid #999999" width=100%>    <form method="POST" action="" name="job">    <input type="hidden" name="job_id" value="<?php echo $jobs['job_id'] ?>">    <input type="hidden" name="jobedit" value="1">    <tr><td align=right><b><?php echo $_SP[352] ?>:</b></td>  <td><input type="text" name="job_name" style="width:250px" value="<?php echo htmlspecialcharsISO($jobs['job_name']) ?>"> <?php echo help($_SP[353], true, 300, $_SP[352]) ?></td></tr>    <tr><td align=right><b><?php echo $_SP[354] ?>:</b></td>  <td><select size="1" name="job_type" style="width:250px" onChange="submit()">    <option value="" ><?php echo $_SPJ[0] ?></option>    <option value="1" <?php
        if ($jobs['job_type'] == 1) {
            print 'selected';
        } ?>><?php echo $_SPJ[1] ?></option>    <option value="2" <?php
        if ($jobs['job_type'] == 2) {
            print 'selected';
        } ?>><?php echo $_SPJ[2] ?></option>    <option value="3" <?php
        if ($jobs['job_type'] == 3) {
            print 'selected';
        } ?>><?php echo $_SPJ[3] ?></option>   </select>  </td></tr>    <tr><td width=300><td><hr></td></tr>    <?php
        if ($jobs['job_type'] == 1) { ?>    <tr><td width=300><td style="padding-bottom:10px"><?php echo $_SP[370] ?></td></tr>    <?php
        }
        elseif ($jobs['job_type'] == 2) { ?>    <tr><td width=300><td style="padding-bottom:10px"><?php echo $_SP[371] ?></td></tr>    <?php
        }
        elseif ($jobs['job_type'] == 3) { ?>    <tr><td width=300><td style="padding-bottom:10px"><?php echo $_SP[372] ?></td></tr>    <?php
        } ?>     <?php
        if ($jobs['job_type'] == 1 || $jobs['job_type'] == 2 || $jobs['job_type'] == 3) { ?>    <tr><td align=right><b><?php echo $_SP[355] ?>:</b></td>  <td><select name="job_gridid">  <option value="0"><?php echo $_SP[356] ?></option>  <?php
            while (list(, $gval) = each($GRIDS)) {
                if ($gval['name']) {
                    $gridname = ' (' . $gval['name'] . ')';
                }

                $selected = $gval['gridid'] == $jobs['job_gridid'] ? ' selected' : '';
                print '<option value="' . $gval['gridid'] . '"' . $selected . '>' . sprintf($_SP[255], $gval['gridid']) . $gridname . '</option>';
            }

            reset($GRIDS); ?>  </select></td></tr>    <?php
        } ?>    <?php
        if ($jobs['job_type'] == 1 || $jobs['job_type'] == 2) { ?>    <tr><td align=right><b><?php echo $_SP[394] ?>:</b></td>  <td><input type="checkbox" name="job_gridpayed" <?php echo $checked[(int)$jobs['job_gridpayed']] ?> value="1"></td></tr>    <?php
        } ?>    <?php
        if ($jobs['job_type'] == 1) { ?>    <tr><td align=right><b><?php echo $_SP[362] ?>:</b></td>  <td><input type="checkbox" name="job_fieldused" <?php echo $checked[(int)$jobs['job_fieldused']] ?> value="1"></td></tr>    <tr><td align=right><b><?php echo $_SP[363] ?>:</b></td>  <td><input type="text" name="job_fieldhighlight" style="width:50px" value="<?php echo htmlspecialcharsISO($jobs['job_fieldhighlight']) ?>"> <?php echo $_SP[364] ?> <?php echo help($_SP[365], true, 300, $_SP[363]) ?></td></tr>    <tr><td align=right><b><?php echo $_SP[361] ?>:</b></td>  <td><input type="text" name="job_url" style="width:250px" value="<?php echo htmlspecialcharsISO($jobs['job_url']) ?>"> <?php echo help($_SP[369], true, 300, $_SP[361]) ?></td></tr>    <?php
        } ?>    <?php
        if ($jobs['job_type'] == 2) { ?>    <tr><td align=right><b><?php echo $_SP[373] ?>:</b></td>  <td><input type="text" name="job_every_seconds" style="width:50px" value="<?php echo $jobs['job_every_seconds'] ?>"> <?php echo $_SP[374] ?> <?php echo help($_SP[375], true, 300, $_SP[373]) ?></td></tr>    <?php
        } ?>    <?php
        if ($jobs['job_type'] == 3) { ?>    <tr><td align=right><b><?php echo $_SP[368] ?>:</b></td>  <td><input type="text" name="job_url" style="width:250px" value="<?php echo htmlspecialcharsISO($jobs['job_url']) ?>"></td></tr>    <?php
        } ?>    <?php
        if ($jobs['job_type'] == 2 || $jobs['job_type'] == 3) { ?>    <tr><td align=right><b><?php echo $_SP[396] ?>:</b></td>  <td><input type="text" name="job_show" style="width:50px" value="<?php echo htmlspecialcharsISO($jobs['job_show']) ?>"> <?php echo help($_SP[397], true, 300, $_SP[396]) ?></td></tr>    <?php
        } ?>    <?php
        if ($jobs['job_type'] == 1) { ?>    <tr><td align=right><b><?php echo $_SP[357] ?>:</b></td>  <td><input type="checkbox" name="job_selfwindow" <?php echo $checked[(int)$jobs['job_selfwindow']] ?> value="1"></td></tr>    <?php
        } ?>    <?php
        if ($jobs['job_type'] == 1) { ?>    <tr><td align=right nowrap><b><?php echo $_SP[359] ?>:</b></td>  <td><select size="1" name="job_email_user" style="width:250px">    <option value=""><?php echo $_SP[360] ?></option>    <?php
            $dhandle = opendir("../lang/" . $CONFIG['standard_language']);
            $filenames = array();
            while ($files = readdir($dhandle)) {
                if ($files != "." && $files != ".." && strpos($files, '.txt')) {
                    $filenames[] = $files;
                }
            }

            closedir($dhandle);
            sort($filenames);
            reset($filenames);
            while (list(, $filename) = each($filenames)) {
                if ($jobs['job_email_user'] == $filename) {
                    $selected = " selected";
                    $findfile = true;
                }
                else {
                    $selected = '';
                }

                print '<option value="' . $filename . '"' . $selected . '>' . $filename . '</option>';
            }

            clearstatcache(); ?>    </select> <?php echo help($_SP[367], true, 300, $_SP[359]) ?>    <?php
        } ?>    <?php
        if ($jobs['job_type'] == 1) { ?>    <tr><td align=right nowrap><b><?php echo $_SP[358] ?>:</b></td>  <td><input type="checkbox" name="job_email_admin" <?php echo $checked[(int)$jobs['job_email_admin']] ?> value="1"></td></tr>    <?php
        } ?>    <?php
        if ($jobs['job_type'] == 1) { ?>    <tr><td width=300><td><hr></td></tr>    <tr><td align=right><b><?php echo $_SP[376] ?>:</b></td>  <td><select name="job_date_d">   <option value=""></option>   <?php
            foreach (range(1, 31) as $jobtime) {
                $selected = $jobtime == $jobs['job_date_d'] ? ' selected' : '';
                print '<option value="' . $jobtime . '"' . $selected . '>' . $jobtime . '</option>';
            } ?>   </select>   <select name="job_date_m">   <option value=""></option>   <?php
            foreach (range(0, 11) as $jobtime) {
                $selected = $jobtime + 1 == $jobs['job_date_m'] ? ' selected' : '';
                print '<option value="' . ($jobtime + 1) . '"' . $selected . '>' . $_SPmon[$jobtime] . '</option>';
            } ?>   </select>   <select name="job_date_y">   <option value=""></option>   <?php
            foreach (range(date("Y", time() + (3600 * $CONFIG['timezone'])) , date("Y", time() + (3600 * $CONFIG['timezone'])) + 10) as $jobtime) {
                $selected = $jobtime == $jobs['job_date_y'] ? ' selected' : '';
                print '<option value="' . $jobtime . '"' . $selected . '>' . $jobtime . '</option>';
            } ?>   </select>  </td></tr>    <tr><td align=right><b><?php echo $_SP[377] ?>:</b></td>  <td><select name="job_every_day">   <option value=""></option>   <?php
            foreach (range(1, 31) as $jobtime) {
                $selected = $jobtime == $jobs['job_every_day'] ? ' selected' : '';
                print '<option value="' . $jobtime . '"' . $selected . '>' . $jobtime . '</option>';
            } ?>   </select>   <select name="job_every_month">   <option value=""></option>   <?php
            foreach (range(0, 11) as $jobtime) {
                $selected = $jobtime + 1 == $jobs['job_every_month'] ? ' selected' : '';
                print '<option value="' . ($jobtime + 1) . '"' . $selected . '>' . $_SPmon[$jobtime] . '</option>';
            } ?>   </select>    <tr><td align=right><b><?php echo $_SP[377] ?>:</b></td>  <td><select name="job_every_weekday">   <option value=""></option>   <?php
            foreach (range(0, 6) as $jobtime) {
                $selected = ($jobtime == $jobs['job_every_weekday'] && $jobs['job_every_weekday'] != '') ? ' selected' : '';
                print '<option value="' . $jobtime . '"' . $selected . '>' . $_SPday[$jobtime] . '</option>';
            } ?>   </select>    <?php
        } ?>    </table><br />    <?php
        if ($jobs['job_type'] > 0) { ?>    <input type="submit" style="height:25" name="job_submit" value=" <?php echo $_SP[344] ?> ">    <?php
        } ?>    </form>   <?php
    } ?>  <?php
}
elseif ($_GET['op'] == 'nel') { ?>   <h1><font color="#C40000"><?php echo $_SP[502] ?></font></h1><br />   <?php echo $Nachricht; ?>   <?php
    print $_SP[505] . ' ' . (int)DB_query("SELECT COUNT(*) AS a FROM " . $dbprefix . "mailinglist", 'a'); ?>   <table cellspacing=1 align=left style="margin-top:5px;border: 1px solid #999999;" bgcolor="#EEEEEE">   <tr><td style="padding:3px" bgcolor="#2A00FF" height=22><font color="#FFFFFF">&nbsp;<b><?php echo $_SP[27] ?></b></td>    <td style="padding:3px" bgcolor="#2A00FF"><font color="#FFFFFF">&nbsp;<b><?php echo $_SP[25] ?></b></td>    <td style="padding:3px" bgcolor="#2A00FF"><font color="#FFFFFF">&nbsp;<b><?php echo $_SP[24] ?></b></td>    <td style="padding:3px" bgcolor="#2A00FF"><font color="#FFFFFF">&nbsp;<b><?php echo $_SP[29] ?></b></td>   </tr>   <?php
    if ($NL_DATA = DB_array("SELECT * FROM " . $dbprefix . "mailinglist ORDER BY timestamp DESC, email", '*')) {
        while (list(, $d) = each($NL_DATA)) {
            $col = $col ? ' style="padding:3px"' : ' bgcolor="#E0E0E0" style="padding:3px"';
            print '<tr>';
            print "<td $col>" . date($CONFIG['date_format'], strtotime($d['timestamp'])) . "</td>";
            print "<td $col>" . $d['lang'] . "</td>";
            print "<td $col>" . $d['email'] . "</td>";
            print "<td $col>";
            print '<a href="index.php?op=nel&del=' . urlencode($d['email']) . '" style="margin-left:6px" onClick="return confirm(\'' . sprintf($_SP[503], $d['email']) . '\')">' . $newpoint . '<font color=red>' . $_SP[33] . '</a></font><br />';
            print '</td></tr>';
        }
    }
    else {
        print '<tr><td colspan=10 style="padding:10px">&nbsp;' . $_SP[506] . '</td></tr>';
    } ?>   </table> <?php
}
elseif ($_GET['code'] && $_GET['pa']) { ?>   <br /><br />   <h1><font color="#C40000"><?php echo $_SP[266] ?></font></h1><br />   <table width=400><tr><td>   <?php echo $_SP[267] ?><br />   <?php
    $gwidth = ($GRID[$_GET['code']]['grid_type']) ? $gridsizes[$GRID[$_GET['code']]['grid_type']]['x'] : (int)($GRID[$_GET['code']]['x'] * 10);
    $gheight = ($GRID[$_GET['code']]['grid_type']) ? $gridsizes[$GRID[$_GET['code']]['grid_type']]['y'] : (int)($GRID[$_GET['code']]['y'] * 10); ?> <textarea rows="2" cols="90" readonly onFocus="this.select()" style="margin-top:5px;font-size:11px;width:530px;height:50px;color:#000000"> <iframe src="<?php echo $DOMAIN ?>/export.php?gr=<?php echo $_GET['code'] ?>" width="<?php echo $gwidth ?>" height="<?php echo $gheight ?>" scrolling="no" marginheight="0" marginwidth="0" frameborder="0"></iframe> </textarea>   <br /><hr>   <h2><font color="#C40000"><?php echo $_SP[298] ?></font></h2><br />   <?php echo $_SP[268] ?>   <b><a href="<?php echo $CONFIG['scriptpath'] ?>/getp.php?gr=<?php echo $_GET['code'] ?>&pa=<?php echo $_GET['pa'] ?>" target="_blank"><font color="#C40000"><?php echo $CONFIG['scriptpath'] ?>/getp.php?gr=<?php echo $_GET['code'] ?>&pa=<?php echo $_GET['pa'] ?></a></font></b> <textarea rows="2" cols="90" readonly onFocus="this.select()" style="margin-top:5;font-size:11px;width:530px;height:20px;color:#000000"> <?php echo $DOMAIN ?>/getp.php?gr=<?php echo $_GET['code'] ?>&pa=<?php echo $_GET['pa'] ?> </textarea>   </td></tr></table> <?php
}
elseif ($_GET['op'] == 'zones') { ?>   <h1><font color="#C40000"><?php echo $_SP[477] ?></font></h1><br />   <?php echo $_SP[478] ?>   <form method="GET" name="spi" action="">   <input type="hidden" name="op" value="zones">   <input type="hidden" name="ms" value="">   <input type="hidden" name="md" value="">   <input type="hidden" name="zoneid" value="<?php echo $f_hidden_zoneid ?>">   <script type="text/javascript" src="../wz_jsgraphics.js"></script>   <table width=1000><tr><td>    <select name="gr" onChange="location.href='index.php?op=zones&gr='+document.spi.gr.options[document.spi.gr.options.selectedIndex].value+'&zonetype='+document.spi.zonetype.options[document.spi.zonetype.options.selectedIndex].value" style="margin-right:30px">    <?php
    $GRIDLIST = DB_array("SELECT t0.gridid,t0.name,COUNT(zoneid) AS u FROM " . $dbprefix . "grids t0 LEFT JOIN " . $dbprefix . "zones t1 ON(t0.gridid=t1.gridid) $whereGROUP GROUP BY t0.gridid ORDER BY page_id,t0.gridid", '*');
    while (list(, $gval) = each($GRIDLIST)) {
        $gridname = $gval['name'] ? ': ' . $gval['name'] . ' [' . (int)$gval['u'] . ']' : '';
        $selected = $gval['gridid'] == $_GET['gr'] ? ' selected' : '';
        print '<option value="' . $gval['gridid'] . '"' . $selected . '>' . sprintf($_SP[255], $gval['gridid']) . $gridname . '</option>';
    } ?>    </select>    </td><td align=right><?php echo $_SP[479] ?>    </td><td>    <select name="zonetype" onChange="location.href='index.php?op=zones&gr='+document.spi.gr.options[document.spi.gr.options.selectedIndex].value+'&zonetype='+document.spi.zonetype.options[document.spi.zonetype.options.selectedIndex].value" style="margin-right:30px">    <option value=""><?php echo $_SP[483] ?></option>    <option value="0" <?php
    if ($_GET['zonetype'] == '0') {
        print 'selected';
    } ?>><?php echo $_SP[480] ?></option>    <?php
    if (is_array($prices)) {
        while (list(, $v) = each($prices)) {
            $selected = $v['price_id'] == (int)$_GET['zonetype'] ? ' selected' : '';
            print '<option value="' . $v['price_id'] . '"' . $selected . ' style="background-color : ' . $v['price_color'] . ';">' . $_SP[481] . ': ' . $v['price_name'] . '</option>';
        }
    } ?>    </select>    </td><td>    <input type="button" onClick="location.href='index.php?op=prices'" style="margin-left:50; height:28px" value="<?php echo $_SP[476] ?>">    </td></tr>   </table>   <?php echo $Nachricht; ?>   <table width=<?php echo $gwidth ?> height=<?php echo $gheight ?> style="background: url(<?php echo $gridfile ?>?x=<?php echo @filemtime($gridfile) ?>) no-repeat;background-position:top center" style="margin-top:15px">  <tr><td><div style="position:relative;width:<?php echo $gwidth ?>;height:<?php echo $gheight ?>" id=pixfl  <?php
    if ($_GET['zonetype'] != '') {
        print 'onMouseup="stopdraw();" onMousedown="startdraw()"';
    } ?>>    <<?php
    if ($_GET['zonetype'] != '') {
        print 'input type="image"';
    }
    else {
        print 'img';
    } ?> src="../style/b.gif" width=<?php echo $gwidth ?> height=<?php echo $gheight ?> style="position:absolute;z-index:1" id="pixb">    <?php echo $FL ?>    </div></td></tr>    </form>   </table>   <?php
    if ($_GET['zonetype'] != '') {
        include ('zoneselect.php');

    } ?> <?php
}
elseif ($_GET['op'] == 'prices') { ?>   <h1><font color="#C40000"><?php echo $_SP[476] ?></font></h1><br />   <br />   <?php echo $Nachricht; ?>   <?php
    if (!$_GET['new'] && !$_POST['priceedit'] && $_GET['price_id'] == '') { ?>    <input type=button onClick="location.href='index.php?op=prices&new=1'" style="height:25px;" value="<?php echo $_SP[484] ?>">    <table cellspacing=1 width=100% align=left style="margin-top:20px;border: 1px solid #999999;" bgcolor="#EEEEEE">    <tr><td bgcolor="#89C337" height=22><font color="#FFFFFF">&nbsp;<b><?php echo $_SP[485] ?></b></td>  <td bgcolor="#89C337"><font color="#FFFFFF">&nbsp;<b><?php echo $_SP[486] ?></b></td>  <!--<td bgcolor="#89C337"><font color="#FFFFFF">&nbsp;<b><?php echo $_SP[487] ?></b></td>-->  <td bgcolor="#89C337"><font color="#FFFFFF">&nbsp;<b><?php echo $_SP[488] ?></b></td>  <td bgcolor="#89C337"><font color="#FFFFFF">&nbsp;<b><?php echo $_SP[29] ?></b></td>    </tr>    <?php
        if ($PRICE_DATA = DB_array("SELECT * FROM " . $dbprefix . "prices", '*')) {
            while (list(, $d) = each($PRICE_DATA)) {
                $col = $col ? '' : ' bgcolor="#E0E0E0"';
                print '<tr>';
                print "<td $col>" . $d['price_name'] . "</td>";
                print "<td $col>" . number_format($d['price_private'], 2, ',', '.') . "</td>";
                print '<td bgcolor="' . $d['price_color'] . '">' . $d['price_color'] . "</td>";
                print "<td $col>";
                print '<table width=100% cellspacing=1><tr><td bgcolor="#C8C8C8">';
                print '<a href="index.php?op=prices&del=' . $d['price_id'] . '" style="margin-left:6px" onClick="return confirm(\'' . $_SP[489] . '\')">' . $newpoint . '<font color=red>' . $_SP[33] . '</a></font><br />';
                print '</td></tr><tr><td bgcolor="#C8C8C8">';
                print '<a href="index.php?op=prices&priceedit=1&price_id=' . $d['price_id'] . '" class=d><img style="margin-left:2px" src="images/ed.gif" vspace=3 align="absmiddle" hspace="3">' . $_SP[30] . '</a>';
                print '</td></tr></table>';
                print '</tr>';
            }
        }
        else {
            print '<tr><td colspan=10>&nbsp;' . $_SP[490] . '</td></tr>';
        } ?>    </table>   <?php
    }
    else { ?>    <font color="#C40000"><h2><?php echo $_SP[491] ?></h2></font>    <table cellspacing=6 bgcolor="#DAE6D2" style="border: 1px solid #7DA761" width="700">    <form method="POST" action="" name="pricedit">    <input type="hidden" name="price_id" value="<?php echo $prices['price_id'] ?>">    <input type="hidden" name="priceedit" value="1">    <tr><td align=right><b><?php echo $_SP[492] ?>:</b></td>  <td><input type="text" name="price_name" style="width:250px" value="<?php echo htmlspecialcharsISO($prices['price_name']) ?>"></td></tr>    <tr><td align=right><b><?php echo $_SP[486] ?>:</b></td>  <td><input type="text" name="price_private" style="width:80px" value="<?php echo htmlspecialcharsISO(stripslashes($prices['price_private'])) ?>"></td></tr>    <tr><td align=right><b><?php echo $_SP[488] ?>:</b></td>  <td><input type="text" name="price_color" style="background-color:<?php echo $prices['price_color'] ?>" maxlength=7 style="width:80px" value="<?php echo htmlspecialcharsISO($prices['price_color']) ?>"> <a href="javascript:Fenster('colors.php?a='+document.pricedit.price_color.value.replace(/#/,'_')+'&b=opener.pricedit.price_color&c=opener.pricedit.price_color.style.backgroundColor','colors','',310,300)"><img src="images/colorpicker.gif" align=absmiddle> <?php echo help($_SP[493], true, 300, $_SP[488]) ?></td></tr>    </table><br />    <input type="submit" style="height:25px" name="price_submit" value=" <?php echo $_SP[92] ?> ">    </form>   <?php
    } ?>  <?php
}
elseif ($_GET['op'] == 'grid') { ?>   <h1><font color="#C40000"><?php echo $_SP[160] ?></font></h1>   <?php echo $_SP[309] ?>   <br /><br />   <?php echo $Nachricht; ?>   <?php
    if (!$_GET['new'] && !$_GET['grided']) { ?>   <form method="GET" name="gri" action="">   <input type="hidden" name="op" value="grid">   <table><tr><td align=right><?php echo $_SP[496] ?></td>  <td>    <select name="page_id" onChange="location.href='index.php?op=grid&page_id='+document.gri.page_id.options[document.gri.page_id.options.selectedIndex].value" style="margin-right:30px">    <option value=""><?php echo $_SP[44] ?></option>    <?php
        if (!$_GET['page_id'] && (int)$_GET['gr']) {
            $_GET['page_id'] = DB_query("SELECT page_id FROM " . $dbprefix . "grids WHERE gridid='" . (int)$_GET['gr'] . "'", 'page_id');
        }

        $GRIDLIST = $PAGELIST = array();
        $PAGELIST = DB_array("SELECT page_id,page_name,COUNT(*) AS a FROM " . $dbprefix . "grids $whereGROUP GROUP by page_id ORDER BY page_id ", '*');
        while (list(, $gval) = each($PAGELIST)) {
            $gridname = $gval['page_name'] ? $gval['page_name'] : '';
            $selected = $gval['page_id'] == $_GET['page_id'] ? ' selected' : '';
            print '<option value="' . $gval['page_id'] . '"' . $selected . '>' . $gval['page_id'] . ': ' . $gridname . ' [' . (int)$gval['a'] . ']</option>';
        } ?>    </select>    </td><td align=right><?php echo $_SP[497] ?></td>    <td>    <select name="gr" onChange="location.href='index.php?op=grid&gr='+document.gri.gr.options[document.gri.gr.options.selectedIndex].value" style="margin-right:30px">    <option value=""><?php echo $_SP[44] ?></option>    <?php
        $where_page_id = (int)$_GET['page_id'] ? " WHERE page_id='" . (int)$_GET['page_id'] . "'" . $andGROUP : $whereGROUP;
        $GRIDLIST = DB_array("SELECT gridid,name FROM " . $dbprefix . "grids $where_page_id ORDER BY page_id,gridid", '*');
        while (list(, $gval) = each($GRIDLIST)) {
            $gridname = $gval['name'] ? $gval['name'] : '';
            $selected = $gval['gridid'] == $_GET['gr'] ? ' selected' : '';
            print '<option value="' . $gval['gridid'] . '"' . $selected . '>' . $gval['gridid'] . ': ' . $gridname . '</option>';
        } ?>    </select>  </td><td>  <img src="images/arrow.gif" border=0 align=absmiddle>  <input type="button" onClick="location.href='index.php?op=grid&new=1&newpage=1'" style="height:28px" value="<?php echo $_SP[206] ?>">  <img src="images/arrow.gif" border=0 align=absmiddle style="margin-left:20px" >  <input type="button" onClick="location.href='index.php?op=prices'" style="height:28px" value="<?php echo $_SP[476] ?>">    </td></tr>   </table>   <?php
    }
    elseif ($_GET['newpage']) {
        print "<h2><font color=\"#C40000\">" . $_SP[206] . "</font></h2>";
    }
    elseif (!$_GET['grided']) {
        print "<h2><font color=\"#C40000\">" . $_SP[207] . "</font></h2>";
    } ?>   <table cellspacing=1 width=100% align=left style="margin-right:50px;margin-top:5px;border: 1px solid #05079F;" bgcolor="#D3D3D3">   <tr><td bgcolor="#05079F" height=22 align=center nowrap><font color="#FFFFFF">&nbsp;<b></b></td>    <td bgcolor="#05079F" nowrap><font color="#FFFFFF">&nbsp;<b><?php echo $_SP[163] ?></b>&nbsp;</td>    <td bgcolor="#05079F" nowrap><font color="#FFFFFF">&nbsp;<b><?php echo $_SP[233] ?></b>&nbsp;</td>    <td bgcolor="#05079F" nowrap align=center><font color="#FFFFFF"><b><?php echo $_SP[165] ?> / <?php echo $_SP[166] ?></b></td>    <td bgcolor="#05079F" nowrap><font color="#FFFFFF">&nbsp;<b><?php echo $_SP[177] ?></b></td>    <td bgcolor="#05079F" align=center><font color="#FFFFFF"><b><?php echo $_SP[185] ?></b></td>    <td bgcolor="#05079F" align=center><font color="#FFFFFF"><b><?php echo $_SP[176] ?></b></td>    <td bgcolor="#05079F" nowrap><font color="#FFFFFF">&nbsp;<b><?php echo $_SP[29] ?></b></td></tr>   <?php
    if (is_array($grids)) {
        while (list($grid_array_nr, $d) = each($grids)) {
            if ((isset($_GET['grided']) && (int)$_GET['grided'] == $d['gridid']) || !isset($_GET['grided'])) {
                $col = $col ? '' : ' bgcolor="#E0E0E0"';
                if ($oldpage_id <> $d['page_id']) {
                    if (!$_GET['new']) {
                        print '<tr><td colspan="12" style="padding:3px" bgcolor="#F5F5F5"><table><tr><td><h2 style="margin:3px"><font color="red">' . $_SP[164] . ' ' . $d['page_id'] . '</font> - ' . $d['page_name'] . ' - ' . $d['page_slogan'] . '</h2>&nbsp;';
                        print '<a href="index.php?op=grid&new=' . $d['page_id'] . '" class=d><img src="images/arrow.gif" border=0 align=absmiddle style="margin-right:5px">' . $_SP[207] . '</a>';
                        print '</td></tr></table></td></tr>';
                    }
                    elseif ($_GET['newpage']) {
                        print '<tr><td colspan="12" style="padding:3px" bgcolor="#F5F5F5"></td></tr>';
                    }
                    else {
                        print '<tr><td colspan="12" style="padding:3px" bgcolor="#F5F5F5"><table><tr><td><h2 style="margin:3px"><font color="red">' . $_SP[164] . ' ' . $d['page_id'] . '</font> - ' . $d['page_name'] . ' - ' . $d['page_slogan'] . '</h2>&nbsp;';
                        print '</td></tr></table></td></tr>';
                    }

                    $oldpage_id = $d['page_id'];
                }

                if (!$_GET['new']) {
                    $gridpreview = '<a href="javascript:Fenster(\'index.php?gpreview=' . $d['gridid'] . '.' . $iformat[$d['image_format']] . '\',\'gpreview' . $d['gridid'] . '\',\'cr\',' . (($d['x'] * $d['blocksize_x']) + 20) . ',' . (($d['y'] * $d['blocksize_y']) + 20) . ')" class=d>';
                }

                print '<tr' . $col . ' onMouseOver="this.style.backgroundColor=\'#D7DEF3\'" onMouseOut="this.style.backgroundColor=\'\'"><td style="padding-right:5px" align=right>&nbsp;<img src="images/' . ((int)$d['active']) . '.gif" align=absmiddle></td>';
                print '<td align=left style="padding:5px" valign=top><b>' . $gridpreview . ($d['gridid'] ? $d['gridid'] : $_SP[209]) . '</a></b>&nbsp;<img src="images/iformat' . (int)$d['image_format'] . '.gif" align=absmiddle>&nbsp;<b>' . $gridpreview . htmlspecialcharsISO(stripslashes($d['name'])) . '</a></b>';
                print '<br /><a href="index.php?op=grid&grided=' . $d['gridid'] . '">';
                if (!$_GET['new']) {
                    print '<img style="border: solid 1px #999999" src="../grids/grid_' . $d['gridid'] . '_small.png?x=' . time() . '" vspace=10></a>';
                }

                print '</td>';
                print '<td align=center><a href="index.php?gr=' . $d['gridid'] . '&op=list" class=d>' . $d['entries'] . '</a></td>';
                if ($d['grid_type'] > 0) {
                    print '<td align=center>' . $_SP[$gridsizes[$d['grid_type']]['SPid']] . '</td>';
                }
                else {
                    print '<td align=center>' . $d['x'] * $d['blocksize_x'] . ' x ' . $d['y'] * $d['blocksize_y'] . '<br /><br />' . $d['grid_template'] . '</td>';
                }

                $exch = ($d['exchange_rate'] && $d['pay_currency']) ? '<br />' . $_SP[179] . ': ' . strtoupper($d['pay_currency']) . '<br />' . $_SP[180] . ': ' . $d['exchange_rate'] : '';
                print '<td nowrap align=right style="padding-right:5px"><b>' . ($d['blockprice'] > 0 ? number_format($d['blockprice'], 2, ',', '.') . ' ' . strtoupper($d['currency']) : $_SP[194]) . '</b>' . $exch . '</td>';
                print '<td align=center><img src="images/' . ($d['plugin'] ? 'y' : 'o') . '.gif" align=absmiddle></td>';
                print '<td align=center>' . (!$d['minfields'] ? '<img src="images/o.gif" align=absmiddle>' : $d['minfields']) . ' / ';
                print (!$d['maxfields'] ? '<img src="images/o.gif" align=absmiddle>' : $d['maxfields']) . '<br /><img src="../' . (!(int)$d['grid_type'] && stristr($d['grid_template'], '_block_') ? 'incs/grid_templates/' . $d['grid_template'] : $designpath . 'adblock.gif') . '" width=' . $d['blocksize_x'] . ' height=' . $d['blocksize_y'] . ' vspace=3><br />' . $d['blocksize_x'] . ' x ' . $d['blocksize_y'] . '</td>';
                if (!$_GET['new']) {
                    print '<td style="padding:1px" nowrap valign=top>';
                    print '<table width=100% cellpadding=1 cellspacing=1><tr><td bgcolor="#C8C8C8">';
                    print '<a href="index.php?op=' . $_GET['op'] . '&refresh=' . $d['gridid'] . '&gr=' . $d['gridid'] . '" class=d><img src="images/renew.gif" vspace=3 align="absmiddle" hspace=3>' . $_SP[18] . '</a><br />';
                    print '</td></tr><tr><td bgcolor="#C8C8C8">';
                    print '<a href="javascript:Fenster(\'index.php?code=' . $d['gridid'] . '&pa=' . $d['page_id'] . '\',\'code\',\'r\',600,400)" class=d style="margin-left:1px"><img src="images/ed.gif" align="absmiddle" hspace="3">' . $_SP[266] . '</a><br />';
                    print '</td></tr><tr><td bgcolor="#C8C8C8" nowrap>';
                    print '<a href="../getp.php?gr=' . $d['gridid'] . '&pa=' . $d['page_id'] . '" style="margin-left:2" class=d target="' . $d['gridid'] . '"><img src="images/colorpicker.gif" vspace=3 align="absmiddle" hspace=3>' . $_SP[535] . '</a><br />';
                    print '</td></tr><tr><td bgcolor="#C8C8C8" nowrap>';
                    print '<a href="index.php?op=' . $_GET['op'] . '&kill=' . $d['gridid'] . '&sort=' . $_GET['sort'] . '&s=' . $_GET['s'] . '&f=' . $_GET['f'] . '" style="margin-left:6" onClick="return confirm(\'' . sprintf($_SP[190], $d['gridid'], $d['page_id'] . ' (' . htmlspecialcharsISO(addslashes($d['name'])) . ')') . '\')">' . $newpoint . '<font color=red>' . $_SP[33] . '</a></font><br />';
                    print '</td></tr><tr><td bgcolor="#C8C8C8">';
                    print (!$d['active']) ? '<a href="index.php?op=' . $_GET['op'] . '&act=' . $d['gridid'] . '&sort=' . $_GET['sort'] . '&s=' . $_GET['s'] . '&f=' . $_GET['f'] . '" style="margin-left:5" onClick="return confirm(\'' . sprintf($_SP[186], $d['gridid'], $d['page_id'] . ' (' . htmlspecialcharsISO(addslashes($d['name'])) . ')') . '\')">' . $newpoint1 . '<font color=green>' . $_SP[34] . '</font></a><br />' : '';
                    print ($d['active']) ? '<a href="index.php?op=' . $_GET['op'] . '&dact=' . $d['gridid'] . '&sort=' . $_GET['sort'] . '&s=' . $_GET['s'] . '&f=' . $_GET['f'] . '" style="margin-left:5" onClick="return confirm(\'' . sprintf($_SP[187], $d['gridid'], $d['page_id'] . ' (' . htmlspecialcharsISO(addslashes($d['name'])) . ')') . '\')"><img src="images/d.gif" align="absmiddle" hspace="3"><font color=#999999>' . $_SP[87] . '</a></font><br />' : '';
                    print '</td></tr><tr><td bgcolor="#C8C8C8">';
                    print ($d['dontbuy']) ? '<a href="index.php?op=' . $_GET['op'] . '&buy=' . $d['gridid'] . '&sort=' . $_GET['sort'] . '&s=' . $_GET['s'] . '&f=' . $_GET['f'] . '" style="margin-left:5px">' . $newpoint1 . '<font color=green>' . $_SP[469] . '</font></a><br />' : '';
                    print (!$d['dontbuy']) ? '<a href="index.php?op=' . $_GET['op'] . '&dbuy=' . $d['gridid'] . '&sort=' . $_GET['sort'] . '&s=' . $_GET['s'] . '&f=' . $_GET['f'] . '" style="margin-left:5px"><img src="images/d.gif" align="absmiddle" hspace="3"><font color=#999999>' . $_SP[468] . '</a></font><br />' : '';
                    print '</td></tr><tr><td bgcolor="#C8C8C8">';
                    print '<a href="index.php?op=zones&gr=' . $d['gridid'] . '" class=d style="margin-left:1"><img src="images/ed.gif" align="absmiddle" hspace="3">' . $_SP[477] . '</a><br />';
                    print '</td></tr><tr><td bgcolor="#C8C8C8" style="padding:5px">';
                    print '<input type="button" onClick="location.href=\'index.php?op=grid' . ($_GET['grided'] != $d['gridid'] ? '&grided=' . $d['gridid'] : '') . '\'" value="' . ($_GET['grided'] == $d['gridid'] ? $_SP[205] : $_SP[482]) . '">';
                    print '</td></tr></table>';
                    print '</td></tr>';
                }
                else {
                    print '<td></td></tr>';
                }
            }

            if ((int)$_GET['grided'] == $d['gridid'] && !$endgridform) {
                print '<tr><td style="padding:5px" colspan="12"><table width=100%><tr><form method="POST" action="" name="gridedit"><td valign=top>';
                if ((int)$_GET['new']) {
                    print '<input type="hidden" name="new" value="' . (int)$_GET['new'] . '">';
                }
                else {
                    print '<input type="hidden" name="savegridid" value="' . $d['gridid'] . '">';
                }

                if ($d['maxfields'] == '0') {
                    $d['maxfields'] = '';
                }

                if ($d['minfields'] == '0') {
                    $d['minfields'] = '';
                }

                if ($d['x'] == '0') {
                    $d['x'] = '';
                }

                if ($d['y'] == '0') {
                    $d['y'] = '';
                }

                if ($d['blockprice'] == '0') {
                    $d['blockprice'] = '';
                }

                if ($d['expire_days'] == '0') {
                    $d['expire_days'] = '';
                }

                if ($_GET['new'] && $_GET['newpage']) {
                    $d['page_id'] = DB_query("SELECT page_id FROM " . $dbprefix . "grids ORDER BY page_id DESC LIMIT 1", 'page_id') + 1;
                    $d['page_name'] = '';
                    $d['page_slogan'] = '';
                } ?>     <input type="hidden" name="grid_array_nr" value="<?php echo $grid_array_nr ?>">     <input type="hidden" name="old_page_name" value="<?php echo htmlspecialcharsISO(stripslashes($d['page_name'])) ?>">     <input type="hidden" name="old_page_id"   value="<?php echo (int)$d['page_id'] ?>">     <input type="hidden" name="old_page_slogan" value="<?php echo htmlspecialcharsISO(stripslashes($d['page_slogan'])) ?>">     <input type="hidden" name="old_image_format"   value="<?php echo (int)$d['image_format'] ?>">     <table cellspacing=3 class=ad><tr>     <tr><td align=right width=230><?php echo $_SP[164] ?>:</b></td>   <td><input type="text" name="page_id" style="width:80px" value="<?php echo htmlspecialcharsISO(stripslashes($d['page_id'])) ?>"><?php echo help($_SP[316], true, 300, $_SP[164]) ?></td></tr>     <tr><td align=right><?php echo $_SP[236] ?>:</b></td>   <td><input type="text" name="page_name" style="width:200px" maxlength=255 value="<?php echo htmlspecialcharsISO(stripslashes($d['page_name'])) ?>"><?php echo help($_SP[317], true, 300, $_SP[236]) ?></td></tr>     <tr><td align=right nowrap><?php echo $_SP[168] ?>:</b></td>   <td><input type="text" name="page_slogan" style="width:200px" maxlength=255 value="<?php echo htmlspecialcharsISO(stripslashes($d['page_slogan'])) ?>"><?php echo help($_SP[318], true, 300, $_SP[168]) ?></td></tr>     <?php
                if (!$_REQUEST['new']) { ?>     <tr><td align=right><?php echo $_SP[163] ?>:</b></td>   <td><input type="text" name="gridid" style="width:80px" value="<?php echo htmlspecialcharsISO(stripslashes($d['gridid'])) ?>"><?php echo help($_SP[319], true, 300, $_SP[163]) ?></td></tr>     <?php
                } ?>     <tr><td align=right><?php echo $_SP[213] ?>:</b></td>   <td><select size="1" name="active" style="width:80px">    <option value="1" <?php
                if ($d['active']) {
                    print 'selected';
                } ?>><?php echo $_SP[195] ?></option>    <option value="0" <?php
                if (!$d['active']) {
                    print 'selected';
                } ?>><?php echo $_SP[197] ?></option>    </select><?php echo help($_SP[320], true, 300, $_SP[213]) ?></td></tr>     <tr><td align=right><?php echo $_SP[169] ?>:</b></td>   <td><input type="text" name="name" style="width:200px" maxlength=200 value="<?php echo htmlspecialcharsISO(stripslashes($d['name'])) ?>"><?php echo help($_SP[321], true, 300, $_SP[169]) ?></td></tr>     <tr><td align=right><?php echo $_SP[185] ?>:</b></td>   <td><input type="checkbox" name="plugin" <?php echo $checked[(int)$d['plugin']] ?> value="1"><?php echo help($_SP[322], true, 400, $_SP[185]) ?></td></tr>     <tr><td colspan="2"><hr style="height=1;color:#C8C8C8"></td></tr>     <tr><td align=right><?php echo $_SP[177] ?>:</b></td>   <td><input type="text" name="blockprice" style="width:80px" value="<?php echo htmlspecialcharsISO(stripslashes($d['blockprice'])) ?>"><?php echo help($_SP[323], true, 300, $_SP[177]) ?></td></tr>     <tr><td align=right><?php echo $_SP[178] ?>:</b></td>   <td><select size="1" name="currency" style="width:80px">     <?php
                $currs = DB_array("SELECT * FROM " . $dbprefix . "currency", '++');
                while (list($code, $value) = each($currs)) {
                    $selected = $code == $d['currency'] ? " selected" : "";
                    print '<option value="' . $code . '"' . $selected . '>' . $code . '</option>';
                } ?>    </select></td></tr>     <tr><td align=right><?php echo $_SP[181] ?>:</b></td>   <td><input type="text" name="expire_days" style="width:80px" value="<?php echo htmlspecialcharsISO(stripslashes($d['expire_days'])) ?>"><?php echo help($_SP[250], true, 300, $_SP[181]) ?></td></tr>     <tr><td align=right><?php echo $_SP[338] ?>:</b></td>   <td><input type="text" name="minfields" style="width:50px" value="<?php echo htmlspecialcharsISO(stripslashes($d['minfields'])) ?>"><?php echo help($_SP[337], true, 300, $_SP[338]) ?></td></tr>     <tr><td align=right><?php echo $_SP[339] ?>:</b></td>   <td><input type="text" name="maxfields" style="width:50px" value="<?php echo htmlspecialcharsISO(stripslashes($d['maxfields'])) ?>"><?php echo help($_SP[217], true, 300, $_SP[339]) ?></td></tr>     <tr><td align=right><?php echo $_SP[179] ?>:</b></td>   <td><select size="1" name="pay_currency" style="width:80px">     <option value=""></option>     <?php
                $currs = DB_array("SELECT * FROM " . $dbprefix . "currency", '++');
                while (list($code, $value) = each($currs)) {
                    $selected = $code == $d['pay_currency'] ? " selected" : "";
                    print '<option value="' . $code . '"' . $selected . '>' . $code . '</option>';
                } ?>    </select><?php echo help($_SP[324], true, 300, $_SP[179]) ?></td></tr>     <tr><td align=right><?php echo $_SP[180] ?>:</b></td>   <td><input type="text" name="exchange_rate" style="width:80px" value="<?php
                if ((float)$d['exchange_rate'] > 0) print htmlspecialcharsISO(stripslashes($d['exchange_rate'])) ?>"><?php echo help($_SP[253], true, 250, $_SP[180]) ?></td></tr>     <tr><td align=right><?php echo $_SP[415] ?>:</b></td>   <td><input type="text" name="vat" style="width:80px" value="<?php
                if ((float)$d['vat'] > 0) print htmlspecialcharsISO(stripslashes($d['vat'])) ?>">     <select size="1" name="vat_add">     <option value=""  <?php
                if (!$d['vat']) {
                    print 'selected';
                } ?>></option>     <option value="0" <?php
                if ($d['vat_add'] == '0' && $d['vat'] > 0) {
                    print 'selected';
                } ?>><?php echo $_SP[416] ?></option>     <option value="1" <?php
                if ($d['vat_add'] == '1' && $d['vat'] > 0) {
                    print 'selected';
                } ?>><?php echo $_SP[417] ?></option>     </select><?php echo help($_SP[418], true, 250, $_SP[415]) ?>   </td></tr>     <tr><td align=right nowrap><?php echo $_SP[175] ?>:</b></td>   <td><input type="checkbox" name="precontrol" <?php echo $checked[(int)$d['precontrol']] ?> value="1"><?php echo help($_SP[325], true, 300, $_SP[175]) ?></td></tr>     <tr><td align=right nowrap><?php echo $_SP[247] ?>:</b></td>   <td><input type="checkbox" name="adminmail" <?php echo $checked[(int)$d['adminmail']] ?> value="1"><?php echo help($_SP[326], true, 300, $_SP[247]) ?></td></tr>     <tr><td align=right nowrap><?php echo $_SP[408] ?>:</b></td>   <td><input type="checkbox" name="unique_url" <?php echo $checked[(int)$d['unique_url']] ?> value="1"><?php echo help($_SP[409], true, 300, $_SP[408]) ?></td></tr>     <tr><td align=right nowrap><?php echo $_SP[238] ?>:</b></td>   <td><input type="checkbox" name="featured_ads" <?php echo $checked[(int)$d['featured_ads']] ?> value="1"><?php echo help($_SP[414], true, 300, $_SP[238]) ?></td></tr>     <tr><td align=right><?php echo $_SP[170] ?>:</b></td>   <td><input type="checkbox" name="track_clicks" <?php echo $checked[(int)$d['track_clicks']] ?> value="1"></td></tr>     <tr><td align=right><?php echo $_SP[172] ?>:</b></td>   <td><input type="checkbox" name="show_clicks" <?php echo $checked[(int)$d['show_clicks']] ?> value="1"></td></tr>     <tr><td align=right><?php echo $_SP[171] ?>:</b></td>   <td><input type="checkbox" name="unique_clicks" <?php echo $checked[(int)$d['unique_clicks']] ?> value="1"></td></tr>     <tr><td align=right><?php echo $_SP[174] ?>:</b></td>   <td><input type="checkbox" name="new_window" <?php echo $checked[(int)$d['new_window']] ?> value="1"></td></tr>     <tr><td align=right><?php echo $_SP[538] ?>:</b></td>   <td><input type="checkbox" name="real_url" <?php echo $checked[(int)$d['real_url']] ?> value="1"></td></tr>     <tr><td align=right><?php echo $_SP[452] ?>:</b></td>   <td><input type="checkbox" name="buy_on_click" <?php echo $checked[(int)$d['buy_on_click']] ?> value="1"><?php echo help($_SP[453], true, 300, $_SP[452]) ?></td></tr> <tr><td align=right><?php echo $_SP[193] ?>:</b></td><td><input type="checkbox" name="zoom" <?php echo $checked[(int)$d['zoom']] ?> value="1"></td></tr>    </td></tr></table>    </td><td style="padding-left:10px" valign=bottom>     <table cellspacing=3 class=ad>     <tr><td align=right valign="top"><?php echo $_SP[407] ?>:</td><td><img align=absmiddle name="blockimage" src="../<?php echo $designpath ?><?php echo $d['blockimage'] ?>" width=<?php echo $d['blocksize_x'] ?> height=<?php echo $d['blocksize_y'] ?>></td></tr>     <tr><td align=right><?php echo $_SP[405] ?></a>:</b></td>   <td><select size="1" name="blockimage" style="width:210px" onChange="document.blockimage.src = '../<?php echo $designpath ?>' + gridedit.blockimage.options[gridedit.blockimage.options.selectedIndex].value">      <option value=""></option>     <?php
                $dhandle = opendir("../" . $designpath);
                $filenames = array();
                while ($files = readdir($dhandle)) {
                    if (substr($files, 0, 6) == 'block_' && strtolower($files) != ".htaccess" && strtolower($files) != ".htuser" && strtolower($files) != ".htgroup") {
                        $filenames[] = $files;
                    }
                }

                closedir($dhandle);
                sort($filenames);
                reset($filenames);
                while (list(, $filename) = each($filenames)) {
                    $selected = ($d['blockimage'] == $filename) ? " selected" : "";
                    print '<option value="' . $filename . '"' . $selected . '>' . $filename . '</option>';
                }

                clearstatcache(); ?>    </select><?php echo help($_SP[406], true, 300, $_SP[405]) ?></td></tr>     <tr><td align=right nowrap><?php echo $_SP[400] ?>:</b></td>   <td><input type="text" name="blocksize_x" maxlength=3 style="width:50" value="<?php echo htmlspecialcharsISO(stripslashes($d['blocksize_x'])) ?>" <?php
                if ((int)$d['grid_type'] > 0) {
                    print 'style="color:#666666;background:#D3D3D3" readonly';
                } ?> onChange="document.blockimage.width = document.gridedit.blocksize_x.value;document.all.pixel_x.innerText = document.gridedit.blocksize_x.value * document.gridedit.x.value"> <?php echo $_SP[402] ?> <?php echo help($_SP[404], true, 300, $_SP[400]) ?></td></tr>     <tr><td align=right nowrap><?php echo $_SP[401] ?>:</b></td>   <td><input type="text" name="blocksize_y" maxlength=3 style="width:50px" value="<?php echo htmlspecialcharsISO(stripslashes($d['blocksize_y'])) ?>" <?php
                if ((int)$d['grid_type'] > 0) {
                    print 'style="color:#666666;background:#D3D3D3" readonly';
                } ?> onChange="document.blockimage.height = document.gridedit.blocksize_y.value;document.all.pixel_y.innerText = document.gridedit.blocksize_y.value * document.gridedit.y.value"> <?php echo $_SP[402] ?> <?php echo help($_SP[404], true, 300, $_SP[401]) ?></td></tr>     <tr><td align=right><?php echo $_SP[472] ?>:</b></td>   <td><input type="text" name="selection_color" maxlength=7 style="width:65px;background-color:<?php echo $d['selection_color'] ?>" value="<?php echo htmlspecialcharsISO(stripslashes($d['selection_color'])) ?>">   <a href="javascript:Fenster('colors.php?a='+document.gridedit.selection_color.value.replace(/#/,'_')+'&b=opener.gridedit.selection_color&c=opener.gridedit.selection_color.style.backgroundColor','colors','',310,300)"><img src="images/colorpicker.gif" align=absmiddle></a>   <?php echo help($_SP[473], true, 300, $_SP[472]) ?></td></tr>     <tr><td align=right><?php echo $_SP[474] ?>:</b></td>   <td><input type="text" name="unselection_color" maxlength=7 style="width:65px;background-color:<?php echo $d['unselection_color'] ?>" value="<?php echo htmlspecialcharsISO(stripslashes($d['unselection_color'])) ?>">   <a href="javascript:Fenster('colors.php?a='+document.gridedit.unselection_color.value.replace(/#/,'_')+'&b=opener.gridedit.unselection_color&c=opener.gridedit.unselection_color.style.backgroundColor','colors','',310,300)"><img src="images/colorpicker.gif" align=absmiddle></a>   <?php echo help($_SP[475], true, 300, $_SP[474]) ?></td></tr>     <tr><td align=right><?php echo $_SP[215] ?>:</b></td>   <td><select size="1" name="grid_type" style="width:210px" onChange="changeSize(gridedit.grid_type.options[gridedit.grid_type.options.selectedIndex].value)">    <?php
                if (is_array($gridsizes)) {
                    reset($gridsizes);
                    while (list($gid, $gsi) = each($gridsizes)) print '<option value="' . $gid . '" ' . ((int)$d['grid_type'] == $gid ? 'selected' : '') . '>' . $_SP[$gsi['SPid']] . '</option>';
                } ?>    </select><?php echo help($_SP[327], true, 300, $_SP[215]) ?></td></tr>     <tr><td align=right><a href="javascript:tpreview(gridedit.grid_template.options[gridedit.grid_template.options.selectedIndex].value , gridedit.grid_type.options[gridedit.grid_type.options.selectedIndex].value)" style="text-decoration:underline;color:#05079F"><?php echo $_SP[225] ?></a>:</b></td>   <td><select size="1" name="grid_template" style="width:210px" onChange="gridedit.grid_type.options.value=0;">      <option value=""></option>     <?php
                $dhandle = opendir("../incs/grid_templates/");
                $filenames = array();
                while ($files = readdir($dhandle)) {
                    if ($files != "." && $files != ".." && strtolower($files) != ".htaccess" && strtolower($files) != ".htuser" && strtolower($files) != ".htgroup") {
                        $filenames[] = $files;
                    }
                }

                closedir($dhandle);
                sort($filenames);
                reset($filenames);
                while (list(, $filename) = each($filenames)) {
                    $selected = ($d['grid_template'] == $filename) ? " selected" : "";
                    print '<option value="' . $filename . '"' . $selected . '>' . $filename . '</option>';
                }

                clearstatcache(); ?>    </select><?php echo help($_SP[328], true, 300, $_SP[225]) ?></td></tr>     <tr><td align=right nowrap><?php echo $_SP[198] ?>:</b></td>   <td><input type="text" id=xsize name="x" maxlength=3 style="width:80" value="<?php echo htmlspecialcharsISO(stripslashes($d['x'])) ?>" <?php
                if ((int)$d['grid_type'] > 0) {
                    print 'style="color:#666666;background:#D3D3D3" readonly';
                } ?> onChange="document.all.pixel_x.innerText = document.gridedit.blocksize_x.value * document.gridedit.x.value"> <?php echo $_SP[403] ?> (= <span id="pixel_x"><?php
                print ($d['x'] * $d['blocksize_x']) ?></span> <?php echo $_SP[402] ?>) <?php echo help($_SP[329], true, 300, $_SP[198]) ?></td></tr>     <tr><td align=right nowrap><?php echo $_SP[199] ?>:</b></td>   <td><input type="text" id=ysize name="y" maxlength=3 style="width:80px" value="<?php echo htmlspecialcharsISO(stripslashes($d['y'])) ?>" <?php
                if ((int)$d['grid_type'] > 0) {
                    print 'style="color:#666666;background:#D3D3D3" readonly';
                } ?> onChange="document.all.pixel_y.innerText = document.gridedit.blocksize_y.value * document.gridedit.y.value"> <?php echo $_SP[403] ?> (= <span id="pixel_y"><?php
                print ($d['y'] * $d['blocksize_y']) ?></span> <?php echo $_SP[402] ?>) <?php echo help($_SP[330], true, 300, $_SP[199]) ?></td></tr>     <tr><td colspan="2"><hr style="height=1;color:#C8C8C8"></td></tr>     <tr><td align=right><?php echo $_SP[184] ?>:</b></td>   <td><select size="1" name="image_format" style="width:80px">     <option value="1" <?php
                if ($d['image_format'] == 1) {
                    print 'selected';
                } ?>><?php echo $_SP[200] ?></option>     <option value="2" <?php
                if ($d['image_format'] == 2) {
                    print 'selected';
                } ?>><?php echo $_SP[201] ?></option>    <?php
                if (function_exists('gd_info')) {
                    if ($gdinfo = gd_info()) {
                        if ((int)$gdinfo['GIF Create Support'] && (int)$gdinfo['GIF Read Support']) { ?>     <option value="3" <?php
                            if ($d['image_format'] == 3) {
                                print 'selected';
                            } ?>><?php echo $_SP[202] ?></option>    <?php
                        }
                    }
                } ?>    </select><?php echo help($_SP[331], true, 300, $_SP[184]) ?></td></tr>     <tr><td align=right><?php echo $_SP[182] ?>:</b></td>   <td><input type="checkbox" name="image_reduce" <?php echo $checked[(int)$d['image_reduce']] ?> value="1"><?php echo help($_SP[332], true, 300, $_SP[182]) ?></td></tr>     <tr><td align=right><?php echo $_SP[183] ?>:</b></td>   <td><input type="checkbox" name="image_interlace" <?php echo $checked[(int)$d['image_interlace']] ?> value="1"><?php echo help($_SP[333], true, 300, $_SP[183]) ?></td></tr>     <tr><td align=right><?php echo $_SP[466] ?>:</b></td>   <td><input type="checkbox" name="animated" <?php echo $checked[(int)$d['animated']] ?> value="1"><?php echo help($_SP[467], true, 300, $_SP[466]) ?></td></tr>     <tr><td align=right><?php echo $_SP[459] ?>:</b></td>   <td><input type="text" name="transparency" style="width:50px" maxlength="3" value="<?php echo (int)$d['transparency'] ?>">% <?php echo help($_SP[460], true, 300, $_SP[459]) ?></td></tr>     <tr><td align=right><?php echo $_SP[463] ?>:</b></td>   <td><input type="checkbox" name="hoverimage" <?php echo $checked[(int)$d['hoverimage']] ?> value="1"><?php echo help($_SP[464], true, 300, $_SP[463]) ?></td></tr>     <tr><td align=right><?php echo $_SP[461] ?>:</b></td>   <td><input type="text" name="transparency_grey" style="width:50px" maxlength="3" value="<?php echo (int)$d['transparency_grey'] ?>">% <?php echo help($_SP[462], true, 300, $_SP[461]) ?></td></tr>     <tr><td align=right><?php echo $_SP[252] ?>:</b></td>   <td><input type="checkbox" name="image_logos" <?php echo $checked[(int)$d['image_logos']] ?> value="1"><?php echo help($_SP[334], true, 300, $_SP[252]) ?></td></tr>     <tr><td align=right><?php echo $_SP[251] ?>:</b></td>   <td><input type="checkbox" name="image_upload" <?php echo $checked[(int)$d['image_upload']] ?> value="1"><?php echo help($_SP[335], true, 300, $_SP[251]) ?></td></tr>     <tr><td align=right><?php echo $_SP[429] ?>:</b></td>   <td><input type="checkbox" name="image_saveorig" <?php echo $checked[(int)$d['image_saveorig']] ?> value="1"><?php echo help($_SP[430], true, 300, $_SP[429]) ?></td></tr>     <tr><td align=right><?php echo $_SP[422] ?>:</b></td>   <td><input type="text" name="image_upload_kbytes" style="width:60px" value="<?php echo (int)$d['image_upload_kbytes'] ?>"><?php echo help($_SP[423], true, 300, $_SP[422]) ?></td></tr>     <tr><td align=right><?php echo $_SP[431] ?>:</b></td>   <td><input type="text" name="image_resize_x" style="width:60px" value="<?php echo htmlspecialcharsISO(stripslashes($d['image_resize_x'])) ?>"> <?php echo $_SP[402] ?> <?php echo help($_SP[433], true, 300, $_SP[431]) ?></td></tr>     <tr><td align=right><?php echo $_SP[432] ?>:</b></td>   <td><input type="text" name="image_resize_y" style="width:60px" value="<?php echo htmlspecialcharsISO(stripslashes($d['image_resize_y'])) ?>"> <?php echo $_SP[402] ?> <?php echo help($_SP[433], true, 300, $_SP[432]) ?></td></tr>     <tr><td align=right><?php echo $_SP[421] ?>:</b></td>   <td><input type="text" name="title_chars" style="width:50px" value="<?php echo (int)$d['title_chars'] ?>"><?php echo help($_SP[424], true, 300, $_SP[421]) ?></td></tr>     <tr><td align=right><?php echo $_SP[442] ?>:</b></td>   <td><select size="1" name="grid_refresh" style="width:200px">    <option value="" <?php
                if ($d['grid_refresh'] == '') {
                    print 'selected';
                } ?>><?php echo $_SP[443] ?></option>    <option value="0" <?php
                if ($d['grid_refresh'] === '0') {
                    print 'selected';
                } ?>><?php echo $_SP[444] ?></option>    <option value="1" <?php
                if ($d['grid_refresh'] === '1') {
                    print 'selected';
                } ?>><?php echo $_SP[445] ?></option>    <option value="6" <?php
                if ($d['grid_refresh'] === '6') {
                    print 'selected';
                } ?>><?php echo $_SP[446] ?></option>    <option value="12" <?php
                if ($d['grid_refresh'] === '12') {
                    print 'selected';
                } ?>><?php echo $_SP[447] ?></option>    <option value="18" <?php
                if ($d['grid_refresh'] === '18') {
                    print 'selected';
                } ?>><?php echo $_SP[448] ?></option>    </select><?php echo help($_SP[449], true, 300, $_SP[442]) ?></td></tr>     </td></tr></table>    </td></tr>    <tr><td colspan="2">     <hr style="height=1;color:#C8C8C8">     <table cellspacing=3 class=ad>     <tr><td align=right><?php echo $_SP[513] ?>:</b></td>   <td><input type="checkbox" name="editpixel" <?php echo $checked[(int)$d['editpixel']] ?> value="1"><?php echo help($_SP[514], true, 300, $_SP[513]) ?></td></tr>     <tr><td align=right width=230><?php echo $_SP[536] ?>:</b></td>   <td><input type="checkbox" name="popup" <?php echo $checked[(int)$d['popup']] ?> value="1"><?php echo help($_SP[537], true, 500, $_SP[536]) ?>    <?php echo $_SP[165] ?>:    <input type="text" name="popup_width" maxlength=4 style="width:65px" value="<?php echo (int)$d['popup_width'] ?>">    <?php echo $_SP[166] ?>:    <input type="text" name="popup_height" maxlength=4 style="width:65px" value="<?php echo (int)$d['popup_height'] ?>">   </td></tr>     <tr><td align=right width=230><?php echo $_SP[440] ?>:</b></td>   <td><input type="checkbox" name="reserve_pixel" <?php echo $checked[(int)$d['reserve_pixel']] ?> value="1"></td></tr>     <tr><td align=right><?php echo $_SP[457] ?>:</b></td>   <td><input type="text" name="reserve_bgcolor" maxlength=7 style="width:65px;color:<?php echo $d['reserve_charcolor'] ?>;background-color:<?php echo $d['reserve_bgcolor'] ?>" value="<?php echo htmlspecialcharsISO(stripslashes($d['reserve_bgcolor'])) ?>">   <a href="javascript:Fenster('colors.php?a='+document.gridedit.reserve_bgcolor.value.replace(/#/,'_')+'&b=opener.gridedit.reserve_bgcolor&c=opener.gridedit.reserve_bgcolor.style.backgroundColor','colors','',310,300)"><img src="images/colorpicker.gif" align=absmiddle></a>   <?php echo help($_SP[458], true, 300, $_SP[457]) ?></td></tr>     <tr><td align=right><?php echo $_SP[454] ?>:</b></td>   <td nowrap><input type="text" name="reserve_char" style="width:30px" value="<?php echo htmlspecialcharsISO(stripslashes($d['reserve_char'])) ?>">    <?php echo $_SP[455] ?>:</b>     <select size="1" name="reserve_charsize" style="width:40px">     <option value="1"  <?php
                if ($d['reserve_charsize'] == 1) {
                    print 'selected';
                } ?>>1</option>     <option value="2"  <?php
                if ($d['reserve_charsize'] == 2) {
                    print 'selected';
                } ?>>2</option>     <option value="3"  <?php
                if ($d['reserve_charsize'] == 3) {
                    print 'selected';
                } ?>>3</option>     <option value="4"  <?php
                if ($d['reserve_charsize'] == 4) {
                    print 'selected';
                } ?>>4</option>     </select>     <?php echo $_SP[456] ?>:</b>     <input type="text" name="reserve_charcolor" maxlength=7 style="width:65px" value="<?php echo htmlspecialcharsISO(stripslashes($d['reserve_charcolor'])) ?>">     <a href="javascript:Fenster('colors.php?a='+document.gridedit.reserve_charcolor.value.replace(/#/,'_')+'&b=opener.gridedit.reserve_charcolor&c=opener.gridedit.reserve_bgcolor.style.color','colors','',310,300)"><img src="images/colorpicker.gif" align=absmiddle></a>     <?php echo help($_SP[441], true, 300, $_SP[454]) ?>   </td></tr>     <tr><td align=right><?php echo $_SP[173] ?>:</b></td>   <td><input type="checkbox" name="show_box" <?php echo $checked[(int)$d['show_box']] ?> value="1" onClick="if(this.checked) { document.gridedit.tooltip_style.disabled=false; document.gridedit.tooltip_layout.disabled=false; } else { document.gridedit.tooltip_style.disabled=true; document.gridedit.tooltip_layout.disabled=true; }"></td></tr>     <tr><td align=right valign=top><?php echo $_SP[425] ?>:</b><br /><?php echo help($_SP[427], true, 400, $_SP[425]) ?></td>   <td valign=top><textarea name="tooltip_style"  style="width:500px;height:70px;font: fixedsys, courier, lucida Console, arial; font-size: 9px;"><?php echo htmlspecialcharsISO(stripslashes($d['tooltip_style'])) ?></textarea></td></tr>     <tr><td align=right valign=top><?php echo $_SP[426] ?>:</b><br /><?php echo help($_SP[428], true, 500, $_SP[426]) ?></td>   <td valign=top><textarea name="tooltip_layout" style="width:500px;height:70px;font: fixedsys, courier, lucida Console, arial, arial; font-size: 9px;"><?php echo htmlspecialcharsISO(stripslashes($d['tooltip_layout'])) ?></textarea></td></tr>     </td></tr></table>    </tr></table></td></tr>    <tr><td align=right colspan="8" bgcolor="#C8C8C8" height=36><input type="submit" style="height:30px;width=150px" value="  <?php echo $_SP[203] ?>  " name="save">&nbsp;</td>    </form>    <?php
                $endgridform = true;
                break;
            }
        }
    } ?>  </table>  <?php
}
elseif ($_GET['op'] == 'help') { ?>   <h1><font color="#C40000"><?php echo $_SP[116] ?></font></h1><br />   <?php
    if ($_GET['phpinfo']) {
        print phpinfo();
    } ?>   <h2><font color="#C40000"><?php echo base64_decode('TGljZW5jZQ==') ?></font></h2><?php echo base64_decode('DQpUaGlzIHNjcmlwdCBpcyBub3QgZnJlZXdhcmUsIHlvdSBuZWVkIHRvIHB1cmNoYXNlIHlvdXIgb3duIGxpY2VuY2UgZm9yIHVzaW5nIGl0IG9uIGEgZG9tYWluITxicj4NCklmIHlvdSBhcmUgdXNpbmcgYSBsaWNlbmNlIHdoaWNoIGlzIG5vdCB5b3VycywgeW91IGFyZSB1c2luZyBhbiBpbGxlZ2FsIGNvcHkhPGJyPg0KQW55IHZpb2xhdGlvbnMgb2YgY29weXJpZ2h0IG9mIG91ciBzb2Z0d2FyZSBvciBwYXJ0cyBvZiBzb3VyY2UgY29kZXMgb2YgaXQgd2lsbCBiZSBkZWFsdCB3aXRoIHNlcmlvdXNseSw8YnI+DQphbmQgb2ZmZW5kZXJzIHdpbGwgYmUgcHJvc2VjdXRlZCB0byB0aGUgZnVsbGVzdCBleHRlbnQgb2YgdGhlIGxhdy48YnI+DQo8YnI+PGI+VGhpcyBzY3JpcHQgaXMgbGljZW5jZWQgZm9yOjxicj48L2I+PHRhYmxlIGJnY29sb3I9IiNGRkZGRUYiIHN0eWxlPSJtYXJnaW4tdG9wOjEwO2JvcmRlcjoxIHNvbGlkICNDNDAwMDA7Ij48dGQgc3R5bGU9InBhZGRpbmc6OCAyMCI+DQo=') . base64_decode('RGlyayBNYXJyYXM8YnIgLz4NCk1hcm9ra2FuZXJnYXNzZSAzPGJyIC8+DQoxNDxiciAvPg0KMTAzMCBXaWVuPGJyIC8+DQrWc3RlcnJlaWNoPGJyPjVzdGFydW5pdHkuY29t'); ?></td></tr></table><br /><br />   <h2><font color="#C40000"><?php echo $_SP[306] ?></font></h2>   <?php echo $_SP[273] ?>   <br /><br /><br />   <h2><font color="#C40000"><?php echo $_SP[307] ?></font></h2>   <?php
    if (function_exists('gd_info')) {
        $gdinfo = gd_info();
        $support[0] = '<img src="images/o.gif" align="absmiddle" hspace="3">';
        $support[1] = '<img src="images/y.gif" align="absmiddle" hspace="3">';
    }
    else {
        $gdinfo['GD Version'] = '< 2.0';
    } ?>   <table cellspacing=4><tr><td align=right><b>GD Version:</td><td><?php echo $gdinfo['GD Version'] ?></td></tr>    <tr><td align=right><b>PNG Support:</td><td><?php echo $support[(int)$gdinfo['PNG Support']] ?></td></tr>    <tr><td align=right><b>JPG Support:</td><td><?php echo $support[(int)$gdinfo['JPG Support']] ?></td></tr>    <tr><td align=right><b>GIF Read Support:</td><td><?php echo $support[(int)$gdinfo['GIF Read Support']] ?></td></tr>    <tr><td align=right><b>GIF Create Support:</td><td><?php echo $support[(int)$gdinfo['GIF Create Support']] ?></td></tr>   </table>   See here your servers  <a href="index.php?op=help&phpinfo=1" class="d"><?php echo $_SP[305] ?></a>.   <br /><br /><br />   <h2><font color="#C40000"><?php echo $_SP[308] ?></font></h2>   <b>Million Pixel Script &reg;<br /> <?php echo $ver ?></b><br />   &copy; 2005-2006 by <img src="images/texmedia.gif" align="absmiddle"><SUP><small>TM</small></SUP><br />   All rights reserved.<br />   <a href="http://www.texmedia.de/" target="texmedia" class=d>http://www.texmedia.de</a><br />  <?php
}
elseif (!$checkpass) { ?>   <fieldset style="width:840px"><legend style="padding:6px"><h1 style="margin-top:10px"><font color="#C40000"><?php echo $_SP[40] ?></font></h1></legend>  <table width=100%><tr><td valign="top" style="padding:10px">   <table cellspacing=6 cellpadding=3 style="float:left;margin-right:50px;background-color:#CFCFCF;border: 1px solid #C0C0C0">   <tr><td colspan=2><font color="#C40000"><h2 style="margin-bottom:0;margin-top:10px"><?php echo $_SP[41] ?></h2></td><tr>    <tr><td bgcolor="#DCDCDC"><b><?php echo $_SP[44] ?>:</b></td><td bgcolor="#DCDCDC">&nbsp;<b><?php
    print (int)DB_query("SELECT COUNT(*) AS a FROM " . $dbprefix . "user", 'a'); ?>&nbsp;</b></td></tr>    <tr><td bgcolor="#DCDCDC"><?php echo $_SP[45] ?>:</td><td bgcolor="#DCDCDC">&nbsp;<?php
    print (int)DB_query("SELECT COUNT(*) AS a FROM " . $dbprefix . "user WHERE submit IS NOT NULL", 'a'); ?>&nbsp;</td></tr>    <tr><td colspan=2></td></tr>    <tr><td bgcolor="#DCDCDC"><?php echo $_SP[42] ?>:</td><td bgcolor="#DCDCDC">&nbsp;<?php
    print (int)DB_query("SELECT COUNT(*) AS a FROM " . $dbprefix . "user WHERE CURDATE()=DATE_FORMAT(submit,'%Y-%m-%d')", 'a'); ?>&nbsp;</td></tr>    <tr><td bgcolor="#DCDCDC"><?php echo $_SP[43] ?>:</td><td bgcolor="#DCDCDC">&nbsp;<?php
    print (int)DB_query("SELECT COUNT(*) AS a FROM " . $dbprefix . "user WHERE DATE_FORMAT(submit,'%Y-%m-%d')=CURDATE() - INTERVAL 1 DAY", 'a'); ?>&nbsp;</td></tr>   <tr><td colspan=2><font color="#C40000"><h2 style="margin-bottom:0;margin-top:10px"><?php echo $_SP[48] ?></h2></td><tr>    <tr><td bgcolor="#DCDCDC"><?php echo $_SP[49] ?>:</td><td bgcolor="#DCDCDC">&nbsp;<?php
    $hitsp = (int)DB_query("SELECT COUNT(*) AS a FROM " . $dbprefix . "ip t1 LEFT JOIN " . $dbprefix . "user t2 using(userid) WHERE CURDATE()=dailydatum AND t1.userid IS NOT NULL", 'a');
    print $hitsp; ?>&nbsp;</td></tr>    <tr><td bgcolor="#DCDCDC"><?php echo $_SP[51] ?>:</td><td bgcolor="#DCDCDC">&nbsp;<?php
    print (int)DB_query("SELECT COUNT(*) AS a FROM " . $dbprefix . "ip WHERE CURDATE()=dailydatum AND refid IS NOT NULL", 'a'); ?>&nbsp;</td></tr>   <tr><td colspan=2><font color="#C40000"><h2 style="margin-bottom:0;margin-top:10px"><?php echo $_SP[52] ?></h2></td><tr>    <tr><td bgcolor="#DCDCDC"><a href="index.php?op=nel" class=d><?php echo $_SP[502] ?></a>:</td><td bgcolor="#DCDCDC">&nbsp;<?php
    print (int)DB_query("SELECT COUNT(*) AS a FROM " . $dbprefix . "mailinglist", 'a'); ?>&nbsp;</td></tr>    <tr><td bgcolor="#DCDCDC"><?php echo $_SP[54] ?>:</td><td bgcolor="#DCDCDC">&nbsp;<?php
    print (int)DB_query("SELECT recommends AS a FROM " . $dbprefix . "config", 'a'); ?>&nbsp;</td></tr>    <tr><td bgcolor="#DCDCDC"><a href="index.php?op=grid" class=d><?php echo $_SP[46] ?></a>:</td><td bgcolor="#DCDCDC">&nbsp;<?php
    print (int)DB_query("SELECT COUNT(*) AS a FROM " . $dbprefix . "grids $whereGROUP", 'a'); ?>&nbsp;</td></tr>    <tr><td bgcolor="#DCDCDC"><?php echo $_SP[47] ?>:</td><td bgcolor="#DCDCDC">&nbsp;<?php
    print (int)DB_query("SELECT COUNT(DISTINCT page_id) AS a FROM " . $dbprefix . "grids $whereGROUP", 'a'); ?>&nbsp;</td></tr>    <tr><td colspan=2></td></tr>    <tr><td bgcolor="#DCDCDC" colspan=2><a class=d href="index.php?op=<?php echo ($CONFIG['locked'] ? 'unlock">' . $_SP[516] : 'lock">' . $_SP[515]) ?></a>&nbsp;</td></tr>   </table>  </td><td valign="top" style="padding-right:20px" width=100%>   <table cellspacing=0 cellpadding=0 width=100%>   <tr><td colspan=5><font color="#C40000"><h2><?php echo $_SP[46] ?></h2></td><tr>    <?php
    if ($status_grids = DB_array("SELECT t0.name,t0.gridid,t0.page_id,t0.page_name,x*y AS felder,t0.grid_type,SUM(kaesten*(reserved OR submit IS NULL)) AS inaktiv,SUM(kaesten) AS alle FROM " . $dbprefix . "grids t0 LEFT JOIN " . $dbprefix . "user t1 ON(t0.gridid=t1.gridid) GROUP BY t0.gridid ORDER BY page_id,gridid", '*')) {
        if ($status_zones = DB_array("SELECT gridid,felder FROM " . $dbprefix . "zones WHERE zonetype=0 ORDER BY gridid", '*')) {
            while (list(, $v) = each($status_zones)) $blocked[$v['gridid']] = count(explode(',', $v['felder']));
        }

        while (list(, $v) = each($status_grids)) {
            if ($v['grid_type']) {
                $v['felder'] = $gridsizes[$v['grid_type']]['pix'];
            }

            $einp = 100 / $v['felder'];
            $geblockt = floor($einp * $blocked[$v['gridid']]);
            $aktiv = ceil($einp * ($v['alle'] - $v['inaktiv']));
            $inaktiv = ceil($einp * $v['inaktiv']);
            $frei = 100 - $geblockt - $aktiv - $inaktiv;
            if ($old_pageid != $v['page_id']) {
                print '<tr><td></td><td colspan=2><a href="index.php?op=grid&page_id=' . $v['page_id'] . '" style="color:#464646">' . ($v['page_name'] ? $v['page_name'] : $_SP[164] . ' ' . $v['page_id']) . '</a></td></tr>';
            }

            print '<tr><td align=right nowrap style="padding-right:5px"><a href="index.php?op=grid&gr=' . $v['gridid'] . '" class=d>' . ($v['name'] ? $v['name'] : $v['gridid']) . '</a></td>';
            print '<td align="right"><img src="images/st_l.gif"></td><td nowrap style="width:100%">';
            if ($geblockt) {
                print '<a href="index.php?op=zones&gr=' . $v['gridid'] . '&zonetype=0"><img src="images/st_0.gif" alt="' . $_SP[480] . ' (' . $geblockt . '%)" height="12" width="' . $geblockt . '%"></a>';
            }

            if ($aktiv) {
                print '<a href="index.php?gr=' . $v['gridid'] . '&op=list"><img src="images/st_1.gif" alt="' . $_SP[41] . ' (' . $aktiv . '%)" height="12" width="' . $aktiv . '%"></a>';
            }

            if ($inaktiv) {
                print '<a href="index.php?gr=' . $v['gridid'] . '&op=list&sort=2a"><img src="images/st_2.gif" alt="' . $_SP[501] . ' (' . $inaktiv . '%)" height="12" width="' . $inaktiv . '%"></a>';
            }

            if ($frei) {
                print '<img src="images/st_b.gif" height="12" width="' . $frei . '%">';
            }

            print '</td><td><img src="images/st_r.gif"></td>';
            print '<td nowrap style="padding-left:5px">' . floor($einp * ($v['alle'] + $blocked[$v['gridid']])) . '%</td></tr>';
            $old_pageid = $v['page_id'];
        }
    } ?>   </table>  </td></tr></table>   </fieldset>  <?php
} ?> </td></tr></table> <?php echo $NAVIGATOR ?> <br /><br /> <?php
print '<script type="text/javascript">' . "\n";
print '<!--' . "\n";

if ($Focusfeld && $Focusform) {
    print ' document.' . $Focusform . '.elements["' . $Focusfeld . '"].focus();' . "\n\n";
}

print '//-->' . "\n";
print '</script>' . "\n"; ?> <script language="JavaScript" type="text/javascript" src="../wz_tooltip.js"></script> </body> </html>
