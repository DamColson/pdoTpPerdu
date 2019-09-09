<?php
$bdd = new PDO('mysql:host=localhost;dbname=hospitale2n;charset=utf8', 'root', '');
$reqPatients = $bdd->query('SELECT * FROM patients');
$patientsFetch = $reqPatients->fetchAll();
if (count($_POST) > 0) {
    $req = $bdd->prepare('INSERT INTO appointments(dateHour, idPatients) VALUES(:dateHour, :idPatients)');
    $req->bindValue(':dateHour', $_POST['dateHour']);
    $req->bindValue(':idPatients', $_POST['idPatients']);
    $req->execute();
}
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <nav class="navbar navbar-expand-lg navbar-dark bg-danger">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Accueil<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="liste-patients.php">Patients</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="liste-rendezvous.php">Rendez-Vous</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Ajouter
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="ajout-patient.php">Ajouter un patient</a>
                        <a class="dropdown-item" href="ajouter-rendezvous.php">Ajouter un rendez vous</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row mx-auto">
            <div class="col-5 mx-auto mt-4">
                <form action="ajouter-rendezvous.php" method="post" class="mx-auto text-center">

                    <p><label for="dateHour">Date et Heure du rendez vous : </label> <input type="text" name="dateHour" id="dateHour" /></p>
                    <p><select name="idPatients"> <?php foreach ($patientsFetch as $patient) { ?><option value="<?= $patient['id']; ?>"><?= $patient['lastname'] . ' ' . $patient['firstname'] ?></option><?php } ?></select></p>
                    <div class="text-center">
                        <button type="submit" class="btn btn-danger">Envoyer</button>
                    </div>
                    </p>
                </form>
            </div>
        </div>
    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="main.js"></script>
</body>
</html>