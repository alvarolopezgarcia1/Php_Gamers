<?php

class desarrolladora
{

    private $idDes;
    private $nombre;
    private $Fec_Creacion;



    public function __construct()
    { }


    public function getIdDes()
    {
        return $this->idDes;
    }
    public function setIdDes($idDes)
    {
        $this->idUsu = $idDes;

        return $this;
    }

    public function getFec_Creacion()
    {
        return $this->Fec_Creacion;
    }
    public function setFec_Creacion($Fec_Creacion)
    {
        $this->Fec_Creacion = $Fec_Creacion;

        return $this;
    }

    public function getnombre()
    {
        return $this->nombre;
    }
    public function setnombre($nombre)
    {
        $this->idUsu = $nombre;

        return $this;
    }
}
