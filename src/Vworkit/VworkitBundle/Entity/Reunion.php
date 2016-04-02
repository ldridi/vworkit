<?php

namespace Vworkit\VworkitBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Reunion
 *
 * @ORM\Table("Reunion")
 * @ORM\Entity(repositoryClass="Vworkit\VworkitBundle\Repository\ReunionRepository")
 */
class Reunion
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
     * @ORM\Column(name="nom_reunion", type="string", length=255)
     */
    private $nomReunion;
    
    /**
     * @ORM\ManyToOne(targetEntity="Utilisateur\UtilisateurBundle\Entity\Utilisateur", cascade={"persist"})
     * @ORM\JoinColumn(nullable=false,onDelete="CASCADE")
     */
    private $porteur;
    
    /**
     * @ORM\ManyToOne(targetEntity="Utilisateur\UtilisateurBundle\Entity\Utilisateur", cascade={"persist"})
     * @ORM\JoinColumn(nullable=false,onDelete="CASCADE")
     */
    private $prestataire;
    
    /**
     * @ORM\ManyToOne(targetEntity="Vworkit\VworkitBundle\Entity\Offre", cascade={"persist"})
     * @ORM\JoinColumn(nullable=false,onDelete="CASCADE")
     */
    private $offre;
    
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_ajout_reunion", type="datetime")
     */
    private $dateAjoutReunion;


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
     * Set dateAjoutReunion
     *
     * @param \DateTime $dateAjoutReunion
     * @return Reunion
     */
    public function setDateAjoutReunion($dateAjoutReunion)
    {
        $this->dateAjoutReunion = $dateAjoutReunion;
    
        return $this;
    }

    /**
     * Get dateAjoutReunion
     *
     * @return \DateTime 
     */
    public function getDateAjoutReunion()
    {
        return $this->dateAjoutReunion;
    }

    /**
     * Set porteur
     *
     * @param \Utilisateur\UtilisateurBundle\Entity\Utilisateur $porteur
     * @return Reunion
     */
    public function setPorteur(\Utilisateur\UtilisateurBundle\Entity\Utilisateur $porteur)
    {
        $this->porteur = $porteur;
    
        return $this;
    }

    /**
     * Get porteur
     *
     * @return \Utilisateur\UtilisateurBundle\Entity\Utilisateur 
     */
    public function getPorteur()
    {
        return $this->porteur;
    }

    /**
     * Set prestataire
     *
     * @param \Utilisateur\UtilisateurBundle\Entity\Utilisateur $prestataire
     * @return Reunion
     */
    public function setPrestataire(\Utilisateur\UtilisateurBundle\Entity\Utilisateur $prestataire)
    {
        $this->prestataire = $prestataire;
    
        return $this;
    }

    /**
     * Get prestataire
     *
     * @return \Utilisateur\UtilisateurBundle\Entity\Utilisateur 
     */
    public function getPrestataire()
    {
        return $this->prestataire;
    }

    /**
     * Set offre
     *
     * @param \Vworkit\VworkitBundle\Entity\Offre $offre
     * @return Reunion
     */
    public function setOffre(\Vworkit\VworkitBundle\Entity\Offre $offre)
    {
        $this->offre = $offre;
    
        return $this;
    }

    /**
     * Get offre
     *
     * @return \Vworkit\VworkitBundle\Entity\Offre 
     */
    public function getOffre()
    {
        return $this->offre;
    }
    
    
    

    /**
     * Set nomReunion
     *
     * @param string $nomReunion
     * @return Reunion
     */
    public function setNomReunion($nomReunion)
    {
        $this->nomReunion = $nomReunion;
    
        return $this;
    }

    /**
     * Get nomReunion
     *
     * @return string 
     */
    public function getNomReunion()
    {
        return $this->nomReunion;
    }
    
    public function __toString() {
        return $this->getNomReunion();
    }
}