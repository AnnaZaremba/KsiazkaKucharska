<?php
/**
 * Created by PhpStorm.
 * User: marcinos
 * Date: 03.05.17
 * Time: 22:10
 */

namespace AppBundle\Form\Model;

use Symfony\Component\Validator\Constraints as Assert;


class Search
{
    /**
     * @var string
     * @Assert\NotBlank(message="Pole nie może być puste.")
     */
    private $nazwa;

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
}