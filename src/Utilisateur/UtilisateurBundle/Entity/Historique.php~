<?php

namespace Utilisateur\UtilisateurBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Historique
 *
 * @ORM\Table("Historique")
 * @ORM\Entity(repositoryClass="Utilisateur\UtilisateurBundle\Repository\HistoriqueRepository")
 */
class Historique
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
    * @ORM\ManyToOne(targetEntity="Utilisateur\UtilisateurBundle\Entity\Utilisateur")
    * @ORM\joinColumn(nullable=false,onDelete="CASCADE")
    */
    private $user;
    
    /**
    * @ORM\ManyToOne(targetEntity="Vworkit\VworkitBundle\Entity\Projet")
    * @ORM\joinColumn(nullable=false,onDelete="CASCADE")
    */
    private $projet;
    
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_ajout_historique", type="date")
     */
    private $dateAjoutHistorique;


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
     * Set dateAjoutHistorique
     *
     * @param \DateTime $dateAjoutHistorique
     * @return Historique
     */
    public function setDateAjoutHistorique($dateAjoutHistorique)
    {
        $this->dateAjoutHistorique = $dateAjoutHistorique;
    
        return $this;
    }

    /**
     * Get dateAjoutHistorique
     *
     * @return \DateTime 
     */
    public function getDateAjoutHistorique()
    {
        return $this->dateAjoutHistorique;
    }

    /**
     * Set user
     *
     * @param \Utilisateur\UtilisateurBundle\Entity\Utilisateur $user
     * @return Historique
     */
    public function setUser(\Utilisateur\UtilisateurBundle\Entity\Utilisateur $user = null)
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
     * Set projet
     *
     * @param \Vworkit\VworkitBundle\Entity\Projet $projet
     * @return Historique
     */
    public function setProjet(\Vworkit\VworkitBundle\Entity\Projet $projet = null)
    {
        $this->projet = $projet;
    
        return $this;
    }

    /**
     * Get projet
     *
     * @return \Vworkit\VworkitBundle\Entity\Projet 
     */
    public function getProjet()
    {
        return $this->projet;
    }
}