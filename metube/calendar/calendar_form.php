<?php


$hl = (isset($_REQUEST["hl"])) ? $_REQUEST["hl"] : false;
if($hl && $hl != "en_US" && $hl != "L_LANG") $language = $hl;
elseif(defined("L_LANG") && L_LANG != "en_US" && L_LANG != "L_LANG") $language = L_LANG;
if(isset($language)){
include_once("lang/calendar.".$language.".php");
}
require_once('tc_calendar.php');

$thispage = $_SERVER['PHP_SELF'];

$sld = (isset($_REQUEST["selected_day"])) ? $_REQUEST["selected_day"] : 0;
$slm = (isset($_REQUEST["selected_month"])) ? (int)$_REQUEST["selected_month"] : 0;
$sly = (isset($_REQUEST["selected_year"])) ? (int)$_REQUEST["selected_year"] : 0;
$year_start = (isset($_REQUEST["year_start"])) ? $_REQUEST["year_start"] : 0;
$year_end = (isset($_REQUEST["year_end"])) ? $_REQUEST["year_end"] : 0;
$startDate = (isset($_REQUEST["str"])) ? $_REQUEST["str"] : 0;
$time_allow1 = (isset($_REQUEST["da1"])) ? $_REQUEST["da1"] : "";
$time_allow2 = (isset($_REQUEST["da2"])) ? $_REQUEST["da2"] : "";
$ta1_set = is_numeric($time_allow1);
$ta2_set = is_numeric($time_allow2);
$show_not_allow = (isset($_REQUEST["sna"])) ? $_REQUEST["sna"] : true;
$auto_submit = (isset($_REQUEST["aut"])) ? $_REQUEST["aut"] : false;
$form_name = (isset($_REQUEST["frm"])) ? $_REQUEST["frm"] : "";
$target_url = (isset($_REQUEST["tar"])) ? $_REQUEST["tar"] : "";
$show_input = (isset($_REQUEST["inp"])) ? $_REQUEST["inp"] : true;
$date_format = (isset($_REQUEST["fmt"])) ? $_REQUEST["fmt"] : DATE_FORMAT; //format of date shown in panel if $show_input is false
$dsb_txt = (isset($_REQUEST["dis"])) ? $_REQUEST["dis"] : "";
$date_pair1 = (isset($_REQUEST["pr1"])) ? $_REQUEST["pr1"] : "";
$date_pair2 = (isset($_REQUEST["pr2"])) ? $_REQUEST["pr2"] : "";
$date_pair_value = (isset($_REQUEST["prv"])) ? $_REQUEST["prv"] : "";
$path = (isset($_REQUEST["pth"])) ? $_REQUEST["pth"] : "";
$sp_dates = (isset($_REQUEST["spd"])) ? @tc_calendar::check_json_decode($_REQUEST["spd"]) : array(array(), array(), array());
$sp_type = (isset($_REQUEST["spt"])) ? $_REQUEST["spt"] : 0;
$tc_onchanged = (isset($_REQUEST["och"])) ? $_REQUEST["och"] : "";
$rtl = (isset($_REQUEST["rtl"])) ? $_REQUEST["rtl"] : RTL;
$show_weeks = (isset($_REQUEST["wks"])) ? $_REQUEST["wks"] : false;
$interval = (isset($_REQUEST["int"])) ? $_REQUEST["int"] : 1;
$auto_hide = (isset($_REQUEST["hid"])) ? $_REQUEST["hid"] : 0;
$auto_hide_time = (isset($_REQUEST["hdt"])) ? $_REQUEST["hdt"] : 1000;
$hl = (isset($_REQUEST["hl"])) ? $_REQUEST["hl"] : 'en_US';

//check year to be select in case of date_allow is set
if(!$show_not_allow){
  if ($ta1_set) $year_start = date('Y', $time_allow1);
  if ($ta2_set) $year_end = date('Y', $time_allow2);
}

if(isset($_REQUEST["m"]))
	$m = $_REQUEST["m"];
