<?php
    require('connexion.php');

    if (isset($_GET['id'])) {
        $userid = $_GET['id'];
        $req = mysqli_query($connexion, "DELETE FROM user WHERE id = $userid");
    }
    
    header("location: form.php");
    exit(0);
?>