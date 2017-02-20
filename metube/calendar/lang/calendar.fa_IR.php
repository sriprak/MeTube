<?php
# fa_IR translation for
# PHP-Calendar, DatePicker Calendar class: http://www.triconsole.com/php/calendar_datepicker.php
# Localized version of PHP-Calendar, DatePicker Calendar class: http://ciprianmp.com/scripts/calendar/
# Version: 3.68
# Language: Farsi (Persian) / فارسی // ex: Romanian (English name) / Română (Original name)
# Translator: sma mohseni <sma.mohseni@gmail.com>
# Last file update: 13.03.2012

define("RTL", 1); // uncomment only for right-to-left text (Arabic, Hebrew)

// Class strings localization
define("L_DAY", "روز");
define("L_MONTH", "ماه");
define("L_YEAR", "سال");
define("L_TODAY", "امروز");
define("L_PREV", "قبل");
define("L_NEXT", "بعد");
define("L_REF_CAL", "به روز رسانی تقویم");
define("L_CHK_VAL", "بررسی مقدار");
define("L_SEL_LANG", "انتخاب زبان");
define("L_SEL_ICON", "انتخاب آیکون");
define("L_SEL_DATE", "انتخاب تاریخ");
define("L_ERR_SEL", "انتخاب شما صحیح نمیباشد");
define("L_NOT_ALLOWED", "این تاریخ ، برای انتخاب فعال نیست");
define("L_DATE_BEFORE", "لطفا یک تاریخ قبل از %s انتخاب کنید");
define("L_DATE_AFTER", "لطفا یک تاریخ بعد از %s انتخاب کنید");
define("L_DATE_BETWEEN", "لطفا یک تاریخ بین\\n%s و %s انتخاب کنید");
define("L_WEEK_HDR", ""); // Optional Short Name for the column header showing the current Week number (W or CW in English - max 2 letters)
define("L_UNSET", "پاک کردن");

// Set the first day of the week in your language (0 for Sunday, 1 for Monday ... 6 for Saturday)
define("FIRST_DAY", "6");

// Months Long Names
define("L_JAN", "فروردین");
define("L_FEB", "اردیبهشت");
define("L_MAR", "خرداد");
define("L_APR", "تیر");
define("L_MAY", "مرداد");
define("L_JUN", "شهریور");
define("L_JUL", "مهر");
define("L_AUG", "آبان");
define("L_SEP", "آذر");
define("L_OCT", "دی");
define("L_NOV", "بهمن");
define("L_DEC", "اسفند");
// Months Short Names
define("L_S_JAN", "فروردین");
define("L_S_FEB", "اردیبهشت");
define("L_S_MAR", "خرداد");
define("L_S_APR", "تیر");
define("L_S_MAY", "مرداد");
define("L_S_JUN", "شهریور");
define("L_S_JUL", "مهر");
define("L_S_AUG", "آبان");
define("L_S_SEP", "آذز");
define("L_S_OCT", "دی");
define("L_S_NOV", "بهمن");
define("L_S_DEC", "اسفند");
// Week days Long Names
define("L_MON", "دوشنبه");
define("L_TUE", "سه شنبه");
define("L_WED", "چهار شنبه");
define("L_THU", "پنج شنبه");
define("L_FRI", "جمعه");
define("L_SAT", "شنبه");
define("L_SUN", "یک شنبه");
// Week days Short Names
define("L_S_MON", "د");
define("L_S_TUE", "س");
define("L_S_WED", "چ");
define("L_S_THU", "پ");
define("L_S_FRI", "ج");
define("L_S_SAT", "ش");
define("L_S_SUN", "ی");

// Display extratext beside years, months and/or days in dropdowns (eg. Korean and Japan)
#define("L_USE_YMD_DROP", 0);

// Windows encoding
define("WIN_DEFAULT", "utf-8");
define("L_CAL_FORMAT", "%Y %B %d");
if(!defined("L_LANG") || L_LANG == "L_LANG") define("L_LANG", "fa_IR"); // en_US format of your language

// Set the FA specific date/time format; ENGLISH EXAMPLE:
if (stristr(PHP_OS,"win")) {
setlocale(LC_ALL, "far.UTF-8", "Farsi.UTF-8", "Persian.UTF-8", "Farsi");
} else {
setlocale(LC_ALL, "fa_IR.UTF-8", "far.UTF-8", "per.UTF-8", "ira.UTF-8", "Farsi.UTF-8");
}
?>