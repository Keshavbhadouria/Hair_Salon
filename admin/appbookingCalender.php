<?php 
if(isset($_SERVER['SCRIPT_NAME']))
{
	$serverName = explode('/' , $_SERVER['SCRIPT_NAME']);
	include_once($_SERVER['DOCUMENT_ROOT'].'/'.$serverName[1].'/wp-config.php' );
}
global $wpdb;
/********** end here **************/
$busyArray = array();
/*$SqlAppp="SELECT saloon_staff.vchSalon_Staff_FirstName,saloon_staff.vchSalon_Staff_LastName,wp_saloon_appointment.vchAppointmentDate, wp_saloon_appointment.vchFromTime,wp_saloon_appointment.vchToTime FROM wp_saloon_appointment 
left join  saloon_staff on saloon_staff.intSalonStaffID=wp_saloon_appointment.IntStaffMemberID";*/

$SqlAppp="SELECT 
					wp_saloon_appointment.intAppointmentId AS AppointmentId ,saloon_staff.vchSalon_Staff_FirstName AS StaffFirstName,saloon_staff.vchSalon_Staff_LastName AS StaffLastName,
					tbl_services.serviceName,wp_saloon_branch.vchSaloonBranch AS BranchName,wp_saloon_appointment.vchAppointmentDate AS BookingDate,wp_saloon_appointment.vchFromTime AS FromTime,wp_saloon_appointment.vchToTime AS ToTime
					FROM wp_saloon_appointment
					
					left join saloon_staff  on saloon_staff.intSalonStaffID=	wp_saloon_appointment.IntStaffMemberID
					left join  tbl_services on tbl_services.serviceId=	wp_saloon_appointment.intService_ID
					left join  wp_saloon_branch on wp_saloon_branch.intSaloonBranchId=	wp_saloon_appointment.intBranch_ID";


$busyArray = $wpdb->get_results($SqlAppp);

/*for($a=0; $a<sizeof($busyArray); $a++)
{
	$busyArray[$a]->startingcomma='{';
	$endComma = $busyArray[$a]->endingcomma='},';
	if($a>=sizeof($busyArray)-1)
		$busyArray[$a]->endingcomma='}';
	$busyArray[$a]->backgroundColor='#990000';
		
}*/
echo json_encode($busyArray);
?>


	
	





