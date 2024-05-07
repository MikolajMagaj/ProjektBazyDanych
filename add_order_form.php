<div class = "admin_forms" id = "test">
<?php
    if(isset($_GET['id_klienta']))
        $id_klienta = $_GET['id_klienta'];
    
    echo "<form method='post' action='add_order.php?id_klienta=".$id_klienta."' id = 'add_order_form'>";
    
    $produkty = $conn -> query("SELECT * FROM `produkty`");
    while($row = $produkty -> fetch_assoc()) {
        $id = $row['id_produktu'];
        $get_stock = $conn -> query("SELECT `ilosc` FROM `produkty_magazyn` WHERE `produkt_id` = $id ORDER BY `ilosc` DESC LIMIT 1") -> fetch_assoc();
        echo "<div class = 'product_elem'>";
        echo "<label for='".$id."'>".$row['nazwa'].": ".$row['cena']." zł</label><br>
              <label>".$row['opis']."</label><br>
              <input type='checkbox' name='produkty[]' value='".$id."'>";
        echo "<input type='number' name='ilosci[]' min='0' max = '".$get_stock['ilosc']."' value='0'><br>";
        echo "</div>";
    }
    echo "<input type='submit' value='Złóż zamówienie'>
          </form>";
?>
</div>