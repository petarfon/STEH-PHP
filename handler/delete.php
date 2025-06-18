<?php

// require "../dbBroker.php";
// require "../model/prijava.php";

// if (isset($_POST['submit']) && $_POST['submit'] == 'Obrisi') {
if (isset($_POST['id_predmeta'])) {
    $id = $_POST['id_predmeta'];
    $prijava = new Prijava($id);
    $obrisano = $prijava->deleteById($id, $conn);

    if ($obrisano) {
        echo "uspesno obrisano";
    } else {
        echo "nije obrisano";
    }
}
