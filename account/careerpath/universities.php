	<?php	
		require_once("../../databaseconnector.php");
		
	//echo "Personality:" . $data["personality_name"] . "Description:" . $data["pesonality_description"] . "<br/>";
?>

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
			$datas = $database->select("universities", ["[><]university_course"=>"uni_id"],"*",["university_course.course_id"=>$_GET["id"]]);
			
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