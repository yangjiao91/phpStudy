<?php

// $param = $_SERVER['QUERY_STRING'] ;
$url = "http://".$_SERVER['SERVER_NAME'].$_SERVER['PHP_SELF'].($_SERVER['QUERY_STRING'] ? "?".$_SERVER['QUERY_STRING'] : ""); 
$return = array("return_code"=>"SUCCESS","return_msg"=>"");
$returnErr = array("return_code"=>"FAIL","return_msg"=>"签名失败");

$returnJson = json_encode($return);
$returnErrJson =json_encode($returnErr) ;

$type = "fail";
if( $type == "success"){
	$re = fopen('./log.txt', 'ab');
	fwrite($re, $url);//将内容写入文件
	fwrite($re, "\r\n");
	fwrite($re, $returnJson);
	fwrite($re, "\r\n");
	fclose($re);
	header('Content-Type: application/json; charset=UTF-8');
	echo $returnJson;
}else{
	$re = fopen('./err.txt', 'ab');
	fwrite($re, $url);//将内容写入文件
	fwrite($re, "\r\n");
	fwrite($re, $returnErrJson);
	fwrite($re, "\r\n");
	fclose($re);
	header('Content-Type: application/json; charset=UTF-8');
	echo $returnErrJson ;
}
