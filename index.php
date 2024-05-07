<!DOCTYPE html>
<html lang = "pl">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <link rel = "stylesheet" href = "style.css">
    </head>
    <body>
    <div class = "login_cont">
        <h1>
            Zaloguj się
        </h1>
        <h4>//aby zalogować się jako admin e-mail = admin@admin (w celach informacyjnych)</h4>
        <form action = "login.php" method = "post">
            <?php 
            if(isset($_GET['message'])){
                $message = "Podano nieprawidłowy e-mail.";
                echo "<p id = 'message'>".$message."</p>";
            }
            ?>
            <label for = "email"> E-mail: </label>
            <input type = "email" id = "email" name = "email"><br>
            <input type = "submit" value = "Zaloguj się"> <br>
        </form>
        <p id = "register_info">Jeśli nie jesteś jeszcze naszym klientem zarejestruj się! </p>
        <a href = "register.php" id = "register_btn"> Zarejestruj się</a>        
    </div>
    </body>
</html>