else{
	if($slm){
		$m = $slm;
	}else{
		if($ta2_set && $year_end > 0){
			//compare which one is more
			$year_allow2 = date('Y', $time_allow2);
			if($year_allow2 >= $year_end){
				//use time_allow2
				$m = ($time_allow2 > time()) ? date('m') : date('m', $time_allow2);
			}else{
				//use year_end
				$m = ($year_end > date('Y')) ? date('m') : 12;
			}
		}elseif($ta2_set){
			$m = ($time_allow2 > time()) ? date('m') : date('m', $time_allow2);
		}elseif($year_end > 0){
			$m = ($year_end > date('Y')) ? date('m') : 12;
		}else $m = date('m');
	}
}

if($m < 1 && $m > 12) $m = date('m');

$cyr = ($sly) ? true : false;
if($sly && $sly < $year_start) $sly = $year_start;
if($sly && $sly > $year_end) $sly = $year_end;

if(isset($_REQUEST["y"]))
	$y = $_REQUEST["y"];
else
	$y = ($cyr) ? $sly : date('Y');

if($y <= 0) $y = date('Y');

//set startup calendar
if($y >= $year_end) $y = $year_end;
if($y <= $year_start) $y = $year_start;

// ensure m-y fits date allow range
if (!$show_not_allow) {
  if ($ta1_set) {
    $m1 = date('m', $time_allow1);
    $y1 = date('Y', $time_allow1);
    if ($y == $y1 && (int)$m < (int)$m1) $m = $m1;
  }
  if ($ta2_set) {
    $m2 = date('m', $time_allow2);
    $y2 = date('Y', $time_allow2);
    if ($y == $y2 && (int)$m > (int)$m2) $m = $m2;
  }
}

$objname = (isset($_REQUEST["objname"])) ? $_REQUEST["objname"] : "";
$dp = (isset($_REQUEST["dp"])) ? $_REQUEST["dp"] : "";

$cobj = new tc_calendar("");
$cobj->startDate($startDate);
$cobj->dsb_days = explode(",", $dsb_txt);

if(!$year_start || !$year_end){
	$year_start = $cobj->year_start; //get default value of year start
	$year_end = $cobj->year_end; //get default value of year end
}
//$cobj->setDate($sld, $slm, $sly);

$total_thismonth = $cobj->total_days($m, $y);

if($m == 1){
	$previous_month = 12;
	$previous_year = $y-1;
}else{
	$previous_month = $m-1;
	$previous_year = $y;
}

if($m == 12){
	$next_month = 1;
	$next_year = $y+1;
}else{
	$next_month = $m+1;
	$next_year = $y;
}

$total_lastmonth = $cobj->total_days($previous_month, $previous_year);
$today = date('Y-m-d');

$firstdate = date('w', strtotime($y."-".$m."-1")); //first date of month, 0 (for Sunday) through 6 (for Saturday)

if($firstdate == $startDate){
	//skip last month
	$startwrite = $total_lastmonth+1;
}elseif($firstdate < $startDate){
	$startwrite = $total_lastmonth - (6-($startDate-$firstdate));
}else{
	$startwrite = $total_lastmonth - ($firstdate - $startDate - 1);
}

//--------------------------------
//prepare the calendar in array
//--------------------------------
$calendar_rows = array();
$week_rows = array(); //collection for week number, $week_rows[$row][$week_number] = counter

$dayinweek_counter = 0;
$row_count = 0;

//write previous month
for($day=$startwrite; $day<=$total_lastmonth; $day++){
	$calendar_rows[$row_count][] = array($day, "", "othermonth", "");
	$dayinweek_counter++;

	$wknum = date('W', mktime(0,0,0, $m-1, $day, $y));
	if(!isset($week_rows[$row_count][$wknum])){
		$week_rows[$row_count][$wknum] = 1;
	}else $week_rows[$row_count][$wknum] = $week_rows[$row_count][$wknum]+1;
}

$pvMonthTime = strtotime($previous_year."-".$previous_month."-".$total_lastmonth);

//check lastmonth is on allowed date
if($ta1_set && !$show_not_allow){
	if($pvMonthTime >= $time_allow1){
		$show_previous = true;
	}else $show_previous = false;
}else $show_previous = true; //always show when not set

$date_num = date('w', $pvMonthTime);
if(($startDate == 0 && $date_num == 6) || ($startDate > 0 && $date_num == $startDate-1) && $startwrite<$total_lastmonth){
	if(isset($calendar_rows[0])) $row_count++;
}

$dp_time = ($date_pair_value) ? strtotime($date_pair_value) : 0;

