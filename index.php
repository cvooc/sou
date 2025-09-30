<?php
//禁用错误报告
error_reporting(0);
$t = htmlspecialchars($_POST["t"]);
$q = htmlspecialchars($_POST["q"]);
if ($q == "" || $q == null) {
} else {
    if ($t == "b") {
        echo '<script>window.open("//www.baidu.com/s?ie=utf-8&word=' . $q . '","_blank");</script>';
    } elseif ($t == "g") {
        echo '<script>window.open("https://www.google.com/search?hl=zh&q=' . $q . '","_blank");</script>';
    } else {
        //默认百度
        echo '<script>window.open("//www.baidu.com/s?ie=utf-8&word=' . $q . '","_blank");</script>';
    }
};

function get_file($file){
    $data=file_get_contents($file);
    $linkList=array();
    $lines=explode("\n",$data);
    foreach ($lines as $line) {
        if (strlen($line)==0) continue;
        $detail = str_replace("\r", '', $line);
        array_push($linkList, $detail);
    }
    return $linkList;
}

function echo_link($list){
    for ($x = 0; $x <= count($list); $x++) {
        $tmpstr = $list[$x];
        if (substr($tmpstr, 0, 1) == "#"){
            // 此行不输出
        }else if (substr($tmpstr, 0, 4) == "    "){
            $tmpstr = substr($tmpstr, 4, strlen($tmpstr));
            $tmplink = explode(" ",$tmpstr);
            echo '<li><a rel="nofollow" href="'.$tmplink[2].'" data-umami-event="侧边栏跳转" data-umami-event-name="'.$tmplink[0].'" data-umami-event-url="'.$tmplink[2].'" target="_blank"><i class="iconfont '.$tmplink[1].'" style="'.implode("",array_slice($tmplink, 3, count($tmplink))).'"></i>'.$tmplink[0].'</a></li>';
        }else if ($tmpstr!=""){
            $tmptitle = explode(" ",$tmpstr);
            echo '<li class="title"><i class="iconfont '.$tmptitle[1].'"></i>'.$tmptitle[0].'</li>';
        }
    }
}

?>
<!DOCTYPE html>
<html lang="zh-CN">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="Cache-Control" content="no-siteapp">
    <link rel="icon" href="icon/96.png" sizes="96x96" />
    <link rel="apple-touch-icon-precomposed" href="icon/128.png" />
    <meta name="msapplication-TileImage" content="icon/128.png" />
    <link rel="shortcut icon" href="icon/32.png" />
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="full-screen" content="yes">
    <!--UC强制全屏-->
    <meta name="browsermode" content="application">
    <!--UC应用模式-->
    <meta name="x5-fullscreen" content="true">
    <!--QQ强制全屏-->
    <meta name="x5-page-mode" content="app">
    <!--QQ应用模式-->
    <title>搜索</title>
    <link href="style.css?t=<?php echo date("ymdhi"); ?>" rel="stylesheet">
    <!-- 我自己的CSS图标 -->
    <link rel="stylesheet" href="font_1654770.css?t=<?php echo date("ymdhi"); ?>">
    <!--<link rel="stylesheet" href="//at.alicdn.com/t/font_1654770_gsrv0hc1am.css">-->
    <!-- 现已将前端重构,剔除掉了jquery,使用原生js实现响应功能,体积精简31kb -->
    <!--<script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.min.js"></script>-->
    <script src="sou.js?t=<?php echo date("ymdhi"); ?>"></script>
    <style type="text/css">
        .skin-container {
            position: fixed;
            top: 0;
            left: 0;
            height: 100%;
            width: 100%;
            user-select: none;
            z-index: 0;
            zoom: 1;
            background-color: rgb(255, 255, 255);
            background-image: url(/img/background.jpg);
            background-position: center 0;
            background-repeat: no-repeat;
            background-size: cover;
        }
    </style>
    <!-- 自部署umami统计 -->
    <script defer src="https://umami.foo.run/random-string.js" data-website-id="f177e375-91ba-4791-8420-b0dc11005dcd"></script>
    <!-- 百度统计 -->
    <script>
        var _hmt = _hmt || [];
        (function() {
            var hm = document.createElement("script");
            hm.src = "https://hm.baidu.com/hm.js?b72e6ed39f39b74503b26de53fe42900";
            var s = document.getElementsByTagName("script")[0];
            s.parentNode.insertBefore(hm, s);
        })();
    </script>
</head>

<body class="skin-container" topmargin="0" oncontextmenu="return false" ondragstart="return false" onselectstart="return false" onselect="document.getSelection().empty()" oncopy="document.getSelection().empty()" onbeforecopy="return false">
    <div id="menu"><i></i></div>
    <div class="list closed">
        <ul><?php echo_link(get_file("links.txt")); ?></ul>
    </div>
    <div class="mywth">
        <div class="wea_hover">
            <div class="wea_in wea_top"></div>
            <div class="wea_in wea_con">
                <ul></ul>
            </div>
            <div class="wea_in wea_foot">
                <ul></ul>
            </div>
        </div>
        <!--天气插件，基于www.tianqiapi.com 天气接口制作-->
        <div class="time_text">
            <div class="mywth_text"></div>
            <div id="date">
                <div class="parts" id="date_div"></div>
                <div class="mask" id="year">
                    <div class="p"></div>
                </div>
                <div class="mask" id="month">
                    <div class="p"></div>
                </div>
            </div>
            <div id="time">
                <div class="parts" id="time_div"></div>
                <div class="mask" id="d">
                    <div class="p"></div>
                </div>
                <div class="mask" id="h">
                    <div class="p"></div>
                </div>
                <div class="mask" id="m">
                    <div class="p"></div>
                </div>
            </div>
        </div>
    </div>
    <div id="content">
        <div class="con">
            <div class="shlogo"></div>
            <div class="sou">
                <form action="" method="post" target="_self">
                    <input class="t" type="text" value="" name="t" hidden>
                    <input class="wd" type="text" placeholder="请输入搜索内容" name="q" x-webkit-speech lang="zh-CN">
                    <button><i style="font-size: 20px;" class="iconfont icon-sousuo"></i></button>
                </form>
                <ul>
                    <li data-s="baidu" target="_blank"><i style="background-image: url(icon/baidu.svg);"></i>百度一下</li>
                    <li data-s="google" target="_blank"><i style="background-image: url(icon/g.svg);"></i>Google</li>
                </ul>
            </div>
        </div>
        <div class="foot">© 1996-<?php echo date("Y"); ?> by <a href="https://github.com/cvooc">cvooc</a> . All rights reserved. <a rel="nofollow" href="https://github.com/cvooc" target="_blank" style="font-size: 12px;"><i class="iconfont icon-github"></i></a></div>
    </div>
    <!--<canvas class="fireworks" style="position:fixed;left:0;top:0;z-index:99999999;pointer-events:none;" /> -->
</body>
<!-- 实测这个动画效果,占用的CPU过多,需要硬性要求浏览器开启硬件加速,故暂时屏蔽 -->
<!--<script src="anime.min.js" type="text/javascript" charset="utf-8"></script> -->
<!--<script src="fireworks.js" type="text/javascript" charset="utf-8"></script> -->
</html>