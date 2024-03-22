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
    <li><a href="./admin-login.html">Admin Login</a></li>
</ul>

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


