<?php 
$dir = plugin_dir_path( __FILE__ );
global $wpdb;
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
	// main image path
	$upload_img = cwUpload('imagefile',$dir.'/uploads/StaffMemberImage/','',TRUE,$dir.'/uploads/StaffMemberImage/thumbs/','300','346');
	//full path of the thumbnail image
	//$thumb_src = $dir.'/uploads/StaffMemberImage/thumbs/'.$upload_img;
if($upload_img)
	{
		$thumb_src = $dir.'/uploads/StaffMemberImage/thumbs/'.$upload_img;
		$upload_imgs = $upload_img;
	}
	else{
		
		$upload_imgs = '';
	}
	
/***************** end here************************************/
	
	$result = $wpdb->insert(
	'saloon_staff',
	array(
		'vchSalon_Staff_FirstName' => $_POST['FirstName'],
		'vchSalon_Staff_LastName' => $_POST['LastName'],
		'vchSalon_Staff_Email' => $_POST['email'],
		'vchSalon_Staff_PhoneNo' => $_POST['PhoneNo'],
		'vchSalon_Staff_Address' => $_POST['address'],
		'vchSalon_Staff_image' => $upload_imgs,
		'intSaloon_BranchId' => $_POST['Branch_Name']
		
		
	),
	array(
		
		'%s',
		'%s',
		'%s',
		'%s',
		'%s',
		'%s',
		'%d'
		
		
	)
);
if($result)
{
	 $flag= 1;

$lastid =  $wpdb->insert_id;
$link  = admin_url('admin.php').'/wp-admin?page=addstaffmember&hairdesserid='.$lastid;
	?>
    <script> window.location.href = "<?php echo $link;?>"; </script>
    <?php 

}
}

