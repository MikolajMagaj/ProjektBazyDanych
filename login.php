<?php
    if(!empty($_POST['email']))
        $email = $_POST['email'];

    include 'open_db.php';
    $conn = OpenCon();

    // sprawdzenie czy podany login (email) występuje w bazie danych
    $result = $conn -> query("SELECT `id_klienta` FROM `klienci` WHERE `e-mail` = '$email'");
    if($email == "admin@admin")
            header("Location:admin_ui.php");
    else
    {
        if($result -> num_rows > 0)
            header("Location:user_ui.php?id_klienta=".$result -> fetch_assoc()['id_klienta']);
        else
            header("Location:index.php?message=0");  // powrót do poprzedniej strony z logowaniem z przekazaniem wiadomości do wyświetlenia
        $result -> close();
    }
    
       
    CloseCon($conn);
?>