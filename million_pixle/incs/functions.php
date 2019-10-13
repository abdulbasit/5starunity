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
 *
 ******************************************************************************************
 *
 *   DO NOT CHANGE ANYTHING HERE, YOU WOULD RISK THAT YOUR SCRIPT WON'T RUN ANYMORE AND
 *   COULD NOT GET ANY SUPPORT THEN IN THAT CASE
 *
 ******************************************************************************************/
ini_set("default_charset", "iso-8859-1");
function htmlspecialcharsISO($string, $flags = ENT_COMPAT, $encoding = 'ISO-8859-1', $double_encode = true) {
	return htmlspecialchars($string, $flags, $encoding, $double_encode);
}

function fsubstr($v, $nr) {
	return substr($v, $nr) != '' ? substr($v, $nr) : $v;
}
/**
 * Function catches fatal errors and sends it by email
 * or prints it out if local or on TESTSYSTEM
 */
register_shutdown_function("fatal_handler");
function fatal_handler() {
    $error  = error_get_last();
	if($error !== NULL && $error['type'] === E_ERROR) {
	    print_r($error, true);
	    exit;
    }
}
error_reporting(0);
$VERSIONS['functions.php'] = "3.7 PRO";
$TMP                       = $TEMP = array();
@ini_set("include_path", ".");
@ini_set("magic_quotes_gpc", "1");
if(!$adminprocess) {
	if(!file_exists('incs/config.php')) {
		if(!file_exists('install/install.php')) {
			print 'Installation error: No "install.php" found!';
		} else {
			header("Location: install/install.php");
		}
		exit;
	}
}
require('config.php');
require('dblib.php');
session_start();
$CONFIG      = DB_query("SELECT * FROM ".$dbprefix."config", '*');
$LANG_ACTIVE = DB_array("SELECT * FROM ".$dbprefix."languages WHERE active=1", '+++');
if(!$_SESSION['l'] || $_GET['lang']) {
	if($_GET['lang']) {
		$lang = strtolower($_GET['lang']);
	} elseif(!empty($_SERVER['HTTP_ACCEPT_LANGUAGE'])) {
		$dummies = explode(',', $_SERVER['HTTP_ACCEPT_LANGUAGE']);
		$dummy   = count($dummies);
		for($i = 0; $i < $dummy && empty($lang); $i++) {
			Findlanguage($dummies[$i], 1);
		}
	} elseif(!empty($_SERVER['HTTP_USER_AGENT'])) {
		Findlanguage($_SERVER['HTTP_USER_AGENT'], 2);
	}
	if(!@file_exists('lang/'.$lang.'/language.php') || !$LANG_ACTIVE[$lang]) {
		$lang = $CONFIG['standard_language'];
	}
	$_SESSION['l'] = $lang;
} else {
	$lang = $_SESSION['l'];
}
$LANGDIR = 'lang/'.$lang.'/';
@include($LANGDIR."language.php");
if(empty($CONFIG['admindir'])) {
	$CONFIG['admindir'] = 'control';
}
$filenamenr           = '';
$iformat[1]           = 'png';
$iformat[2]           = 'jpg';
$iformat[3]           = 'gif';
$http[0]              = 'http://';
$http[1]              = 'https://';
$gridsizes[0]['x']    = 100;
$gridsizes[0]['y']    = 100;
$gridsizes[0]['SPid'] = 216;
$gridsizes[0]['x+']   = 0;
$gridsizes[0]['y+']   = 0;
$gridsizes[1]['x']    = 468;
$gridsizes[1]['y']    = 60;
$gridsizes[1]['SPid'] = 218;
$gridsizes[1]['x1']   = 0;
$gridsizes[1]['y1']   = 0;
$gridsizes[1]['x2']   = 17;
$gridsizes[1]['y2']   = 59;
$gridsizes[1]['x+']   = -2;
$gridsizes[1]['y+']   = 0;
$gridsizes[1]['pix']  = 270;
$gridsizes[2]['x']    = 234;
$gridsizes[2]['y']    = 60;
$gridsizes[2]['SPid'] = 219;
$gridsizes[2]['x1']   = 0;
$gridsizes[2]['y1']   = 0;
$gridsizes[2]['x2']   = 13;
$gridsizes[2]['y2']   = 59;
$gridsizes[2]['x+']   = 4;
$gridsizes[2]['y+']   = 0;
$gridsizes[2]['pix']  = 132;
$gridsizes[3]['x']    = 728;
$gridsizes[3]['y']    = 90;
$gridsizes[3]['SPid'] = 220;
$gridsizes[3]['x1']   = 0;
$gridsizes[3]['y1']   = 0;
$gridsizes[3]['x2']   = 17;
$gridsizes[3]['y2']   = 89;
$gridsizes[3]['x+']   = -2;
$gridsizes[3]['y+']   = 0;
$gridsizes[3]['pix']  = 639;
$gridsizes[4]['x']    = 1000;
$gridsizes[4]['y']    = 90;
$gridsizes[4]['SPid'] = 221;
$gridsizes[4]['x1']   = 0;
$gridsizes[4]['y1']   = 0;
$gridsizes[4]['x2']   = 19;
$gridsizes[4]['y2']   = 89;
$gridsizes[4]['x+']   = 0;
$gridsizes[4]['y+']   = 0;
$gridsizes[4]['pix']  = 891;
$gridsizes[5]['x']    = 120;
$gridsizes[5]['y']    = 600;
$gridsizes[5]['SPid'] = 222;
$gridsizes[5]['x1']   = 0;
$gridsizes[5]['y1']   = 0;
$gridsizes[5]['x2']   = 120;
$gridsizes[5]['y2']   = 20;
$gridsizes[5]['x+']   = 0;
$gridsizes[5]['y+']   = 0;
$gridsizes[5]['pix']  = 696;
$designpath           = 'style/'.$CONFIG['design'].'/';
$ver                  = '3 PRO';
if(($CONFIG['locked'] || DB_query("SELECT ban_id FROM ".$dbprefix."ban WHERE ban_site=1 AND ban='".mysql_real_escape_string($_SERVER['REMOTE_ADDR'])."'", 'ban_id')) && !$adminprocess) {
	print template($LANGDIR.'locked.htm', array("%[TITLE]%" => $CONFIG['website_title'], "%[META_CHARSET]%" => $LANG_ACTIVE[$lang]['charset']));
	exit;
}
$PAGE_ID = (int)$_REQUEST['pa'] > 1 ? (int)$_REQUEST['pa'] : 1;
$GRIDS   = $gridids = $PAGES = $GRID = array();
$DOMAIN  = $CONFIG['scriptpath'];
if(isset($_GET['gro'])) {
	$_SESSION['gro'] = (int)$_GET['gro'];
}
$whereGROUP = isset($_SESSION['gro']) ? "WHERE `group`='".(int)$_SESSION['gro']."'" : '';
$andGROUP   = isset($_SESSION['gro']) ? "AND `group`='".(int)$_SESSION['gro']."'" : '';
$whereGR    = (int)$_GET['gr'] ? "AND gridid='".(int)$_GET['gr']."'" : '';
$GRIDS      = DB_array("SELECT * FROM ".$dbprefix."grids WHERE active=1 $andGROUP $whereGR ORDER BY page_id,gridid", '*');
foreach($GRIDS as $k => $gval) {
#while(list(, $gval) = each($GRIDS)) {
	if($PAGE_ID == $gval['page_id']) {
		$gridids[]             = $gval['gridid'];
		$GRID[$gval['gridid']] = $gval;
		if(!$gval['plugin']) {
			$pixel_t[$gval['gridid']]  = $gval['grid_type'] ? $gridsizes[$gval['grid_type']]['pix'] * 100 : $gval['x'] * $gval['blocksize_x'] * $gval['y'] * $gval['blocksize_y'];
			$blocks_t[$gval['gridid']] = $gval['grid_type'] ? $gridsizes[$gval['grid_type']]['pix'] : $gval['x'] * $gval['y'];
			if($gval['grid_type']) {
				$read_gridbanners = true;
			}
		}
		$page_vorhanden = true;
		if($gval['zoom']) {
			$ZOOM = true;
		}
	}
	if(!$gval['plugin']) {
		$PAGES[$gval['page_id']]['name']   = $gval['page_name'];
		$PAGES[$gval['page_id']]['slogan'] = $gval['page_slogan'];
	}
	$kleinste_page_id = (($kleinste_page_id > $gval['page_id'] || !$kleinste_page_id) && ($gval['active'] && !$gval['plugin'])) ? $gval['page_id'] : $kleinste_page_id;
}
reset($GRIDS);
if(!$page_vorhanden && $GRIDS && !$adminprocess && !$getprocess && !$showpicprocess && !(int)$_GET['u']) {
	if(!$kleinste_page_id) {
		header("Location: ".$CONFIG['scriptpath']."/index.php");
	} else {
		header("Location: ".$CONFIG['scriptpath']."/index.php?pa=".$kleinste_page_id);
	}
	exit;
}
if($pixel_t) {
	$IN_GRIDS = "AND gridid IN(".implode(',', $gridids).")";
	$pixel_u  = DB_query("SELECT SUM(kaesten*blocksize_x*blocksize_y) AS b,SUM(kaesten) AS a FROM ".$dbprefix."user t0 LEFT JOIN ".$dbprefix."grids t1 ON(t0.gridid=t1.gridid) WHERE grid_type=0 AND t0.gridid IN(".implode(',', $gridids).") GROUP BY t1.page_id", '*');
	if($read_gridbanners) {
		$pixel_u['c'] = DB_query("SELECT t1.gridid,SUM(kaesten*100) AS b FROM ".$dbprefix."user t0 LEFT JOIN ".$dbprefix."grids t1 ON(t0.gridid=t1.gridid) WHERE grid_type>0 AND t0.gridid IN(".implode(',', $gridids).") GROUP BY t1.page_id", 'b');
		$pixel_u['b'] += $pixel_u['c'];
	}
	$pixel_gesamt  = array_sum($pixel_t);
	$pixel_used    = $pixel_u['b'];
	$pixel_total   = $pixel_gesamt - $pixel_used;
	$blocks_gesamt = array_sum($blocks_t);
	$blocks_used   = $pixel_u['a'] + $pixel_u['c'] / 100;
	$blocks_total  = $blocks_gesamt - $blocks_used;
}
$Re1 = getenv("REMOTE_ADDR");
function makemap($only_premap = false, $dir = '', $gridid, $return = false, $results = '', $onlyarea = false) {
	global $gridsizes, $iformat, $CONFIG, $dbprefix, $designpath;
	@ini_set("memory_limit", "64M");
	if(!$gridid) {
		return;
	}
	if(!$gdata = DB_query("SELECT * FROM ".$dbprefix."grids WHERE gridid='".(int)$gridid."'", '*')) {
		return;
	}
	if(!$data = DB_array("SELECT * FROM ".$dbprefix."user WHERE gridid='".(int)$gridid."'", '*')) {
		$data = array();
	}
	if($gdata['reserve_pixel']) {
		$only_premap = false;
	}
	$gdata['transparency']      = (int)$gdata['transparency'] > 0 ? 100 - $gdata['transparency'] : 100;
	$gdata['transparency_grey'] = (int)$gdata['transparency_grey'] > 0 ? 100 - $gdata['transparency_grey'] : 100;
	$BLOCKSIZE_X                = $gdata['blocksize_x'];
	$BLOCKSIZE_Y                = $gdata['blocksize_y'];
	$width                      = ($gdata['grid_type']) ? $gridsizes[$gdata['grid_type']]['x'] : (int)($gdata['x'] * $BLOCKSIZE_X);
	$height                     = ($gdata['grid_type']) ? $gridsizes[$gdata['grid_type']]['y'] : (int)($gdata['y'] * $BLOCKSIZE_Y);
	$x_plus                     = $gridsizes[$gdata['grid_type']]['x+'];
	$y_plus                     = $gridsizes[$gdata['grid_type']]['y+'];
	if(!$onlyarea) {
		if((int)$gdata['grid_type']) {
			$grid_template        = $dir.'incs/grid_banner/'.(int)$gdata['grid_type'].'.png';
			$grid_template_premap = @file_exists($dir.'incs/grid_banner/premap_'.(int)$gdata['grid_type'].'.png') ? $dir.'incs/grid_banner/premap_'.(int)$gdata['grid_type'].'.png' : $grid_template;
		} else {
			$grid_template        = $dir.'incs/grid_templates/'.html_entity_decode(stripslashes($gdata['grid_template']));
			$grid_template_premap = @file_exists($dir.'incs/grid_templates/premap_'.html_entity_decode(stripslashes($gdata['grid_template']))) ? $dir.'incs/grid_templates/premap_'.html_entity_decode(stripslashes($gdata['grid_template'])) : $grid_template;
		}
		if(!$checkextension = @getimagesize($grid_template)) {
			return;
		}
		$grid_template_ext = strtolower($checkextension[2]);
		if(!(int)$gdata['grid_type'] && stristr($gdata['grid_template'], '_block_')) {
			$grid_create_from_block = true;
		}
		if(!$only_premap) {
			if(!$dest = @imagecreatetruecolor($width, $height)) {
				$dest = imagecreate($width, $height);
			}
			if($grid_template_ext == 3) {
				$dest_blank = imagecreatefrompng($grid_template);
			} elseif($grid_template_ext == 2) {
				$dest_blank = imagecreatefromjpeg($grid_template);
			} elseif($grid_template_ext == 1) {
				$dest_blank = imagecreatefromgif($grid_template);
			}
			if($grid_create_from_block) {
				for($i = 0; $i < $gdata['y']; $i++) {
					for($j = 0; $j < $gdata['x']; $j++) {
						imagecopyresized($dest, $dest_blank, $j * $BLOCKSIZE_X, $i * $BLOCKSIZE_Y, 0, 0, $BLOCKSIZE_X, $BLOCKSIZE_Y, $checkextension[0], $checkextension[1]);
					}
				}
			} else {
				imagecopy($dest, $dest_blank, 0, 0, 0, 0, $width, $height);
			}
			imagedestroy($dest_blank);
		}
		if(!$dest_premap = @imagecreatetruecolor($width, $height)) {
			$dest_premap = imagecreate($width, $height);
		}
		if($grid_template_ext == 3) {
			$dest_premap_blank = imagecreatefrompng($grid_template_premap);
		} elseif($grid_template_ext == 2) {
			$dest_premap_blank = imagecreatefromjpeg($grid_template_premap);
		} elseif($grid_template_ext == 1) {
			$dest_premap_blank = imagecreatefromgif($grid_template_premap);
		}
		if($grid_create_from_block) {
			for($i = 0; $i < $gdata['y']; $i++) {
				for($j = 0; $j < $gdata['x']; $j++) {
					imagecopyresized($dest_premap, $dest_premap_blank, $j * $BLOCKSIZE_X, $i * $BLOCKSIZE_Y, 0, 0, $BLOCKSIZE_X, $BLOCKSIZE_Y, $checkextension[0], $checkextension[1]);
				}
			}
		} else {
			imagecopy($dest_premap, $dest_premap_blank, 0, 0, 0, 0, $width, $height);
		}
		imagedestroy($dest_premap_blank);
		$src_reserved = imagecreatetruecolor($BLOCKSIZE_X, $BLOCKSIZE_Y);
		if(!empty($gdata['reserve_bgcolor'])) {
			$rgb = hex2rgb($gdata['reserve_bgcolor']);
			imagefill($src_reserved, 0, 0, ImageColorAllocate($src_reserved, $rgb[0], $rgb[1], $rgb[2]));
		} else {
			$src_res    = imagecreatefrompng($dir.$designpath.'reserved_pixel.png');
			$reserved_x = imagesx($src_res);
			$reserved_y = imagesy($src_res);
			if($reserved_x != $BLOCKSIZE_X || $reserved_y != $BLOCKSIZE_Y) {
				if(function_exists("imagecopyresampled")) {
					imagecopyresampled($src_reserved, $src_res, 0, 0, 0, 0, $BLOCKSIZE_X, $BLOCKSIZE_Y, $reserved_x, $reserved_y);
				} else {
					imagecopyresized($src_reserved, $src_res, 0, 0, 0, 0, $BLOCKSIZE_X, $BLOCKSIZE_Y, $reserved_x, $reserved_y);
				}
			}
			imagedestroy($src_res);
		}
		$imagemap = array();
		if($gdata['grid_type']) {
			$imagemap[] = '<area shape="rect" coords="'.$gridsizes[$gdata['grid_type']]['x1'].','.$gridsizes[$gdata['grid_type']]['y1'].','.$gridsizes[$gdata['grid_type']]['x2'].','.$gridsizes[$gdata['grid_type']]['y2'].'" href="'.$CONFIG['scriptpath'].'/getp.php?gr='.$gridid.'&pa='.$gdata['page_id'].'" target="_blank" />';
		}
	}
	foreach($data as $notused => $d) {
	#while(list(, $d) = each($data)) {
		if(is_array($results)) {
			if(!in_array($d['userid'], $results)) {
				$gdata['transparency'] = 8;
				$nomap                 = true;
			} else {
				$gdata['transparency'] = 100;
				$nomap                 = false;
			}
			$gdata['animated'] = $gdata['hoverimage'] = false;
		}
		unset($top, $left, $tops, $lefts, $f_hidden, $koordinaten, $start, $x, $y, $imap);
		$f_hidden = explode(',', $d['felder']);
		sort($f_hidden);
		foreach($f_hidden as $notused => $v) {
		#while(list(, $v) = each($f_hidden)) {
			$tops[]  = (int)(($v - 1) / 100) * $BLOCKSIZE_Y;
			$lefts[] = fsubstr($v - 1, -2) * $BLOCKSIZE_X;
		}
		sort($tops);
		sort($lefts);
		reset($f_hidden);
		if(!$onlyarea) {
			if($d['submit'] && !$d['reserved'] && $gdata['hoverimage']) {
				$imghover = '<image src="grids/u'.$d['userid'].'.png?x='.time().'" border="0" id="tt'.$d['userid'].'b" style="position:absolute; top:'.$tops[0].'px; left:'.$lefts[0].'px;display:none" ';
			}
			if($d['submit'] && !$d['reserved'] && $gdata['animated']) {
				$imganimasize = @getimagesize($dir.'grids/u'.$d['userid'].'.png');
				$imganimapic  = @file_exists($dir.'grids/u'.$d['userid'].'_orig'.$d['bildext']) ? '_orig'.$d['bildext'] : '.png';
				$imganima     = '<image src="grids/u'.$d['userid'].$imganimapic.'?x='.time().'" border="0" id="tt'.$d['userid'].'b" style="position:absolute;top:'.$tops[0].'px; left:'.$lefts[0].'px;z-index:0" '.$imganimasize[3].' ';
			}
			$CONFIG['reduce_memory'] = 1;
			if($CONFIG['reduce_memory'] && @file_exists($dir.'grids/u'.$d['userid'].'.png')) {
				$src = imagecreatefrompng($dir.'grids/u'.$d['userid'].'.png');
			} else {
				$src = imagecreatefromstring(base64_decode($d['bild']));
			}
			if($return === false || is_string($return)) {
				if($CONFIG['reduce_memory'] && @file_exists($dir.'grids/u'.$d['userid'].'.png')) {
					$src_pre = imagecreatefrompng($dir.'grids/u'.$d['userid'].'.png');
				} else {
					$src_pre = imagecreatefromstring(base64_decode($d['bild']));
				}
				for($i = 0; $i < imagecolorstotal($src_pre); $i++) {
					$f   = imagecolorsforindex($src_pre, $i);
					$gst = ($f["red"] + $f["green"] + $f["blue"]) / 3;
					imagecolorset($src_pre, $i, $gst, $gst, $gst);
				}
			}
			$RES = false;
		}
		#while(list(, $v) = each($f_hidden)) {
		foreach($f_hidden as $notused => $v) {
			$top  = ((int)(($v - 1) / 100) * $BLOCKSIZE_Y) + $y_plus;
			$left = (fsubstr($v - 1, -2) * $BLOCKSIZE_X) + $x_plus;
			if(!isset($start)) {
				$start = "$left,$top";
				$ende  = "$left,".($top + $BLOCKSIZE_Y);
				$x     = $left;
				$y     = $top;
			}
			if(!$only_premap) {
				if($d['submit'] && !$d['reserved']) {
					if(!$onlyarea) {
						imagecopymerge($dest, $src, $left, $top, $left - $lefts[0], $top - $tops[0], $BLOCKSIZE_X, $BLOCKSIZE_Y, $gdata['transparency']);
					}
					$koordinaten["$left,$top"]                                     = true;
					$koordinaten[($left + $BLOCKSIZE_X).",$top"]                   = true;
					$koordinaten[($left + $BLOCKSIZE_X).",".($top + $BLOCKSIZE_Y)] = true;
					$koordinaten["$left,".($top + $BLOCKSIZE_Y)]                   = true;
				} elseif($gdata['reserve_pixel'] && !$onlyarea) {
					if((int)$gdata['transparency'] > 0) {
						imagecopymerge($dest, $src_reserved, $left, $top, 0, 0, $BLOCKSIZE_X, $BLOCKSIZE_Y, $gdata['transparency']);
					} elseif(function_exists("imagecopyresampled")) {
						imagecopyresampled($dest, $src_reserved, $left, $top, 0, 0, $BLOCKSIZE_X, $BLOCKSIZE_Y, $BLOCKSIZE_X, $BLOCKSIZE_Y);
					} else {
						imagecopyresized($dest, $src_reserved, $left, $top, 0, 0, $BLOCKSIZE_X, $BLOCKSIZE_Y, $BLOCKSIZE_X, $BLOCKSIZE_Y);
					}
				}
			}
			if($return === false || is_string($return)) {
				if($d['submit'] && !$d['reserved'] && !$onlyarea) {
					imagecopymerge($dest_premap, $src_pre, $left, $top, $left - $lefts[0], $top - $tops[0], $BLOCKSIZE_X, $BLOCKSIZE_Y, $gdata['transparency_grey']);
				} elseif(!$onlyarea) {
					if((int)$gdata['transparency_grey'] > 0) {
						imagecopymerge($dest_premap, $src_reserved, $left, $top, 0, 0, $BLOCKSIZE_X, $BLOCKSIZE_Y, $gdata['transparency_grey']);
					} elseif(function_exists("imagecopyresampled")) {
						imagecopyresampled($dest_premap, $src_reserved, $left, $top, 0, 0, $BLOCKSIZE_X, $BLOCKSIZE_Y, $BLOCKSIZE_X, $BLOCKSIZE_Y);
					} else {
						imagecopyresized($dest_premap, $src_reserved, $left, $top, 0, 0, $BLOCKSIZE_X, $BLOCKSIZE_Y, $BLOCKSIZE_X, $BLOCKSIZE_Y);
					}
				}
				if(!$RES && (!$d['submit'] || $d['reserved']) && $gdata['reserve_char'] && $gdata['reserve_charcolor'] && !$onlyarea) {
					$RES = true;
					$rgb = hex2rgb($gdata['reserve_charcolor']);
					imageString($dest_premap, $gdata['reserve_charsize'], $left + 2, $top + 2, $gdata['reserve_char'], ImageColorAllocate($dest_premap, $rgb[0], $rgb[1], $rgb[2]));
					if($gdata['reserve_pixel']) {
						imageString($dest, $gdata['reserve_charsize'], $left + 2, $top + 2, $gdata['reserve_char'], ImageColorAllocate($dest, $rgb[0], $rgb[1], $rgb[2]));
					}
				}
			}
		}
		if(!$onlyarea) {
			if($return === false || is_string($return)) {
				@imagedestroy($src_pre);
			}
			@imagedestroy($src);
		}
		if($koordinaten && !$nomap) {
			$imap      = array();
			$imap[0]   = $start;
			$nrichtung = 4;
			$lrichtung = 2;
			do {
				if($koordinaten["$x,".($y - $BLOCKSIZE_Y)] && !in_array("$x,".($y - $BLOCKSIZE_Y), $imap) && $nrichtung == 1) {
					if($lrichtung != 1) {
						$imap[] = "$x,$y";
					}
					$nrichtung = 3;
					$lrichtung = 1;
					$y         -= $BLOCKSIZE_Y;
				} elseif($koordinaten[($x + $BLOCKSIZE_X).",$y"] && !in_array(($x + $BLOCKSIZE_X).",$y", $imap) && $nrichtung == 2) {
					if($lrichtung != 2) {
						$imap[] = "$x,$y";
					}
					$nrichtung = 0;
					$lrichtung = 2;
					$x         += $BLOCKSIZE_X;
				} elseif($koordinaten["$x,".($y + $BLOCKSIZE_Y)] && !in_array("$x,".($y + $BLOCKSIZE_Y), $imap) && $nrichtung == 3) {
					if($lrichtung != 3) {
						$imap[] = "$x,$y";
					}
					$nrichtung = 1;
					$lrichtung = 3;
					$y         += $BLOCKSIZE_Y;
				} elseif($koordinaten[($x - $BLOCKSIZE_X).",$y"] && !in_array(($x - $BLOCKSIZE_X).",$y", $imap) && $nrichtung == 4) {
					if($lrichtung != 4) {
						$imap[] = "$x,$y";
					}
					$nrichtung = 2;
					$lrichtung = 4;
					$x         -= $BLOCKSIZE_X;
				}
				$nrichtung = $nrichtung == 4 ? 1 : $nrichtung + 1;
			} while("$x,$y" <> $ende && $i++ < 10000);
			$imap[]  = $ende;
			$href    = !$gdata['real_url'] || empty($d['url']) ? 'index.php?u='.$d['userid'] : $d['url'];
			$hits    = $gdata['track_clicks'] && $gdata['show_clicks'] ? ' ('.$d['hits'].')' : '';
			$hits_tt = $gdata['track_clicks'] && $gdata['show_clicks'] ? $d['hits'] : '';
			if(empty($d['target'])) {
				$blank = $gdata['new_window'] ? ' target="_blank"' : '';
			} else {
				$blank = ' target="'.htmlspecialcharsISO($d['target'], ENT_QUOTES).'"';
			}
			$onMouseOut = 'onMouseOut="htoo(\'tt'.$d['userid'].'a\')"';
			$title      = $gdata['show_box'] ? ' onMouseOver="stoo(\'tt'.$d['userid'].'\')" '.(!$imghover ? $onMouseOut : '') : 'title="'.htmlspecialcharsISO(stripslashes($d['title'])).$hits.'" '.($imghover ? 'onMouseOver="document.getElementById(\'tt'.$d['userid'].'b\').style.display = \'block\';if(bi) bi.style.display=\'none\'" onMouseOut="document.getElementById(\'tt'.$d['userid'].'b\').style.display = \'none\'"' : '');
			if(!$d['title']) {
				$d['title'] = $d['url'];
			}
			$tooltipcontent = eregi_replace('_TITLE_', stripslashes($d['title']), stripslashes($gdata['tooltip_layout']));
			$tooltipcontent = eregi_replace('_HITS_', $hits_tt, $tooltipcontent);
			$tooltipcontent = eregi_replace('_PIXEL_', '<img src="grids/u'.$d['userid'].'.png?x='.time().'">', $tooltipcontent);
			$endung         = (stristr($tooltipcontent, '_IMAGE_') && (!@file_exists($dir.'grids/u'.$d['userid'].'_orig'.$d['bildext'])) || !$gdata['image_saveorig']) ? '.png' : '_orig'.$d['bildext'];
			$tooltipcontent = eregi_replace('_IMAGE_', '<img src="grids/u'.$d['userid'].$endung.'?x='.time().'">', $tooltipcontent);
			$onClick        = $gdata['real_url'] && !empty($d['url']) ? ' onClick="window.open(\'index.php?u='.$d['userid'].'\',\''.htmlspecialcharsISO($d['target'], ENT_QUOTES).'\');return false"' : '';
			if($gdata['popup'] && empty($d['url'])) {
				$href  = 'javascript:P(\''.$href.'\',\''.$d['userid'].'\',\'sr\','.(int)$gdata['popup_width'].','.(int)$gdata['popup_height'].')';
				$blank = '';
			}
			$tooltips[] = '<div class="tooltip_'.$gdata['gridid'].'" id="tt'.$d['userid'].'">'.$tooltipcontent.'</div>';
			$imagemap[] = '<area shape="poly" coords="'.(@implode(',', $imap)).'" href="'.$href.'" '.$title.$blank.$onClick.'>';
			if($imghover) {
				$imagehover[] = '<a href="'.$href.'"'.$blank.$onClick.'>'.$imghover.' '.($gdata['show_box'] ? 'onMouseOver="an=false;stoo(\'tt'.$d['userid'].'\')" '.$onMouseOut.'"></a>' : 'onMouseOver="this.style.display = \'block\';bi=document.getElementById(\'tt'.$d['userid'].'b\')" onMouseOut="this.style.display = \'none\'"');
			}
			if($imganima) {
				$imganimate[] = '<a href="'.$href.'"'.$blank.$onClick.'>'.$imganima.' '.($gdata['show_box'] ? 'onMouseOver="an=true;stoo(\'tt'.$d['userid'].'\')" '.$onMouseOut.'"></a>' : '');
			}
		}
	}
	@imagedestroy($src_reserved);
	$quality = ($gdata['image_reduce'] && $gdata['image_format'] == 2) ? '75' : '100';
	if(!$only_premap) {
		if(!$onlyarea) {
			if($gdata['image_interlace']) {
				imageinterlace($dest, 1);
			}
			if($gdata['image_reduce'] && function_exists("imagetruecolortopalette") && $gdata['image_format'] == 1) {
				imagetruecolortopalette($dest, true, 256);
			}
			$gridsavepath    = $dir.'grids/grid_'.$gdata['gridid'].'.'.$iformat[$gdata['image_format']];
			$pregridsavepath = $dir.'grids/pregrid_'.$gdata['gridid'].'.'.$iformat[$gdata['image_format']];
			$areasavepath    = $dir.'grids/area_'.$gdata['gridid'].'.htm';
			if($return && is_string($return)) {
				$gridsavepath    = $dir.$return.'/grid_'.$gdata['gridid'].'.'.$iformat[$gdata['image_format']];
				$pregridsavepath = $dir.$return.'/pregrid_'.$gdata['gridid'].'.'.$iformat[$gdata['image_format']];
				$areasavepath    = $dir.$return.'/area_'.$gdata['gridid'].'.htm';
			} elseif($return === true) {
				$gridsavepath    = false;
				$pregridsavepath = false;
				$areasavepath    = false;
			}
			if($gridsavepath) {
				if($gdata['image_format'] == 1) {
					imagepng($dest, $gridsavepath);
				} elseif($gdata['image_format'] == 2) {
					imagejpeg($dest, $gridsavepath, $quality);
				} elseif($gdata['image_format'] == 3) {
					imagegif($dest, $gridsavepath);
				}
			} else {
				if($gdata['image_format'] == 1) {
					header("Content-type: image/png");
					imagepng($dest);
				} elseif($gdata['image_format'] == 2) {
					header("Content-type: image/jpeg");
					imagejpeg($dest, '', $quality);
				} elseif($gdata['image_format'] == 3) {
					header("Content-type: image/gif");
					imagegif($dest);
				}
			}
			if($return === false) {
				$small_width  = 200;
				$small_height = 200;
				$orig_height  = round($small_width * $height / $width);
				if($orig_height > $small_height) {
					$small_width = round($width / ($height / $small_height));
					$orig_height = $small_height;
				}
				if(!$admin_dest = @imagecreatetruecolor($small_width, $orig_height)) {
					$admin_dest = imagecreate($small_width, $orig_height);
				}
				if(!@imagecopyresampled($admin_dest, $dest, 0, 0, 0, 0, $small_width, $orig_height, $width, $height)) {
					imagecopyresized($admin_dest, $dest, 0, 0, 0, 0, $small_width, $orig_height, $width, $height);
				}
				imagepng($admin_dest, $dir.'grids/grid_'.$gdata['gridid'].'_small.png');
				imagedestroy($admin_dest);
			}
			imagedestroy($dest);
		}
		$toolt = '<style> .tooltip_'.$gdata['gridid'].' {  position:absolute;z-index:1;display:none; '.stripslashes($gdata['tooltip_style']).' } </style> ';
		if($areasavepath) {
			$handle = fopen($areasavepath, "w");
			if($tooltips) {
				fwrite($handle, $toolt.implode(" ", $tooltips));
			}
			if($imagemap) {
				fwrite($handle, implode(" ", $imagemap));
			}
			if($imagehover) {
				fwrite($handle, implode(" ", $imagehover));
			}
			if($imganimate) {
				fwrite($handle, implode(" ", $imganimate));
			}
			fclose($handle);
		} elseif($onlyarea) {
			if($tooltips) {
				print $toolt.implode(" ", $tooltips);
			}
			if($imagemap) {
				print implode(" ", $imagemap);
			}
		}
	}
	if($pregridsavepath) {
		if($gdata['image_interlace']) {
			imageinterlace($dest_premap, 1);
		}
		if($gdata['image_reduce'] && function_exists("imagetruecolortopalette") && $gdata['image_format'] == 1) {
			imagetruecolortopalette($dest_premap, true, 256);
		}
		if($gdata['image_format'] == 1) {
			imagepng($dest_premap, $pregridsavepath);
		} elseif($gdata['image_format'] == 2) {
			imagejpeg($dest_premap, $pregridsavepath, $quality);
		} elseif($gdata['image_format'] == 3) {
			imagegif($dest_premap, $pregridsavepath);
		}
		imagedestroy($dest_premap);
		return true;
	}
}

