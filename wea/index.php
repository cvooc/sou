<?php
/*
作者:D.Young
主页：https://yyv.me/
github：https://github.com/5iux/sou
日期：2019-07-25
版权所有，请勿删除

使用前请注意务必设置好白名单和apikey
本天气插件为申请地址：和风天气-https://dev.heweather.com/
 */
header('Content-Type:application/json; charset=utf-8');
//防跨域调用
header('Access-Control-Allow-Origin: http://supermario.vip');
header('Access-Control-Allow-Methods:POST');
header('Access-Control-Allow-Headers:x-requested-with,content-type');
//获取当前ip
$address = $_SERVER["REMOTE_ADDR"];
//你的申请的apikey 必填 请到和风天气申请
$key = "82353828f80d47e7887c88ffaf7c75e8";

$jsonlist = file_get_contents("https://free-api.heweather.net/s6/weather/?location=" . $address . "&key=" . $key);
echo $jsonlist;
?>