<?php
# xx_YY translation for
# PHP-Calendar, DatePicker Calendar class: http://www.triconsole.com/php/calendar_datepicker.php
# Localized version of PHP-Calendar, DatePicker Calendar class: http://ciprianmp.com/scripts/calendar/
# Version: 3.68
# Language: Lang_name / Orig_name // ex: Romanian (English name) / Română (Original name)
# Translator: YourName <email@...>
# Last file update: 31.12.2011

# define("RTL", 1); // uncomment only for right-to-left text (Arabic, Hebrew)

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
define("L_UNSET", "Unset");

// Set the first day of the week in your language (0 for Sunday, 1 for Monday ... 6 for Saturday)
define("FIRST_DAY", "0");

// Months Long Names
define("L_JAN", "January");
define("L_FEB", "February");
define("L_MAR", "March");
define("L_APR", "April");
define("L_MAY", "May");
define("L_JUN", "June");
define("L_JUL", "July");
define("L_AUG", "August");
define("L_SEP", "September");
define("L_OCT", "October");
define("L_NOV", "November");
define("L_DEC", "December");
// Months Short Names
define("L_S_JAN", "Jan");
define("L_S_FEB", "Feb");
define("L_S_MAR", "Mar");
define("L_S_APR", "Apr");
define("L_S_MAY", "May");
define("L_S_JUN", "Jun");
define("L_S_JUL", "Jul");
define("L_S_AUG", "Aug");
define("L_S_SEP", "Sep");
define("L_S_OCT", "Oct");
define("L_S_NOV", "Nov");
define("L_S_DEC", "Dec");
// Week days Long Names
define("L_MON", "Monday");
define("L_TUE", "Tuesday");
define("L_WED", "Wednesday");
define("L_THU", "Thursday");
define("L_FRI", "Friday");
define("L_SAT", "Saturday");
define("L_SUN", "Sunday");
// Week days Short Names
define("L_S_MON", "Mon");
define("L_S_TUE", "Tue");
define("L_S_WED", "Wed");
define("L_S_THU", "Thu");
define("L_S_FRI", "Fri");
define("L_S_SAT", "Sat");
define("L_S_SUN", "Sun");

// Display extratext beside years, months and/or days in dropdowns (eg. Korean and Japan)
#define("L_USE_YMD_DROP", 0);

// Windows encoding
define("WIN_DEFAULT", "windows-1252");
define("L_CAL_FORMAT", "%d %B %Y");
if(!defined("L_LANG") || L_LANG == "L_LANG") define("L_LANG", "xx_YY"); // en_US format of your language

// Set the XX specific date/time format; ENGLISH EXAMPLE:
if (stristr(PHP_OS,"win")) {
setlocale(LC_ALL, "eng-usa.UTF-8", "eng-usa", "English-usa.UTF-8");
} else {
setlocale(LC_ALL, "en_US.UTF-8", "enu.UTF-8", "usa.UTF-8", "enu_enu.UTF-8", "English-usa.UTF-8");
}
?>