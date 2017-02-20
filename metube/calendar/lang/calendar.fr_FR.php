<?php
# fr_FR translation for
# PHP-Calendar, DatePicker Calendar class: http://www.triconsole.com/php/calendar_datepicker.php
# Version: 3.61
# Language: French / français
# Translator: Pierre Liget <sourceforge@pliget.freesurf.fr>
# Last file update: 01.09.2011

// Class strings localization
define("L_DAY", "Jour");
define("L_MONTH", "Mois");
define("L_YEAR", "Année");
define("L_TODAY", "Aujourd'hui");
define("L_PREV", "Précédent");
define("L_NEXT", "Suivant");
define("L_REF_CAL", "Actualisation du calendrier en cours ...");
define("L_CHK_VAL", "Vérifiez la valeur");
define("L_SEL_LANG", "Sélection de la langue");
define("L_SEL_ICON", "Sélection de l’icône");
define("L_SEL_DATE", "Sélection de la date");
define("L_ERR_SEL", "La sélection n’est pas valide");
define("L_NOT_ALLOWED", "Cette date ne peut pas être sélectionnée");
define("L_DATE_BEFORE", "Veuillez sélectionner une date\\nantérieure au %s");
define("L_DATE_AFTER", "Veuillez sélectionner une date\\npostérieure au %s");
define("L_DATE_BETWEEN", "Veuillez sélectionner une date entre le\\n%s et le %s");
define("L_WEEK_HDR", ""); // Optional Short Name for the column header showing the current Week number (W or CW in English - max 2 letters)
define("L_UNSET", "Annuler"); //Remise à zéro

// Set the first day of the week in your language (0 for Sunday, 1 for Monday)
define("FIRST_DAY", "1");

// Months Long Names
define("L_JAN", "janvier");
define("L_FEB", "février");
define("L_MAR", "mars");
define("L_APR", "avril");
define("L_MAY", "mai");
define("L_JUN", "juin");
define("L_JUL", "juillet");
define("L_AUG", "août");
define("L_SEP", "septembre");
define("L_OCT", "octobre");
define("L_NOV", "novembre");
define("L_DEC", "décembre");
// Months Short Names
define("L_S_JAN", "janv.");
define("L_S_FEB", "févr.");
define("L_S_MAR", "mars");
define("L_S_APR", "avr.");
define("L_S_MAY", "mai");
define("L_S_JUN", "juin");
define("L_S_JUL", "juil.");
define("L_S_AUG", "août");
define("L_S_SEP", "sept.");
define("L_S_OCT", "oct.");
define("L_S_NOV", "nov.");
define("L_S_DEC", "déc.");
// Week days Long Names
define("L_MON", "lundi");
define("L_TUE", "mardi");
define("L_WED", "mercredi");
define("L_THU", "jeudi");
define("L_FRI", "vendredi");
define("L_SAT", "samedi");
define("L_SUN", "dimanche");
// Week days Short Names
define("L_S_MON", "lun.");
define("L_S_TUE", "mar.");
define("L_S_WED", "mer.");
define("L_S_THU", "jeu.");
define("L_S_FRI", "ven.");
define("L_S_SAT", "sam.");
define("L_S_SUN", "dim.");

// Windows encoding
define("WIN_DEFAULT", "windows-1252");
define("L_CAL_FORMAT", "%d %B %Y");
if(!defined("L_LANG") || L_LANG == "L_LANG") define("L_LANG", "fr_FR");

// Set the FR specific date/time format
if (stristr(PHP_OS,"win")) {
setlocale(LC_ALL, "fra_fra.UTF-8", "french.UTF-8", "french");
} else {
setlocale(LC_ALL, "fr_FR.UTF-8", "fr.UTF-8", "fr_FR.UTF-8@euro"); // For French formats
}
?>