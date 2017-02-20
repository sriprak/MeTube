<?php
# pt_PT translation for
# PHP-Calendar, DatePicker Calendar class: http://www.triconsole.com/php/calendar_datepicker.php
# Version: 3.61
# Language: Portuguese (Portugal) / Português (Portugal)
# Translator: Developer Tuga <developer.tuga@gmail.com>
# Last file update: 01.09.2011

// Class strings localization
define("L_DAY", "Dia");
define("L_MONTH", "Mês");
define("L_YEAR", "Ano");
define("L_TODAY", "Hoje");
define("L_PREV", "Anterior");
define("L_NEXT", "Seguinte");
define("L_REF_CAL", "A actualizar o calendário...");
define("L_CHK_VAL", "Verifica o valor");
define("L_SEL_LANG", "Seleccione Língua");
define("L_SEL_ICON", "Seleccione Icon");
define("L_SEL_DATE", "Seleccione Data");
define("L_ERR_SEL", "A sua escolha não é válida");
define("L_NOT_ALLOWED", "Esta data não pode ser seleccionada");
define("L_DATE_BEFORE", "Escolha uma data anterior a %s");
define("L_DATE_AFTER", "Escolha uma data depois de %s");
define("L_DATE_BETWEEN", "Escolha uma data entre\\n%s e %s");
define("L_WEEK_HDR", ""); // Optional Short Name for the column header showing the current Week number (W or CW in English - max 2 letters)
define("L_UNSET", "Cancelar");

// Set the first day of the week in your language (0 for Sunday, 1 for Monday)
define("FIRST_DAY", "1");

// Months Long Names
define("L_JAN", "Janeiro");
define("L_FEB", "Fevereiro");
define("L_MAR", "Março");
define("L_APR", "Abril");
define("L_MAY", "Maio");
define("L_JUN", "Junho");
define("L_JUL", "Julho");
define("L_AUG", "Agosto");
define("L_SEP", "Setembro");
define("L_OCT", "Outubro");
define("L_NOV", "Novembro");
define("L_DEC", "Dezembro");
// Months Short Names
define("L_S_JAN", "Jan");
define("L_S_FEB", "Fev");
define("L_S_MAR", "Mar");
define("L_S_APR", "Abr");
define("L_S_MAY", "Mai");
define("L_S_JUN", "Jun");
define("L_S_JUL", "Jul");
define("L_S_AUG", "Ago");
define("L_S_SEP", "Set");
define("L_S_OCT", "Out");
define("L_S_NOV", "Nov");
define("L_S_DEC", "Dez");
// Week days Long Names
define("L_MON", "segunda");
define("L_TUE", "terça");
define("L_WED", "quarta");
define("L_THU", "quinta");
define("L_FRI", "sexta");
define("L_SAT", "sábado");
define("L_SUN", "domingo");
// Week days Short Names
define("L_S_MON", "seg");
define("L_S_TUE", "ter");
define("L_S_WED", "qua");
define("L_S_THU", "qui");
define("L_S_FRI", "sex");
define("L_S_SAT", "sáb");
define("L_S_SUN", "dom");

// Windows encoding
define("WIN_DEFAULT", "windows-1252");
define("L_CAL_FORMAT", "%d %B %Y");
if(!defined("L_LANG") || L_LANG == "L_LANG") define("L_LANG", "pt_PT"); // en_US format of your language

// Set the PT specific date/time format
if (stristr(PHP_OS,"win")) {
setlocale(LC_ALL, "pt-PT.UTF-8", "pt-pt", "Portuguese");
} else {
setlocale(LC_ALL, "pt_PT.UTF-8", "por.UTF-8", "por_por.UTF-8", "Portuguese.UTF-8");
}
?>