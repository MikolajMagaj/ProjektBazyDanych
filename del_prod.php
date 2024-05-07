<?php
    include 'open_db.php';
    $conn = OpenCon();
    $id_produktu = $_POST['delete_prod'];
    $conn -> query("DELETE FROM `produkty` WHERE `id_produktu` = $id_produktu");
    $conn -> query("DELETE FROM `produkty_magazyn` WHERE `produkt_id` = $id_produktu");
    header("Location:admin_ui.php?id=products");
?>