<?php
# en_US - this file includes the specific strings for both en_GB/en_US
# PHP-Calendar, DatePicker Calendar class: http://www.triconsole.com/php/calendar_datepicker.php
# Version: 3.61
# Language: American English / English US
# Translator: Ciprian Murariu <ciprianmp@yahoo.com>
# Last file update: 29.08.2011

if (!function_exists('utf_conv'))
{
	function utf_conv($iso,$charset,$what)
	{
		if(function_exists('iconv')) $what = iconv($iso,$charset,$what);
		return $what;
	};
};
$hl = (isset($_REQUEST["hl"])) ? $_REQUEST["hl"] : false;
if(file_exists("lang/calendar.".($hl).".php")) include_once("lang/calendar.".($hl).".php");
else
{
	if(!defined("L_LANG") || L_LANG == "L_LANG")
	{
		define("L_LANG", "en_US");
		// Set the US specific date/time format
		if (stristr(PHP_OS,"win")) {
		setlocale(LC_ALL, "eng-usa.UTF-8", "eng-usa");
		} else {
		setlocale(LC_ALL, "en_US.UTF-8", "enu.UTF-8", "usa.UTF-8", "enu_enu.UTF-8", "English-usa.UTF-8");
		}
	}
};

// English US format and localization - default strings when the specified translation is not available
if(!defined("RTL")) define("RTL", 0);
if(!defined("L_DAY")) define("L_DAY", "Day");
if(!defined("L_MONTH")) define("L_MONTH", "Month");
if(!defined("L_YEAR")) define("L_YEAR", "Year");
if(!defined("L_TODAY")) define("L_TODAY", "Today");
if(!defined("L_PREV")) define("L_PREV", "Previous");
if(!defined("L_NEXT")) define("L_NEXT", "Next");
if(!defined("L_REF_CAL")) define("L_REF_CAL", "Refreshing Calendar...");
if(!defined("L_CHK_VAL")) define("L_CHK_VAL", "Check the value");
if(!defined("L_SEL_LANG")) define("L_SEL_LANG", "Select Language");
if(!defined("L_SEL_ICON")) define("L_SEL_ICON", "Select Icon");
if(!defined("L_SEL_DATE")) define("L_SEL_DATE", "Select Date");
if(!defined("L_ERR_SEL")) define("L_ERR_SEL", "Your selection is not valid");
if(!defined("L_NOT_ALLOWED")) define("L_NOT_ALLOWED", "This date is not allowed to be selected");
if(!defined("L_DATE_BEFORE")) define("L_DATE_BEFORE", "Please choose a date before %s");
if(!defined("L_DATE_AFTER")) define("L_DATE_AFTER", "Please choose a date after %s");
if(!defined("L_DATE_BETWEEN")) define("L_DATE_BETWEEN", "Please choose a date between\\n%s and %s");
if(!defined("L_WEEK_HDR")) define("L_WEEK_HDR", "");
if(!defined("L_UNSET")) define("L_UNSET", "Unset");

// Set the first day of the week in your language
if(!defined("FIRST_DAY")) define("FIRST_DAY", "0"); // 1 for Monday, 0 for Sunday

// Months Long Names
if(!defined("L_JAN")) define("L_JAN", "January");
if(!defined("L_FEB")) define("L_FEB", "February");
if(!defined("L_MAR")) define("L_MAR", "March");
if(!defined("L_APR")) define("L_APR", "April");
if(!defined("L_MAY")) define("L_MAY", "May");
if(!defined("L_JUN")) define("L_JUN", "June");
if(!defined("L_JUL")) define("L_JUL", "July");
if(!defined("L_AUG")) define("L_AUG", "August");
if(!defined("L_SEP")) define("L_SEP", "September");
if(!defined("L_OCT")) define("L_OCT", "October");
if(!defined("L_NOV")) define("L_NOV", "November");
if(!defined("L_DEC")) define("L_DEC", "December");
// Months Short Names
if(!defined("L_S_JAN")) define("L_S_JAN", "Jan");
if(!defined("L_S_FEB")) define("L_S_FEB", "Feb");
if(!defined("L_S_MAR")) define("L_S_MAR", "Mar");
if(!defined("L_S_APR")) define("L_S_APR", "Apr");
if(!defined("L_S_MAY")) define("L_S_MAY", "May");
if(!defined("L_S_JUN")) define("L_S_JUN", "Jun");
if(!defined("L_S_JUL")) define("L_S_JUL", "Jul");
if(!defined("L_S_AUG")) define("L_S_AUG", "Aug");
if(!defined("L_S_SEP")) define("L_S_SEP", "Sep");
if(!defined("L_S_OCT")) define("L_S_OCT", "Oct");
if(!defined("L_S_NOV")) define("L_S_NOV", "Nov");
if(!defined("L_S_DEC")) define("L_S_DEC", "Dec");
// Week days Long Names
if(!defined("L_MON")) define("L_MON", "Monday");
if(!defined("L_TUE")) define("L_TUE", "Tuesday");
if(!defined("L_WED")) define("L_WED", "Wednesday");
if(!defined("L_THU")) define("L_THU", "Thursday");
if(!defined("L_FRI")) define("L_FRI", "Friday");
if(!defined("L_SAT")) define("L_SAT", "Saturday");
if(!defined("L_SUN")) define("L_SUN", "Sunday");
// Week days Short Names
if(!defined("L_S_MON")) define("L_S_MON", "Mo");
if(!defined("L_S_TUE")) define("L_S_TUE", "Tu");
if(!defined("L_S_WED")) define("L_S_WED", "We");
if(!defined("L_S_THU")) define("L_S_THU", "Th");
if(!defined("L_S_FRI")) define("L_S_FRI", "Fr");
if(!defined("L_S_SAT")) define("L_S_SAT", "Sa");
if(!defined("L_S_SUN")) define("L_S_SUN", "Su");