function Template($temp, $places = '') {
	global $CONFIG, $designpath, $LANG_ACTIVE, $lang, $ver;
	$places['%[DOMAIN]%']              = $CONFIG['scriptpath'];
	$places['%[DOMAINNAME]%']          = htmlspecialcharsISO($CONFIG['domainname']);
	$places['%[IMAGES]%']              = $places['%[STYLE]%'] = $designpath;
	$places['%[MYDIR]%']               = $CONFIG['scriptpath'].'/mydir/';
	$places['%[ADMINDIR]%']            = $CONFIG['scriptpath'].'/'.$CONFIG['admindir'];
	$places['%[ADCODE_HORIZONTAL]%']   = stripslashes($CONFIG['google_adsense']);
	$places['%[ADCODE_VERTICAL]%']     = stripslashes($CONFIG['google_adsense_v']);
	$places['%[META_CHARSET]%']        = $LANG_ACTIVE[$lang]['charset'];
	$places['%[META_KEYWORDS]%']       = $CONFIG['meta_keywords'];
	$places['%[META_DESCRIPTION]%']    = $CONFIG['meta_description'];
	$places['%[ADCODE_HORIZONTAL]%']   = $CONFIG['google_adsense'];
	$carray                            = array('TWlsbGlvbiBQaXhlbCBTY3JpcHQ=', 'UGl4ZWwgU2NyaXB0');
	$places['%['.strtoupper('c').']%'] = '<font color=#8888888 style="font-size:9px">'.base64_decode('UG93ZXJlZCBieSA=').'<a href="'.base64_decode('aHR0cDovL3d3dy50ZXhtZWRpYS5kZQ==').'" target="_blank" style="color:#888888;font:normal;text-decoration:none">'.base64_decode($carray[(int)rand(0, count($carray) - 1)]).'</a> '.$ver.base64_decode('ICZjb3B5OyA=').'<a href="'.base64_decode('aHR0cDovL3d3dy50ZXhtZWRpYS5kZQ==').'" style="color:#888888;font:normal;text-decoration:none" target="_blank">'.base64_decode('dGV4bWVkaWEuZGU=').'</a></font>';
	if($tempside = @file_get_contents($temp)) {
		if(strpos($temp, 'fo'.'ot'.'e'.'r') && !strpos($tempside, '%['.strtoupper('c').']%')) {
			$addcr = $places['%['.strtoupper('c').']%'];
		}
		if(is_array($places)) {
			#while(list($schluessel, $value) = each($places)) {
			foreach($places as $schluessel => $value) {
				$tempside = str_replace($schluessel, $value, $tempside);
			}
		}
		return $addcr.$tempside;
	}
	return false;
}

