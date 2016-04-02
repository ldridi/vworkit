<?php

namespace Utilisateur\UtilisateurBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Portfolio
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Utilisateur\UtilisateurBundle\Repository\PortfolioRepository")
 */
class Portfolio
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
     * @ORM\ManyToOne(targetEntity="Utilisateur\UtilisateurBundle\Entity\Utilisateur", cascade={"persist"})
     * @ORM\joinColumn(nullable=false,onDelete="CASCADE")
     */
    private $user;
    
    /**
     * @ORM\OneToOne(targetEntity="Utilisateur\UtilisateurBundle\Entity\Media", cascade={"persist","remove"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $image;
    
    /**
     * @var string
     *
     * @ORM\Column(name="titre_portfolio", type="string", length=100)
     */
    private $titrePortfolio;

    

    /**
     * @var string
     *
     * @ORM\Column(name="description_portfolio", type="text")
     */
    private $descriptionPortfolio;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_ajout_portfolio", type="date", nullable=true)
     */
    private $dateAjoutPortfolio;


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
     * Set titrePortfolio
     *
     * @param string $titrePortfolio
     * @return Portfolio
     */
    public function setTitrePortfolio($titrePortfolio)
    {
        $this->titrePortfolio = $titrePortfolio;
    
        return $this;
    }

    /**
     * Get titrePortfolio
     *
     * @return string 
     */
    public function getTitrePortfolio()
    {
        return $this->titrePortfolio;
    }

    

    /**
     * Set descriptionPortfolio
     *
     * @param string $descriptionPortfolio
     * @return Portfolio
     */
    public function setDescriptionPortfolio($descriptionPortfolio)
    {
        $this->descriptionPortfolio = $descriptionPortfolio;
    
        return $this;
    }

    /**
     * Get descriptionPortfolio
     *
     * @return string 
     */
    public function getDescriptionPortfolio()
    {
        return $this->descriptionPortfolio;
    }

    /**
     * Set dateAjoutPortfolio
     *
     * @param \DateTime $dateAjoutPortfolio
     * @return Portfolio
     */
    public function setDateAjoutPortfolio($dateAjoutPortfolio)
    {
        $this->dateAjoutPortfolio = $dateAjoutPortfolio;
    
        return $this;
    }

    /**
     * Get dateAjoutPortfolio
     *
     * @return \DateTime 
     */
    public function getDateAjoutPortfolio()
    {
        return $this->dateAjoutPortfolio;
    }

    /**
     * Set user
     *
     * @param \Utilisateur\UtilisateurBundle\Entity\Utilisateur $user
     * @return Portfolio
     */
    public function setUser(\Utilisateur\UtilisateurBundle\Entity\Utilisateur $user)
    {
        $this->user = $user;
    
        return $this;
    }

    /**
     * Get user
     *
     * @return \Utilisateur\UtilisateurBundle\Entity\Utilisateur 
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @ORM\PrePersist
     */
    public function setCreatedValue()
    {
        $this->dateAjoutOffre = new \DateTime();
    }

    /**
     * Set image
     *
     * @param \Utilisateur\UtilisateurBundle\Entity\Media $image
     * @return Portfolio
     */
    public function setImage(\Utilisateur\UtilisateurBundle\Entity\Media $image = null)
    {
        $this->image = $image;
    
        return $this;
    }

    /**
     * Get image
     *
     * @return \Utilisateur\UtilisateurBundle\Entity\Media 
     */
    public function getImage()
    {
        return $this->image;
    }
}