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
// end curl
?>

<div class="container" style="margin-top: 20px;">
    <div class="col-sm-12 col-md-4">
        <img src="<?php echo $data['photos']['1']['versions']['large']['url'] ?>" alt="image" class="img-responsive">
    </div>
    <div class="col-sm-12 col-md-8">
        <p class="text-left font-weight-bold"><?php echo $data['headline'] ?></p>
        <p class="text-justify font-weight-bold"><?php echo $data['description'] ?></p>
        <p class="text-left">Price: $ <?php echo $data['price'] ?></p>
        <p class="text-left">Number of bedrooms: <?php echo $data['bedrooms'] ?></p>
        <p class="text-left">Number of bathrooms: <?php echo $data['bathrooms'] ?></p>
        <p class="text-left">Number of floors: <?php echo $data['number_of_floors'] ?></p>
    </div>
</div>

<?php get_footer();?>