$select_days = array();
if($sld>0 && $slm>0 && $sly>0){
	$sldate = "$sly-$slm-$sld";
	for($i=0; $i<$interval; $i++){
		$this_day = date("Y-m-d", mktime(0,0,0, date('m', strtotime($sldate)), date('d', strtotime($sldate))+$i, date('Y', strtotime($sldate))));
		$select_days[] = strtotime($this_day);
	}
}

//write current month
for($day=1; $day<=$total_thismonth; $day++){
	$date_num = date('w', strtotime($y."-".$m."-".$day));
	$day_txt = date('D', strtotime($y."-".$m."-".$day));

	$currentTime =  strtotime($y."-".$m."-".$day);
	$htmlClass = array();

	$is_today = $currentTime - strtotime($today);
	$htmlClass[] = ($is_today == 0) ? "today" : "general";

	/*
	$is_selected = strtotime($y."-".$m."-".$day) - strtotime($sly."-".$slm."-".$sld);
	if($is_selected == 0) $htmlClass[] = "select";
	*/
	
	if(in_array($currentTime, $select_days)){
		$htmlClass[] = "select";	
	}

	//check date allowed
	if($ta1_set && $ta2_set){
		//both date specified
		$dateLink = ($time_allow1 <= $currentTime && $currentTime <= $time_allow2);
	}elseif($ta1_set){
		//only date 1 specified
		$dateLink = ($currentTime >= $time_allow1);
	}elseif($ta2_set){
		//only date 2 specified
		$dateLink = ($currentTime <= $time_allow2);
	}else{
		//no date allow specified, assume show all
		$dateLink = true;
	}

	if($dateLink){
		//check for disable days
		if(in_array(strtolower($day_txt), $cobj->dsb_days) !== false){
			$dateLink = false;
		}
	}

	//check specific date
	if($dateLink){
		if(is_array($sp_dates) && sizeof($sp_dates) > 0){
			//check if it is current date
			$sp_found = false;

			//check on yearly recursive
			if(isset($sp_dates[2]) && is_array($sp_dates[2])){
				foreach($sp_dates[2] as $sp_time){
					$sp_time_md = date('md', $sp_time);
					$this_md = date('md', $currentTime);
					if($sp_time_md == $this_md){
						$sp_found = true;
						break;
					}
				}
			}

			//check on monthly recursive
			if(isset($sp_dates[1]) && is_array($sp_dates[1]) && !$sp_found){
				foreach($sp_dates[1] as $sp_time){
					if($sp_time != "" && $sp_time > 0){ 
						$sp_time_d = date('d', $sp_time);
						if($sp_time_d == $day){
							$sp_found = true;
							break;
						}
					}
				}
			}

			//check on no recursive
			if(isset($sp_dates[0]) && is_array($sp_dates[0]) && !$sp_found){
				$sp_found = in_array($currentTime, $sp_dates[0]);
			}

			switch($sp_type){
				case 0:
				default:
					//disabled specific and enabled others
					$dateLink = ($sp_found) ? false : true;
					break;
				case 1:
					//enabled specific and disabled others
					$dateLink = ($sp_found) ? true : false;
					break;
			}
		}
	}

	//check date_pair1 & 2
	if($date_pair1 && ($dp_time && $dp_time > 0) && $currentTime >= $dp_time && ($currentTime <= mktime(0,0,0,$slm,$sld,$sly) && $slm>0 && $sld>0 && $sly>0)){ //set date only after date_pair1
		if(!in_array("select", $htmlClass))
			$htmlClass[] = "select";
	}

	if($date_pair2 && ($dp_time && $dp_time > 0) && $currentTime <= $dp_time && ($currentTime >= mktime(0,0,0,$slm,$sld,$sly) && $slm>0 && $sld>0 && $sly>0)){ //set date only before date_pair2
		if(!in_array("select", $htmlClass))
			$htmlClass[] = "select";
	}

	$htmlClass[] = strtolower($day_txt);

	if($dateLink){
		//date with link
		$class = implode(" ", $htmlClass);

		$calendar_rows[$row_count][] = array($day, "javascript:selectDay('".str_pad($day, 2, "0", STR_PAD_LEFT)."');", $class, "$y".str_pad($m, 2, "0", STR_PAD_LEFT).str_pad($day, 2, "0", STR_PAD_LEFT));
	}else{
		$htmlClass[] = "disabledate";
		$class = implode(" ", $htmlClass);

		//date without link
		$calendar_rows[$row_count][] = array($day, "", $class, "$y".str_pad($m, 2, "0", STR_PAD_LEFT).str_pad($day, 2, "0", STR_PAD_LEFT));
	}
	if(($startDate == 0 && $date_num == 6) || ($startDate > 0 && $date_num == $startDate-1)){
		$row_count++;

		$dayinweek_counter = 0;
	}else $dayinweek_counter++;

	$wknum = date('W', mktime(0,0,0, $m, $day, $y));
	if(!isset($week_rows[$row_count][$wknum])){
		$week_rows[$row_count][$wknum] = 1;
	}else $week_rows[$row_count][$wknum] = $week_rows[$row_count][$wknum]+1;
}

