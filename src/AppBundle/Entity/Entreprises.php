<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Entreprises
 *
 * @ORM\Table(name="entreprises")
 * @ORM\Entity
 */
class Entreprises
{
    /**
     * @var string
     *
     * @ORM\Column(name="nomEntreprise", type="string", length=30, nullable=false)
     */
    private $nomentreprise;

    /**
     * @var string
     *
     * @ORM\Column(name="adresseEntreprise", type="string", length=60, nullable=false)
     */
    private $adresseentreprise;

    /**
     * @var string
     *
     * @ORM\Column(name="villeEntreprise", type="string", length=30, nullable=false)
     */
    private $villeentreprise;

    /**
     * @var integer
     *
     * @ORM\Column(name="codePostalEntreprise", type="integer", nullable=false)
     */
    private $codepostalentreprise;

    /**
     * @var string
     *
     * @ORM\Column(name="telEntreprise", type="string", length=10, nullable=false)
     */
    private $telentreprise;

    /**
     * @var integer
     *
     * @ORM\Column(name="codeEntreprise", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $codeentreprise;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Contacts", inversedBy="codeentreprise")
     * @ORM\JoinTable(name="associerentreprisescontact",
     *   joinColumns={
     *     @ORM\JoinColumn(name="codeEntreprise", referencedColumnName="codeEntreprise")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="codeContact", referencedColumnName="codeContact")
     *   }
     * )
     */
    private $codecontact;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->codecontact = new \Doctrine\Common\Collections\ArrayCollection();
    }

}

