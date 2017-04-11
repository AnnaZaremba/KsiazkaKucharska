<?php
namespace AppBundle\Form\Model;

use Symfony\Component\Validator\Constraints as Assert;

class Kontakt
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
    private $imie;

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
    private $email;

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
    private $temat;

    /**
     * @return string
     */
    public function getTemat()
    {
        return $this->temat;
    }

    /**
     * @param string $temat
     */
    public function setTemat($temat)
    {
        $this->temat = $temat;
    }

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
    private $wiadomosc;

    /**
     * @return string
     */
    public function getWiadomosc()
    {
        return $this->wiadomosc;
    }

    /**
     * @param string $wiadomosc
     */
    public function setWiadomosc($wiadomosc)
    {
        $this->wiadomosc = $wiadomosc;
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

}