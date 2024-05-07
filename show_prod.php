<table>
<tr><td>Nazwa produktu</td><td>Adres magazynu</td><td>Ilość w magazynie</td><td>Łączna ilość</td></tr>
<?php    
    $data = $conn -> query("SELECT `nazwa`, `adres`, `ilosc`, `ilosc_laczna` FROM ((`produkty_magazyn` INNER JOIN `produkty` ON `produkt_id` = `id_produktu`) INNER JOIN `magazyn` ON `magazyn_id` = `id_magazynu`) ORDER BY `nazwa`");
    while($row = $data -> fetch_assoc())
        echo "<tr><td>".$row['nazwa']."</td><td>".$row['adres']."</td><td>".$row['ilosc']."</td><td>".$row['ilosc_laczna']."</td></tr>";
?>
</table>