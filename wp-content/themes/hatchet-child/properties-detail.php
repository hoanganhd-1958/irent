<?php
/*
  Template Name: PROPERTIES DETAIL
*/
get_header();
// config
$end_point_url = 'http://api2.agentaccount.com:80/';
$target = 'properties/?';
$token = '198739a17a419ab3fd5d5f58548d69993e51b276';

// prepare data
$identity = isset($_GET['id']) ? $_GET['id'] : '';
$page = isset($_GET['page_number']) ? $_GET['page_number'] : '';
$targetSingleDetail = 'properties/' . $identity . '?';
// build url
$paramArray = [
    'token' => $token,
];

$paramArray = array_filter($paramArray); // remove any false or null or empty values from array
$param = http_build_query($paramArray);
$url = $end_point_url . $targetSingleDetail . $param;
// end build url

// curl
$ch = curl_init();
curl_setopt_array($ch, [
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_URL => $url,
]);
$data = json_decode(curl_exec($ch), true);

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
// var_dump($data);
//$image = $data['photos']['1']['versions']['large']['url'];
$image = $data['photos'];
var_dump($image);
?>
    <div id="property-detail">
        <div class="hero">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 bds-image">
                        <div class="container-gallery">
                            <?php if ($image) : ?>
                                <?php foreach ($image as $key => $img) { ?>
                                    <a href="<?php echo $img['versions']['large']['url'];?>" rel="lightbox" title=""><img src="<?php echo $img['versions']['large']['url'];?>" alt="image" class="img-responsive"></a>
                                    <!-- <a href="https://homepages.cae.wisc.edu/~ece533/images/arctichare.png" rel="lightbox" title=""><img class="img-responsive" src="https://homepages.cae.wisc.edu/~ece533/images/arctichare.png" /></a> -->
                                <?php } ?>
                            <?php else:?>
                                <img class="img-responsive" src="<?php echo get_stylesheet_directory_uri() ?>/img/no-image.jpg" />
                            <?php endif;?>
                        </div>

                    </div>
                    <div class="col-sm-12 bds-image">
                        <div class="container-gallery-2">
                            <?php if ($image) : ?>
                                <?php foreach ($image as $key => $img) { ?>
                                    <a href="<?php echo $img['versions']['large']['url'];?>" rel="lightbox" title=""><img src="<?php echo $img['versions']['large']['url'];?>" alt="image" class="img-responsive"></a>
                                    <!-- <a href="https://homepages.cae.wisc.edu/~ece533/images/arctichare.png" rel="lightbox" title=""><img class="img-responsive" src="https://homepages.cae.wisc.edu/~ece533/images/arctichare.png" /></a> -->
                                <?php } ?>
                            <?php else:?>
                                <img class="img-responsive" src="<?php echo get_stylesheet_directory_uri() ?>/img/no-image.jpg" />
                            <?php endif;?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="contact-details">
            <div id="property-contact" class="container">
                <div class="contact-panel">
                    <div class="contact-info">
                        <ul class="detail"></ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-white">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-8 col-lg-9 bds-items">
                        <h1 class="bds-title single-bds-title font-weight-bold"><?php echo $data['headline'] ?></h1>
                        <p class="bds-type">Type: <?php echo $data['property_type'] ?></p>
                        <p class="price">Price: $ <?php echo $data['price'] ?></p>
                        <p class="text-justify font-weight-bold"><?php echo $data['description'] ?></p>
                    </div>
                    <div class="col-12 col-sm-12 col-md-4 col-lg-3 bds-items">
                        <ul class="property-keyfeatures">
                            <li class="property-keyfeature"><i class="ui-feature-icon -bedrooms"></i> <span class="value"><?php echo $data['bedrooms'] ?> Beds</span></li>
                            <li class="property-keyfeature"><i class="ui-feature-icon -bathrooms"></i> <span class="value"><?php echo $data['bathrooms'] ?> Baths</span></li>
                            <?php if ($value['cars']) echo '<li><i class="ui-feature-icon -cars"></i> <span class="value">'. $data['cars'] .' Cars</span></li>' ?>
                            <li class="property-keyfeature"><i class="ui-feature-icon fas fa-building"></i> <span class="value"><?php echo $data['number_of_floors'] ?> Floors</span></li>
                        </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="acf-map" data-zoom="16">
                            <div class="marker" data-lat="<?php echo $data['address']['latitude']?>" data-lng="<?php echo $data['address']['longitude']?>"></div>
                        </div>
                    </div>
                </div>
                <div class="row">
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
            </div>
        </div>
    </div>
    </div>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAvtOpplWFO0YSMYDpzs8JFevdXX9bmvZw"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.css" integrity="sha512-wR4oNhLBHf7smjy0K4oqzdWumd+r5/+6QO/vDda76MW5iug4PT7v86FoEkySIJft3XA0Ae6axhIvHrqwm793Nw==" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css" integrity="sha512-17EgCFERpgZKcm0j0fEq1YCJuyAWdz9KUtv1EjVuaOz8pDnh/0nZxmU6BBXwaaxqoi9PQXnRWqlcDB027hgv9A==" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js" integrity="sha512-XtmMtDEcNz2j7ekrtHvOVR4iwwaD6o/FUJe6+Zq+HgcCsk3kj4uSQQR8weQ2QVj1o0Pk6PwYLohm206ZzNfubg==" crossorigin="anonymous"></script>
    <script type="text/javascript">
        (function( $ ) {
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
            });
        })(jQuery);
        jQuery(document).ready(function($){
            $.ajax({
                type : 'get',
                dataType : 'text',
                url : '<?php echo admin_url( "admin-ajax.php" ); ?>',
                data: {
                    'action' : 'ajax_load_more_2',
                    'id' : <?php echo $data['agent_id_1']; ?>
                },
                success : function (result){
                    $('ul.detail').append(result);
                }
            });
            $('.container-gallery').slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                arrows: false,
                fade: true,
                asNavFor: '.container-gallery-2'
            });
            $('.container-gallery-2').slick({
                slidesToShow: 4,
                slidesToScroll: 1,
                arrows: false,
                asNavFor: '.container-gallery',
                dots: false,
                centerMode: false,
                focusOnSelect: true
            });
        });
    </script>
<?php get_footer();?>