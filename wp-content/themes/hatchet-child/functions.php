<?php
/**
 *
 * [Parent Theme] child theme functions and definitions
 *
 * @package [Parent Theme]
 * @author  Themezaa <info@themezaa.com>
 *
 */

if ( ! function_exists( 'pofo_child_style' ) ) :
    function pofo_child_style() {
        wp_enqueue_style( 'pofo-parent-style', get_template_directory_uri(). '/style.css' );
    }
endif;
add_action( 'wp_enqueue_scripts', 'pofo_child_style', 11 );


function my_custom_mime_types( $mimes )
{
    $a = [
            1,
        2,
    ];
// New allowed mime types.
    $mimes['svg'] = 'image/svg+xml';
    $mimes['svgz'] = 'image/svg+xml';
    $mimes['doc'] = 'application/msword';
    $mimes['ogv'] = 'video/ogg';

// Optional. Remove a mime type.
    unset( $mimes['exe'] );

    return $mimes;
}
add_filter( 'upload_mimes', 'my_custom_mime_types' );



if( !function_exists('search_api') ) {
    function search_api($atts, $content = null) {
        ob_start();
        ?>
        <!--Plugin CSS file with desired skin-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ion-rangeslider/2.3.1/css/ion.rangeSlider.min.css"/>
        <!--Plugin JavaScript file-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/ion-rangeslider/2.3.1/js/ion.rangeSlider.min.js"></script>
        <script>
            jQuery(document).ready(function($){
                $("#price-range").ionRangeSlider({
                    min: 100000,
                    max: 10000000,
                    from: 100000,
                    step: 10000
                });
            })
        </script>
        <div class="container">
            <form method="get" class="api-search">
                <div class="row">
                    <div class="col-sm-6 col-md-3">
                        <div class="form-group">
                            <input type="text" id="identity" name="identity" class="form-control"
                                   value="<?php echo (isset($_GET['identity']) && $_GET['identity'] != null) ? $_GET['identity'] : '' ?>" placeholder="ID">
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="form-group">
<!--                            <input type="text" id="type" name="type" class="form-control"-->
<!--                                   value="--><?php //echo (isset($_GET['type']) && $_GET['type'] != null) ? $_GET['type'] : '' ?><!--" placeholder="Type">-->
                            <select class="form-control" id="type" name="type">
                                <option value="">Please choose property type</option>
                                <option value="ResidentialSale" <?php echo isset($_GET['type']) && $_GET['type'] == 'ResidentialSale' ? 'selected' : '' ?>>Residential Sale</option>
                                <option value="ResidentialLease" <?php echo isset($_GET['type']) && $_GET['type'] == 'ResidentialLease' ? 'selected' : '' ?>>Residential Lease</option>
                                <option value="HolidayLease" <?php echo isset($_GET['type']) && $_GET['type'] == 'HolidayLease' ? 'selected' : '' ?>>Holiday Lease</option>
                                <option value="NewDevelopment" <?php echo isset($_GET['type']) && $_GET['type'] == 'NewDevelopment' ? 'selected' : '' ?>>New Development</option>
                                <option value="Commercial" <?php echo isset($_GET['type']) && $_GET['type'] == 'Commercial' ? 'selected' : '' ?>>Commercial</option>
                                <option value="BusinessSale" <?php echo isset($_GET['type']) && $_GET['type'] == 'BusinessSale' ? 'selected' : '' ?>>Business Sale</option>
                                <option value="ProjectSale" <?php echo isset($_GET['type']) && $_GET['type'] == 'ProjectSale' ? 'selected' : '' ?>>Project Sale</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="form-group">
<!--                            <input type="text" id="property_type" name="property_type" class="form-control"-->
<!--                                   value="--><?php //echo (isset($_GET['property_type']) && $_GET['property_type'] != null) ? $_GET['property_type'] : '' ?><!--" placeholder="Property type">-->
                            <select class="form-control" id="property_type" name="property_type">
                                <option value="">Please choose type</option>
                                <option value="House" <?php echo isset($_GET['property_type']) && $_GET['property_type'] == 'House' ? 'selected' : '' ?>>House</option>
                                <option value="Studio" <?php echo isset($_GET['property_type']) && $_GET['property_type'] == 'Studio' ? 'selected' : '' ?>>Studio</option>
                                <option value="Apartment" <?php echo isset($_GET['property_type']) && $_GET['property_type'] == 'Apartment' ? 'selected' : '' ?>>Apartment</option>
                                <option value="Development" <?php echo isset($_GET['property_type']) && $_GET['property_type'] == 'Development' ? 'selected' : '' ?>>Development</option>
                                <option value="Townhouse" <?php echo isset($_GET['property_type']) && $_GET['property_type'] == 'Townhouse' ? 'selected' : '' ?>>Townhouse</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3 text-center">
                        <button type="submit" class="btn"><i class="fas fa-search" aria-hidden="true"></i> Search</button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-9 col-md-9">
                        <div class="form-group">
                            <input type="price" id="price-range" name="price" class="form-control"
                                   value="<?php echo (isset($_GET['price']) && $_GET['price'] != null) ? $_GET['price'] : '' ?>" placeholder="Price">
                        </div>
                    </div>
                    <div class="col-sm-3 col-md-3">
                        <button type="button" class="btn btn-primary" data-toggle="collapse" data-target="#advance-options"><i class="fas fa-cog"></i> Advance Search</button>
                    </div>
                </div>
                <div class="row collapse" id="advance-options">
                    <div class="col-sm-6 col-md-3">
                        <div class="form-group">
                            <input type="text" id="status" name="status" class="form-control"
                                   value="<?php echo (isset($_GET['status']) && $_GET['status'] != null) ? $_GET['status'] : '' ?>" placeholder="Status">
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="form-group">
<!--                            <input type="text" id="bedrooms" name="bedrooms" class="form-control"-->
<!--                                   value="--><?php //echo (isset($_GET['bedrooms']) && $_GET['bedrooms'] != null) ? $_GET['bedrooms'] : '' ?><!--" placeholder="Bedrooms">-->
                            <select class="form-control" id="bedrooms" name="bedrooms">
                                <option value="">Please choose number of bedrooms</option>
                                <?php for ($i = 0; $i < 5; $i++) {?>
                                    <option value="<?php echo $i+1;?>" <?php echo isset($_GET['bedrooms']) && $_GET['bedrooms'] == $i+1 ? 'selected' : '' ?>><?php echo $i+1;?></option>
                                <?php }?>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="form-group">
<!--                            <input type="text" id="number_of_floors" name="number_of_floors" class="form-control"-->
<!--                                   value="--><?php //echo (isset($_GET['number_of_floors']) && $_GET['number_of_floors'] != null) ? $_GET['number_of_floors'] : '' ?><!--" placeholder="Number of floors">-->
                            <select class="form-control" id="floors" name="number_of_floors">
                                <option value="">Please choose number of floors</option>
                                <?php for ($i = 0; $i < 5; $i++) {?>
                                    <option value="<?php echo $i+1;?>" <?php echo isset($_GET['number_of_floors']) && $_GET['number_of_floors'] == $i+1 ? 'selected' : '' ?>><?php echo $i+1;?></option>
                                <?php }?>
                            </select>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <?php
        $result = ob_get_contents();
        ob_end_clean();
        return $result;
    }
    add_shortcode('search_api_shortcode', 'search_api');
}

