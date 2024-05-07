<?php
    include 'open_db.php';
    $conn = OpenCon();

    if(isset($_GET['id_klienta']))
    $id_klienta = $_GET['id_klienta'];

    $ilosci_temp = $_POST['ilosci'];
    $ilosci = [];
    foreach($ilosci_temp as $index => $val)
    {
        if($val != 0)
            array_push($ilosci, $val);
    }

    if(!empty($_POST['produkty']) && !empty($ilosci))
    {
        if(isset($_POST['produkty']))
            $id_produktow = $_POST['produkty'];
        
            
        $conn -> query("INSERT INTO `zamowienia` (`klient_id`, `data_zamowienia`, `status`, `kwota`) VALUES ($id_klienta, CURDATE(), 'zamówione', 0)");
        $zamowienie = $conn -> query("SELECT `id_zamowienia` FROM `zamowienia` ORDER BY `id_zamowienia` DESC LIMIT 1") -> fetch_assoc();
        $zamowienie_id = $zamowienie['id_zamowienia'];
        $kwota = 0;
        foreach($id_produktow as $index => $id){  
            $sztuk = $ilosci[$index];
            $get_stock = $conn -> query("SELECT `magazyn_id`, `ilosc` FROM `produkty_magazyn` WHERE `produkt_id` = $id ORDER BY `ilosc` ASC");
            $stock_id;
            while($x = $get_stock -> fetch_assoc())
            {
                if($x['ilosc'] >= $sztuk)
                {
                    $stock_id = $x['magazyn_id'];
                    break;
                }
            }
            if($stock_id)
            {
                $conn -> query("INSERT INTO `zamowienia_produkty` (`produkt_id`, `zamowienie_id`, `sztuk`) VALUES ($id, $zamowienie_id, $sztuk)");
                $to_price_temp = $conn -> query("SELECT `cena` FROM `produkty` WHERE `id_produktu` = $id") -> fetch_assoc();
                $price = $to_price_temp['cena'];
                $kwota += ($price * $sztuk);
                $conn -> query("UPDATE `zamowienia` SET `kwota` = $kwota WHERE `id_zamowienia` = $zamowienie_id");
                $conn -> query("UPDATE `produkty_magazyn` SET `ilosc` = `ilosc` - $sztuk WHERE `produkt_id` = $id and `magazyn_id` = $stock_id");
            }
            else
                header("Location:user_ui.php?id_klienta=$id_klienta"); 
        }
        
        CloseCon($conn);
        header("Location:user_ui.php?id_klienta=$id_klienta");
    }
    else 
        header("Location:user_ui.php?id_klienta=$id_klienta"); 
?>