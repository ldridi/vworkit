<?php

namespace Utilisateur\UtilisateurBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Message
 *
 * @ORM\Table("Message")
 * @ORM\Entity(repositoryClass="Utilisateur\UtilisateurBundle\Repository\MessageRepository")
 */
class Message
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
    private $from;
    
    /**
     * @ORM\ManyToOne(targetEntity="Utilisateur\UtilisateurBundle\Entity\Utilisateur", cascade={"persist"})
     * @ORM\joinColumn(nullable=false,onDelete="CASCADE")
     */
    private $to;
    
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_ajout_message", type="datetime")
     */
    private $dateAjoutMessage;

    /**
     * @var string
     *
     * @ORM\Column(name="texte_message", type="text")
     */
    private $texteMessage;
    
    /**
     * @var string
     *
     * @ORM\Column(name="active_message", type="string", length=255,nullable=true)
     */
    private $active;
    

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
     * Set dateAjoutMessage
     *
     * @param \DateTime $dateAjoutMessage
     * @return Message
     */
    public function setDateAjoutMessage($dateAjoutMessage)
    {
        $this->dateAjoutMessage = $dateAjoutMessage;
    
        return $this;
    }

    /**
     * Get dateAjoutMessage
     *
     * @return \DateTime 
     */
    public function getDateAjoutMessage()
    {
        return $this->dateAjoutMessage;
    }

    /**
     * Set texteMessage
     *
     * @param string $texteMessage
     * @return Message
     */
    public function setTexteMessage($texteMessage)
    {
        $this->texteMessage = $texteMessage;
    
        return $this;
    }

    /**
     * Get texteMessage
     *
     * @return string 
     */
    public function getTexteMessage()
    {
        return $this->texteMessage;
    }

    /**
     * Set from
     *
     * @param \Utilisateur\UtilisateurBundle\Entity\Utilisateur $from
     * @return Message
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

    /**
     * Set to
     *
     * @param \Utilisateur\UtilisateurBundle\Entity\Utilisateur $to
     * @return Message
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

    /**
     * Set active
     *
     * @param string $active
     * @return Message
     */
    public function setActive($active)
    {
        $this->active = $active;
    
        return $this;
    }

    /**
     * Get active
     *
     * @return string 
     */
    public function getActive()
    {
        return $this->active;
    }
    
    public function __toString() {
        return $this->getTexteMessage();
    }
}