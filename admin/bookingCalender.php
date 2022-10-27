<?php
error_reporting(0);
@ob_start();
session_start();
?>
<?php 
global $wpdb;
$Sql="SELECT * FROM saloon_staff";
$results = $wpdb->get_results($Sql);
/********* setting *************/
$Sql_query="SELECT * FROM wp_saloon_custom_setting";
$results_setting = $wpdb->get_results($Sql_query);

$Sql_redi="SELECT * FROM wp_saloon_custom_redirection";
$results_redi = $wpdb->get_results($Sql_redi);

/********** end here **************/
$busyArray = array();
$SqlAppp="SELECT saloon_staff.vchSalon_Staff_FirstName,saloon_staff.vchSalon_Staff_LastName,wp_saloon_appointment.* FROM wp_saloon_appointment left join  saloon_staff on saloon_staff.intSalonStaffID=wp_saloon_appointment.IntStaffMemberID";
$busyArray = $wpdb->get_results($SqlAppp);

for($a=0; $a<sizeof($busyArray); $a++)
{
	$busyArray[$a]->startingcomma='{';
	$endComma = $busyArray[$a]->endingcomma='},';
	if($a>=sizeof($busyArray)-1)
		$busyArray[$a]->endingcomma='}';
	$busyArray[$a]->backgroundColor='#990000';
		
}
//echo"<pre>";
//print_r($busyArray);
$entries_Branch = $wpdb->get_results( "SELECT * FROM wp_saloon_branch" );
$sqlQuery = "SELECT * from tbl_services";
$editSerInfo = $wpdb->get_results($sqlQuery);




?>

