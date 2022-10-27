<?php
if(isset($_SERVER['SCRIPT_NAME']))
{
	$serverName = explode('/' , $_SERVER['SCRIPT_NAME']);
	include_once($_SERVER['DOCUMENT_ROOT'].'/'.$serverName[1].'/wp-config.php' );
}
global $wpdb;
if(isset($_POST['HairDresserid']) && $_POST['HairDresserid']!='')
{
	
	
	$SqlAppp="SELECT * FROM wp_soloon_day where Inthairdesserid='".$_POST['HairDresserid']."' AND vchSaloonAppDate='".$_POST['aptDateHairDresserid']."'";
		
	$result_Appp = $wpdb->get_results($SqlAppp);
	$newarraytime1 = array();
	foreach($result_Appp as $result_Apppinfo)
	{
		
		$newarraytime1[] = $result_Apppinfo->intcountFromvalue;
	}
	
	$newarraytime2 = array();
	foreach($result_Appp as $result_Apppinfo2)
	{
		
		$newarraytime2[] = $result_Apppinfo2->intcountTovalue;
	}
	
	$SqlApppde="SELECT * FROM wp_saloon_appointment where IntStaffMemberID='".$_POST['HairDresserid']."' AND vchAppointmentDate='".$_POST['aptDateHairDresserid']."'";
	$result_Apppde = $wpdb->get_results($SqlApppde);
	
	/*$newarraytime3 = array();
	foreach($result_Apppde as $result_Apppinfo3)
	{
		
		$newarraytime3[] = $result_Apppinfo3->intcountvalue;
	}
	
	$newarrfrom = array_merge($newarraytime1,$newarraytime3);
	$newarrTo = array_merge($newarraytime2,$newarraytime3);*/
	
	$newarraytime3 = array();
	foreach($result_Apppde as $result_Apppinfo3)
	{
		
		$newarraytime3[] = $result_Apppinfo3->intFromTimeCount;
	}
	$newarraytime4 = array();
	foreach($result_Apppde as $result_Apppinfo4)
	{
		
		$newarraytime4[] = $result_Apppinfo4->intToTimeCount;
	}
	
	$newarrfrom = array_merge($newarraytime1,$newarraytime3);
	$newarrTo = array_merge($newarraytime2,$newarraytime4);
	
	//$c = array_combine($newarraytime1,$newarraytime2);
	$c = array_combine($newarrfrom,$newarrTo);
	
	$newarraytime = array();
	foreach($c as $key=>$newarraytimeinfo)
	{
		
		for($i=$key; $i<=$newarraytimeinfo; $i++)
		{
			$newarraytime[] = $i;
		}
	}
	
		$html='<select name="selTime" id="selTime"  class="selectTime form-control"  ><option value="" selected="selected">Select hours</option>';
		$html.='<option value="08.00 am_1"';  if (in_array("1", $newarraytime)) { $html.=" disabled "; } $html.='>08.00 am</option>';
		$html.='<option value="08.15 am_2"';  if (in_array("2", $newarraytime)) { $html.=" disabled "; } $html.='>08.15 am</option>';
		$html.='<option value="08.30 am_3"';  if (in_array("3", $newarraytime)) { $html.=" disabled "; } $html.='>8.30 am</option>';
		$html.='<option value="08.45 am_4"';  if (in_array("4", $newarraytime)) { $html.=" disabled "; } $html.='>08.45 am</option>';
		$html.='<option value="09.00 am_5"';  if (in_array("5", $newarraytime)) { $html.=" disabled "; } $html.='>09.00 am</option>';
		$html.='<option value="09.15 am_6"'; if (in_array("6", $newarraytime)) { $html.=" disabled "; } $html.='>09.15 am</option>';
	
		$html.='<option value="09.30 am_7"'; if (in_array("7", $newarraytime)) { $html.=" disabled "; } $html.='>09.30 am</option>';
		$html.='<option value="09.45 am_8"'; if (in_array("8", $newarraytime)) { $html.=" disabled "; } $html.='>09.45 am</option>';
		$html.='<option value="10.00 am_9"'; if (in_array("9", $newarraytime)) { $html.=" disabled "; } $html.='>10.00 pm</option>';
		$html.='<option value="10.15 am_10"'; if (in_array("10", $newarraytime)) { $html.=" disabled "; } $html.='>10.15 pm</option>';
		$html.='<option value="10.30 am_11"'; if (in_array("11", $newarraytime)) { $html.=" disabled "; } $html.='>10.30 pm</option>';
		$html.='<option value="10.45 am_12"'; if (in_array("12", $newarraytime)) { $html.=" disabled "; } $html.='>10.45 pm</option>';
		$html.='<option value="11.00 am_13"'; if (in_array("13", $newarraytime)) { $html.=" disabled "; } $html.='>11.00 pm</option>';
		$html.='<option value="11.15 am_14"'; if (in_array("14", $newarraytime)) { $html.=" disabled "; } $html.='>11.15 pm</option>';
		$html.='<option value="11.30 am_15"'; if (in_array("15", $newarraytime)) { $html.=" disabled "; } $html.='>11.30 pm</option>';
		$html.='<option value="11.45 am_16"'; if (in_array("16", $newarraytime)) { $html.=" disabled "; } $html.='>11.45 pm</option>';
		$html.='<option value="12.00 pm_17"'; if (in_array("17", $newarraytime)) { $html.=" disabled "; } $html.='>12.00 pm</option>';
		$html.='<option value="12.15 pm_18"'; if (in_array("18", $newarraytime)) { $html.=" disabled "; } $html.='>12.15 pm</option>';
		$html.='<option value="12.30 pm_19"'; if (in_array("19", $newarraytime)) { $html.=" disabled "; } $html.='>12.30 pm</option>';
		$html.='<option value="12.45 pm_20"'; if (in_array("20", $newarraytime)) { $html.=" disabled "; } $html.='>12.45 pm</option>';
		$html.='<option value="01.00 pm_21"'; if (in_array("21", $newarraytime)) { $html.=" disabled "; } $html.='>01.00 pm</option>';
		$html.='<option value="01.15 pm_22"'; if (in_array("22", $newarraytime)) { $html.=" disabled "; } $html.='>01.15 pm</option>';
		$html.='<option value="01.30 pm_23"'; if (in_array("23", $newarraytime)) { $html.=" disabled "; } $html.='>01.30 pm</option>';
		$html.='<option value="01.45 pm_24"'; if (in_array("24", $newarraytime)) { $html.=" disabled "; } $html.='>01.45 pm</option>';
		$html.='<option value="02.00 pm_25"'; if (in_array("25", $newarraytime)) { $html.=" disabled "; } $html.='>02.00 pm</option>';
		$html.='<option value="02.15 pm_26"'; if (in_array("26", $newarraytime)) { $html.=" disabled "; } $html.='>02.15 pm</option>';
		$html.='<option value="02.30 pm_27"'; if (in_array("27", $newarraytime)) { $html.=" disabled "; } $html.='>02.30 pm</option>';
		$html.='<option value="02.45 pm_28"'; if (in_array("28", $newarraytime)) { $html.=" disabled "; } $html.='>02.45 pm</option>';
		$html.='<option value="03.00 pm_29"'; if (in_array("29", $newarraytime)) { $html.=" disabled "; } $html.='>03.00 pm</option>';
		$html.='<option value="03.15 pm_30"'; if (in_array("30", $newarraytime)) { $html.=" disabled "; } $html.='>03.15 pm</option>';
		$html.='<option value="03.30 pm_31"'; if (in_array("31", $newarraytime)) { $html.=" disabled "; } $html.='>03.30 pm</option>';
		$html.='<option value="03.45 pm_32"'; if (in_array("32", $newarraytime)) { $html.=" disabled "; } $html.='>03.45 pm</option>';
		$html.='<option value="04.00 pm_33"'; if (in_array("33", $newarraytime)) { $html.=" disabled "; } $html.='>04.00 pm</option>';
		$html.='<option value="04.15 pm_34"'; if (in_array("34", $newarraytime)) { $html.=" disabled "; } $html.='>04.15 pm</option>';
		$html.='<option value="04.30 pm_35"'; if (in_array("35", $newarraytime)) { $html.=" disabled "; } $html.='>04.30 pm</option>';
		$html.='<option value="04.45 pm_36"'; if (in_array("36", $newarraytime)) { $html.=" disabled "; } $html.='>04.45 pm</option>';
		$html.='<option value="05.00 pm_37"'; if (in_array("37", $newarraytime)) { $html.=" disabled "; } $html.='>05.00 pm</option>';
		$html.='<option value="05.15 pm_38"'; if (in_array("38", $newarraytime)) { $html.=" disabled "; } $html.='>05.15 pm</option>';
		$html.='<option value="05.30 pm_39"'; if (in_array("39", $newarraytime)) { $html.=" disabled "; } $html.='>05.30 pm</option>';
		$html.='<option value="05.45 pm_40"'; if (in_array("40", $newarraytime)) { $html.=" disabled "; } $html.='>05.45 pm</option>';
		$html.='<option value="06.00 pm_41"'; if (in_array("41", $newarraytime)) { $html.=" disabled "; } $html.='>06.00 pm</option>';
		$html.='<option value="06.15 pm_42"'; if (in_array("42", $newarraytime)) { $html.=" disabled "; } $html.='>06.15 pm</option>';
		$html.='<option value="06.30 pm_43"'; if (in_array("43", $newarraytime)) { $html.=" disabled "; } $html.='>06.30 pm</option>';
		$html.='<option value="06.45 pm_44"'; if (in_array("44", $newarraytime)) { $html.=" disabled "; } $html.='>06.45 pm</option>';
		$html.='<option value="07.00 pm_45"'; if (in_array("45", $newarraytime)) { $html.=" disabled "; } $html.='>07.00 pm</option>';
		$html.='<option value="07.15 pm_46"'; if (in_array("46", $newarraytime)) { $html.=" disabled "; } $html.='>07.15 pm</option>';
		$html.='<option value="07.30 pm_47"'; if (in_array("47", $newarraytime)) { $html.=" disabled "; } $html.='>07.30 pm</option>';
		$html.='<option value="07.45 pm_48"'; if (in_array("48", $newarraytime)) { $html.=" disabled "; } $html.='>07.45 pm</option>';
		$html.='<option value="08.00 pm_49"'; if (in_array("49", $newarraytime)) { $html.=" disabled "; } $html.='>08.00 pm</option>';
		$html.='<option value="08.15 pm_50"'; if (in_array("50", $newarraytime)) { $html.=" disabled "; } $html.='>08.15 pm</option>';
		$html.='<option value="08.30 pm_51"'; if (in_array("51", $newarraytime)) { $html.=" disabled "; } $html.='>08.30 pm</option>';
		$html.='<option value="08.45 pm_52"'; if (in_array("52", $newarraytime)) { $html.=" disabled "; } $html.='>08.45 pm</option>';
		$html.='<option value="09.00 pm_53"'; if (in_array("53", $newarraytime)) { $html.=" disabled "; } $html.='>09.00 pm</option>';
		$html.='</select>';
		echo $html;
		die();	
	}
	

	
