<?php
/* 
  Template Name: API LISTING
*/
get_header();
// config
$end_point_url = 'http://api2.agentaccount.com:80/';
$target = 'agents/?';
$token = '827f01934ab7e1f007eda5b79141aa28f6623d61';

// prepare data
$identity = isset($_POST['identity']) ? $_POST['identity'] : '';
$office_id = isset($_POST['office_id']) ? $_POST['office_id'] : '';
$reference_id = isset($_POST['reference_id']) ? $_POST['reference_id'] : '';
$first_name = isset($_POST['first_name']) ? $_POST['first_name'] : '';
$last_name = isset($_POST['last_name']) ? $_POST['last_name'] : '';
$email = isset($_POST['email']) ? $_POST['email'] : '';
$username = isset($_POST['username']) ? $_POST['username'] : '';
$created_at = isset($_POST['created_at']) ? $_POST['created_at'] : '';
$updated_at = isset($_POST['updated_at']) ? $_POST['updated_at'] : '';
$per_page = isset($_POST['per_page']) ? $_POST['per_page'] : '';
$page = isset($_POST['page']) ? $_POST['page'] : '';


// build url
$paramArray = [
    'id' => $identity,
    'office_id' => $office_id,
    'reference_id' => $reference_id,
    'first_name' => $first_name,
    'last_name' => $last_name,
    'email' => $email,
    'username' => $username,
    'created_at' => $created_at,
    'updated_at' => $updated_at,
    'per_page' => $per_page,
    'page' => $page,
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
<div style="width: 300px; margin-left: 500px;">
    <form method="post">
        <label>ID: </label><br>
        <input type="text" id="identity" name="identity"><br>
        <label>Office ID:</label><br>
        <input type="text" id="office_id" name="office_id"><br>
        <label>Reference Id:</label><br>
        <input type="text" id="reference_id" name="reference_id"><br>
        <label>First name:</label><br>
        <input type="text" id="first_name" name="first_name"><br>
        <label>Last name:</label><br>
        <input type="text" id="last_name" name="last_name"><br>
        <label>Email:</label><br>
        <input type="text" id="email" name="email"><br>
        <label>Username:</label><br>
        <input type="text" id="username" name="username"><br>
        <label>Created at:</label><br>
        <input type="text" id="created_at" name="created_at"><br>
        <label>Updated at:</label><br>
        <input type="text" id="updated_at" name="updated_at"><br>
        <label>Per page:</label><br>
        <input type="text" id="per_page" name="per_page"><br>
        <label>Page:</label><br>
        <input type="text" id="page" name="page"><br><br>
        <input type="submit" value="Submit">
    </form>
</div>
<?php
    if (count($data['results']) > 0) {
        foreach ($data['results'] as $key => $value) {
            echo '<div> id:' . $value['id'] . '</div>';
            echo '<div> office_id:' . $value['office_id'] . '</div>';
            echo '<div> type:' . $value['type'] . '</div>';
            echo '<div> first_name:' . $value['first_name'] . '</div>';
            echo '<div> last_name:' . $value['last_name'] . '</div>';
            echo '<div> email:' . $value['email'] . '</div>';
            echo '<div> phone_number:' . $value['phone_number'] . '</div>';
            echo '<div> username:' . $value['username'] . '</div>';
            echo '<div> display_on_team_page:' . $value['display_on_team_page'] . '</div>';
            echo '<div> disabled:' . $value['disabled'] . '</div>';
            echo '<div> created_at:' . $value['created_at'] . '</div>';
            echo '<div> updated_at:' . $value['updated_at'] . '</div>';
            echo '<br>';
        }
    }
?>
<?php get_footer();?>
