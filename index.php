<?php
    //禁用错误报告
    error_reporting(0);
    $t = htmlspecialchars($_POST["t"]);
    $q = htmlspecialchars($_POST["q"]);
    if (!empty($q)) {
        if ($t == "b") {
            echo'<script>window.open("//www.baidu.com/s?ie=utf-8&word='.$q.'","_blank");</script>';
        } elseif ($t == "g") {
            echo'<script>window.open("https://www.google.com/search?hl=zh&q='.$q.'","_blank");</script>';
        } else {
            //默认百度
            echo'<script>window.open("//www.baidu.com/s?ie=utf-8&word='.$q.'","_blank");</script>';
        }
    };
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
  <link rel="shortcut icon" href="icon/32.png"/>
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-touch-fullscreen" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="black">
  <meta name="full-screen" content="yes"><!--UC强制全屏-->
  <meta name="browsermode" content="application"><!--UC应用模式-->
  <meta name="x5-fullscreen" content="true"><!--QQ强制全屏-->
  <meta name="x5-page-mode" content="app"><!--QQ应用模式-->
  <title>搜索</title>
  <link href="style.css?t=<?php echo date("ymdhi"); ?>" rel="stylesheet">
  <!-- 我自己的CSS图标 -->
  <link rel="stylesheet" href="font_1654770_44szr853o1l.css">
  <!--<link rel="stylesheet" href="//at.alicdn.com/t/font_1654770_gsrv0hc1am.css">-->
  <!-- 现已将前端重构,剔除掉了jquery,使用原生js实现响应功能,体积精简31kb -->
  <!--<script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.min.js"></script>-->
  <script src="sou.js?t=<?php echo date("ymdhi"); ?>"></script>
  <style type="text/css">
    .skin-container{
        position: fixed;
        top: 0;
        left: 0;
        height: 100%;
        width: 100%;
        user-select:none;
        z-index: 0;
        zoom: 1;
        background-color: rgb(255, 255, 255);
        background-image: url(/img/background.jpg);
        background-position: center 0;
        background-repeat: no-repeat;
        background-size: cover;
    }
  </style>
</head>

