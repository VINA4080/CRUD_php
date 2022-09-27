<?php
    require('connexion.php');

    if (isset($_POST['nom'])) {
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $req = mysqli_query($connexion, "INSERT INTO user(nom, prenom) VALUES ('$nom', '$prenom')");
    }

    $sql = mysqli_query($connexion,"SELECT * FROM `user`");

    $data = mysqli_fetch_all($sql, MYSQLI_ASSOC);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css">
    <title>Formulaire</title>
</head>
<body>
    <div class="container">
    <h5 class="text-center bg-dark text-white">ADD USER</h5>
        <div class=row>
            <div class="col-12 d-flex align-items-center justify-content-center">
                <main>
                    <form action="" method="POST" >
                        <div class="">
                            <label for="nom"></label>
                            <input class="form-control" aria-label="Username" aria-describedby="basic-addon1" placeholder="Nom" type="text" name="nom" id="nom" required>
                        </div>
                        <div class="mt-4">
                            <input class="form-control" aria-label="Username" aria-describedby="basic-addon1" placeholder="Prenom" type="text" name="prenom" id="prenom" required>
                        </div>
                        <div class="mt-4 text-center"><button class="btn btn-success" type="submit" name="valid">Valider</button></div>
                    </form>
                </main>
            </div>
                    
            <h5 class="mt-5 text-center bg-dark text-white">INFORMATION</h5>

            <div class="col-12">
                <table class="table table-hover mt-4 text-center">
                    <thead class="table-dark text-center">
                        <tr>
                            <th>ID</th>
                            <th>Nom</th>
                            <th>Prenom</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="">
                            <?php foreach ($data as $value) { ?>
                        <tr>
                            <td><?= $value['id']."<br>"?></td>
                            <td><?= $value['nom']."<br>"?></td>
                            <td><?= $value['prenom']."<br>"?></td>
                            <td class="text-center">
                                <button class="btn btn-secondary" ><a class="text-decoration-none text-white" href="delete.php?id=<?= $value['id']?>">Supprimer</a></button>
                                <button class="btn btn-secondary" ><a class="text-decoration-none text-white" href="update.php?id=<?= $value['id']?>">Modifier</a></button>
                            </td>
                        </tr>
                            <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>