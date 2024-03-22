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
<?php include("css.php")?>
</head>
<body>

<?php include("nav.php")?>

<form action="./create.php" method="POST">
    <h1>Team neues Training zuweisen</h1>
    <input id="identifier" name='identifier' value='Realition'>
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


