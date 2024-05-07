<?php
include 'open_db.php';
$conn = OpenCon();

if($_POST['edit_mag'] > 0)
{
    $magazyn_id = $_POST['edit_mag'];
    header("Location:admin_ui.php?id=magazine&mag_id=".$magazyn_id);
}
else 
    header("Location:admin_ui.php?id=magazine");


        
if(!empty($_POST['adres']) && !empty($_POST['nr_telefonu']) && !empty($_POST['email']))
{
    $mag_id = $_GET['mag_id'];
    $if_exists = $conn -> query("SELECT * FROM `magazyn` WHERE `id_magazynu` = $mag_id") -> fetch_assoc();
    $adres = $_POST['adres'];
    $nr_tel = $_POST['nr_telefonu'];
    $email = $_POST['email'];
    if($if_exists['adres'] != $adres || $if_exists['nr_telefonu'] != $nr_tel || $if_exists['email'] != $email )
        $conn -> query("UPDATE `magazyn` SET `adres` = '$adres', `nr_telefonu` = '$nr_tel', `e-mail` = '$email' WHERE `id_magazynu` = $mag_id");
    header("Location:admin_ui.php?id=magazine");
}
CloseCon($conn);
?>