<?php
# ru_RU translation for
# PHP-Calendar, DatePicker Calendar class: http://www.triconsole.com/php/calendar_datepicker.php
# Version: 3.61
# Language: Russian / Русский
# Translator:
# Last file update: 01.09.2011

// Class strings localization
define("L_DAY", "День");
define("L_MONTH", "Месяц");
define("L_YEAR", "Год");
define("L_TODAY", "Cегодня");
define("L_PREV", "Предыдущее");
define("L_NEXT", "Следущее");
define("L_REF_CAL", "Обновить календарь...");
define("L_CHK_VAL", "Проверить значение");
define("L_SEL_LANG", "Выбрать язык");
define("L_SEL_ICON", "Выбрать иконку");
define("L_SEL_DATE", "Выбрать дату");
define("L_ERR_SEL", "Выбор неверный");
define("L_NOT_ALLOWED", "Эта дата не может быть выбрана");
define("L_DATE_BEFORE", "Выберите дату до %s");
define("L_DATE_AFTER", "Выберите дату, после %s");
define("L_DATE_BETWEEN", "Выберите дату между\\n%s и %s");
define("L_WEEK_HDR", ""); // Optional Short Name for the column header showing the current Week number (W or CW in English - max 2 letters)
define("L_UNSET", "Отменить");

// Set the first day of the week in your language (0 for Sunday, 1 for Monday)
define("FIRST_DAY", "1");

// Months Long Names
define("L_JAN", "Январь");
define("L_FEB", "Февраль");
define("L_MAR", "Март");
define("L_APR", "Апрель");
define("L_MAY", "Май");
define("L_JUN", "Июнь");
define("L_JUL", "Июль");
define("L_AUG", "Август");
define("L_SEP", "Сентябрь");
define("L_OCT", "Октябрь");
define("L_NOV", "Ноябрь");
define("L_DEC", "Декабрь");
// Months Short Names
define("L_S_JAN", "Янв.");
define("L_S_FEB", "Фев.");
define("L_S_MAR", "Март");
define("L_S_APR", "Апр.");
define("L_S_MAY", "Май");
define("L_S_JUN", "Июнь");
define("L_S_JUL", "Июль");
define("L_S_AUG", "Авг.");
define("L_S_SEP", "Сен.");
define("L_S_OCT", "Окт.");
define("L_S_NOV", "Ноя.");
define("L_S_DEC", "Дек.");
// Week days Long Names
define("L_MON", "Понедельник");
define("L_TUE", "Вторник");
define("L_WED", "Среда");
define("L_THU", "Четверг");
define("L_FRI", "Пятница");
define("L_SAT", "Суббота");
define("L_SUN", "Воскресенье");
// Week days Short Names
define("L_S_MON", "Пн");
define("L_S_TUE", "Вт");
define("L_S_WED", "Ср");
define("L_S_THU", "Чт");
define("L_S_FRI", "Пт");
define("L_S_SAT", "Сб");
define("L_S_SUN", "Вс");

// Windows encoding
define("WIN_DEFAULT", "windows-1251");
define("L_CAL_FORMAT", "%d %B %Y");
if(!defined("L_LANG") || L_LANG == "L_LANG") define("L_LANG", "ru_RU"); // en_US format of your language

// Set the RU specific date/time format
if (stristr(PHP_OS,"win")) {
setlocale(LC_ALL, "rus-rus.UTF-8", "rus-rus", "Russian.UTF-8", "Russian");
} else {
setlocale(LC_ALL, "ru_RU.UTF-8", "rus.UTF-8", "rus_rus.UTF-8", "Russian.UTF-8");
}
?>