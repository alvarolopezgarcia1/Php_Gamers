<?php

class titulo
{

    private $idDes;
    private $idVid;
    private $nombre;
    private $img;
    private $fec_Creacion;
    private $genero;
    private $descripcion;



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

    public function getidVid()
    {
        return $this->idVid;
    }
    public function setidVid($idVid)
    {
        $this->idUsu = $idVid;

        return $this;
    }

    public function getfec_Creacion()
    {
        return $this->fec_Creacion;
    }
    public function setfec_Creacion($fec_Creacion)
    {
        $this->fec_Creacion = $fec_Creacion;

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

    
    public function getdescripcion()
    {
        return $this->descripcion;
    }
    public function setdescripcion($descripcion)
    {
        $this->idUsu = $descripcion;

        return $this;
    }

    public function getgenero()
    {
        return $this->genero;
    }
    public function setgenero($genero)
    {
        $this->idUsu = $genero;

        return $this;
    }


    
    public function getimg()
    {
    
        return $this->img;
    }
    public function setimg($img)
    {
        $this->idUsu = $img;

        return $this;
    }
}