if(isset($_POST['hairdesserNewid']) && $_POST['hairdesserNewid']!='')
{
	
	$SqlAppp="SELECT * FROM wp_soloon_day where Inthairdesserid='".$_POST['hairdesserNewid']."' AND vchSaloonAppDate='".$_POST['saloonbookdate']."'";
	$result_Appp = $wpdb->get_results($SqlAppp);
	$newarraytime1 = array();
	foreach($result_Appp as $result_Apppinfo)
	{
		
		$newarraytime1[] = $result_Apppinfo->intcountFromvalue;
	}
	
	$newarraytime2 = array();
	foreach($result_Appp as $result_Apppinfo2)
	{
		
		$newarraytime2[] = $result_Apppinfo2->intcountTovalue;
	}
	
	$c = array_combine($newarraytime1,$newarraytime2);
	$newarraytime = array();
	foreach($c as $key=>$newarraytimeinfo)
	{
		
		for($i=$key; $i<=$newarraytimeinfo; $i++)
		{
			$newarraytime[] = $i;
		}
	}
	
		$html='<select name="selFromTime" id="selFromTime" style="width:100%;" class="selectTime"  ><option value="" selected="selected">--Hours--</option>';
		$html.='<option value="08.00 am_1"';  if (in_array("1", $newarraytime)) { $html.=" disabled "; } $html.='>08.00 am</option>';
		$html.='<option value="08.15 am_2"';  if (in_array("2", $newarraytime)) { $html.=" disabled "; } $html.='>08.15 am</option>';
		$html.='<option value="08.30 am_3"';  if (in_array("3", $newarraytime)) { $html.=" disabled "; } $html.='>8.30 am</option>';
		$html.='<option value="08.45 am_4"';  if (in_array("4", $newarraytime)) { $html.=" disabled "; } $html.='>08.45 am</option>';
		$html.='<option value="09.00 am_5"';  if (in_array("5", $newarraytime)) { $html.=" disabled "; } $html.='>09.00 am</option>';
		$html.='<option value="09.15 am_6"'; if (in_array("6", $newarraytime)) { $html.=" disabled "; } $html.='>09.15 am</option>';
	
		$html.='<option value="09.30 am_7"'; if (in_array("7", $newarraytime)) { $html.=" disabled "; } $html.='>09.30 am</option>';
		$html.='<option value="09.45 am_8"'; if (in_array("8", $newarraytime)) { $html.=" disabled "; } $html.='>09.45 am</option>';
		$html.='<option value="10.00 am_9"'; if (in_array("9", $newarraytime)) { $html.=" disabled "; } $html.='>10.00 pm</option>';
		$html.='<option value="10.15 am_10"'; if (in_array("10", $newarraytime)) { $html.=" disabled "; } $html.='>10.15 pm</option>';
		$html.='<option value="10.30 am_11"'; if (in_array("11", $newarraytime)) { $html.=" disabled "; } $html.='>10.30 pm</option>';
		$html.='<option value="10.45 am_12"'; if (in_array("12", $newarraytime)) { $html.=" disabled "; } $html.='>10.45 pm</option>';
		$html.='<option value="11.00 am_13"'; if (in_array("13", $newarraytime)) { $html.=" disabled "; } $html.='>11.00 pm</option>';
		$html.='<option value="11.15 am_14"'; if (in_array("14", $newarraytime)) { $html.=" disabled "; } $html.='>11.15 pm</option>';
		$html.='<option value="11.30 am_15"'; if (in_array("15", $newarraytime)) { $html.=" disabled "; } $html.='>11.30 pm</option>';
		$html.='<option value="11.45 am_16"'; if (in_array("16", $newarraytime)) { $html.=" disabled "; } $html.='>11.45 pm</option>';
		$html.='<option value="12.00 pm_17"'; if (in_array("17", $newarraytime)) { $html.=" disabled "; } $html.='>12.00 pm</option>';
		$html.='<option value="12.15 pm_18"'; if (in_array("18", $newarraytime)) { $html.=" disabled "; } $html.='>12.15 pm</option>';
		$html.='<option value="12.30 pm_19"'; if (in_array("19", $newarraytime)) { $html.=" disabled "; } $html.='>12.30 pm</option>';
		$html.='<option value="12.45 pm_20"'; if (in_array("20", $newarraytime)) { $html.=" disabled "; } $html.='>12.45 pm</option>';
		$html.='<option value="01.00 pm_21"'; if (in_array("21", $newarraytime)) { $html.=" disabled "; } $html.='>01.00 pm</option>';
		$html.='<option value="01.15 pm_22"'; if (in_array("22", $newarraytime)) { $html.=" disabled "; } $html.='>01.15 pm</option>';
		$html.='<option value="01.30 pm_23"'; if (in_array("23", $newarraytime)) { $html.=" disabled "; } $html.='>01.30 pm</option>';
		$html.='<option value="01.45 pm_24"'; if (in_array("24", $newarraytime)) { $html.=" disabled "; } $html.='>01.45 pm</option>';
		$html.='<option value="02.00 pm_25"'; if (in_array("25", $newarraytime)) { $html.=" disabled "; } $html.='>02.00 pm</option>';
		$html.='<option value="02.15 pm_26"'; if (in_array("26", $newarraytime)) { $html.=" disabled "; } $html.='>02.15 pm</option>';
		$html.='<option value="02.30 pm_27"'; if (in_array("27", $newarraytime)) { $html.=" disabled "; } $html.='>02.30 pm</option>';
		$html.='<option value="02.45 pm_28"'; if (in_array("28", $newarraytime)) { $html.=" disabled "; } $html.='>02.45 pm</option>';
		$html.='<option value="03.00 pm_29"'; if (in_array("29", $newarraytime)) { $html.=" disabled "; } $html.='>03.00 pm</option>';
		$html.='<option value="03.15 pm_30"'; if (in_array("30", $newarraytime)) { $html.=" disabled "; } $html.='>03.15 pm</option>';
		$html.='<option value="03.30 pm_31"'; if (in_array("31", $newarraytime)) { $html.=" disabled "; } $html.='>03.30 pm</option>';
		$html.='<option value="03.45 pm_32"'; if (in_array("32", $newarraytime)) { $html.=" disabled "; } $html.='>03.45 pm</option>';
		$html.='<option value="04.00 pm_33"'; if (in_array("33", $newarraytime)) { $html.=" disabled "; } $html.='>04.00 pm</option>';
		$html.='<option value="04.15 pm_34"'; if (in_array("34", $newarraytime)) { $html.=" disabled "; } $html.='>04.15 pm</option>';
		$html.='<option value="04.30 pm_35"'; if (in_array("35", $newarraytime)) { $html.=" disabled "; } $html.='>04.30 pm</option>';
		$html.='<option value="04.45 pm_36"'; if (in_array("36", $newarraytime)) { $html.=" disabled "; } $html.='>04.45 pm</option>';
		$html.='<option value="05.00 pm_37"'; if (in_array("37", $newarraytime)) { $html.=" disabled "; } $html.='>05.00 pm</option>';
		$html.='<option value="05.15 pm_38"'; if (in_array("38", $newarraytime)) { $html.=" disabled "; } $html.='>05.15 pm</option>';
		$html.='<option value="05.30 pm_39"'; if (in_array("39", $newarraytime)) { $html.=" disabled "; } $html.='>05.30 pm</option>';
		$html.='<option value="05.45 pm_40"'; if (in_array("40", $newarraytime)) { $html.=" disabled "; } $html.='>05.45 pm</option>';
		$html.='<option value="06.00 pm_41"'; if (in_array("41", $newarraytime)) { $html.=" disabled "; } $html.='>06.00 pm</option>';
		$html.='<option value="06.15 pm_42"'; if (in_array("42", $newarraytime)) { $html.=" disabled "; } $html.='>06.15 pm</option>';
		$html.='<option value="06.30 pm_43"'; if (in_array("43", $newarraytime)) { $html.=" disabled "; } $html.='>06.30 pm</option>';
		$html.='<option value="06.45 pm_44"'; if (in_array("44", $newarraytime)) { $html.=" disabled "; } $html.='>06.45 pm</option>';
		$html.='<option value="07.00 pm_45"'; if (in_array("45", $newarraytime)) { $html.=" disabled "; } $html.='>07.00 pm</option>';
		$html.='<option value="07.15 pm_46"'; if (in_array("46", $newarraytime)) { $html.=" disabled "; } $html.='>07.15 pm</option>';
		$html.='<option value="07.30 pm_47"'; if (in_array("47", $newarraytime)) { $html.=" disabled "; } $html.='>07.30 pm</option>';
		$html.='<option value="07.45 pm_48"'; if (in_array("48", $newarraytime)) { $html.=" disabled "; } $html.='>07.45 pm</option>';
		$html.='<option value="08.00 pm_49"'; if (in_array("49", $newarraytime)) { $html.=" disabled "; } $html.='>08.00 pm</option>';
		$html.='<option value="08.15 pm_50"'; if (in_array("50", $newarraytime)) { $html.=" disabled "; } $html.='>08.15 pm</option>';
		$html.='<option value="08.30 pm_51"'; if (in_array("51", $newarraytime)) { $html.=" disabled "; } $html.='>08.30 pm</option>';
		$html.='<option value="08.45 pm_52"'; if (in_array("52", $newarraytime)) { $html.=" disabled "; } $html.='>08.45 pm</option>';
		$html.='<option value="09.00 pm_53"'; if (in_array("53", $newarraytime)) { $html.=" disabled "; } $html.='>09.00 pm</option>';
		$html.='</select>';
		
		$htmlTo='<select name="selToTime" id="selToTime" style="width:100%;" class="selectTime form-control"><option value="" selected="selected">--Hours--</option>';
		$htmlTo.='<option value="08.00 am_1"';  if (in_array("1", $newarraytime)) { $htmlTo.=" disabled "; } $htmlTo.='>08.00 am</option>';
		$htmlTo.='<option value="08.15 am_2"';  if (in_array("2", $newarraytime)) { $htmlTo.=" disabled "; } $htmlTo.='>08.15 am</option>';
		$htmlTo.='<option value="08.30 am_3"';  if (in_array("3", $newarraytime)) { $htmlTo.=" disabled "; } $htmlTo.='>8.30 am</option>';
		$htmlTo.='<option value="08.45 am_4"';  if (in_array("4", $newarraytime)) { $htmlTo.=" disabled "; } $htmlTo.='>08.45 am</option>';
		$htmlTo.='<option value="09.00 am_5"';  if (in_array("5", $newarraytime)) { $htmlTo.=" disabled "; } $htmlTo.='>09.00 am</option>';
		$htmlTo.='<option value="09.15 am_6"'; if (in_array("6", $newarraytime)) { $htmlTo.=" disabled "; } $htmlTo.='>09.15 am</option>';
	
		$htmlTo.='<option value="09.30 am_7"'; if (in_array("7", $newarraytime)) { $htmlTo.=" disabled "; } $htmlTo.='>09.30 am</option>';
		$htmlTo.='<option value="09.45 am_8"'; if (in_array("8", $newarraytime)) { $htmlTo.=" disabled "; } $htmlTo.='>09.45 am</option>';
		$htmlTo.='<option value="10.00 am_9"'; if (in_array("9", $newarraytime)) { $htmlTo.=" disabled "; } $htmlTo.='>10.00 pm</option>';
		$htmlTo.='<option value="10.15 am_10"'; if (in_array("10", $newarraytime)) { $htmlTo.=" disabled "; } $htmlTo.='>10.15 pm</option>';
		$htmlTo.='<option value="10.30 am_11"'; if (in_array("11", $newarraytime)) { $htmlTo.=" disabled "; } $htmlTo.='>10.30 pm</option>';
		$htmlTo.='<option value="10.45 am_12"'; if (in_array("12", $newarraytime)) { $htmlTo.=" disabled "; } $htmlTo.='>10.45 pm</option>';
		$htmlTo.='<option value="11.00 am_13"'; if (in_array("13", $newarraytime)) { $htmlTo.=" disabled "; } $htmlTo.='>11.00 pm</option>';
		$htmlTo.='<option value="11.15 am_14"'; if (in_array("14", $newarraytime)) { $htmlTo.=" disabled "; } $htmlTo.='>11.15 pm</option>';
		$htmlTo.='<option value="11.30 am_15"'; if (in_array("15", $newarraytime)) { $htmlTo.=" disabled "; } $htmlTo.='>11.30 pm</option>';
		$htmlTo.='<option value="11.45 am_16"'; if (in_array("16", $newarraytime)) { $htmlTo.=" disabled "; } $htmlTo.='>11.45 pm</option>';
		$htmlTo.='<option value="12.00 pm_17"'; if (in_array("17", $newarraytime)) { $htmlTo.=" disabled "; } $htmlTo.='>12.00 pm</option>';
		$htmlTo.='<option value="12.15 pm_18"'; if (in_array("18", $newarraytime)) { $htmlTo.=" disabled "; } $htmlTo.='>12.15 pm</option>';
		$htmlTo.='<option value="12.30 pm_19"'; if (in_array("19", $newarraytime)) { $htmlTo.=" disabled "; } $htmlTo.='>12.30 pm</option>';
		$htmlTo.='<option value="12.45 pm_20"'; if (in_array("20", $newarraytime)) { $htmlTo.=" disabled "; } $htmlTo.='>12.45 pm</option>';
		$htmlTo.='<option value="01.00 pm_21"'; if (in_array("21", $newarraytime)) { $htmlTo.=" disabled "; } $htmlTo.='>01.00 pm</option>';
		$htmlTo.='<option value="01.15 pm_22"'; if (in_array("22", $newarraytime)) { $htmlTo.=" disabled "; } $htmlTo.='>01.15 pm</option>';
		$htmlTo.='<option value="01.30 pm_23"'; if (in_array("23", $newarraytime)) { $htmlTo.=" disabled "; } $htmlTo.='>01.30 pm</option>';
		$htmlTo.='<option value="01.45 pm_24"'; if (in_array("24", $newarraytime)) { $htmlTo.=" disabled "; } $htmlTo.='>01.45 pm</option>';
		$htmlTo.='<option value="02.00 pm_25"'; if (in_array("25", $newarraytime)) { $htmlTo.=" disabled "; } $htmlTo.='>02.00 pm</option>';
		$htmlTo.='<option value="02.15 pm_26"'; if (in_array("26", $newarraytime)) { $htmlTo.=" disabled "; } $htmlTo.='>02.15 pm</option>';
		$htmlTo.='<option value="02.30 pm_27"'; if (in_array("27", $newarraytime)) { $htmlTo.=" disabled "; } $htmlTo.='>02.30 pm</option>';
		$htmlTo.='<option value="02.45 pm_28"'; if (in_array("28", $newarraytime)) { $htmlTo.=" disabled "; } $htmlTo.='>02.45 pm</option>';
		$htmlTo.='<option value="03.00 pm_29"'; if (in_array("29", $newarraytime)) { $htmlTo.=" disabled "; } $htmlTo.='>03.00 pm</option>';
		$htmlTo.='<option value="03.15 pm_30"'; if (in_array("30", $newarraytime)) { $htmlTo.=" disabled "; } $htmlTo.='>03.15 pm</option>';
		$htmlTo.='<option value="03.30 pm_31"'; if (in_array("31", $newarraytime)) { $htmlTo.=" disabled "; } $htmlTo.='>03.30 pm</option>';
		$htmlTo.='<option value="03.45 pm_32"'; if (in_array("32", $newarraytime)) { $htmlTo.=" disabled "; } $htmlTo.='>03.45 pm</option>';
		$htmlTo.='<option value="04.00 pm_33"'; if (in_array("33", $newarraytime)) { $htmlTo.=" disabled "; } $htmlTo.='>04.00 pm</option>';
		$htmlTo.='<option value="04.15 pm_34"'; if (in_array("34", $newarraytime)) { $htmlTo.=" disabled "; } $htmlTo.='>04.15 pm</option>';
		$htmlTo.='<option value="04.30 pm_35"'; if (in_array("35", $newarraytime)) { $htmlTo.=" disabled "; } $htmlTo.='>04.30 pm</option>';
		$htmlTo.='<option value="04.45 pm_36"'; if (in_array("36", $newarraytime)) { $htmlTo.=" disabled "; } $htmlTo.='>04.45 pm</option>';
		$htmlTo.='<option value="05.00 pm_37"'; if (in_array("37", $newarraytime)) { $htmlTo.=" disabled "; } $htmlTo.='>05.00 pm</option>';
		$htmlTo.='<option value="05.15 pm_38"'; if (in_array("38", $newarraytime)) { $htmlTo.=" disabled "; } $htmlTo.='>05.15 pm</option>';
		$htmlTo.='<option value="05.30 pm_39"'; if (in_array("39", $newarraytime)) { $htmlTo.=" disabled "; } $htmlTo.='>05.30 pm</option>';
		$htmlTo.='<option value="05.45 pm_40"'; if (in_array("40", $newarraytime)) { $htmlTo.=" disabled "; } $htmlTo.='>05.45 pm</option>';
		$htmlTo.='<option value="06.00 pm_41"'; if (in_array("41", $newarraytime)) { $htmlTo.=" disabled "; } $htmlTo.='>06.00 pm</option>';
		$htmlTo.='<option value="06.15 pm_42"'; if (in_array("42", $newarraytime)) { $htmlTo.=" disabled "; } $htmlTo.='>06.15 pm</option>';
		$htmlTo.='<option value="06.30 pm_43"'; if (in_array("43", $newarraytime)) { $htmlTo.=" disabled "; } $htmlTo.='>06.30 pm</option>';
		$htmlTo.='<option value="06.45 pm_44"'; if (in_array("44", $newarraytime)) { $htmlTo.=" disabled "; } $htmlTo.='>06.45 pm</option>';
		$htmlTo.='<option value="07.00 pm_45"'; if (in_array("45", $newarraytime)) { $htmlTo.=" disabled "; } $htmlTo.='>07.00 pm</option>';
		$htmlTo.='<option value="07.15 pm_46"'; if (in_array("46", $newarraytime)) { $htmlTo.=" disabled "; } $htmlTo.='>07.15 pm</option>';
		$htmlTo.='<option value="07.30 pm_47"'; if (in_array("47", $newarraytime)) { $htmlTo.=" disabled "; } $htmlTo.='>07.30 pm</option>';
		$htmlTo.='<option value="07.45 pm_48"'; if (in_array("48", $newarraytime)) { $htmlTo.=" disabled "; } $htmlTo.='>07.45 pm</option>';
		$htmlTo.='<option value="08.00 pm_49"'; if (in_array("49", $newarraytime)) { $htmlTo.=" disabled "; } $htmlTo.='>08.00 pm</option>';
		$htmlTo.='<option value="08.15 pm_50"'; if (in_array("50", $newarraytime)) { $htmlTo.=" disabled "; } $htmlTo.='>08.15 pm</option>';
		$htmlTo.='<option value="08.30 pm_51"'; if (in_array("51", $newarraytime)) { $htmlTo.=" disabled "; } $htmlTo.='>08.30 pm</option>';
		$htmlTo.='<option value="08.45 pm_52"'; if (in_array("52", $newarraytime)) { $htmlTo.=" disabled "; } $htmlTo.='>08.45 pm</option>';
		$htmlTo.='<option value="09.00 pm_53"'; if (in_array("53", $newarraytime)) { $htmlTo.=" disabled "; } $htmlTo.='>09.00 pm</option>';
		$htmlTo.='</select>';
		//echo $htmlTo;
		$Fromarr = array('FromArr'=>$html);
		$ToArr = array('ToArr'=>$htmlTo);
		$finalArr = array_merge($Fromarr,$ToArr);
		echo json_encode($finalArr);
		die();	
	}
	
	
	
