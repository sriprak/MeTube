<?php
# de_DE translation for
# PHP-Calendar, DatePicker Calendar class: http://www.triconsole.com/php/calendar_datepicker.php
# Version: 3.61
# Language: German / Deutsch
# Translator: Thomas Pschernig <tpsde1970@aol.com>
# Last file update: 01.09.2011

// Class strings localization
define("L_DAY", "Tag");
define("L_MONTH", "Monat");
define("L_YEAR", "Jahr");
define("L_TODAY", "Heute");
define("L_PREV", "Zurück");
define("L_NEXT", "Vor");
define("L_REF_CAL", "Kalender Aktualisieren...");
define("L_CHK_VAL", "Eingabe Überprüfen");
define("L_SEL_LANG", "Sprache Auswählen");
define("L_SEL_ICON", "Symbol Auswählen");
define("L_SEL_DATE", "Datum Auswählen");
define("L_ERR_SEL", "Deine Auswähl ist falsch");
define("L_NOT_ALLOWED", "Dieses Datum kann man nicht auswählen");
define("L_DATE_BEFORE", "Bitte wählen Sie ein Datum vor dem %s");
define("L_DATE_AFTER", "Bitte wählen Sie ein Datum nach %s");
define("L_DATE_BETWEEN", "Bitte wählen Sie ein Datum zwischen\\n%s und %s");
define("L_WEEK_HDR", "KW"); // Optional Short Name for the column header showing the current Week number (W or CW in English - max 2 letters)
define("L_UNSET", "Stornieren");

// Set the first day of the week in your language
define("FIRST_DAY", "1"); // 1 for Monday, 0 for Sunday

// Months Long Names
define("L_JAN", "Januar");
define("L_FEB", "Februar");
define("L_MAR", "März");
define("L_APR", "April");
define("L_MAY", "Mai");
define("L_JUN", "Juni");
define("L_JUL", "Juli");
define("L_AUG", "August");
define("L_SEP", "September");
define("L_OCT", "Oktober");
define("L_NOV", "November");
define("L_DEC", "Dezember");
// Months Short Names
define("L_S_JAN", "Jan");
define("L_S_FEB", "Feb");
define("L_S_MAR", "Mär");
define("L_S_APR", "Apr");
define("L_S_MAY", "Mai");
define("L_S_JUN", "Jun");
define("L_S_JUL", "Jul");
define("L_S_AUG", "Aug");
define("L_S_SEP", "Sep");
define("L_S_OCT", "Okt");
define("L_S_NOV", "Nov");
define("L_S_DEC", "Dez");
// Week days Long Names
define("L_MON", "Montag");
define("L_TUE", "Dienstag");
define("L_WED", "Mittwoch");
define("L_THU", "Donnerstag");
define("L_FRI", "Freitag");
define("L_SAT", "Samstag");
define("L_SUN", "Sonntag");
// Week days Short Names
define("L_S_MON", "Mo");
define("L_S_TUE", "Di");
define("L_S_WED", "Mi");
define("L_S_THU", "Do");
define("L_S_FRI", "Fr");
define("L_S_SAT", "Sa");
define("L_S_SUN", "So");

// Windows encoding
define("WIN_DEFAULT", "windows-1252");
define("L_CAL_FORMAT", "%d. %B %Y");
if(!defined("L_LANG") || L_LANG == "L_LANG") define("L_LANG", "de_DE");

// Set the DE specific date/time format
if (stristr(PHP_OS,"win")) {
setlocale(LC_ALL, "deu_deu.UTF-8", "german.UTF-8", "german");
} else {
setlocale(LC_ALL, "de_DE.UTF-8", "deu_deu.UTF-8", "german.UTF-8");
}
?>