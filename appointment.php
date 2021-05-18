<?php
    include 'resource/connect.php';
    include 'resource/functions.php';
    $appointment = getAppointment($_GET['id']);
    $game = getGame($appointment['gameId']);
    $players = explode(',',$appointment['players']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Planningstool | Agenda</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php include 'resource/header.php';?>
    <section class="m-3">
        <div class="row justify-content-md-center border border-secondary w-100 m-0 my-1">
            <div class="col-md-4 bg-dark p-3">
                <img class="img-fluid" src="img/<?php echo $game['image'];?>" alt="<?php echo $game['image'];?>">
            </div> 
            <div class="col-md-8 bg-dark p-3">
                <?php echo $game['youtube'];?>
            </div> 
        </div>
        <div class="row justify-content-md-center h-100 w-100 m-0 my-1">
            <div class="d-flex flex-column col-md-6 bg-dark text-white text-center border border-secondary">
                <h1>
                    <?php echo $game['name'];?>
                </h1>
                <p>
                <?php echo strip_tags($game['description'])?>
                </p>
            </div>
            <div class="d-flex flex-row col-md-6 bg-dark text-white text-center border border-secondary">
                <div class="w-50">
                    <div class="align-middle p-1">
                        <h2 class="fs-5">Start Time</h2>
                        <p class="m-0"><?php echo $appointment['date'];?></p>
                    </div>
                    <div class="border-right border-secondary align-middle p-1">
                        <h2 class="fs-5">Instructor</h2>
                        <p class="m-0"><?php echo $appointment['instructor'];?></p>
                    </div>
                </div>
                <div class="w-50 border-left border-secondary align-middle p-1">
                    <h2 class="fs-5">Players</h2>
                    <?php foreach($players as $player){?>
                        <p class="m-0"><?php echo $player;?></p>
                    <?php }?>
                </div>
            </div>
        <div class="d-flex w-100 justify-content-around bg-dark text-white text-center skills border border-secondary w-100 m-0 my-1">
            <div class="border-right border-secondary align-middle p-1">
                <h2 class="fs-5">Skills</h2>
                <p class="m-0"><?php echo implode(", ",explode(";",$game['skills']));?></p>
            </div>
            <div class="border-right border-secondary align-middle p-1">
                <h2 class="fs-5">Minimum spelers</h2>
                <p class="m-0"><?php echo $game['min_players'];?> spelers</p>
            </div>
            <div class="border-right border-secondary align-middle p-1">
                <h2 class="fs-5">Maximum spelers</h2>
                <p class="m-0"><?php echo $game['max_players'];?> spelers</p>
            </div>
            <div class="border-right border-secondary align-middle p-1">
                <h2 class="fs-5">Play minutes</h2>
                <p class="m-0"><?php echo $game['play_minutes'];?> minuten</p>
            </div>
            <div class="border-right border-secondary align-middle p-1">
                <h2 class="fs-5">Uitleg tijd</h2>
                <p class="m-0"><?php echo $game['explain_minutes'];?> minuten</p>
            </div>
            <?php if(!empty($game['expansions'])){?>
                <div class="border-right border-secondary align-middle p-1">
                    <h2 class="fs-5">Uitbereidingen</h2>
                    <p class="m-0"><?php echo implode(", ",explode(";",$game['expansions']));?></p>
                </div>
            <?php }?>
        </div>
        </div>
    </section>
    <?php include "resource/footer.php";?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</body>
</html>