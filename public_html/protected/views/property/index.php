<?php
/* @var $this PropertyController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Properties',
);

$this->menu=array(
	array('label'=>'Create Property', 'url'=>array('create')),
	array('label'=>'Manage Property', 'url'=>array('admin')),
);
?>
<div class="container">
        <div class="row">
            <div class="col-md-6">
                <form method="get" action="<?php echo Yii::app()->request->baseUrl; ?>/property">
                <div class="input-group">
                    
                    <?php
                        $this->widget('zii.widgets.jui.CJuiAutoComplete', array(
                        'name'=>'search',
                        'htmlOptions'=>array('class'=>'form-control','placeholder'=>'Search your place'),
                        'source'=>Load::Maps(),
                    ));
                    ?>

                    <span class="input-group-btn">
                    <button class="btn btn-default" type="button">Go!</button>
                    </span>
                </div>
                </form>
            </div>
        </div>
    </div>

    <div class="container">

    <?php if($Marker==NULL): ?>

    
        <h4>ไม่เจอที่ค้นหา</h4>
    

    <?php else: ?>

    <div id="map_canvas" class="mapping" style="height:600px"></div>

    <?php endif; ?>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>


    <script type="text/javascript">jQuery(function($) {
    // Asynchronously Load the map API
    var script = document.createElement('script');
    script.src = "http://maps.googleapis.com/maps/api/js?sensor=false&callback=initialize";
    document.body.appendChild(script);
});

function initialize() {
    var map;
    var bounds = new google.maps.LatLngBounds();
    var mapOptions = {
        mapTypeId: 'roadmap'
    };

    // Display a map on the page
    map = new google.maps.Map(document.getElementById("map_canvas"), mapOptions);
    map.setTilt(45);

    // Multiple Markers
    var markers = [<?php
        foreach ( $Marker as $data ) {
            echo '
            ["' .$data['title']. ' ",'.$data['lat'].','.$data['lng'].'],';
        }
        ?>

    ];

    // Info Window Content
    var infoWindowContent = [
        <?php
        foreach ( $Marker as $data ) {
            echo '
[\'<div class="info_content"><img class="pull-left" src="'.Load::Picture( $data['picture'] ).'" />\' +';
            echo '\'<h4>'.$data['title'].'</h4>\' +';
            echo '\'<p>'.$data['description'].'</p>\' + \'</div>\'],';
        }
        ?>
    ];

    // Display multiple markers on a map
    var infoWindow = new google.maps.InfoWindow(), marker, i;

    // Loop through our array of markers & place each one on the map
    for( i = 0; i < markers.length; i++ ) {
        var position = new google.maps.LatLng(markers[i][1], markers[i][2]);
        bounds.extend(position);
        marker = new google.maps.Marker({
            position: position,
            map: map,
            title: markers[i][0]
        });

        // Allow each marker to have an info window
        google.maps.event.addListener(marker, 'click', (function(marker, i) {
            return function() {
                infoWindow.setContent(infoWindowContent[i][0]);
                infoWindow.open(map, marker);
            }
        })(marker, i));

        // Automatically center the map fitting all markers on the screen
        map.fitBounds(bounds);
    }

    // Override our map zoom level once our fitBounds function runs (Make sure it only runs once)
    var boundsListener = google.maps.event.addListener((map), 'bounds_changed', function(event) {
        this.setZoom(8);
        google.maps.event.removeListener(boundsListener);
    });

}</script>

<div class="container">
<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'template'=>"{pager}\n{items}\n{pager}",
	'pagerCssClass'=>'text-center col-sm-12',
	'pager' => array('header'=>'','htmlOptions'=>array('class'=>'pagination',)),
	'itemView'=>'_view',
)); ?>

</div>