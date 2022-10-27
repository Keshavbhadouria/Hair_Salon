<?php
//echo home_url();
//die();
//echo"<pre>";
//print_r($_SERVER);
error_reporting(0);
$dir = plugin_dir_path( __FILE__ );
global $wpdb;
 $entries = $wpdb->get_results( "SELECT * FROM wp_saloon_custom_setting where intSettingId='1'" );
 if(isset($_POST['submit']))
{
	
	  $entries = $wpdb->get_results( "SELECT * FROM wp_saloon_custom_setting where intSettingId='".$_POST['intSettingId']."'" );
	   $totalrow = $wpdb->num_rows;

	if($totalrow > 0)
	{
		$result = $wpdb->update(
		'wp_saloon_custom_setting',
		array(
			'vchSettingValue' => $_POST['allHairDesser'],
			'client_limit' => $_POST['client_limit']
			
			
			),
			array( 'intSettingId' => $_POST['intSettingId'] ), 
			array(
			
			'%s',
			'%s'
			
			
		),
			array( '%d' ) 
		);
	}
	else
	{
		$result = $wpdb->insert(
		'wp_saloon_custom_setting',
			array(
				'vchSettingValue' => $_POST['allHairDesser']
				
				
				),
			array(
				
				'%s',
				
				
			)
		);
	}
	if($result)
	{
		
		//$flag= 1;
		$links = admin_url('admin.php').'/wp-admin?page=setting&msg=succ';		
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
			<div class="log-inner"><h3>Setting</h3>
			 <?php if($_GET['msg']=='succ' ) { ?>
				<div class="alert alert-success">your form has been successfully updated</div>
			<?php } ?>
				<form    action="" method="post" id="my_form" >
					<label for="RegistrationUrl">Show HairDesser:</label>
						<input type="radio" class="form-control1" id="ShowHairDessertyes" name="allHairDesser"  value="Yes" 
						<?php if($entries[0]->vchSettingValue=='Yes')  { echo  "checked";}  ?> >Yes
						<input type="radio" class="form-control1" id="ShowHairDessertNo" name="allHairDesser"   Value="No" <?php if($entries[0]->vchSettingValue=='No')  { echo  "checked";}  ?>>No
						
						
						<div class="form-group"  id="div_client_limit" style="display:none">
						<label for="client_limit">Limit of Staff member client:</label>
						<input type="number"  step="1"  min="0"  class="form-control" id="client_limit" name="client_limit"  value="<?php echo $entries[0]->client_limit?>">
					
					</div>
						
						<div class="form-group">
						<input type="hidden" class="form-control" id="intSettingId" name="intSettingId" value="1">
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
<script>
$(document).ready(function(){
	
	var ShowHairDessertNo = $('#ShowHairDessertNo:checked').val();
	if(ShowHairDessertNo=='No'){
		$('#div_client_limit').css({'display':'block'});
	}
	//alert(ShowHairDessertNo);
	$('#ShowHairDessertNo').click(function(){
		
		$('#div_client_limit').css({'display':'block'});
		
	});
	
	$('#ShowHairDessertyes').click(function(){
		$('#div_client_limit').css({'display':'none'});
		
	});
});
</script>
