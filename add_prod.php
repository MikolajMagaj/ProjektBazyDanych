<?php
include 'open_db.php';
$conn = OpenCon();

$cena = str_replace(",", ".", $_POST['cena']);
echo $cena;
if(!empty($_POST['nazwa']))
        $nazwa = $_POST['nazwa'];

if(!empty($_POST['nazwa']) && !empty($_POST['cena']) && !empty($_POST['opis']))
{
    $if_exists = $conn -> query("SELECT 1 FROM `produkty` WHERE `nazwa` = '$nazwa'");
        // jeśli nie ma to dodaj rekord
        if($if_exists -> num_rows < 1)
        {
            $nazwa = $_POST['nazwa'];
            $cena = $_POST['cena'];
            $opis = $_POST['opis'];

            $conn -> query("INSERT INTO  `produkty` (`nazwa`, `cena`, `ilosc_laczna`, `opis`) VALUES ('$nazwa', '$cena', 0, '$opis')");
            header("Location:admin_ui.php?id=products");
        }
        // jeśli jest to zwróć informacje
        else
            header("Location:admin_ui.php?id=products");
}
else 
    header("Location:admin_ui.php?id=products");

CloseCon($conn);
?>