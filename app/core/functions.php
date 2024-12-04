<?php
function setValue($key,$default = "") {
    if (!empty($_POST[$key])) {
        $value = $_POST[$key];
        return $value;
    }else{
		if(!empty($default)){
			return $default;
		}
	}
    return "";
}
function redirectPage($page){
    header("location:".ROOT."/".$page);
    die;
}

function message($msg = "",$erase = true){
    if(!empty($msg))
	{
		$_SESSION['message'] = $msg;
	}else{

		if(!empty($_SESSION['message']))
		{
			$msg = $_SESSION['message'];
			if($erase){
				unset($_SESSION['message']);
			}
			return $msg;
		}
	}

	return false;
}
/**
 * Summary of esc
 * @param mixed $text
 * @return string
 * security check if any un normal string wrote in any where
 */
function esc($text) {
	return htmlspecialchars($text);
}
function strToUrl($url) {
	$url = str_replace("'",'', $url);
	$url = preg_replace('~[^\\pL0-9_]+~u','-', $url);
	$url = trim ($url,'-');
	$url = iconv('utf-8','us-ascii//TRANSLIT', $url);
	$url = strtolower($url);
	$url = preg_replace('~[^-a-z0-9_]+~','-', $url);
	return $url;
}