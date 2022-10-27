<?php
if(isset($_SERVER['SCRIPT_NAME']))
{
	$serverName = explode('/' , $_SERVER['SCRIPT_NAME']);
	include_once($_SERVER['DOCUMENT_ROOT'].'/'.$serverName[1].'/wp-config.php' );
}
global $wpdb;
if(isset($_POST['HairDresserid']) && $_POST['HairDresserid']!='')
{
	
	/*$SqlAppp="SELECT * FROM wp_saloon_appointment where IntStaffMemberID='".$_POST['HairDresserid']."' AND vchAppointmentDate='".$_POST['aptDateHairDresserid']."'";
	$result_Appp = $wpdb->get_results($SqlAppp);
	$newarraytime = array();
	foreach($result_Appp as $result_Apppinfo)
	{
		
		$newarraytime[] = $result_Apppinfo->vchAppointmentTime;
	}
	//$os = array("08.00 am", "08.30 am", "11.00 am", "01.00 pm");
	if (in_array("08.00 am", $newarraytime)) { $disabled =  " disabled "; }
		$html='<select name="selTime" id="selTime" style="width:100%;">
		<option value="" selected="selected">--Hours--</option>';
		$html.='<option value="08.00 am"';  
		if (in_array("08.00 am", $newarraytime)) 
		{ 
			$html.=" disabled "; 
		} 
		$html.='>08.00 am</option>';
		$html.='<option value="08.30 am"';  
		if (in_array("08.30 am", $newarraytime)) 
		{ 
			$html.=" disabled "; 
		} 
		$html.='>08.30 am</option>';
		$html.='<option value="9.00 am"';  
		if (in_array("9.00 am", $newarraytime)) 
		{ 
			$html.=" disabled "; 
		} 
		$html.='>9.00 am</option>';
		$html.='<option value="09.30 am"';  
		if (in_array("09.30 am", $newarraytime)) 
		{ 
			$html.=" disabled "; 
		} 
		$html.='>09.30 am</option>';
		$html.='<option value="10.00 am"';  
		if (in_array("10.00 am", $newarraytime)) 
		{ 
			$html.=" disabled "; 
		} 
		$html.='>10.00 am</option>';
		$html.='<option value="10.30 am"';  
		if (in_array("10.30 am", $newarraytime)) 
		{ 
			$html.=" disabled "; 
		} 
		$html.='>10.30 am</option>';
		$html.='<option value="10.30 am"';  
		if (in_array("10.30 am", $newarraytime)) 
		{ 
			$html.=" disabled "; 
		} 
		$html.='>10.30 am</option>';
		$html.='<option value="11.00 am"'; if (in_array("11.00 am", $newarraytime)) { $html.=" disabled "; } $html.='>11.00 am</option>';
		$html.='<option value="11.30 am"'; if (in_array("11.30 am", $newarraytime)) { $html.=" disabled "; } $html.='>11.30 am</option>';
		$html.='<option value="12.00 pm"'; if (in_array("12.00 pm", $newarraytime)) { $html.=" disabled "; } $html.='>12.00 pm</option>';
		$html.='<option value="12.30 pm"'; if (in_array("12.30 pm", $newarraytime)) { $html.=" disabled "; } $html.='>12.30 pm</option>';
		$html.='<option value="01.00 pm"'; if (in_array("01.00 pm", $newarraytime)) { $html.=" disabled "; } $html.='>01.00 pm</option>';
		$html.='<option value="01.30 pm"'; if (in_array("01.30 pm", $newarraytime)) { $html.=" disabled "; } $html.='>01.30 pm</option>';
		$html.='<option value="02.00 pm"'; if (in_array("02.00 pm", $newarraytime)) { $html.=" disabled "; } $html.='>02.00 pm</option>';
		$html.='<option value="02.30 pm"'; if (in_array("02.30 pm", $newarraytime)) { $html.=" disabled "; } $html.='>02.30 pm</option>';
		$html.='<option value="03.00 pm"'; if (in_array("03.00 pm", $newarraytime)) { $html.=" disabled "; } $html.='>03.00 pm</option>';
		$html.='<option value="03.30 pm"'; if (in_array("03.30 pm", $newarraytime)) { $html.=" disabled "; } $html.='>03.30 pm</option>';
		$html.='<option value="04.00 pm"'; if (in_array("04.00 pm", $newarraytime)) { $html.=" disabled "; } $html.='>04.00 pm</option>';
		$html.='<option value="04.30 pm"'; if (in_array("04.30 pm", $newarraytime)) { $html.=" disabled "; } $html.='>04.30 pm</option>';
		$html.='<option value="05.00 pm"'; if (in_array("05.00 pm", $newarraytime)) { $html.=" disabled "; } $html.='>05.00 pm</option>';
		$html.='<option value="05.30 pm"'; if (in_array("05.30 pm", $newarraytime)) { $html.=" disabled "; } $html.='>05.30 pm</option>';
		$html.='<option value="06.00 pm"'; if (in_array("06.00 pm", $newarraytime)) { $html.=" disabled "; } $html.='>06.00 pm</option>';
		$html.='<option value="06.30 pm"'; if (in_array("06.30 pm", $newarraytime)) { $html.=" disabled "; } $html.='>06.30 pm</option>';
		$html.='<option value="07.00 pm"'; if (in_array("07.00 pm", $newarraytime)) { $html.=" disabled "; } $html.='>07.00 pm</option>';
		$html.='<option value="07.30 pm"'; if (in_array("07.30 pm", $newarraytime)) { $html.=" disabled "; } $html.='>07.30 pm</option>';
		$html.='<option value="08.00 pm"'; if (in_array("08.00 pm", $newarraytime)) { $html.=" disabled "; } $html.='>08.00 pm</option>';
		$html.='<option value="08.30 pm"'; if (in_array("08.30 pm", $newarraytime)) { $html.=" disabled "; } $html.='>08.30 pm</option>';
		$html.='<option value="09.00 pm"'; if (in_array("09.00 pm", $newarraytime)) { $html.=" disabled "; } $html.='>09.00 pm</option>';
		$html.='</select>';
		echo $html;
		die();	*/
		
		
		
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
	
	$newarraytime3 = array();
	foreach($result_Apppde as $result_Apppinfo3)
	{
		
		$newarraytime3[] = $result_Apppinfo3->intcountvalue;
	}
	
	//echo"<pre>";
	//print_r($newarraytime1);
	//print_r($newarraytime2);
	//die();
	$newarrfrom = array_merge($newarraytime1,$newarraytime3);
	$newarrTo = array_merge($newarraytime2,$newarraytime3);
	//print_r($newarrfrom);
	//print_r($newarrTo);
	//die();
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
	
		$html='<select name="selTime" id="selTime" style="width:100%;" class="selectTime"  ><option value="" selected="selected">--Hours--</option>';
		$html.='<option value="08.00 am_1"';  
		if (in_array("1", $newarraytime)) 
		{ 
			$html.=" disabled "; 
		} 
		$html.='>08.00 am</option>';
		$html.='<option value="08.30 am_2"';  
		if (in_array("2", $newarraytime)) 
		{ 
			$html.=" disabled "; 
		} 
		$html.='>08.30 am</option>';
		$html.='<option value="9.00 am_3"';  
		if (in_array("3", $newarraytime)) 
		{ 
			$html.=" disabled "; 
		} 
		$html.='>9.00 am</option>';
		$html.='<option value="09.30 am_4"';  
		if (in_array("4", $newarraytime)) 
		{ 
			$html.=" disabled "; 
		} 
		$html.='>09.30 am</option>';
		$html.='<option value="10.00 am_5"';  
		if (in_array("5", $newarraytime)) 
		{ 
			$html.=" disabled "; 
		} 
		$html.='>10.00 am</option>';
		$html.='<option value="10.30 am_6"';  
		if (in_array("6", $newarraytime)) 
		{ 
			$html.=" disabled "; 
		} 
		$html.='>10.30 am</option>';
	
		$html.='<option value="11.00 am_7"'; if (in_array("7", $newarraytime)) { $html.=" disabled "; } $html.='>11.00 am</option>';
		$html.='<option value="11.30 am_8"'; if (in_array("8", $newarraytime)) { $html.=" disabled "; } $html.='>11.30 am</option>';
		$html.='<option value="12.00 pm_9"'; if (in_array("9", $newarraytime)) { $html.=" disabled "; } $html.='>12.00 pm</option>';
		$html.='<option value="12.30 pm_10"'; if (in_array("10", $newarraytime)) { $html.=" disabled "; } $html.='>12.30 pm</option>';
		$html.='<option value="01.00 pm_11"'; if (in_array("11", $newarraytime)) { $html.=" disabled "; } $html.='>01.00 pm</option>';
		$html.='<option value="01.30 pm_12"'; if (in_array("12", $newarraytime)) { $html.=" disabled "; } $html.='>01.30 pm</option>';
		$html.='<option value="02.00 pm_13"'; if (in_array("13", $newarraytime)) { $html.=" disabled "; } $html.='>02.00 pm</option>';
		$html.='<option value="02.30 pm_14"'; if (in_array("14", $newarraytime)) { $html.=" disabled "; } $html.='>02.30 pm</option>';
		$html.='<option value="03.00 pm_15"'; if (in_array("15", $newarraytime)) { $html.=" disabled "; } $html.='>03.00 pm</option>';
		$html.='<option value="03.30 pm_16"'; if (in_array("16", $newarraytime)) { $html.=" disabled "; } $html.='>03.30 pm</option>';
		$html.='<option value="04.00 pm_17"'; if (in_array("17", $newarraytime)) { $html.=" disabled "; } $html.='>04.00 pm</option>';
		$html.='<option value="04.30 pm_18"'; if (in_array("18", $newarraytime)) { $html.=" disabled "; } $html.='>04.30 pm</option>';
		$html.='<option value="05.00 pm_19"'; if (in_array("19", $newarraytime)) { $html.=" disabled "; } $html.='>05.00 pm</option>';
		$html.='<option value="05.30 pm_20"'; if (in_array("20", $newarraytime)) { $html.=" disabled "; } $html.='>05.30 pm</option>';
		$html.='<option value="06.00 pm_21"'; if (in_array("21", $newarraytime)) { $html.=" disabled "; } $html.='>06.00 pm</option>';
		$html.='<option value="06.30 pm_22"'; if (in_array("22", $newarraytime)) { $html.=" disabled "; } $html.='>06.30 pm</option>';
		$html.='<option value="07.00 pm_23"'; if (in_array("23", $newarraytime)) { $html.=" disabled "; } $html.='>07.00 pm</option>';
		$html.='<option value="07.30 pm_24"'; if (in_array("24", $newarraytime)) { $html.=" disabled "; } $html.='>07.30 pm</option>';
		$html.='<option value="08.00 pm_25"'; if (in_array("25", $newarraytime)) { $html.=" disabled "; } $html.='>08.00 pm</option>';
		$html.='<option value="08.30 pm_26"'; if (in_array("26", $newarraytime)) { $html.=" disabled "; } $html.='>08.30 pm</option>';
		$html.='<option value="09.00 pm_27"'; if (in_array("27", $newarraytime)) { $html.=" disabled "; } $html.='>09.00 pm</option>';
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
		$html.='<option value="08.45 pm_52"'; if (in_array("52", $newarraytime)) { $html.=" disabled "; } $html.='>08.30 pm</option>';
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
		$htmlTo.='<option value="08.45 pm_52"'; if (in_array("52", $newarraytime)) { $htmlTo.=" disabled "; } $htmlTo.='>08.30 pm</option>';
		$htmlTo.='<option value="09.00 pm_53"'; if (in_array("53", $newarraytime)) { $htmlTo.=" disabled "; } $htmlTo.='>09.00 pm</option>';
		$htmlTo.='</select>';
		//echo $htmlTo;
		$Fromarr = array('FromArr'=>$html);
		$ToArr = array('ToArr'=>$htmlTo);
		$finalArr = array_merge($Fromarr,$ToArr);
		echo json_encode($finalArr);
		die();	
	}
	
	
	
