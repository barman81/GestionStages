<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Propositions
 *
 * @ORM\Table(name="propositions", indexes={@ORM\Index(name="fk_codeEntreprise", columns={"codeEntreprise"})})
 * @ORM\Entity
 */
class Propositions
{
    /**
     * @var string
     *
     * @ORM\Column(name="titreProposition", type="string", length=30, nullable=false)
     */
    private $titreproposition;

    /**
     * @var string
     *
     * @ORM\Column(name="descriptionProposition", type="string", length=1000, nullable=false)
     */
    private $descriptionproposition;

    /**
     * @var integer
     *
     * @ORM\Column(name="codeProposition", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $codeproposition;

    /**
     * @var \AppBundle\Entity\Entreprises
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Entreprises")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="codeEntreprise", referencedColumnName="codeEntreprise")
     * })
     */
    private $codeentreprise;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Classes", inversedBy="codeproposition")
     * @ORM\JoinTable(name="associerclassespropositions",
     *   joinColumns={
     *     @ORM\JoinColumn(name="codeProposition", referencedColumnName="codeProposition")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="codeClasse", referencedColumnName="codeClasse")
     *   }
     * )
     */
    private $codeclasse;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Technologies", mappedBy="codeproposition")
     */
    private $codetechnololgie;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->codeclasse = new \Doctrine\Common\Collections\ArrayCollection();
        $this->codetechnololgie = new \Doctrine\Common\Collections\ArrayCollection();
    }

}

