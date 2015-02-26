<?php

require_once("../models/config.php");
require_once("../databaseconnector.php");

// Request method: GET
$ajax = checkRequestMode("get");

if (!securePage(__FILE__)){
    apiReturnError($ajax);
}

setReferralPage(getAbsoluteDocumentPath(__FILE__));

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
              <li class="active"><i class="fa fa-check-square-o"></i> Career-path</li>
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
                        	   <b>Career</b> path <br>
                        	   <small>This information is our recommendation.</small>
                        	</h3>
                    	</div>
                    	<ul>
                            <li><a href="#career" data-toggle="tab">Career</a></li>
                            <li><a href="#subject" data-toggle="tab">Course</a></li>
                            <li><a href="#personality" data-toggle="tab">University</a></li>
                           
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane" id="career">
                                
                              	<?php
                              	$userid=$loggedInUser->user_id;
								$grabem="SELECT careers.career_id, careers.career_name, careers.career_description, count(careers.career_id) FROM careers INNER JOIN user_interests ON user_interests.reg_no = '$userid' INNER JOIN user_personality ON user_personality.reg_no = '$userid' INNER JOIN interest_career ON interest_career.interest_id = user_interests.interest_id INNER JOIN personality_career ON personality_career.career_id = interest_career.career_id AND personality_career.personality_id = user_personality.personality_id WHERE careers.career_id = user_personality.personality_id GROUP BY careers.career_id";
			echo $grabem;
			$datas = $database->query($grabem)->fetchAll();;
			
foreach($datas as $data)
{
	//echo "Personality:" . $data["personality_name"] . "Description:" . $data["pesonality_description"] . "<br/>";
?>

                 <div class="col-lg-3">
            <div class="panel panel-info">
              <div class="panel-heading">
                <div class="row">
                  
                  <div class="col-xs-9">
                  	
                  	
                  <input type="checkbox" name="career[]" value="<?php echo  $data["career_id"] ?>">   <span class="content"><?php echo  $data["career_name"] ?></span> 
                   
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