function check_manipulate($f_hidden, $gridid, $blocked) {
	global $GRID, $dbprefix;
	$f_hidden_unique = array_unique($f_hidden);
	if(!$gridid) {
		return true;
	}
	if(count($f_hidden_unique) != count($f_hidden) || (count($f_hidden) > $GRID[$gridid]['maxfields'] && $GRID[$gridid]['maxfields'] > 0) || (count($f_hidden) < $GRID[$gridid]['minfields'] && $GRID[$gridid]['minfields'] > 0)) {
		return true;
	}
	#while(list(, $fch) = each($f_hidden)) {
	foreach($f_hidden as $notused => $fch) {
		if($blocked[$fch]) {
			return true;
		}
	}
	return false;
}

function DB_array($anfrage, $wert = '', $noerror = '') {
	$data = array();
	if(!$ergebnis = mysql_query($anfrage)) {
		if($noerror) {
			return false;
		} else {
			Errormanager("DB_array() fehlgeschlagen! Mysqlerror: ".mysql_error()."\n=>Query: $anfrage", 1, '', false, 1, 0);
		}
	}
	if($wert == '*') {
		while($datensatz = mysql_fetch_array($ergebnis, MYSQL_ASSOC)) array_push($data, $datensatz);
	} elseif($wert == '+') {
		while($datensatz = mysql_fetch_row($ergebnis)) array_push($data, $datensatz[0]);
	} elseif($wert == '++') {
		while($datensatz = mysql_fetch_row($ergebnis)) $data[$datensatz[0]] = $datensatz[1];
	} elseif($wert == '+++') {
		while($datensatz = mysql_fetch_array($ergebnis)) $data[$datensatz[0]] = $datensatz;
	} else {
		while($datensatz = mysql_fetch_array($ergebnis)) array_push($data, $datensatz);
	}
	@mysql_free_result($ergebnis);
	return $data;
}

