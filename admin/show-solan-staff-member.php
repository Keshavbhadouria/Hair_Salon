<?php 
$dir = plugin_dir_path( __FILE__ );
//include_once($_SERVER['DOCUMENT_ROOT'].'/evnoforward/wp-includes/post.php' );
global $wpdb;
//$querystr = "SELECT  * from  wp_retails   order by  intRetailsID";
//$pageposts = $wpdb->get_results($querystr);
//echo  $wpdb->num_rows;

/**************** function of paging **************/
function perpage($count, $per_page = '10',$href) {
		$output = '';
		$paging_id = "link_perpage_box";
		if(!isset($_POST["page"])) $_POST["page"] = 1;
		if($per_page != 0)
		$pages  = ceil($count/$per_page);
		if($pages>1) {
			
			if(($_POST["page"]-3)>0) {
				if($_POST["page"] == 1)
					$output = $output . '<span id=1 class="current-page">1</span>';
				else				
					$output = $output . '<input type="submit" name="page" class="perpage-link" value="1" />';
			}
			if(($_POST["page"]-3)>1) {
					$output = $output . '...';
			}
			
			for($i=($_POST["page"]-2); $i<=($_POST["page"]+2); $i++)	{
				if($i<1) continue;
				if($i>$pages) break;
				if($_POST["page"] == $i)
					$output = $output . '<span id='.$i.' class="current-page" >'.$i.'</span>';
				else				
					$output = $output . '<input type="submit" name="page" class="perpage-link" value="' . $i . '" />';
			}
			
			if(($pages-($_POST["page"]+2))>1) {
				$output = $output . '...';
			}
			if(($pages-($_POST["page"]+2))>0) {
				if($_POST["page"] == $pages)
					$output = $output . '<span id=' . ($pages) .' class="current-page">' . ($pages) .'</span>';
				else				
					$output = $output . '<input type="submit" name="page" class="perpage-link" value="' . $pages . '" />';
			}
			
		}
		return $output;
	}
	
	function showperpage($sql, $per_page = 10, $href) {
		global $wpdb;
		//$result  = mysql_query($sql);
		//$count   = mysql_num_rows($result);
		$result = $wpdb->get_results($sql);
		$count  = $wpdb->num_rows;
		$perpage = perpage($count, $per_page,$href);
		return $perpage;
	}
/*************** end here ******************/

	$name = "";
	$email = "";
	
	$queryCondition = "";
	if(!empty($_POST["search"])) {
		foreach($_POST["search"] as $k=>$v){
			if(!empty($v)) {

				$queryCases = array("name","email");
				if(in_array($k,$queryCases)) {
					if(!empty($queryCondition)) {
						$queryCondition .= " AND ";
					} else {
						$queryCondition .= " WHERE ";
					}
				}
				switch($k) {
					case "name":
						$name = $v;
						$queryCondition .= " vchSalon_Staff_FirstName LIKE '" . $v . "%'";
						break;
					case "email":
						$email = $v;
						$queryCondition .= " vchSalon_Staff_Email LIKE '" . $v . "%'";
						break;
				}
			}
		}
	}
	$orderby = "ORDER BY intSalonStaffID desc"; 
	$sql = "SELECT  * from  saloon_staff " . $queryCondition;
	$href = 'index.php';					
		
	$perPage = 20; 
	$page = 1;
	if(isset($_POST['page'])){
		$page = $_POST['page'];
	}
	$start = ($page-1)*$perPage;
	if($start < 0) $start = 0;
		
	$query =  $sql . $orderby .  " limit " . $start . "," . $perPage; 
	//$result = $db_handle->runQuery($query);
	$result = $wpdb->get_results($query);
	
	if(!empty($result)) {
		$result["perpage"] = showperpage($sql, $perPage, $href);
	}


?>
<?php
 
 include($dir.'/header.php');
 ?>
<style>
#toys-grid {margin-bottom:30px;}
#toys-grid .txt-heading{background-color: #D3F5B8;}
#toys-grid table{width:100%;background-color:#F0F0F0;}
#toys-grid table td{background-color:#FFFFFF;}

