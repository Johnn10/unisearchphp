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
$career_id=$_GET["careerid"];

if(isset($_GET["interest"]))
foreach($_GET["interest"] as $interest_id)
$last_user_id = $database->insert("interest_career", [
	"interest_id" => $interest_id,
	"career_id" =>  $career_id
]);


if(isset($_GET["personality"]))
foreach($_GET["personality"] as $personality_id)
$last_user_id = $database->insert("personality_career", [
	"personality_id" => $personality_id,
	"career_id" =>  $career_id
]);


if(isset($_GET["subject"]))
foreach($_GET["subject"] as $subject_id)
$last_user_id = $database->insert("subject_career", [
	"subject_id" => $subject_id,
	"grade_id" =>  9,
	"career_id" => $career_id
	
]);


if(isset($_GET["course"]))
foreach($_GET["course"] as $course_id)
$last_user_id = $database->insert("career_course", [
	"course_id" => $course_id,
	"career_id" =>  $career_id
	//"offering_id" => $offering_id
	
	]);
if(isset($_GET["course"])&&isset($_GET["subject"])&&isset($_GET["personality"]))
	header("Location: addcareers.php");

?>

<!DOCTYPE html>
<html lang="en">
  <?php
echo renderAccountPageHeader(array("#SITE_ROOT#" => SITE_ROOT, "#SITE_TITLE#" => SITE_TITLE, "#PAGE_TITLE#" => "Account Settings"));
  ?>

  <body>
  	<script src="../js/wizard.js" type="text/javascript"></script>
  	<script src="../js/jquery.bootstrap.wizard.js" type="text/javascript"></script>
    <div id="wrapper">

      <!-- Sidebar -->
        <?php
		echo renderMenu("settings");
        ?>  

      <div id="page-wrapper" style="height: 940px;">
	  	<div class="row">
	  		<ol class="breadcrumb">
              <li class="active"><i class="fa fa-check-square-o"></i> Interest-Career match</li>
            </ol>
          <div id='display-alerts' class="col-lg-12">

          </div>
          
        </div>
        
		<div>
			 <!--      Wizard container        -->   
            <div class="wizard-container" style="padding-top: 0px !important; "> 
                <form action="match.php" method="get">
                <div class="card wizard-card ct-wizard-green" id="wizard">
                
                <!--        You can switch "ct-wizard-orange"  with one of the next bright colors: "ct-wizard-blue", "ct-wizard-green", "ct-wizard-orange", "ct-wizard-red"             -->
                
                    	<div class="wizard-header">
                        	<h3>
                        	   <b>Match</b> career <br>
                        	   <small>This information will let us know more about you.</small>
                        	</h3>
                    	</div>
                    	<ul>
                            <li><a href="#course" data-toggle="tab">Course</a></li>
                            <li><a href="#subject" data-toggle="tab">Subject</a></li>
                            <li><a href="#personality" data-toggle="tab">Personality</a></li>
                            <li><a href="#interest" data-toggle="tab">Interest</a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane" id="course">
                                
                              	<?php
			$datas = $database->select("courses", "*");
			
foreach($datas as $data)
{
	//echo "Personality:" . $data["personality_name"] . "Description:" . $data["pesonality_description"] . "<br/>";
?>

                 <div class="col-lg-3">
            <div class="panel panel-info">
              <div class="panel-heading">
                <div class="row">
                  
                  <div class="col-xs-9">
                  	
                  	
                  <input type="checkbox" name="course[]" value="<?php echo  $data["course_id"] ?>">   <span class="content"><?php echo  $data["course_name"] ?></span> 
                   
                  </div>
                </div>
              </div>
              
   <div class="panel-footer announcement-bottom" style="min-height: 40px !important;">
                  <div class="row">
                    <div class="col-xs-12">
                     <?php echo  $data["course_description"] ?> 
                    </div>
                    
                  </div>
                </div>
             
              </div>
            </div>
          
          <?php
          
          }

?>  
                                
                            </div>
                            
                            <div class="tab-pane" id="subject">
                            	
                            	<?php
			$datas = $database->select("subjects", "*");
			
