<?php
include('DB.php');

class Ocena
{

    public $id;
    public $ime_prezime;
    public $br_bodova;
    public $predmet_id;
    public $nastavnik_id;
    public $status;


    function __construct($id, $ime_prezime, $br_bodova, $predmet_id, $nastavnik_id, $status)
    {
        $this->id = $id;
        $this->ime_prezime = $ime_prezime;
        $this->br_bodova = $br_bodova;
        $this->predmet_id = $predmet_id;
        $this->nastavnik_id = $nastavnik_id;
        $this->status = $status;
    }


    function save($ocena)
    {
        $db = new DB();

        $query = "insert into ocene values 
        (NULL, '$ocena->ime_prezime', '$ocena->br_bodova', '$ocena->predmet_id', '$ocena->nastavnik_id', '$ocena->status')";

        return $db->connection->query($query);
    }
}
