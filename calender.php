<?php
session_start();
require_once 'ApisServices.php';
$token=null;
$key=null;
$idd = null;
if(isset($_SESSION["token"]) && isset($_SESSION["key"]))
{
    $token=$_SESSION["token"];
    $key=$_SESSION["key"];
}
else
{
    header("location:index.php");
}
$trello=new TrelloApi();

if(isset($_POST["delete"]) && isset($_POST["id"]))
{
    $trello->DeleteBoard($_POST["id"],$token,$key);
}

if(isset($_POST["bm"]) && isset($_POST["id"]))
{
    $idd=$_POST["id"];
    header("location:boardMembers.php?id=$idd");
}
if(isset($_POST["board_color"]) && isset($_POST["board_name"]))
{
    $created=$trello->CreateBoard($_POST["board_name"],$_POST["board_color"],$token,$key);
}
$boards=$trello->getAllBoards($token,$key);
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Calender Home</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="css/bootstrap-grid.min.css" />
</head>

<body style="background-color:rgba(228, 228, 228, 0.637);">
    <section style="width:50%;padding: 20px;">
        <h5>Your Boards</h5>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Board</th>
                    <th scope="col">Delete</th>
                    <th scope="col">Board Members</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $cn=1;
                    foreach($boards as $value)
                    {
                        echo '<tr>
                        <th scope="row">'.$cn.'</th>
                        <td><a href="'.$value->url.'" class="btn btn-primary">'.$value->name.'</a></td>
                        <form method="POST" action="">
                            <input type="hidden" name="id" value="'.$value->id.'">
                            <td><button name="delete" type="submit" class="btn btn-danger">Delete</button></td>
                        </form>
                        
                        <form method="POST" action="">
                            <input type="hidden" name="id" value="'.$value->id.'">
                            <td><button name="bm" type="submit" class="btn btn-danger">Board Members</button></td>
                        </form>
                    </tr>';
                    $cn++;
                    }
                ?>
            </tbody>
        </table>

        
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">add Board</button>
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="POST" action="">
                        <div class="modal-body">

                            <div class="form-group">
                                <label for="exampleInputEmail1">board name</label>
                                <input type="text" class="form-control" name="board_name" id="exampleInputEmail1" aria-describedby="emailHelp"
                                    placeholder="Enter name">
                                    <input type="text" class="form-control" name="board_color" id="exampleInputEmail1" aria-describedby="emailHelp"
                                    placeholder="Enter color">

                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <script src="JS/jquery-3.3.1.min.js"></script>
    <script src="JS/bootstrap.bundle.min.js"></script>
    <script src="JS/bootstrap.min.js"></script>
</body>

</html>