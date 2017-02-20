<?php
# nl_NL translation for
# PHP-Calendar, DatePicker Calendar class: http://www.triconsole.com/php/calendar_datepicker.php
# Version: 3.61
# Language: Dutch / Nederlands
# Translator: Bert Moorlag <berbia@hotmail.com>
# Last file update: 01.09.2011

// Class strings localization
define("L_DAY", "Dag");
define("L_MONTH", "Maand");
define("L_YEAR", "Jaar");
define("L_TODAY", "Vandaag");
define("L_PREV", "Vorige");
define("L_NEXT", "Volgende");
define("L_REF_CAL", "Kalender Vernieuwen...");
define("L_CHK_VAL", "Controleer datum");
define("L_SEL_LANG", "Selecteer Taal");
define("L_SEL_ICON", "Selecteer Icoon");
define("L_SEL_DATE", "Selecteer Datum");
define("L_ERR_SEL", "Dit is geen geldige selectie");
define("L_NOT_ALLOWED", "Dit is geen geldige datum");
define("L_DATE_BEFORE", "Kies een datum vóór %s");
define("L_DATE_AFTER", "Kies een datum na %s");
define("L_DATE_BETWEEN", "Kies een datum tussen\\n%s en %s");
define("L_WEEK_HDR", ""); // Optional Short Name for the column header showing the current Week number (W or CW in English - max 2 letters)
define("L_UNSET", "Uitzetten "); //Zet uit

// Set the first day of the week in your language (0 for Sunday, 1 for Monday)
define("FIRST_DAY", "1");

// Months Long Names
define("L_JAN", "januari");
define("L_FEB", "februari");
define("L_MAR", "maart");
define("L_APR", "april");
define("L_MAY", "mei");
define("L_JUN", "juni");
define("L_JUL", "juli");
define("L_AUG", "augustus");
define("L_SEP", "september");
define("L_OCT", "oktober");
define("L_NOV", "november");
define("L_DEC", "december");
// Months Short Names
define("L_S_JAN", "jan");
define("L_S_FEB", "feb");
define("L_S_MAR", "mrt");
define("L_S_APR", "apr");
define("L_S_MAY", "mei");
define("L_S_JUN", "jun");
define("L_S_JUL", "jul");
define("L_S_AUG", "aug");
define("L_S_SEP", "sep");
define("L_S_OCT", "okt");
define("L_S_NOV", "nov");
define("L_S_DEC", "dec");
// Week days Long Names
define("L_MON", "maandag");
define("L_TUE", "dinsdag");
define("L_WED", "woensdag");
define("L_THU", "donderdag");
define("L_FRI", "vrijdag");
define("L_SAT", "zaterdag");
define("L_SUN", "zondag");
// Week days Short Names
define("L_S_MON", "ma");
define("L_S_TUE", "di");
define("L_S_WED", "wo");
define("L_S_THU", "do");
define("L_S_FRI", "vr");
define("L_S_SAT", "za");
define("L_S_SUN", "zo");

// Windows encoding
define("WIN_DEFAULT", "windows-1252");
define("L_CAL_FORMAT", "%d %B %Y");
if(!defined("L_LANG") || L_LANG == "L_LANG") define("L_LANG", "nl_NL");

// Set the NL specific date/time format
if (stristr(PHP_OS,"win")) {
setlocale(LC_ALL, "dutch.UTF-8", "nld_nld.UTF-8", "nld.UTF-8", "dutch");
} else {
setlocale(LC_ALL, "nl_NL.UTF-8", "nl_NL.UTF-8@euro", "nld_nld.UTF-8", "nld.UTF-8");
}
?>