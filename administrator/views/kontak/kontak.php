<div class='container--content--page'>

        		<div class='content'>

        			<div class='content--main'>

        				<div class='main--section'>
							<div class="main--section__map">
                                <div id="map-canvas"></div>
                            </div>
							
							<?php 
							
							$detail = $home->getPengaturan();;
							
							
							
							echo "
        					<div class='main--section__title'>

        						<h1>
									".$detail['nama']."
                                </h1>
								";
							
							echo "
        					</div>
								
                            <div class='main--section__share'>
                               <div class='addthis_sharing_toolbox'></div>
							  
                            </div>
								
							<div class='main--section__content'>
								
        						<div class='main--content--text'>
									<br/>
									<b>Alamat : </b><br/><br/>
                                  ".
								  
									$detail['alamat']
								  
								  ."
								  <br/>
								  <br/>
									<b>Telp : </b><br/><br/>
                                  ".
								  
									$detail['telp']
								  
								  ."
								  
                                </div>

        					</div>
							
							
							";
							
							?>
							


        				</div>

        			</div>



				<?php
				include"component/sidebar.php";
				
				?>

				</div>

                <div class='clear'></div>

        	</div>
			

<script src='<?php echo ROOT;?>scripts/min/jquery-min.js' type='text/javascript'></script>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
<script type="text/javascript">

 jQuery(document).ready(function($){
          function initialize() {
      var myLatlng = new google.maps.LatLng(<?php echo $detail['lat']; ?>,<?php echo $detail['lon'];?>);
      var mapOptions = {
        zoom: 16,
         center:new google.maps.LatLng(<?php echo $detail['lat']; ?>,<?php echo $detail['lon'];?>),
        scrollwheel: false,
        navigationControl: false,
        mapTypeControl: false,
        scaleControl: false,
      }

      var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);

      var contentString = '<?php echo '<h3>'.$detail['judul'].'</h3>';?>';

      var infowindow = new google.maps.InfoWindow({
          content: contentString,
          minWidth: 300,
      });


      var marker = new google.maps.Marker({
          position: myLatlng,
          map: map,
          title: 'PT ATMOS PERFORMA'
      });

      infowindow.open(map,marker);
      google.maps.event.addListener(marker, 'click', function() {
        infowindow.open(map,marker);
      });

    }
    google.maps.event.addDomListener(window, 'load', initialize);  
			
			
      });
	 

   
</script>
