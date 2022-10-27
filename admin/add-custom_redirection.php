<?php
//echo home_url();
//die();
//echo"<pre>";
//print_r($_SERVER);
error_reporting(0);
$dir = plugin_dir_path( __FILE__ );
global $wpdb;
 $entries = $wpdb->get_results( "SELECT * FROM wp_saloon_custom_redirection where IntCustomUrlID='1'" );
 if(isset($_POST['submit']))
{
	
	  $entries = $wpdb->get_results( "SELECT * FROM wp_saloon_custom_redirection where IntCustomUrlID='".$_POST['IntCustomUrlID']."'" );
	   $totalrow = $wpdb->num_rows;

	if($totalrow > 0)
	{
		$result = $wpdb->update(
		'wp_saloon_custom_redirection',
		array(
			'vchLoginUrl' => $_POST['LoginUrl'],
			'vchRegistrationUrl' => $_POST['RegistrationUrl'],
			'vchBookingUrl' => $_POST['BookingUrl']
			
			),
			array( 'IntCustomUrlID' => $_POST['IntCustomUrlID'] ), 
			array(
			
			'%s',
			'%s',
			'%s'
			
		),
			array( '%d' ) 
		);
	}
	else
	{
		$result = $wpdb->insert(
		'wp_saloon_custom_redirection',
			array(
				'vchLoginUrl' => $_POST['LoginUrl'],
				'vchRegistrationUrl' => $_POST['RegistrationUrl'],
				'vchBookingUrl' => $_POST['BookingUrl']
				
				),
			array(
				
				'%s',
				'%s',
				'%s'
				
			)
		);
	}
	if($result)
	{
		
		//$flag= 1;
		$links = admin_url('admin.php').'/wp-admin?page=custom-redirection&msg=succ';		
		 ?>
		 <script>
		
		window.location.href = "<?php echo $links;?>";
		</script>
		<?php 
		
	}

}

?>
<?php
 
 include($dir.'/header.php');
 ?>
 <style type="text/css">
 	 h3{
	 	background:#CCCCCC;
		padding:10px;
	 }
	 
  </style>	 

<div class="content" id="content">
	<div class="col-md-12">
		<div class="col-md-12">
			<div class="log-inner"><h3>Custom Redirection Url</h3>
			 <?php if($_GET['msg']=='succ' ) { ?>
				<div class="alert alert-success">your form has been successfully updated</div>
			<?php } ?>
				<form    action="" method="post" id="my_form" novalidate enctype="multipart/form-data">
					
						<div class="form-group">
						<label for="RegistrationUrl">After Registration Url:</label>
						<input type="text" class="form-control" id="RegistrationUrl" name="RegistrationUrl"  value="<?php echo  $entries[0]->vchRegistrationUrl;?>">
						</div>
				
					
						<div class="form-group">
						<label for="LoginUrl">After Login Url:</label>
						<input type="text" class="form-control" id="LoginUrl" name="LoginUrl" value="<?php echo  $entries[0]->vchLoginUrl;?>">
						</div>
					
						<div class="form-group">
						<label for="BookingUrl">After Booking Url:</label>
						<input type="text" class="form-control" id="BookingUrl" name="BookingUrl" value="<?php echo  $entries[0]->vchBookingUrl;?>">
						</div>
				
					<div class="form-group">
						<input type="hidden" class="form-control" id="IntCustomUrlID" name="IntCustomUrlID" value="1">
						</div>
					
						<div class="form-group">
						<input type="submit" class="btn btn-default" value="Save" name="submit">
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
