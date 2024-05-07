<div class = "admin_forms">
    <p>
        Dodaj magazyn
    </p>
    <form action = "add_mag.php" method = "post" class = "mag_prod_forms">
        <textarea name = "adres" placeholder = "Wprowadź adres"></textarea><br>
        <input type = "text" name = "nr_telefonu" placeholder = "Wprowadź numer telefonu"><br>
        <input type = "email" name = "email" placeholder = "Wprowadź e-mail"><br>
        <input type = "submit" value = "Dodaj magazyn">
    </form>
</div>
<div class = "admin_forms">
    <p>
        Edytuj magazyn
    </p>
    <form action = "edit_mag.php?mag_id=<?php if(isset($_GET['mag_id'])) echo $_GET['mag_id'];?>" method = "post" id = 'edit_mag' class = "mag_prod_forms">
        <?php
            echo "<select onchange = 'get_id_mag()' name = 'edit_mag'><option value = 0>Wybierz magazyn</option>";
            $magazyn = $conn -> query ("SELECT * FROM magazyn");
            while($x = $magazyn -> fetch_assoc())
                echo "<option value = '".$x['id_magazynu']."'>".$x['adres']."</option>";
            echo"</select><br>";  
        ?>
        <?php
            if(isset($_GET['mag_id']))
            {
                $mag_id = $_GET['mag_id'];
                $fill_data = $conn -> query ("SELECT * FROM magazyn WHERE id_magazynu = $mag_id");
                while($y = $fill_data -> fetch_assoc())
                    echo "<textarea name = 'adres'>".$y['adres']."</textarea><br>
                    <input type = 'text' value = ".$y['nr_telefonu']." name = 'nr_telefonu'><br>
                    <input type = 'email' value = ".$y['e-mail']." name = 'email'><br>";                
            }
        ?>
        <input type = "submit" value = "Edytuj magazyn">
    </form>
    <script>
        function get_id_mag(){
            document.getElementById("edit_mag").submit();
        //     <?php ?>selected_id.options[selected_id.selectedIndex].value;
         }
    </script>
</div>
<div class = "admin_forms">
    <p>
        Usuń magazyn
    </p>
    <form action = "del_mag.php" method = "post" class = "mag_prod_forms">
        <?php
            echo "<select id = 'delete_mag' name = 'delete_mag'>";
            $magazyn = $conn -> query ("SELECT * FROM magazyn");
            while($x = $magazyn -> fetch_assoc())
                echo "<option value = '".$x['id_magazynu']."'>".$x['adres']."</option>";
            echo"</select><br>";  
        ?>
        <input type = "submit" value = "Usuń magazyn">
    </form>
</div>