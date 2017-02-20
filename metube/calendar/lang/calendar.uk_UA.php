<?php
# uk_UA translation for
# PHP-Calendar, DatePicker Calendar class: http://www.triconsole.com/php/calendar_datepicker.php
# Version: 3.61
# Language: Ukrainian / Українське
# Translator:
# Last file update: 01.09.2011

// Class strings localization
define("L_DAY", "День");
define("L_MONTH", "Місяць");
define("L_YEAR", "Рік");
define("L_TODAY", "Cьогодні");
define("L_PREV", "Попередня");
define("L_NEXT", "Наступна");
define("L_REF_CAL", "Освіжаючий календар...");
define("L_CHK_VAL", "Перевірте значення");
define("L_SEL_LANG", "Виберіть мову");
define("L_SEL_ICON", "Виберіть значок");
define("L_SEL_DATE", "Виберіть дату");
define("L_ERR_SEL", "Ваш вибір не дійсні");
define("L_NOT_ALLOWED", "Ця дата не може бути обраний");
define("L_DATE_BEFORE", "Будь ласка, оберіть дату до %s");
define("L_DATE_AFTER", "Будь ласка, оберіть дату, після %s");
define("L_DATE_BETWEEN", "Будь ласка, оберіть дату між\\n%s та %s");
define("L_WEEK_HDR", ""); // Optional Short Name for the column header showing the current Week number (W or CW in English - max 2 letters)
define("L_UNSET", "Скасувати");

// Set the first day of the week in your language (0 for Sunday, 1 for Monday)
define("FIRST_DAY", "1");

// Months Long Names
define("L_JAN", "Січень");
define("L_FEB", "Лютий");
define("L_MAR", "Березень");
define("L_APR", "Квітень");
define("L_MAY", "Травень");
define("L_JUN", "Червень");
define("L_JUL", "Липень");
define("L_AUG", "Серпень");
define("L_SEP", "Вересень");
define("L_OCT", "Жовтень");
define("L_NOV", "Листопад");
define("L_DEC", "Грудень");
// Months Short Names
define("L_S_JAN", "Січ.");
define("L_S_FEB", "Лют.");
define("L_S_MAR", "Бер.");
define("L_S_APR", "Квіт.");
define("L_S_MAY", "Трав.");
define("L_S_JUN", "Чер.");
define("L_S_JUL", "Лип.");
define("L_S_AUG", "Серп.");
define("L_S_SEP", "Вер.");
define("L_S_OCT", "Жовт.");
define("L_S_NOV", "Лист.");
define("L_S_DEC", "Груд.");
// Week days Long Names
define("L_MON", "Понеділок");
define("L_TUE", "Вівторок");
define("L_WED", "Середа");
define("L_THU", "Четвер");
define("L_FRI", "П'ятниця");
define("L_SAT", "Субота");
define("L_SUN", "Неділя");
// Week days Short Names
define("L_S_MON", "Пн");
define("L_S_TUE", "Вт");
define("L_S_WED", "Ср");
define("L_S_THU", "Чт");
define("L_S_FRI", "Пт");
define("L_S_SAT", "Сб");
define("L_S_SUN", "Нд");

// Windows encoding
define("WIN_DEFAULT", "windows-1251");
define("L_CAL_FORMAT", "%d %B %Y");
if(!defined("L_LANG") || L_LANG == "L_LANG") define("L_LANG", "uk_UA"); // en_US format of your language

// Set the RU specific date/time format
if (stristr(PHP_OS,"win")) {
setlocale(LC_ALL, "ukr-ukr.UTF-8", "ukr-ukr", "Ukrainian.UTF-8", "Ukrainian");
} else {
setlocale(LC_ALL, "uk_UA.UTF-8", "ukr.UTF-8", "ukr_ukr.UTF-8", "Ukrainian.UTF-8");
}
?>