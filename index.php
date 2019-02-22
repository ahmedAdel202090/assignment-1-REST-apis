<?php
session_start();
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
    <section style="margin: auto;margin-top:10% ;background-color:white;height: 200px; width: 400px;padding: 20px;">
        <h5>Welcome to Our Application</h5>
        <br/>
        <?php
          if(isset($_SESSION["token"]))
          {
            echo '<a class="btn btn-success" href="calender.php">Trello Calender</a>'; 
          }
          else{
              echo '<a class="btn btn-success" href="https://trello.com/1/authorize?expiration=1day&name=MyPersonalToken&scope=read,write,account&response_type=token&key=4cb33169640f5a1b21a97634f73a3ec8&return_url=http://localhost/sw/approve_token.html&name=Calender-app
              "> Trello Calender </a>';
          }
        ?>
        <br/><br/>
        <a href="weatherAPI.php" class="btn btn-success">Weather and prayer time</a>
    </section>

</body>
</html>