// Display extratext beside years, months and/or days in dropdowns (eg. Korean and Japan)
if(!defined("L_USE_YMD_DROP")) define("L_USE_YMD_DROP", 0);

// Windows encoding
if(!defined("WIN_DEFAULT")) define("WIN_DEFAULT", "windows-1252");
if(!defined("L_CAL_FORMAT")) define("L_CAL_FORMAT", "%B %d, %Y");
if(!defined("DATE_FORMAT")) define("DATE_FORMAT", str_replace("%","",str_replace("B","F",str_replace("d","j",L_CAL_FORMAT))));

?>
<SCRIPT TYPE="text/javascript" LANGUAGE="JavaScript">
<!--
//	JS strings
	var l_lang = "<?php echo(L_LANG); ?>";
	var l_sel_date = "<?php echo(L_SEL_DATE); ?>";
	var l_not_allowed = "<?php echo(L_NOT_ALLOWED); ?>";
	var l_date_before = "<?php echo(L_DATE_BEFORE); ?>";
	var l_date_after = "<?php echo(L_DATE_AFTER); ?>";
	var l_date_between = "<?php echo(L_DATE_BETWEEN); ?>";
	var l_use_ymd_drop = "<?php echo(L_USE_YMD_DROP); ?>";
	var l_day = "<?php echo(L_DAY); ?>";
	var l_month = "<?php echo(L_MONTH); ?>";
	var l_year = "<?php echo(L_YEAR); ?>";
//	Long Month Names
	var l_january = "<?php echo(defined('L_JAN') ? L_JAN : (stristr(PHP_OS,'win') ? utf_conv(WIN_DEFAULT,'utf-8',strftime('%B','1199145600')) : strftime('%B','1199145600'))); ?>";
	var l_february = "<?php echo(defined('L_FEB') ? L_FEB : (stristr(PHP_OS,'win') ? utf_conv(WIN_DEFAULT,'utf-8',strftime('%B','1201824000')) : strftime('%B','1201824000'))); ?>";
	var l_march = "<?php echo(defined('L_MAR') ? L_MAR : (stristr(PHP_OS,'win') ? utf_conv(WIN_DEFAULT,'utf-8',strftime('%B','1204329600')) : strftime('%B','1204329600'))); ?>";
	var l_april = "<?php echo(defined('L_APR') ? L_APR : (stristr(PHP_OS,'win') ? utf_conv(WIN_DEFAULT,'utf-8',strftime('%B','1207008000')) : strftime('%B','1207008000'))); ?>";
	var l_may = "<?php echo(defined('L_MAY') ? L_MAY : (stristr(PHP_OS,'win') ? utf_conv(WIN_DEFAULT,'utf-8',strftime('%B','1209600000')) : strftime('%B','1209600000'))); ?>";
	var l_june = "<?php echo(defined('L_JUN') ? L_JUN : (stristr(PHP_OS,'win') ? utf_conv(WIN_DEFAULT,'utf-8',strftime('%B','1212278400')) : strftime('%B','1212278400'))); ?>";
	var l_july = "<?php echo(defined('L_JUL') ? L_JUL : (stristr(PHP_OS,'win') ? utf_conv(WIN_DEFAULT,'utf-8',strftime('%B','1214870400')) : strftime('%B','1214870400'))); ?>";
	var l_august = "<?php echo(defined('L_AUG') ? L_AUG : (stristr(PHP_OS,'win') ? utf_conv(WIN_DEFAULT,'utf-8',strftime('%B','1217548800')) : strftime('%B','1217548800'))); ?>";
	var l_september = "<?php echo(defined('L_SEP') ? L_SEP : (stristr(PHP_OS,'win') ? utf_conv(WIN_DEFAULT,'utf-8',strftime('%B','1220227200')) : strftime('%B','1220227200'))); ?>";
	var l_october = "<?php echo(defined('L_OCT') ? L_OCT : (stristr(PHP_OS,'win') ? utf_conv(WIN_DEFAULT,'utf-8',strftime('%B','1222819200')) : strftime('%B','1220227200'))); ?>";
	var l_november = "<?php echo(defined('L_NOV') ? L_NOV : (stristr(PHP_OS,'win') ? utf_conv(WIN_DEFAULT,'utf-8',strftime('%B','1225497600')) : strftime('%B','1225497600'))); ?>";
	var l_december = "<?php echo(defined('L_DEC') ? L_DEC : (stristr(PHP_OS,'win') ? utf_conv(WIN_DEFAULT,'utf-8',strftime('%B','1228089600')) : strftime('%B','1228089600'))); ?>";
