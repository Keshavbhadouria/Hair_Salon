<?php 
$dir = plugin_dir_path( __FILE__ );
global $wpdb;
if(isset($_REQUEST['tid']) && $_REQUEST['tid']!='')
{
  $entries = $wpdb->get_results( "SELECT * FROM wp_saloon_branch where intSaloonBranchId='".$_REQUEST['tid']."'" );
}
if(isset($_POST['submit']))
{
	

	
/***************** end here************************************/


$result = $wpdb->update(
	'wp_saloon_branch',
	array(
		'vchSaloonBranch' => $_POST['SaloonBranch']
	
	),
	array( 'intSaloonBranchId' => $_REQUEST['tid'] ), 
	array(
		'%s'
		
	),
	array( '%d' ) 
);

	$link  = admin_url('admin.php').'/wp-admin?page=manage_branch';
	?>
    <script> window.location.href = "<?php echo $link;?>"; </script>
    <?php 
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
	 input[type="button"], input[type="reset"], input[type="submit"], input[type="file"] {
	   background:#CCCCCC;
		padding:0px 20px!important;
		font-size:16px;
	 }
  </style>
<div class="content" id="content">
	<div class="col-md-12">
		<div class="col-md-12">
			<div class="log-inner"><h3>Edit Staff Member</h3>
			 
				<form    action="" method="post" id="my_form" novalidate enctype="multipart/form-data" class="form-inline">
					<div class="col-lg-6">
						<div class="form-group">
						<label for="FirstName">Saloon Branch Name:</label>
						<input type="text" class="form-control" id="SaloonBranch" name="SaloonBranch" required="true" value="<?php echo  $entries[0]->vchSaloonBranch;?>">
						</div>
					</div>
					
					<div class="col-lg-6">
						<div class="form-group">
						<input type="submit" class="btn btn-default" value="submit" name="submit">
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready( function()

    {//simple validation at client's end
	
    $( "#my_form" ).submit(function( event ){ //on form submit       
        var proceed = true;
        //loop through each field and we simply change border color to red for invalid fields       
        $("#my_form input[required=true], #my_form textarea[required=true] ,#my_form select[required=true],#my_form radio[required=true],#my_form file[required=true]").each(function(){
                $(this).css('border-color',''); 
                if(!$.trim($(this).val())){ //if this field is empty 
                    $(this).css('border-color','red'); //change border color to red   
                   proceed = false; //set do not proceed flag
                }
                //check invalid email
                var email_reg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/; 
                if($(this).attr("type")=="email" && !email_reg.test($.trim($(this).val()))){
                    $(this).css('border-color','red'); //change border color to red   
                    proceed = false; //set do not proceed flag            
                } 
				
							
				
        });
        
        if(proceed){ //if form is valid submit form
           
			return true;
			
			
        }
        event.preventDefault(); 
    });
    
     //reset previously set border colors and hide all message on .keyup()
    $("#my_form input[required=true], #my_form textarea[required=true]").keyup(function() { 
        $(this).css('border-color',''); 
        $("#result").slideUp();
    });
	
	
	
	
});
</script>

