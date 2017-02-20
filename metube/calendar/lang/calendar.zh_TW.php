<?php
# zh_TW translation for
# PHP-Calendar, DatePicker Calendar class: http://www.triconsole.com/php/calendar_datepicker.php
# Localized version of PHP-Calendar, DatePicker Calendar class: http://ciprianmp.com/scripts/calendar/
# Version: 3.68
# Language: Chinese Traditional / 繁體中文 // ex: Romanian (English name) / Română (Original name)
# Translator: clouds_music <clouds.music@gmail.com>
# Last file update: 27.04.2012

# define("RTL", 1); // uncomment only for right-to-left text (Arabic, Hebrew)

// Class strings localization
define("L_DAY", "日");
define("L_MONTH", "月");
define("L_YEAR", "年");
define("L_TODAY", "今天");
define("L_PREV", "上月");
define("L_NEXT", "下月");
define("L_REF_CAL", "更新日曆...");
define("L_CHK_VAL", "檢查值");
define("L_SEL_LANG", "語言選擇");
define("L_SEL_ICON", "選擇圖標");
define("L_SEL_DATE", "選擇日期");
define("L_ERR_SEL", "你的選擇是不正確");
define("L_NOT_ALLOWED", "此日期是不允許被選中");
define("L_DATE_BEFORE", "請選擇日期%s之前一個");
define("L_DATE_AFTER", "請選擇%s以後的日期");
define("L_DATE_BETWEEN", "請選擇日期%s和%s之間");
define("L_WEEK_HDR", ""); // Optional Short Name for the column header showing the current Week number (W or CW in English - max 2 letters)
define("L_UNSET", "取消");

// Set the first day of the week in your language (0 for Sunday, 1 for Monday ... 6 for Saturday)
define("FIRST_DAY", "1");

// Months Long Names
define("L_JAN", "一月");
define("L_FEB", "二月");
define("L_MAR", "三月");
define("L_APR", "四月");
define("L_MAY", "五月");
define("L_JUN", "六月");
define("L_JUL", "七月");
define("L_AUG", "八月");
define("L_SEP", "九月");
define("L_OCT", "十月");
define("L_NOV", "十一月");
define("L_DEC", "十二月");
// Months Short Names
define("L_S_JAN", "1月");
define("L_S_FEB", "2月");
define("L_S_MAR", "3月");
define("L_S_APR", "4月");
define("L_S_MAY", "5月");
define("L_S_JUN", "6月");
define("L_S_JUL", "7月");
define("L_S_AUG", "8月");
define("L_S_SEP", "9月");
define("L_S_OCT", "10月");
define("L_S_NOV", "11月");
define("L_S_DEC", "12月");
// Week days Long Names
define("L_MON", "星期一");
define("L_TUE", "星期二");
define("L_WED", "星期三");
define("L_THU", "星期四");
define("L_FRI", "星期五");
define("L_SAT", "星期六");
define("L_SUN", "星期日");
// Week days Short Names
define("L_S_MON", "一");
define("L_S_TUE", "二");
define("L_S_WED", "三");
define("L_S_THU", "四");
define("L_S_FRI", "五");
define("L_S_SAT", "六");
define("L_S_SUN", "日");

// Display extratext beside years, months and/or days in dropdowns (eg. Korean and Japan)
define("L_USE_YMD_DROP", 1);

// Windows encoding
define("WIN_DEFAULT", "utf-8");
define("L_CAL_FORMAT", "%Y年%B%d日");
if(!defined("L_LANG") || L_LANG == "L_LANG") define("L_LANG", "zh_TW"); // en_US format of your language

// Set the ZH specific date/time format
if (stristr(PHP_OS,"win")) {
setlocale(LC_ALL, "zh-tw.UTF-8", "Chinese.UTF-8", "zh-tw", "Chinese_Taiwan");
} else {
setlocale(LC_ALL, "zh_TW.UTF-8", "Chinese.UTF-8");
}
?>