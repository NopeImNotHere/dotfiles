


<!DOCTYPE html>
<html>
<head>
<?php include("head.php")?>
</head>
<body>

<?php include("nav.php")?>

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


