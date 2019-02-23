<?php
	function getRandomJoke()
	{
	  $url = "http://api.icndb.com/jokes/random";
	  $response = file_get_contents($url);
	  $json = json_decode($response, true);
	  return $json['value']['joke'];
	}

	$joke = getRandomJoke();
	echo '<h3 class="btn btn-primary" style="margin-left: 50%; margin-top: 10%">JOKE</h3>';
	echo "<div>";
	echo '<pre style="font-size:16px; margin: auto;margin-top:20px; background-image: radial-gradient(circle, red, yellow, green);height: 20px; width: 100%;padding:16px;">';
	print_r($joke);
	echo"</pre>";
	echo "</div>";
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form method=""  style="padding-left: 40%; padding-top: 10%;" action="jokes.php">
        <td><button style="width:300px;padding: 20px; background-color: rgba(228, 150, 22, 0.637); font-size: 30px;" type="submit" class="btn btn-danger">Get Another Joke</button></td>
    </form>
</body>
</html>