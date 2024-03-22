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

    $queries = [
      'SELECT * FROM Team',
      'SELECT * FROM Trainer',
      'SELECT * FROM Spieler',
      'SELECT * FROM TrainerTeam'
  ];
  
  $results = [];
  
  foreach ($queries as $query) {
      $result = $conn->query($query);
  
      if ($result->rowCount() > 0) {
          $results[] = $result->fetchAll(PDO::FETCH_ASSOC);
      } else {
          echo "No records found in query: $query";
      }
  }
  $teams = $results[0];
  $trainers = $results[1];
  $spielers = $results[2];
  $trainings = $results[3];
} catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage();
}
$conn = null;
?>


<!DOCTYPE html>
<html>

<head>
  <style>
    body {
      background-color: white;
    }

    ul {
      list-style-type: none;
      margin: 0;
      padding: 0;
      overflow: hidden;
      background-color: #38444d;
    }

    li {
      float: left;
    }

    li a,
    .dropbtn {
      display: inline-block;
      color: white;
      text-align: center;
      padding: 14px 16px;
      text-decoration: none;
    }

    li a:hover,
    .dropdown:hover .dropbtn {
      background-color: red;
    }

    li.dropdown {
      display: inline-block;
    }

    .dropdown-content {
      display: none;
      position: absolute;
      background-color: #f9f9f9;
      min-width: 160px;
      box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
      z-index: 1;
    }

    .dropdown-content a {
      color: black;
      padding: 12px 16px;
      text-decoration: none;
      display: block;
      text-align: left;
    }

    .dropdown-content a:hover {
      background-color: #f1f1f1;
    }

    .dropdown:hover .dropdown-content {
      display: block;
    }
    .grid-25 {
      display: grid;
      grid-template-columns: repeat(4, 1fr); /* Equal-width columns */
      max-width: 300px;
    }
    .grid-25 p {
      word-wrap: break-word;
      margin-bottom: 10px;
    }
  </style>
</head>

<body>

  <ul>
    <li class="dropdown">
      <a href="javascript:void(0)" class="dropbtn">Dropdown</a>
      <div class="dropdown-content">
        <a href="./player-create.php">Spieler erstellen</a>
        <a href="./trainer-create.php">Trainer erstellen</a>
        <a href="./team-create.php">Team erstellen</a>
        <a href="./add-trainer-team.php">Training zuweisen</a>
      </div>
    </li>
    <li><a href="./admin-login.html">Admin Login</a></li>
  </ul>

