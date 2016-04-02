<?php

namespace Utilisateur\UtilisateurBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Reponse
 *
 * @ORM\Table("Reponse")
 * @ORM\Entity(repositoryClass="Utilisateur\UtilisateurBundle\Repository\ReponseRepository")
 */
class Reponse
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
     * @ORM\ManyToOne(targetEntity="Utilisateur\UtilisateurBundle\Entity\Message", cascade={"persist"})
     * @ORM\joinColumn(nullable=false,onDelete="CASCADE")
     */
    private $message;
    
    /**
     * @var string
     *
     * @ORM\Column(name="texte_reponse", type="text")
     */
    private $texteReponse;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_ajout_reponse", type="datetime")
     */
    private $dateAjoutReponse;


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
     * Set texteReponse
     *
     * @param string $texteReponse
     * @return Reponse
     */
    public function setTexteReponse($texteReponse)
    {
        $this->texteReponse = $texteReponse;
    
        return $this;
    }

    /**
     * Get texteReponse
     *
     * @return string 
     */
    public function getTexteReponse()
    {
        return $this->texteReponse;
    }

    /**
     * Set dateAjoutReponse
     *
     * @param \DateTime $dateAjoutReponse
     * @return Reponse
     */
    public function setDateAjoutReponse($dateAjoutReponse)
    {
        $this->dateAjoutReponse = $dateAjoutReponse;
    
        return $this;
    }

    /**
     * Get dateAjoutReponse
     *
     * @return \DateTime 
     */
    public function getDateAjoutReponse()
    {
        return $this->dateAjoutReponse;
    }

    /**
     * Set user
     *
     * @param \Utilisateur\UtilisateurBundle\Entity\Utilisateur $user
     * @return Reponse
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
     * Set message
     *
     * @param \Utilisateur\UtilisateurBundle\Entity\Message $message
     * @return Reponse
     */
    public function setMessage(\Utilisateur\UtilisateurBundle\Entity\Message $message)
    {
        $this->message = $message;
    
        return $this;
    }

    /**
     * Get message
     *
     * @return \Utilisateur\UtilisateurBundle\Entity\Message 
     */
    public function getMessage()
    {
        return $this->message;
    }
}