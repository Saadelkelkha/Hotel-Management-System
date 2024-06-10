<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $conn = new PDO('mysql:host=localhost;dbname=hotel2' ,'root','123');
        $id = $_GET['id'];


        $res = $conn->prepare("SELECT * FROM hotel WHERE id_hotel=?");
        $res->execute([$id]);
        $data = $res->fetchAll(PDO::FETCH_NUM);
        foreach($data as $ele){

    ?>
    <form method="post" action="">
        <lable for="titre">Titre</lable><br>
        <input type="text" id="titre" name="titre" value="<?php echo $ele[1] ;?>"><br>

        <lable for="adres">Adresse</lable><br>
        <input type="text" id="adress" name="adress" value="<?php echo $ele[2]; ?>"><br>

        <lable for="prix_nuit">prix_par_nuit</lable><br>
        <input type="number" id="prix_nuit" name="prix_nuit" value="<?php echo $ele[3]; ?>"><br>

        <lable for="nombre_place">nombre_de_places</lable><br>
        <input type="number" id="nombre_place" name="nombre_place" value="<?php echo $ele[4]; ?>"><br>

        <lable for="etoile">ETOILE</lable><br>
        <input type="number" id="etoile" name="etoile" value="<?php echo $ele[5]; ?>"><br>

        <input type="hidden" value="<?php echo $id ?>" name="id">
    <?php
        }
    ?>

        <button type="submit" name="modify">MODIFIER</button>
    </form>
    <?php
        if (isset($_POST['modify'])){
            $titre = $_POST['titre'];
            $adress = $_POST['adress'];
            $prix_nuit = $_POST['prix_nuit'];
            $nombre_place = $_POST['nombre_place'];
            $etoile = $_POST['etoile'];
            $id = $_POST["id"];

            $conn = new PDO('mysql:host=localhost;dbname=hotel2' ,'root','123');
            $sqlstate = $conn -> prepare('UPDATE hotel SET titre = ? , adresse = ?, prix_par_nuit = ?, numbre_place = ?, ETOILE = ? WHERE id_hotel = ?');
            $modify =$sqlstate -> execute([$titre,$adress,$prix_nuit,$nombre_place,$etoile,$id]);
            
            header('location: index.php');
        }
?>
</body>
</html>