//write next other month
$write_end_days = (6-$dayinweek_counter)+1;
if($write_end_days > 0){
	for($day=1; $day<=$write_end_days; $day++){
		$calendar_rows[$row_count][] = array($day, "", "othermonth", "");

		$wknum = date('W', mktime(0,0,0, $m+1, $day, $y));
		if(!isset($week_rows[$row_count][$wknum])){
			$week_rows[$row_count][$wknum] = 1;
		}else $week_rows[$row_count][$wknum] = $week_rows[$row_count][$wknum]+1;
	}
	 $row_count++;
}

//write fulfil row to 6 rows
for($day=$row_count; $day<6; $day++){
	$tmpday = $write_end_days+1;
	for($f=$tmpday; $f<=($tmpday+6); $f++){
		$calendar_rows[$row_count][] = array($f, "", "othermonth", "");

		$wknum = date('W', mktime(0,0,0, $m+1, $f, $y));
		if(!isset($week_rows[$row_count][$wknum])){
			$week_rows[$row_count][$wknum] = 1;
		}else $week_rows[$row_count][$wknum] = $week_rows[$row_count][$wknum]+1;
	}
	$write_end_days += 6;
}

//check next month is on allowed date
if($ta2_set && !$show_not_allow){
	$nxMonthTime = strtotime($next_year."-".$next_month."-1");
	if($nxMonthTime <= $time_allow2){
		$show_next = true;
	}else $show_next = false;
}else $show_next = true; //always show when not set

if($cobj->hl){
	$to_replace = array("d","%"," ",".",",","ב","年","日","년","일");
	$order = str_replace($to_replace,"",L_CAL_FORMAT);
	if(strpos($order,"B") == 0) $first_input = "B";
	elseif(strpos($order,"Y") == 0) $first_input = "Y";
	if(strpos($order,"B") == 1) $second_input = "B";
	elseif(strpos($order,"Y") == 1) $second_input = "Y";
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"<?php if($rtl) echo(" dir=\"rtl\""); ?>>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=7; IE=8" />
<title>TriConsole.com - PHP Calendar Date Picker</title>
<link href="calendar.css" rel="stylesheet" type="text/css" />
<script language="javascript">
<!--
var ccWidth = 0;
var ccHeight = 0;

function setValue(){
	var f = document.calendarform;
	var date_selected = padString(f.selected_year.value, 4, "0") + "-" + padString(f.selected_month.value, 2, "0") + "-" + padString(f.selected_day.value, 2, "0");

	//not use for now
	//toggle = typeof(toggle) != 'undefined' ? toggle : true;

	window.parent.setValue(f.objname.value, date_selected);
}

function unsetValue(){
	var f = document.calendarform;
	f.selected_day.value = "00";
	f.selected_month.value = "00";
	f.selected_year.value = "0000";

	setValue();

	this.loading();
	//f.submit();
}

function restoreValue(){
	var f = document.calendarform;
	var date_selected = padString(f.selected_year.value, 4, "0") + "-" + padString(f.selected_month.value, 2, "0") + "-" + padString(f.selected_day.value, 2, "0");

	window.parent.updateValue(f.objname.value, date_selected);
}

function selectDay(d){
	var f = document.calendarform;
	f.selected_day.value = d.toString();
	f.selected_month.value = f.m[f.m.selectedIndex].value;
	f.selected_year.value = f.y[f.y.selectedIndex].value;

	setValue();

	this.loading();
	//f.submit();

	submitNow(f.selected_day.value, f.selected_month.value, f.selected_year.value);
}

