<?php
# sk_SK translation for
# PHP-Calendar, DatePicker Calendar class: http://www.triconsole.com/php/calendar_datepicker.php
# Version: 3.61
# Language: Slovak / slovenčina
# Translator: trolo_vk <admin@ompnet.sk>
# Last file update: 24.09.2011

// Class strings localization
define("L_DAY", "Deň");
define("L_MONTH", "Mesiac");
define("L_YEAR", "Rok");
define("L_TODAY", "Dnes");
define("L_PREV", "Predchádzajúci"); 
define("L_NEXT", "Nasledujúci");
define("L_REF_CAL", "Obnoviť Kalendár...");
define("L_CHK_VAL", "Skontroluj hodnotu");
define("L_SEL_LANG", "Vyber jazyk");
define("L_SEL_ICON", "Vyber ikonu");
define("L_SEL_DATE", "Vyber dátum");
define("L_ERR_SEL", "Nesprávná voľba");
define("L_NOT_ALLOWED", "Toto dátum nie je povolené pre výber");
define("L_DATE_BEFORE", "Vyberte dátum pred %s");
define("L_DATE_AFTER", "Vyberte dátum po %s");
define("L_DATE_BETWEEN", "Vyberte dátum medzi\\n%s a %s");
define("L_WEEK_HDR", ""); // Optional Short Name for the column header showing the current Week number (W or CW in English - max 2 letters)
define("L_UNSET", "Zrušiť");

// Set the first day of the week in your language (0 for Sunday, 1 for Monday)
define("FIRST_DAY", "1");

// Months Long Names
define("L_JAN", "január");
define("L_FEB", "február");
define("L_MAR", "marec");
define("L_APR", "apríl");
define("L_MAY", "máj");
define("L_JUN", "jún");
define("L_JUL", "júl");
define("L_AUG", "august");
define("L_SEP", "september");
define("L_OCT", "október");
define("L_NOV", "november");
define("L_DEC", "december");
// Months Short Names
define("L_S_JAN", "01");
define("L_S_FEB", "02");
define("L_S_MAR", "03");
define("L_S_APR", "04");
define("L_S_MAY", "05");
define("L_S_JUN", "06");
define("L_S_JUL", "07");
define("L_S_AUG", "08");
define("L_S_SEP", "09");
define("L_S_OCT", "10");
define("L_S_NOV", "11");
define("L_S_DEC", "12");
// Week days Long Names
define("L_MON", "pondelok");
define("L_TUE", "utorok");
define("L_WED", "streda");
define("L_THU", "štvrtok");
define("L_FRI", "piatok");
define("L_SAT", "sobota");
define("L_SUN", "nedeľa");
// Week days Short Names
define("L_S_MON", "po");
define("L_S_TUE", "ut");
define("L_S_WED", "st");
define("L_S_THU", "št");
define("L_S_FRI", "pi");
define("L_S_SAT", "so");
define("L_S_SUN", "ne");

// Windows encoding
define("WIN_DEFAULT", "windows-1250");
define("L_CAL_FORMAT", "%d. %B %Y");
if(!defined("L_LANG") || L_LANG == "L_LANG") define("L_LANG", "sk_SK"); // en_US format of your language

// Set the SK specific date/time format
if (stristr(PHP_OS,"win")) {
setlocale(LC_ALL, "sk-SK.UTF-8", "sk-svk.UTF-8", "sk-svk", "Slovak.UTF-8", "Slovak");
} else {
setlocale(LC_ALL, "sk_SK.UTF-8", "sk.UTF-8", "svk.UTF-8", "sk_svk.UTF-8", "Slovak.UTF-8");
}
?>