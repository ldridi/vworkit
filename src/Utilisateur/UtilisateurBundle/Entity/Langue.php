<?php

namespace Utilisateur\UtilisateurBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Langue
 *
 * @ORM\Table("Langue")
 * @ORM\Entity(repositoryClass="Utilisateur\UtilisateurBundle\Repository\LangueRepository")
 */
class Langue
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
     * @ORM\ManyToOne(targetEntity="Utilisateur\UtilisateurBundle\Entity\Niveau", cascade={"persist"})
     * @ORM\joinColumn(nullable=false)
     */
    private $niveau;
    
    /**
     * @var string
     *
     * @ORM\Column(name="nom_langue", type="string", length=255)
     */
    private $nomLangue;
    
    
    
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
     * Set nomLangue
     *
     * @param string $nomLangue
     * @return Langue
     */
    public function setNomLangue($nomLangue)
    {
        $this->nomLangue = $nomLangue;
    
        return $this;
    }

    /**
     * Get nomLangue
     *
     * @return string 
     */
    public function getNomLangue()
    {
        return $this->nomLangue;
    }

    /**
     * Set user
     *
     * @param \Utilisateur\UtilisateurBundle\Entity\Utilisateur $user
     * @return Langue
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
     * @return Langue
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