<?php
    if(!empty($_POST['email']))
        $email = $_POST['email'];

    include 'open_db.php';
    $conn = OpenCon();


    if(!empty($_POST['imie']) && !empty($_POST['nazwisko']) && !empty($_POST['nr_telefonu']) && !empty($_POST['email']) && !empty($_POST['adres']))
    {
        // sprawdzenie czy e-mail jest już w bazie danych
        $if_exists = $conn -> query("SELECT 1 FROM `klienci` WHERE `e-mail` = '$email'");
        // jeśli nie ma to dodaj rekord
        if($if_exists -> num_rows < 1)
        {
            $imie = $_POST['imie'];
            $nazwisko = $_POST['nazwisko'];
            $nr_tel = $_POST['nr_telefonu'];
            $email = $_POST['email'];
            $adres = $_POST['adres'];
            $conn -> query("INSERT INTO  `klienci` (`imie`, `nazwisko`, `nr_telefonu`, `e-mail`, `adres`) VALUES ('$imie', '$nazwisko', '$nr_tel', '$email', '$adres')");
        }
        // jeśli jest to zwróć informacje
        else
            header("Location:register.php?message=0");
    }
    else 
    {
        header("Location:register.php?message=1");
    }
       
    CloseCon($conn);
?>