if(isset($_REQUEST['hairdesserid']) && $_REQUEST['hairdesserid']!='')
{
	$entries = $wpdb->get_results( "SELECT wp_saloon_branch.vchSaloonBranch,saloon_staff.* FROM saloon_staff 
	Left Join wp_saloon_branch ON wp_saloon_branch.intSaloonBranchId=saloon_staff.intSaloon_BranchId
	where intSalonStaffID='".$_REQUEST['hairdesserid']."'" );
	$entriesday = $wpdb->get_results( "SELECT * FROM wp_soloon_day where Inthairdesserid='".$_REQUEST['hairdesserid']."'" );
	
	if(isset($_POST['submitday']))
	  {
		
			/*if($_POST['selectday']!='')
			{
				$selectBox = $_POST['selTime'];
				
				for ($i=0; $i<sizeof($selectBox); $i++)
				{
					$newselectBox = explode('_',$selectBox[$i]);
				
				$result = $wpdb->insert(
				'wp_soloon_day',
				array(
					'vchdays' => $_POST['selectday'],
					'vchdaysTime' => $newselectBox[0],
					'Inthairdesserid' => $_REQUEST['hairdesserid'],
					'intcountvalue' => $newselectBox[1],
					'vchSaloonTitle' => $_POST['saloontitle']
				),
					array(
					'%s',
					'%s',
					'%d',
					'%d',
					'%s'

					)
				);
				}
				$link  = admin_url('admin.php').'/wp-admin?page=addstaffmember&hairdesserid='.$_REQUEST['hairdesserid'];
				?>
				<script> window.location.href = "<?php echo $link;?>"; </script>
				<?php 
			}*/
			if(isset($_POST['saloonbookdate']) && $_POST['saloonbookdate']!='')
			{
				
				//echo"<pre>";
				//print_r($_POST);
				//die();
				$selFromTime = explode('_',$_POST['selFromTime']);
				$selToTime = explode('_',$_POST['selToTime']);
				
				$result = $wpdb->insert(
				'wp_soloon_day',
				array(
					'vchdays' => $_POST['selectday'],
					'vchselFromTime' => $selFromTime[0],
					'vchselToTime' => $selToTime[0],
					'Inthairdesserid' => $_REQUEST['hairdesserid'],
					'intcountFromvalue' => $selFromTime[1],
					'intcountTovalue' => $selToTime[1],
					'vchSaloonTitle' => $_POST['saloontitle'],
					'vchSaloonAppDate' => $_POST['saloonbookdate']
				),
					array(
					'%s',
					'%s',
					'%s',
					'%d',
					'%d',
					'%d',
					'%s',
					'%s'

					)
				);
			}
			else
			{
				$link  = admin_url('admin.php').'/wp-admin?page=addstaffmember&hairdesserid='.$_REQUEST['hairdesserid'].'&msg=error';
				?>
				<script> window.location.href = "<?php echo $link;?>"; </script>
				<?php
			}
	  }
}


function getDaysValues($dayValue)
{
	global $wpdb;
	$dayByValue = $wpdb->get_results( "SELECT * FROM wp_soloon_day where vchSaloonAppDate='".$dayValue."' and Inthairdesserid='".$_REQUEST['hairdesserid']."' order by intcountFromvalue asc"  );
	return $dayByValue;
	
}

$entries_Branch = $wpdb->get_results( "SELECT * FROM wp_saloon_branch" );

	
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
			<div class="log-inner"><h3>Add New Staff Member</h3>
			 <?php if($flag=='1' ) { ?>
				<div class="alert alert-success">your form has been successfully submitted</div>
			<?php } ?>
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
						<?php if(isset($_REQUEST['hairdesserid']) && $_REQUEST['hairdesserid']!='')
						{ ?>
					<!--<img  style="width:80px; height:80px;" src="<?php echo plugins_url();?>/booking-hair-saloon/admin/uploads/StaffMemberImage/thumbs/<?php echo $entries[0]->vchSalon_Staff_image;?>">-->
						<?php } else {?>
						<input type="file" class="form-control"  id="imagefile" name="imagefile" >

						<?php  }?>
						</div>
					</div>
					<div class="col-lg-6">
						<div class="form-group">
						<label for="email">Address:</label>
						<!--<input type="email" class="form-control" id="email" name="email" required="true">-->
						<textarea class="form-control" rows="2" id="address" name="address" required="true"><?php echo  $entries[0]->vchSalon_Staff_Address;?></textarea>
						</div>
					</div>
					<?php if(isset($_REQUEST['hairdesserid']) && $_REQUEST['hairdesserid']!='')
						{ ?>
					<input type="hidden"  value="<?php echo $_SERVER['REQUEST_URI'] ;?>" name="RequestUri" id="RequestUri">
						<?php } else { ?> 
						<div class="col-lg-6">
						<div class="form-group">
						<input type="submit" class="btn btn-default" value="Publish" name="submit">
						
						</div>
					</div>
						<?php } ?>
				</form>
			</div>
		</div>
	<?php if(isset($_REQUEST['hairdesserid']) && $_REQUEST['hairdesserid']!='')
	{ 
	$dayByValueSelect = $wpdb->get_results( "SELECT * FROM wp_soloon_day where  Inthairdesserid='".$_REQUEST['hairdesserid']."' group by vchSaloonAppDate" );
	
	/*$newarraytime = array();
	foreach($dayByValueSelect as $result_Apppinfo)
	{
		
		$newarraytime[] = $result_Apppinfo->vchdaysTime;
		
	}*/
	//echo"<pre>";
	//print_r($dayByValueSelect);
?>
	<form method="post" action=""  id="my_form_date"  novalidate>
	<input style="width:100%;" type="hidden" name="hairdesserNewid" id="hairdesserNewid" value="<?php echo $_GET['hairdesserid'];?>">
    <input style="width:100%;" type="hidden" name="baseUrl" id="baseUrl" value="<?php echo plugins_url();?>">
		<div class="col-md-12">
		<table class="table table-bordered">
		<thead>
		<tr>
		<td><div class="col-md-12"><b>Date/Time </b></div></td>
		<td><input type="text" class="form-control datepicker" id="saloonbookdate"  name="saloonbookdate" placeholder="Date" required="true"></td>
		<td>
		<div class="col-md-12">
			<div class="col-md-4">
			
			<input type="text" class="form-control" id="selectday"  name="selectday" placeholder="Day" readonly>
			<p style="color:red;"><?php if($_GET['msg']=='error') { ?> Please First Select Day <?php } ?></p>
			</div>
			
			
			<div class="col-md-4">
			<label for="BookingUrl">From Time:</label>
			<select name="selFromTime" id="selFromTime" style="width:100%;" class="selectTime form-control" required="true" >
				<option value="" selected="selected">Select time</option>
				<option value="08.00 am_1" >08.00 am</option>
				<option value="08.15 am_2" >08.15 am</option>
				<option value="08.30 am_3" >08.30 am</option>
				<option value="08.45 am_4" >08.45 am</option>
				<option value="09.00 am_5">09.00 am</option>
				<option value="09.15 am_6">09.15 am</option>
				<option value="09.30 am_7">09.30 am</option>
				<option value="09.45 am_8">09.45 am</option>
				<option value="10.00 am_9">10.00 am</option>
				<option value="10.15 am_10">10.15 am</option>
				<option value="10.30 am_11">10.30 am</option>
				<option value="10.45 am_12">10.45 am</option>
				<option value="11.00 am_13">11.00 am</option>
				<option value="11.15 am_14">11.15 am</option>
				<option value="11.30 am_15">11.30 am</option>
				<option value="11.45 am_16">11.45 am</option>
				<option value="12.00 pm_17">12.00 pm</option>
				<option value="12.15 pm_18">12.15 pm</option>
				<option value="12.30 pm_19">12.30 pm</option>
				<option value="12.45 pm_20">12.45 pm</option>
				<option value="01.00 pm_21">01.00 pm</option>
				<option value="01.15 pm_22">01.15 pm</option>
				<option value="01.30 pm_23">01.30 pm</option>
				<option value="01.45 pm_24">01.45 pm</option>
				<option value="02.00 pm_25">02.00 pm</option>
				<option value="02.15 pm_26">02.15 pm</option>
				<option value="02.30 pm_27">02.30 pm</option>
				<option value="02.45 pm_28">02.45 pm</option>
				<option value="03.00 pm_29">03.00 pm</option>
				<option value="03.15 pm_30">03.15 pm</option>
				<option value="03.30 pm_31">03.30 pm</option>
				<option value="03.45 pm_32">03.45 pm</option>
				<option value="04.00 pm_33">04.00 pm</option>
				<option value="04.15 pm_34">04.15 pm</option>
				<option value="04.30 pm_35">04.30 pm</option>
				<option value="04.45 pm_36">04.45 pm</option>
				<option value="05.00 pm_37">05.00 pm</option>
				<option value="05.15 pm_38">05.15 pm</option>
				<option value="05.30 pm_39">05.30 pm</option>
				<option value="05.45 pm_40">05.45 pm</option>
				<option value="06.00 pm_41">06.00 pm</option>
				<option value="06.15 pm_42">06.15 pm</option>
				<option value="06.30 pm_43">06.30 pm</option>
				<option value="06.45 pm_44">06.45 pm</option>
				<option value="07.00 pm_45">07.00 pm</option>
				<option value="07.15 pm_46">07.15 pm</option>
				<option value="07.30 pm_47">07.30 pm</option>
				<option value="07.45 pm_48">07.45 pm</option>
				<option value="08.00 pm_49">08.00 pm</option>
				<option value="08.15 pm_50">08.15 pm</option>
				<option value="08.30 pm_51">08.30 pm</option>
				<option value="08.45 pm_52">08.30 pm</option>
				<option value="09.00 pm_53">09.00 pm</option>
			</select>
			</div>
			<div class="col-md-4">
			<label for="BookingUrl">To Time:</label>
			<select name="selToTime" id="selToTime" style="width:100%;" class="selectTime form-control" required="true" >
				<option value="" selected="selected">Select time</option>
				<option value="08.00 am_1" >08.00 am</option>
				<option value="08.15 am_2" >08.15 am</option>
				<option value="08.30 am_3" >08.30 am</option>
				<option value="08.45 am_4" >08.45 am</option>
				<option value="09.00 am_5">09.00 am</option>
				<option value="09.15 am_6">09.15 am</option>
				<option value="09.30 am_7">09.30 am</option>
				<option value="09.45 am_8">09.45 am</option>
				<option value="10.00 am_9">10.00 am</option>
				<option value="10.15 am_10">10.15 am</option>
				<option value="10.30 am_11">10.30 am</option>
				<option value="10.45 am_12">10.45 am</option>
				<option value="11.00 am_13">11.00 am</option>
				<option value="11.15 am_14">11.15 am</option>
				<option value="11.30 am_15">11.30 am</option>
				<option value="11.45 am_16">11.45 am</option>
				<option value="12.00 pm_17">12.00 pm</option>
				<option value="12.15 pm_18">12.15 pm</option>
				<option value="12.30 pm_19">12.30 pm</option>
				<option value="12.45 pm_20">12.45 pm</option>
				<option value="01.00 pm_21">01.00 pm</option>
				<option value="01.15 pm_22">01.15 pm</option>
				<option value="01.30 pm_23">01.30 pm</option>
				<option value="01.45 pm_24">01.45 pm</option>
				<option value="02.00 pm_25">02.00 pm</option>
				<option value="02.15 pm_26">02.15 pm</option>
				<option value="02.30 pm_27">02.30 pm</option>
				<option value="02.45 pm_28">02.45 pm</option>
				<option value="03.00 pm_29">03.00 pm</option>
				<option value="03.15 pm_30">03.15 pm</option>
				<option value="03.30 pm_31">03.30 pm</option>
				<option value="03.45 pm_32">03.45 pm</option>
				<option value="04.00 pm_33">04.00 pm</option>
				<option value="04.15 pm_34">04.15 pm</option>
				<option value="04.30 pm_35">04.30 pm</option>
				<option value="04.45 pm_36">04.45 pm</option>
				<option value="05.00 pm_37">05.00 pm</option>
				<option value="05.15 pm_38">05.15 pm</option>
				<option value="05.30 pm_39">05.30 pm</option>
				<option value="05.45 pm_40">05.45 pm</option>
				<option value="06.00 pm_41">06.00 pm</option>
				<option value="06.15 pm_42">06.15 pm</option>
				<option value="06.30 pm_43">06.30 pm</option>
				<option value="06.45 pm_44">06.45 pm</option>
				<option value="07.00 pm_45">07.00 pm</option>
				<option value="07.15 pm_46">07.15 pm</option>
				<option value="07.30 pm_47">07.30 pm</option>
				<option value="07.45 pm_48">07.45 pm</option>
				<option value="08.00 pm_49">08.00 pm</option>
				<option value="08.15 pm_50">08.15 pm</option>
				<option value="08.30 pm_51">08.30 pm</option>
				<option value="08.45 pm_52">08.30 pm</option>
				<option value="09.00 pm_53">09.00 pm</option>
			</select>
			</div>
		</div>
		</td>
		<td>
	
		<div class="col-md-12">
			<input type="text" class="form-control"  name="saloontitle" placeholder="Title" required="true">
		</div>
		
		</td>
		<td>
		<div class="col-lg-6">
		<div class="form-group">
			<input type="submit" class="btn btn-default" value="Add" name="submitday">
		</div>
		</div>
		</td>
		</tr>
		</thead>
		<tbody>
		<?php foreach($dayByValueSelect as $dayByValueSelectinfo) { ?>
		<tr>
		<td><?php echo $dayByValueSelectinfo->vchSaloonAppDate.'</br><b>'.$dayByValueSelectinfo->vchdays ?></b></td>
		<td colspan="4">
		<?php $sundayValues =  getDaysValues($dayByValueSelectinfo->vchSaloonAppDate); ?>
		<table  width="100%">
				<tr><td>
				<div class="col-md-12">
					<?php for($s=0; $s<sizeof($sundayValues); $s++){ ?>
					<div class="col-md-3" rel="<?php echo  $sundayValues[$s]->intDayId;?>" >
					
					<p style="background-color:green">
					 <b>Title:</b><?php echo  $sundayValues[$s]->vchSaloonTitle;  ?></br>
					From:<?php echo $sundayValues[$s]->vchselFromTime; ?>-<?php echo $sundayValues[$s]->vchselToTime; ?><span class="del-day " rel="<?php echo  $sundayValues[$s]->intDayId;?>"><img  style="width:10%" src="<?php echo plugins_url().'/booking-hair-saloon/admin/images/delete-icon.png';?>"></span></p>
					</div>
					<?php } ?>
					</td>
					</div>
				</tr>
			</table>
		</td>
		</tr>
		<?php } ?>
		
		</tbody>
		</table>
		</form>
		</div>
		<?php } ?>
	</div>
</div>


  <!-- Modal -->
  <div class="modal" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close"  id="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Selected Date And Time</h4>
        </div>
        <div class="modal-body">
          <p id="data-time">Some text in the modal.</p>
        </div>
        
      </div>
      
    </div>
  </div>
  



<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  
<!-- Latest compiled and minified JavaScript -->
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
	
	
	
	
	
    $( "#my_form_date" ).submit(function( event ){ //on form submit       
        var proceed = true;
        //loop through each field and we simply change border color to red for invalid fields       
        $("#my_form_date input[required=true], #my_form_date textarea[required=true] ,#my_form_date select[required=true],#my_form_date radio[required=true],#my_form_date file[required=true]").each(function(){
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
				
		if($('#selFromTime').val()!='' || $('#selToTime').val()!='')
		{
			
			var selFromTime = $('#selFromTime').val();
			var selToTime = $('#selToTime').val();
			var resFromTime  = selFromTime.split("_");
			var resToTime  = selToTime.split("_");
			
			if(parseInt(resFromTime[1]) > parseInt(resToTime[1]))
			{
				 $('#selFromTime').css('border-color','red');
				$('#selToTime').css('border-color','red');
				alert('From Time greater than To time');
				proceed = false;
			}
		}
							
				
        });
        
        if(proceed){ //if form is valid submit form
           
			return true;
			
			
        }
        event.preventDefault(); 
    });
    
     //reset previously set border colors and hide all message on .keyup()
    $("#my_form_date input[required=true], #my_form_date textarea[required=true],#my_form_date select[required=true]").keyup(function() { 
        $(this).css('border-color',''); 
        $("#result").slideUp();
    });
	$( "#Branch_Name" ).change(function() 
	{
        $(this).css('border-color',''); 
        //$("#result").slideUp();
    });
	
	$( "#saloonbookdate" ).change(function() 
	{
		$(this).css('borderColor','');
		var saloonbookdate= $(this).val();
		var baseUrl = $("#baseUrl").val();
		var hairdesserNewid = $("#hairdesserNewid").val();
		$.ajax({
		type: "POST",
		url: baseUrl+'/booking-hair-saloon/admin/check-appointment.php',
		data: {
			saloonbookdate :saloonbookdate,
			hairdesserNewid :hairdesserNewid
		
		},
		success: function(msg) 
		{
			
			$("#selFromTime").replaceWith(msg);
			$("#selToTime").replaceWith(msg);
			
			return false;
		}

		});
	});
	
	
	$( "#close" ).click(function() {
	 $('#myModal').css('display','none');
	});
	
	$('.del-day ').click(function()
	{
		var del_day_value = $(this).attr('rel');
		var baseUrl = $("#baseUrl").val();
		var RequestUri = $("#RequestUri").val();
		 var x = confirm("Are you sure you want to delete?");
		  if (x)
		  {
			  
				$.ajax({
				type: "POST",
				url: baseUrl+'/booking-hair-saloon/admin/check-appointment.php',
				data: {
				saloon_day :del_day_value,
				},
				success: function(msg) 
				{

				if(msg==1)
				{
				window.location.href = RequestUri;
				}
				return false;
				}

				});
				return true;
			  
		  } 
		  else
		  {
			    return false;
		  }
		
	});
	
});	
  $( function() {
    $(".datepicker").datepicker({
                dateFormat: "yy-mm-dd",
                onSelect: function(dateText, inst) {
                    var date = $.datepicker.parseDate(inst.settings.dateFormat || $.datepicker._defaults.dateFormat, dateText, inst.settings);
					var dateText = $.datepicker.formatDate("DD", date, inst.settings);
					var datevalue = $.datepicker.formatDate("yy-mm-dd", date);
					
					$('#selectday').val(dateText);
					
					 $('#myModal').css('display','block');
					 var seleted_date_time ='<b>Date</b>='+datevalue+' <b>Day</b>='+ dateText;
					 $('#data-time').html(seleted_date_time);
					$(this).css('borderColor','');
					var saloonbookdate= datevalue;
					var baseUrl = $("#baseUrl").val();
					var hairdesserNewid = $("#hairdesserNewid").val();
					$.ajax({
					type: "POST",
					url: baseUrl+'/booking-hair-saloon/admin/check-appointment.php',
					data: {
					saloonbookdate :saloonbookdate,
					hairdesserNewid :hairdesserNewid

					},
					success: function(msg) 
					{
					var obj = jQuery.parseJSON(msg);
					//$("#selFromTime").replaceWith(msg);
					$("#selFromTime").replaceWith(obj.FromArr);
					$("#selToTime").replaceWith(obj.ToArr);

					return false;
					}

					});
                }
            });
  } );
  
  
</script>

