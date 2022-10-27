<?php
error_reporting(0); 
$dir = plugin_dir_path( __FILE__ );
global $wpdb;
$Sql="SELECT * FROM wp_saloon_custom_redirection";
include($dir.'/header.php');

if(isset($_POST['btnServiceUpdate']) and !empty($_POST['btnServiceUpdate']))
{
	$wpdb->update( 
	'tbl_services', 
	array( 
		'serviceName' => addslashes($_POST['serviceName']),	
		'serviceDuration' => addslashes($_POST['serviceDuration']),
		'setPrice' => $_POST['setPrice'],
		'servicePrice'=>$_POST['servicePrice'],
		'modified_at'=>date('Y-m-d h:i:s'),
			
	), 
	array( 'serviceId' => $_REQUEST['serviceId'] )
	
);
	
$successService = "Service information has been successfully saved.";	  


}
$sqlQuery = "SELECT * from tbl_services where serviceId='".$_REQUEST['serviceId']."'";
$editSerInfo = $wpdb->get_results($sqlQuery);

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
        <h3>Edit Service</h3>
        <form action="<?php echo get_admin_url() ?>admin.php/?page=edit_services&serviceId=<?php echo $_REQUEST['serviceId']; ?>" method="post" id="my_form">
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
            <td><input type="text" name="serviceName" value="<?php echo stripslashes($editSerInfo['0']->serviceName); ?>" /></td>
          </tr>
          
           <tr>
          	<td><strong>Duration of time</strong></td>
            <td><input type="text" name="serviceDuration" id="serviceDuration" value="<?php echo stripslashes($editSerInfo['0']->serviceDuration); ?>" /></td>
          </tr>
          
          <tr>
          	<td><strong>Do you want to set price?</strong></td>
            <td>
            	<table>
                <tr>
                	<td>Yes</td>	
                    <td><input type="radio" name="setPrice" id="yesrad" <?php if($editSerInfo['0']->setPrice=="Yes"){ ?> checked="checked" <?php } ?> value="Yes" /></td>
                </tr>
                <tr>
                	<td>No</td>	
                    <td><input type="radio" name="setPrice" id="norad" <?php if($editSerInfo['0']->setPrice=="No"){ ?> checked="checked" <?php } ?> value="No" /></td>
                </tr>
                </table>
            </td>
          </tr>
          <tr>
          		<td colspan="2">
                
                	<table width="100%" border="0">
                    	<tr>
                        	<td width="45%"><strong>Service Price</strong></td>
                            <td><input type="number" value="<?php echo $editSerInfo['0']->servicePrice; ?>" name="servicePrice" id="servicePrice" style="width:300px;" /></td>
                        </tr>
                    </table>
                
                </td>
          </tr>
          
          <tr>
          	<td></td>
            <td><input type="submit" name="btnServiceUpdate" value="Update" /></td>
          </tr>
          
          </table>
        </form>
      </div>
    </div>
  </div>
</div>

