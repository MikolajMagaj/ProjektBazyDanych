<?php
    include 'open_db.php';
    $conn = OpenCon();
    $id_magazynu = $_POST['delete_mag'];
    $to_delete_q = $conn -> query("SELECT `ilosc`, `produkt_id` from `produkty_magazyn` WHERE `magazyn_id` = $id_magazynu");
    $to_update_q = $conn -> query("SELECT `ilosc`, `produkt_id` from `produkty_magazyn` WHERE `magazyn_id` = $id_magazynu + 1");
    $to_delete_arr = [];
    $to_update_arr = [];
    
    while($x = $to_delete_q -> fetch_assoc())
        $to_delete_arr[$x['produkt_id']] = $x['ilosc'];
    while($x = $to_update_q -> fetch_assoc())
        $to_update_arr[$x['produkt_id']] = $x['ilosc'];
    
    foreach($to_delete_arr as $key => $val){
        if($to_update_arr[$key])
            $conn -> query ("UPDATE `produkty_magazyn` SET `ilosc` = `ilosc` + $val WHERE `produkt_id` = $key and `magazyn_id` = $id_magazynu + 1");
        else 
            $conn -> query ("INSERT INTO `produkty_magazyn` (`produkt_id`, `magazyn_id`, `ilosc`) VALUES ($key, $id_magazynu + 1, $val)");
    }   
    $conn -> query("DELETE FROM `produkty_magazyn` WHERE `magazyn_id` = $id_magazynu");
    $conn -> query("DELETE FROM `magazyn` WHERE `id_magazynu` = $id_magazynu");

    echo "</pre>";
    header("Location:admin_ui.php?id=magazine");
    CloseCon($conn);
    //select * from ((produkty_magazyn inner join produkty on produkt_id = id_produktu) inner join magazyn on magazyn_id = id_magazynu);
?>