foreach($datas as $data)
{
	//echo "Personality:" . $data["personality_name"] . "Description:" . $data["pesonality_description"] . "<br/>";
?>

                 <div class="col-lg-3">
            <div class="panel panel-info">
              <div class="panel-heading">
                <div class="row">
                  
                  <div class="col-xs-9">
                  	
                  	
                  <input type="checkbox" name="subject[]" value="<?php echo  $data["subject_id"] ?>">    <span class="content"><?php echo  $data["subject_name"] ?></span> 
                   
                  </div>
                </div>
              </div>
              
  
             
              </div>
            </div>
          
          <?php
          
          }

?>            </div>
                            
                            
                            <div class="tab-pane" id="personality">
                            	
                            	<?php
			$datas = $database->select("personalities", "*");
			
foreach($datas as $data)
{
	//echo "Personality:" . $data["personality_name"] . "Description:" . $data["pesonality_description"] . "<br/>";
?>

                 <div class="col-lg-3">
            <div class="panel panel-info">
              <div class="panel-heading">
                <div class="row">
                  
                  <div class="col-xs-12">
                  	
                  	
                  <input type="checkbox" name="personality[]" value="<?php echo  $data["personality_id"] ?>">   <span class="content"><?php echo  $data["personality_name"] ?></span> 
                   
                  </div>
                </div>
              </div>
              
  
              <a href="#">
                <div class="panel-footer announcement-bottom">
                  <div class="row">
                    <div class="col-xs-12">
                     <?php echo  $data["pesonality_description"] ?> 
                    </div>
                    
                  </div>
                </div>
              </a>
              </div>
            </div>
          
          <?php
          
          }

?>
                                
                            </div>
                            
                            
                            
                            <div class="tab-pane" id="interest">
                                
                                <?php
			$datas = $database->select("interests", "*");
			
foreach($datas as $data)
{
	//echo "Personality:" . $data["personality_name"] . "Description:" . $data["pesonality_description"] . "<br/>";
?>

                 <div class="col-lg-3">
            <div class="panel panel-info">
              <div class="panel-heading">
                <div class="row">
                  
                  <div class="col-xs-12">
                  	
                  	
                  <input type="checkbox" name="interest[]" value="<?php echo  $data["interest_id"] ?>">    <span class="content"><?php echo  $data["interest_name"] ?></span> 
                   
                  </div>
                </div>
              </div>
              
  
             
              </div>
            </div>
          
          <?php

		}
	?>
                                
                            </div>
                        </div>
                        <div class="wizard-footer">
                        	<input type="hidden" name="careerid" value="<?php echo $_GET['careerid']; ?>"/>
                            	<div class="pull-right">
                                    <input type='button' class='btn btn-next btn-fill btn-warning btn-wd btn-sm' name='next' value='Next' />
                                    <input type='submit' class='btn btn-finish btn-fill btn-warning btn-wd btn-sm' name='finish' value='Finish' />
        
                                </div>
                                <div class="pull-left">
                                    <input type='button' class='btn btn-previous btn-fill btn-default btn-wd btn-sm' name='previous' value='Previous' />
                                </div>
                                <div class="clearfix"></div>
                        </div>	
                </div>
                </form>
            </div> <!-- wizard container -->
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
			$("form[name='updateAccount']").submit(function(event) {
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
					url : url,
					type : "post",
					data : serializedData
				}).done(function(result, textStatus, jqXHR) {
					var resultJSON = processJSONResult(result);
					// Render alerts
					alertWidget('display-alerts');

					// Clear password input fields on success
					if (resultJSON['successes'] > 0) {
						$form.find("input[name='password']").val("");
						$form.find("input[name='passwordc']").val("");
						$form.find("input[name='passwordcheck']").val("");
					}
				}).fail(function(jqXHR, textStatus, errorThrown) {
					// log the error to the console
					console.error("The following error occured: " + textStatus, errorThrown);
				}).always(function() {
					// reenable the inputs
					$inputs.prop("disabled", false);
				});

				// prevent default posting of form
				event.preventDefault();
			});
			$('#myWizard').easyWizard();
		});
	</script>
	
  </body>
</html>
