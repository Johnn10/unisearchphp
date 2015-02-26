<?php

// UserCake authentication
require_once("../models/config.php");
require_once("../databaseconnector.php");
// Request method: GET
$ajax = checkRequestMode("get");

if (!securePage(__FILE__)){
    apiReturnError($ajax);
}


setReferralPage(getAbsoluteDocumentPath(__FILE__));

// Admin page
?>
<!DOCTYPE html>
<html lang="en">
  <?php
  	echo renderAccountPageHeader(array("#SITE_ROOT#" => SITE_ROOT, "#SITE_TITLE#" => SITE_TITLE, "#PAGE_TITLE#" => "User Dashboard"));
  ?>

  <body>    
    <div id="wrapper">

      <!-- Sidebar -->
        <?php
            echo renderMenu("dashboard-user");
        ?>

      <div id="page-wrapper">
        <div class="row">
          <div id='display-alerts' class="col-lg-12">

          </div>
        </div>
        
        <div class="row">
          <div class="col-lg-12">
            <ol class="breadcrumb">
              <li class="active"><i class="fa fa-dashboard"></i> Dashboard</li>
            </ol>
            
          </div>
        </div><!-- /.row -->


<?php 
$count = $database->count("personalities");
?>
        <div class="row">
          <div class="col-lg-3">
            <div class="panel panel-info">
              <div class="panel-heading">
                <div class="row">
                  <div class="col-xs-6">
                    <i class="fa fa-binoculars fa-5x"></i>
                  </div>
                  <div class="col-xs-6 text-right">
                    <p class="announcement-heading"><?php echo $count ?></p>
                    <p class="announcement-text">Personality</p>
                  </div>
                </div>
              </div>
              
  
              <a href="#">
                <div class="panel-footer announcement-bottom">
                  <div class="row">
                    <div class="col-xs-6">
                      Personality
                    </div>
                    <div class="col-xs-6 text-right">
                      <i class="fa fa-arrow-circle-right"></i>
                    </div>
                  </div>
                </div>
              </a>
            </div>
          </div>
          
          
                      <?php 
                      
                             //Academics
$count = $database->count("subjects");
?>
          <div class="col-lg-3">
            <div class="panel panel-info">
              <div class="panel-heading">
                <div class="row">
                  <div class="col-xs-6">
                    <i class="fa fa-book fa-5x"></i>
                    
                  </div>
                  <div class="col-xs-6 text-right">
                    <p class="announcement-heading"><?php echo $count ?></p>
                    <p class="announcement-text">Academics</p>
                  </div>
                </div>
              </div>
              <a href="#">
                <div class="panel-footer announcement-bottom panel-success">
                  <div class="row">
                    <div class="col-xs-6">
                      Academics
                    </div>
                    <div class="col-xs-6 text-right">
                      <i class="fa fa-arrow-circle-right"></i>
                    </div>
                  </div>
                </div>
              </a>
            </div>
          </div>
                   <?php 
  
              //interests
$count = $database->count("interests");
?>
          <div class="col-lg-3">
            <div class="panel panel-info">
              <div class="panel-heading">
                <div class="row">
                  <div class="col-xs-6">
                    <i class="fa fa-puzzle-piece fa-5x"></i>
                  </div>
                  <div class="col-xs-6 text-right">
                    <p class="announcement-heading"><?php echo $count ?></p>
                    <p class="announcement-text">Interests</p>
                  </div>
                </div>
              </div>
              <a href="#">
                <div class="panel-footer announcement-bottom">
                  <div class="row">
                    <div class="col-xs-6">
                      Interests
                    </div>
                    <div class="col-xs-6 text-right">
                      <i class="fa fa-arrow-circle-right"></i>
                    </div>
                  </div>
                </div>
              </a>
            </div>
          </div>
          
          <?php 
                   //careers
$count = $database->count("careers");
?>
          <div class="col-lg-3">
            <div class="panel panel-info">
              <div class="panel-heading">
                <div class="row">
                  <div class="col-xs-6">
                    <i class="fa fa-briefcase fa-5x"></i>
                  </div>
                  <div class="col-xs-6 text-right">
                    <p class="announcement-heading"><?php echo $count ?></p>
                    <p class="announcement-text">Careers</p>
                  </div>
                </div>
              </div>
              <a href="#">
                <div class="panel-footer announcement-bottom">
                  <div class="row">
                    <div class="col-xs-6">
                      Careers
                    </div>
                    <div class="col-xs-6 text-right">
                      <i class="fa fa-arrow-circle-right"></i>
                    </div>
                  </div>
                </div>
              </a>
            </div>
          </div>
        </div><!-- /.row -->

       
        <div class="row" id="personality" style="height: 640px !important;"> 
        	
        	<iframe scrolling="no"  width="100%" height="100%" style="border-width: 0px;" src="http://www.16personalities.com/free-personality-test">
			
		</iframe>
        </div>


      </div><!-- /#page-wrapper -->

    </div><!-- /#wrapper -->
    
    <script src="../js/raphael/2.1.0/raphael-min.js"></script>
    <script src="../js/morris/morris-0.4.3.js"></script>
    <script src="../js/morris/chart-data-morris.js"></script>
    <script>
        $(document).ready(function() {          
          alertWidget('display-alerts');
          
          // Initialize the transactions tablesorter
          $('#transactions .table').tablesorter({
              debug: false
          });
          
          $("iframe").load(function(){
    //$('div:first').remove(); 
      $("a")[0].remove(); 
      $("iframe").scrollTo(0,100);
      //alert("freaking loaded!!!");  
  });
        }); 
        
        var myIframe = document.getElementById('personality');
myIframe.onload = function () {
    myIframe.scrollTo(0,200);
}     
    </script>
  </body>
</html>
