<!DOCTYPE html>
<html lang = "pl">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <link rel = "stylesheet" href = "style.css">
    </head>
    <body>
        <div id = "container_btn">
        <?php
            if(isset($_GET['id_klienta'])) 
            $id_klienta = $_GET['id_klienta'];
            echo "
            <button class = 'btn' onclick=\"location='?id_klienta=".$id_klienta."&id=show_orders'\">Twoje zamówienia</button>
            <button class = 'btn' onclick=\"location='?id_klienta=".$id_klienta."&id=add_order_form'\">Złóż zamówienie</button>";
        ?>
        </div>
        <div id='container'>
        <?php
            include 'open_db.php';
            $conn = OpenCon();
                if($_GET)
                {
                    if($_GET['id'] == 'show_orders')
                        include 'show_orders.php';
                    elseif($_GET['id'] == 'add_order_form')
                        include 'add_order_form.php';
                }
            CloseCon($conn);
        ?>
        </div>
    </body>
</html>

    
