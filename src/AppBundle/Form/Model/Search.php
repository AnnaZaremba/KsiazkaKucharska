<?php
namespace AppBundle\Form\Model;

class Search
{
    /**
     * @var string
     */
    private $search;

    /**
     * @return mixed
     */
    public function getSearch()
    {
        return $this->search;
    }

    /**
     * @param mixed $search
     */
    public function setSearch($search)
    {
        $this->search = $search;
    }


}