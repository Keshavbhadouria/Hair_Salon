<?php
error_reporting(0); 
$dir = plugin_dir_path( __FILE__ );
global $wpdb;
$Sql="SELECT * FROM wp_saloon_custom_redirection";
include($dir.'/header.php');

if(isset($_POST['btnServiceSubmit']) and !empty($_POST['btnServiceSubmit']))
{
	$wpdb->get_row("SELECT serviceId from tbl_services where serviceName='".$_POST['serviceName']."'");
  	$rowCount = $wpdb->num_rows;
  	if($rowCount==0)
	{
		$serviceDuration = explode('_',$_POST['serviceDuration']);
		$wpdb->insert("tbl_services",
		array('serviceName' => addslashes($_POST['serviceName']), 
	  	'serviceDuration' => $serviceDuration[0], 
	  	'setPrice' => $_POST['setPrice'], 
	  	'servicePrice' => $_POST['servicePrice'],
	  	'created_at' => date('Y-m-d h:i:s'),
	  	'intservice_count' => $serviceDuration[1]
		)
		  );
		  
		  
		$successService = "Service information has been successfully saved.";	  
	
	}
	else
	{
		$errorService = "Service name which you entered is already exists. This can not be added.";
	}

}
?>
<style type="text/css">
h3 {
	background:#CCCCCC;
	padding:10px;
}

.alert {
padding: 8px 35px 8px 14px;
margin-bottom: 18px;
color: #c09853;
text-shadow: 0 1px 0 rgba(255, 255, 255, 0.5);
background-color: #fcf8e3;
border: 1px solid #fbeed5;
-webkit-border-radius: 4px;
-moz-border-radius: 4px;
border-radius: 4px;
}

.alert-heading {
color: inherit;
}

.alert .close {
position: relative;
top: -2px;
right: -21px;
line-height: 18px;
}
.alert-success {
color: #468847;
background-color: #dff0d8;
border-color: #d6e9c6;
}

.alert-danger,
.alert-error {
color: #b94a48;
background-color: #f2dede;
border-color: #eed3d7;
}

</style>
<div class="content" id="content">
  <div class="col-md-12">
    <div class="col-md-12">
      <div class="log-inner">
        <h3>Add New Service</h3>
        <form action="<?php echo get_admin_url() ?>admin.php/?page=add_new_services" method="post" id="my_form">
          <table border="0" width="100%">
          <?php if(isset($errorService) and !empty($errorService)){ ?>
          <div class="alert alert-danger">
			  <strong>Error!</strong> <?php echo $errorService; ?>.
		  </div>
          <?php } ?>
          <?php if(isset($successService) and !empty($successService)){ ?>
          <div class="alert alert-success">
			  <strong>Success!</strong> <?php echo $successService; ?>.
		  </div>
          <?php } ?>
          <tr>
          	<td><strong>Service Name</strong></td>
            <td><input type="text" name="serviceName" required /></td>
          </tr>
          
           <tr>
          	<td><strong>Duration of time</strong></td>
            <td>
			<!--<input type="text" name="serviceDuration" id="serviceDuration" required />-->
			<select name="serviceDuration" id="serviceDuration" style="width:60%;" class="selectTime form-control" required="true" >
				<option value="" selected="selected">Select time</option>
				<option value="15 Min_1" >15 Min</option>
				<option value="30 Min_2" >30 Min</option>
				<option value="45 Min_3">45 Min</option>
				<option value="1.00 Hours_4">1.00 Hours</option>
				<option value="1.15 Min_5">1.15 Min</option>
				<option value="1.30 Min_6">1.30 Min</option>
				<option value="1.45 Min_7">1.45 Min</option>
				<option value="2.00 Hours_8">2.00 Hours</option>
				<option value="2.15 Min_9">2.15 Min</option>
				<option value="2.30 Min_10">2.30 Min</option>
				<option value="2.45 Min_11">2.45 Min</option>
				<option value="3.00 Hours_12">3.00 Hours</option>
				<option value="3.15 Min_13">3.15 Min</option>
				<option value="3.30 Min_14">3.30 Min</option>
				<option value="3.45 Min_15">3.45 Min</option>
				<option value="4.00 Hours_16">4.00 Hours</option>
				<option value="4.15 Min_17">4.15 Min</option>
				<option value="4.30 Min_18">04.30 Min</option>
				<option value="4.45 Min_19">4.45 Min</option>
				<option value="5.00 Hours_20">5.00 Hours</option>
				
			</select>
			
			</td>
          </tr>
          
          <tr>
          	<td><strong>Do you want to set price?</strong></td>
            <td>
            	<table>
                <tr>
                	<td>Yes</td>	
                    <td><input type="radio" name="setPrice" id="yesrad" value="Yes" /></td>
                </tr>
                <tr>
                	<td>No</td>	
                    <td><input type="radio" name="setPrice" id="norad" checked="checked" value="No" /></td>
                </tr>
                </table>
            </td>
          </tr>
          <tr>
          		<td colspan="2">
                <div id="divSetPrice" style="display:none;">
                	<table width="100%" border="0">
                    	<tr>
                        	<td width="45%"><strong>Service Price</strong></td>
                            <td><input type="number" name="servicePrice" id="servicePrice" style="width:300px;" /></td>
                        </tr>
                    </table>
                </div>
                </td>
          </tr>
          
          <tr>
          	<td></td>
            <td><input type="submit" name="btnServiceSubmit" value="Submit" /></td>
          </tr>
          
          </table>
        </form>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
$("#yesrad").click(function() {
 $("#divSetPrice").show( "slow", function() {
  });
});

$("#norad").click(function() {
 $("#divSetPrice").hide( "slow", function() {
  });


});

</script>
