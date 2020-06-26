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
$identity = isset($_POST['identity']) ? $_POST['identity'] : '';
$office_id = isset($_POST['office_id']) ? $_POST['office_id'] : '';
$xml_id = isset($_POST['xml_id']) ? $_POST['xml_id'] : '';
$status = isset($_POST['status']) ? $_POST['status'] : '';
$type = isset($_POST['type']) ? $_POST['type'] : '';
$property_type = isset($_POST['property_type']) ? $_POST['property_type'] : '';
$postcode = isset($_POST['postcode']) ? $_POST['postcode'] : '';
$suburb = isset($_POST['suburb']) ? $_POST['suburb'] : '';
$deal_type = isset($_POST['deal_type']) ? $_POST['deal_type'] : '';
$price = isset($_POST['price']) ? $_POST['price'] : '';
$bedrooms = isset($_POST['bedrooms']) ? $_POST['bedrooms'] : '';
$bathrooms = isset($_POST['bathrooms']) ? $_POST['bathrooms'] : '';
$cars = isset($_POST['cars']) ? $_POST['cars'] : '';
$land_area = isset($_POST['land_area']) ? $_POST['land_area'] : '';
$land_frontage = isset($_POST['land_frontage']) ? $_POST['land_frontage'] : '';
$number_of_floors = isset($_POST['number_of_floors']) ? $_POST['number_of_floors'] : '';
$features = isset($_POST['features']) ? $_POST['features'] : '';
$opentimes = isset($_POST['opentimes']) ? $_POST['opentimes'] : '';
$agent_id = isset($_POST['agent_id']) ? $_POST['agent_id'] : '';
$vendor_id = isset($_POST['vendor_id']) ? $_POST['vendor_id'] : '';
$project_id = isset($_POST['project_id']) ? $_POST['project_id'] : '';
$created_at = isset($_POST['created_at']) ? $_POST['created_at'] : '';
$updated_at = isset($_POST['updated_at']) ? $_POST['updated_at'] : '';
$per_page = isset($_POST['per_page']) ? $_POST['per_page'] : '';
$page = isset($_POST['page']) ? $_POST['page'] : '';
$order_by = isset($_POST['order_by']) ? $_POST['order_by'] : '';
$order_dir = isset($_POST['order_dir']) ? $_POST['order_dir'] : '';
$minimal = isset($_POST['minimal']) ? $_POST['minimal'] : '';
$require = isset($_POST['require']) ? $_POST['require'] : '';

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
    <form method="post">
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
        <input type="text" id="bedrooms" name="page"><br>
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
    echo '<div class="grid-container">';
        foreach ($data['results'] as $key => $value) {
            echo '<div class="grid-item">';
            echo '<img src="'. $value['photos']['1']['versions']['large']['url'] .'" />';
            echo '<p>'. $value['property_type'] .'</p>';
            echo '<p>'. $value['price'] .'</p>';
            echo '<p>'. $value['description'] .'</p>';
            echo '</div>';
        }
    echo '</div>';
}
?>
<?php get_footer();?>
