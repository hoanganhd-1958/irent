<?php
/*
  Template Name: PROPERTIES LISTING
*/
get_header();
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
$per_page = isset($_GET['per_page']) ? $_GET['per_page'] : 16;
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

?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <div class="container" style="padding: 20px 0px;">
        <form method="get">
            <div class="row">
                <div class="col-sm-6 col-md-3">
                    <div class="form-group">
                        <label>ID </label>
                        <input type="text" id="identity" name="identity" class="form-control"
                               value="<?php echo (isset($_GET['identity']) && $_GET['identity'] != null) ? $_GET['identity'] : '' ?>">
                    </div>
                    <div class="form-group">
                        <label>Office ID</label>
                        <input type="text" id="office_id" name="office_id" class="form-control"
                               value="<?php echo (isset($_GET['office_id']) && $_GET['office_id'] != null) ? $_GET['office_id'] : '' ?>">
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="form-group">
                        <label>Status</label>
                        <input type="text" id="status" name="status" class="form-control"
                               value="<?php echo (isset($_GET['status']) && $_GET['status'] != null) ? $_GET['status'] : '' ?>">
                    </div>
                    <div class="form-group">
                        <label>Type</label>
                        <input type="text" id="type" name="type" class="form-control"
                               value="<?php echo (isset($_GET['type']) && $_GET['type'] != null) ? $_GET['type'] : '' ?>">
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="form-group">
                        <label>Property type</label>
                        <input type="text" id="property_type" name="property_type" class="form-control"
                               value="<?php echo (isset($_GET['property_type']) && $_GET['property_type'] != null) ? $_GET['property_type'] : '' ?>">
                    </div>
                    <div class="form-group">
                        <label>Price</label>
                        <input type="price" id="per_page" name="price" class="form-control"
                               value="<?php echo (isset($_GET['price']) && $_GET['price'] != null) ? $_GET['price'] : '' ?>">
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="form-group">
                        <label>Bedrooms</label>
                        <input type="text" id="bedrooms" name="bedrooms" class="form-control"
                               value="<?php echo (isset($_GET['bedrooms']) && $_GET['bedrooms'] != null) ? $_GET['bedrooms'] : '' ?>">
                    </div>
                    <div class="form-group">
                        <label>Number of floors</label>
                        <input type="text" id="number_of_floors" name="number_of_floors" class="form-control"
                               value="<?php echo (isset($_GET['number_of_floors']) && $_GET['number_of_floors'] != null) ? $_GET['number_of_floors'] : '' ?>">
                    </div>
                </div>
                <div class="col-sm-12 text-center">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-search" aria-hidden="true"></i> Search</button>
                </div>
            </div>




            <!--         <div class="form-group">
            <label>postcode:</label>
            <input type="text" id="postcode" name="postcode" class="form-control" value="<?php echo (isset($_GET['postcode']) && $_GET['postcode'] != null) ? $_GET['postcode'] : '' ?>">
        </div>
        <div class="form-group">
            <label>suburb:</label>
            <input type="text" id="suburb" name="suburb" class="form-control" value="<?php echo (isset($_GET['suburb']) && $_GET['suburb'] != null) ? $_GET['suburb'] : '' ?>">
        </div>
        <div class="form-group">
            <label>deal_type:</label>
            <input type="text" id="deal_type" name="deal_type" class="form-control" value="<?php echo (isset($_GET['deal_type']) && $_GET['deal_type'] != null) ? $_GET['deal_type'] : '' ?>">
        </div> -->

            <!--         <div class="form-group">
            <label>cars:</label>
            <input type="text" id="cars" name="cars" class="form-control" value="<?php echo (isset($_GET['cars']) && $_GET['cars'] != null) ? $_GET['cars'] : '' ?>">
        </div> -->
            <!--         <div class="form-group">
            <label>land_area:</label>
            <input type="text" id="land_area" name="land_area" class="form-control" value="<?php echo (isset($_GET['land_area']) && $_GET['land_area'] != null) ? $_GET['land_area'] : '' ?>">
        </div>
        <div class="form-group">
            <label>land_frontage:</label>
            <input type="text" id="land_frontage" name="land_frontage" class="form-control" value="<?php echo (isset($_GET['land_frontage']) && $_GET['land_frontage'] != null) ? $_GET['land_frontage'] : '' ?>">
        </div> -->

            <!--        <div class="form-group">-->
            <!--            <label>xml_id:</label>-->
            <!--            <input type="text" id="xml_id" name="xml_id" class="form-control" value="-->
            <?php //echo (isset($_GET['xml_id']) && $_GET['xml_id'] != null) ? $_GET['xml_id'] : '' ?><!--">-->
            <!--        </div>-->
            <!--         <div class="form-group">
            <label>features:</label>
            <input type="text" id="features" name="features" class="form-control" value="<?php echo (isset($_GET['features']) && $_GET['features'] != null) ? $_GET['features'] : '' ?>">
        </div> -->
            <!--         <div class="form-group">
            <label>opentimes:</label>
            <input type="text" id="opentimes" name="opentimes" class="form-control" value="<?php echo (isset($_GET['opentimes']) && $_GET['opentimes'] != null) ? $_GET['opentimes'] : '' ?>">
        </div> -->
            <!--        <div class="form-group">-->
            <!--            <label>agent_id:</label>-->
            <!--            <input type="text" id="agent_id" name="agent_id" class="form-control" value="-->
            <?php //echo (isset($_GET['agent_id']) && $_GET['agent_id'] != null) ? $_GET['agent_id'] : '' ?><!--">-->
            <!--        </div>-->
            <!--        <div class="form-group">-->
            <!--            <label>vendor_id:</label>-->
            <!--            <input type="text" id="vendor_id" name="vendor_id" class="form-control" value="-->
            <?php //echo (isset($_GET['vendor_id']) && $_GET['vendor_id'] != null) ? $_GET['vendor_id'] : '' ?><!--">-->
            <!--        </div>-->
            <!--        <div class="form-group">-->
            <!--            <label>project_id:</label>-->
            <!--            <input type="text" id="project_id" name="project_id" class="form-control" value="-->
            <?php //echo (isset($_GET['project_id']) && $_GET['project_id'] != null) ? $_GET['project_id'] : '' ?><!--">-->
            <!--        </div>-->
            <!--        <div class="form-group">-->
            <!--            <label>order_by:</label>-->
            <!--            <input type="text" id="order_by" name="order_by" class="form-control" value="-->
            <?php //echo (isset($_GET['order_by']) && $_GET['order_by'] != null) ? $_GET['order_by'] : '' ?><!--">-->
            <!--        </div>-->
            <!--        <div class="form-group">-->
            <!--            <label>order_dir:</label>-->
            <!--            <input type="text" id="order_dir" name="order_dir" class="form-control" value="-->
            <?php //echo (isset($_GET['order_dir']) && $_GET['order_dir'] != null) ? $_GET['order_dir'] : '' ?><!--">-->
            <!--        </div>-->
            <!--        <div class="form-group">-->
            <!--            <label>minimal:</label>-->
            <!--            <input type="text" id="minimal" name="minimal" class="form-control" value="-->
            <?php //echo (isset($_GET['minimal']) && $_GET['minimal'] != null) ? $_GET['minimal'] : '' ?><!--">-->
            <!--        </div>-->
            <!--        <div class="form-group">-->
            <!--            <label>require:</label>-->
            <!--            <input type="text" id="require" name="require" class="form-control" value="-->
            <?php //echo (isset($_GET['require']) && $_GET['require'] != null) ? $_GET['require'] : '' ?><!--">-->
            <!--        </div>-->

        </form>
    </div>