if(l_lang == "el_GR"){
//	Date Month Names Greek
	var l_januaryu = "<?php echo(defined('L_JANU') ? L_JANU : ""); ?>";
	var l_februaryu = "<?php echo(defined('L_FEBU') ? L_FEBU : ""); ?>";
	var l_marchu = "<?php echo(defined('L_MARU') ? L_MARU : ""); ?>";
	var l_aprilu = "<?php echo(defined('L_APRU') ? L_APRU : ""); ?>";
	var l_mayu = "<?php echo(defined('L_MAYU') ? L_MAYU : ""); ?>";
	var l_juneu = "<?php echo(defined('L_JUNU') ? L_JUNU : ""); ?>";
	var l_julyu = "<?php echo(defined('L_JULU') ? L_JULU : ""); ?>";
	var l_augustu = "<?php echo(defined('L_AUGU') ? L_AUGU : ""); ?>";
	var l_septemberu = "<?php echo(defined('L_SEPU') ? L_SEPU : ""); ?>";
	var l_octoberu = "<?php echo(defined('L_OCTU') ? L_OCTU : ""); ?>";
	var l_novemberu = "<?php echo(defined('L_NOVU') ? L_NOVU : ""); ?>";
	var l_decemberu = "<?php echo(defined('L_DECU') ? L_DECU : ""); ?>";
}
//	Short Month Names
	var s_jan = "<?php echo(defined('L_S_JAN') ? L_S_JAN : (stristr(PHP_OS,'win') ? utf_conv(WIN_DEFAULT,'utf-8',strftime('%b','1199145600')) : strftime('%b','1199145600'))); ?>";
	var s_feb = "<?php echo(defined('L_S_FEB') ? L_S_FEB : (stristr(PHP_OS,'win') ? utf_conv(WIN_DEFAULT,'utf-8',strftime('%b','1201824000')) : strftime('%b','1201824000'))); ?>";
	var s_mar = "<?php echo(defined('L_S_MAR') ? L_S_MAR : (stristr(PHP_OS,'win') ? utf_conv(WIN_DEFAULT,'utf-8',strftime('%b','1204329600')) : strftime('%b','1204329600'))); ?>";
	var s_apr = "<?php echo(defined('L_S_APR') ? L_S_APR : (stristr(PHP_OS,'win') ? utf_conv(WIN_DEFAULT,'utf-8',strftime('%b','1207008000')) : strftime('%b','1207008000'))); ?>";
	var s_may = "<?php echo(defined('L_S_MAY') ? L_S_MAY : (stristr(PHP_OS,'win') ? utf_conv(WIN_DEFAULT,'utf-8',strftime('%b','1209600000')) : strftime('%b','1209600000'))); ?>";
	var s_jun = "<?php echo(defined('L_S_JUN') ? L_S_JUN : (stristr(PHP_OS,'win') ? utf_conv(WIN_DEFAULT,'utf-8',strftime('%b','1212278400')) : strftime('%b','1212278400'))); ?>";
	var s_jul = "<?php echo(defined('L_S_JUL') ? L_S_JUL : (stristr(PHP_OS,'win') ? utf_conv(WIN_DEFAULT,'utf-8',strftime('%b','1214870400')) : strftime('%b','1214870400'))); ?>";
	var s_aug = "<?php echo(defined('L_S_AUG') ? L_S_AUG : (stristr(PHP_OS,'win') ? utf_conv(WIN_DEFAULT,'utf-8',strftime('%b','1217548800')) : strftime('%b','1217548800'))); ?>";
	var s_sep = "<?php echo(defined('L_S_SEP') ? L_S_SEP : (stristr(PHP_OS,'win') ? utf_conv(WIN_DEFAULT,'utf-8',strftime('%b','1220227200')) : strftime('%b','1220227200'))); ?>";
	var s_oct = "<?php echo(defined('L_S_OCT') ? L_S_OCT : (stristr(PHP_OS,'win') ? utf_conv(WIN_DEFAULT,'utf-8',strftime('%b','1222819200')) : strftime('%b','1222819200'))); ?>";
	var s_nov = "<?php echo(defined('L_S_NOV') ? L_S_NOV : (stristr(PHP_OS,'win') ? utf_conv(WIN_DEFAULT,'utf-8',strftime('%b','1225497600')) : strftime('%b','1225497600'))); ?>";
	var s_dec = "<?php echo(defined('L_S_DEC') ? L_S_DEC : (stristr(PHP_OS,'win') ? utf_conv(WIN_DEFAULT,'utf-8',strftime('%b','1228089600')) : strftime('%b','1228089600'))); ?>";
