<!doctype html>

<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Liste des comptes utilisateurs</title>

  <link rel="stylesheet" href="css/styles.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>

<body>

<div class="container">
    <!-- Content here -->
    <h1>Liste des Utilisateurs</h1>

    <div class="row align-items-start">
        <div class="col fw-bold">Nom : </div>
        <div class="col fw-bold">Prénom : </div>
        <div class="col fw-bold">Né le :</div>
    </div>

    <?php
    try {
        $dbh = new PDO('mysql:host=localhost:3308;dbname=demo', 'root', '');
        foreach($dbh->query('SELECT * from client') as $row) {
            echo '<div class="row align-items-start">
                    <div class="col text-capitalize">'.$row['nom'].'</div>
                    <div class="col text-capitalize">'.$row['prenom'].'</div>
                    <div class="col text-capitalize">'.$row['date_naissance'].'</div>
                </div>';
        }
        $dbh = null;
    } catch (PDOException $e) {
        print "Erreur : " . $e->getMessage() . "<br/>"; die();
    }
    ?>

</div>

  
</body>

<script src="js/scripts.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

</html>