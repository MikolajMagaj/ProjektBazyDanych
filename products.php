<div class = "admin_forms">
    <p>
        Dodaj produkt
    </p>
    <form action = "add_prod.php" method = "post" class = "mag_prod_forms">
        <input type = "text" name = "nazwa" placeholder = "Wprowadź nazwe"><br>
        <input type = "text" name = "cena" placeholder = "Wprowadź cene"><br>
        <textarea name = "opis" placeholder = "Wprowadź opis"></textarea><br>
        <input type = "submit" value = "Dodaj produkt">
    </form>
</div>
<div class = "admin_forms">
    <p>
        Dodaj produkt do magazynu
    </p>
    <form action = "add_prod_mag.php" method = "post" class = "mag_prod_forms">
        <?php
            echo "<select name = 'prod_to_add'>";
            $produkty = $conn -> query ("SELECT * FROM produkty");
            while($x = $produkty -> fetch_assoc())
                echo "<option value = '".$x['id_produktu']."'>".$x['nazwa'].": ".$x['cena']." zł</option>";
            echo"</select><br>"; 
            echo "<select name = 'mag_to_add'>";
            $magazyn = $conn -> query ("SELECT * FROM magazyn");
            while($y = $magazyn -> fetch_assoc())
                echo "<option value = '".$y['id_magazynu']."'>".$y['adres']."</option>";
            echo"</select><br>";   
        ?>
        <input type = "number" name = "amount" placeholder = "Ile dodac?"> 
        <input type = "submit" value = "Dodaj produkt do magazynu">
    </form>
</div>
<div class = "admin_forms">
    <p>
        Edytuj produkt
    </p>
    <form action = "edit_prod.php?prod_id=<?php if(isset($_GET['prod_id'])) echo $_GET['prod_id'];?>" method = "post" id = 'edit_prod' class = "mag_prod_forms">
        <?php
            echo "<select onchange = 'get_id_prod()' name = 'edit_prod'><option value = 0>Wybierz produkt</option>";
            $produkty = $conn -> query ("SELECT * FROM `produkty`");
            while($x = $produkty -> fetch_assoc())
                echo "<option value = '".$x['id_produktu']."'>".$x['nazwa'].": ".$x['cena']." zł</option>";
            echo"</select><br>";  
        ?>
        <?php
            if(isset($_GET['prod_id']))
            {
                $prod_id = $_GET['prod_id'];
                $fill_data = $conn -> query ("SELECT * FROM `produkty` WHERE `id_produktu` = $prod_id");
                while($y = $fill_data -> fetch_assoc())
                    echo "<input type = 'text' name = 'nazwa' value = ".$y['nazwa']."><br>
                    <input type = 'text' value = ".$y['cena']." name = 'cena'><br>
                    <textarea name = 'opis'>".$y['opis']."</textarea><br>";
 
            }
        ?>
        <input type = "submit" value = "Edytuj produkt">
    </form>
    <script>
        function get_id_prod(){
            document.getElementById("edit_prod").submit();
        }
    </script>
</div>
<div class = "admin_forms">
    <p>
        Usuń produkt
    </p>
    <form action = "del_prod.php" method = "post" class = "mag_prod_forms">
        <?php
            echo "<select id = 'delete_prod' name = 'delete_prod'>";
            $produkty = $conn -> query ("SELECT * FROM produkty");
            while($x = $produkty -> fetch_assoc())
                echo "<option value = '".$x['id_produktu']."'>".$x['nazwa'].": ".$x['cena']." zł</option>";
            echo"</select><br>";  
        ?>
        <input type = "submit" value = "Usuń produkt">
    </form>
</div>