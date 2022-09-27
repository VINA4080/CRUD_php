<?php
    require('connexion.php');

    if (isset($_POST['nom'])) {
        $req = mysqli_query($connexion, "UPDATE `user` SET `nom`= '$_POST[nom]', `prenom`= '$_POST[prenom]' WHERE id = '$_GET[id]'");
    }
    $sql = mysqli_query($connexion,"SELECT * FROM `user` WHERE id = '$_GET[id]'");
    $data = mysqli_fetch_all($sql, MYSQLI_ASSOC);

    if(isset($req)) {
        header("location: form.php");
        exit(0);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css">
    <title>Document</title>
</head>
<body>
    <div class="container">
        
        <div class="row">
            <div class="col-12 mt-4 d-flex align-items-center justify-content-center">
                <main>
                    
                    <form action="" method="POST">
                    <?php foreach ($data as $value) { ?>
                        <div class="mt-4">
                            <input class="form-control" aria-label="Username"  aria-describedby="basic-addon1" type="text" name="nom" id="nom" placeholder="<?= $value['nom'] ?>" required>
                        </div>
                        <div class="mt-4">
                            <input class="form-control" aria-label="Username" aria-describedby="basic-addon1" type="text" name="prenom" id="prenom" placeholder="<?= $value['prenom'] ?>" required>
                        </div>
                        <div class="mt-4 text-center"><button class="btn btn-primary" type="submit" name="valid">Modifier</button></div>
                    <?php } ?>
                    </form>
                </main>
            </div>
        </div>
    </div>
</body>
</html>