//	Long Day Names
	var l_monday = "<?php echo(defined('L_MON') ? L_MON : (stristr(PHP_OS,'win') ? utf_conv(WIN_DEFAULT,'utf-8',strftime('%A','1270425600')) : strftime('%A','1270425600'))); ?>";
	var l_tuesday = "<?php echo(defined('L_TUE') ? L_TUE : (stristr(PHP_OS,'win') ? utf_conv(WIN_DEFAULT,'utf-8',strftime('%A','1270512000')) : strftime('%A','1270512000'))); ?>";
	var l_wednesday = "<?php echo(defined('L_WED') ? L_WED : (stristr(PHP_OS,'win') ? utf_conv(WIN_DEFAULT,'utf-8',strftime('%A','1270598400')) : strftime('%A','1270598400'))); ?>";
	var l_thursday = "<?php echo(defined('L_THU') ? L_THU : (stristr(PHP_OS,'win') ? utf_conv(WIN_DEFAULT,'utf-8',strftime('%A','1270684800')) : strftime('%A','1270684800'))); ?>";
	var l_friday = "<?php echo(defined('L_FRI') ? L_FRI : (stristr(PHP_OS,'win') ? utf_conv(WIN_DEFAULT,'utf-8',strftime('%A','1270771200')) : strftime('%A','1270771200'))); ?>";
	var l_saturday = "<?php echo(defined('L_SAT') ? L_SAT : (stristr(PHP_OS,'win') ? utf_conv(WIN_DEFAULT,'utf-8',strftime('%A','1270857600')) : strftime('%A','1270857600'))); ?>";
	var l_sunday = "<?php echo(defined('L_SUN') ? L_SUN : (stristr(PHP_OS,'win') ? utf_conv(WIN_DEFAULT,'utf-8',strftime('%A','1270944000')) : strftime('%A','1270944000'))); ?>";
//	Short Day Names
	var s_mon = "<?php echo(defined('L_S_MON') ? L_S_MON : (stristr(PHP_OS,'win') ? utf_conv(WIN_DEFAULT,'utf-8',strftime('%a','1270425600')) : strftime('%a','1270425600'))); ?>";
	var s_tue = "<?php echo(defined('L_S_TUE') ? L_S_TUE : (stristr(PHP_OS,'win') ? utf_conv(WIN_DEFAULT,'utf-8',strftime('%a','1270512000')) : strftime('%a','1270512000'))); ?>";
	var s_wed = "<?php echo(defined('L_S_WED') ? L_S_WED : (stristr(PHP_OS,'win') ? utf_conv(WIN_DEFAULT,'utf-8',strftime('%a','1270598400')) : strftime('%a','1270598400'))); ?>";
	var s_thu = "<?php echo(defined('L_S_THU') ? L_S_THU : (stristr(PHP_OS,'win') ? utf_conv(WIN_DEFAULT,'utf-8',strftime('%a','1270684800')) : strftime('%a','1270684800'))); ?>";
	var s_fri = "<?php echo(defined('L_S_FRI') ? L_S_FRI : (stristr(PHP_OS,'win') ? utf_conv(WIN_DEFAULT,'utf-8',strftime('%a','1270771200')) : strftime('%a','1270771200'))); ?>";
	var s_sat = "<?php echo(defined('L_S_SAT') ? L_S_SAT : (stristr(PHP_OS,'win') ? utf_conv(WIN_DEFAULT,'utf-8',strftime('%a','1270857600')) : strftime('%a','1270857600'))); ?>";
	var s_sun = "<?php echo(defined('L_S_SUN') ? L_S_SUN : (stristr(PHP_OS,'win') ? utf_conv(WIN_DEFAULT,'utf-8',strftime('%a','1270944000')) : strftime('%a','1270944000'))); ?>";
// -->
</SCRIPT>
<?php
?>
