<?php

// if (isset($_POST['submit']) && $_POST['submit'] == 'zakazi') {
if (isset($_POST['predmet']) && isset($_POST['katedra']) && isset($_POST['sala']) && isset($_POST['datum'])) {
    $prijava = new Prijava(null, $_POST['predmet'], $_POST['katedra'], $_POST['sala'], $_POST['datum']);
    $res = $prijava->addPrijava($prijava, $conn);
    if ($res) {
        // pokupiti id poslednjeg dodatog reda u bazi, pogledati model/prijava.php
        echo Prijava::getLastId($conn);
    } else {
        echo "Doslo je do problema prilikom kreiranja prijave";
    }
}
