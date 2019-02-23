<?php
	require_once ("ApisServices.php");
	require_once ("calender.php");

	if(isset($_SESSION["token"]) && isset($_SESSION["key"]))
	{
	    $token=$_SESSION["token"];
	    $key=$_SESSION["key"];
	}
	else
	{
	    header("location:index.php");
	}

		$json = $trello->getBoardMembers($_GET['id'], $token, $key);
	// echo $_GET['id'];	

	$boardName = $json["name"];
	$boardId = $json["id"];
    $boardUrl = $json["url"];
    $boardPermission = $json["prefs"]["permissionLevel"];
    $invitations = $json["prefs"]["invitations"];
    $calendarFeedEnabled = $json["prefs"]["calendarFeedEnabled"];
    $background = $json["prefs"]["background"];
    $labelNames = $json["labelNames"];
    if($calendarFeedEnabled == "")
    {
    	$calendarFeedEnabled = "NULL";
    }
	// print_r($json);

echo '<!DOCTYPE html>';
echo "<html>";
echo "<head>";
  echo '<meta charset="utf-8" />';
  echo '<meta http-equiv="X-UA-Compatible" content="IE=edge">';
  echo '<title>Page Title</title>';
  echo '<meta name="viewport" content="width=device-width, initial-scale=1">';
  echo '<link rel="stylesheet" type="text/css" media="screen" href="css/bootstrap.min.css" />';
  echo '<link rel="stylesheet" type="text/css" media="screen" href="css/bootstrap-grid.min.css" />';
echo '</head>';
echo '<body style="background-color:rgba(228, 228, 228, 0.637);">';
    echo '<section style="margin: auto;margin-top:10% ;background-color:white;height: 1500px; width: 600px;padding:16px;">
        <h4 style="padding-left:30%">Board Members</h4>
        <br/>';
          if(isset($_SESSION["token"]) && isset($_SESSION["key"]))
          {
          	echo "<h5>Board name : </h5>";
            echo '<a class="btn btn-success"">'.$boardName;
            echo'</a>';
          	echo "<h5>Board id : </h5>";
            echo '<a class="btn btn-success"">'.$boardId;
            echo'</a>';
            echo "<h5>Board url : </h5>";
            echo '<a class="btn btn-success"">'.$boardUrl;
            echo'</a>';
            echo "<h5>Board permissionLevel : </h5>";
            echo '<a class="btn btn-success"">'.$boardPermission;
            echo'</a>';
            echo "<h5>Board invitations : </h5>";
            echo '<a class="btn btn-success"">'.$invitations;
            echo'</a>';
            echo "<h5>Board calendar Feed Enabled : </h5>";
            echo '<a class="btn btn-success"">'.$calendarFeedEnabled;
            echo'</a>';
            echo "<h5>Board background color : </h5>";
            echo '<a class="btn btn-success"">'.$background;
            echo'</a>';
            echo "<h5>Label names : </h5>";
            foreach ($labelNames as $key => $value)
            {
            	if($value == "")
            	{
            		$value = "NULL";
            	}
                echo "<pre>";
                print_r('<a class="btn btn-success"">'."{$key} => {$value}\n");
                echo "</pre>";
            }
            echo'</a>';

          }
          else{
              echo '<form method="POST" action="">
              <input type="text" name="key" placeholder="enter your api key" />
              <button class="btn btn-success" type="submit" >submit key</button>
              <a class="btn btn-primary" href="https://trello.com/app-key" >get your api key</a>
              </form>
              ';
          }
        echo '<br/><br/>
    </section>

</body>
</html>';
?>