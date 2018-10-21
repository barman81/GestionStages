<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Contacts
 *
 * @ORM\Table(name="contacts")
 * @ORM\Entity
 */
class Contacts
{
    /**
     * @var string
     *
     * @ORM\Column(name="nomContact", type="string", length=30, nullable=false)
     */
    private $nomcontact;

    /**
     * @var string
     *
     * @ORM\Column(name="prenomContact", type="string", length=30, nullable=false)
     */
    private $prenomcontact;

    /**
     * @var string
     *
     * @ORM\Column(name="mailContact", type="string", length=30, nullable=false)
     */
    private $mailcontact;

    /**
     * @var string
     *
     * @ORM\Column(name="telContact", type="string", length=10, nullable=false)
     */
    private $telcontact;

    /**
     * @var integer
     *
     * @ORM\Column(name="codeContact", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $codecontact;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Entreprises", mappedBy="codecontact")
     */
    private $codeentreprise;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->codeentreprise = new \Doctrine\Common\Collections\ArrayCollection();
    }

}

