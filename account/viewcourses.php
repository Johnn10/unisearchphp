<?php

require_once("../models/config.php");
require_once("../databaseconnector.php");

// Request method: GET
$ajax = checkRequestMode("get");

if (!securePage(__FILE__)){
    apiReturnError($ajax);
}

setReferralPage(getAbsoluteDocumentPath(__FILE__));

$user_id = $loggedInUser->user_id;
if(isset($_GET["interest"]))
foreach($_GET["interest"] as $interest_id)
$last_user_id = $database->insert("user_interests", [
	"reg_no" => $user_id,
	"interest_id" =>  $interest_id
]);

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

      <div id="page-wrapper" style="height: 940px;">
	  	<div class="row">
	  		<ol class="breadcrumb">
              <li class="active"><i class="fa fa-puzzle-piece"></i> Universities</li>
            </ol>
          <div id='display-alerts' class="col-lg-12">

          </div>
          
        </div>
        
		<div>
			<div class="row">
				
				<table class="table table-bordered col-lg-12">
				<thead>
					<th>
						University Name
					</th>
					<th>
						University Website
					</th>
					<th>
						University address
					</th>
					<th>
						Action
					</th>
				</thead>
				<tbody>
			<?php
			$datas = $database->select("universities", "*");
			
foreach($datas as $data)
{
	//echo "Personality:" . $data["personality_name"] . "Description:" . $data["pesonality_description"] . "<br/>";
?>

                 <tr>
            
                  	<td> <?php echo  $data["uni_name"] ?> </td>
                  		<td><?php echo  $data["uni_website"] ?></td>
                  			<td><?php echo  $data["uni_address"] ?></td>
                  			<td><a class="btn btn-success" href="viewuni.php?name=<?php echo  $data["uni_name"]."&website=".urlencode($data["uni_website"])."&address=".urlencode($data["uni_address"])."&id=".$data["uni_id"]; ?>" >view </a></td>
                  
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
		  $('form[name="updateAccount"] input[name="email"]').val(user['email']);

		  var request;
		  $("form[name='updateAccount']").submit(function(event){
			var url = APIPATH + 'update_user.php';
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
				  $form.find("input[name='password']").val("");
				  $form.find("input[name='passwordc']").val("");
				  $form.find("input[name='passwordcheck']").val("");
				}
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
