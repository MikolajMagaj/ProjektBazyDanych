<table>
<tr><td>Data zamówienia</td><td>Status</td><td>Produkty</td><td>Sztuk</td><td>Cena</td><td>Łączna cena</td></tr>
<?php    
    if(isset($_GET['id_klienta']))
        $id_klienta = $_GET['id_klienta'];
    $data = $conn -> query("SELECT * FROM `zamowienia` WHERE `klient_id` = $id_klienta");
    while($row = $data -> fetch_assoc())
    {
        $zam_id = $row['id_zamowienia'];
        echo "
            <tr><td>".$row['data_zamowienia']."</td><td>".$row['status']."</td>";
        $temp = $conn -> query("SELECT `sztuk`, `nazwa`, `cena` FROM `zamowienia_produkty` INNER JOIN `produkty` ON zamowienia_produkty.produkt_id = produkty.id_produktu WHERE `zamowienie_id` = $zam_id LIMIT 1"); 
        while($val = $temp -> fetch_assoc())
            echo "<td>".$val['nazwa']."</td><td>".$val['sztuk']."</td><td>".number_format($val['cena'], 2)." zł</td><td>".number_format($val['cena'] * $val['sztuk'], 2)." zł</td></tr>";
        $produkty = $conn -> query("SELECT `sztuk`, `nazwa`, `cena` FROM `zamowienia_produkty` INNER JOIN `produkty` ON zamowienia_produkty.produkt_id = produkty.id_produktu WHERE `zamowienie_id` = $zam_id LIMIT 50 OFFSET 1"); 
        while($x = $produkty -> fetch_assoc())
        {   
            echo "<tr><td></td><td></td><td>".$x['nazwa']."</td><td>".$x['sztuk']."</td><td>".number_format($x['cena'], 2)." zł</td><td>".number_format($x['cena'] * $x['sztuk'], 2)." zł</td></tr>";
        }
        echo "<tr><td></td><td></td><td></td><td></td><td><b>Kwota zamówienia</b></td><td><b>".number_format($row['kwota'], 2)." zł</b></td></tr>";
    }
?>
</table>