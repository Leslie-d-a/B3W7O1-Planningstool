<?php
    include 'resource/connect.php';
    include 'resource/functions.php';

    $appointments = getAppointments();
    $games = getAllGames();

    if(!empty($_GET['deleted'])){
        deleteAppointment($_GET['deleted']);
        header("location:agenda.php");
    }
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
        <?php foreach($appointments as $row){
            $game = $games[array_search($row['gameId'], array_column($games, 'id'))];
            ?>
            <div class="row bg-dark text-white text-center w-100 m-0 my-1">
                <div class="col-lg-3 border border-secondary p-2 d-flex justify-content-around"><span><?php echo $row['date'];?></span><a class="text-secondary" href="updateAppointment.php?appointment=<?php echo $row['id'];?>">edit</a><a class="text-danger" onclick="return confirm('Are you sure you want to delete this appointment?')" href="agenda.php?deleted=<?php echo $row['id'];?>">delete</a></div>
                <div class="col-lg-2 border border-secondary p-2"><?php echo $row['gameName'];?></div>
                <div class="col-lg-3 border border-secondary p-2"><?php echo $row['players'];?></div>
                <div class="col-lg-1 border border-secondary p-2"><?php echo $row['instructor'];?></div>
                <div class="col-lg-2 border border-secondary p-2"><?php echo $game['play_minutes'];?> minuten</div>
                <div class="col-lg-1 border border-secondary p-2"><a class="text-secondary" href="appointment.php?id=<?php echo $row['id'];?>">detail</a></div>
            </div>
        <?php }?>
    </section>
    <?php include "resource/footer.php";?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</body>
</html>