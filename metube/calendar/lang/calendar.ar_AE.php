<?php
# ar_AE translation for
# PHP-Calendar, DatePicker Calendar class: http://www.triconsole.com/php/calendar_datepicker.php
# Version: 3.61
# Language: Arabic / العربية
# Translator: ... <...@....net> put your name and email if you correct this google translated file.
# Last file update: 01.09.2011

define("RTL", 1);

// Class strings localization
define("L_DAY", "يوم");
define("L_MONTH", "شهر");
define("L_YEAR", "عام");
define("L_TODAY", "اليوم");
define("L_PREV", "السابق");
define("L_NEXT", "التالي");
define("L_REF_CAL", "التقويم منعش...");
define("L_CHK_VAL", "تحقق من قيمة");
define("L_SEL_LANG", "اختر اللغة");
define("L_SEL_ICON", "اختر الرمز");
define("L_SEL_DATE", "حدد تاريخ");
define("L_ERR_SEL", "اختيارك غير صالحة");
define("L_NOT_ALLOWED", "لا يسمح هذا التاريخ ليتم تحديده");
define("L_DATE_BEFORE", "%s الرجاء اختيار تاريخ قبل");
define("L_DATE_AFTER", "بعد %s الرجاء اختيار تاريخ");
define("L_DATE_BETWEEN", "الرجاء اختيار التاريخ بين%2s و %1s ");
define("L_WEEK_HDR", ""); // Optional Short Name for the column header showing the current Week number (W or CW in English - max 2 letters)
define("L_UNSET", "تجبر");

// Set the first day of the week in your language (0 for Sunday, 1 for Monday ... 6 for Saturday)
define("FIRST_DAY", "6"); //6 Sabath

// Months Long Names
define("L_JAN", "كانون الثاني");
define("L_FEB", "شباط");
define("L_MAR", "آذار");
define("L_APR", "نيسان");
define("L_MAY", "مايو");
define("L_JUN", "حزيران");
define("L_JUL", "تموز");
define("L_AUG", "آب");
define("L_SEP", "أيلول");
define("L_OCT", "تشرين الأول");
define("L_NOV", "تشرين الثاني");
define("L_DEC", "كانون الأول");
// Months Short Names
define("L_S_JAN", "لثاني");
define("L_S_FEB", "شباط");
define("L_S_MAR", "آذار");
define("L_S_APR", "نيسان");
define("L_S_MAY", "مايو");
define("L_S_JUN", "حزيران");
define("L_S_JUL", "تموز");
define("L_S_AUG", "آب");
define("L_S_SEP", "أيلول");
define("L_S_OCT", "الأول");
define("L_S_NOV", "الثاني");
define("L_S_DEC", "الأول");
// Week days Long Names
define("L_MON", "الاثنين");
define("L_TUE", "الثلاثاء");
define("L_WED", "الأربعاء");
define("L_THU", "الخَمِيس");
define("L_FRI", "الجُمْعَة");
define("L_SAT", "السَّبْت");
define("L_SUN", "الأحد");
// Week days Short Names
define("L_S_MON", "ن");
define("L_S_TUE", "ث");
define("L_S_WED", "ع");
define("L_S_THU", "خ");
define("L_S_FRI", "ج");
define("L_S_SAT", "س");
define("L_S_SUN", "ح");

// Windows encoding
define("WIN_DEFAULT", "windows-1256");
define("L_CAL_FORMAT", "%d %B, %Y");
if(!defined("L_LANG") || L_LANG == "L_LANG") define("L_LANG", "ar_AE");

// Set the AR specific date/time format
if (stristr(PHP_OS,"win")) {
setlocale(LC_ALL, "ar.UTF-8", "ara-ara.UTF-8", "ar", "arabic.UTF-8", "arabic");
} else {
setlocale(LC_ALL, "ar_AE.UTF-8", "ara.UTF-8", "ar.UTF-8", "Arabic.UTF-8"); // For AR formats
}
?>