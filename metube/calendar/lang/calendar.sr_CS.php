<?php
# sr_CS translation for
# PHP-Calendar, DatePicker Calendar class: http://www.triconsole.com/php/calendar_datepicker.php
# Version: 3.61
# Language: Serbian Latin / srpski
# Translator: Vedran Vučić <vedran.vucic@gnulinuxcentar.org>
# Last file update: 01.09.2011

// Class strings localization
define("L_DAY", "Dan");
define("L_MONTH", "Mesec");
define("L_YEAR", "Godina");
define("L_TODAY", "Danas");
define("L_PREV", "Prethodni");
define("L_NEXT", "Sledeći");
define("L_REF_CAL", "Ponovo učitavam Kalendar...");
define("L_CHK_VAL", "Proveri vrednost");
define("L_SEL_LANG", "Odaberi jezik");
define("L_SEL_ICON", "Odaberi sliku");
define("L_SEL_DATE", "Odaberi datum");
define("L_ERR_SEL", "Vaš izbor nije ispravan");
define("L_NOT_ALLOWED", "Ovaj datum nemože biti odabran");
define("L_DATE_BEFORE", "Odaberite prethodni datum %s");
define("L_DATE_AFTER", "Odaberite datum nakon %s");
define("L_DATE_BETWEEN", "Odaberite datum izmedju\\n%s i %s");
define("L_WEEK_HDR", ""); // Optional Short Name for the column header showing the current Week number (W or CW in English - max 2 letters)
define("L_UNSET", "Poništi"); //Vrati na prethodno

// Set the first day of the week in your language (0 for Sunday, 1 for Monday)
define("FIRST_DAY", "1");

// Months Long Names
define("L_JAN", "januar");
define("L_FEB", "februar");
define("L_MAR", "mart");
define("L_APR", "april");
define("L_MAY", "maj");
define("L_JUN", "jun");
define("L_JUL", "jul");
define("L_AUG", "avgust");
define("L_SEP", "septembar");
define("L_OCT", "oktobar");
define("L_NOV", "novembar");
define("L_DEC", "decembar");
// Months Short Names
define("L_S_JAN", "jan");
define("L_S_FEB", "feb");
define("L_S_MAR", "mar");
define("L_S_APR", "apr");
define("L_S_MAY", "maj");
define("L_S_JUN", "jun");
define("L_S_JUL", "jul");
define("L_S_AUG", "avg");
define("L_S_SEP", "sep");
define("L_S_OCT", "okt");
define("L_S_NOV", "nov");
define("L_S_DEC", "dec");
// Week days Long Names
define("L_MON", "ponedeljak");
define("L_TUE", "utorak");
define("L_WED", "srijeda");
define("L_THU", "četvrtak");
define("L_FRI", "petak");
define("L_SAT", "subota");
define("L_SUN", "nedelja");
// Week days Short Names
define("L_S_MON", "pon");
define("L_S_TUE", "uto");
define("L_S_WED", "sri");
define("L_S_THU", "čet");
define("L_S_FRI", "pet");
define("L_S_SAT", "sub");
define("L_S_SUN", "ned");

// Windows encoding
define("WIN_DEFAULT", "windows-1250");
define("L_CAL_FORMAT", "%d. %B %Y");
if(!defined("L_LANG") || L_LANG == "L_LANG") define("L_LANG", "sr_CS");

// Set the SR specific date/time format
if (stristr(PHP_OS,"win")) {
setlocale(LC_ALL, "serbian (latin).UTF-8", "serbian (latin)");
} else {
setlocale(LC_ALL, "sr_RS@latin", "sr_CS.UTF-8", "srl.UTF-8", "srp_srp.UTF-8", "sr.UTF-8", "serbian.UTF-8"); // For SR formats
}
?>