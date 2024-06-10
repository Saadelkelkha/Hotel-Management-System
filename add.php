<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post" action="add.php">
        <lable for="titre">TITRE</lable><br>
        <input type="text" id="titre" name="titre"><br>

        <lable for="adress">ADRESSE</lable><br>
        <input type="text" id="adress" name="adress"><br>

        <lable for="prix_nuit">prix_par_nuit</lable><br>
        <input type="number" id="prix_nuit" name="prix_nuit"><br>

        <lable for="nombre_place">nombre_de_places</lable><br>
        <input type="number" id="nombre_place" name="nombre_place"><br>

        <lable for="etoile">ETOILE</lable><br>
        <input type="number" id="etoile" name="etoile"><br>

        <button type="submit" name="ajouter">Ajouter</button>
    </form>
    <?php
        if (isset($_POST['ajouter'])){
            $titre = $_POST['titre'];
            $adress = $_POST['adress'];
            $prix_nuit = $_POST['prix_nuit'];
            $nombre_place = $_POST['nombre_place'];
            $etoile = $_POST['etoile'];

            $conn = new PDO('mysql:host=localhost;dbname=hotel2' ,'root','123');
            $sqlstate = $conn -> prepare('insert into hotel values(NULL,?,?,?,?,?)');
            $ajoute = $sqlstate -> execute([$titre,$adress,$prix_nuit,$nombre_place,$etoile]);

            header('location: index.php');
        }
    ?>
</body>
</html>