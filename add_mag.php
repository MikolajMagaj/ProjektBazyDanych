<?php
include 'open_db.php';
$conn = OpenCon();

if(!empty($_POST['nr_telefonu']))
        $nr_telefonu = $_POST['nr_telefonu'];

if(!empty($_POST['adres']) && !empty($_POST['nr_telefonu']) && !empty($_POST['email']))
{
    $if_exists = $conn -> query("SELECT 1 FROM `magazyn` WHERE `nr_telefonu` = '$nr_telefonu'");
        // jeśli nie ma to dodaj rekord
        if($if_exists -> num_rows < 1)
        {
            $adres = $_POST['adres'];
            $nr_tel = $_POST['nr_telefonu'];
            $email = $_POST['email'];
            $conn -> query("INSERT INTO  `magazyn` (`adres`, `nr_telefonu`, `e-mail`) VALUES ('$adres', '$nr_tel', '$email')");
            header("Location:admin_ui.php?id=magazine");
        }
        // jeśli jest to zwróć informacje
        else
            header("Location:admin_ui.php?id=magazine");
}
else
    header("Location:admin_ui.php?id=magazine");
CloseCon($conn);
?>