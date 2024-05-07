<?php
include 'open_db.php';
$conn = OpenCon();

if($_POST['edit_prod'] > 0)
{
    $produkt_id = $_POST['edit_prod'];
    header("Location:admin_ui.php?id=products&prod_id=".$produkt_id);
}
else
    header("Location:admin_ui.php?id=products");

        
if(!empty($_POST['nazwa']) && !empty($_POST['cena']) && !empty($_POST['opis']))
{
    $prod_id = $_GET['prod_id'];
    $if_exists = $conn -> query("SELECT * FROM `produkty` WHERE `id_produktu` = $prod_id") -> fetch_assoc();
    $nazwa = $_POST['nazwa'];
    $cena =  $_POST['cena'];
    $opis = $_POST['opis'];
    if($if_exists['nazwa'] != $nazwa || $if_exists['cena'] != $cena || $if_exists['opis'] != $opis )
        $conn -> query("UPDATE `produkty` SET `nazwa` = '$nazwa', `cena` = $cena, `opis` = '$opis' WHERE `id_produktu` = $prod_id");
    header("Location:admin_ui.php?id=products");
}
CloseCon($conn);
?>