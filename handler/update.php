<?php

if (isset($_POST['submit']) && $_POST['submit'] == 'izmeni') {
    $prijava = new Prijava($_POST['id_predmeta'], $_POST['predmet'], $_POST['katedra'], $_POST['sala'], $_POST['datum']);
    $res = $prijava->updatePrijava($prijava, $conn);
}
