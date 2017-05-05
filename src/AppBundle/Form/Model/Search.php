<?php
/**
 * Created by PhpStorm.
 * User: marcinos
 * Date: 03.05.17
 * Time: 22:10
 */

namespace AppBundle\Form\Model;

class Search
{
    /**
     * @var
     */
    private $nazwa;

    /**
     * @var
     */
    private $skladniki;
    /**
     * @var
     */
    private $wykonanie;

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


}