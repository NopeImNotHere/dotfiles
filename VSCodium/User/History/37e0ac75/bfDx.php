

<!DOCTYPE html>
<html>
<head>
<?php include("css.php")?>
</head>
<body>

<?php include("nav.php")?>

<form action="./create.php" method="POST">
    <h1>Team hinzufügen</h1>
    <input type='hidden' id="identifier" name='identifier' value='Team hinzufügen'>
    <div class="grid-50">
    <label for="Teamname">Teamname:</label>
    <input type="text" name="Teamname" id="Teamname" required>
    <label for="Altersgruppe">Altersgruppe:</label>
    <input type="text" name="Altersgruppe" id="Altersgruppe" required>
    </div>
    <button type="submit">Erstellen</button>
</form>
</body>
</html>


