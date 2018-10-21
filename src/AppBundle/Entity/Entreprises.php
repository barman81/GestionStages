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


    /**
     * Set nomentreprise
     *
     * @param string $nomentreprise
     *
     * @return Entreprises
     */
    public function setNomentreprise($nomentreprise)
    {
        $this->nomentreprise = $nomentreprise;

        return $this;
    }

    /**
     * Get nomentreprise
     *
     * @return string
     */
    public function getNomentreprise()
    {
        return $this->nomentreprise;
    }

    /**
     * Set adresseentreprise
     *
     * @param string $adresseentreprise
     *
     * @return Entreprises
     */
    public function setAdresseentreprise($adresseentreprise)
    {
        $this->adresseentreprise = $adresseentreprise;

        return $this;
    }

    /**
     * Get adresseentreprise
     *
     * @return string
     */
    public function getAdresseentreprise()
    {
        return $this->adresseentreprise;
    }

    /**
     * Set villeentreprise
     *
     * @param string $villeentreprise
     *
     * @return Entreprises
     */
    public function setVilleentreprise($villeentreprise)
    {
        $this->villeentreprise = $villeentreprise;

        return $this;
    }

    /**
     * Get villeentreprise
     *
     * @return string
     */
    public function getVilleentreprise()
    {
        return $this->villeentreprise;
    }

    /**
     * Set codepostalentreprise
     *
     * @param integer $codepostalentreprise
     *
     * @return Entreprises
     */
    public function setCodepostalentreprise($codepostalentreprise)
    {
        $this->codepostalentreprise = $codepostalentreprise;

        return $this;
    }

    /**
     * Get codepostalentreprise
     *
     * @return integer
     */
    public function getCodepostalentreprise()
    {
        return $this->codepostalentreprise;
    }

    /**
     * Set telentreprise
     *
     * @param string $telentreprise
     *
     * @return Entreprises
     */
    public function setTelentreprise($telentreprise)
    {
        $this->telentreprise = $telentreprise;

        return $this;
    }

    /**
     * Get telentreprise
     *
     * @return string
     */
    public function getTelentreprise()
    {
        return $this->telentreprise;
    }

    /**
     * Get codeentreprise
     *
     * @return integer
     */
    public function getCodeentreprise()
    {
        return $this->codeentreprise;
    }

    /**
     * Add codecontact
     *
     * @param \AppBundle\Entity\Contacts $codecontact
     *
     * @return Entreprises
     */
    public function addCodecontact(\AppBundle\Entity\Contacts $codecontact)
    {
        $this->codecontact[] = $codecontact;

        return $this;
    }

    /**
     * Remove codecontact
     *
     * @param \AppBundle\Entity\Contacts $codecontact
     */
    public function removeCodecontact(\AppBundle\Entity\Contacts $codecontact)
    {
        $this->codecontact->removeElement($codecontact);
    }

    /**
     * Get codecontact
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCodecontact()
    {
        return $this->codecontact;
    }
}
