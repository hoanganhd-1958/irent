<style type="text/css">
    .acf-map {
        width: 100%;
        height: 400px;
        border: #ccc solid 1px;
        margin: 20px 0;
    }

    // Fixes potential theme css conflict.
       .acf-map img {
           max-width: inherit !important;
       }
</style>
<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri() ?>/gallery.css">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha256-4+XzXVhsDmqanXGHaHvgh1gMQKX40OUvDEBTu8JcmNs=" crossorigin="anonymous"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCxRSTwfrdz1WYqa15Du6NgUFOyQ8DMwtk"></script>
<script src="<?php echo get_stylesheet_directory_uri() ?>/gallery.js"></script>
<!--<script src="https://maps.googleapis.com/maps/api/js?key=&callback=initMap" async defer></script>-->


<script type="text/javascript">
    (function( $ ) {

        /**
         * initMap
         *
         * Renders a Google Map onto the selected jQuery element
         *
         * @date    22/10/19
         * @since   5.8.6
         *
         * @param   jQuery $el The jQuery element.
         * @return  object The map instance.
         */
        function initMap( $el ) {

            // Find marker elements within map.
            var $markers = $el.find('.marker');

            // Create gerenic map.
            var mapArgs = {
                zoom        : $el.data('zoom') || 16,
                mapTypeId   : google.maps.MapTypeId.ROADMAP
            };
            var map = new google.maps.Map( $el[0], mapArgs );

            // Add markers.
            map.markers = [];
            $markers.each(function(){
                initMarker( $(this), map );
            });

            // Center map based on markers.
            centerMap( map );

            // Return map instance.
            return map;
        }

        /**
         * initMarker
         *
         * Creates a marker for the given jQuery element and map.
         *
         * @date    22/10/19
         * @since   5.8.6
         *
         * @param   jQuery $el The jQuery element.
         * @param   object The map instance.
         * @return  object The marker instance.
         */
        function initMarker( $marker, map ) {

            // Get position from marker.
            var lat = $marker.data('lat');
            var lng = $marker.data('lng');
            var latLng = {
                lat: parseFloat( lat ),
                lng: parseFloat( lng )
            };

            // Create marker instance.
            var marker = new google.maps.Marker({
                position : latLng,
                map: map
            });

            // Append to reference for later use.
            map.markers.push( marker );

            // If marker contains HTML, add it to an infoWindow.
            if( $marker.html() ){

                // Create info window.
                var infowindow = new google.maps.InfoWindow({
                    content: $marker.html()
                });

                // Show info window when marker is clicked.
                google.maps.event.addListener(marker, 'click', function() {
                    infowindow.open( map, marker );
                });
            }
        }

        /**
         * centerMap
         *
         * Centers the map showing all markers in view.
         *
         * @date    22/10/19
         * @since   5.8.6
         *
         * @param   object The map instance.
         * @return  void
         */
        function centerMap( map ) {

            // Create map boundaries from all map markers.
            var bounds = new google.maps.LatLngBounds();
            map.markers.forEach(function( marker ){
                bounds.extend({
                    lat: marker.position.lat(),
                    lng: marker.position.lng()
                });
            });

            // Case: Single marker.
            if( map.markers.length == 1 ){
                map.setCenter( bounds.getCenter() );

                // Case: Multiple markers.
            } else{
                map.fitBounds( bounds );
            }
        }

// Render maps on page load.
        $(document).ready(function(){
            $('.acf-map').each(function(){
                var map = initMap( $(this) );
            });
            $('.container-gallery').gallery({
                height: 650,
                items: 6,
                480: {
                    items: 2,
                    height: 400,
                    thmbHeight: 100
                },
                768: {

                    items: 3,
                    height: 500,
                    thmbHeight: 120
                },
                600: {

                    items: 4
                },
                992 : {

                    items: 5,
                    height: 350
                }
            });
            $('.container-gallery').gallery({
                customControls: {
                    prevButton: prevContent,
                    nextButton: nextContent
                }
            });
        });

    })(jQuery);
</script>
<?php
/*
  Template Name: PROPERTIES DETAIL
*/
get_header();
// config
$end_point_url = 'http://api2.agentaccount.com:80/';
$target = 'properties/?';
$token = '827f01934ab7e1f007eda5b79141aa28f6623d61';

// prepare data
$identity = isset($_GET['id']) ? $_GET['id'] : '';
$page = isset($_GET['page_number']) ? $_GET['page_number'] : '';

// build url
$paramArray = [
    'id' => $identity,
    'token' => $token,
];

$paramArray = array_filter($paramArray); // remove any false or null or empty values from array
$param = http_build_query($paramArray);
$url = $end_point_url . $target . $param;
// end build url

// curl
$ch = curl_init();
curl_setopt_array($ch, [
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_URL => $url,
]);
$data = json_decode(curl_exec($ch), true);
$data = $data['results']['0'];
curl_close($ch);

