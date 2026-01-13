/*
作者:showMeBaby
主页：https://retrcode.io/
github：https://github.com/5iux/sou
日期：2021-01-13
版权所有，请勿删除
*/


const doc = document;

function getEl(className, getAll) {
  if (getAll) {
    return doc.querySelectorAll(className);
  }
  return doc.querySelectorAll(className)[0];
}

function createTextSetter(selector) {
  const elem = getEl(selector);
  let text;
  return newText => {
    if (newText !== text) {
      text = newText;
      elem.textContent = newText;
      return true;
    }
    return false;
  };
};

function elAppend(className, htmlString) {
  getEl(className).insertAdjacentHTML('beforeend', htmlString);
}

function documentReady() {
  //判断窗口大小，添加输入框自动完成
  const body = doc.body;
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

  // 刷新底部日期进度表
  const timeMask = {
    year: getEl('#date>.mask#year>.p'),
    month: getEl('#date>.mask#month>.p'),
    d: getEl('#time>.mask#d>.p'),
    h: getEl('#time>.mask#h>.p'),
    m: getEl('#time>.mask#m>.p')
  };

  const setters = {
    time: createTextSetter('#time_div'),
    date: createTextSetter('#date_div')
  };

  const updateText = function() {
    const now = new Date();
    setters.date(now.getFullYear() + '.' + (now.getMonth() + 1).toFixed().padStart(2, '0') + '.' + now.getDate().toFixed()
      .padStart(2, '0'));
    let timeDiv;
    timeDiv = now.getHours().toFixed().padStart(2, '0');
    timeDiv += ':' + now.getMinutes().toFixed().padStart(2, '0') + ':'
    const second = now.getSeconds();
    if (setters.time(timeDiv + second.toFixed().padStart(2, '0'))) {
      const minAndSec = second + 60 * now.getMinutes();
      const day = (((now.getDate() - 1) * 86400 + minAndSec + (3600 * now.getHours())) / (new Date(now.getFullYear(),
        now.getMonth() + 1, 0).getDate() * 86400))
      timeMask.year.style.maxWidth = `${(now.getMonth() + day) / 0.12}%`;
      timeMask.month.style.maxWidth = `${day * 100}%`;
      timeMask.d.style.maxWidth = `${(minAndSec + 3600 * now.getHours()) / 864}%`;
      timeMask.h.style.maxWidth = `${minAndSec / 36}%`;
      timeMask.m.style.maxWidth = `${second / 0.6}%`;
    }
  };
  setInterval(updateText, 500);
  updateText();
};

if (doc.readyState !== 'loading') {
  documentReady();
} else {
  doc.addEventListener('DOMContentLoaded', documentReady);
}