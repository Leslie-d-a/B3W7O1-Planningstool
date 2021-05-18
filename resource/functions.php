<?php
function getAllGames(){
    $pdo = dbCon();
    $sql = 'SELECT * FROM games';
    $result = $pdo->prepare($sql);
    $result->execute();
    $result = $result->fetchAll();
    return $result;
}
function getGame($id){
    $pdo = dbCon();
    $sql = 'SELECT * FROM games WHERE id=:id';
    $result = $pdo->prepare($sql);
    $result->BindParam(":id", $id);
    $result->execute();
    $result = $result->fetch();
    return $result;
}

function makeAppointment($gameId,$gameName,$datum,$instructor,$players){
    $pdo = dbCon();
    $sql = "INSERT INTO agenda (gameName, date, instructor, players, gameId) VALUES (:gameName,:date,:instructor,:players,:gameId)";
    $result = $pdo->prepare($sql);
    $result->execute(array(
        ':gameName' => $gameName,
        ':date' => date('Y-m-d H:i:s', strtotime($datum)),
        ':instructor' => $instructor,
        ':players' => $players,
        ':gameId' => $gameId,
    )
    );
}

function getAppointments(){
    $pdo = dbCon();
    $sql = 'SELECT * FROM agenda ORDER BY date ASC';
    $result = $pdo->prepare($sql);
    $result->execute();
    $result = $result->fetchAll();
    return $result;
}

function getAppointment($id){
    $pdo = dbCon();
    $sql = 'SELECT * FROM agenda WHERE id=:id';
    $result = $pdo->prepare($sql);
    $result->execute(array(':id' => $id));
    $result = $result->fetch();
    return $result;
}
function deleteAppointment($id){
    $pdo = dbCon();
    $sql = 'DELETE FROM agenda WHERE id=:id';
    $result = $pdo->prepare($sql);
    $result->execute(array(':id' => $id));
}

function updateAppointment($id, $name, $date, $instructor, $players, $appointmentId){
    $pdo = dbCon();
    $sql = 'UPDATE agenda SET gameName=:gameName, date=:date, instructor=:instructor, players=:players, gameId=:gameId WHERE id=:appointmentId';
    $result = $pdo->prepare($sql);
    $result->bindParam(":gameName", $name);
    $result->bindParam(":date", $date);
    $result->bindParam(":instructor", $instructor);
    $result->bindParam(":players", $players);
    $result->bindParam(":gameId", $id);
    $result->bindParam(":appointmentId", $appointmentId);
    $result->execute();
}