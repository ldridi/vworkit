<?php

namespace Utilisateur\UtilisateurBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Recommandation
 *
 * @ORM\Table("Recommandation")
 * @ORM\Entity(repositoryClass="Utilisateur\UtilisateurBundle\Repository\RecommandationRepository")
 */
class Recommandation
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
     * @ORM\ManyToOne(targetEntity="Utilisateur\UtilisateurBundle\Entity\Utilisateur", cascade={"persist"})
     * @ORM\joinColumn(nullable=false,onDelete="CASCADE")
     */
    private $to;
    
    /**
     * @ORM\ManyToOne(targetEntity="Utilisateur\UtilisateurBundle\Entity\Classement", cascade={"persist"})
     * @ORM\joinColumn(nullable=false,onDelete="CASCADE")
     */
    private $rank;
    
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_ajout_recommandation", type="datetime")
     */
    private $dateAjoutRecommandation;
    
    /**
     * @var string
     *
     * @ORM\Column(name="description_recommandation", type="text")
     */
    private $descriptionRecommandation;
    

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
     * Set dateAjoutRecommandation
     *
     * @param \DateTime $dateAjoutRecommandation
     * @return Recommandation
     */
    public function setDateAjoutRecommandation($dateAjoutRecommandation)
    {
        $this->dateAjoutRecommandation = $dateAjoutRecommandation;
    
        return $this;
    }

    /**
     * Get dateAjoutRecommandation
     *
     * @return \DateTime 
     */
    public function getDateAjoutRecommandation()
    {
        return $this->dateAjoutRecommandation;
    }

    /**
     * Set user
     *
     * @param \Utilisateur\UtilisateurBundle\Entity\Utilisateur $user
     * @return Recommandation
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
     * Set rank
     *
     * @param \Utilisateur\UtilisateurBundle\Entity\Classement $rank
     * @return Recommandation
     */
    public function setRank(\Utilisateur\UtilisateurBundle\Entity\Classement $rank)
    {
        $this->rank = $rank;
    
        return $this;
    }

    /**
     * Get rank
     *
     * @return \Utilisateur\UtilisateurBundle\Entity\Classement 
     */
    public function getRank()
    {
        return $this->rank;
    }

    /**
     * Set descriptionRecommandation
     *
     * @param string $descriptionRecommandation
     * @return Recommandation
     */
    public function setDescriptionRecommandation($descriptionRecommandation)
    {
        $this->descriptionRecommandation = $descriptionRecommandation;
    
        return $this;
    }

    /**
     * Get descriptionRecommandation
     *
     * @return string 
     */
    public function getDescriptionRecommandation()
    {
        return $this->descriptionRecommandation;
    }

    /**
     * Set to
     *
     * @param \Utilisateur\UtilisateurBundle\Entity\Utilisateur $to
     * @return Recommandation
     */
    public function setTo(\Utilisateur\UtilisateurBundle\Entity\Utilisateur $to)
    {
        $this->to = $to;
    
        return $this;
    }

    /**
     * Get to
     *
     * @return \Utilisateur\UtilisateurBundle\Entity\Utilisateur 
     */
    public function getTo()
    {
        return $this->to;
    }
}