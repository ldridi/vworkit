<?php

namespace Utilisateur\UtilisateurBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Litige
 *
 * @ORM\Table("Litige")
 * @ORM\Entity(repositoryClass="Utilisateur\UtilisateurBundle\Repository\LitigeRepository")
 */
class Litige
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
     * @ORM\ManyToOne(targetEntity="Utilisateur\UtilisateurBundle\Entity\Raison", cascade={"persist"})
     * @ORM\joinColumn(nullable=false)
     */
    private $raison;
    
    
    
    /**
     * @ORM\ManyToOne(targetEntity="Utilisateur\UtilisateurBundle\Entity\Utilisateur", cascade={"persist"})
     * @ORM\joinColumn(nullable=false)
     */
    private $from;
    
    /**
     * @var string
     *
     * @ORM\Column(name="description_litige", type="text",nullable=true)
     */
    private $descriptionLitige;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_ajout_litige", type="date")
     */
    private $dateAjoutLitige;


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
     * Set descriptionLitige
     *
     * @param string $descriptionLitige
     * @return Litige
     */
    public function setDescriptionLitige($descriptionLitige)
    {
        $this->descriptionLitige = $descriptionLitige;
    
        return $this;
    }

    /**
     * Get descriptionLitige
     *
     * @return string 
     */
    public function getDescriptionLitige()
    {
        return $this->descriptionLitige;
    }

    /**
     * Set dateAjoutLitige
     *
     * @param \DateTime $dateAjoutLitige
     * @return Litige
     */
    public function setDateAjoutLitige($dateAjoutLitige)
    {
        $this->dateAjoutLitige = $dateAjoutLitige;
    
        return $this;
    }

    /**
     * Get dateAjoutLitige
     *
     * @return \DateTime 
     */
    public function getDateAjoutLitige()
    {
        return $this->dateAjoutLitige;
    }

    /**
     * Set raison
     *
     * @param \Utilisateur\UtilisateurBundle\Entity\Raison $raison
     * @return Litige
     */
    public function setRaison(\Utilisateur\UtilisateurBundle\Entity\Raison $raison)
    {
        $this->raison = $raison;
    
        return $this;
    }

    /**
     * Get raison
     *
     * @return \Utilisateur\UtilisateurBundle\Entity\Raison 
     */
    public function getRaison()
    {
        return $this->raison;
    }

    /**
     * Set from
     *
     * @param \Utilisateur\UtilisateurBundle\Entity\Utilisateur $from
     * @return Litige
     */
    public function setFrom(\Utilisateur\UtilisateurBundle\Entity\Utilisateur $from)
    {
        $this->from = $from;
    
        return $this;
    }

    /**
     * Get from
     *
     * @return \Utilisateur\UtilisateurBundle\Entity\Utilisateur 
     */
    public function getFrom()
    {
        return $this->from;
    }
}