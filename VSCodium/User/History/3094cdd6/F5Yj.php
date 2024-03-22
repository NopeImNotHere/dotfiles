<?php
print_r($_POST);

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
  
    header("Location: admin.php");
  }
  else {
    echo "Failed";
  }
} catch (PDOException $e) {
  echo 'Error: ' . $e->getMessage();
}
$conn = null;
exit();
?>