<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" type="text/css" rel="stylesheet" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.6.1/fullcalendar.min.css" type="text/css" rel="stylesheet" />
<div class="container111">
    <div class="row">
      <div class="col-md-12 about_cont">
        <div id="calendar"></div>
      </div>
      
    </div>
	<div id="fullCalModal" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span> <span class="sr-only">close</span></button>
        <h4 id="modalTitle" class="modal-title">Appointment Details</h4>
      </div>
      <div id="modalBody" class="modal-body">
      
       <div id="showHideMessage"></div>
      <form name="frmMakeAppointment" method="post">
          <table class="table app_table">
        <input style="width:100%;" type="hidden" name="clientId" id="clientId" value="<?php if(isset($_SESSION['client_id'])) { echo $_SESSION['client_id']; } ?>">
		  
		 <input style="width:100%;" type="hidden" name="setting_value" id="setting_value" value="<?php echo $results_setting[0]->vchSettingValue;?>">
		<!-- <input style="width:100%;" type="hidden" name="clientId" id="clientId" value="1">-->
		  <input style="width:100%;" type="hidden" name="current_date" id="current_date" value="<?php echo date("Y-m-d");?>">
          <input style="width:100%;" type="hidden" name="baseUrl" id="baseUrl" value="<?php echo plugins_url();?>">
          <input style="width:100%;" type="hidden" name="booking_url" id="booking_url" value="<?php echo $results_redi[0]->vchBookingUrl;?>">
            
			
				
				
				<tr>
					<td class="event_title"> Branch Name </td>
					<td colspan="2">
						<select class="form-control" name="Branch_Name" id="Branch_Name" >
						<option value="" >Select branch name</option>
						<?php 
						foreach($entries_Branch as $entries_Branchinfo)
						{
						?>
						<option value="<?php echo $entries_Branchinfo->intSaloonBranchId;?>"><?php echo $entries_Branchinfo->vchSaloonBranch;?></option>
						<?php }  ?>

						</select>
					</td>
				</tr>
				
				<tr>
					<td class="event_title">Service Name</td>
					<td colspan="2">
						<select class="form-control" name="service_Name" id="service_Name">
						<option value="" selected="selected">Select service name</option>
						<?php 
						foreach($editSerInfo as $editSerInfos)
						{
						?>
						
						<option value="<?php echo $editSerInfos->serviceId;?>"><b>Service Name:</b>(<?php echo $editSerInfos->serviceName;?>)</br>Service Time:<?php echo $editSerInfos->serviceDuration;?> <?php  if($editSerInfos->setPrice=='Yes') { echo "Price:$".$editSerInfos->servicePrice; } ?></option>
						<?php }  ?>

						</select>
					</td>
				</tr>
				<?php if($results_setting[0]->vchSettingValue =='Yes')
			{ ?>
			<tr>
              <td class="event_title">Hair Dresser Name</td>
              <td colspan="2">
				<select class="form-control" name="HairDresserName" id="HairDresserName">
				<option value="" selected="selected">Select hair dresser name</option>
					<?php //foreach($results as $resultsinfo) 
					//{ ?>
					<!--<option value="<?php //echo $resultsinfo->intSalonStaffID?>"><?php //echo $resultsinfo->vchSalon_Staff_FirstName?></option> -->
					<?php 
					//}
					?>
				</select> 
			  </td>
            </tr>
			<?php } ?>
            <tr>
              <td class="event_title">Appointment date</td>
              <td colspan="2"><input style="width:100%;" type="text" name="aptDate" id="aptDate" readonly>
			   <input style="width:100%;" type="hidden" name="aptDate" id="aptDay" readonly>
              
            </tr>
            <tr>
              <td class="event_title">Appointment Time</td>
              <td colspan="2"><table border="0"  width="100%">
                  <tr>
                    <td>
					<?php
					//$eightClockCounts = 2;
					/*function getTimeSlots($serviceId,$fromTimeCount)
					{
						global $wpdb;
						$sqlQuery1 = "select count(intAppointmentId)as totalCnt from wp_saloon_appointment where intFromTimeCount='1' and intService_ID='8'";
						$totalCounts= $wpdb->get_results($sqlQuery1);
						return $totalCounts[0]->totalCnt;
					}
					$halfClockCounts = getTimeSlots('8','1');
					$upperhalfClockCounts = getTimeSlots('9','1');
					$onehoursClockCounts = getTimeSlots('10','1');*/
					
					

					//echo $eightClockCounts;
					?>
					<select name="selTime" id="selTime"  class="form-control">
                        
						
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
                      </select>
                    
					</td>
                  </tr>
                </table></td>
            </tr>
			<?php if($results_setting[0]->vchSettingValue =='Yes')
			{ ?>
            <tr>
              <td colspan="3"><input type="button" onClick="return checkAptValidations();" name="btnAddNewAppointModal" id="btnAddNewAppointModal" value="Submit" class="btn btn-success" /></td>
            </tr>
			<?php } else{ ?>
				
				 <tr>
              <td colspan="3"><input type="button" onClick="return checkAptValidationsNO();" name="btnAddNewAppointModal" id="btnAddNewAppointModal" value="Submit" class="btn btn-success" /></td>
            </tr>
			<?php } ?>
          </table>
        </form>
      </div>
      
    </div>
  </div>
</div>
<div id="errorCalModal" class="modal  fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span> <span class="sr-only">close</span></button>
				<h4 id="modalTitle" class="modal-title"> Appointment Details</h4>
			</div>
			<div id="modalBody" class="modal-body">
				<table class="table app_table">
					<tr>
					<td colspan="2">Sorry, these dates are not available.</td>
					</tr>
				</table>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
</div>


  </div>
<script src="https://code.jquery.com/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.8.2/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.6.1/fullcalendar.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

