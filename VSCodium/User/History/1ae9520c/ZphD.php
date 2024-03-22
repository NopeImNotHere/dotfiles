<?php
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

  // prepare sql and bind parameters
  $result = $conn->query('SELECT * FROM Team');
  $result2 = $conn->query('SELECT * FROM Trainer');
  if ($result->rowCount() > 0 && $result2->rowCount() > 0) {
    $teams = $result->fetchAll(PDO::FETCH_ASSOC);
    $trainers = $result2->fetchAll(PDO::FETCH_ASSOC);
  } else {
    echo 'No records found in team or Trainer';
  }
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
  background-color:white;
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

li a, .dropbtn {
  display: inline-block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

li a:hover, .dropdown:hover .dropbtn {
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
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  text-align: left;
}

.dropdown-content a:hover {background-color: #f1f1f1;}

.dropdown:hover .dropdown-content {
  display: block;
}

.grid-50 {
  display: grid;
  grid-template-columns: 50% 50%;
  max-width: 300px;
}

#identifier {
  position: absolute;
  display: none;
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
</ul>

<form action="./create.php" method="POST">
    <h1>Team neues Training zuweisen</h1>
    <input id="identifier" name='identifier' value='RelationTeamTrainer'>
    <div class="grid-50">
    <label for="Teams">Teams:</label>
    <select name="Teams" id="Teams">
    <?php foreach ($teams as $team): ?>
      <option 
      value="<?php echo $team['PK_Team']; ?>" 
      title="<?php echo $team['Altergruppe']; ?>">
      <?php echo $team['Teamname']; ?> 
      </option>
    <?php endforeach; ?>
    </select>
    <label for="Trainers">Trainers:</label>
    <select name="Trainers" id="Trainers">
        <?php foreach ($trainers as $trainer): ?>
        <option
          value="<?php echo $trainer['PK_Trainer']; ?>"
          >
          <?php echo $trainer['Vorname'] . ' ' . $trainer['Nachname']; ?>
        </option>
        <?php endforeach; ?>
    </select>
    <label for="Trainingsbeginn_date">Trainingsbeginn Date</label>
<input type="date" name="Trainingsbeginn_date" id="Trainingsbeginn_date">

<label for="Trainingsbeginn_time">Trainingsbeginn Time</label>
<input type="time" name="Trainingsbeginn_time" id="Trainingsbeginn_time">

<label for="Trainingsende_date">Trainingsende Date</label>
<input type="date" name="Trainingsende_date" id="Trainingsende_date">

<label for="Trainingsende_time">Trainingsende Time</label>
<input type="time" name="Trainingsende_time" id="Trainingsende_time">

    </div>
    <button type="submit">Erstellen</button>
</form>
</body>
</html>


