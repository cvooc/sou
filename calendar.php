<?php
header('Content-type: image/svg+xml');
define("CALENDAR_TYPE", isset($_GET['type']) ? intval($_GET['type']) : 1);
define("CALENDAR_COLOR",  isset($_GET['color']) ? $_GET['color'] : 'red');
date_default_timezone_set(isset($_GET['timezone']) ? $_GET['timezone'] : "PRC");
$content = isset($_GET['content']) ? $_GET['content'] : '';
$date = strtotime(isset($_GET['date']) ? $_GET['date'] : date("Y/m/d H:i:s"));
$montharray = array('一月', '二月', '三月', '四月', '五月', '六月', '七月', '八月', '九月', '十月', '十一月', '十二月');
$weekarray = array("星期日", "星期一", "星期二", "星期三", "星期四", "星期五", "星期六");

$ymd = date("Y-m-d", $date);
$year = date("Y", $date);
$month = $montharray[date("m", $date) - 1];
$day = date("d", $date);
$monthday = date("m-d", $date);
$week = $weekarray[date("w", $date)];
$yearweek = intval(date("W", $date)) . '周';
$days = round((strtotime($ymd) - strtotime(date("Y-m-d"))) / 3600 / 24);
/**
 * 1: 默认
 * 2: 月日与星期
 * 3: 月日与年份
 * 4: 年份与月份
 * 5: 年份
 * 6: 倒数日
 * 7: 百分比
 * 8: 字母数字组合（1-5个字符）
 * 9: 汉字（1个字）
 * 10: 年份与当前周数
 * */
function fontSize($pos = 'top')
{
  $fontSize = '250px';
  if (CALENDAR_TYPE < 4) {
    switch ($pos) {
      case 'top':
        $fontSize = '100px';
        break;
      case 'middle':
        $fontSize = '256px';
        break;
      case 'bottom':
      default:
        $fontSize = '64px';
        break;
    }
  } elseif (CALENDAR_TYPE == 4) {
    switch ($pos) {
      case 'top':
        $fontSize = '120px';
        break;
      case 'middle':
        $fontSize = '180px';
        break;
      case 'bottom':
      default:
        $fontSize = '64px';
        break;
    }
  } elseif (CALENDAR_TYPE == 5) {
    $fontSize = '200px';
  } elseif (CALENDAR_TYPE == 6) {
    switch ($pos) {
      case 'top':
        $fontSize = '120px';
        break;
      case 'middle':
        $fontSize = '310px';
        break;
      case 'bottom':
      default:
        $fontSize = '64px';
        break;
    }
  } elseif (CALENDAR_TYPE == 10) {
    switch ($pos) {
      case 'top':
        $fontSize = '122px';
        break;
      case 'middle':
        $fontSize = '184px';
        break;
      case 'bottom':
      default:
        $fontSize = '64px';
        break;
    }
  }
  return $fontSize;
}
function tabbarColor()
{
  $colorarray = [
    'red'    => ["#cf5659", "#f3aab9"],
    'blue'   => ["#5aa9e6", "#3a79b6"],
    'yellow' => ["#dbad6a", "#ab7d3a"],
    'green'  => ["#5fbb97", "#2f8867"],
    'violet' => ["#E099FF", "#BE66CF"],
    'pink'   => ["#EA5D97", "#CA3D77"],
    'fuchsia' => ["#93627f", "#633241"],
    'grey'   => ["#565557", "#767577"]
  ];
  return $colorarray[CALENDAR_COLOR];
}
function fontFamily()
{
  return "-apple-system, BlinkMacSystemFont, 'Noto Sans', 'Noto Sans CJK SC', 'Microsoft YaHei', 微软雅黑, sans-serif, 'Segoe UI', Roboto, 'Helvetica Neue', Arial";
}
function echoMonth($str)
{
  echo '<text id="month" x="32" y="' . ((CALENDAR_TYPE == 4 || CALENDAR_TYPE == 10) ? '150' : '142') . '" fill="#fff" font-family="' . fontFamily() . '" font-size="' . fontSize('top') . '" style="text-anchor: left">' . $str . '</text>';
}
function echoDays($str)
{
  echo '<text id="days" x="256" y="457" fill="#66757F" fill-rule="nonzero" font-family="' . fontFamily() . '" font-size="310" font-weight="normal" style="text-anchor: middle">' . $str . '</text>';
}
function echoDay($str)
{
  echo '<text id="day" x="256" y="400" fill="#66757f" font-family="' . fontFamily() . '" font-size="' . fontSize('middle') . '" style="text-anchor: middle">' . $str . '</text>';
}
function echoWeekday($str)
{
  echo '<text id="weekday" x="256" y="480" fill="#66757f" font-family="' . fontFamily() . '" font-size="' . fontSize('bottom') . '" style="text-anchor: middle">' . $str . '</text>';
}
function echoYear($str)
{
  echo '<text id="year" fill="#FFFFFF" fill-rule="nonzero" font-family="' . fontFamily() . '" font-size="62" font-weight="normal">
            <tspan x="55" y="80">' . $str . '</tspan>
          </text>';
}
function echoMonthday($str)
{
  echo  '<text id="month-day" font-family="' . fontFamily() . '" font-size="77.5757576" font-weight="normal" fill="#FFFFFF">
            <tspan x="55" y="160">' . $str . '</tspan>
          </text>';
}
function echoContent($str)
{
  $contentFontSizes = ['300', '315', '267', '206', '190', '146'];
  $contentFontSizesIndex = strlen($str) <= 5 ? strlen($str) : 0;
  $contentFontSize = $contentFontSizes[$contentFontSizesIndex];
  // 默认汉字只显示单字,故按单字设置字体大小
  $contentFontSize = CALENDAR_TYPE == 9 ? '250.142857' : $contentFontSize;
  echo '<text id="0%" fill-rule="nonzero" mask="url(#mask-2)" font-family="' . (CALENDAR_TYPE != 9 ? 'SFMono-Regular, Consolas, Liberation Mono, Menlo, monospace,' : '') . fontFamily() . '" font-size="' . $contentFontSize . '" font-weight="400"  x="256" y="350" line-spacing="237" fill="#66757F" style="text-anchor: middle">
              ' . $str . (CALENDAR_TYPE == 7 ? '%' : '') . '</text>';
}
function echoDescOrDot($str)
{
  if (CALENDAR_TYPE == 7 || CALENDAR_TYPE == 8 || CALENDAR_TYPE == 9) {
    // todo
  } elseif (CALENDAR_TYPE == 6) {
    echo '<text id="desc" font-family="' . fontFamily() . '" font-size="62.0606061" font-weight="normal" fill="#FFFFFF">
              <tspan x="333.575758" y="153.090909">' . ($str > 0 ? "还有" : "已过") . '</tspan>
            </text>';
  } else {
    echo "<g fill='" . tabbarColor()[1] . "'>
              <circle cx='462' cy='136' r='14'/>
              <circle cx='462' cy='94' r='14'/>
              <circle cx='419' cy='136' r='14'/>
              <circle cx='419' cy='94' r='14'/>
              <circle cx='376' cy='136' r='14'/>
              <circle cx='376' cy='94' r='14'/>
            </g>";
  }
}

