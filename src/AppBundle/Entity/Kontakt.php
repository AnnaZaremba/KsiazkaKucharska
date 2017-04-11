<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="ksiazkakucharskakontakt")
 */
class Kontakt
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=55)
     */
    protected $imie;

    /**
     * @ORM\Column(type="string", length=155)
     */
    protected $email;

    /**
     * @ORM\Column(type="string", length=155)
     */
    protected $temat;

    /**
     * @ORM\Column(type="string", length=155)
     */
    protected $wiadomosc;

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
    public function getImie()
    {
        return $this->imie;
    }

    /**
     * @param mixed $imie
     */
    public function setImie($imie)
    {
        $this->imie = $imie;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getTemat()
    {
        return $this->temat;
    }

    /**
     * @param mixed $temat
     */
    public function setTemat($temat)
    {
        $this->temat = $temat;
    }

    /**
     * @return mixed
     */
    public function getWiadomosc()
    {
        return $this->wiadomosc;
    }

    /**
     * @param mixed $wiadomosc
     */
    public function setWiadomosc($wiadomosc)
    {
        $this->wiadomosc = $wiadomosc;
    }


}