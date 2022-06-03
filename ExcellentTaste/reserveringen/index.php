<?php

include_once '../inc.db.php';
include_once '../reserveringen/functions.php';

$reserveringen = reserveringenLijst($pdo);
?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Reserveringen</title>
</head>
<body>
<div class="container-fluid">

    <div class="row">

        <table class="table">
            <thead>
            <tr>
                <th>Datum</th>
                <th>Tijd</th>
                <th>Tafel</th>
                <th>Klant</th>
                <th>Telefoonnummer</th>
                <th>Aantal</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($reserveringen as $r) {
                ?>
                <tr>
                    <td><a href="../bestellingen/index.php?id=<?= $r['id']?>"> <?= $r['datum'] ?></a></td>
                    <td><a href="../bestellingen/index.php?id=<?= $r['id']?>"><?= $r['tijd'] ?></td>
                    <td><a href="../bestellingen/index.php?id=<?= $r['id']?>"><?= $r['tafel'] ?></td>
                    <td><a href="../bestellingen/index.php?id=<?= $r['id']?>"><?= $r['naam'] ?></td>
                    <td><a href="../bestellingen/index.php?id=<?= $r['id']?>"><?= $r['telefoon'] ?></td>
                    <td><a href="../bestellingen/index.php?id=<?= $r['id']?>"><?= $r['aantal'] ?></td>
                </tr>
                <?php
            }
            ?>
            </tbody>
        </table>

    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
</body>
</html>