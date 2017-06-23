<?php
namespace AppBundle\Form\Model;

use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\Validator\Constraints as Assert;

class Przepis
{
    private $id;

    /**
     * @var string
     * @Assert\NotBlank(message="Pole nie może być puste.")
     */
    private $nazwa;

    /**
     * @var string
     * @Assert\NotBlank(message="Pole nie może być puste.")
     */
    private $skladniki;

    /**
     * @var string
     * @Assert\NotBlank(message="Pole nie może być puste.")
     */
    private $wykonanie;

    /**
     * @var string
     */
    private $zrodlo;

    /**
     * @var string
     */
    private $uwagi;

    /**
     * @var ArrayCollection
     */
    private $kategorie;

    /**
     * @var string
     * @Assert\File()
     */
    private $zdjecie;

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
     * @return string
     */
    public function getNazwa()
    {
        return $this->nazwa;
    }

    /**
     * @param string $nazwa
     */
    public function setNazwa($nazwa)
    {
        $this->nazwa = $nazwa;
    }

    /**
     * @return string
     */
    public function getSkladniki()
    {
        return $this->skladniki;
    }

    /**
     * @param string $skladniki
     */
    public function setSkladniki($skladniki)
    {
        $this->skladniki = $skladniki;
    }

    /**
     * @return string
     */
    public function getWykonanie()
    {
        return $this->wykonanie;
    }

    /**
     * @param string $wykonanie
     */
    public function setWykonanie($wykonanie)
    {
        $this->wykonanie = $wykonanie;
    }

    /**
     * @return string
     */
    public function getZrodlo()
    {
        return $this->zrodlo;
    }

    /**
     * @param string $zrodlo
     */
    public function setZrodlo($zrodlo)
    {
        $this->zrodlo = $zrodlo;
    }

    /**
     * @return string
     */
    public function getUwagi()
    {
        return $this->uwagi;
    }

    /**
     * @param string $uwagi
     */
    public function setUwagi($uwagi)
    {
        $this->uwagi = $uwagi;
    }

    /**
     * @return ArrayCollection
     */
    public function getKategorie()
    {
        return $this->kategorie;
    }

    /**
     * @param ArrayCollection $kategorie
     */
    public function setKategorie($kategorie)
    {
        $this->kategorie = $kategorie;
    }

    /**
     * @return string
     */
    public function getZdjecie()
    {
        return $this->zdjecie;
    }

    /**
     * @param File $zdjecie
     */
    public function setZdjecie(File $zdjecie)
    {
        $this->zdjecie = $zdjecie;
    }
}