<?php


error_reporting(E_ALL);
ini_set('display_errors', 1);

$servername = 'localhost';
$username = 'root';
$password = 'Ilgzszjt1940';
$dbname = 'sportvereinsolingenfreisport';

try {
  $conn = new PDO(
    "mysql:host=$servername;dbname=$dbname",
    $username,
    $password
  );
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  if(isset($_POST['deleteTeam'])) {

    $team = 6;  

    $updateSpieler = $conn->prepare('UPDATE TrainerTeam SET FK_Team=:DUMMY_TEAM WHERE FK_Team = :FK_TEAM');
    $updateSpieler->bindParam(':FK_TEAM', $_POST['deleteTeam'][0]);
    $updateSpieler->bindParam(':DUMMY_TEAM', $team);
    $updateSpieler->execute();

    $team = 6;

    $updateSpieler = $conn->prepare('UPDATE Spieler SET FK_Team=:DUMMY_TEAM WHERE FK_Team = :FK_TEAM');
    $updateSpieler->bindParam(':FK_TEAM', $_POST['deleteTeam'][0]);
    $updateSpieler->bindParam(':DUMMY_TEAM', $team);
    $updateSpieler->execute();

    $stmt = $conn->prepare('DELETE FROM Team WHERE PK_Team=:PK_TEAM');
  
    $stmt->bindParam(':PK_TEAM', $_POST['deleteTeam'][0]);
    $stmt->execute();
  }
  else if(isset($_POST['deletePlayer'])) {
    $stmt = $conn->prepare('DELETE FROM Spieler WHERE PK_Spieler=:PK_SPIELER');
    $stmt->bindParam(':PK_SPIELER', $_POST['deletePlayer'][0]);
    $stmt->execute();
  }
  else if(isset($_POST['deleteTrainer'])) {
    $dummy_trainer = 6;

    $updateTrainerTeam = $conn->prepare('UPDATE TrainerTeam SET FK_Trainer=:DUMMY_TRAINER WHERE FK_Trainer=:FK_TRAINER');
    $updateTrainerTeam->bindParam('DUMMY_TRAINER', $dummy_trainer);
    $updateTrainerTeam->bindParam('FK_TRAINER', $_POST['deleteTeam'][0]);
    $updateTrainerTeam->execute();

    $stmt = $conn->prepare('DELETE FROM Trainer WHERE PK_Trainer=:PK_TRAINER');
    $stmt->bindParam('PK_TRAINER', $_POST['deleteTeam'][0]);
    $stmt->execute();
  }
  else if(isset($_POST['deleteTraining'])) {

    $partsString = $_POST['deleteTraining'];
    $parts_to_check = explode(';', $partsString);

    $trainerId = $parts_to_check[0];
    $teamName = $parts_to_check[1];
    $trainingStart = $parts_to_check[2];

    echo "Trainer ID: $trainerId<br>";
    echo "Team Name: $teamName<br>";
    echo "Training Start: $trainingStart<br>";
  }
  else {
    echo "Failed";
  }
} catch (PDOException $e) {
  echo 'Error: ' . $e->getMessage();
}
$conn = null;

//header("Location: admin-delete.php");
exit();
?>
