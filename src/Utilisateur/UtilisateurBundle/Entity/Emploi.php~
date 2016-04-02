<?php

namespace Utilisateur\UtilisateurBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Emploi
 *
 * @ORM\Table("Emploi")
 * @ORM\Entity(repositoryClass="Utilisateur\UtilisateurBundle\Repository\EmploiRepository")
 */
class Emploi
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
     * @var string
     *
     * @ORM\Column(name="nom_emploi", type="string", length=255)
     */
    private $nomEmploi;
    
    /**
     * @var string
     *
     * @ORM\Column(name="description_emploi", type="text")
     */
    private $descriptionEmploi;
    
    /**
     * @var string
     *
     * @ORM\Column(name="duree_emploi", type="string", length=255)
     */
    private $dureeEmploi;

    /**
     * @var string
     *
     * @ORM\Column(name="societe_emploi", type="string", length=255)
     */
    private $societeEmploi;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_ajout_emploi", type="date")
     */
    private $dateAjoutEmploi;


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
     * Set nomEmploi
     *
     * @param string $nomEmploi
     * @return Emploi
     */
    public function setNomEmploi($nomEmploi)
    {
        $this->nomEmploi = $nomEmploi;
    
        return $this;
    }

    /**
     * Get nomEmploi
     *
     * @return string 
     */
    public function getNomEmploi()
    {
        return $this->nomEmploi;
    }

    /**
     * Set dureeEmploi
     *
     * @param string $dureeEmploi
     * @return Emploi
     */
    public function setDureeEmploi($dureeEmploi)
    {
        $this->dureeEmploi = $dureeEmploi;
    
        return $this;
    }

    /**
     * Get dureeEmploi
     *
     * @return string 
     */
    public function getDureeEmploi()
    {
        return $this->dureeEmploi;
    }

    /**
     * Set societeEmploi
     *
     * @param string $societeEmploi
     * @return Emploi
     */
    public function setSocieteEmploi($societeEmploi)
    {
        $this->societeEmploi = $societeEmploi;
    
        return $this;
    }

    /**
     * Get societeEmploi
     *
     * @return string 
     */
    public function getSocieteEmploi()
    {
        return $this->societeEmploi;
    }

    /**
     * Set dateAjoutEmploi
     *
     * @param \DateTime $dateAjoutEmploi
     * @return Emploi
     */
    public function setDateAjoutEmploi($dateAjoutEmploi)
    {
        $this->dateAjoutEmploi = $dateAjoutEmploi;
    
        return $this;
    }

    /**
     * Get dateAjoutEmploi
     *
     * @return \DateTime 
     */
    public function getDateAjoutEmploi()
    {
        return $this->dateAjoutEmploi;
    }

    /**
     * Set user
     *
     * @param \Utilisateur\UtilisateurBundle\Entity\Utilisateur $user
     * @return Emploi
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
     * Set descriptionEmploi
     *
     * @param string $descriptionEmploi
     * @return Emploi
     */
    public function setDescriptionEmploi($descriptionEmploi)
    {
        $this->descriptionEmploi = $descriptionEmploi;
    
        return $this;
    }

    /**
     * Get descriptionEmploi
     *
     * @return string 
     */
    public function getDescriptionEmploi()
    {
        return $this->descriptionEmploi;
    }
}