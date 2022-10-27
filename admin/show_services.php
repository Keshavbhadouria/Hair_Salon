<?php 
$dir = plugin_dir_path( __FILE__ );
global $wpdb;
include($dir.'/header.php');

// Deletion operation //
if(!empty($_GET['serId']) and $_GET['act']=="del")
{
	$wpdb->delete('tbl_services', array('serviceId' => $_GET['serId']));


}


// Services Code Starts //
$sqlQuery = "SELECT *,date_format(created_at,'%D %b %Y at %h:%i:%s')as dateCreated,date_format(modified_at,'%D %b %Y at %h:%i:%s')as modifiedLast from tbl_services";

if($_GET['searchService'])
	$sqlQuery.= " where serviceName LIKE '%".$_GET['searchService']."%'";	

$sqlQuery.=" order by serviceId desc";
$serviceInfo = $wpdb->get_results($sqlQuery);


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

#newServiceButton{
	background: #000099 none repeat scroll 0 0;
    border-radius: 5px;
    color: #fff;
    margin: 2px auto;
    padding: 6px;
    width: 11%;
	text-decoration:none;
}
</style>
  <h2>Manage Services</h2>
  <form name="frmSearch" method="get" action="">
  <div class="search-box">
  <input type="hidden" name="page" value="services" />
	<p><input type="text" placeholder="Search by service name" required name="searchService" class="demoInputBox" style="width:260px;"/>
       <input type="submit" name="btnSearchGo" value="Search"></p>
</div>
 </form>
<div><a href="<?php echo get_admin_url() ?>admin.php/?page=add_new_services" id="newServiceButton">Add New Service</a></div>           
<p></p>            
  <table border="1" width="95%">
    <thead>
      <tr class="rd">
        <td><strong>Service Name</strong></td>
        <td><strong>Duration of Time</strong></td>
        <td><strong>Set Price</strong></td>
        <td><strong>Price</strong></td>
        <td><strong>Date Created</strong></td>
        <td><strong>Last Modified</strong></td>
		<td><strong>Operations</strong></td>
      </tr>
    </thead>
    <tbody>
      <?php
	  if(sizeof($serviceInfo) > 0)
	  {
		  for($x=0; $x<sizeof($serviceInfo); $x++)
	  	  { 
	  ?>
      <tr>
		<td><?php echo $serviceInfo[$x]->serviceName;?></td>
		<td><?php echo $serviceInfo[$x]->serviceDuration;?></td>
        <td><?php echo $serviceInfo[$x]->setPrice;?></td>
		<td><?php echo '$'.$serviceInfo[$x]->servicePrice;?></td>
		<td><?php echo $serviceInfo[$x]->dateCreated;?></td>
        <td><?php echo $serviceInfo[$x]->modifiedLast;?></td>
		<td>
        	<a href="<?php echo get_admin_url() ?>admin.php/?page=edit_services&serviceId=<?php echo $serviceInfo[$x]->serviceId; ?>">Edit</a> |
	        <a onclick="return confirm('Are you sure you want to delete it?')" href="<?php echo get_admin_url() ?>admin.php/?page=services&act=del&serId=<?php echo $serviceInfo[$x]->serviceId; ?>">Delete</a>
        </td>
	</tr>
	<?php
		}
	}
	?>
    </tbody>
  </table>
 



