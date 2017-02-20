<?php
# th_TH translation for
# PHP-Calendar, DatePicker Calendar class: http://www.triconsole.com/php/calendar_datepicker.php
# Version: 3.61
# Language: Thai / ภาษาไทย
# Translator: 
# Last file update: 01.09.2011
// Thailand mainly uses the Buddhist Era which is 543 years ahead of the Gregorian year. 1 January 2549 BE (AD 2006) 

// Class strings localization
define("L_DAY", "วัน");
define("L_MONTH", "เดือน");
define("L_YEAR", "ปี");
define("L_TODAY", "วันนี้");
define("L_PREV", "ย้อน");
define("L_NEXT", "ถัดไป");
define("L_REF_CAL", "ปฏิทินกิจกรรมรีเฟรช ...");
define("L_CHK_VAL", "ตรวจสอบค่า");
define("L_SEL_LANG", "เลือกภาษา");
define("L_SEL_ICON", "เลือกไอคอน");
define("L_SEL_DATE", "เลือกวันที่");
define("L_ERR_SEL", "การเลือกของคุณไม่ถูกต้อง");
define("L_NOT_ALLOWED", "วันนี้ไม่ได้รับอนุญาตให้มีการเลือก");
define("L_DATE_BEFORE", "กรุณาเลือกวันที่ก่อน %s");
define("L_DATE_AFTER", "กรุณาเลือกวันหลังจาก %s");
define("L_DATE_BETWEEN", "กรุณาเลือกวันที่ระหว่าง\\n%s และ %s");
define("L_WEEK_HDR", ""); // Optional Short Name for the column header showing the current Week number (W or CW in English - max 2 letters)
define("L_UNSET", "ยกเลิก");

// Set the first day of the week in your language (0 for Sunday, 1 for Monday)
define("FIRST_DAY", "1");

// Months Long Names
define("L_JAN", "มกราคม");
define("L_FEB", "กุมภาพันธ์");
define("L_MAR", "มีนาคม");
define("L_APR", "เมษายน");
define("L_MAY", "พฤษภาคม");
define("L_JUN", "มิถุนายน");
define("L_JUL", "กรกฏาคม");
define("L_AUG", "สิงหาคม");
define("L_SEP", "กันยายน");
define("L_OCT", "ตุลาคม");
define("L_NOV", "พฤศจิกายน");
define("L_DEC", "ธันวาคม");
// Months Short Names
define("L_S_JAN", "ม.ค.");
define("L_S_FEB", "ก.พ.");
define("L_S_MAR", "มี.ค.");
define("L_S_APR", "เม.ย.");
define("L_S_MAY", "พ.ค.");
define("L_S_JUN", "มิ.ย.");
define("L_S_JUL", "ก.ค.");
define("L_S_AUG", "ส.ค.");
define("L_S_SEP", "ก.ย.");
define("L_S_OCT", "ต.ค.");
define("L_S_NOV", "พ.ย.");
define("L_S_DEC", "ธ.ค.");
// Week days Long Names
define("L_MON", "จันทร์");
define("L_TUE", "อังคาร");
define("L_WED", "พุธ");
define("L_THU", "พฤหัสบดี");
define("L_FRI", "ศุกร์");
define("L_SAT", "เสาร์");
define("L_SUN", "อาทิตย์");
// Week days Short Names
define("L_S_MON", "จ");
define("L_S_TUE", "อ");
define("L_S_WED", "พ");
define("L_S_THU", "พฤ");
define("L_S_FRI", "ศ");
define("L_S_SAT", "ส");
define("L_S_SUN", "อา");

// Windows encoding
define("WIN_DEFAULT", "windows-874");
define("L_CAL_FORMAT", "%d %B %Y");
if(!defined("L_LANG") || L_LANG == "L_LANG") define("L_LANG", "th_TH"); // en_US format of your language

// Set the RU specific date/time format
if (stristr(PHP_OS,"win")) {
setlocale(LC_ALL, "tha-tha.UTF-8", "tha-tha", "Thai.UTF-8", "Thai");
} else {
setlocale(LC_ALL, "th_TH.UTF-8", "tha.UTF-8", "tha_tha.UTF-8", "Thai.UTF-8");
}
?>