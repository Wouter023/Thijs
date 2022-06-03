<?php

include_once 'functions.php';
include_once '../inc.db.php';

$hapjesList = hapjesLijst($pdo);
$r_id = $_GET['id'];
if ($_SERVER['REQUEST_METHOD'] === "POST") {
    if(isset($_POST['item'])) {
        $m_id = $_POST['item'];
        $aantal = 1;
        $geserveerd = 0;

        $id = addBestelling($pdo, $r_id, $m_id, $aantal, $geserveerd);
    }
}
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

    <title>Bestelling</title>
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-6">

        </div>
        <div class="col-md-6">
            <form method="post" action="index.php?id=<?= $r_id ?>">
                <select name="item">
                    <?php
                    // gerechten laten zien:
                    foreach ($hapjesList as $h) {
                        ?>
                        <option value="<?= $h['id'] ?>"><?= $h['naam'] ?></option>
                        <?php
                    }
                    ?>
                </select>
                <input type="submit" value="Toevoegen">
            </form>
        </div>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
</body>
</html>
