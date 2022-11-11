
<?php

class CV
{
    public $id;
    public $metadata;
    public $dadesPersonals;
    public $experiencia;
    public $estudis;
    public $habilitats;
    public $idiomes;
    public $informatica;


    public function __construct($id, $metadata, $dadesPersonals, $experiencia, $estudis, $habilitats, $idiomes, $informatica)
    {
        $this->id = $id;
        $this->metadata = $metadata;
        $this->dadesPersonals = $dadesPersonals;
        $this->experiencies = $experiencia;
        $this->estudis = $estudis;
        $this->habilitats = $habilitats;
        $this->idiomes = $idiomes;
        $this->informatica = $informatica;
    }
    public function getId()
    {
        return $this->id;
    }
    public function getPart($part)
    {
        return $this->$part;
    }
    public function getFullName()
    {
        return $this->dadesPersonals['nom'] . ' ' . $this->dadesPersonals['cognoms'];
    }
    public function getAdress()
    {
        return $this->dadesPersonals['carrer'] . ', ' . $this->dadesPersonals['poblacio'] . ', ' . $this->dadesPersonals['provincia'] . '.';
    }
    public function download()
    {
        $file = 'cv.pdf';
        $filename = 'cv.pdf';
        header('Content-type: application/pdf');
        header('Content-Disposition: inline; filename="' . $filename . '"');
        header('Content-Transfer-Encoding: binary');
        header('Accept-Ranges: bytes');
        // @readfile($file);
    }
};
