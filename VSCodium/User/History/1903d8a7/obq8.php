<?php
$servername = 'localhost';
$username = 'root';
$password = 'Ilgzszjt1940';
$dbname = 'sportvereinsolingenfreisport';

print_r($_POST);

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
        //header("Location: player-create.php");
    } elseif (str_contains($_POST['identifier'], 'Team')) {
        $stmt = $conn->prepare(
            'INSERT INTO Team (Teamname, Altersgruppe) VALUES (:Teamname, :Altersgruppe)'
        );
        $stmt->bindParam(':Teamname', $_POST['Teamname']);
        $stmt->bindParam(':Altersgruppe', $_POST['Altersgruppe']);

        $stmt->execute();
        header("Location: team-create.php");
    } elseif (str_contains($_POST['identifier'], 'Trainer')) {
        $stmt = $conn->prepare(
            'INSERT INTO Trainer (Nachname, Vorname) VALUES (:Nachname, :Vorname)'
        );
        $stmt->bindParam(':Nachname', $_POST['Nachname']);
        $stmt->bindParam(':Vorname', $_POST['Vorname']);

        $stmt->execute();
        header("Location: trainer-create.php");
    } elseif(str_contains($_POST['identifier'], 'Realition')) {
        $stmt = $conn->prepare(
            'INSERT INTO TrainerTeam (FK_Trainer, FK_Team, Trainingsbeginn, Trainingsende, Wochentag) VALUES (:FK_Trainer, :FK_Team, :Trainingsbeginn, :Trainingsende, :Wochentag)'
        );
        $stmt->bindParam(':FK_Trainer', $_POST['Trainers']);
        $stmt->bindParam(':FK_Team', $_POST['Teams']);
        $trainingsbeginn = $_POST['Trainingsbeginn_date'] . ' ' . $_POST['Trainingsbeginn_time'] . ':00'; // Add seconds to match the 'Y-m-d H:i:s' format
        $stmt->bindParam(':Trainingsbeginn', $trainingsbeginn);
        $trainingsende = $_POST['Trainingsende_date'] . ' ' . $_POST['Trainingsende_time'] . ':00'; // Add seconds to match the 'Y-m-d H:i:s' format
        $stmt->bindParam(':Trainingsende', $trainingsende);
        $wochentag = date('l', strtotime($_POST['Trainingsbeginn_date'])); // 'N' returns the ISO-8601 numeric representation of the day of the week (1 for Monday, 7 for Sunday)
        $stmt->bindParam(':Wochentag', $wochentag);
        
        $stmt->execute();
        header("Location: add-trainer-team.php");                
    }

    echo 'New records created successfully';
} catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage();
}
$conn = null;
exit()
?>
