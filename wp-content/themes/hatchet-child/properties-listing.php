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
$per_page = isset($_GET['per_page']) ? $_GET['per_page'] : '';
$page = isset($_GET['page_number']) ? $_GET['page_number'] : '';
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
<style>
    .grid-container {
        display: grid;
        grid-template-columns: auto auto auto;
        padding: 10px;
        margin: 10px;
    }
</style>
<div style="width: 300px; margin-left: 500px;">
    <form method="get">
        <label>ID: </label><br>
        <input type="text" id="identity" name="identity"><br>
        <label>Office ID:</label><br>
        <input type="text" id="office_id" name="office_id"><br>
        <label>xml_id:</label><br>
        <input type="text" id="xml_id" name="xml_id"><br>
        <label>status:</label><br>
        <input type="text" id="status" name="status"><br>
        <label>type:</label><br>
        <input type="text" id="type" name="type"><br>
        <label>property_type:</label><br>
        <input type="text" id="property_type" name="property_type"><br>
        <label>postcode:</label><br>
        <input type="text" id="postcode" name="postcode"><br>
        <label>suburb:</label><br>
        <input type="text" id="suburb" name="suburb"><br>
        <label>deal_type:</label><br>
        <input type="text" id="deal_type" name="deal_type"><br>
        <label>price:</label><br>
        <input type="price" id="per_page" name="price"><br>
        <label>bedrooms:</label><br>
        <input type="text" id="bedrooms" name="bedrooms"><br>
        <label>cars:</label><br>
        <input type="text" id="cars" name="cars"><br>
        <label>land_area:</label><br>
        <input type="text" id="land_area" name="land_area"><br>
        <label>land_frontage:</label><br>
        <input type="text" id="land_frontage" name="land_frontage"><br>
        <label>number_of_floors:</label><br>
        <input type="text" id="number_of_floors" name="number_of_floors"><br>
        <label>features:</label><br>
        <input type="text" id="features" name="features"><br>
        <label>opentimes:</label><br>
        <input type="text" id="opentimes" name="opentimes"><br>
        <label>agent_id:</label><br>
        <input type="text" id="agent_id" name="agent_id"><br>
        <label>vendor_id:</label><br>
        <input type="text" id="vendor_id" name="vendor_id"><br>
        <label>project_id:</label><br>
        <input type="text" id="project_id" name="project_id"><br>
        <label>created_at:</label><br>
        <input type="text" id="created_at" name="created_at"><br>
        <label>updated_at:</label><br>
        <input type="text" id="updated_at" name="updated_at"><br>
        <label>per_page:</label><br>
        <input type="text" id="per_page" name="per_page"><br>
        <label>page:</label><br>
        <input type="text" id="page_number" name="page_number"><br>
        <label>order_by:</label><br>
        <input type="text" id="order_by" name="order_by"><br>
        <label>order_dir:</label><br>
        <input type="text" id="order_dir" name="order_dir"><br>
        <label>minimal:</label><br>
        <input type="text" id="minimal" name="minimal"><br>
        <label>require:</label><br>
        <input type="text" id="require" name="require"><br><br>
        <input type="submit" value="Submit">
    </form>
</div>
<?php
if (isset($data)) {
    echo '<div class="container">';
        echo '<div class="row">';
            foreach ($data['results'] as $key => $value) {
                echo '<div class="col-sm-6 col-md-4">';
                    echo '<img class="img-responsive" src="'. $value['photos']['1']['versions']['large']['url'] .'" />';
                    echo '<p class="text-left font-weight-bold">'. $value['headline'] .'</p>';
                    echo '<p class="text-left">$'. $value['price'] .'</p>';
                    echo '<p class="text-left">Number of bedrooms: '. $value['bedrooms'] .'</p>';
                    echo '<p class="text-left">Number of bathrooms: '. $value['bathrooms'] .'</p>';
                    echo '<p class="text-left">Number of floors: '. $value['number_of_floors'] .'</p>';
                echo '</div>';
            }
        echo '</div>';
    echo '</div>';
}
?>
<nav aria-label="Page navigation example">
    <ul class="pagination">
        <li class="page-item"><a class="page-link" href="#">Previous</a></li>
        <?php for($i = 0; $i <= $data['total_pages']; $i++) {?>
            <li class="page-item"><a class="page-link" href="
                <?php str_replace('&page_number=' . ($_GET['page_number'] != null ? $_GET['page_number'] : ''), '&page_number=' . ($i+1), $_SERVER['QUERY_STRING']);
                ?>"><?php echo $i+1;?></a></li>
        <?php }?>
        <li class="page-item"><a class="page-link" href="#">Next</a></li>
    </ul>
</nav>
<?php get_footer();?>
