<?php
# cs_CZ translation for
# PHP-Calendar, DatePicker Calendar class: http://www.triconsole.com/php/calendar_datepicker.php
# Version: 3.61
# Language: Czech / čeština
# Translator: Chenzee <chenzee@email.cz>
# Last file update: 01.09.2011

// Class strings localization
define("L_DAY", "Den");
define("L_MONTH", "Měsíc");
define("L_YEAR", "Rok");
define("L_TODAY", "Dnes");
define("L_PREV", "Předchozí"); 
define("L_NEXT", "Následující");
define("L_REF_CAL", "Obnovit Kalendář...");
define("L_CHK_VAL", "Zkontroluj hodnotu");
define("L_SEL_LANG", "Vyber jazyk");
define("L_SEL_ICON", "Vyber ikonu");
define("L_SEL_DATE", "Vyber datum");
define("L_ERR_SEL", "Nesprávná volba");
define("L_NOT_ALLOWED", "Toto datum není povolené pro výběr");
define("L_DATE_BEFORE", "Vyberte datum před %s");
define("L_DATE_AFTER", "Vyberte datum po %s");
define("L_DATE_BETWEEN", "Vyberte datum mezi\\n%s a %s");
define("L_WEEK_HDR", ""); // Optional Short Name for the column header showing the current Week number (W or CW in English - max 2 letters)
define("L_UNSET", "Zrušit");

// Set the first day of the week in your language (0 for Sunday, 1 for Monday)
define("FIRST_DAY", "1");

// Months Long Names
define("L_JAN", "leden");
define("L_FEB", "únor");
define("L_MAR", "březen");
define("L_APR", "duben");
define("L_MAY", "květen");
define("L_JUN", "červen");
define("L_JUL", "červenec");
define("L_AUG", "srpen");
define("L_SEP", "září");
define("L_OCT", "říjen");
define("L_NOV", "listopad");
define("L_DEC", "prosinec");
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
define("L_MON", "pondělí");
define("L_TUE", "úterý");
define("L_WED", "středa");
define("L_THU", "čtvrtek");
define("L_FRI", "pátek");
define("L_SAT", "sobota");
define("L_SUN", "neděle");
// Week days Short Names
define("L_S_MON", "po");
define("L_S_TUE", "út");
define("L_S_WED", "st");
define("L_S_THU", "čt");
define("L_S_FRI", "pá");
define("L_S_SAT", "so");
define("L_S_SUN", "ne");

// Windows encoding
define("WIN_DEFAULT", "windows-1250");
define("L_CAL_FORMAT", "%d. %B %Y");
if(!defined("L_LANG") || L_LANG == "L_LANG") define("L_LANG", "cs_CZ"); // en_US format of your language

// Set the CS specific date/time format
if (stristr(PHP_OS,"win")) {
setlocale(LC_ALL, "cs-CZ.UTF-8", "ces-cze.UTF-8", "ces-cze", "Czech.UTF-8", "Czech");
} else {
setlocale(LC_ALL, "cs_CZ.UTF-8", "ces.UTF-8", "cze.UTF-8", "ces_cze.UTF-8", "Czech.UTF-8");
}
?>