function echoTabbar()
{
  if (CALENDAR_TYPE < 7 || CALENDAR_TYPE == 10) {
    echo '<path fill="#efefef" d="M510,540H30c-16.6,0-30-13.4-30-30V30C0,13.4,13.4,0,30,0h480c16.6,0,30,13.4,30,30v480 C540,526.6,526.6,540,510,540z"/>';
    echo '<path fill="' . tabbarColor()[0] . '" d="M510.5,0h-49.6H29.5C13.7,0,0,13.7,0,29.5V195h540V29.5C540,13.7,526.3,0,510.5,0z"/>';
  } else {
    echo '<path fill="#efefef" d="M510,540H30c-16.6,0-30-13.4-30-30V30C0,13.4,13.4,0,30,0h480c16.6,0,30,13.4,30,30v480 C540,526.6,526.6,540,510,540z"/>';
    echo '<path fill="' . tabbarColor()[0] . '" d="M510.5,0h-49.6H29.5C13.7,0,0,12.7,0,27.3V80h540V27.3C540,12.7,526.3,0,510.5,0z"/>';
  }
}
?>
<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-label="Calendar" role="img" viewBox="0 0 540 540" width="100%" height="100%" style="cursor: default">
  <?php
  echoTabbar();
  echoDescOrDot($days);
  if (CALENDAR_TYPE == 1 || CALENDAR_TYPE == 2) {
    echoMonth($month);
    echoDay($day);
    echoWeekday($week);
  } elseif (CALENDAR_TYPE == 3) {
    echoMonth($month);
    echoDay($day);
    echoWeekday($year);
  } elseif (CALENDAR_TYPE == 4) {
    echoMonth($year);
    echoDay($month);
  } elseif (CALENDAR_TYPE == 5) {
    echoDay($year);
  } elseif (CALENDAR_TYPE == 6) {
    echoDays($days);
    echoYear($year);
    echoMonthday($monthday);
  } elseif (CALENDAR_TYPE == 7) {
    echoContent($content);
  } elseif (CALENDAR_TYPE == 8) {
    echoContent($content);
  } elseif (CALENDAR_TYPE == 9) {
    echoContent($content);
  } elseif (CALENDAR_TYPE == 10) {
    echoMonth($year);
    echoDay($yearweek);
  }
  ?>
</svg>