function hL(E, mo){
	//clear last selected
	if(document.getElementById("select")){
		var selectobj = document.getElementById("select");
		selectobj.Id = "";
	}

	while (E.tagName!="TD"){
		E=E.parentElement;
	}

	E.Id = "select";
}

function selectMonth(m){
	var f = document.calendarform;
	f.selected_month.value = m;
}

function selectYear(y){
	var f = document.calendarform;
	f.selected_year.value = y;
}

function move(m, y){
	var f = document.calendarform;
	f.m.value = m;
	f.y.value = y;

	this.loading();
	f.submit();
}

function today(){
	var f = document.calendarform;
	f.m.value = "<?php echo(date('m')); ?>";
	f.y.value = "<?php echo(date('Y')); ?>";

	this.loading();
	f.submit();
}

function closeMe(){
	window.parent.toggleCalendar('<?php echo($objname); ?>');
}

function submitNow(dvalue, mvalue, yvalue){
	<?php
	//write auto submit script
	if($auto_submit){
		echo("if(yvalue>0 && mvalue>0 && dvalue>0){\n");
		if($form_name){
			//submit value by post form
			echo("window.parent.document.".$form_name.".submit();\n");
		}elseif($target_url){
			//submit value by get method
			echo("var date_selected = yvalue + \"-\" + mvalue + \"-\" + dvalue;\n");
			echo("window.parent.location.href='".$target_url."?".$objname."='+date_selected;\n");
		}
		echo("}\n");
	}
	?>
}

function padString(stringToPad, padLength, padString) {
	if (stringToPad.length < padLength) {
		while (stringToPad.length < padLength) {
			stringToPad = padString + stringToPad;
		}
	}else {}
/*
	if (stringToPad.length > padLength) {
		stringToPad = stringToPad.substring((stringToPad.length - padLength), padLength);
	} else {}
*/
	return stringToPad;
}

function loading(){
	if(this.ccWidth > 0 && this.ccHeight > 0){
		var ccobj = getObject('calendar-container');

		ccobj.style.width = this.ccWidth+'px';
		ccobj.style.height = this.ccHeight+'px';
	}

	document.getElementById('calendar-container').innerHTML = "<div id=\"calendar-body\"><div class=\"refresh\"><div align=\"center\" class=\"txt-container\"><?php echo(L_REF_CAL); ?></div></div></div>";
	adjustContainer();
}

function submitCalendar(){
	this.loading();
	document.calendarform.submit();
}

function getObject(item){
	if( window.mmIsOpera ) return(document.getElementById(item));
	if(document.all) return(document.all[item]);
	if(document.getElementById) return(document.getElementById(item));
	if(document.layers) return(document.layers[item]);
	return(false);
}

function adjustContainer(){
	var tc_obj = getObject('calendar-page');
	//var tc_obj = frm_obj.contentWindow.getObject('calendar-page');
	if(tc_obj != null){
		var div_obj = window.parent.document.getElementById('div_<?php echo($objname); ?>');

		if(tc_obj.offsetWidth > 0 && tc_obj.offsetHeight > 0){
			div_obj.style.width = tc_obj.offsetWidth+'px';
			div_obj.style.height = tc_obj.offsetHeight+'px';
			//alert(div_obj.style.width+','+div_obj.style.height);

			var ccsize = getObject('calendar-container');
			this.ccWidth = ccsize.offsetWidth;
			this.ccHeight = ccsize.offsetHeight;
		}
	}
}

window.onload = function(){
	window.parent.setDateLabel('<?php echo($objname); ?>');
	adjustContainer();
	setTimeout("adjustContainer()", 1000);
	restoreValue();
};
//-->
</script>
</head>

