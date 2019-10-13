<?php
/* -----------------------------------------------------
    Copyright 2004-2019 by texmedia

   ----------------------------------------------------- */

define ('MYSQL_ASSOC', MYSQLI_ASSOC);
define ('MYSQL_BOTH', MYSQLI_BOTH);
define ('MYSQL_NUM', MYSQLI_NUM);

/**
 * @param $string
 * @return string
 */
function sql_escape ($string) {
	return sqlescape($string);
}

function DBconnect() {
  // Stellt die Verbindung zur Datenbank her, falls noch nicht geschehen.
  global $dbuser, $dbhost, $dbpwd, $dbname;
  static $dbs;
  if(!$dbs) {
	  if(!$dbs = mysqli_connect( $dbhost, $dbuser, $dbpwd ,$dbname)) {
	      die('no database Connection possible: ' . mysql_error());
	  }
  }
  return $dbs;
}


function sqlescape ($string) {
    return mysqli_real_escape_string(DBconnect(), $string);
}

if(!function_exists('mysql_real_escape_string')) {
	function mysql_real_escape_string($string) {
		return sqlescape($string);
	}
}
if(!function_exists('mysql_escape_string')) {
	function mysql_escape_string($string) {
		return sqlescape($string);
	}
}
if(!function_exists('ereg')) {
	function ereg($pattern, $string) {
		$pattern = '/'.trim($pattern, '/').'/';
		return preg_match($pattern, $string);
	}
}
if(!function_exists('eregi')) {
	function eregi($pattern, $string) {
		$pattern = '/'.trim($pattern, '/').'/';
		return preg_match($pattern, $string);
	}
}
if(!function_exists('eregi_replace')) {
	function eregi_replace($pattern, $replace, $string) {
		#$pattern = '/'.trim($pattern, '/').'/';
		#return preg_replace($pattern, $replace, $string);
		return str_ireplace($pattern, $replace, $string);
	}
}
if(!function_exists('ereg_replace')) {
	function ereg_replace($pattern, $replace, $string) {
		$pattern = '/'.trim($pattern, '/').'/';
		return preg_replace($pattern, $replace, $string);
	}
}
if(!function_exists('mysql_error')) {
    function mysql_error() {
        return mysqli_error(DBconnect());
    }
}

if(!function_exists('mysql_connect')) {
    function mysql_connect($host, $user, $pass) {
        return mysql_connect($host, $user, $pass);
    }
}
if(!function_exists('mysql_query')) {
    function mysql_query($query, $link = '') {
    	if(!$link) $link = DBconnect();
        return mysqli_query($link, $query);
    }
}
if(!function_exists('mysql_fetch_array')) {
    function mysql_fetch_array($result, $resultType = MYSQLI_BOTH) {
        return mysqli_fetch_array($result, $resultType);
    }
}
if(!function_exists('mysql_fetch_row')) {
    function mysql_fetch_row($result, $resultType = '') {
        return mysqli_fetch_row($result);
    }
}
if(!function_exists('mysql_free_result')) {
    function mysql_free_result($result='') {
    	if(!$link) $link = DBconnect();
        return mysqli_free_result($result);
    }
}
if(!function_exists('mysql_affected_rows')) {
    function mysql_affected_rows($link='') {
    	if(!$link) $link = DBconnect();
        return mysqli_affected_rows($link);
    }
}
if(!function_exists('mysql_num_rows')) {
    function mysql_num_rows($result='') {
        return mysqli_num_rows($result);
    }
}
if(!function_exists('mysql_close')) {
    function mysql_close($link='') {
        return mysqli_close($link);
    }
}
if(!function_exists('mysql_insert_id')) {
    function mysql_insert_id($link='') {
        if(!$link) $link = DBconnect();
        return mysqli_insert_id($link);
    }
}



function get_time_offset() {
    $now = new DateTime();
    $mins = $now->getOffset() / 60;
    $sgn = ($mins < 0 ? -1 : 1);
    $mins = abs($mins);
    $hrs = floor($mins / 60);
    $mins -= $hrs * 60;
    $offset = sprintf('%+d:%02d', $hrs*$sgn, $mins);
    return $offset;
}
