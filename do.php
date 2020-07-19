<?php
/*!
@name:Myurl Demo
@description:Myurl跳转文件
@author:墨渊 
@version:1.2
@time:2017-11-14
@copyright:优启梦&墨渊
*/
include './includes/api.inc.php';
$uid=htmlspecialchars($_GET['uid']);
if(!$uid){
	@header("http/1.1 404 not found"); 
	@header("status: 404 not found"); 
}
$myrow=$DB->get_row("select * from wjoy_log where uid='$uid' limit 1");
if(!$myrow){
	@header("http/1.1 404 not found"); 
	@header("status: 404 not found"); 
	echo 'echo 404'; 
	exit(); 
}else{
	if (CHECK_MODE == 2) {
		$param = http_build_query(array(
			'token'		=>		CHECK_TOKEN
			,'domain'	=>		$longurl
		));
		$result = get_curl('http://check.uomg.com/api/urlsec/'.CHECK_TYPE, $param);
		$arr = json_decode($result,true);
		if ($arr['code'] == 201) {
			exit('<center>该域名涉嫌违规，已拦截处理！！！</center>');
		}

	}
	$t_url=$myrow['longurl'];
	if ($t_url == base64_encode(base64_decode($t_url))) {
        $t_url =  base64_decode($t_url);
    }
	header("Location: ".$t_url, true, 301);
}