<?php
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
            echo '<ul><li><i class="fas fa-bed"></i> ' . $value['bedrooms'] . '</li>';
            echo '<li><i class="fas fa-bath"></i> ' . $value['bathrooms'] . '</li>';
            if ($value['cars']) {
                echo '<li><i class="fas fa-car"></i> ' . $value['cars'] . '</li>';
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
?>
    <div class="container text-center">
        <a href="
            <?php
            $query = $_GET;
            $query['page_number'] = 1;
            echo $url = $_SERVER['PHP_SELF'] . '/properties?' . http_build_query($query);
            ?>
        ">
            <span class="glyphicon glyphicon-step-backward"></span>
        </a>
        <a href="
            <?php
            $query = $_GET;
            $query['page_number'] = !isset($_GET['page_number']) ||  $_GET['page_number'] == 1 ? 1 : $_GET['page_number'] - 1;
            echo $url = $_SERVER['PHP_SELF'] . '/properties?' . http_build_query($query);
            ?>
        ">
            <span class="glyphicon glyphicon-chevron-left"></span>
        </a>
        <select style="width: auto" id="sel1" onchange="location = this.value;">
            <?php for ($i = 0; $i < $data['total_pages']; $i++) { ?>
                <option value="<?php
                    $query = $_GET;
                    $query['page_number'] = $i + 1;
                    echo $url = $_SERVER['PHP_SELF'] . '/properties?' . http_build_query($query);
                ?>" <?php echo isset($_GET['page_number']) && $_GET['page_number'] == $i+1 ? 'selected' : '' ?>><?php echo $i + 1;?></option>
            <?php } ?>
        </select>
        <a href="
            <?php
            $query = $_GET;
            $query['page_number'] = !isset($_GET['page_number']) ? 2 : ($_GET['page_number'] + 1 > $data['total_pages'] ? $data['total_pages'] : $_GET['page_number'] + 1);
            echo $url = $_SERVER['PHP_SELF'] . '/properties?' . http_build_query($query);
            ?>
        ">
            <span class="glyphicon glyphicon-chevron-right"></span>
        </a>
        <a href="
            <?php
            $query = $_GET;
            $query['page_number'] = $data['total_pages'];
            echo $url = $_SERVER['PHP_SELF'] . '/properties?' . http_build_query($query);
            ?>
        ">
            <span class="glyphicon glyphicon-step-forward"></span>
        </a>
    </div>
<?php get_footer(); ?>