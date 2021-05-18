<?php
    include 'resource/connect.php';
    include 'resource/functions.php';
    $appointment = getAppointment($_GET['appointment']);
    $appointment['date'] = explode(" ", $appointment['date']);
    $appointment['date'] = implode("T", $appointment['date']);

    $games = getAllGames();

    if($_SERVER['REQUEST_METHOD']=='POST'){
        $gameKey = array_search($_POST['game'], array_column($games, 'id'));
        updateAppointment($_POST['game'], $games[$gameKey]['name'], $_POST['date'], $_POST['instructor'], $_POST['players'], $_GET['appointment']);
        header("location:agenda.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php include "resource/header.php";?>
    <section>
    </section>
    <section class="m-3">
        <form class="d-flex flex-column w-100 mt-auto pb-3 bg-dark text-white border border-secondary" action="" method="POST" onsubmit="return confirm('Are you sure you want to edit this appointment?')">
            <div class="row p-1">
                    <div class="col-md-3">
                        <label>Game: </label>
                    </div>
                    <div class="col-md-9">
                        <select class="w-100" name="game">
                        <?php foreach($games as $game){?>
                        <option <?php if($game['name']==$appointment['gameName']){echo "selected";}?> class="w-100" value="<?php echo $game['id'];?>"><?php echo $game['name'];?></option>
                        <?php }?>
                        </select>
                    </div>
                </div>
                <div class="row p-1">
                    <div class="col-md-3">
                        <label>Date: </label>
                    </div>
                    <div class="col-md-9">
                        <input class="w-100" type="datetime-local" name="date" value="<?php echo $appointment['date'];?>">
                    </div>
                </div>
                <div class="row p-1">
                    <div class="col-md-3">
                        <label class="w-100">Instructor: </label>
                    </div>
                    <div class="col-md-9">
                        <input class="w-100" type="text" name="instructor" value="<?php echo $appointment['instructor'];?>">
                    </div>
                </div>
                <div class="row p-1">
                    <div class="col-md-3">
                        <label class="w-100">Players: </label>
                    </div>
                    <div class="col-md-9">
                        <input class="w-100" type="text" name="players" value="<?php echo $appointment['players'];?>">
                    </div>
                </div>
                <div class="p-1">
                    <input class="w-100 bg-primary text-light border-0" type="submit" value="Update appointment">
                </div>
            </form>
        </section>
    <?php include "resource/footer.php";?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</body>
</html>