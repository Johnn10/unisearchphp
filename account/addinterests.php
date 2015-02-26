<?php
require_once("../models/config.php");
include '../databaseconnector.php';

if(isset($_GET["interesteditid"])){
	$database->update("interests", [
	"interest_name"=>$_GET["interestname"],
	"interest_description"=>$_GET["interestdesc"]],
	["interest_id"=>$_GET["interesteditid"]]);
}

if(isset($_GET['action'])&&$_GET['action']=='delete'){
	//echo 'ght';
	$database->delete('interests', [
	"interest_id" =>$_GET["interestid"]
]);
var_dump($database);
}
// Request method: GET
$ajax = checkRequestMode("get");

if (!securePage(__FILE__)){
    apiReturnError($ajax);
}

setReferralPage(getAbsoluteDocumentPath(__FILE__));

?>

<!DOCTYPE html>
<html lang="en">
  <?php
  	echo renderAccountPageHeader(array("#SITE_ROOT#" => SITE_ROOT, "#SITE_TITLE#" => SITE_TITLE, "#PAGE_TITLE#" => "Account Settings"));
  ?>

  <body>
    <div id="wrapper">

      <!-- Sidebar -->
        <?php
          echo renderMenu("settings");
        ?>  

      <div id="page-wrapper">
	  	<div class="row">
          <div class="col-lg-12">
            <ol class="breadcrumb">
              <li class="active"><i class="fa fa-plus"></i> Add Interests</li>
            </ol>
            
             <div id='display-alerts' class="col-lg-12">

          </div>
          </div>
        </div>
		<div class="row">
		  <div class="col-lg-12">
		  	<?php
		  	if(isset($_GET['action'])&&$_GET['action']=='edit'){
	
$datas = $database->select("interests", "*", ["interest_id"=>$_GET["interestid"] ]);
			//var_dump($datas);
foreach($datas as $data)
{
		  	?>
		  	<form class="form-inline" role="form" name="editinterests" action="addinterests.php" method="get">
		  <div class="form-group">
			<label class="col-sm-4 control-label">Interest Name</label>
			<div class="col-sm-8">
			  <input type="text" class="form-control" placeholder="Interest name" name='interestname' value="<?php echo $data["interest_name"]; ?>">
			</div>
		  </div>
		  <div class="form-group">
			<label class="col-sm-4 control-label">Interest Description</label>
			<div class="col-sm-8">
			  <input type="text" class="form-control" placeholder="interest Description" name='interestdesc' value="<?php echo $data["interest_description"]; ?>">
			</div>
		  </div>
		  	  
		  <div class="form-group">
			<div class="col-sm-offset-4 col-sm-8">
			  <button type="submit" class="btn btn-success submit" value='Update'>edit</button>
			</div>
		  </div>
		  <input type="hidden" name="csrf_token" value="<?php echo $loggedInUser->csrf_token; ?>" />
		  <input type="hidden" name="interesteditid" value="<?php echo $data["interest_id"]; ?>" />
		  </form>
		  <?php 
		  	}
				} else {
		  		
				?>
		  <form class="form-inline" role="form" name="addinterests" action="courses.php" method="post">
		  <div class="form-group">
			<label class="col-sm-4 control-label">Interest Name</label>
			<div class="col-sm-8">
			  <input type="text" class="form-control" placeholder="Interest name" name='interestname' value=''>
			</div>
		  </div>
		  <div class="form-group">
			<label class="col-sm-4 control-label">Interest Description</label>
			<div class="col-sm-8">
			  <input type="text" class="form-control" placeholder="interest Description" name='interestdesc'>
			</div>
		  </div>
		  	  
		  <div class="form-group">
			<div class="col-sm-offset-4 col-sm-8">
			  <button type="submit" class="btn btn-success submit" value='Update'>Add</button>
			</div>
		  </div>
		  <input type="hidden" name="csrf_token" value="<?php echo $loggedInUser->csrf_token; ?>" />
		  <input type="hidden" name="user_id" value="0" />
		  </form>
		  <?php 
		  
				}
				
				?>
		  </div>
		  <hr />
		  <div class="col-lg-12">
		  	<table class="table table-bordered col-lg-12">
				<thead>
					<th>
						Interest Name
					</th>
					<th>
						Interest Description
					</th>
					
					<th>
						Action
					</th>
				</thead>
				<tbody>
			<?php
			//include '../databaseconnector.php';
			$datas = $database->select("interests", "*");
			
foreach($datas as $data)
{
	//echo "Personality:" . $data["personality_name"] . "Description:" . $data["pesonality_description"] . "<br/>";
?>

                 <tr>
            
                  	<td> <?php echo  $data["interest_name"] ?> </td>
                  		<td><?php echo  $data["interest_description"] ?></td>
                  			<td><a class="btn btn-success" href="addinterests.php?action=edit&interestid=<?php echo  $data["interest_id"]; ?>" >Edit  </a> &nbsp;&nbsp; <a class="btn btn-danger" href="addinterests.php?action=delete&interestid=<?php echo  $data["interest_id"]; ?>" >Delete  </a></td>
                  
          <?php
          
          }

?>

</tbody>
</table>
		  </div>
		</div>
	  </div>
	</div>
	
	<script>
        $(document).ready(function() {
          // Get id of the logged in user to determine how to render this page.
          var user = loadCurrentUser();
          var user_id = user['user_id'];
          
		  alertWidget('display-alerts');

		  // Set default form field values
		  
		  var request;
		  $("form[name='addinterests']").submit(function(event){
			var url = APIPATH + 'addinterest.php';
			// abort any pending request
			if (request) {
				request.abort();
			}
			var $form = $(this);
			var $inputs = $form.find("input");
			// post to the backend script in ajax mode
			var serializedData = $form.serialize() + '&ajaxMode=true';
			// Disable the inputs for the duration of the ajax request
			$inputs.prop("disabled", true);
		
			// fire off the request
			request = $.ajax({
				url: url,
				type: "post",
				data: serializedData
			})
			.done(function (result, textStatus, jqXHR){
				var resultJSON = processJSONResult(result);
				// Render alerts
				alertWidget('display-alerts');
				
				// Clear password input fields on success
				if (resultJSON['successes'] > 0) {
				  $form.find("input[name='interestname']").val("");
				  $form.find("input[name='interestdesc']").val("");
				}
				location.reload();
			}).fail(function (jqXHR, textStatus, errorThrown){
				// log the error to the console
				console.error(
					"The following error occured: "+
					textStatus, errorThrown
				);
			}).always(function () {
				// reenable the inputs
				$inputs.prop("disabled", false);
			});
		
			// prevent default posting of form
			event.preventDefault();  
		  });

		});
	</script>
  </body>
</html>
