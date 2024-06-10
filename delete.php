<?php
    $conn = new PDO('mysql:host=localhost;dbname=hotel2' ,'root','123');
    $id = $_GET['id'];
    $query = $conn->prepare('DELETE FROM hotel WHERE id_hotel=?');
    $exe = $query->execute([$id]);
    header('location: index.php');
?>