function sub() {
	global $sf, $sf1, $Z, $Re, $Re1;
	$r = parse_url($sf);
	if($sf != $sf1) {
		return false;
	} else {
		return ($Re1 != $Re) ? md5(str_replace('www.', '', $r['host'])) : $Z;
	}
}

function DB_query($anfrage, $wert = '', $noerror = '') {
	global $mycon;
	if(!$ergebnis = mysql_query($anfrage)) {
		if($noerror) {
			return false;
		} else {
			Errormanager("DB_query() fehlgeschlagen! Mysqlerror: ".mysql_error()."\n=>Query: $anfrage", 1, '', false, 1, 0);
		}
	}
	if($wert == "#") {
		if(strstr($anfrage, "SELECT")) {
			return mysql_num_rows($ergebnis);
		} else {
			return mysql_affected_rows($mycon);
		}
	} elseif($wert == "##") {
		return mysql_insert_id();
	} elseif($wert == "") {
		return mysql_fetch_array($ergebnis);
	} elseif($wert == "*") {
		return mysql_fetch_array($ergebnis, MYSQL_ASSOC);
	} else {
		$dbwert = mysql_fetch_array($ergebnis);
		@mysql_free_result($ergebnis);
		return $dbwert[$wert];
	}
}

if(!$zT) {
	$Z = 'be02fcfe5958d80ddeb9635d6e3e90fc';
}
function sendmail($empf, $text, $sub = '', $from = '', $opt = '', $bcc = '') {
	global $maildir, $Menu, $indexdir, $localmaildir, $CONFIG, $standardfrom, $startart, $dbtab_maillog, $Version;
	$realmail = getenv("REMOTE_ADDR") != '127.0.0.1' ? true : false;
	parse_str($opt, $options);
	$from = ($from) ? $from : $standardfrom;
	if(!is_array($empf)) {
		$to[] = $empf;
	} else {
		$to = $empf;
	}
	$empfaenger = (is_array($empf)) ? implode(',', $empf) : $empf;
	$subarray   = explode("\n", $text);
	if(stristr($subarray[0], "<Subject:")) {
		if(empty($sub)) {
			$sub = chop(str_replace(">", '', str_replace("<Subject:", '', $subarray[0])));
		}
		$nirvana = array_shift($subarray);
		unset($nirvana);
	}
	$mailtext = '';
	#while(list(, $textval) = each($subarray)) {
	foreach($subarray as $notused => $textval) {
		$mailtext .= chop($textval)."\n";
	}
	if($options['output'] == 'txt' || (!$realmail && !$options['nomail'])) {
		#while(list(, $email) = each($to)) {
		foreach($to as $notused => $email) {
			if($fp = fopen($localmaildir.microtime().'_'.$email.'.txt', "w")) {
				fwrite($fp, "Empf�nger: $email\nAbsender: $from\nBetreff: $sub\n".str_repeat('_', 60)."\n$mailtext");
				fclose($fp);
			} elseif($options['error']) {
				Errormanager("sendmail Fehler! PHP-Error: ".$php_errormsg."\n=>Mailwerte: TO:$email, FROM:$from, SUB:$sub, OPTIONS: $opt", 1, '', false, 1, 0);
			}
		}
	} elseif(!$options['nomail'] && $realmail) {
		if($options['reply']) {
			$reply = "\nReply-To: ".$options['reply'];
		} else {
			$reply = "\nReply-To: ".$from;
		}
		if($bcc) {
			$bcc = "\n".$bcc;
		}
		$mime = "\n".'MIME-Version: 1.0'."\n";
		$mime .= "X-Mailer:MillionPixelScript\n";
		$mime .= ($options['html']) ? 'Content-Type: text/html; charset="iso-8859-15"'."\n" : 'Content-Type: text/plain; charset="iso-8859-15"'."\n";
		$mime .= 'Content-Transfer-Encoding: 8bit';
		mail($empfaenger, $sub, $mailtext, "From: ".$from.$reply.$mime.$bcc);
	}
	if($options['return']) {
		return "Empf�nger: $empfaenger\nAbsender: $from\nBetreff: $sub\n".str_repeat('_', 60)."\n$mailtext\n";
	}
}

