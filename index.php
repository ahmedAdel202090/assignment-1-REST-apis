<?php
session_start();
if(isset($_POST["key"]))
{
  $_SESSION["key"]=$_POST["key"];
  $url_token="https://trello.com/1/authorize?expiration=1day&name=MyPersonalToken&scope=read,write,account&response_type=token&key={$_SESSION['key']}8&return_url=http://localhost/assignment%201-REST%20apis/approve_token.html&name=Calender-app";
  header("location:".$url_token);
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Page Title</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" media="screen" href="css/bootstrap.min.css" />
  <link rel="stylesheet" type="text/css" media="screen" href="css/bootstrap-grid.min.css" />
</head>
<body style="background-color:rgba(228, 228, 228, 0.637);">
    <section style="margin: auto;margin-top:10% ;background-color:white;height: 200px; width: 600px;padding:16px;">
        <h5>Welcome to Our Application</h5>
        <br/>
        <?php
          if(isset($_SESSION["token"]) && isset($_SESSION["key"]))
          {
            echo '<a class="btn btn-success" href="calender.php">Trello Calender</a>'; 
          }
          else{
              echo '<form method="POST" action="">
              <input type="text" name="key" placeholder="enter your api key" />
              <button class="btn btn-success" type="submit" >submit key</button>
              <a class="btn btn-primary" href="https://trello.com/app-key" >get your api key</a>
              </form>
              ';
          }
        ?>
        <br/><br/>
        <a href="weatherAPI.php" class="btn btn-success">Weather and prayer time</a>
    </section>

</body>
</html>