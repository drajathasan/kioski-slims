<?php
$file = file_get_contents('index.html');

preg_match_all("/ src=\"[^>]+\"/i", $file, $res);
preg_match_all("/ href=\"[^>]+\"/i", $file, $res2);

$toDownload = array();
$str  = '';
foreach ($res2 AS $result)
{
	foreach ($result AS $ress) 
	{
		if (!preg_match("/(href=\"#\")/i", $ress))
		{
			$str = str_replace(array('href', 'src', '=', '"', 'classimg-circle altUser Image', 'classuser-image altUser Image'), '', $ress)."\n";
			exec('wget '.$str);
		}
	}
}

//echo $str;
