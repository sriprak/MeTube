<?php
# yo_NG translation for
# PHP-Calendar, DatePicker Calendar class: http://www.triconsole.com/php/calendar_datepicker.php
# Version: 3.61
# Language: Yoruba (Nigeria) / Yorùbá
# Translator: Ameh Rotimi Samson (Profsam) <philanthropist4eva@gmail.com>

# Last file update: 01.09.2011

// Class strings localization
define("L_DAY", "Day");
define("L_MONTH", "Month");
define("L_YEAR", "Year");
define("L_TODAY", "Today");
define("L_PREV", "Previous");
define("L_NEXT", "Next");
define("L_REF_CAL", "Refreshing Calendar...");
define("L_CHK_VAL", "Check the value");
define("L_SEL_LANG", "Select Language");
define("L_SEL_ICON", "Select Icon");
define("L_SEL_DATE", "Select Date");
define("L_ERR_SEL", "Your selection is not valid");
define("L_NOT_ALLOWED", "This date is not allowed to be selected");
define("L_DATE_BEFORE", "Please choose a date before %s");
define("L_DATE_AFTER", "Please choose a date after %s");
define("L_DATE_BETWEEN", "Please choose a date between\\n%s and %s");
define("L_WEEK_HDR", ""); // Optional Short Name for the column header showing the current Week number (W or CW in English - max 2 letters)

// Set the first day of the week in your language (0 for Sunday, 1 for Monday)
define("FIRST_DAY", "1");

// Months Long Names
define("L_JAN", "Jánúárì");
define("L_FEB", "Fẹ́búárì");
define("L_MAR", "Máàṣì");
define("L_APR", "Épírì");
define("L_MAY", "Méè");
define("L_JUN", "Júùnù");
define("L_JUL", "Júláì");
define("L_AUG", "Ọ́ọ́gọsì");
define("L_SEP", "Sẹ̀tẹ̀ńbà");
define("L_OCT", "Ọtóbà");
define("L_NOV", "Nòfẹ̀ńbà");
define("L_DEC", "Dìsẹ̀ńbà");
// Months Short Names
define("L_S_JAN", "Ján");
define("L_S_FEB", "Fẹ́b");
define("L_S_MAR", "Máà");
define("L_S_APR", "Épí");
define("L_S_MAY", "Méè");
define("L_S_JUN", "Júù");
define("L_S_JUL", "Júl");
define("L_S_AUG", "Ọ́ọ́g");
define("L_S_SEP", "Sẹ̀t");
define("L_S_OCT", "Ọtó");
define("L_S_NOV", "Nòf");
define("L_S_DEC", "Dìs");
// Week days Long Names
define("L_MON", "Ajé");
define("L_TUE", "Ìṣẹ́gun");
define("L_WED", "Rú");
define("L_THU", "Bọ̀");
define("L_FRI", "Ẹ̀tì");
define("L_SAT", "Àbámẹ́ta");
define("L_SUN", "Àìkú");
// Week days Short Names
define("L_S_MON", "Aj");
define("L_S_TUE", "Ìṣ");
define("L_S_WED", "Rú");
define("L_S_THU", "Bọ̀");
define("L_S_FRI", "Ẹ̀t");
define("L_S_SAT", "Àb");
define("L_S_SUN", "Àì");

// Windows encoding
define("WIN_DEFAULT", "windows-1252");
define("L_CAL_FORMAT", "%B %d %Y");
if(!defined("L_LANG") || L_LANG == "L_LANG") define("L_LANG", "yo_NG"); // en_US format of your language

// Set the YO specific date/time format
if (stristr(PHP_OS,'win')) {
setlocale(LC_ALL, "yor-yor.UTF-8", "yor-nga.UTF-8", "yor", "Yoruba");
} else {
setlocale(LC_ALL, "yo_NG.UTF-8", "yor.UTF-8", "yor_yor.UTF-8", "yor_nga.UTF-8", "Yoruba.UTF-8"); // For American formats
}
?>