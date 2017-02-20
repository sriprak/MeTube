<?php
# hy_AM translation for
# PHP-Calendar, DatePicker Calendar class: http://www.triconsole.com/php/calendar_datepicker.php
# Localized version of PHP-Calendar, DatePicker Calendar class: http://ciprianmp.com/scripts/calendar/
# Version: 3.62
# Language: Armenian / Հայերեն
# Translator: Ptuchik <avo@pisem.net>
# Last file update: 26.09.2011

# define("RTL", 1); // uncomment only for right-to-left text (Arabic, Hebrew)

// Class strings localization
define("L_DAY", "Օր");
define("L_MONTH", "Ամիս");
define("L_YEAR", "Տարի");
define("L_TODAY", "Այսօր");
define("L_PREV", "Նախորդ");
define("L_NEXT", "Հաջորդ");
define("L_REF_CAL", "Օրացույցը թարմացվում է...");
define("L_CHK_VAL", "Ստուգել արդյունքը");
define("L_SEL_LANG", "Ընտրել լեզուն");
define("L_SEL_ICON", "Ընտրել նկարը");
define("L_SEL_DATE", "Ընտրել ամսաթիվը");
define("L_ERR_SEL", "Ձեր ընտրությունը սխալ է");
define("L_NOT_ALLOWED", "Այդ ամսաթիվն ընտրելն արգելված է");
define("L_DATE_BEFORE", "Խնդրում ենք ընտրել ամսաթիվ մինչև %s-ը");
define("L_DATE_AFTER", "Խնդրում ենք ընտրել ամսաթիվ %s-ից հետո");
define("L_DATE_BETWEEN", "Խնդրում ենք ընտրել ամսաթիվ %s-ից %s-ն ընկած ժամանակահատվածում");
define("L_WEEK_HDR", ""); // Optional Short Name for the column header showing the current Week number (W or CW in English - max 2 letters)
define("L_UNSET", "Չեղարկել");

// Set the first day of the week in your language (0 for Sunday, 1 for Monday ... 6 for Saturday)
define("FIRST_DAY", "1");

// Months Long Names
define("L_JAN", "Հունվար");
define("L_FEB", "Փետրվար");
define("L_MAR", "Մարտ");
define("L_APR", "Ապրիլ");
define("L_MAY", "Մայիս");
define("L_JUN", "Հունիս");
define("L_JUL", "Հուլիս");
define("L_AUG", "Օգոստոս");
define("L_SEP", "Սեպտեմբեր");
define("L_OCT", "Հոկտեմբեր");
define("L_NOV", "Նոյեմբեր");
define("L_DEC", "Դեկտեմբեր");
// Months Short Names
define("L_S_JAN", "Հնվ");
define("L_S_FEB", "Փտվ");
define("L_S_MAR", "Մրտ");
define("L_S_APR", "Ապր");
define("L_S_MAY", "Մյս");
define("L_S_JUN", "Հնս");
define("L_S_JUL", "Հլս");
define("L_S_AUG", "Օգս");
define("L_S_SEP", "Սպտ");
define("L_S_OCT", "Հկտ");
define("L_S_NOV", "Նյբ");
define("L_S_DEC", "Դկտ");
// Week days Long Names
define("L_MON", "Երկուշաբթի");
define("L_TUE", "Երեքշաբթի");
define("L_WED", "Չորեքշաբթի");
define("L_THU", "Հինգշաբթի");
define("L_FRI", "Ուրբաթ");
define("L_SAT", "Շաբաթ");
define("L_SUN", "Կիրակի");
// Week days Short Names
define("L_S_MON", "Երկ");
define("L_S_TUE", "Երք");
define("L_S_WED", "Չրք");
define("L_S_THU", "Հնգ");
define("L_S_FRI", "Ուրբ");
define("L_S_SAT", "Շբթ");
define("L_S_SUN", "Կիր");

// Windows encoding
define("WIN_DEFAULT", "armscii-8");
define("L_CAL_FORMAT", "%d %B %Y");
if(!defined("L_LANG") || L_LANG == "L_LANG") define("L_LANG", "hy_AM");

// Set the AM specific date/time format; ENGLISH EXAMPLE:
if (stristr(PHP_OS,"win")) {
setlocale(LC_ALL, "arm-ARM.UTF-8", "arm-ARM", "Armenian-ARM.UTF-8", "Armenian.UTF-8");
} else {
setlocale(LC_ALL, "hy_AM.UTF-8", "arm.UTF-8", "ARM.UTF-8", "arm_ARM.UTF-8", "Armenian-ARM.UTF-8");
}
?>