<?php

namespace Utilisateur\UtilisateurBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Plaisir
 *
 * @ORM\Table("Plaisir")
 * @ORM\Entity(repositoryClass="Utilisateur\UtilisateurBundle\Repository\PlaisirRepository")
 */
class Plaisir
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
     * @ORM\Column(name="nom_plaisir", type="string", length=255)
     */
    private $nomPlaisir;

    /**
     * @ORM\ManyToOne(targetEntity="Utilisateur\UtilisateurBundle\Entity\Niveau", cascade={"persist"})
     * @ORM\joinColumn(nullable=false)
     */
    private $niveau;


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
     * Set nomPlaisir
     *
     * @param string $nomPlaisir
     * @return Plaisir
     */
    public function setNomPlaisir($nomPlaisir)
    {
        $this->nomPlaisir = $nomPlaisir;
    
        return $this;
    }

    /**
     * Get nomPlaisir
     *
     * @return string 
     */
    public function getNomPlaisir()
    {
        return $this->nomPlaisir;
    }

    /**
     * Set descriptionPlaisir
     *
     * @param string $descriptionPlaisir
     * @return Plaisir
     */
    public function setDescriptionPlaisir($descriptionPlaisir)
    {
        $this->descriptionPlaisir = $descriptionPlaisir;
    
        return $this;
    }

    /**
     * Get descriptionPlaisir
     *
     * @return string 
     */
    public function getDescriptionPlaisir()
    {
        return $this->descriptionPlaisir;
    }

    /**
     * Set user
     *
     * @param \Utilisateur\UtilisateurBundle\Entity\Utilisateur $user
     * @return Plaisir
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
     * Set niveau
     *
     * @param \Utilisateur\UtilisateurBundle\Entity\Niveau $niveau
     * @return Plaisir
     */
    public function setNiveau(\Utilisateur\UtilisateurBundle\Entity\Niveau $niveau)
    {
        $this->niveau = $niveau;
    
        return $this;
    }

    /**
     * Get niveau
     *
     * @return \Utilisateur\UtilisateurBundle\Entity\Niveau 
     */
    public function getNiveau()
    {
        return $this->niveau;
    }
}