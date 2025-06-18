<?php

class Prijava
{
    public $id;
    public $predmet;
    public $katedra;
    public $sala;
    public $datum;

    public function __construct($id, $predmet = null, $katedra = null, $sala = null, $datum = null)
    {
        $this->id = $id;
        $this->predmet = $predmet;
        $this->katedra = $katedra;
        $this->sala = $sala;
        $this->datum = $datum;
    }

    //READ
    public static function getAll(mysqli $conn)
    {
        $q = "SELECT * FROM prijave";
        return $conn->query($q);
    }

    //DELETE
    public function deleteById(int $id, mysqli $conn)
    {
        $q = "DELETE FROM prijave WHERE id=$id";
        return $conn->query($q);
    }

    //CREATE
    public function addPrijava(Prijava $p, mysqli $conn)
    {
        $q = "INSERT INTO prijave(predmet, katedra, sala, datum) VALUES ('$p->predmet', '$p->katedra', '$p->sala', '$p->datum')";
        return $conn->query($q);
    }

    //READ ONE
    private function readOne(int $id, mysqli $conn)
    {
        $q = "SELECT * FROM prijave WHERE id=$id";
        return $conn->query($q);
    }

    //UPDATE
    // public function updatePrijava(Prijava $p, mysqli $conn)
    // {
    //     $q = "UPDATE prijave SET predmet='$p->predmet', katedra='$p->katedra', sala='$p->sala', datum='$p->datum' WHERE id=$p->id";
    //     return $conn->query($q);
    // }

    public function updatePrijava(Prijava $p, mysqli $conn)
    {
        $q = "UPDATE prijave SET predmet=?, katedra=?, sala=?, datum=? WHERE id=?";
        $s = $conn->prepare($q);
        $s->bind_param("ssssi", $p->predmet, $p->katedra, $p->sala, $p->datum, $p->id);
        return $s->execute();
    }

    public static function getLastId(mysqli $conn)
    {
        $q = "SELECT * FROM prijave ORDER BY id DESC LIMIT 1";
        $result = $conn->query($q);
        return $result->fetch_object()->id;
    }
}
