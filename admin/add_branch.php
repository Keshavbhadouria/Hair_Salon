<?php 
$dir = plugin_dir_path( __FILE__ );
global $wpdb;
if(isset($_POST['submit']))
{
	
/***************** end here************************************/
	$result = $wpdb->insert(
		'wp_saloon_branch',
		array(
			'vchSaloonBranch' => $_POST['SaloonBranch']
			
		),
		array(
			
			'%s'
			
		)
	);
	if($result)
	{
		 $flag= 1;

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
	 input[type="button"], input[type="reset"], input[type="submit"], input[type="file"] {
	   background:#CCCCCC;
		padding:0px 20px!important;
		font-size:16px;
	 }
  </style>	 

<div class="content" id="content">
	<div class="col-md-12">
		<div class="col-md-12">
			<div class="log-inner"><h3>Add New Branch</h3>
			 <?php if($flag=='1' ) { ?>
				<div class="alert alert-success">your form has been successfully submitted</div>
			<?php } ?>
				<form    action="" method="post" id="my_form" novalidate enctype="multipart/form-data" class="form-inline">
					
						<div class="form-group">
						<label for="FirstName">Branch Name:</label>
						<input type="text" class="form-control" id="SaloonBranch" name="SaloonBranch" required="true" value="">
						</div>
					<div class="form-group">
						<input type="submit" class="btn btn-default" value="Save" name="submit">
					</div>
					
						
				</form>
				
				
				
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
    $("#my_form_date input[required=true], #my_form_date textarea[required=true]").keyup(function() { 
        $(this).css('border-color',''); 
        $("#result").slideUp();
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

