<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="przepis")
 */
class Przepis
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string")
     */
    private $nazwa;

    /**
     * @ORM\Column(type="string")
     */
    private $skladniki;

    /**
     * @ORM\Column(type="string")
     */
    private $wykonanie;

    /**
     * @ORM\Column(type="string")
     */
    private $zrodlo;

    /**
     * @ORM\Column(type="string")
     */
    private $uwagi;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createat;

    /**
     * @ORM\Column(type="string")
     */
    private $lastmodify;

    /**
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Kategoria", mappedBy="przepisy", cascade={"all"})
     * @ORM\JoinTable(name="przepiskategoria")
     */
    private $kategorie;

    /**
     * Przepis constructor.
     */
    public function __construct()
    {
        $this->kategorie = new ArrayCollection();
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getNazwa()
    {
        return $this->nazwa;
    }

    /**
     * @param mixed $nazwa
     */
    public function setNazwa($nazwa)
    {
        $this->nazwa = $nazwa;
    }

    /**
     * @return mixed
     */
    public function getSkladniki()
    {
        return $this->skladniki;
    }

    /**
     * @param mixed $skladniki
     */
    public function setSkladniki($skladniki)
    {
        $this->skladniki = $skladniki;
    }

    /**
     * @return mixed
     */
    public function getWykonanie()
    {
        return $this->wykonanie;
    }

    /**
     * @param mixed $wykonanie
     */
    public function setWykonanie($wykonanie)
    {
        $this->wykonanie = $wykonanie;
    }

    /**
     * @return mixed
     */
    public function getZrodlo()
    {
        return $this->zrodlo;
    }

    /**
     * @param mixed $zrodlo
     */
    public function setZrodlo($zrodlo)
    {
        $this->zrodlo = $zrodlo;
    }

    /**
     * @return mixed
     */
    public function getUwagi()
    {
        return $this->uwagi;
    }

    /**
     * @param mixed $uwagi
     */
    public function setUwagi($uwagi)
    {
        $this->uwagi = $uwagi;
    }

    /**
     * @return mixed
     */
    public function getCreateat()
    {
        return $this->createat;
    }

    /**
     * @param mixed $createat
     */
    public function setCreateat($createat)
    {
        $this->createat = $createat;
    }

    /**
     * @return mixed
     */
    public function getLastmodify()
    {
        return $this->lastmodify;
    }

    /**
     * @param mixed $lastmodify
     */
    public function setLastmodify($lastmodify)
    {
        $this->lastmodify = $lastmodify;
    }

    /**
     * @return mixed
     */
    public function getKategorie()
    {
        return $this->kategorie;
    }

    /**
     * @param ArrayCollection $kategorie
     */
    public function setKategorie(ArrayCollection $kategorie)
    {
        $this->kategorie = $kategorie;
    }

    public function addKategoria(Kategoria $kategoria)
    {
        $kategoria->addPrzepis($this);
        $this->kategorie[] = $kategoria;
    }

    public function removeKategorie()
    {
        /** @var Kategoria $kategoria */
        foreach ($this->kategorie as $kategoria) {
            $kategoria->removePrzepis($this);
        }
        $this->kategorie = new ArrayCollection();
    }

}