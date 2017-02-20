<?php
# he_IL translation for
# PHP-Calendar, DatePicker Calendar class: http://www.triconsole.com/php/calendar_datepicker.php
# Version: 3.61
# Language: Hebrew / עברית
# Translator: Shula Amokshim <shula.amokshim @gmx.net>
# Last file update: 01.09.2011

define("RTL", 1);

// Class strings localization
define("L_DAY", "יום");
define("L_MONTH", "חודש");
define("L_YEAR", "שנה");
define("L_TODAY", "היום");
define("L_PREV", "קודם");
define("L_NEXT", "הבא");
define("L_REF_CAL", "מרענן יומן...");
define("L_CHK_VAL", "בדוק ערך");
define("L_SEL_LANG", "בחר שפה");
define("L_SEL_ICON", "בחר צלמית");
define("L_SEL_DATE", "בחר תאריך");
define("L_ERR_SEL", "הבחירה שלך לא תקינה");
define("L_NOT_ALLOWED", "אי אפשר לבחור תאריך זה");
define("L_DATE_BEFORE", "%s אנא בחר תאריך לפני");
define("L_DATE_AFTER", "%s אנא בחר תאריך אחר");
define("L_DATE_BETWEEN", "%s ו %s\\nאנא בחר תאריך בין");
define("L_WEEK_HDR", ""); // Optional Short Name for the column header showing the current Week number (W or CW in English - max 2 letters)
define("L_UNSET", "לבטל");

// Set the first day of the week in your language (0 for Sunday, 1 for Monday)
define("FIRST_DAY", "0");

// Months Long Names
define("L_JAN", "ינואר");
define("L_FEB", "פברואר");
define("L_MAR", "מרץ");
define("L_APR", "אפריל");
define("L_MAY", "מאי");
define("L_JUN", "יוני");
define("L_JUL", "יולי");
define("L_AUG", "אוגוסט");
define("L_SEP", "ספטמבר");
define("L_OCT", "אלול");
define("L_NOV", "נובמבר");
define("L_DEC", "דצמבר");
// Months Short Names
define("L_S_JAN", "ינואר");
define("L_S_FEB", "פבואר");
define("L_S_MAR", "מרץ");
define("L_S_APR", "אפריל");
define("L_S_MAY", "מאי");
define("L_S_JUN", "יוני");
define("L_S_JUL", "יולי");
define("L_S_AUG", "אוגוסט");
define("L_S_SEP", "ספטמבר");
define("L_S_OCT", "אלול");
define("L_S_NOV", "נובמבר");
define("L_S_DEC", "דצמבר");
// Week days Long Names
define("L_MON", "שני");
define("L_TUE", "יום שלישי");
define("L_WED", "רביעי");
define("L_THU", "חמישי");
define("L_FRI", "שישי");
define("L_SAT", "שבת");
define("L_SUN", "ראשון");
// Week days Short Names
define("L_S_MON", "ב");
define("L_S_TUE", "ג");
define("L_S_WED", "ד");
define("L_S_THU", "ה");
define("L_S_FRI", "ו");
define("L_S_SAT", "ש");
define("L_S_SUN", "א");

// Windows encoding
define("WIN_DEFAULT", "windows-1255");
define("L_CAL_FORMAT", "%d ב%B %Y");
if(!defined("L_LANG") || L_LANG == "L_LANG") define("L_LANG", "he_IL");

// Set the HE specific date/time format
if (stristr(PHP_OS,"win")) {
setlocale(LC_ALL, "heb-heb.UTF-8", "heb-heb", "hebrew.UTF-8", "hebrew");
} else {
setlocale(LC_ALL, "he_IL.UTF-8", "heb.UTF-8", "he.UTF-8", "iw_IL.UTF-8", "iw.UTF-8", "heb_heb.UTF-8", "Hebrew-he.UTF-8"); // For HE formats
}
?>