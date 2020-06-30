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
?>

    <div class="container" style="margin-top: 20px;">
        <div class="col-sm-12 col-md-4">
            <img src="<?php echo $data['photos']['1']['versions']['large']['url'] ?>" alt="image" class="img-responsive">
        </div>
        <div class="col-sm-12 col-md-8 bds-items">
            <h1 class="bds-title font-weight-bold"><?php echo $data['headline'] ?></h1>
            <p class="bds-type">Type: <?php echo $data['property_type'] ?></p>
            <ins class="price">Price: $ <?php echo $data['price'] ?></ins>
            <p class="text-justify font-weight-bold"><?php echo $data['description'] ?></p>
            <p>Amentities</p>
            <ul>
                <li><i class="fas fa-bed"></i> <?php echo $data['bedrooms'] ?></li>
                <li><i class="fas fa-bath"></i> <?php echo $data['bathrooms'] ?></li>
                <?php if ($value['cars']) echo '<li><i class="fas fa-car"></i> '. $data['cars'] .'</li>' ?>
                <li><i class="fas fa-building"></i> <?php echo $data['number_of_floors'] ?></li>
            </ul>
        </div>
        <div class="col-sm-12">
            <h5>Maybe you are interested</h5>
            <div class="row">
                <?php for ($i = 0; $i < count($randIndex); $i++) {?>
                    <div class="col-sm-6 col-md-3 bds-items">
                        <div class="item">
                            <a href="/property-detail/?id=<?php echo $dataRelate[$randIndex[$i]]['id'] ?>&page_number=1">
                                <img src="<?php echo $dataRelate[$randIndex[$i]]['photos']['1']['versions']['large']['url'] ?>" alt="image" class="img-responsive">
                            </a>
                            <div class="content">
                                <h2 class="font-weight-bold bds-title">
                                    <a href="/property-detail/?id=<?php echo $dataRelate[$randIndex[$i]]['id'] ?>&page_number=1">
                                        <?php echo $dataRelate[$randIndex[$i]]['headline'] ?>
                                    </a>
                                </h2>
                                <p class="bds-type">Type: <?php echo $dataRelate[$randIndex[$i]]['property_type'] ?></p>
                                <ins class="price">Price: $ <?php echo $dataRelate[$randIndex[$i]]['price'] ?></ins>
                                <ul>
                                    <li><i class="fas fa-bed"></i> <?php echo $dataRelate[$randIndex[$i]]['bedrooms'] ?></li>
                                    <li><i class="fas fa-bath"></i> <?php echo $dataRelate[$randIndex[$i]]['bathrooms'] ?></li>
                                    <?php if ($value['cars']) echo '<li><i class="fas fa-car"></i> '. $dataRelate[$randIndex[$i]]['cars'] .'</li>'?>
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