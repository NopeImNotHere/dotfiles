


<!DOCTYPE html>
<html>
<head>
<?php include("css.php")?>
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
    <h1>Trainer hinzufügen</h1>
    <input type='hidden' id="identifier" name='identifier' value='Trainer hinzufügen'>
    <div class="grid-50">
    <label for="Nachname">Nachname:</label>
    <input type="text" name="Nachname" id="Nachname" required>
    <label for="Vorname">Vorname:</label>
    <input type="text" name="Vorname" id="Vorname" required>
    </div>
    <button type="submit">Erstellen</button>
</form>
</body>
</html>