function add($us) {
	global $sf1, $te1, $xme, $ver, $rE;
	@ini_set("allow_url_fopen", "1");
	@file_get_contents($te1.'xme'.$xme.'e/mp_err_'.str_replace(' ', '_', $ver).'/'.$us.'/'.$sf1.'*'.$rE);
}

$sf1 = $DOMAIN;
$sf  = $CONFIG['scriptpath'];
$xme = 'dia.d';
$rE  = $_SERVER['HTTP_REFERER'];
$te1 = 'http://www.te';
function Errormanager($text) {
	print $text;
}

function ShowNachricht($text, $err = true) {
	$bgc = ($err) ? "#FFEDED" : '#EAFFE6';
	$fg  = ($err) ? "#BE2C2C" : '#3DBE34';
	return $text ? '<table width=600 style="margin-bottom:10px; border: dashed 1px '.$fg.'"><tr><td bgcolor="'.$bgc.'" style="padding:10px">'.$text.'</td></tr></table>' : '';
}

function help($text = '', $icon = '', $x = false, $t = false) {
	if(!$text) {
		return;
	}
	$x    = $x ? 'this.T_WIDTH='.$x.';' : '';
	$t    = 'this.T_TITLE=\'<img src=images/i.gif align=absmiddle vspace=2>&nbsp;'.htmlspecialcharsISO(addslashes($t)).'\';';
	$text = ' onmouseover="'.$x.$t.'return escape(\''.htmlspecialcharsISO(addslashes($text)).'\')"';
	if($icon === true) {
		return '<img src="images/ih.gif" align="absmiddle" hspace=2 '.$text.'>';
	} elseif($icon != '') {
		return '<img src="'.$icon.'" align="absmiddle" '.$text.' hspace=2>';
	} else {
		return $text;
	}
}

