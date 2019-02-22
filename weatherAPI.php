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
  <input class="btn btn-success" type="submit" name="submit" value="show weather and azan times" >
</form>
</div>
<?php
 require_once ("ApisServices.php");
if (isset($_POST['submit']))
  {
  // Execute this code if the submit button is pressed.
  $city_name = $_POST['city'];
  $country_name = $_POST['country'];
  $w1=new WeatherApi();
  $w1->getWeather($city_name,$country_name);
  $a1=new AthanApi();
  $a1->getTimes($city_name,$country_name);
}
?>
</body>
</html>