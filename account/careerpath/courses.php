	<?php	
		require_once("../../databaseconnector.php");
		$datas = $database->select("courses",["[><]career_course"=>"course_id"],"*",["career_course.career_id"=>$_GET["id"]]);
			
foreach($datas as $data)
{
	//echo "Personality:" . $data["personality_name"] . "Description:" . $data["pesonality_description"] . "<br/>";
?>

                 <div class="col-lg-12">
            <div class="well well-sm">
              <div class="panel-content">
                <div class="row">
                  
                  <div class="col-lg-3">
                  	
                  	
                  <input type="checkbox" name="course[]" onclick="popunis();" class="coursechoice" value="<?php echo  $data["course_id"] ?>">   <span class="content"><?php echo  $data["course_name"] ?></span> 
                   
                  </div>
                  <div class="col-lg-4">
                  	
                  	
                  <p class="content"><?php echo  $data["course_description"]; ?></p> 
                   
                  </div>
                  
                </div>
              </div>
              
  
             
              </div>
            </div>
          
          <?php
          
          }

?>  