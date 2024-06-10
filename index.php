<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <title>Document</title>
    <style>
        body{
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        table{
            width: 100%;
        }
        tr:hover{
            background-color: black;
            color: white;
        }
        td{
            padding:10px;
        }
    </style>
</head>
<body>
    <?php
        $conn = new PDO('mysql:host=localhost;dbname=hotel2' ,'root','123');
        $dbtab = "HOTEL";
        $req = "SELECT * FROM $dbtab ";
        $res = $conn->query($req);
        $data = $res->fetchAll(PDO::FETCH_ASSOC);
    ?>
    <a href="add.php" style="background-color:green;text-decoration:none;padding:2px;border-radius:3px;margin-right:3px;width:180px;color:white;" align="center">ajouter</a>
    <table>
        <tr style="border-bottom: 2px solid">
            <td>ID</td>
            <td>TITRE</td>
            <td>ADRESSE</td>
            <td>prix_par_nuit</td>
            <td>nombre_de_places</td>
            <td>ETOILE</td>
            <td>OPERATION</td>
        </tr>
        <?php
            foreach ($data as $row){
        ?>
            <tr style="border-bottom: 1px solid">
                                <td><?php echo $row['id_hotel'] ?></td>
                                <td><?php echo $row['titre'] ?></td>
                                <td><?php echo $row['adresse'] ?></td>
                                <td><?php echo $row['prix_par_nuit'] ?></td>
                                <td><?php echo $row['numbre_place'] ?></td>
                <?php
                                
                            if($row['etoile'] == 5){
                ?>
                                <td><p align="center" style="background-color:green;border-radius:30px;width:70px;color:white;color:black" align="center"><?php echo $row['etoile'] ?> etoile</p></td>
                <?php
                            }
                            if($row['etoile'] >2 && $row['etoile'] <= 4){
                ?>
                                <td><p align="center" style="background-color:yellow;border-radius:30px;width:70px;color:white;color:black" align="center"><?php echo $row['etoile'] ?> etoile</p></td>
                <?php
                            }
                            if($row['etoile'] <= 2 ){

                                ?>
                                <td><p align="center" style="background-color:red;border-radius:30px;width:70px;color:white;color:black" align="center"><?php echo $row['etoile'] ?> etoile</p></td>
                <?php
                            } 
                ?>
                                <td>
                                    <a href="update.php?id=<?php echo $row['id_hotel'] ?>" style="background-color:blue;text-decoration:none;padding:2px;border-radius:3px;margin-right:3px;color:white;">Modifier</a>
                                    <a href="delete.php?id=<?php echo $row['id_hotel'] ?>" style="background-color:red;text-decoration:none;padding:2px;border-radius:3px;margin-right:3px;color:white;">Supprimer</a>
                                </td>
            </tr>
        <?php
            }
        ?>
    </table>
</body>
</html>