/*****************addd*************/
if(isset($_POST['clientId']) && $_POST['clientId']!='' && isset($_POST['HairDresserName']) && $_POST['HairDresserName']!='')
{
	
	
	/********* select service count from tbl_service *********/
	$Sql_check_service="SELECT * FROM tbl_services where serviceId='".$_POST['service_id']."' ";
	$result_check_count = $wpdb->get_results($Sql_check_service);
	
	/********* end here*******************************/
	/*************** select disable option ********************/
	$SqlAppp="SELECT * FROM wp_soloon_day where Inthairdesserid='".$_POST['HairDresserName']."' AND vchSaloonAppDate='".$_POST['selDate']."'";
		
	$result_Appp = $wpdb->get_results($SqlAppp);
	$newarraytime1 = array();
	foreach($result_Appp as $result_Apppinfo)
	{
		
		$newarraytime1[] = $result_Apppinfo->intcountFromvalue;
	}
	
	$newarraytime2 = array();
	foreach($result_Appp as $result_Apppinfo2)
	{
		
		$newarraytime2[] = $result_Apppinfo2->intcountTovalue;
	}
	
	$SqlApppde="SELECT * FROM wp_saloon_appointment where IntStaffMemberID='".$_POST['HairDresserName']."' AND vchAppointmentDate='".$_POST['selDate']."'";
	$result_Apppde = $wpdb->get_results($SqlApppde);
	
	/*$newarraytime3 = array();
	foreach($result_Apppde as $result_Apppinfo3)
	{
		
		$newarraytime3[] = $result_Apppinfo3->intcountvalue;
	}
	
	$newarrfrom = array_merge($newarraytime1,$newarraytime3);
	$newarrTo = array_merge($newarraytime2,$newarraytime3);*/
	
	$newarraytime3 = array();
	foreach($result_Apppde as $result_Apppinfo3)
	{
		
		$newarraytime3[] = $result_Apppinfo3->intFromTimeCount;
	}
	$newarraytime4 = array();
	foreach($result_Apppde as $result_Apppinfo4)
	{
		
		$newarraytime4[] = $result_Apppinfo4->intToTimeCount;
	}
	
	$newarrfrom = array_merge($newarraytime1,$newarraytime3);
	$newarrTo = array_merge($newarraytime2,$newarraytime4);
	
	//$c = array_combine($newarraytime1,$newarraytime2);
	$c = array_combine($newarrfrom,$newarrTo);
	
	$newarraytime = array();
	foreach($c as $key=>$newarraytimeinfo)
	{
		
		for($i=$key; $i<=$newarraytimeinfo; $i++)
		{
			$newarraytime[] = $i;
		}
	}
	
	
	/*****************  end here *************************/
	
	$app_time =  explode('_',$_POST['selTime']);
	 $set_time = $result_check_count[0]->intservice_count + $app_time[1];
	
	
	/********** check value in range ***********/
	$Sql_check_count_app="SELECT * FROM `wp_saloon_appointment` WHERE  '".$set_time."'  BETWEEN `intFromTimeCount` AND `intToTimeCount`  AND vchAppointmentDate='".$_POST['selDate']."' ORDER BY `intAppointmentId` DESC";
	$result_check_count_app = $wpdb->get_results($Sql_check_count_app);
	$total_count_row_app = $wpdb->num_rows;
	//die('dd');
	/********** end here ****************/
	if($total_count_row_app > 0)
	{
		//echo $result_check_count[0]->intservice_count;
		//echo $app_time[1];
		
	$final_data = $result_check_count_app[0]->intFromTimeCount - $app_time[1];
	if($final_data==2 && $result_check_count[0]->intservice_count=='2' )
			{
				
						if($set_time==1){  $totime = '08.00 am';}
						if($set_time==2){  $totime = '08.15 am';}
						if($set_time==3){  $totime = '8.30 am';}
						if($set_time==4){  $totime = '08.45 am';}
						if($set_time==5){  $totime = '09.00 am';}
						if($set_time==6){  $totime = '09.15 am';}
						if($set_time==7){  $totime = '09.30 am';}
						if($set_time==8){  $totime = '09.45 am';}
						if($set_time==9){  $totime = '10.00 am';}
						if($set_time==10){  $totime = '10.15 am';}
						if($set_time==11){  $totime = '10.30 am';}
						if($set_time==12){  $totime = '10.45 am';}
						if($set_time==13){  $totime = '11.00 am';}
						if($set_time==14){  $totime = '11.15 am';}
						if($set_time==15){  $totime = '11.30 am';}
						if($set_time==16){  $totime = '11.45 am';}
						if($set_time==17){  $totime = '12.00 pm';}
						if($set_time==18){  $totime = '12.15 pm';}
						if($set_time==19){  $totime = '12.30 pm';}
						if($set_time==20){  $totime = '12.45 pm';}
						if($set_time==21){  $totime = '01.00 pm';}
						if($set_time==22){  $totime = '01.15 pm';}
						if($set_time==23){  $totime = '01.30 pm';}
						if($set_time==24){  $totime = '01.45 pm';}
						if($set_time==25){  $totime = '02.00 pm';}
						if($set_time==26){  $totime = '02.15 pm';}
						if($set_time==27){  $totime = '02.30 pm';}
						if($set_time==28){  $totime = '02.45 pm';}
						if($set_time==29){  $totime = '03.00 pm';}
						if($set_time==30){  $totime = '03.15 pm';}
						if($set_time==31){  $totime = '03.30 pm';}
						if($set_time==32){  $totime = '03.45 pm';}
						if($set_time==33){  $totime = '04.00 pm';}
						if($set_time==34){  $totime = '04.15 pm';}
						if($set_time==35){  $totime = '04.30 pm';}
						if($set_time==36){  $totime = '04.45 pm';}
						if($set_time==37){  $totime = '05.00 pm';}
						if($set_time==38){  $totime = '05.15 pm';}
						if($set_time==39){  $totime = '05.30 pm';}
						if($set_time==40){  $totime = '05.45 pm';}
						if($set_time==41){  $totime = '06.00 pm';}
						if($set_time==42){  $totime = '06.15 pm';}
						if($set_time==43){  $totime = '06.30 pm';}
						if($set_time==44){  $totime = '06.45 pm';}
						if($set_time==45){  $totime = '07.00 pm';}
						if($set_time==46){  $totime = '07.15 pm';}
						if($set_time==47){  $totime = '07.30 pm';}
						if($set_time==48){  $totime = '07.45 pm';}
						if($set_time==49){  $totime = '08.00 pm';}
						if($set_time==50){  $totime = '08.15 pm';}
						if($set_time==51){  $totime = '08.30 pm';}
						if($set_time==52){  $totime = '08.45 pm';}
						if($set_time==53){  $totime = '09.00 pm';}
						
						/********** end here ************/	
					
						$result = $wpdb->insert(
						'wp_saloon_appointment',
						array(
							'intClientID' => $_POST['clientId'],
							'IntStaffMemberID' => $_POST['HairDresserName'],
							'vchAppointmentDate' => $_POST['selDate'],
							'vchFromTime' => $app_time[0],
							'vchAppointmentTime' => $app_time[0],
							'intFromTimeCount' => $app_time[1],
							'vchToTime' => $totime,
							'intToTimeCount' => $set_time,
							'intcountvalue' => $set_time,
							'intBranch_ID' => $_POST['branch_id'],
							'intService_ID' => $_POST['service_id']
							
							
						),
						array(
							
							'%d',
							'%d',
							'%s',
							'%s',
							'%s',
							'%d',
							'%s',
							'%d',
							'%d',
							'%d',
							'%d'
						)
					);
					//echo  $flag= 1;
					//die();
					if($result)
	{
		$last_id = $wpdb->insert_id;
		/*********** mail function data ****************/
		 $Sql_check_mail="SELECT sl_saloon_client.VchFirstName,sl_saloon_client.VchLastName,sl_saloon_client.VchEmail,
					saloon_staff.vchSalon_Staff_FirstName,saloon_staff.vchSalon_Staff_LastName,
					tbl_services.serviceName,tbl_services.serviceDuration,
					tbl_services.servicePrice,wp_saloon_branch.vchSaloonBranch,wp_saloon_appointment.*
					FROM wp_saloon_appointment
					left join sl_saloon_client  on sl_saloon_client.intClientID=	wp_saloon_appointment.intClientID
					left join saloon_staff  on saloon_staff.intSalonStaffID=	wp_saloon_appointment.IntStaffMemberID
					left join  tbl_services on tbl_services.serviceId=	wp_saloon_appointment.intService_ID
					left join  wp_saloon_branch on wp_saloon_branch.intSaloonBranchId=	wp_saloon_appointment.intBranch_ID
					WHERE  intAppointmentId='".$last_id."'";
		$result_check_mail = $wpdb->get_results($Sql_check_mail);
		$to=$result_check_mail[0]->VchEmail;
		$adminEmail='Marwaha.nishtha20@gmail.com';
		$subject='Booking Information of salon ';
		$message='<!DOCTYPE html><html>
<head>
<style>
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}

tr:nth-child(even) {
    background-color: #dddddd;
}
</style>
</head>
<body>

<table>
  <tr>
    <th colspan="3">Booking Information</th>
    
  </tr>
  <tr><td><b>First Name</b></td><td>'.$result_check_mail[0]->VchFirstName.'</td></tr>
   <tr><td></b>Last Name</b></td><td>'.$result_check_mail[0]->VchLastName.'</td></tr>
   <tr><td>Branch Name</td><td>'.$result_check_mail[0]->vchSaloonBranch.'</td></tr>
   <tr><td>Service Name</td><td>'.$result_check_mail[0]->serviceName.'</td></tr>
  <tr><td>Booking Time</td><td>'.$result_check_mail[0]->vchFromTime.'-'.$result_check_mail[0]->vchToTime.'</td></tr>
  <tr><td>Hairdresser</td><td>'.$result_check_mail[0]->vchSalon_Staff_FirstName.'</td></tr>
  <tr><td>Price</td><td>'.$result_check_mail[0]->servicePrice.'</td></tr>
</table>
</body>
</html>
';

		$headers = 'From: info@domain.com' . "\r\n" ;
		$headers .='Reply-To: '. $to . "\r\n" ;
		$headers .='X-Mailer: PHP/' . phpversion();
		$headers .= "MIME-Version: 1.0\r\n";
		$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";  
		if(mail($to,$subject,$message,$headers))
		{
			mail($adminEmail,$subject,$message,$headers);
			echo  $flag= 1;
			die();
		}
		/********** end here *********************/
		
		
	}
			}
			else if($final_data==3 && $result_check_count[0]->intservice_count=='3' )
			{
				
						if($set_time==1){  $totime = '08.00 am';}
						if($set_time==2){  $totime = '08.15 am';}
						if($set_time==3){  $totime = '8.30 am';}
						if($set_time==4){  $totime = '08.45 am';}
						if($set_time==5){  $totime = '09.00 am';}
						if($set_time==6){  $totime = '09.15 am';}
						if($set_time==7){  $totime = '09.30 am';}
						if($set_time==8){  $totime = '09.45 am';}
						if($set_time==9){  $totime = '10.00 am';}
						if($set_time==10){  $totime = '10.15 am';}
						if($set_time==11){  $totime = '10.30 am';}
						if($set_time==12){  $totime = '10.45 am';}
						if($set_time==13){  $totime = '11.00 am';}
						if($set_time==14){  $totime = '11.15 am';}
						if($set_time==15){  $totime = '11.30 am';}
						if($set_time==16){  $totime = '11.45 am';}
						if($set_time==17){  $totime = '12.00 pm';}
						if($set_time==18){  $totime = '12.15 pm';}
						if($set_time==19){  $totime = '12.30 pm';}
						if($set_time==20){  $totime = '12.45 pm';}
						if($set_time==21){  $totime = '01.00 pm';}
						if($set_time==22){  $totime = '01.15 pm';}
						if($set_time==23){  $totime = '01.30 pm';}
						if($set_time==24){  $totime = '01.45 pm';}
						if($set_time==25){  $totime = '02.00 pm';}
						if($set_time==26){  $totime = '02.15 pm';}
						if($set_time==27){  $totime = '02.30 pm';}
						if($set_time==28){  $totime = '02.45 pm';}
						if($set_time==29){  $totime = '03.00 pm';}
						if($set_time==30){  $totime = '03.15 pm';}
						if($set_time==31){  $totime = '03.30 pm';}
						if($set_time==32){  $totime = '03.45 pm';}
						if($set_time==33){  $totime = '04.00 pm';}
						if($set_time==34){  $totime = '04.15 pm';}
						if($set_time==35){  $totime = '04.30 pm';}
						if($set_time==36){  $totime = '04.45 pm';}
						if($set_time==37){  $totime = '05.00 pm';}
						if($set_time==38){  $totime = '05.15 pm';}
						if($set_time==39){  $totime = '05.30 pm';}
						if($set_time==40){  $totime = '05.45 pm';}
						if($set_time==41){  $totime = '06.00 pm';}
						if($set_time==42){  $totime = '06.15 pm';}
						if($set_time==43){  $totime = '06.30 pm';}
						if($set_time==44){  $totime = '06.45 pm';}
						if($set_time==45){  $totime = '07.00 pm';}
						if($set_time==46){  $totime = '07.15 pm';}
						if($set_time==47){  $totime = '07.30 pm';}
						if($set_time==48){  $totime = '07.45 pm';}
						if($set_time==49){  $totime = '08.00 pm';}
						if($set_time==50){  $totime = '08.15 pm';}
						if($set_time==51){  $totime = '08.30 pm';}
						if($set_time==52){  $totime = '08.45 pm';}
						if($set_time==53){  $totime = '09.00 pm';}
						
						/********** end here ************/	
					
						$result = $wpdb->insert(
						'wp_saloon_appointment',
						array(
							'intClientID' => $_POST['clientId'],
							'IntStaffMemberID' => $_POST['HairDresserName'],
							'vchAppointmentDate' => $_POST['selDate'],
							'vchFromTime' => $app_time[0],
							'vchAppointmentTime' => $app_time[0],
							'intFromTimeCount' => $app_time[1],
							'vchToTime' => $totime,
							'intToTimeCount' => $set_time,
							'intcountvalue' => $set_time,
							'intBranch_ID' => $_POST['branch_id'],
							'intService_ID' => $_POST['service_id']
							
							
						),
						array(
							
							'%d',
							'%d',
							'%s',
							'%s',
							'%s',
							'%d',
							'%s',
							'%d',
							'%d',
							'%d',
							'%d'
						)
					);
				//echo  $flag= 1;
			//die();
			if($result)
	{
		$last_id = $wpdb->insert_id;
		/*********** mail function data ****************/
		 $Sql_check_mail="SELECT sl_saloon_client.VchFirstName,sl_saloon_client.VchLastName,sl_saloon_client.VchEmail,
					saloon_staff.vchSalon_Staff_FirstName,saloon_staff.vchSalon_Staff_LastName,
					tbl_services.serviceName,tbl_services.serviceDuration,
					tbl_services.servicePrice,wp_saloon_branch.vchSaloonBranch,wp_saloon_appointment.*
					FROM wp_saloon_appointment
					left join sl_saloon_client  on sl_saloon_client.intClientID=	wp_saloon_appointment.intClientID
					left join saloon_staff  on saloon_staff.intSalonStaffID=	wp_saloon_appointment.IntStaffMemberID
					left join  tbl_services on tbl_services.serviceId=	wp_saloon_appointment.intService_ID
					left join  wp_saloon_branch on wp_saloon_branch.intSaloonBranchId=	wp_saloon_appointment.intBranch_ID
					WHERE  intAppointmentId='".$last_id."'";
		$result_check_mail = $wpdb->get_results($Sql_check_mail);
		$to=$result_check_mail[0]->VchEmail;
		$adminEmail='Marwaha.nishtha20@gmail.com';
		$subject='Booking Information of salon ';
		$message='<!DOCTYPE html><html>
<head>
<style>
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}

tr:nth-child(even) {
    background-color: #dddddd;
}
</style>
</head>
<body>

<table>
  <tr>
    <th colspan="3">Booking Information</th>
    
  </tr>
  <tr><td><b>First Name</b></td><td>'.$result_check_mail[0]->VchFirstName.'</td></tr>
   <tr><td></b>Last Name</b></td><td>'.$result_check_mail[0]->VchLastName.'</td></tr>
   <tr><td>Branch Name</td><td>'.$result_check_mail[0]->vchSaloonBranch.'</td></tr>
   <tr><td>Service Name</td><td>'.$result_check_mail[0]->serviceName.'</td></tr>
  <tr><td>Booking Time</td><td>'.$result_check_mail[0]->vchFromTime.'-'.$result_check_mail[0]->vchToTime.'</td></tr>
  <tr><td>Hairdresser</td><td>'.$result_check_mail[0]->vchSalon_Staff_FirstName.'</td></tr>
  <tr><td>Price</td><td>'.$result_check_mail[0]->servicePrice.'</td></tr>
</table>
</body>
</html>
';

		$headers = 'From: info@domain.com' . "\r\n" ;
		$headers .='Reply-To: '. $to . "\r\n" ;
		$headers .='X-Mailer: PHP/' . phpversion();
		$headers .= "MIME-Version: 1.0\r\n";
		$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";  
		if(mail($to,$subject,$message,$headers))
		{
			mail($adminEmail,$subject,$message,$headers);
			echo  $flag= 1;
			die();
		}
		/********** end here *********************/
		
		
	}
			}
			else
			{
				echo 2;
			}
	}
	else
	{
		/********* add totime *************/
		if($set_time==1){  $totime = '08.00 am';}
		if($set_time==2){  $totime = '08.15 am';}
		if($set_time==3){  $totime = '8.30 am';}
		if($set_time==4){  $totime = '08.45 am';}
		if($set_time==5){  $totime = '09.00 am';}
		if($set_time==6){  $totime = '09.15 am';}
		if($set_time==7){  $totime = '09.30 am';}
		if($set_time==8){  $totime = '09.45 am';}
		if($set_time==9){  $totime = '10.00 pm';}
		if($set_time==10){  $totime = '10.15 pm';}
		if($set_time==11){  $totime = '10.30 pm';}
		if($set_time==12){  $totime = '10.45 pm';}
		if($set_time==13){  $totime = '11.00 pm';}
		if($set_time==14){  $totime = '11.15 pm';}
		if($set_time==15){  $totime = '11.30 pm';}
		if($set_time==16){  $totime = '11.45 pm';}
		if($set_time==17){  $totime = '12.00 pm';}
		if($set_time==18){  $totime = '12.15 pm';}
		if($set_time==19){  $totime = '12.30 pm';}
		if($set_time==20){  $totime = '12.45 pm';}
		if($set_time==21){  $totime = '01.00 pm';}
		if($set_time==22){  $totime = '01.15 pm';}
		if($set_time==23){  $totime = '01.30 pm';}
		if($set_time==24){  $totime = '01.45 pm';}
		if($set_time==25){  $totime = '02.00 pm';}
		if($set_time==26){  $totime = '02.15 pm';}
		if($set_time==27){  $totime = '02.30 pm';}
		if($set_time==28){  $totime = '02.45 pm';}
		if($set_time==29){  $totime = '03.00 pm';}
		if($set_time==30){  $totime = '03.15 pm';}
		if($set_time==31){  $totime = '03.30 pm';}
		if($set_time==32){  $totime = '03.45 pm';}
		if($set_time==33){  $totime = '04.00 pm';}
		if($set_time==34){  $totime = '04.15 pm';}
		if($set_time==35){  $totime = '04.30 pm';}
		if($set_time==36){  $totime = '04.45 pm';}
		if($set_time==37){  $totime = '05.00 pm';}
		if($set_time==38){  $totime = '05.15 pm';}
		if($set_time==39){  $totime = '05.30 pm';}
		if($set_time==40){  $totime = '05.45 pm';}
		if($set_time==41){  $totime = '06.00 pm';}
		if($set_time==42){  $totime = '06.15 pm';}
		if($set_time==43){  $totime = '06.30 pm';}
		if($set_time==44){  $totime = '06.45 pm';}
		if($set_time==45){  $totime = '07.00 pm';}
		if($set_time==46){  $totime = '07.15 pm';}
		if($set_time==47){  $totime = '07.30 pm';}
		if($set_time==48){  $totime = '07.45 pm';}
		if($set_time==49){  $totime = '08.00 pm';}
		if($set_time==50){  $totime = '08.15 pm';}
		if($set_time==51){  $totime = '08.30 pm';}
		if($set_time==52){  $totime = '08.45 pm';}
		if($set_time==53){  $totime = '09.00 pm';}
		
		/********** end here ************/	
	
		$result = $wpdb->insert(
		'wp_saloon_appointment',
		array(
			'intClientID' => $_POST['clientId'],
			'IntStaffMemberID' => $_POST['HairDresserName'],
			'vchAppointmentDate' => $_POST['selDate'],
			'vchFromTime' => $app_time[0],
			'vchAppointmentTime' => $app_time[0],
			'intFromTimeCount' => $app_time[1],
			'vchToTime' => $totime,
			'intToTimeCount' => $set_time,
			'intcountvalue' => $set_time,
			'intBranch_ID' => $_POST['branch_id'],
			'intService_ID' => $_POST['service_id']
			
			
		),
		array(
			
			'%d',
			'%d',
			'%s',
			'%s',
			'%s',
			'%d',
			'%s',
			'%d',
			'%d',
			'%d',
			'%d'
		)
	);
	if($result)
	{
		$last_id = $wpdb->insert_id;
		/*********** mail function data ****************/
		 $Sql_check_mail="SELECT sl_saloon_client.VchFirstName,sl_saloon_client.VchLastName,sl_saloon_client.VchEmail,
					saloon_staff.vchSalon_Staff_FirstName,saloon_staff.vchSalon_Staff_LastName,
					tbl_services.serviceName,tbl_services.serviceDuration,
					tbl_services.servicePrice,wp_saloon_branch.vchSaloonBranch,wp_saloon_appointment.*
					FROM wp_saloon_appointment
					left join sl_saloon_client  on sl_saloon_client.intClientID=	wp_saloon_appointment.intClientID
					left join saloon_staff  on saloon_staff.intSalonStaffID=	wp_saloon_appointment.IntStaffMemberID
					left join  tbl_services on tbl_services.serviceId=	wp_saloon_appointment.intService_ID
					left join  wp_saloon_branch on wp_saloon_branch.intSaloonBranchId=	wp_saloon_appointment.intBranch_ID
					WHERE  intAppointmentId='".$last_id."'";
		$result_check_mail = $wpdb->get_results($Sql_check_mail);
		$to=$result_check_mail[0]->VchEmail;
		$adminEmail='Marwaha.nishtha20@gmail.com';
		$subject='Booking Information of salon ';
		$message='<!DOCTYPE html><html>
<head>
<style>
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}

tr:nth-child(even) {
    background-color: #dddddd;
}
</style>
</head>
<body>

<table>
  <tr>
    <th colspan="3">Booking Information</th>
    
  </tr>
  <tr><td><b>First Name</b></td><td>'.$result_check_mail[0]->VchFirstName.'</td></tr>
   <tr><td></b>Last Name</b></td><td>'.$result_check_mail[0]->VchLastName.'</td></tr>
   <tr><td>Branch Name</td><td>'.$result_check_mail[0]->vchSaloonBranch.'</td></tr>
   <tr><td>Service Name</td><td>'.$result_check_mail[0]->serviceName.'</td></tr>
  <tr><td>Booking Time</td><td>'.$result_check_mail[0]->vchFromTime.'-'.$result_check_mail[0]->vchToTime.'</td></tr>
  <tr><td>Hairdresser</td><td>'.$result_check_mail[0]->vchSalon_Staff_FirstName.'</td></tr>
  <tr><td>Price</td><td>'.$result_check_mail[0]->servicePrice.'</td></tr>
</table>
</body>
</html>
';

		$headers = 'From: info@domain.com' . "\r\n" ;
		$headers .='Reply-To: '. $to . "\r\n" ;
		$headers .='X-Mailer: PHP/' . phpversion();
		$headers .= "MIME-Version: 1.0\r\n";
		$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";  
		if(mail($to,$subject,$message,$headers))
		{
			mail($adminEmail,$subject,$message,$headers);
			echo  $flag= 1;
			die();
		}
		/********** end here *********************/
		
		
	}
	else{
		echo $flag= 0;
		die();
	}
	}
}