<script>

	$(document).ready(function() {
		var setting_value = $('#setting_value').val();
		$('#calendar').fullCalendar({
			header: {
				left: 'prev,next today',
				center: 'title',
				right: 'month,basicWeek,basicDay'
				//right: ' '
			},
			
			selectable: true,
			selectHelper: true,
			select: function(start, end) 
			{
				
				var selectedDate =  start.format();
				var selectedDateDay =  start.format('dddd');
				
				var myDate =$('#current_date').val();
				
				if ($.trim(myDate) <= $.trim(selectedDate)) {
					//alert("Entered date is greater than today's date ");
					$('#fullCalModal').modal();
				}
				else {
					//alert("Entered date is less than today's date ");
					$('#errorCalModal').modal();
				}
				$('#aptDate').val(selectedDate);
				$('#aptDay').val(selectedDateDay);
				
				/*if(setting_value=='No')
				{

					var selDate = document.getElementById("aptDate").value;
					var selTime = document.getElementById("selTime").value;
					var clientId = document.getElementById("clientId").value;
					var Branch_Name = document.getElementById("Branch_Name").value;
					var service_Name = document.getElementById("service_Name").value;
					var baseUrl = document.getElementById("baseUrl").value;
					

					var checkAjaxData = 'selDate='+selDate+'&selTime='+selTime+'&clientId='+clientId+'&Statuscodecheck=No'+'&Branch_Name='+Branch_Name+'&service_Name='+service_Name;
					$.ajax({
					type: "POST",
					url: baseUrl+'/booking-hair-saloon/admin/check-appointment.php',
					data: checkAjaxData,
					success: function(msg) 
					{
					$("#selTime").replaceWith(msg);
					return false;


					}

					});
				}*/
				
			},
			
			//defaultDate: '2016-06-12',
			defaultDate: '<?php echo date("Y-m-d");?>',
			editable: true,
			eventLimit: true, // allow "more" link when too many events
			events:

		[

		   

		<?php

		for($i=0; $i<sizeof($busyArray); $i++)

		{
		
		?>

		<?php echo $busyArray[$i]->startingcomma ?>
			id: '1',
			title: 'Booked on <?php echo $busyArray[$i]->vchSalon_Staff_FirstName.'-'.$busyArray[$i]->vchFromTime; ?>',
			start: '<?php echo $busyArray[$i]->vchAppointmentDate ?>',
			backgroundColor:'<?php echo $busyArray[$i]->backgroundColor ?>',
		<?php  echo @$busyArray[$i]->endingcomma;  ?>

		<?php

		
		}

		?>

		   

		]

	});
	
	
	/************** select branch name hairdresser**********/
	$( "#Branch_Name" ).change(function() 
	{
		
		$(this).css('borderColor','');
		var Branch_Name= $(this).val();
		var aptDate= $('#aptDate').val();
		var baseUrl = $("#baseUrl").val();
		var aptDay = $("#aptDay").val();
		$.ajax({
		type: "POST",
		url: baseUrl+'/booking-hair-saloon/admin/check-appointment.php',
		data: {
			Branch_Name :Branch_Name,
			aptDateHairDresserid :aptDate,
			aptDay :aptDay
		
		},
		success: function(msg) 
		{
			
			$("#HairDresserName").replaceWith(msg);
			return false;
		}

		});
	});
	/************** end here ******************************/
	
	$( "#service_Name" ).change(function() 
	{
		$(this).css('borderColor','');
		return false;
	});
	$( "#HairDresserName" ).change(function() 
	{
		$(this).css('borderColor','');
		return false;
	});
	$( "#selTime" ).change(function() 
	{
		$(this).css('borderColor','');
		return false;
	});
	/*$(document.body).on('change','#HairDresserName',function()
	{

	});*/
	
	
	$(document.body).on('change','#HairDresserName',function()
	{
		
		$(this).css('borderColor','');
		var HairDresserid= $(this).val();
		var aptDate= $('#aptDate').val();
		var baseUrl = $("#baseUrl").val();
		var aptDay = $("#aptDay").val();
		
		//alert(baseUrl);
		
		$.ajax({
		type: "POST",
		url: baseUrl+'/booking-hair-saloon/admin/check-appointment.php',
		data: {
			HairDresserid :HairDresserid,
			aptDateHairDresserid :aptDate,
			aptDay :aptDay
		
		},
		success: function(msg) 
		{
			
			$("#selTime").replaceWith(msg);
			return false;
		}

		});
	});
	
	
		$('.close').click(function(){
			var selTime = $('#selTime').val('');
			$('#showHideMessage').html('');
			
		});

});
</script>
	<script type="text/javascript">

	function checkAptValidations()
	{
		//Branch_Name
	if(document.getElementById("selTime").value=="" || document.getElementById("HairDresserName").value=="" || document.getElementById("service_Name").value=="" || document.getElementById("Branch_Name").value=="")
	{
		
		if(document.getElementById("selTime").value=="" && document.getElementById("HairDresserName").value=="" && document.getElementById("service_Name").value==""){
			//alert("Please select appointment time");
		document.getElementById("selTime").style.borderColor='red';
		document.getElementById("HairDresserName").style.borderColor='red';
		document.getElementById("service_Name").style.borderColor='red';
		document.getElementById("Branch_Name").style.borderColor='red';
		return false;
		}
		else if(document.getElementById("HairDresserName").value=="")
		{
			document.getElementById("HairDresserName").style.borderColor='red';
			return false;
		}
		else if(document.getElementById("selTime").value=="")
		{
			document.getElementById("selTime").style.borderColor='red';
			return false;
		}
		else if(document.getElementById("service_Name").value=="")
		{
			document.getElementById("service_Name").style.borderColor='red';
			return false;
		}
		else if(document.getElementById("Branch_Name").value=="")
		{
			document.getElementById("Branch_Name").style.borderColor='red';
			return false;
		}

	}

	else
	{
		var selDate = document.getElementById("aptDate").value;
		var selTime = document.getElementById("selTime").value;
		var HairDresserName = document.getElementById("HairDresserName").value;
		var clientId = document.getElementById("clientId").value;
		var Branch_Name = document.getElementById("Branch_Name").value;
		var service_Name = document.getElementById("service_Name").value;
		var baseUrl = document.getElementById("baseUrl").value;
		var booking_url = document.getElementById("booking_url").value;
		var checkAjaxData = 'selDate='+selDate+'&selTime='+selTime+'&HairDresserName='+HairDresserName+'&clientId='+clientId+'&branch_id='+Branch_Name+'&service_id='+service_Name;
		$.ajax({
		type: "POST",
		url: baseUrl+'/booking-hair-saloon/admin/check-appointment.php',
		data: checkAjaxData,
		success: function(data) 
		{
			if(data==1)
			{
			document.getElementById("showHideMessage").innerHTML='<div class="alert alert-succes"><strong>Success!</strong> Appointment Booking hass been add succesfully .</div>';
			  window.location.href = booking_url;
			
			return false;

			}
			if(data==2)
			{
			document.getElementById("showHideMessage").innerHTML='<div class="alert alert-warning">Appointment Booking Not addded for time .please select other time .</div>';
			return false;

			}

		}

		});
	}

}

