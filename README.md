# 简单搜索微体积版🤪

这是基于[5iux/sou](https://github.com/5iux/sou)的fork改写,剔除掉了jquery使用原生js重写了sou.js,并对天气背景图做了极限压缩处理(~~以适配我的小水管~~).

虽然图片质量大幅缩水,但平均图片提交缩小了十倍以上,对于不常用到的天气模块来说我认为是值得的.

本版本加载全部资源后整页体积可以控制在100kb以内,若你还想继续精简可以删除掉天气背景,将整页体积降低至50kb的水平.

相对于源镜像800kb左右的体积,可以更快的加载完成,毕竟是导航页当然是要飒的一下加载完成才好嘛~🤪

###  示例效果

![简单搜索微体积版](https://gitee.com/retrocode/picture_bed/raw/master/image/image-20210113200028717.png)

> （图片效果，以实际页面为准） 

## 下载地址：  

[Releases](https://github.com/ShowMeBaby/sou/releases)  

## 示例页面：    

[https://search.supermario.vip/](https://search.supermario.vip/)  

## 组件：  

### 图标：
图标调用了阿里的图标`https://www.iconfont.cn/`，提供下本地包[点击下载](https://cdn.jsdelivr.net/gh/5iux/sou/icon.zip)  
嫌麻烦的可以使用js版本示例里面的`font-awesome`  

### 天气组件  

[天气API地址](https://dev.qweather.com/widget/)

## 其他

我这个只是个示例，有需求还是自己改，不喜欢php想换成js也可以；以前自己试过反代，还是小范围用的，没两天弄死一个好域名，不敢了，上谷歌大家还是自备梯子吧，这里不提供了。  

关于百度搜索出来百家号的问题大家可以搜一下油猴脚本，或者在关键词后面加入`-baijiahao`参数。