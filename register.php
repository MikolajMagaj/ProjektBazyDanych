<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <link rel = "stylesheet" href = "style.css">
</head>
<div class = "login_cont">
    <h1>
        Zarejestruj się
    </h1>
    <form action = 'add_klient.php' method = 'post' id = "register_form">
    <?php 
        if(isset($_GET['message']))
        {
            $message = $_GET['message'];
        if($message == 0)
            echo "<p id = 'message'>Podany adres e-mail już istnieje.</p>";
        else
            echo "<p id = 'message'>Uzupełnij wszystkie pola.</p>";
        }
        ?>
        <label for = 'imie'> Imię:</label>
        <input type = 'text' id = 'imie' name = 'imie'><br>
        <label for = 'nazwisko'> Nazwisko:</label>
        <input type = 'text' id = 'nazwisko' name = 'nazwisko'><br>
        <label for = 'nr_telefonu'> Numer telefonu:</label>
        <input type = 'text' id = 'nr_telefonu' name = 'nr_telefonu'><br>
        <label for = 'email'> E-mail:</label>
        <input type = 'email' id = 'email' name = 'email'><br>
        <label for = 'adres'> Adres:</label>
        <input type = 'text' id = 'adres' name = 'adres'><br>
        <input type = 'submit' value = 'Zarejestruj się'> <br>
    </form>             
</div>