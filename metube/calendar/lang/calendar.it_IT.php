<?php
# it_IT translation for
# PHP-Calendar, DatePicker Calendar class: http://www.triconsole.com/php/calendar_datepicker.php
# Version: 3.61
# Language: Italian / italiano
# Translator:  Michele Ferro <specialmikius@yahoo.com>
# Last file update: 01.09.2011

// Class strings localization
define("L_DAY", "Giorno");
define("L_MONTH", "Mese");
define("L_YEAR", "Anno");
define("L_TODAY", "Oggi");
define("L_PREV", "Indietro");
define("L_NEXT", "Avanti");
define("L_REF_CAL", "Aggiornamento Calendario...");
define("L_CHK_VAL", "Controlla il valore");
define("L_SEL_LANG", "Seleziona la Lingua");
define("L_SEL_ICON", "Seleziona l’Icona");
define("L_SEL_DATE", "Seleziona la Data");
define("L_ERR_SEL", "La tua selezione non è valida");
define("L_NOT_ALLOWED", "Questa data non è consentita di essere selezionata");
define("L_DATE_BEFORE", "Scegli una data prima %s");
define("L_DATE_AFTER", "Scegli una data dopo %s");
define("L_DATE_BETWEEN", "Scegli una data tra\\n%s e %s");
define("L_WEEK_HDR", ""); // Optional Short Name for the column header showing the current Week number (W or CW in English - max 2 letters)
define("L_UNSET", "Rimuovi");

// Set the first day of the week in your language (0 for Sunday, 1 for Monday)
define("FIRST_DAY", "1");

// Months Long Names
define("L_JAN", "gennaio");
define("L_FEB", "febbraio");
define("L_MAR", "marzo");
define("L_APR", "aprile");
define("L_MAY", "maggio");
define("L_JUN", "giugno");
define("L_JUL", "luglio");
define("L_AUG", "agosto");
define("L_SEP", "settembre");
define("L_OCT", "ottobre");
define("L_NOV", "novembre");
define("L_DEC", "dicembre");
// Months Short Names
define("L_S_JAN", "gen");
define("L_S_FEB", "feb");
define("L_S_MAR", "mar");
define("L_S_APR", "apr");
define("L_S_MAY", "mag");
define("L_S_JUN", "giu");
define("L_S_JUL", "lug");
define("L_S_AUG", "ago");
define("L_S_SEP", "set");
define("L_S_OCT", "ott");
define("L_S_NOV", "nov");
define("L_S_DEC", "dic");
// Week days Long Names
define("L_MON", "lunedì");
define("L_TUE", "martedì");
define("L_WED", "mercoledì");
define("L_THU", "giovedì");
define("L_FRI", "venerdì");
define("L_SAT", "sabato");
define("L_SUN", "domenica");
// Week days Short Names
define("L_S_MON", "lun");
define("L_S_TUE", "mar");
define("L_S_WED", "mer");
define("L_S_THU", "gio");
define("L_S_FRI", "ven");
define("L_S_SAT", "sab");
define("L_S_SUN", "dom");

// Windows encoding
define("WIN_DEFAULT", "windows-1252");
define("L_CAL_FORMAT", "%d %B %Y");
if(!defined("L_LANG") || L_LANG == "L_LANG") define("L_LANG", "it_IT");

// Set the IT specific date/time format
if (stristr(PHP_OS,"win")) {
setlocale(LC_ALL, "ita_ITA.UTF-8", "italian.UTF-8", "italian");
} else {
setlocale(LC_ALL, "it_IT.UTF-8", "ita_ITA.UTF-8", "italian.UTF-8");
}
?>