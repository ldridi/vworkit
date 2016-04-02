<?php

namespace Vworkit\VworkitBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Support
 *
 * @ORM\Table("Support")
 * @ORM\Entity(repositoryClass="Vworkit\VworkitBundle\Repository\SupportRepository")
 */
class Support
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="titre_support", type="string", length=255)
     */
    private $titreSupport;

    /**
     * @var string
     *
     * @ORM\Column(name="texte_support", type="text")
     */
    private $texteSupport;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_ajout_support", type="datetime")
     */
    private $dateAjoutSupport;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set titreSupport
     *
     * @param string $titreSupport
     * @return Support
     */
    public function setTitreSupport($titreSupport)
    {
        $this->titreSupport = $titreSupport;
    
        return $this;
    }

    /**
     * Get titreSupport
     *
     * @return string 
     */
    public function getTitreSupport()
    {
        return $this->titreSupport;
    }

    /**
     * Set texteSupport
     *
     * @param string $texteSupport
     * @return Support
     */
    public function setTexteSupport($texteSupport)
    {
        $this->texteSupport = $texteSupport;
    
        return $this;
    }

    /**
     * Get texteSupport
     *
     * @return string 
     */
    public function getTexteSupport()
    {
        return $this->texteSupport;
    }

    /**
     * Set dateAjoutSupport
     *
     * @param \DateTime $dateAjoutSupport
     * @return Support
     */
    public function setDateAjoutSupport($dateAjoutSupport)
    {
        $this->dateAjoutSupport = $dateAjoutSupport;
    
        return $this;
    }

    /**
     * Get dateAjoutSupport
     *
     * @return \DateTime 
     */
    public function getDateAjoutSupport()
    {
        return $this->dateAjoutSupport;
    }
}
