<?php
function OpenCon()
{
    $dbhost = "localhost";
    $dbuser = "mmagaj";
    $dbpass = "123456";
    $db = "mmagaj_ProjektBD";
    $conn = new mysqli($dbhost, $dbuser, $dbpass, $db)
                or die("Connect failed: %s\n". $conn -> error);
    $conn -> query('SET NAMES utf8');
    $conn -> query('SET CHARACTER_SET utf8_unicode_ci');
    return $conn;
}
function CloseCon($conn)
{
    $conn -> close();
}
?>