<div class="">
  <form action="./delete.php" method="post">
    <table>
      <tr>
        <th>PK_Team</th>
        <th>Teamname</th>
        <th>Altersgruppe</th>
        <th>Action</th>
      </tr>
      <?php foreach($teams as $team): if ($team['Teamname'] != "DUMMY") {
      ?>
        <tr>
          <td>
            <input type="text" name="PK_Team[]" value="<?php echo $team['PK_Team'];?>">
          </td>
          <td>
            <input type="text" name="Teamname[]" value="<?php echo $team['Teamname'];?>">
          </td>
          <td>
            <input type="text" name="Altersgruppe[]" value="<?php echo $team['Altersgruppe'];?>">
          </td>
          <td>
            <button type="submit" name="deleteTeam[]" value="<?php echo $team['PK_Team']; ?>">Löschen</button>
          </td>
        </tr>
      <?php } endforeach; ?>
    </table>
  </form>

  <form action="./delete.php" method="POST">
    <table>
      <tr>
        <th>PK_Spieler</th>
        <th>Nachname</th>
        <th>Vorname</th>
        <th>Geburtsdatum</th>
        <th>Team</th>
        <th>Action</th>
      </tr>
      <?php foreach($spielers as $spieler): ?>
        <?php
        $playerTeamFK = $spieler['FK_Team'];
        $playersTeam; 
        for ($j = 0; $j < count($teams); $j++) {
            if ($teams[$j]['PK_Team'] == $playerTeamFK) {
                $playersTeam = $j;
            }
        }
        ?>
        <tr>
          <td>
            <input type="text" name="PK_Spieler[]" value="<?php echo $spieler['PK_Spieler']?>">
          </td>
          <td>
            <input type="text" name="Nachname[]" value="<?php echo $spieler['Nachname']?>">
          </td>
          <td>
            <input type="text" name="Vorname[]" value="<?php echo $spieler['Vorname']?>">
          </td>
          <td>
            <input type="date" name="Geburtsdatum[]" value="<?php echo $spieler['Geburtsdatum']?>">
          </td>
          <td>
              <input type="text" name="Team[]" value="<?php echo $teams[$playersTeam]['Teamname'] ?>">
          </td>
          <td>
            <button type="submit" name="deletePlayer[]" value="<?php echo $spieler['PK_Spieler']?>">Löschen</button>
          </td>
        </tr>
      <?php endforeach;?>
    </table>
  </form>

  <form action="./delete.php" method="POST">
    <table>
      <tr>
        <th>PK_Trainer</th>
        <th>PK_Nachname</th>
        <th>PK_Vorname</th>
        <th>Action</th>
      </tr>
      <?php foreach($trainers as $trainer): if($trainer['Nachname'] != "DUMMY") {?>
        <tr>
          <td>
            <input type="text" name="PK_Trainer[]" value="<?php echo $trainer['PK_Trainer']?>">
          </td>
          <td>
            <input type="text" name="Nachname[]" value="<?php echo $trainer['Nachname']?>">
          </td>
          <td>
            <input type="text" name="Vorname[]" value="<?php echo $trainer['Vorname']?>">
          </td>
          <td>
            <button type="submit" name="deleteTrainer[]" value="<?php echo $trainer['PK_Trainer']?>">Löschen</button>
          </td>
        </tr>
      <?php } endforeach;?>
    </table>
  </form>

  <form action="./delete.php" method="POST">
    <table>
      <tr>
        <th>FK_Trainer</th>
        <th>FK_Team</th>
        <th>Trainingsbeginn</th>
        <th>Wochentag</th>
        <th>Trainingsende</th>
        <th>Action</th>
      </tr>
      <?php foreach($trainings as $training):?>
        <?php
        $trainingTeamFK = $training['FK_Team'];
        $trainingTeam; 
        for ($j = 0; $j < count($teams); $j++) {
            if ($teams[$j]['PK_Team'] == $trainingTeamFK) {
                $trainingTeam = $j;
            }
        }

        $trainingTrainerFK = $training['FK_Trainer'];
        $trainingTrainer;
        for($i = 0; $i < count($trainers); $i++) {
          if($trainers[$i]["PK_Trainer"] == $trainingTeamFK) {
            $trainingTrainer = $i;
            echo $trainers[$i]["PK_Trainer"];
          }
        }
        $trainingsbeginnstring = $training['Trainingsbeginn'];
        $Trainingsbeginndate = substr($trainingsbeginnstring, 0, 10); // Extract 'Y-m-d' part
        $Trainingsbeginntime = substr($trainingsbeginnstring, 11, 8); // Extract 'H:i:s' part
        
        $trainingsendestring = $training['Trainingsende'];
        $Trainingsendedate = substr($trainingsendestring, 0, 10); // Extract 'Y-m-d' part
        $Trainingsendetime = substr($trainingsendestring, 11, 8); // Extract 'H:i:s' part
        
        
        print_r($trainers)
        ?>
        <tr>
          <td>
            <input type="text" name="FK_Trainer_Nachname[]" value="<?php echo $trainers[$i]['Nachname']?>">
            <input type="text" name="FK_Trainer_Vorname[]" value="<?php echo $trainers[$i]['Vorname']?>">
          </td>
          <td>
            <input type="text" name="Team[]" value="<?php echo $teams[$playersTeam]['Teamname'] ?>">
          </td>
          <td>
            <input type="date" name="TrainingsbeginnDATE[]" value="<?php echo $Trainingsbeginndate; ?>">
            <input type="time" name="TrainingsbeginnTIME[]" value="<?php echo $Trainingsbeginntime; ?>">
          </td>
          <td>
            <input type="text" name="Wochentag" value="<?php echo $training['Wochentag']?>">
          </td>
          <td>
            <input type="date" name="TrainingsendeDATE[]" value="<?php echo $Trainingsendedate; ?>">
            <input type="time" name="TrainingsendeTIME[]" value="<?php echo $Trainingsendetime; ?>">
          </td>
          <td>
            <button type="submit" name="deleteTrainer[]" value="<?php echo $trainer['PK_Trainer'] . ';'. $teams[$playersTeam]['Teamname']  . ';' . $training['Trainingsbeginn']?>">Löschen</button>
          </td>
        </tr>
      <?php endforeach;?>
    </table>
  </form>
</div>


</body>

</html>