if(isset($_POST['clientId']) && $_POST['clientId']!='' && isset($_POST['HairDresserName']) && $_POST['HairDresserName']!='')
{
	
	
	$app_time =  explode('_',$_POST['selTime']);
	$result = $wpdb->insert(
		'wp_saloon_appointment',
		array(
			'intClientID' => $_POST['clientId'],
			'IntStaffMemberID' => $_POST['HairDresserName'],
			'vchAppointmentDate' => $_POST['selDate'],
			'vchAppointmentTime' => $app_time[0],
			'intcountvalue' => $app_time[1]
			
			
		),
		array(
			
			'%d',
			'%d',
			'%s',
			'%s',
			'%d'
		)
	);
	if($result)
	{
		echo  $flag= 1;
		die();
	}
	else{
		echo $flag= 0;
		die();
	}
}

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
	
	$Sql_check_count="SELECT * FROM wp_saloon_appointment where intClientID='".$_POST['clientId']."' AND vchAppointmentDate='".$_POST['selDate']."' AND vchAppointmentTime='".$_POST['selTime']."' AND  vchStatuscode='No'";
	$result_check_count = $wpdb->get_results($Sql_check_count);
	$total_count_row = $wpdb->num_rows;
	if($total_count_row > 4)
	{
		echo "2";
	}
	else
	{
		$result = $wpdb->insert(
			'wp_saloon_appointment',
			array(
				'intClientID' => $_POST['clientId'],
				'vchAppointmentDate' => $_POST['selDate'],
				'vchAppointmentTime' => $_POST['selTime'],
				'vchStatuscode' => $_POST['Statuscode']
				
			),
			array(
				
				'%s',
				'%s',
				'%s',
				'%s'
				
			)
		
		);
		
		
		if($result)
		{
			echo  $flag= 1;
			die();
		}
		else
		{
			echo $flag= 0;
			die();
		}
	}
	
}

/******** end here ******************/
?>