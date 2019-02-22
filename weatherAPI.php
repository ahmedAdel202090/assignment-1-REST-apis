<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>World Weather</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="css/bootstrap-grid.min.css" />
    <script src="main.js"></script>
</head>
<body style="background-color:rgba(228, 228, 228, 0.637);">
  <div class="form-group container" style="margin-top:30px;">
  <form  action="" method="POST">
    <label> City name </label>
<input class="form-control" type="text" style="width: 49%;" name="city" >
<label> Country name </label>
  <input class="form-control" type="text" style="width: 49%;" name="country"  >
  <br>
  <input class="btn btn-success" type="submit" name="submit" value="show weather" >
</form>
</div>
  <?php

if (isset($_POST['submit']))
  {
  // Execute this code if the submit button is pressed.
  $city_name = $_POST['city'];
  $country_name = $_POST['country'];
  



$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.openweathermap.org/data/2.5/weather?q={$city_name},{$country_name}&appid=a17c8bebf50fea88b3ebb949a79a6e2a",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET"
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  //echo "cURL Error #:" . $err;
} else {  
  $weather_data=json_decode($response);
  $weather_description=json_encode($weather_data->weather[0]->description);
  $temparature=json_encode($weather_data->main->temp);
  $presure=json_encode($weather_data->main->pressure);
  $humidity=json_encode($weather_data->main->humidity);  
 echo  '<div class="container">';
  echo  '<h1 class="badge badge-danger" style="font-size: 2rem;">The Weather of '.$city_name.' city'.' </h1>';
  echo "<br>";
  echo '<h3 class="badge badge-secondary" style="font-size: 1.2rem;">weather description : '.$weather_description.'</h3>';
  echo "<br>";
  echo '<h3 class="badge badge-secondary" style="font-size: 1.2rem;">temparature : '.$temparature.' f'.'</h3>';
  echo "<br>";
  echo '<h3 class="badge badge-secondary" style="font-size: 1.2rem;">presure : '.$presure.'</h3>';
  echo "<br>";
  echo '<h3 class="badge badge-secondary" style="font-size: 1.2rem;">humidity : '.$humidity.'</h3>';
  echo '</div>';
}
}
?>
</body>
</html>