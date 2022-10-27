<?php
error_reporting(0); 
$dir = plugin_dir_path( __FILE__ );
global $wpdb;
$Sql="SELECT * FROM wp_saloon_custom_redirection";
$results = $wpdb->get_results($Sql);
if(isset($_POST['submit']))
{

	$result = $wpdb->insert(
	'sl_saloon_client',
	array(
		'VchFirstName' => $_POST['FirstName'],
		'VchLastName' => $_POST['LastName'],
		'VchEmail' => $_POST['email'],
		'VchPassword' => md5($_POST['Password']),
		'VchPhoneNo' => $_POST['PhoneNo']
		
		),
	array(
		
		'%s',
		'%s',
		'%s',
		'%s',
		'%s'
	)
);
/*$sqlinsert ="insert into sl_saloon_client set VchFirstName='".$_POST['FirstName']."',VchLastName='".$_POST['LastName']."',VchEmail='".$_POST['email']."',VchPhoneNo='".$_POST['PhoneNo']."' "; 
die();
$result = $wpdb->query($sqlinsert);*/

if($result)
{
	 $flag= 1;
	 $lastid =  $wpdb->insert_id;
	 $to = $_POST['email'];
   
   $subject = " Booking Notification";
    $message = '<html>
    <head>
    <title> Booking Notification</title>
    </head>
    <body>
    <p><b>Hello   '.$_POST['FirstName'].'</b></p>
    <p><b>Name: '.$_POST['FirstName'].' '.$_POST['LastName'].' </b></p>
    
    <p><b>Email: '.$_POST['email'].' </b></p>
    <p><b>Password: '.$_POST['Password'].' </b></p>
    <p><b>Phone No: '.$_POST['PhoneNo'].' </b></p>
   </body>
    </html>';
    
 $headers = "MIME-Version: 1.0" . "\r\n";
 $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
 $headers .= 'From: harsh@rrtechnosolutions.in' . "\r\n";
 $sendmailprojecr =  mail($to, $subject, $message, $headers);
	 
	 
	 @ob_start();
	session_start();
	$_SESSION['client_id'] = $lastid;
	$link  = $results[0]->vchRegistrationUrl;
	?>
    <script> window.location.href = "<?php echo $link;?>"; </script>
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
			<div class="log-inner"><h3>Register</h3>
			 <?php if($flag=='1' ) { ?>
				<div class="alert alert-success">your form has been successfully submitted</div>
			<?php } ?>
				<form    action="" method="post" id="my_form" novalidate enctype="multipart/form-data">
					<div class="col-lg-6">
						<div class="form-group">
						<label for="FirstName">First Name:</label>
						<input type="text" class="form-control" id="FirstName" name="FirstName" required="true">
						</div>
					</div>
					<div class="col-lg-6">
						<div class="form-group">
						<label for="LastName">Last Name:</label>
						<input type="text" class="form-control" id="LastName" name="LastName" required="true">
						</div>
					</div>
					<div class="col-lg-6">
						<div class="form-group">
						<label for="email">Email address:</label>
						<input type="email" class="form-control" id="email" name="email" required="true">
						</div>
					</div>
					<div class="col-lg-6">
						<div class="form-group">
						<label for="Password">Password:</label>
						<input type="Password" class="form-control" id="Password" name="Password" required="true">
						</div>
					</div>
					<div class="col-lg-6">
						<div class="form-group">
						<label for="PhoneNo">Phone No:</label>
						<input type="text" class="form-control" id="PhoneNo" name="PhoneNo" required="true">
						</div>
					</div>
					
					<div class="col-lg-6">
						<div class="form-group">
						<input type="submit" class="btn btn-default" value="Save" name="submit">
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

