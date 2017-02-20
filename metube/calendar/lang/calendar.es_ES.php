<?php
# es_ES translation for
# PHP-Calendar, DatePicker Calendar class: http://www.triconsole.com/php/calendar_datepicker.php
# Version: 3.61
# Language: Spanish / español
# Translator: Roxana Castañeda <roxminu@yahoo.com>
# Last file update: 01.09.2011

// Class strings localization
define("L_DAY", "Día");
define("L_MONTH", "Mes");
define("L_YEAR", "Año");
define("L_TODAY", "Hoy");
define("L_PREV", "Anterior");
define("L_NEXT", "Siguiente");
define("L_REF_CAL", "Refrescando el Calendario...");
define("L_CHK_VAL", "Revisar el valor");
define("L_SEL_LANG", "Seleccionar el Idioma");
define("L_SEL_ICON", "Seleccionar el Icono");
define("L_SEL_DATE", "Seleccionar la Fecha");
define("L_ERR_SEL", "Tu selección no es válida");
define("L_NOT_ALLOWED", "Esta fecha no puede ser seleccionada");
define("L_DATE_BEFORE", "Elija una fecha anterior a %s");
define("L_DATE_AFTER", "Elija una fecha posterior al %s");
define("L_DATE_BETWEEN", "Elija una fecha entre el\\n%s y el %s");
define("L_WEEK_HDR", ""); // Optional Short Name for the column header showing the current Week number (W or CW in English - max 2 letters)
define("L_UNSET", "Cancelar");

// Set the first day of the week in your language
define("FIRST_DAY", "1"); // 1 for Monday, 0 for Sunday

// Months Long Names
define("L_JAN", "enero");
define("L_FEB", "febrero");
define("L_MAR", "marzo");
define("L_APR", "abril");
define("L_MAY", "mayo");
define("L_JUN", "junio");
define("L_JUL", "julio");
define("L_AUG", "agosto");
define("L_SEP", "septiembre");
define("L_OCT", "octubre");
define("L_NOV", "noviembre");
define("L_DEC", "diciembre");
// Months Short Names
define("L_S_JAN", "ene");
define("L_S_FEB", "feb");
define("L_S_MAR", "mar");
define("L_S_APR", "abr");
define("L_S_MAY", "may");
define("L_S_JUN", "jun");
define("L_S_JUL", "jul");
define("L_S_AUG", "ago");
define("L_S_SEP", "sep");
define("L_S_OCT", "oct");
define("L_S_NOV", "nov");
define("L_S_DEC", "dic");
// Week days Long Names
define("L_MON", "lunes");
define("L_TUE", "martes");
define("L_WED", "miércoles");
define("L_THU", "jueves");
define("L_FRI", "viernes");
define("L_SAT", "sábado");
define("L_SUN", "domingo");
// Week days Short Names
define("L_S_MON", "lun");
define("L_S_TUE", "mar");
define("L_S_WED", "mié");
define("L_S_THU", "jue");
define("L_S_FRI", "vie");
define("L_S_SAT", "sáb");
define("L_S_SUN", "dom");

// Windows encoding
define("WIN_DEFAULT", "windows-1252");
define("L_CAL_FORMAT", "%d %B %Y");
if(!defined("L_LANG") || L_LANG == "L_LANG") define("L_LANG", "es_ES");

// Set the ES specific date/time format
if (stristr(PHP_OS,"win")) {
setlocale(LC_ALL, "esp_esp.UTF-8", "spanish.UTF-8", "spanish");
} else {
setlocale(LC_ALL, "es_ES.UTF-8", "es_ES.UTF-8@euro", "esp.UTF-8", "es.UTF-8", "esp_esp.UTF-8", "spanish.UTF-8");
}
?>