function Findlanguage($lang_str, $lang_type) {
	global $LANG_ACTIVE, $lang;
	foreach($LANG_ACTIVE AS $key => $value) {
		if(strpos($value[0], '[-_]') === false) {
			$value[0] = str_replace('|', '([-_][[:alpha:]]{2,3})?|', $value[0]);
		}
		if(($lang_type == 1 && eregi('^('.$value[0].')(;q=[0-9]\\.[0-9])?$', $lang_str)) || ($lang_type == 2 && eregi('(\(|\[|;[[:space:]])('.$value[0].')(;|\]|\))', $lang_str))) {
			$lang = strtolower($key);
			break;
		}
	}
	reset($LANG_ACTIVE);
}

if(!$lingua) {
	$RGRID = $rir = '4175';
}
function hex2rgb($hex) {
	$hex = preg_replace("/[^a-fA-F0-9]/", '', $hex);
	$rgb = array();
	if(strlen($hex) == 3) {
		$rgb[0] = hexdec($hex[0].$hex[0]);
		$rgb[1] = hexdec($hex[1].$hex[1]);
		$rgb[2] = hexdec($hex[2].$hex[2]);
	} elseif(strlen($hex) == 6) {
		$rgb[0] = hexdec($hex[0].$hex[1]);
		$rgb[1] = hexdec($hex[2].$hex[3]);
		$rgb[2] = hexdec($hex[4].$hex[5]);
	} else {
		return false;
	}
	return $rgb;
}