function checkAptValidationsNO()
{
	
	if(document.getElementById("selTime").value=="")
	{
		document.getElementById("selTime").style.borderColor='red';
		return false;
		

	}

	else
	{
		var selDate = document.getElementById("aptDate").value;
		var selTime = document.getElementById("selTime").value;
		var clientId = document.getElementById("clientId").value;
		var Branch_Name = document.getElementById("Branch_Name").value;
		var service_Name = document.getElementById("service_Name").value;
		var baseUrl = document.getElementById("baseUrl").value;
		var booking_url = document.getElementById("booking_url").value;
		
		var checkAjaxData = 'selDate='+selDate+'&selTime='+selTime+'&clientId='+clientId+'&Statuscode=No'+'&Branch_Name='+Branch_Name+'&service_Name='+service_Name;
		$.ajax({
		type: "POST",
		url: baseUrl+'/booking-hair-saloon/admin/check-appointment.php',
		data: checkAjaxData,
		success: function(data) 
		{
			if(data==1)
			{
			document.getElementById("showHideMessage").innerHTML='<div class="alert alert-succes"><strong>Success!</strong> Appointment Booking hass been add succesfully .</div>';
			  window.location.href = booking_url;
			return false;

			}
			if(data==2)
			{
			document.getElementById("showHideMessage").innerHTML='<div class="alert alert-warning"><strong>Limit!</strong> Appointment Booking Not more addded .</div>';
			return false;

			}
			

		}

		});
	}
}


$( document ).ready(function() {
	
		
  
});


</script>






