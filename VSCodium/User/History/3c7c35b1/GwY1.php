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
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $result = $conn->query('SELECT * FROM Team');
    
    if ($result->rowCount() > 0) {
        $teams = $result->fetchAll(PDO::FETCH_ASSOC);
    } else {
        echo 'No records found in team';
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
    <h1>Spieler hinzufügen</h1>
    <input id="identifier" name='identifier' value='Spieler hinzufügen'>
    <div class="grid-50">
    <label for="Nachname">Nachname:</label>
    <input type="text" name="Nachname" id="Nachname" required>
    <label for="Vorname">Vorname:</label>
    <input type="text" name="Vorname" id="Vorname" required>
    <label for="Geburtstag">Geburtstag</label>
    <input type="date" name="Geburtstag" id="Geburtstag" required>
    <label for="Teams">Teams:</label>
    <select name="Teams" id="Teams">
    <?php foreach ($teams as $team): ?>
      <option 
      value="<?php echo $team['PK_Team']; ?>" 
      title="<?php echo $team['Altersgruppe']; ?>">
      <?php echo $team['Teamname']; ?> 
      </option>
    <?php endforeach; ?>
    </select>
    </div>
    <button type="submit">Erstellen</button>
</form>
</body>
</html>