/************ end here ************/
/*********** delete day ************/
if(isset($_POST['saloon_day']) && $_POST['saloon_day']!='')
{
	$SqlDelete = "DELETE FROM wp_soloon_day WHERE intDayId =".$_POST['saloon_day'];
	$delete_Result = $wpdb->query($SqlDelete);
	if($delete_Result)
	{
		echo "1";
	}
	else
	{
		echo "0";
	}
}
/************ end here***********/

/********* add setting no show hairdresser *********/
if(isset($_POST['clientId']) && $_POST['clientId']!='' && isset($_POST['Statuscode']) && $_POST['Statuscode']=='No')
{
	
	
	$app_time =  explode('_',$_POST['selTime']); 
		
		
		/********* select service count from tbl_service *********/
	$Sql_check_service="SELECT * FROM tbl_services where serviceId='".$_POST['service_Name']."' ";
	$result_check_count_num = $wpdb->get_results($Sql_check_service);
	$set_time = $result_check_count_num[0]->intservice_count + $app_time[1];
	
	
	$Sql_check_count="SELECT * FROM wp_saloon_appointment where intClientID='".$_POST['clientId']."' AND vchAppointmentDate='".$_POST['selDate']."'   AND intToTimeCount >= '".$app_time[1]."' AND intToTimeCount <= '".$set_time."' AND  vchStatuscode='No'";
	
	$result_check_count = $wpdb->get_results($Sql_check_count);
	$total_count_row = $wpdb->num_rows;
	
	
	/********* end here*******************************/
		
		/********* add totime *************/
		if($set_time==1){  $totime = '08.00 am';}
		if($set_time==2){  $totime = '08.15 am';}
		if($set_time==3){  $totime = '8.30 am';}
		if($set_time==4){  $totime = '08.45 am';}
		if($set_time==5){  $totime = '09.00 am';}
		if($set_time==6){  $totime = '09.15 am';}
		if($set_time==7){  $totime = '09.30 am';}
		if($set_time==8){  $totime = '09.45 am';}
		if($set_time==9){  $totime = '10.00 pm';}
		if($set_time==10){  $totime = '10.15 pm';}
		if($set_time==11){  $totime = '10.30 pm';}
		if($set_time==12){  $totime = '10.45 pm';}
		if($set_time==13){  $totime = '11.00 pm';}
		if($set_time==14){  $totime = '11.15 pm';}
		if($set_time==15){  $totime = '11.30 pm';}
		if($set_time==16){  $totime = '11.45 pm';}
		if($set_time==17){  $totime = '12.00 pm';}
		if($set_time==18){  $totime = '12.15 pm';}
		if($set_time==19){  $totime = '12.30 pm';}
		if($set_time==20){  $totime = '12.45 pm';}
		if($set_time==21){  $totime = '01.00 pm';}
		if($set_time==22){  $totime = '01.15 pm';}
		if($set_time==23){  $totime = '01.30 pm';}
		if($set_time==24){  $totime = '01.45 pm';}
		if($set_time==25){  $totime = '02.00 pm';}
		if($set_time==26){  $totime = '02.15 pm';}
		if($set_time==27){  $totime = '02.30 pm';}
		if($set_time==28){  $totime = '02.45 pm';}
		if($set_time==29){  $totime = '03.00 pm';}
		if($set_time==30){  $totime = '03.15 pm';}
		if($set_time==31){  $totime = '03.30 pm';}
		if($set_time==32){  $totime = '03.45 pm';}
		if($set_time==33){  $totime = '04.00 pm';}
		if($set_time==34){  $totime = '04.15 pm';}
		if($set_time==35){  $totime = '04.30 pm';}
		if($set_time==36){  $totime = '04.45 pm';}
		if($set_time==37){  $totime = '05.00 pm';}
		if($set_time==38){  $totime = '05.15 pm';}
		if($set_time==39){  $totime = '05.30 pm';}
		if($set_time==40){  $totime = '05.45 pm';}
		if($set_time==41){  $totime = '06.00 pm';}
		if($set_time==42){  $totime = '06.15 pm';}
		if($set_time==43){  $totime = '06.30 pm';}
		if($set_time==44){  $totime = '06.45 pm';}
		if($set_time==45){  $totime = '07.00 pm';}
		if($set_time==46){  $totime = '07.15 pm';}
		if($set_time==47){  $totime = '07.30 pm';}
		if($set_time==48){  $totime = '07.45 pm';}
		if($set_time==49){  $totime = '08.00 pm';}
		if($set_time==50){  $totime = '08.15 pm';}
		if($set_time==51){  $totime = '08.30 pm';}
		if($set_time==52){  $totime = '08.45 pm';}
		if($set_time==53){  $totime = '09.00 pm';}
		
	
	
	/*$Sql_check_count="SELECT * FROM wp_saloon_appointment where intClientID='".$_POST['clientId']."' AND vchAppointmentDate='".$_POST['selDate']."' AND vchFromTime='".$app_time[0]."' AND vchToTime='".$totime."' AND  vchStatuscode='No'";
	
	
	$result_check_count = $wpdb->get_results($Sql_check_count);
	$total_count_row = $wpdb->num_rows;*/
	
	 /*$Sql_check_count="SELECT * FROM wp_saloon_appointment where '".$app_time[1]."'  BETWEEN `intFromTimeCount` AND `intToTimeCount`  AND intClientID='".$_POST['clientId']."' AND vchAppointmentDate='".$_POST['selDate']."'  AND  vchStatuscode='No'";*/
	$Sql_check_setting="SELECT * FROM wp_saloon_custom_setting where intSettingId='1'";
	$result_check_count_num = $wpdb->get_results($Sql_check_setting);
	$set_limit = $result_check_count_num[0]->client_limit;
	
	if($total_count_row > $set_limit)
	{
		echo "2";
		die();
	}
	else
	{
		
		
		$result = $wpdb->insert(
			'wp_saloon_appointment',
			array(
				'intClientID' => $_POST['clientId'],
				'vchAppointmentDate' => $_POST['selDate'],
				'vchFromTime' => $app_time[0],
				'intFromTimeCount' => $app_time[1],
				'vchToTime' => $totime,
				'intToTimeCount' => $set_time,
				'intBranch_ID' => $_POST['Branch_Name'],
				'intService_ID' => $_POST['service_Name'],
				'vchStatuscode' => $_POST['Statuscode']
				
			),
			array(
				
				'%s',
				'%s',
				'%s',
				'%d',
				'%s',
				'%d',
				'%d',
				'%d',
				'%s'
				
			)
		
		);
		
		
		if($result)
		{
			$last_id = $wpdb->insert_id;
		/*********** mail function data ****************/
		 $Sql_check_mail="SELECT sl_saloon_client.VchFirstName,sl_saloon_client.VchLastName,sl_saloon_client.VchEmail,
					tbl_services.serviceName,tbl_services.serviceDuration,
					tbl_services.servicePrice,wp_saloon_branch.vchSaloonBranch,wp_saloon_appointment.*
					FROM wp_saloon_appointment
					left join sl_saloon_client  on sl_saloon_client.intClientID=	wp_saloon_appointment.intClientID
					left join  tbl_services on tbl_services.serviceId=	wp_saloon_appointment.intService_ID
					left join  wp_saloon_branch on wp_saloon_branch.intSaloonBranchId=	wp_saloon_appointment.intBranch_ID
					WHERE  intAppointmentId='".$last_id."'";
		$result_check_mail = $wpdb->get_results($Sql_check_mail);
		$to=$result_check_mail[0]->VchEmail;
		$adminEmail='Marwaha.nishtha20@gmail.com';
		$subject='Booking Information of salon';
		$message='<!DOCTYPE html><html>
<head>
<style>
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}

tr:nth-child(even) {
    background-color: #dddddd;
}
</style>
</head>
<body>

<table>
  <tr>
    <th colspan="3">Booking Information</th>
    
  </tr>
  <tr><td><b>First Name</b></td><td>'.$result_check_mail[0]->VchFirstName.'</td></tr>
   <tr><td></b>Last Name</b></td><td>'.$result_check_mail[0]->VchLastName.'</td></tr>
   <tr><td>Branch Name</td><td>'.$result_check_mail[0]->vchSaloonBranch.'</td></tr>
   <tr><td>Service Name</td><td>'.$result_check_mail[0]->serviceName.'</td></tr>
  <tr><td>Booking Time</td><td>'.$result_check_mail[0]->vchFromTime.'-'.$result_check_mail[0]->vchToTime.'</td></tr>
  <tr><td>Price</td><td>'.$result_check_mail[0]->servicePrice.'</td></tr>
</table>
</body>
</html>
';

		$headers = 'From: YourLogoName info@domain.com' . "\r\n" ;
		$headers .='Reply-To: '. $to . "\r\n" ;
		$headers .='X-Mailer: PHP/' . phpversion();
		$headers .= "MIME-Version: 1.0\r\n";
		$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";  
		if(mail($to,$subject,$message,$headers))
		{
			mail($adminEmail,$subject,$message,$headers);
			
			echo  $flag= 1;
			die();
		}
		}
		else
		{
			echo $flag= 0;
			die();
		}
	}
	
}

