<?php
# tr_TR translation for
# PHP-Calendar, DatePicker Calendar class: http://www.triconsole.com/php/calendar_datepicker.php
# Version: 3.62
# Language: Turkish / Türkçe
# Translator: Volkan Övün <vovun@hotmail.com>
# Last file update: 26.09.2011

// Class strings localization
define("L_DAY", "Gün");
define("L_MONTH", "Ay");
define("L_YEAR", "Yıl");
define("L_TODAY", "Bu gün");
define("L_PREV", "Önceki");
define("L_NEXT", "Sonraki");
define("L_REF_CAL", "Takvimi Yenile...");
define("L_CHK_VAL", "Seçilmiş tarihi kontrol et");
define("L_SEL_LANG", "Dil Seçimi");
define("L_SEL_ICON", "İkon Seçimi");
define("L_SEL_DATE", "Tarih Seçimi");
define("L_ERR_SEL", "Geçersiz bir seçim yeptınız");
define("L_NOT_ALLOWED", "Bu tarihin seçilmesine izin verilmiyor");
define("L_DATE_BEFORE", "%s öncesi bir tarih seçin");
define("L_DATE_AFTER", "%s sonra bir tarih seçin");
define("L_DATE_BETWEEN", "%s ve %s\\narasındaki bir tarih seçin");
define("L_WEEK_HDR", ""); // Optional Short Name for the column header showing the current Week number (W or CW in English - max 2 letters)
define("L_UNSET", "İptal"); // Seçimi kaldır

// Set the first day of the week in your language (0 for Sunday, 1 for Monday... 6 for Saturday)
define("FIRST_DAY", "1");

// Months Long Names
define("L_JAN", "Ocak");
define("L_FEB", "Şubat");
define("L_MAR", "Mart");
define("L_APR", "Nisan");
define("L_MAY", "Mayıs");
define("L_JUN", "Haziran");
define("L_JUL", "Temmuz");
define("L_AUG", "Ağustos");
define("L_SEP", "Eylül");
define("L_OCT", "Ekim");
define("L_NOV", "Kasım");
define("L_DEC", "Aralık");
// Months Short Names
define("L_S_JAN", "Oca");
define("L_S_FEB", "Şub");
define("L_S_MAR", "Mar");
define("L_S_APR", "Nis");
define("L_S_MAY", "May");
define("L_S_JUN", "Haz");
define("L_S_JUL", "Tem");
define("L_S_AUG", "Ağu");
define("L_S_SEP", "Eyl");
define("L_S_OCT", "Eki");
define("L_S_NOV", "Kas");
define("L_S_DEC", "Ara");
// Week days Long Names
define("L_MON", "Pazartesi");
define("L_TUE", "Salı");
define("L_WED", "Çarşamba");
define("L_THU", "Perşembe");
define("L_FRI", "Cuma");
define("L_SAT", "Cumartesi");
define("L_SUN", "Pazar");
// Week days Short Names
define("L_S_MON", "Pzt");
define("L_S_TUE", "Salı");
define("L_S_WED", "Çar");
define("L_S_THU", "Per");
define("L_S_FRI", "Cum");
define("L_S_SAT", "Cmt");
define("L_S_SUN", "Paz");

// Windows encoding
define("WIN_DEFAULT", "windows-1254");
define("L_CAL_FORMAT", "%d %B %Y");
if(!defined("L_LANG") || L_LANG == "L_LANG") define("L_LANG", "tr_TR");

// Set the TR specific date/time format
if (stristr(PHP_OS,'win')) {
setlocale(LC_ALL, "turkish.UTF-8", "turkish");
} else {
#setlocale(LC_ALL, "tr_TR.UTF-8", "turkish.UTF-8");
}
?>