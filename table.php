<?php 
global $wpdb;

$saloon_staff = "CREATE TABLE IF NOT EXISTS `saloon_staff` (
`intSalonStaffID` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `vchSalon_Staff_FirstName` varchar(255) NOT NULL,
  `vchSalon_Staff_LastName` varchar(255) NOT NULL,
  `vchSalon_Staff_Email` varchar(255) NOT NULL,
  `vchSalon_Staff_PhoneNo` varchar(255) NOT NULL,
  `vchSalon_Staff_Address` text NOT NULL,
  `vchSalon_Staff_image` varchar(255) NOT NULL,
  `intSaloon_BranchId` int(11) NOT NULL
  ) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;";
$result_saloon_staff = $wpdb->query($saloon_staff);

$saloon_client = "CREATE TABLE IF NOT EXISTS `sl_saloon_client` (
`intClientID` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `VchFirstName` varchar(255) NOT NULL,
  `VchLastName` varchar(255) NOT NULL,
  `VchPhoneNo` varchar(255) NOT NULL,
  `VchEmail` varchar(255) NOT NULL,
  `VchPassword` varchar(255) NOT NULL,
  `vchStatus` int(5) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;";
$result_saloon_client = $wpdb->query($saloon_client);

$saloon_app = "CREATE TABLE IF NOT EXISTS `wp_saloon_appointment` (
`intAppointmentId` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `intClientID` int(11) NOT NULL,
  `IntStaffMemberID` int(11) NOT NULL,
  `vchAppointmentDate` varchar(255) NOT NULL,
  `vchFromTime` varchar(255) NOT NULL,
  `intFromTimeCount` int(11) NOT NULL,
  `vchAppointmentTime` varchar(255) NOT NULL,
  `vchToTime` varchar(255) NOT NULL,
  `intToTimeCount` int(11) NOT NULL,
  `vchTitle` varchar(255) NOT NULL,
  `vchdays` varchar(255) NOT NULL,
  `intcountvalue` int(11) NOT NULL,
  `vchStatuscode` varchar(11) NOT NULL DEFAULT 'Yes',
  `intBranch_ID` int(11) NOT NULL,
  `intService_ID` int(11) NOT NULL
 ) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;";
$result_saloon_app = $wpdb->query($saloon_app);


$saloon_custom_url = "CREATE TABLE IF NOT EXISTS `wp_saloon_custom_redirection` (
`IntCustomUrlID` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `vchLoginUrl` text NOT NULL,
  `vchRegistrationUrl` text NOT NULL,
  `vchBookingUrl` text NOT NULL
 ) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;";
$result_saloon_custom_url = $wpdb->query($saloon_custom_url);

$saloon_wp_soloon_day= "CREATE TABLE IF NOT EXISTS `wp_soloon_day` (
`intDayId` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `Inthairdesserid` int(11) NOT NULL,
  `vchdays` varchar(255) NOT NULL,
  `vchselFromTime` varchar(255) NOT NULL,
  `intcountFromvalue` int(11) NOT NULL,
  `vchselToTime` varchar(255) NOT NULL,
  `intcountTovalue` int(11) NOT NULL,
  `vchSaloonTitle` varchar(255) NOT NULL,
  `vchSaloonAppDate` varchar(255) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;";
$result_saloon_wp_soloon_day = $wpdb->query($saloon_wp_soloon_day);

$wp_saloon_custom_setting= "CREATE TABLE IF NOT EXISTS `wp_saloon_custom_setting` (
`intSettingId` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `vchSettingValue` varchar(255) NOT NULL,
  `client_limit` varchar(255) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;";
$result_wp_saloon_custom_setting = $wpdb->query($wp_saloon_custom_setting);

$result = $wpdb->insert(
		'wp_saloon_custom_setting',
		array(
			'intSettingId' => 1,
			'vchSettingValue' => 'Yes',
			'client_limit' => '5'
		),
		array(
			
			'%d',
			'%s',
			'%s'
			
		)
	);
	
	
$saloon_wp_soloon_service= "CREATE TABLE IF NOT EXISTS `tbl_services` (
`serviceId` int(13) NULL AUTO_INCREMENT PRIMARY KEY,
  `serviceName` varchar(250) NOT NULL,
  `serviceDuration` varchar(150) NOT NULL,
  `servicePrice` decimal(7,2) NOT NULL,
  `created_at` datetime NOT NULL,
  `modified_at` datetime NOT NULL,
  `setPrice` char(20) NOT NULL,
   `intservice_count` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;";
$result_saloon_wp_soloon_Service = $wpdb->query($saloon_wp_soloon_service);

$saloon_wp_soloon_branch= "CREATE TABLE IF NOT EXISTS `wp_saloon_branch` (
`intSaloonBranchId` int(11) NULL AUTO_INCREMENT PRIMARY KEY,
  `vchSaloonBranch` varchar(255) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;";
$result_saloon_wp_soloon_branch = $wpdb->query($saloon_wp_soloon_branch);


?>