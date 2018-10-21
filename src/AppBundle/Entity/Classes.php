<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Classes
 *
 * @ORM\Table(name="classes")
 * @ORM\Entity
 */
class Classes
{
    /**
     * @var string
     *
     * @ORM\Column(name="nomClasse", type="string", length=30, nullable=false)
     */
    private $nomclasse;

    /**
     * @var integer
     *
     * @ORM\Column(name="codeClasse", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $codeclasse;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Propositions", mappedBy="codeclasse")
     */
    private $codeproposition;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->codeproposition = new \Doctrine\Common\Collections\ArrayCollection();
    }

}