if( !function_exists('list_properties') ) {
    function list_properties($atts, $content = null) {
        ob_start();
        // config
        $end_point_url = 'http://api2.agentaccount.com:80/';
        $target = 'properties/?';
        $token = '827f01934ab7e1f007eda5b79141aa28f6623d61';

        // prepare data
        $identity = isset($_GET['identity']) ? $_GET['identity'] : '';
        $office_id = isset($_GET['office_id']) ? $_GET['office_id'] : '';
        $xml_id = isset($_GET['xml_id']) ? $_GET['xml_id'] : '';
        $status = isset($_GET['status']) ? $_GET['status'] : '';
        $type = isset($_GET['type']) ? $_GET['type'] : '';
        $property_type = isset($_GET['property_type']) ? $_GET['property_type'] : '';
        $postcode = isset($_GET['postcode']) ? $_GET['postcode'] : '';
        $suburb = isset($_GET['suburb']) ? $_GET['suburb'] : '';
        $deal_type = isset($_GET['deal_type']) ? $_GET['deal_type'] : '';
        $price = isset($_GET['price']) ? $_GET['price'] : '';
        $bedrooms = isset($_GET['bedrooms']) ? $_GET['bedrooms'] : '';
        $bathrooms = isset($_GET['bathrooms']) ? $_GET['bathrooms'] : '';
        $cars = isset($_GET['cars']) ? $_GET['cars'] : '';
        $land_area = isset($_GET['land_area']) ? $_GET['land_area'] : '';
        $land_frontage = isset($_GET['land_frontage']) ? $_GET['land_frontage'] : '';
        $number_of_floors = isset($_GET['number_of_floors']) ? $_GET['number_of_floors'] : '';
        $features = isset($_GET['features']) ? $_GET['features'] : '';
        $opentimes = isset($_GET['opentimes']) ? $_GET['opentimes'] : '';
        $agent_id = isset($_GET['agent_id']) ? $_GET['agent_id'] : '';
        $vendor_id = isset($_GET['vendor_id']) ? $_GET['vendor_id'] : '';
        $project_id = isset($_GET['project_id']) ? $_GET['project_id'] : '';
        $created_at = isset($_GET['created_at']) ? $_GET['created_at'] : '';
        $updated_at = isset($_GET['updated_at']) ? $_GET['updated_at'] : '';
        $per_page = isset($_GET['per_page']) ? $_GET['per_page'] : 12;
        $page = isset($_GET['page_number']) ? $_GET['page_number'] : 1;
        $order_by = isset($_GET['order_by']) ? $_GET['order_by'] : '';
        $order_dir = isset($_GET['order_dir']) ? $_GET['order_dir'] : '';
        $minimal = isset($_GET['minimal']) ? $_GET['minimal'] : '';
        $require = isset($_GET['require']) ? $_GET['require'] : '';

        // build url
        $paramArray = [
            'id' => $identity,
            'office_id' => $office_id,
            'xml_id' => $xml_id,
            'status' => $status,
            'type' => $type,
            'property_type' => $property_type,
            'postcode' => $postcode,
            'suburb' => $suburb,
            'deal_type' => $deal_type,
            'price' => $price,
            'bedrooms' => $bedrooms,
            'bathrooms' => $bathrooms,
            'cars' => $cars,
            'land_area' => $land_area,
            'land_frontage' => $land_frontage,
            'number_of_floors' => $number_of_floors,
            'features' => $features,
            'opentimes' => $opentimes,
            'agent_id' => $agent_id,
            'vendor_id' => $vendor_id,
            'project_id' => $project_id,
            'created_at' => $created_at,
            'updated_at' => $updated_at,
            'per_page' => $per_page,
            'page' => $page,
            'order_by' => $order_by,
            'order_dir' => $order_dir,
            'minimal' => $minimal,
            'require' => $require,
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
        curl_close($ch);
        // end curl

        if (isset($data)) {
            echo '<div class="container">';
            echo '<div class="row">';
            if (count($data['results']) > 0) {
                foreach ($data['results'] as $key => $value) {
                    echo '<div class="col-sm-6 col-md-3 bds-items"><div class="item">';
                    echo '<a href="/property-detail/?id=' . $value['id'] . '&page_number=' . (isset($_GET['page_number']) ? $_GET['page_number'] : 1) . '"><img class="img-responsive" src="' . $value['photos']['1']['versions']['large']['url'] . '" /></a>';
                    echo '<div class="content"><h2 class="font-weight-bold bds-title"><a href="/property-detail/?id=' . $value['id'] . '&page_number=' . (isset($_GET['page_number']) ? $_GET['page_number'] : 1) . '">' . $value['headline'] . '</a></h2>';
                    echo '<p class="bds-type">Type: ' . $value['property_type'] . '</p>';
                    echo '<ins class="price">Price: $ ' . number_format($value['price']) . '</ins>';
                    echo '<ul><li><i class="general-features__icon general-features__beds"></i> ' . $value['bedrooms'] . '</li>';
                    echo '<li><i class="general-features__icon general-features__baths"></i> ' . $value['bathrooms'] . '</li>';
                    if ($value['cars']) {
                        echo '<li><i class="general-features__icon general-features__cars"></i> ' . $value['cars'] . '</li>';
                    };
                    echo '<li><i class="fas fa-building"></i> ' . $value['number_of_floors'] . '</li></ul>';
                    echo '</div></div></div>';
                }
            } else {
                echo '<div class="col-sm-12 bds-items"><h3>No result is found</h3></div>';
            }
            echo '</div>';
            echo '</div>';
        }

        $result = ob_get_contents();
        ob_end_clean();
        return $result;

    }

    add_shortcode('list_properties_shortcode', 'list_properties');
}
