<?php
declare(strict_types=1);
session_start(); 
$array = $_GET;// Запрос браузера приходил в ключе ARRAY;
foreach($array as $key => $value){
	if($key === "get"){
		$str_j = file_get_contents("json-lib/{$_SESSION['login']}.json");
		echo $str_j;// Ответ из файла json;
	}
	else{
		print_r($key);
		$str_j = str_replace("_"," ",$key);
		$str_j = str_replace("%grid;","#",$str_j);
		$str_j = str_replace("%bracket;","[",$str_j);
		$str_j = str_replace("%point;",".",$str_j);
		$str_j = str_replace("%underline;","_",$str_j);
		$str_j = str_replace("%ampersand;","&",$str_j);
		print_r($str_j);
	// save in file {email}.json;
		file_put_contents("json-lib/{$_SESSION['login']}.json" ,"{$str_j}");	
	}
}