<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<div id="calendar-page">
    <div id="calendar-header" align="center">
        <?php if($dp && !$auto_hide){ ?>
        <div align="<?php echo($rtl ? "left" : "right"); ?>" class="closeme"><a href="javascript:closeMe();"><img src="images/close.gif" border="0" /></a></div>
        <?php } ?>
        <form id="calendarform" name="calendarform" method="post" action="<?php echo($thispage);?>">
          <table align="center" cellpadding="1" cellspacing="0">
            <tr>
			<?php
            $monthnames = $cobj->getMonthNames();
			if ($first_input == "B"){
			?>
              <td align="left"><select name="m" onchange="javascript:submitCalendar();">
              <?php
              for($f=1; $f<=sizeof($monthnames); $f++){
                $selected = ($f == (int)$m) ? " selected" : "";
                echo("<option value=\"".str_pad($f, 2, "0", STR_PAD_LEFT)."\"$selected>".$monthnames[$f-1]."</option>");
              }
              ?>
              </select>
			  </td>
			<?php
			}
			elseif ($first_input == "Y"){
			?>
              <td align="left"><select name="y" onchange="javascript:submitCalendar();">
              <?php
              $thisyear = date('Y');

              //write year options
              for($year=$year_end; $year>=$year_start; $year--){
                $selected = ($year == $y) ? " selected" : "";
                echo("<option value=\"".$year."\"$selected>".$year.(L_USE_YMD_DROP ? L_YEAR : "")."</option>");
              }
              ?>
              </select>
			  </td>
			<?php
			}
			if ($second_input == "B"){
			?>
              <td align="right"><select name="m" onchange="javascript:submitCalendar();">
              <?php
              for($f=1; $f<=sizeof($monthnames); $f++){
                $selected = ($f == (int)$m) ? " selected" : "";
                echo("<option value=\"".str_pad($f, 2, "0", STR_PAD_LEFT)."\"$selected>".$monthnames[$f-1]."</option>");
              }
              ?>
              </select>
			  </td>
			<?php
			}
			elseif ($second_input == "Y"){
			?>
              <td align="right"><select name="y" onchange="javascript:submitCalendar();">
              <?php
              $thisyear = date('Y');

              //write year options
              for($year=$year_end; $year>=$year_start; $year--){
                $selected = ($year == $y) ? " selected" : "";
                echo("<option value=\"".$year."\"$selected>".$year.(L_USE_YMD_DROP ? L_YEAR : "")."</option>");
              }
              ?>
              </select>
			  </td>
			<?php
			}
			?>
            </tr>
          </table>
            <input name="selected_day" type="hidden" id="selected_day" value="<?php echo($sld);?>" />
            <input name="selected_month" type="hidden" id="selected_month" value="<?php echo($slm);?>" />
            <input name="selected_year" type="hidden" id="selected_year" value="<?php echo($sly);?>" />
            <input name="year_start" type="hidden" id="year_start" value="<?php echo($year_start);?>" />
            <input name="year_end" type="hidden" id="year_end" value="<?php echo($year_end);?>" />
            <input name="objname" type="hidden" id="objname" value="<?php echo($objname);?>" />
            <input name="dp" type="hidden" id="dp" value="<?php echo($dp);?>" />
            <input name="da1" type="hidden" id="da1" value="<?php echo($time_allow1);?>" />
            <input name="da2" type="hidden" id="da2" value="<?php echo($time_allow2);?>" />
            <input name="sna" type="hidden" id="sna" value="<?php echo($show_not_allow);?>" />
            <input name="aut" type="hidden" id="aut" value="<?php echo($auto_submit);?>" />
            <input name="frm" type="hidden" id="frm" value="<?php echo($form_name);?>" />
            <input name="tar" type="hidden" id="tar" value="<?php echo($target_url);?>" />
            <input name="inp" type="hidden" id="inp" value="<?php echo($show_input);?>" />
            <input name="fmt" type="hidden" id="fmt" value="<?php echo($date_format);?>" />
            <input name="dis" type="hidden" id="dis" value="<?php echo($dsb_txt);?>" />
            <input name="pr1" type="hidden" id="pr1" value="<?php echo($date_pair1);?>" />
            <input name="pr2" type="hidden" id="pr2" value="<?php echo($date_pair2);?>" />
            <input name="prv" type="hidden" id="prv" value="<?php echo($date_pair_value);?>" />
            <input name="pth" type="hidden" id="pth" value="<?php echo($path);?>" />
            <input name="spd" type="hidden" id="spd" value="<?php echo($cobj->check_json_encode($sp_dates));?>" />
            <input name="spt" type="hidden" id="spt" value="<?php echo($sp_type);?>" />
            <input name="och" type="hidden" id="och" value="<?php echo(urldecode($tc_onchanged));?>" />
            <input name="str" type="hidden" id="str" value="<?php echo($startDate);?>" />
            <input name="rtl" type="hidden" id="rtl" value="<?php echo($rtl);?>" />
            <input name="wks" type="hidden" id="wks" value="<?php echo($show_weeks);?>" />
            <input name="int" type="hidden" id="int" value="<?php echo($interval);?>" />
            <input name="hid" type="hidden" id="hid" value="<?php echo($auto_hide);?>" />
            <input name="hdt" type="hidden" id="hdt" value="<?php echo($auto_hide_time);?>" />
            <input name="hl" type="hidden" id="hl" value="<?php echo($hl);?>" />
      </form>
    </div>
    <div id="calendar-container">
        <div id="calendar-body">
        <table border="0" cellspacing="1" cellpadding="0" align="center">
            <?php
            $day_headers = array_values($cobj->getDayHeaders());

            echo("<tr>");

			if ($show_weeks) echo("<td align=\"center\" class=\"header wk-hdr\"><div>".$cobj->week_hdr."</div></td>");

			//write calendar day header
            foreach($day_headers as $dh){
                echo("<td align=\"center\" class=\"header\"><div>".$dh."</div></td>");
            }
            echo("</tr>");

			for($row=0; $row<sizeof($calendar_rows); $row++){
				echo("<tr>");

				if ($show_weeks){
					asort($week_rows[$row]);

					//get week number with highest member
					$cw_keys = array_keys($week_rows[$row]);

					echo("<td align=\"center\" class=\"wk\"><div>".$cw_keys[(sizeof($cw_keys)-1)]."</div></td>");
				}

				foreach($calendar_rows[$row] as $column){
					$this_day = isset($column[0]) ? $column[0] : "";
					$this_link = isset($column[1]) ? $column[1] : "";
					$this_class = isset($column[2]) ? $column[2] : "";
					$this_id = isset($column[3]) ? $column[3] : "";
					
					$id_str = ($this_id) ? " id=\"$this_id\"" : "";

					if($this_link){
						echo("<td$id_str align=\"center\" class=\"$this_class\"><a href=\"$this_link\"><div>$this_day</div></a></td>");
					}else{
						echo("<td$id_str align=\"center\" class=\"$this_class\"><div>$this_day</div></td>");
					}
				}
				echo("</tr>");
			}
        ?>
        </table>
        </div>
        <?php
        if(($previous_year >= $year_start || $next_year <= $year_end) && ($show_previous || $show_next)){
        ?>
        <div id="calendar-footer">
          <div class="btn">
            <div style="float: <?php echo($rtl ? "right" : "left"); ?>;">
            <?php
            if($previous_year >= $year_start && $show_previous){
            ?><a href="javascript:move('<?php echo(str_pad($previous_month, 2, "0", STR_PAD_LEFT));?>', '<?php echo($previous_year);?>');"><img src="images/btn_<?php echo($rtl ? "next" : "previous"); ?>.png" width="16" height="16" border="0" alt="<?php echo(L_PREV); ?>" title="<?php echo(L_PREV); ?>" /></a>
			<?php
            }else echo("&nbsp;");
            ?>
            </div>
            <div style="float: <?php echo($rtl ? "left" : "right"); ?>;">
            <?php
            if($next_year <= $year_end && $show_next){
            ?><a href="javascript:move('<?php echo(str_pad($next_month, 2, "0", STR_PAD_LEFT));?>', '<?php echo($next_year);?>');"><img src="images/btn_<?php echo($rtl ? "previous" : "next"); ?>.png" width="16" height="16" border="0" alt="<?php echo(L_NEXT); ?>" title="<?php echo(L_NEXT); ?>" /></a>
			<?php
            }else echo("&nbsp;");
            ?>
            </div>
            <div style="margin-left: 30px; margin-right: 30px;" align="center">
            	<a href="javascript:today();" class="txt"><?php echo(L_TODAY); ?></a>
                <?php
				if($sld>0 && $slm>0 && $sly>0){
				?> | <a href="javascript:unsetValue();" class="txt"><?php echo(L_UNSET); ?></a>
                <?php
				}
				?>
            </div>
            <div style="clear: both;"></div>
          </div>
        </div>
        <?php
          }
          ?>
    </div>
</div>
<div style="clear: both;"></div>
</body>
</html>