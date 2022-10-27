<?php 
$dir = plugin_dir_path( __FILE__ );
global $wpdb;
if(isset($_REQUEST['tid']) && $_REQUEST['tid']!='')
{
  $entries = $wpdb->get_results( "SELECT * FROM saloon_staff where intSalonStaffID='".$_REQUEST['tid']."'" );
}
if(isset($_POST['submit']))
{
	
	
	/************** function for thumb nail in php **********/
	function cwUpload($field_name = '', $target_folder = '', $file_name = '', $thumb = FALSE, $thumb_folder = '', $thumb_width = '', $thumb_height = '')
	{
	//folder path setup
	$target_path = $target_folder;
	$thumb_path = $thumb_folder;
	
	//file name setup
	$allowedExts = array("gif", "jpeg", "jpg", "png");
	$filename_err = explode(".",$_FILES[$field_name]['name']);
	$filename_err_count = count($filename_err);
	$file_ext = $filename_err[$filename_err_count-1];
	if($file_name != '')
	{
		$fileName = $file_name.'.'.$file_ext;
	}
	else
	{
		$fileName = time().'-'.$_FILES[$field_name]['name'];
	}
	
	//upload image path
	$upload_image = $target_path.$fileName;
	//upload image
	if ((($_FILES[$field_name]["type"] == "image/gif")|| ($_FILES[$field_name]["type"] == "image/jpeg")
			|| ($_FILES[$field_name]["type"] == "image/jpg")|| ($_FILES[$field_name]["type"] == "image/png")))
	{
		if(move_uploaded_file($_FILES[$field_name]['tmp_name'],$upload_image))
		{
			//thumbnail creation
			if($thumb == TRUE)
			{
				$thumbnail = $thumb_path.$fileName;
				list($width,$height) = getimagesize($upload_image);
				$thumb_create = imagecreatetruecolor($thumb_width,$thumb_height);
				switch($file_ext){
					case 'jpg':
						$source = imagecreatefromjpeg($upload_image);
						break;
					case 'jpeg':
						$source = imagecreatefromjpeg($upload_image);
						break;
					case 'png':
						$source = imagecreatefrompng($upload_image);
						break;
					case 'gif':
						$source = imagecreatefromgif($upload_image);
						break;
					default:
						$source = imagecreatefromjpeg($upload_image);
				}
				imagecopyresized($thumb_create,$source,0,0,0,0,$thumb_width,$thumb_height,$width,$height);
				switch($file_ext){
					case 'jpg' || 'jpeg':
						imagejpeg($thumb_create,$thumbnail,100);
						break;
					case 'png':
						imagepng($thumb_create,$thumbnail,100);
						break;
					case 'gif':
						imagegif($thumb_create,$thumbnail,100);
						break;
					default:
						imagejpeg($thumb_create,$thumbnail,100);
				}
			}

			return $fileName;
		}
	
		else
		{
			return false;
		}
	}
	}
	
	if($_FILES['imagefile']['name']!=''){
	// main image path
	$upload_img = cwUpload('imagefile',$dir.'/uploads/StaffMemberImage/','',TRUE,$dir.'/uploads/StaffMemberImage/thumbs/','300','346');
	//full path of the thumbnail image
	$thumb_src = $dir.'/uploads/StaffMemberImage/thumbs/'.$upload_img;
	}
	
	else{
	$upload_img = $_POST['oldimagefile'];	
	}
	
	
/***************** end here************************************/


$result = $wpdb->update(
	'saloon_staff',
	array(
		'vchSalon_Staff_FirstName' => $_POST['FirstName'],
		'vchSalon_Staff_LastName' => $_POST['LastName'],
		'vchSalon_Staff_Email' => $_POST['email'],
		'vchSalon_Staff_PhoneNo' => $_POST['PhoneNo'],
		'vchSalon_Staff_Address' => $_POST['address'],
		'vchSalon_Staff_image' => $upload_img,
		'intSaloon_BranchId' => $_POST['Branch_Name']
		
	),
	array( 'intSalonStaffID' => $_REQUEST['tid'] ), 
	array(
		'%s',
		'%s',
		'%s',
		'%s',
		'%s',
		'%s',
		'%d'
	),
	array( '%d' ) 
);

	$link  = admin_url('admin.php').'/wp-admin?page=staffmember';
	?>
    <script> window.location.href = "<?php echo $link;?>"; </script>
    <?php 
	}
?>
<?php
 $entries_Branch = $wpdb->get_results( "SELECT * FROM wp_saloon_branch" );
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
			 
				<form    action="" method="post" id="my_form" novalidate enctype="multipart/form-data">
					
					<div class="col-lg-6">
						<div class="form-group">
						<label for="sel1">Branch Name:</label>
						<select class="form-control" name="Branch_Name" id="Branch_Name" required="true">
						 <option value="" >Select branch</option>
						<?php 
						foreach($entries_Branch as $entries_Branchinfo)
						{
						?>
						<option value="<?php echo $entries_Branchinfo->intSaloonBranchId;?>" <?php
						if($entries[0]->intSaloon_BranchId==$entries_Branchinfo->intSaloonBranchId) { echo "selected"; } ?>><?php echo $entries_Branchinfo->vchSaloonBranch;?></option>
						<?php }  ?>
						
						</select>
						</div>
					</div>
					<div class="col-lg-6">
						<div class="form-group">
						<label for="FirstName">First Name:</label>
						<input type="text" class="form-control" id="FirstName" name="FirstName" required="true" value="<?php echo  $entries[0]->vchSalon_Staff_FirstName;?>">
						</div>
					</div>
					<div class="col-lg-6">
						<div class="form-group">
						<label for="LastName">Last Name:</label>
						<input type="text" class="form-control" id="LastName" name="LastName" required="true" value="<?php echo  $entries[0]->vchSalon_Staff_LastName;?>">
						</div>
					</div>
					<div class="col-lg-6">
						<div class="form-group">
						<label for="email">Email address:</label>
						<input type="email" class="form-control" id="email" name="email" required="true" value="<?php echo  $entries[0]->vchSalon_Staff_Email;?>">
						</div>
					</div>
					<div class="col-lg-6">
						<div class="form-group">
						<label for="PhoneNo">Phone No:</label>
						<input type="text" class="form-control" id="PhoneNo" name="PhoneNo" required="true" value="<?php echo  $entries[0]->vchSalon_Staff_PhoneNo;?>">
						</div>
					</div>
					<div class="col-lg-6">
						<div class="form-group">
						<label for="PhoneNo">Image Upload :</label>
						<input type="file" class="form-control1"  id="imagefile" name="imagefile"  >
						<input type="hidden" class="form-control"  id="oldimagefile" name="oldimagefile"  value="<?php echo  $entries[0]->vchSalon_Staff_image;?>">
						</div>
					</div>
					<div class="col-lg-6">
						<div class="form-group">
						<label for="email">Address:</label>
						<!--<input type="email" class="form-control" id="email" name="email" required="true">-->
						<textarea class="form-control" rows="2" id="address" name="address" required="true"><?php echo  $entries[0]->vchSalon_Staff_Address;?></textarea>
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

