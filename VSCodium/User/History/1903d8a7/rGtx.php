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
    print_r($_POST);
    if (str_contains($_POST['identifier'], 'Spieler')) {
        $stmt = $conn->prepare(
            'INSERT INTO Spieler (Nachname, Vorname, Geburtsdatum, FK_Team) VALUES (:Nachname, :Vorname, :Geburtsdatum, :FK_Team)'
        );
        $stmt->bindParam(':Nachname', $_POST['Nachname']);
        $stmt->bindParam(':Vorname', $_POST['Vorname']);
        $stmt->bindParam(':Geburtsdatum', $_POST['Geburtstag']);
        $stmt->bindParam(':FK_Team', $_POST['Teams']);

        $stmt->execute();
    } elseif (str_contains($_POST['identifier'], 'Team')) {
        $stmt = $conn->prepare(
            'INSERT INTO Team (Teamname, Altersgruppe) VALUES (:Teamname, :Altersgruppe)'
        );
        $stmt->bindParam(':Teamname', $_POST['Teamname']);
        $stmt->bindParam(':Altersgruppe', $_POST['Altersgruppe']);

        $stmt->execute();
    } elseif (str_contains($_POST['identifier'], 'Trainer')) {
        $stmt = $conn->prepare(
            'INSERT INTO Trainer (Nachname, Vorname) VALUES (:Nachname, :Vorname)'
        );
        $stmt->bindParam(':Nachname', $_POST['Nachname']);
        $stmt->bindParam(':Vorname', $_POST['Vorname']);

        $stmt->execute();
    } elseif(str_contains($_POST['identifier'], 'RelationTeamTrainer'))

    echo 'New records created successfully';
} catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage();
}
$conn = null;
?>