<body class="skin-container" topmargin="0" oncontextmenu="return false" ondragstart="return false" onselectstart="return false" onselect="document.getSelection().empty()" oncopy="document.getSelection().empty()" onbeforecopy="return false">
    <div id="menu"><i></i></div>
    <div class="list closed">
        <ul>
            <!------>
            <li class="title"><i class="iconfont icon-kongzhitai"></i> 开发</li>
            <li><a rel="nofollow" href="https://retrocode.io/" target="_blank"><i class="iconfont icon-boke-copy"></i>我的博客</a></li>
            <li><a rel="nofollow" href="https://github.com/" target="_blank"><i class="iconfont icon-git"></i>Github</a></li>
            <li><a rel="nofollow" href="https://gitee.com/" target="_blank"><i class="iconfont icon-mayun" style="color:#f03;"></i>码云</a></li>
            <li><a rel="nofollow" href="https://juejin.im/" target="_blank"><i class="iconfont icon-juejin" style="color: #0084ff;"></i>掘金</a></li>
            <li><a rel="nofollow" href="https://www.ituring.com.cn/" target="_blank"><i class="iconfont icon-tulingdianzika" style="color: #0084ff;"></i>图灵社区</a></li>
            <li><a rel="nofollow" href="https://uniapp.dcloud.io/" target="_blank"><i class="iconfont icon-uni-app" style="color: green;"></i>Uni-App</a></li>
            <li><a rel="nofollow" href="https://www.apicloud.com/" target="_blank"><i class="iconfont icon-APICloud" style="color: #0084ff;"></i>ApiCloud</a></li>
            <li><a rel="nofollow" href="https://taro.aotu.io/" target="_blank"><i class="iconfont icon-React" style="color: #0084ff;"></i>Taro</a></li>
            <!--<li><a rel="nofollow" href="https://www.52pojie.cn/" target="_blank"><i class="iconfont icon-theater-masks" style="color:#f03;"></i>吾爱破解</a></li>-->
            <li><a rel="nofollow" href="https://www.bootcdn.cn/" target="_blank"><i class="iconfont icon-cdn" style="color: #e52;"></i>Bootcdn</a></li>
            <li><a rel="nofollow" href="https://dash.cloudflare.com/" target="_blank"><i class="iconfont icon-cloudflare" style="color: #f37f20;"></i>Cloudflare</a></li>
            <li><a rel="nofollow" href="https://sg.godaddy.com/" target="_blank"><i class="iconfont icon-domainyuming" style="color: #f37f20;"></i>Godaddy</a></li>
            <!------>
            <li class="title"><i class="iconfont icon-tieba1"></i> 贴吧</li>
            <li><a rel="nofollow" href="https://tieba.baidu.com/f?kw=wp7" target="_blank"><i class="iconfont icon-tieba1"></i>WP7吧</a></li>
            <li><a rel="nofollow" href="https://tieba.baidu.com/f?kw=steam" target="_blank"><i class="iconfont icon-tieba1"></i>Steam吧</a></li>
            <!------>
            <li class="title"><i class="iconfont icon-xingzhuang"></i> 邮箱</li>
            <li><a rel="nofollow" href="https://mail.qq.com/" target="_blank"><i class="iconfont icon-QQyouxiang" style="color: #f05;"></i>QQ邮箱</a></li>
            <!------>
            <li class="title"><i class="iconfont icon-xiaoxi"></i> 社交</li>
            <li><a rel="nofollow" href="https://www.zhihu.com/" target="_blank"><i class="iconfont icon-zhihu" style="color: #0084ff;"></i>知乎</a></li>
            <li><a rel="nofollow" href="https://www.gamersky.com/" target="_blank"><i class="iconfont icon-youminxingkong" style="color:#f03;"></i>游民星空</a></li>
            <li><a rel="nofollow" href="http://www.ltaaa.com/" target="_blank"><i class="iconfont icon-long" style="color:#0084ff;"></i>龙腾网</a></li>
            <!------>
            <li class="title"><i class="iconfont icon-shi-pin-xin-wen"></i> 视频媒体</li>
            <li><a rel="nofollow" href="https://www.youtube.com/" target="_blank"><i class="iconfont icon-yout" style="color:#f03;"></i>Youtube</a></li>
            <li><a rel="nofollow" href="http://www.zmz2019.com/" target="_blank"><i class="iconfont icon-zimu" style="color: #067;"></i>字幕组</a></li>
            <li><a rel="nofollow" href="http://www.acfun.cn/index.html" target="_blank"><i class="iconfont icon-acfun" style="color:#f33;"></i>ACFUN</a></li>
            <li><a rel="nofollow" href="https://www.bilibili.com/" target="_blank"><i class="iconfont icon-CN_bilibili" style="color:#09e;"></i>哔哩哔哩</a></li>
            <li><a rel="nofollow" href="/movies/" target="_blank"><i class="iconfont icon-yunbo" style="color:#0bf;"></i>影视搜索</a></li>
            <li><a rel="nofollow" href="https://music.yyv.me/" target="_blank"><i class="iconfont icon-wangyiyun" style="color:#f03;"></i>网易云音乐</a></li>
            <!------>
            <li class="title"><i class="iconfont icon-che"></i> 购物</li>
            <li><a rel="nofollow" href="https://www.taobao.com" target="_blank"><i class="iconfont icon-taobao" style="color: #ff6019;"></i>淘宝网</a></li>
            <li><a rel="nofollow" href="https://www.jd.com" target="_blank"><i class="iconfont icon-jingdong" style="color: #e33333;"></i>京东</a></li>
            <!------>
            <li class="title"><i class="iconfont icon-sheji"></i> 设计视觉</li>
            <li><a rel="nofollow" href="https://www.iconfont.cn/" target="_blank"><i class="iconfont icon-print" style="color: #ff6019;"></i>阿里图标</a></li>
            <!------>
            <li class="title"><i class="iconfont icon-tool"></i> 工具</li>
            <li><a rel="nofollow" href="https://fanyi.baidu.com/" target="_blank"><i class="iconfont icon-fanyi" style="color: #02f;"></i>百度翻译</a></li>
            <li><a rel="nofollow" href="https://pan.baidu.com" target="_blank"><i class="iconfont icon-baiduyun" style="color: #148bfe;"></i>百度网盘</a></li>
            <li><a rel="nofollow" href="https://ping.chinaz.com/" target="_blank"><i class="iconfont icon-pingup" style="color:#2361ad;"></i>站长Ping</a></li>
        </ul>
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
        <div class="foot">© 1996-<?php echo date("Y"); ?> by <a href="https://github.com/ShowMeBaby">ShowMeBaby</a> . All rights reserved.  <a rel="nofollow" href="https://github.com/ShowMeBaby" target="_blank" style="font-size: 12px;"><i class="iconfont icon-github"></i></a></div>
    </div>
     <!--<canvas class="fireworks" style="position:fixed;left:0;top:0;z-index:99999999;pointer-events:none;" /> -->
</body>
<!-- 实测这个动画效果,占用的CPU过多,需要硬性要求浏览器开启硬件加速,故暂时屏蔽 -->
 <!--<script src="anime.min.js" type="text/javascript" charset="utf-8"></script> -->
 <!--<script src="fireworks.js" type="text/javascript" charset="utf-8"></script> -->
</html>