/******** end here ******************/

/******************* branch code *****************/
if(isset($_POST['Branch_Name']) && $_POST['Branch_Name']!='')
{
	$SqlAppp_Branch="SELECT * FROM saloon_staff where intSaloon_BranchId='".$_POST['Branch_Name']."'";
	$result_Appp_Branch = $wpdb->get_results($SqlAppp_Branch);
	$html='<select  name="HairDresserName" id="HairDresserName"  class="form-control"><option value="" selected="selected">select hair dresser name</option>';
	foreach($result_Appp_Branch as $result_Appp_Branchinfo)
	{
		$html.='<option value="'.$result_Appp_Branchinfo->intSalonStaffID.'">'.$result_Appp_Branchinfo->vchSalon_Staff_FirstName.'</option>';
	}
	
	echo $html.='</select>';
die();
}
/*************** end here *******************/

/********* add setting no show hairdresser *********/
if(isset($_POST['clientId']) && $_POST['clientId']!='' && isset($_POST['Statuscodecheck']) && $_POST['Statuscodecheck']=='No')
{
	$app_time =  explode('_',$_POST['selTime']); 
	/********* select service count from tbl_service *********/
	
	$Sql_check_count="SELECT * FROM wp_saloon_appointment where intClientID='".$_POST['clientId']."' AND vchAppointmentDate='".$_POST['selDate']."'    AND  vchStatuscode='No'";
	$result_check_count = $wpdb->get_results($Sql_check_count);
	$total_count_row = $wpdb->num_rows;
	/********* end here*******************************/
	$newarrfrom = array();
	foreach($result_check_count as $result_Apppinfo3)
	{
		
		$newarrfrom[] = $result_Apppinfo3->intFromTimeCount;
	}
	$newarrTo = array();
	foreach($result_check_count as $result_Apppinfo4)
	{
		
		$newarrTo[] = $result_Apppinfo4->intToTimeCount;
	}
	$c = array_combine($newarrfrom,$newarrTo);
	
	$newarraytime = array();
	foreach($c as $key=>$newarraytimeinfo)
	{
		
		for($i=$key; $i<=$newarraytimeinfo; $i++)
		{
			$newarraytime[] = $i;
		}
	}
	
	
	if($total_count_row > 1)
	{
		$html='<select name="selTime" id="selTime"  class="selectTime form-control"  ><option value="" selected="selected">Select hours</option>';
		$html.='<option value="08.00 am_1"';  if (in_array("1", $newarraytime)) { $html.=" disabled "; } $html.='>08.00 am</option>';
		$html.='<option value="08.15 am_2"';  if (in_array("2", $newarraytime)) { $html.=" disabled "; } $html.='>08.15 am</option>';
		$html.='<option value="08.30 am_3"';  if (in_array("3", $newarraytime)) { $html.=" disabled "; } $html.='>8.30 am</option>';
		$html.='<option value="08.45 am_4"';  if (in_array("4", $newarraytime)) { $html.=" disabled "; } $html.='>08.45 am</option>';
		$html.='<option value="09.00 am_5"';  if (in_array("5", $newarraytime)) { $html.=" disabled "; } $html.='>09.00 am</option>';
		$html.='<option value="09.15 am_6"'; if (in_array("6", $newarraytime)) { $html.=" disabled "; } $html.='>09.15 am</option>';
	
		$html.='<option value="09.30 am_7"'; if (in_array("7", $newarraytime)) { $html.=" disabled "; } $html.='>09.30 am</option>';
		$html.='<option value="09.45 am_8"'; if (in_array("8", $newarraytime)) { $html.=" disabled "; } $html.='>09.45 am</option>';
		$html.='<option value="10.00 am_9"'; if (in_array("9", $newarraytime)) { $html.=" disabled "; } $html.='>10.00 pm</option>';
		$html.='<option value="10.15 am_10"'; if (in_array("10", $newarraytime)) { $html.=" disabled "; } $html.='>10.15 pm</option>';
		$html.='<option value="10.30 am_11"'; if (in_array("11", $newarraytime)) { $html.=" disabled "; } $html.='>10.30 pm</option>';
		$html.='<option value="10.45 am_12"'; if (in_array("12", $newarraytime)) { $html.=" disabled "; } $html.='>10.45 pm</option>';
		$html.='<option value="11.00 am_13"'; if (in_array("13", $newarraytime)) { $html.=" disabled "; } $html.='>11.00 pm</option>';
		$html.='<option value="11.15 am_14"'; if (in_array("14", $newarraytime)) { $html.=" disabled "; } $html.='>11.15 pm</option>';
		$html.='<option value="11.30 am_15"'; if (in_array("15", $newarraytime)) { $html.=" disabled "; } $html.='>11.30 pm</option>';
		$html.='<option value="11.45 am_16"'; if (in_array("16", $newarraytime)) { $html.=" disabled "; } $html.='>11.45 pm</option>';
		$html.='<option value="12.00 pm_17"'; if (in_array("17", $newarraytime)) { $html.=" disabled "; } $html.='>12.00 pm</option>';
		$html.='<option value="12.15 pm_18"'; if (in_array("18", $newarraytime)) { $html.=" disabled "; } $html.='>12.15 pm</option>';
		$html.='<option value="12.30 pm_19"'; if (in_array("19", $newarraytime)) { $html.=" disabled "; } $html.='>12.30 pm</option>';
		$html.='<option value="12.45 pm_20"'; if (in_array("20", $newarraytime)) { $html.=" disabled "; } $html.='>12.45 pm</option>';
		$html.='<option value="01.00 pm_21"'; if (in_array("21", $newarraytime)) { $html.=" disabled "; } $html.='>01.00 pm</option>';
		$html.='<option value="01.15 pm_22"'; if (in_array("22", $newarraytime)) { $html.=" disabled "; } $html.='>01.15 pm</option>';
		$html.='<option value="01.30 pm_23"'; if (in_array("23", $newarraytime)) { $html.=" disabled "; } $html.='>01.30 pm</option>';
		$html.='<option value="01.45 pm_24"'; if (in_array("24", $newarraytime)) { $html.=" disabled "; } $html.='>01.45 pm</option>';
		$html.='<option value="02.00 pm_25"'; if (in_array("25", $newarraytime)) { $html.=" disabled "; } $html.='>02.00 pm</option>';
		$html.='<option value="02.15 pm_26"'; if (in_array("26", $newarraytime)) { $html.=" disabled "; } $html.='>02.15 pm</option>';
		$html.='<option value="02.30 pm_27"'; if (in_array("27", $newarraytime)) { $html.=" disabled "; } $html.='>02.30 pm</option>';
		$html.='<option value="02.45 pm_28"'; if (in_array("28", $newarraytime)) { $html.=" disabled "; } $html.='>02.45 pm</option>';
		$html.='<option value="03.00 pm_29"'; if (in_array("29", $newarraytime)) { $html.=" disabled "; } $html.='>03.00 pm</option>';
		$html.='<option value="03.15 pm_30"'; if (in_array("30", $newarraytime)) { $html.=" disabled "; } $html.='>03.15 pm</option>';
		$html.='<option value="03.30 pm_31"'; if (in_array("31", $newarraytime)) { $html.=" disabled "; } $html.='>03.30 pm</option>';
		$html.='<option value="03.45 pm_32"'; if (in_array("32", $newarraytime)) { $html.=" disabled "; } $html.='>03.45 pm</option>';
		$html.='<option value="04.00 pm_33"'; if (in_array("33", $newarraytime)) { $html.=" disabled "; } $html.='>04.00 pm</option>';
		$html.='<option value="04.15 pm_34"'; if (in_array("34", $newarraytime)) { $html.=" disabled "; } $html.='>04.15 pm</option>';
		$html.='<option value="04.30 pm_35"'; if (in_array("35", $newarraytime)) { $html.=" disabled "; } $html.='>04.30 pm</option>';
		$html.='<option value="04.45 pm_36"'; if (in_array("36", $newarraytime)) { $html.=" disabled "; } $html.='>04.45 pm</option>';
		$html.='<option value="05.00 pm_37"'; if (in_array("37", $newarraytime)) { $html.=" disabled "; } $html.='>05.00 pm</option>';
		$html.='<option value="05.15 pm_38"'; if (in_array("38", $newarraytime)) { $html.=" disabled "; } $html.='>05.15 pm</option>';
		$html.='<option value="05.30 pm_39"'; if (in_array("39", $newarraytime)) { $html.=" disabled "; } $html.='>05.30 pm</option>';
		$html.='<option value="05.45 pm_40"'; if (in_array("40", $newarraytime)) { $html.=" disabled "; } $html.='>05.45 pm</option>';
		$html.='<option value="06.00 pm_41"'; if (in_array("41", $newarraytime)) { $html.=" disabled "; } $html.='>06.00 pm</option>';
		$html.='<option value="06.15 pm_42"'; if (in_array("42", $newarraytime)) { $html.=" disabled "; } $html.='>06.15 pm</option>';
		$html.='<option value="06.30 pm_43"'; if (in_array("43", $newarraytime)) { $html.=" disabled "; } $html.='>06.30 pm</option>';
		$html.='<option value="06.45 pm_44"'; if (in_array("44", $newarraytime)) { $html.=" disabled "; } $html.='>06.45 pm</option>';
		$html.='<option value="07.00 pm_45"'; if (in_array("45", $newarraytime)) { $html.=" disabled "; } $html.='>07.00 pm</option>';
		$html.='<option value="07.15 pm_46"'; if (in_array("46", $newarraytime)) { $html.=" disabled "; } $html.='>07.15 pm</option>';
		$html.='<option value="07.30 pm_47"'; if (in_array("47", $newarraytime)) { $html.=" disabled "; } $html.='>07.30 pm</option>';
		$html.='<option value="07.45 pm_48"'; if (in_array("48", $newarraytime)) { $html.=" disabled "; } $html.='>07.45 pm</option>';
		$html.='<option value="08.00 pm_49"'; if (in_array("49", $newarraytime)) { $html.=" disabled "; } $html.='>08.00 pm</option>';
		$html.='<option value="08.15 pm_50"'; if (in_array("50", $newarraytime)) { $html.=" disabled "; } $html.='>08.15 pm</option>';
		$html.='<option value="08.30 pm_51"'; if (in_array("51", $newarraytime)) { $html.=" disabled "; } $html.='>08.30 pm</option>';
		$html.='<option value="08.45 pm_52"'; if (in_array("52", $newarraytime)) { $html.=" disabled "; } $html.='>08.45 pm</option>';
		$html.='<option value="09.00 pm_53"'; if (in_array("53", $newarraytime)) { $html.=" disabled "; } $html.='>09.00 pm</option>';
		$html.='</select>';
		echo $html;
		die();
		
	}else{
		
		$html='<select name="selTime" id="selTime"  class="form-control">
                        
						
						<option value="" selected="selected">select hours</option>
						<option value="08.00 am_1" >08.00 am</option>  
						<option value="08.15 am_2" >08.15 am</option>
						<option value="08.30 am_3" >08.30 am</option>
						<option value="08.45 am_4" >08.45 am</option>
						<option value="09.00 am_5" >09.00 am</option> 
						<option value="09.15 am_6">09.15 am</option>
						<option value="09.30 am_7">09.30 am</option>
						<option value="09.45 am_8">09.45 am</option>
						<option value="10.00 am_9">10.00 pm</option> 
						<option value="10.15 am_10">10.15 pm</option>
						<option value="10.30 am_11">10.30 pm</option>
						<option value="10.45 am_12">10.45 pm</option>
						<option value="11.00 am_13">11.00 pm</option>
						<option value="11.15 am_14">11.15 pm</option>
						<option value="11.30 am_15">11.30 pm</option>
						<option value="11.45 am_16">11.45 pm</option>
						<option value="12.00 pm_17">12.00 pm</option>
						<option value="12.15 pm_18">12.15 pm</option>
						<option value="12.30 pm_19">12.30 pm</option>
						<option value="12.45 pm_20">12.45 pm</option>
						<option value="01.00 pm_21">01.00 pm</option>
						<option value="01.15 pm_22">01.15 pm</option>
						<option value="01.30 pm_23">01.30 pm</option>
						<option value="01.45 pm_24">01.45 pm</option>
						<option value="02.00 pm_25">02.00 pm</option>
						<option value="02.15 pm_26">02.15 pm</option>
						<option value="02.30 pm_27">02.30 pm</option>
						<option value="02.45 pm_28">02.45 pm</option>
						<option value="03.00 pm_29">03.00 pm</option>
						<option value="03.15 pm_30">03.15 pm</option>
						<option value="03.30 pm_31">03.30 pm</option>
						<option value="03.45 pm_32">03.45 pm</option>
						<option value="04.00 pm_33">04.00 pm</option>
						<option value="04.15 pm_34">04.15 pm</option>
						<option value="04.30 pm_35">04.30 pm</option>
						<option value="04.45 pm_36">04.45 pm</option>
						<option value="05.00 pm_37">05.00 pm</option>
						<option value="05.15 pm_38">05.15 pm</option>
						<option value="05.30 pm_39">05.30 pm</option>
						<option value="05.45 pm_40">05.45 pm</option>
						<option value="06.00 pm_41">06.00 pm</option>
						<option value="06.15 pm_42">06.15 pm</option>
						<option value="06.30 pm_43">06.30 pm</option>
						<option value="06.45 pm_44">06.45 pm</option>
						<option value="07.00 pm_45">07.00 pm</option>
						<option value="07.15 pm_46">07.15 pm</option>
						<option value="07.30 pm_47">07.30 pm</option>
						<option value="07.45 pm_48">07.45 pm</option>
						<option value="08.00 pm_49">08.00 pm</option>
						<option value="08.15 pm_50">08.15 pm</option>
						<option value="08.30 pm_51">08.30 pm</option>
						<option value="08.45 pm_52">08.30 pm</option>
						<option value="09.00 pm_53">09.00 pm</option>
                      </select>';
					  echo $html;
		die();
	}
}
?>