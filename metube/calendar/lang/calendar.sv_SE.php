<?php
# sv_SE translation for
# PHP-Calendar, DatePicker Calendar class: http://www.triconsole.com/php/calendar_datepicker.php
# Version: 3.61
# Language: Swedish / svenska
# Translator: Fimpen Högström <fimpen@relative-work.se>
# Last file update: 01.09.2011

// Class strings localization
define("L_DAY", "Dag");
define("L_MONTH", "Månad");
define("L_YEAR", "År");
define("L_TODAY", "I dag");
define("L_PREV", "Tidigare");
define("L_NEXT", "Nästa");
define("L_REF_CAL", "Uppdatera Kalendern...");
define("L_CHK_VAL", "Kolla värdet");
define("L_SEL_LANG", "Välj språk");
define("L_SEL_ICON", "Välj icon");
define("L_SEL_DATE", "Välj datum");
define("L_ERR_SEL", "Ditt val är inte giltig");
define("L_NOT_ALLOWED", "Detta datum är inte tillåtet att välja");
define("L_DATE_BEFORE", "Välj ett datum före %s");
define("L_DATE_AFTER", "Välj ett datum efter %s");
define("L_DATE_BETWEEN", "Välj ett datum mellan\\n%s och %s");
define("L_WEEK_HDR", ""); // Optional Short Name for the column header showing the current Week number (W or CW in English - max 2 letters)
define("L_UNSET", "Avbryt");

// Set the first day of the week in your language (0 for Sunday, 1 for Monday)
define("FIRST_DAY", "1");

// Months Long Names
define("L_JAN", "januari");
define("L_FEB", "februari");
define("L_MAR", "mars");
define("L_APR", "april");
define("L_MAY", "maj");
define("L_JUN", "juni");
define("L_JUL", "juli");
define("L_AUG", "augusti");
define("L_SEP", "september");
define("L_OCT", "oktober");
define("L_NOV", "november");
define("L_DEC", "december");
// Months Short Names
define("L_S_JAN", "jan");
define("L_S_FEB", "feb");
define("L_S_MAR", "mar");
define("L_S_APR", "apr");
define("L_S_MAY", "maj");
define("L_S_JUN", "jun");
define("L_S_JUL", "jul");
define("L_S_AUG", "aug");
define("L_S_SEP", "sep");
define("L_S_OCT", "okt");
define("L_S_NOV", "nov");
define("L_S_DEC", "dec");
// Week days Long Names
define("L_MON", "måndag");
define("L_TUE", "tisdag");
define("L_WED", "onsdag");
define("L_THU", "torsdag");
define("L_FRI", "fredag");
define("L_SAT", "lördag");
define("L_SUN", "söndag");
// Week days Short Names
define("L_S_MON", "må");
define("L_S_TUE", "ti");
define("L_S_WED", "on");
define("L_S_THU", "to");
define("L_S_FRI", "fr");
define("L_S_SAT", "lö");
define("L_S_SUN", "sö");

// Windows encoding
define("WIN_DEFAULT", "windows-1252");
define("L_CAL_FORMAT", "%d %B %Y");
if(!defined("L_LANG") || L_LANG == "L_LANG") define("L_LANG", "sv_SE");

// Set the SV specific date/time format
if (stristr(PHP_OS,"win")) {
setlocale(LC_ALL, "sve.UTF-8", "swedish.UTF-8", "swedish");
} else {
setlocale(LC_ALL, "sv_SE.UTF-8", "sv_SE.UTF-8@euro", "swedish.UTF-8", "sve.UTF-8", "sv.UTF-8", "sve_sve.UTF-8");
}
?>