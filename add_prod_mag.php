<?php
include 'open_db.php';
$conn = OpenCon();

if(!empty($_POST['prod_to_add']) && !empty($_POST['mag_to_add']) && !empty($_POST['amount']))
{
    $produkt_id = $_POST['prod_to_add'];
    $magazyn_id = $_POST['mag_to_add'];
    $ilosc = $_POST['amount'];

    $if_exists = $conn -> query("SELECT `ilosc` FROM `produkty_magazyn` WHERE `produkt_id` = $produkt_id AND `magazyn_id` = $magazyn_id");
        // jeśli nie ma to dodaj rekord
        if($if_exists -> num_rows < 1)
        {
            $conn -> query("INSERT INTO  `produkty_magazyn` (`produkt_id`, `magazyn_id`, `ilosc`) VALUES ('$produkt_id', '$magazyn_id', $ilosc)");
            header("Location:admin_ui.php?id=products");
        }
        // jeśli jest to aktualizuj ilość
        else
        {
            $conn -> query("UPDATE produkty_magazyn SET ilosc = ilosc + $ilosc WHERE `produkt_id` = '$produkt_id' AND `magazyn_id` = $magazyn_id");
            header("Location:admin_ui.php?id=products");
        }

    $to_sum = $conn -> query("SELECT `ilosc` FROM `produkty_magazyn` WHERE `produkt_id` = $produkt_id");
    while($val = $to_sum -> fetch_assoc())
        $sum += $val['ilosc'];
    $conn -> query("UPDATE `produkty` SET `ilosc_laczna` = $sum WHERE `id_produktu` = $produkt_id");
}
else 
    header("Location:admin_ui.php?id=products");

CloseCon($conn);
?>