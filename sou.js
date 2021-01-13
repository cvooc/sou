/*
作者:showMeBaby
主页：https://retrcode.io/
github：https://github.com/5iux/sou
日期：2021-01-13
版权所有，请勿删除
*/
function getEl(className, getAll) {
  if (getAll) {
    return document.querySelectorAll(className);
  }
  return document.querySelectorAll(className)[0];
}

function elAppend(className, htmlString) {
  getEl(className).insertAdjacentHTML('beforeend', htmlString);
}

function documentReady() {
  //判断窗口大小，添加输入框自动完成
  const body = document.body;
  const wid = Math.max(body.clientWidth, body.offsetWidth, body.scrollWidth);
  if (wid < 640) {
    getEl(".wd").setAttribute("autocomplete", "off");
  } else {
    getEl(".wd").focus();
  }
  //按钮
  getEl(".sou li", true).forEach(o => o.addEventListener('click', event => {
    var dt = event.target.getAttribute("data-s");
    var wd = getEl(".wd").value;
    if (dt == "google") {
      if (wd == "" || wd == null) {
        window.location.href = "https://www.google.com/?hl=zh";
      } else {
        getEl(".t").value = "g";
        getEl("form").submit();
      }
    } else {
      if (wd == "" || wd == null) {
        window.location.href = "https://www.baidu.com/?tn=simple";
      } else {
        getEl(".t").value = "b";
        getEl("form").submit();
      }
    }
  }));
  //菜单点击
  getEl("#menu").addEventListener('click', event => {
    event.target.classList.toggle("on");
    getEl(".list").classList.toggle("closed");
    getEl(".mywth").classList.toggle("hidden");
  });
  getEl("#content").addEventListener('click', event => {
    try {
      getEl(".on").classList.remove("on");
    } catch (e) { /* 有可能菜单没有打开,直接忽略即可 */ }
    getEl(".list").classList.add("closed");
    getEl(".mywth").classList.remove("hidden");
  });
  getEl(".mywth").addEventListener('click', event => {
    const body = document.body;
    const wt = Math.max(body.clientWidth, body.offsetWidth, body.scrollWidth);
    if (wt <= 750) {
      //window.location.href = "https://tianqi.qq.com/";
      window.location.href = "https://apip.weatherdt.com/h5.html?id=pjICbzAo4C";
    }
  });
};

if (document.readyState !== 'loading') {
  documentReady();
} else {
  document.addEventListener('DOMContentLoaded', documentReady);
}
/*天气插件开始
天气插件api请在wea目录中index.php修改
申请地址：和风天气-https://dev.heweather.com/
*/
fetch('/wea/').then(response => response.json()).then(res => {
  //判断夜晚
  var now = new Date();
  var hour = now.getHours();
  myday = hour < 18 ? 'd' : 'n';
  //天气
  elAppend('.mywth', res.HeWeather6[0].basic.location + ' <img class="wea" src="../wea/icon/' + res.HeWeather6[0].now
    .cond_code + myday + '.png"> ' + res.HeWeather6[0].now.cond_txt + " " + res.HeWeather6[0].now.tmp + "℃ " +
    res.HeWeather6[0].now.wind_dir)
  getEl(".wea_hover").style.backgroundImage = "url(../wea/icon/bg/" + res.HeWeather6[0].now.cond_code + myday +
    ".png)";
  //今日天气
  elAppend(".wea_top",
    '<span class="city"><b>' +
    res.HeWeather6[0].basic.location +
    "</b> " +
    res.HeWeather6[0].update.loc +
    ' 更新</span><span class="img" style="background:url(../wea/icon/' +
    res.HeWeather6[0].now.cond_code +
    myday +
    '.png) no-repeat center/contain;"></span> <span class="tem"><b>' +
    res.HeWeather6[0].now.tmp +
    "℃</b>" +
    res.HeWeather6[0].now.cond_txt +
    '</span><span class="air">紫外线指数：' +
    res.HeWeather6[0].lifestyle[5].brf +
    "<br>相对湿度：" +
    res.HeWeather6[0].now.hum +
    "%<br>" +
    res.HeWeather6[0].now.wind_dir +
    "：" +
    res.HeWeather6[0].now.wind_sc +
    '级</span><span class="air_tips">' +
    res.HeWeather6[0].lifestyle[3].txt +
    "</span>"
  );
  //今日指数
  elAppend(".wea_con ul", "<li>舒适度指数<br><b>" + res.HeWeather6[0].lifestyle[0].brf + "</b></li>");
  elAppend(".wea_con ul", "<li>穿衣指数<br><b>" + res.HeWeather6[0].lifestyle[1].brf + "</b></li>");
  elAppend(".wea_con ul", "<li>感冒指数<br><b>" + res.HeWeather6[0].lifestyle[2].brf + "</b></li>");
  elAppend(".wea_con ul", "<li>运动指数<br><b>" + res.HeWeather6[0].lifestyle[3].brf + "</b></li>");
  elAppend(".wea_con ul", "<li>旅游指数<br><b>" + res.HeWeather6[0].lifestyle[4].brf + "</b></li>");
  elAppend(".wea_con ul", "<li>紫外线指数<br><b>" + res.HeWeather6[0].lifestyle[5].brf + "</b></li>");
  elAppend(".wea_con ul", "<li>洗车指数<br><b>" + res.HeWeather6[0].lifestyle[6].brf + "</b></li>");
  elAppend(".wea_con ul", "<li>空气指数<br><b>" + res.HeWeather6[0].lifestyle[7].brf + "</b></li>");
  //未来3天天气
  elAppend(".wea_foot ul",
    "<li>" +
    res.HeWeather6[0].daily_forecast[0].date +
    '<br><img src="../wea/icon/' +
    res.HeWeather6[0].daily_forecast[0].cond_code_d +
    myday +
    '.png"><br><b>' +
    res.HeWeather6[0].daily_forecast[0].cond_txt_d +
    "</b><br><i>" +
    res.HeWeather6[0].daily_forecast[0].tmp_min +
    "°/" +
    res.HeWeather6[0].daily_forecast[0].tmp_max +
    "°" +
    "</i></li>"
  );

  elAppend(".wea_foot ul",
    "<li>" +
    res.HeWeather6[0].daily_forecast[1].date +
    '<br><img src="../wea/icon/' +
    res.HeWeather6[0].daily_forecast[1].cond_code_d +
    myday +
    '.png"><br><b>' +
    res.HeWeather6[0].daily_forecast[1].cond_txt_d +
    "</b><br><i>" +
    res.HeWeather6[0].daily_forecast[1].tmp_min +
    "°/" +
    res.HeWeather6[0].daily_forecast[1].tmp_max +
    "°" +
    "</i></li>"
  );

  elAppend(".wea_foot ul",
    "<li>" +
    res.HeWeather6[0].daily_forecast[2].date +
    '<br><img src="../wea/icon/' +
    res.HeWeather6[0].daily_forecast[2].cond_code_d +
    myday +
    '.png"><br><b>' +
    res.HeWeather6[0].daily_forecast[2].cond_txt_d +
    "</b><br><i>" +
    res.HeWeather6[0].daily_forecast[2].tmp_min +
    "°/" +
    res.HeWeather6[0].daily_forecast[2].tmp_max +
    "°" +
    "</i></li>"
  );
}).catch(e => console.error("Oops, error", e))
/*天气插件结束*/
