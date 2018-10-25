<?php

namespace AppBundle\Entity;

/**
 * Fichiers
 */
class Fichiers
{
    /**
     * @var string
     */
    private $urlfichier;

    /**
     * @var integer
     */
    private $codefichier;

    /**
     * @var \AppBundle\Entity\Propositions
     */
    private $codeproposition;


    /**
     * Set urlfichier
     *
     * @param string $urlfichier
     *
     * @return Fichiers
     */
    public function setUrlfichier($urlfichier)
    {
        $this->urlfichier = $urlfichier;

        return $this;
    }

    /**
     * Get urlfichier
     *
     * @return string
     */
    public function getUrlfichier()
    {
        return $this->urlfichier;
    }

    /**
     * Get codefichier
     *
     * @return integer
     */
    public function getCodefichier()
    {
        return $this->codefichier;
    }

    /**
     * Set codeproposition
     *
     * @param \AppBundle\Entity\Propositions $codeproposition
     *
     * @return Fichiers
     */
    public function setCodeproposition(\AppBundle\Entity\Propositions $codeproposition = null)
    {
        $this->codeproposition = $codeproposition;

        return $this;
    }

    /**
     * Get codeproposition
     *
     * @return \AppBundle\Entity\Propositions
     */
    public function getCodeproposition()
    {
        return $this->codeproposition;
    }
}

