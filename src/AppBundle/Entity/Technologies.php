<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Technologies
 *
 * @ORM\Table(name="technologies")
 * @ORM\Entity
 */
class Technologies
{
    /**
     * @var string
     *
     * @ORM\Column(name="nomTechnologie", type="string", length=30, nullable=false)
     */
    private $nomtechnologie;

    /**
     * @var integer
     *
     * @ORM\Column(name="codeTechnololgie", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $codetechnololgie;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Propositions", inversedBy="codetechnololgie")
     * @ORM\JoinTable(name="associertechnologiespropositions",
     *   joinColumns={
     *     @ORM\JoinColumn(name="codeTechnololgie", referencedColumnName="codeTechnololgie")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="codeProposition", referencedColumnName="codeProposition")
     *   }
     * )
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

