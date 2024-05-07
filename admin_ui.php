<!DOCTYPE html>
<html lang = "pl">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <link rel = "stylesheet" href = "style.css">
    </head>
    <body>
        <div id = "container_btn">
        <?php
            echo "
            <button class = 'btn' onclick=\"location='?id=magazine'\">Magazyn</button>
            <button class = 'btn' onclick=\"location='?id=show'\">Pokaż produkty w magazynach</button>
            <button class = 'btn' onclick=\"location='?id=products'\">Produkty</button>";
        ?>
        </div>
        <div id='container'>
        <?php
            include 'open_db.php';
            $conn = OpenCon();
                if($_GET)
                {
                    if($_GET['id'] == 'magazine')
                        include 'magazine.php';
                    elseif($_GET['id'] == 'products')
                        include 'products.php';
                    elseif($_GET['id'] == 'show')
                        include 'show_prod.php';
                }
            CloseCon($conn);
        ?>
        </div>
    </body>
</html>
