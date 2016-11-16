<?php

$db = mysqli_connect('localhost','cdwskse14810','39c4b83e54','cdwskse14810');
mysqli_query($db,'SET NAMES utf8');

if (isset($_GET['setlang'])) {
	setcookie('lang',$_POST['lang']);
	header("Location: /index.php");
}

$query = "SELECT * FROM `Languages`";
$langs = mysqli_query($db,$query);
$tmp = [];
while ($lang = mysqli_fetch_assoc($langs)) {
	$tmp[] = $lang;
}
$langs = $tmp;

if (isset($_COOKIE['lang'])) {
	$query = "SELECT * FROM `Languages` WHERE `Trigger` = '".mysqli_real_escape_string($db,$_COOKIE['lang'])."'";
	if (mysqli_num_rows(mysqli_query($db,$query))) 
	{
		$lang = $_COOKIE['lang'];
	} 
	else 
	{
		setcookie('lang',$langs[0]['Trigger']);
		$_COOKIE['lang'] = $langs[0]['Trigger'];
	}
} 
else
{
	setcookie('lang',$langs[0]['Trigger']);
	$_COOKIE['lang'] = $langs[0]['Trigger'];
}

$lang = $_COOKIE['lang'];