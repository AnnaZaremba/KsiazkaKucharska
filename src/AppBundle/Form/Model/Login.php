<?php

namespace AppBundle\Form\Model;

use Symfony\Component\Validator\Constraints as Assert;

class Login
{
    private $id;

    /**
     * @var string
     * @Assert\NotBlank(message="Pole nie może być puste.")
     * @Assert\Length(
     *     min="2",
     *     minMessage="Pole nie może mieć mniej niż 2 znaki.",
     *     max="128",
     *     maxMessage="Pole nie może mieć więcej niż 128 znaków."
     * )
     */
    private $nazwa;


    /**
     * @var string
     * @Assert\NotBlank(message="Pole nie może być puste.")
     * @Assert\Length(
     *     min="2",
     *     minMessage="Pole nie może mieć mniej niż 5 znaków.",
     *     max="128",
     *     maxMessage="Pole nie może mieć więcej niż 12 znaków."
     * )
     */
    private $haslo;

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
    public function getHaslo()
    {
        return $this->haslo;
    }

    /**
     * @param string $haslo
     */
    public function setHaslo($haslo)
    {
        $this->haslo = $haslo;
    }

}