.demoInputBox {padding: 10px;border: #F0F0F0 1px solid;border-radius: 4px;margin:0px 5px}
.btnSearch{padding: 10px;border: #F0F0F0 1px solid;border-radius: 4px;margin:0px 5px;}
.perpage-link{padding: 5px 10px;border: #C8EEFD 2px solid;border-radius: 4px;margin:0px 5px;background:#FFF;cursor:pointer;}
.current-page{padding: 5px 10px;border: #C8EEFD 2px solid;border-radius: 4px;margin:0px 5px;background:#C8EEFD;}
.btnEditAction{background-color:#2FC332;padding:2px 5px;color:#FFF;text-decoration:none;}
.btnDeleteAction{background-color:#D60202;padding:2px 5px;color:#FFF;text-decoration:none;}
#btnAddAction{background-color:#09F;border:0;padding:5px 10px;color:#FFF;text-decoration:none;}
#frmToy {border-top:#F0F0F0 2px solid;background:#FAF8F8;padding:10px;}
#frmToy div{margin-bottom: 15px}
#frmToy div label{margin-left: 5px}
.error{background-color: #FF6600;border:#AA4502 1px solid;padding: 5px 10px;color: #FFFFFF;border-radius:4px;}
.info{font-size:.8em;color: #FF6600;letter-spacing:2px;padding-left:5px;}
h2{background:#CCCCCC;padding:10px;}
</style>

  <h2>Staff Member List</h2>
  <form name="frmSearch" method="post" action="">
  <div class="search-box">
			<p><input type="text" placeholder="Name" name="search[name]" class="demoInputBox" value="<?php echo $name; ?>"	/>
			<input type="text" placeholder="Email" name="search[email]" class="demoInputBox" value="<?php echo $email; ?>"	/><input type="submit" name="go" class="btnSearch" value="Search"></p>
			</div>
            <style type="text/css">
				.editbtn{
				width:90%;
				float:left;
				background:#000099;
				color:#fff;
				margin:2px auto;
				text-align:center;
				padding:5px;
				border-radius:5px;
				}
				.delbtn{
					width:90%;
					float:left;
					background:#ff0000;
					color:#fff;
					margin:2px auto;
					text-align:center;
					padding:5px;
					border-radius:5px;
					}
					.rd > th {
					 background:#666666;
					 color:#fff;
					}
			</style>
  <table class="table table-bordered table-striped">
    <thead>
      <tr class="rd">
        <th>First Name</th>
        <th>Last Name</th>
        <th>Email</th>
        <th>Phone No</th>
        <th>Address</th>
		<th>Image</th>
		<th>Action</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach($result as $k=>$v) { 
	   if(is_numeric($k)) {
	  ?>
      <tr>
        
		<td><?php echo $result[$k]->vchSalon_Staff_FirstName;?></td>
		<td><?php echo $result[$k]->vchSalon_Staff_LastName;?></td>
		<td><?php echo $result[$k]->vchSalon_Staff_Email;?></td>
		<td><?php echo $result[$k]->vchSalon_Staff_PhoneNo;?></td>
		<td><?php echo $result[$k]->vchSalon_Staff_Address;?></td>
		<td><img  style="width:80px; height:80px;" src="<?php echo plugins_url();?>/booking-hair-saloon/admin/uploads/StaffMemberImage/thumbs/<?php echo $result[$k]->vchSalon_Staff_image;?>"></td>
		<td><?php 
				$assignday  = admin_url('admin.php').'/wp-admin?page=addstaffmember&hairdesserid='.$result[$k]->intSalonStaffID;
				$editlink  = admin_url('admin.php').'/wp-admin?page=staffmember&action=edit&tid='.$result[$k]->intSalonStaffID;
				$dellink  = admin_url('admin.php').'/wp-admin?page=staffmember&action=delete&tid='.$result[$k]->intSalonStaffID;
				?>
				<a href="<?php echo $assignday; ?>" style="color:#fff;">
                <div class="editbtn"> Assign Day </div> </a>
				<a href="<?php echo $editlink; ?>" style="color:#fff;">
                <div class="editbtn"> Edit </div> </a>
                <a href="<?php echo $dellink;?>" onClick="return confirm('Are you sure you want to delete it?');" style="color:#fff;">
                <div class="delbtn"> Delete </div>  </a>  
					</td>
       
     
      </tr>
	<?php } 
	  }
	
	if(isset($result["perpage"])) {
					?>
					<tr>
					<td colspan="10" align=right> <?php echo $result["perpage"]; ?></td>
					</tr>
					<?php } ?>
    </tbody>
  </table>
  </form>