$paramArrayRelate = [
    'page' => $page,
    'token' => $token,
];

$paramArrayRelate = array_filter($paramArrayRelate); // remove any false or null or empty values from array
$paramRelate = http_build_query($paramArrayRelate);
$urlRelate = $end_point_url . $target . $paramRelate;

$chRelate = curl_init();
curl_setopt_array($chRelate, [
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_URL => $urlRelate,
]);
$dataRelate = json_decode(curl_exec($chRelate), true);
$dataRelate = $dataRelate['results'];
$randIndex = array_rand($dataRelate, 4);
curl_close($chRelate);
// end curl
$image = $data['photos']['1']['versions']['large']['url'];
?>

    <div class="container" style="margin-top: 20px;">
        <div class="col-sm-12 col-md-7 bds-image container-gallery">
            <?php if ($image) : ?>
                <img src="<?php echo $image;?>" alt="image" class="img-responsive">
            <?php else:?>
                <img class="img-responsive" src="<?php echo get_stylesheet_directory_uri() ?>/img/no-image.jpg" />
            <?php endif;?>
        </div>

        <div class="col-sm-12 bds-items" style="margin-top: 10px;">
            <h1 class="bds-title single-bds-title font-weight-bold"><?php echo $data['headline'] ?></h1>
            <p class="bds-type">Type: <?php echo $data['property_type'] ?></p>
            <p class="price">Price: $ <?php echo $data['price'] ?></p>
            <p class="text-justify font-weight-bold"><?php echo $data['description'] ?></p>
            <h6 style="margin-bottom:0;"><strong>Amentities</strong></h6>
            <ul>
                <li><i class="general-features__icon general-features__beds"></i> Bed room: <?php echo $data['bedrooms'] ?></li>
                <li><i class="general-features__icon general-features__baths"></i> Bath room: <?php echo $data['bathrooms'] ?></li>
                <?php if ($value['cars']) echo '<li><i class="general-features__icon general-features__cars"></i> '. $data['cars'] .'</li>' ?>
                <li><i class="fas fa-building"></i> Floors: <?php echo $data['number_of_floors'] ?></li>
            </ul>
            <p class="bds-type">Staff's name: John Doe</p>
            <p class="bds-type">Phone number: 1900.1991</p>
        </div>

        <h6 style="margin-bottom:0;"><strong>Map</strong></h6>
        <div class="col-sm-12 acf-map">
            <div class="maker" data-lat="<?php echo $data['address']['latitude']?>" data-lng="<?php echo $data['address']['longitude']?>"></div>
        </div>

        <div class="col-sm-12">
            <h5>Maybe you are interested</h5>
            <div class="row">
                <?php for ($i = 0; $i < count($randIndex); $i++) {$img = $dataRelate[$randIndex[$i]]['photos']['1']['versions']['large']['url'];?>
                    <div class="col-sm-6 col-md-3 bds-items">
                        <div class="item">
                            <?php
                            if ($img) {
                                echo '<a href="/property-detail/?id=' . $dataRelate[$randIndex[$i]]['id'] . '&page_number=1"><img class="img-responsive" src="' . $img . '" /></a>';
                            } else {
                                echo '<a href="/property-detail/?id=' . $dataRelate[$randIndex[$i]]['id'] . '&page_number=1"><img class="img-responsive" src="' . get_stylesheet_directory_uri() . '/img/no-image.jpg" /></a>';
                            }
                            ?>
                            <div class="content">
                                <h2 class="font-weight-bold bds-title">
                                    <a href="/property-detail/?id=<?php echo $dataRelate[$randIndex[$i]]['id'] ?>&page_number=1">
                                        <?php echo $dataRelate[$randIndex[$i]]['headline'] ?>
                                    </a>
                                </h2>
                                <p class="bds-type">Type: <?php echo $dataRelate[$randIndex[$i]]['property_type'] ?></p>
                                <ins class="price">Price: $ <?php echo $dataRelate[$randIndex[$i]]['price'] ?></ins>
                                <ul>
                                    <li><i class="general-features__icon general-features__beds"></i> <?php echo $dataRelate[$randIndex[$i]]['bedrooms'] ?></li>
                                    <li><i class="general-features__icon general-features__baths"></i> <?php echo $dataRelate[$randIndex[$i]]['bathrooms'] ?></li>
                                    <?php if ($value['cars']) echo '<li><i class="general-features__icon general-features__cars"></i> '. $dataRelate[$randIndex[$i]]['cars'] .'</li>'?>
                                    <li><i class="fas fa-building"></i> <?php echo $dataRelate[$randIndex[$i]]['number_of_floors'] ?></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                <?php }?>
            </div>
        </div>
    </div>

<?php get_footer();?>