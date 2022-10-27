<?php
/**
 * Plugin Name:  Booking For Hair Salon

 * Description: Booking For Hair Salon Plugin (Front-End Login / Registration With Google Booking Calender)
 
 * Author: Harsh
 * Author Email: harshkumar283@gmail.com
 */

 add_action('admin_menu','add_actor_booking_solan');
 add_shortcode("wp_booking_saloon","wp_booking_saloon");
 add_shortcode("wp_saloon_register","wp_saloon_register");
 add_shortcode("wp_saloon_login","wp_saloon_login");
 
function add_actor_booking_solan()
{
	add_menu_page('Online Saloon Booking', 'Online Saloon Booking', 'manage_options', 'solanbooking','show_solan_client');
	add_submenu_page( 'solanbooking', 'Online Saloon Booking', 'Online Saloon Booking','manage_options', 'solanbooking');
	add_submenu_page( 'solanbooking', 'Manage Staff member', 'Manage Staff member','manage_options', 'staffmember','show_solan_staff_member');
	add_submenu_page( 'solanbooking', 'Add Staff member', 'Add Staff member','manage_options', 'addstaffmember','add_solan_staff_member');
	add_submenu_page( 'solanbooking', 'Custom Redirection', 'Custom Redirection','manage_options', 'custom-redirection','wp_custom_redirection');
	add_submenu_page( 'solanbooking', 'Shortcode', 'Shortcode','manage_options', 'shortcode','wp_custom_shortcode');
	
	add_submenu_page( 'solanbooking', 'Manage Services', 'Manage Services','manage_options', 'services','wp_custom_services');
	
	add_submenu_page( 'solanbooking', 'Add New Service', 'Add New Service','manage_options', 'add_new_services','wp_custom_add_new_services');
	add_submenu_page( 'solanbooking', 'Manage Branch', 'Manage Branch','manage_options', 'manage_branch','wp_custom_manage_branch');
	add_submenu_page( 'solanbooking', 'Add New Branch', 'Add New Branch','manage_options', 'add_new_branch','wp_custom_add_branch');
	
	add_submenu_page( NULL, '', '','manage_options', 'edit_services','wp_custom_edit_services');
	
	add_submenu_page( 'solanbooking', 'Setting', 'Setting','manage_options', 'setting','wp_custom_setting');
	add_submenu_page( NULL, 'Booking Calender', 'Booking Calender','manage_options', 'booking-calender','wp_booking_saloon');
	add_submenu_page( NULL, 'Register', 'Register','manage_options', 'saloon-register','wp_saloon_register');
	add_submenu_page( NULL, 'Login', 'Login','manage_options', 'saloon-login','wp_saloon_login');
}
register_activation_hook( __FILE__, 'myplugin_activate_booking_solan' );
function myplugin_activate_booking_solan()
{
	//include("table.php");
	add_action('init','register_session_custom');
}
function register_session_custom(){
    if( !session_id() )
        session_start();
}

function wp_booking_saloon()
{
	add_action('init','register_session_custom');
	include("admin/bookingCalender.php");

}

function show_solan_client()
{
	
	//include("admin/show_solan_client.php");

global $wpdb;
	if(isset($_GET['action'])){
		switch($_GET['action']){
			case 'edit': 
						
						if(isset($_GET['tid']) && $_GET['tid']!='')
						{
								//require('admin/edit-solan-staff-member.php'); 
						}
						else
						{
							include("admin/show_solan_client.php");
						}
						break;
			
						
			case 'delete': 
							if(isset($_GET['tid']) && $_GET['tid']!='')
							{
								$delsql="delete from wp_saloon_appointment where intAppointmentId={$_GET['tid']}"; 
								$town=$wpdb->query($delsql);
								$link  = admin_url('admin.php').'/wp-admin?page=solanbooking&msg=delsucc';
								//wp_redirect($link);
								?>
								<script> window.location.href = "<?php echo $link;?>"; </script>
							<?php 
								
							}
							break;
						
			default:include("admin/show_solan_client.php");
		}
	}else{
	
		include("admin/show_solan_client.php");
} 

}
function add_solan_staff_member()
{
	include("admin/add-solan-staff-member.php");
}
function wp_saloon_register()
{
	include("admin/add-solan-client.php");
}
function wp_saloon_login()
{
	include("admin/saloon_user_login.php");
}
function wp_custom_redirection()
{
	include("admin/add-custom_redirection.php");
}
function wp_custom_shortcode()
{
	include("admin/show_custom_shortcode.php");
}
function wp_custom_setting()
{
	include("admin/show_custom_setting.php");
}
function wp_custom_services()
{
	include("admin/show_services.php");
}
function wp_custom_add_new_services()
{
	include_once("admin/add_new_service.php");
}
function wp_custom_edit_services()
{
	include_once("admin/edit_service.php");
}

function show_solan_staff_member()
{
	global $wpdb;
	if(isset($_GET['action'])){
		switch($_GET['action']){
			case 'edit': 
						
						if(isset($_GET['tid']) && $_GET['tid']!='')
						{
								require('admin/edit-solan-staff-member.php'); 
						}
						else
						{
							include("admin/show-solan-staff-member.php");
						}
						break;
			
						
			case 'delete': 
							if(isset($_GET['tid']) && $_GET['tid']!='')
							{
								$delsql="delete from saloon_staff where intSalonStaffID={$_GET['tid']}"; 
								$town=$wpdb->query($delsql);
								$link  = admin_url('admin.php').'/wp-admin?page=staffmember&msg=delsucc';
								wp_redirect($link);
							}
							break;
						
			default:include("admin/show-solan-staff-member.php");
		}
	}else{
	
		include("admin/show-solan-staff-member.php");
} 
}
//wp_custom_manage_branch
function wp_custom_manage_branch()
{
	//include("admin/manage_branch.php");
	global $wpdb;
	if(isset($_GET['action'])){
		switch($_GET['action']){
			case 'edit': 
						
						if(isset($_GET['tid']) && $_GET['tid']!='')
						{
								require('admin/edit-solan-branch.php'); 
						}
						else
						{
							include("admin/manage_branch.php");
						}
						break;
			
						
			case 'delete': 
							if(isset($_GET['tid']) && $_GET['tid']!='')
							{
								$delsql="delete from wp_saloon_branch where intSaloonBranchId={$_GET['tid']}"; 
								$town=$wpdb->query($delsql);
								$link  = admin_url('admin.php').'/wp-admin?page=manage_branch&msg=delsucc';
								wp_redirect($link);
							}
							break;
						
			default:include("admin/manage_branch.php");
		}
	}else{
	
		include("admin/manage_branch.php");
} 
}
function wp_custom_add_branch()
{
	include("admin/add_branch.php");
}


?>
