<?php
header("content-type:text/html;charset=gb2312");
$url='http://';//登录处理网站地址
$login_file='login.jsp';//处理登录文件
$user=isset($_GET['id'])?$_GET['id']:'0000000000';
$uid='999999999999999999';
$para="zgzh=$user&sfzh=$uid&cxyd=".urlencode("当前年度");
$login_url=$url.'login.jsp?'.$para;
$ch=curl_init($login_url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true) ; // 获取数据返回
curl_setopt($ch, CURLOPT_BINARYTRANSFER, true) ; // 在启用 CURLOPT_RETURNTRANSFER 时候将获取数据返回
$output=curl_exec($ch);
curl_close($ch);

$s=strpos($output,"main_menu.jsp");
$e=strrpos($output,'";');
$login_url=$url.urlencode(substr($output,$s,$e-$s));
$login_url=str_replace(array('%3F','%3D','%26'),array('?','=','&'),$login_url);
$ch=curl_init($login_url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true) ; // 获取数据返回
curl_setopt($ch, CURLOPT_BINARYTRANSFER, true) ; // 在启用 CURLOPT_RETURNTRANSFER 时候将获取数据返回
$output=curl_exec($ch);
curl_close($ch);

$itmp=strpos($output,'职工姓名');
$s=strrpos($output,'<table ',-$itmp);
$e=strpos($output,'</table>',$itmp);
$result=substr($output,$s,$e-$s+8);
echo str_replace(array('right'),array('left'),strip_tags($result,"<table>,<tr>,<td>"));
?>