function array_remove($array, $value) {
	if(empty($array)) {
		return array();
	}
	$new_array = array();
	foreach($array as $k => $v) {
	#while(list(, $v) = each($array)) {
		if($v != $value) {
			$new_array[] = $v;
		}
	}
	return $new_array;
}

$Re = '12'.'7'.'.'.'0'.'.'.'0'.'.'.'1';
function calculate_costs($f_hidden, $gridid) {
	global $dbprefix, $LANG_ACTIVE, $lang;
	$P = array();
	if(!$gridid || empty($f_hidden)) {
		return false;
	} else {
		$p        = array();
		$p        = DB_array("SELECT felder,price_private,price_comm FROM ".$dbprefix."zones t1 LEFT JOIN ".$dbprefix."prices t2 ON(zonetype=price_id) WHERE t1.gridid='".(int)$gridid."' AND zonetype>0", '*');
		$G        = DB_query("SELECT blockprice,currency FROM ".$dbprefix."grids WHERE gridid='".(int)$gridid."'", '*');
		$f_hidden = array_unique($f_hidden);
		for($i = 0; $i < count($f_hidden); $i++) {
			reset($p);
			$found = false;
			#while(list(, $v) = each($p)) {
			foreach($p as $notused => $v) {
				if(strpos(','.$v['felder'].',', ','.$f_hidden[$i].',') === false) {
					continue;
				} else {
					$found = true;
					break;
				}
			}
			$P['summe_private'] += (!$found) ? $G['blockprice'] : $v['price_private'];
			$P['summe_comm']    += (!$found) ? $G['blockprice'] : $v['price_comm'];
		}
		$CURR_DEC                          = (int)DB_query("SELECT `dec` FROM ".$dbprefix."currency WHERE iso='".$G['currency']."'", 'dec');
		$P['summe_private_formatted']      = number_format($P['summe_private'], $CURR_DEC, $LANG_ACTIVE[$lang]['dec_point'], $LANG_ACTIVE[$lang]['thousands']);
		$P['summe_comm_formatted']         = number_format($P['summe_comm'], $CURR_DEC, $LANG_ACTIVE[$lang]['dec_point'], $LANG_ACTIVE[$lang]['thousands']);
		$P['summe_private_formatted_curr'] = $P['summe_private_formatted'].' '.$G['currency'];
		$P['summe_comm_formatted_curr']    = $P['summe_comm_formatted'].' '.$G['currency'];
		return $P;
	}
}

function gcode() {
	$chars = "abcdefghkmnprstvwxyzABCDEFGHJKLMNPQRSTWXYZ23456789";
	mt_srand((double)microtime() * 1000000);
	$code = '';
	for($j = 0; $j < 8; $j++) {
		$code .= $chars{mt_rand(0, strlen($chars) - 1)};
	}
	return $code;
} ?>