<?php

//Adatbázis adatai
$tarsasag = "";
$indulvaros = "";
$erkezvaros = "";
$indulidopont = "";
$erkezidopont = "";
$ar = "";
$id = 0;
$edit_state = false;

//Adatbázishoz való csatlakozás.
$db = mysqli_connect('localhost', 'root', '', 'api');

//Ha a mentés gombra kattint.
//Elmenti a fieldekbe beírt adatokat, inserteli az adatbázisba.
if (isset($_POST['save'])) {
    $id = $_POST['id'];
    $tarsasag = $_POST['tarsasag'];
    $indulvaros = $_POST['indulvaros'];
    $erkezvaros = $_POST['erkezvaros'];
    $indulidopont = $_POST['indulidopont'];
    $erkezidopont = $_POST['erkezidopont'];
    $ar = $_POST['ar'];

    $query = "INSERT INTO 'flights'('id', 'tarsasag', 'indulvaros', 'erkezvaros', 'indulidopont', 'erkezidopont', 'ar') "
            . "VALUES ('$id', '$tarsasag', '$indulvaros', '$erkezvaros', '$indulidopont', '$erkezidopont', '$ar')";
    mysqli_query($db, $query);
    header('location: index.php'); //Visszavisz az index oldalra    
}

//Updateli az adatokat a kiválasztott járatnál.
if (isset($_POST['update'])) {
    $id = mysqli_real_escape_string($_POST['id']); 
    $tarsasag = mysqli_real_escape_string($_POST['tarsasag']);
    $indulvaros = mysqli_real_escape_string($_POST['indulvaros']); 
    $erkezvaros = mysqli_real_escape_string($_POST['erkezvaros']);
    $indulidopont = mysqli_real_escape_string($_POST['indulidopont']);
    $erkezidopont = mysqli_real_escape_string($_POST['erkezidopont']);
    $ar = mysqli_real_escape_string($_POST['ar']);


     /* mysqli_query($db, "UPDATE flights SET tarsasag='$tarsasag', indulvaros='$indulvaros', erkezvaros='$erkezvaros',"
            . " indulidopont='$indulidopont', erkezidopont='$erkezidopont', ar='$ar' WHERE id =$id");  */
      mysqli_query($db, "UPDATE flights SET tarsasag='$tarsasag', indulvaros='$indulvaros', erkezvaros='$erkezvaros',"
            . " indulidopont='$indulidopont', erkezidopont='$erkezidopont', ar='$ar' WHERE id=$id");

    header('location: index.php');
}

//Törli a járatot, amelyikre kattintva volt.
if (isset($_GET['del'])) {
    $id = $_GET['del'];

    mysqli_query($db, "DELETE FROM flights WHERE id=$id");

    header('location: index.php');
}

//Adatok kiiratása.
$results = mysqli_query($db, "SELECT * FROM flights");
?>
