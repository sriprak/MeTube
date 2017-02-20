<?php
# zh_CN translation for
# PHP-Calendar, DatePicker Calendar class: http://www.triconsole.com/php/calendar_datepicker.php
# Localized version of PHP-Calendar, DatePicker Calendar class: http://ciprianmp.com/scripts/calendar/
# Version: 3.68
# Language: Chinese Simplified / 简体中文 // ex: Romanian (English name) / Română (Original name)
# Translator: Ciprian <ciprianmp@yahoo.com>
# Last file update: 27.04.2012

// Class strings localization
define("L_DAY", "日");
define("L_MONTH", "月");
define("L_YEAR", "年");
define("L_TODAY", "今天");
define("L_PREV", "上月");
define("L_NEXT", "下月");
define("L_REF_CAL", "更新日历...");
define("L_CHK_VAL", "检查值");
define("L_SEL_LANG", "语言选择");
define("L_SEL_ICON", "选择图标");
define("L_SEL_DATE", "选择日期");
define("L_ERR_SEL", "你的选择是不正确");
define("L_NOT_ALLOWED", "此日期是不允许被选中");
define("L_DATE_BEFORE", "请选择日期%s之前一个");
define("L_DATE_AFTER", "请选择%s以后的日期");
define("L_DATE_BETWEEN", "请选择日期%s和%s之间");
define("L_WEEK_HDR", ""); // Optional Short Name for the column header showing the current Week number (W or CW in English - max 2 letters)
define("L_UNSET", "取消");

// Set the first day of the week in your language (0 for Sunday, 1 for Monday)
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
define("L_S_JAN", "一");
define("L_S_FEB", "二");
define("L_S_MAR", "三");
define("L_S_APR", "四");
define("L_S_MAY", "五");
define("L_S_JUN", "六");
define("L_S_JUL", "七");
define("L_S_AUG", "八");
define("L_S_SEP", "九");
define("L_S_OCT", "十");
define("L_S_NOV", "十一");
define("L_S_DEC", "十二");
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
if(!defined("L_LANG") || L_LANG == "L_LANG") define("L_LANG", "zh_CN"); // en_US format of your language

// Set the ZH specific date/time format
if (stristr(PHP_OS,"win")) {
setlocale(LC_ALL, "zh-cn.UTF-8", "Chinese.UTF-8", "zh-cn", "Chinese_China");
} else {
setlocale(LC_ALL, "zh_CN.UTF-8", "Chinese.UTF-8");
}
?>