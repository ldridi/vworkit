<?php

namespace Vworkit\VworkitBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CommentaireTache
 *
 * @ORM\Table("CommentaireTache")
 * @ORM\Entity(repositoryClass="Vworkit\VworkitBundle\Repository\CommentaireTacheRepository")
 */
class CommentaireTache
{
    
    public function __construct(){
        $this->setDateAjoutCommentaireTache(new \datetime());   
    }
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
     * @ORM\Column(name="texte_commentaire_tache", type="text")
     */
    private $texteCommentaireTache;
    
    /**
     * @ORM\ManyToOne(targetEntity="Vworkit\VworkitBundle\Entity\Tache", cascade={"persist"})
     * @ORM\joinColumn(nullable=false,onDelete="CASCADE")
     */
    private $tache;
    
    /**
     * @ORM\ManyToOne(targetEntity="Utilisateur\UtilisateurBundle\Entity\Utilisateur", cascade={"persist"})
     * @ORM\joinColumn(nullable=false,onDelete="CASCADE")
     */
    private $user;
    
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_ajout_commentaire_tache", type="datetime", nullable=true)
     */
    private $dateAjoutCommentaireTache;
    
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
     * Set texteCommentaireTache
     *
     * @param string $texteCommentaireTache
     * @return CommentaireTache
     */
    public function setTexteCommentaireTache($texteCommentaireTache)
    {
        $this->texteCommentaireTache = $texteCommentaireTache;
    
        return $this;
    }

    /**
     * Get texteCommentaireTache
     *
     * @return string 
     */
    public function getTexteCommentaireTache()
    {
        return $this->texteCommentaireTache;
    }

    /**
     * Set tache
     *
     * @param \Vworkit\VworkitBundle\Entity\Tache $tache
     * @return CommentaireTache
     */
    public function setTache(\Vworkit\VworkitBundle\Entity\Tache $tache)
    {
        $this->tache = $tache;
    
        return $this;
    }

    /**
     * Get tache
     *
     * @return \Vworkit\VworkitBundle\Entity\Tache 
     */
    public function getTache()
    {
        return $this->tache;
    }

    /**
     * Set user
     *
     * @param \Utilisateur\UtilisateurBundle\Entity\Utilisateur $user
     * @return CommentaireTache
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
     * Set dateAjoutCommentaireTache
     *
     * @param \DateTime $dateAjoutCommentaireTache
     * @return CommentaireTache
     */
    public function setDateAjoutCommentaireTache($dateAjoutCommentaireTache)
    {
        $this->dateAjoutCommentaireTache = $dateAjoutCommentaireTache;
    
        return $this;
    }

    /**
     * Get dateAjoutCommentaireTache
     *
     * @return \DateTime 
     */
    public function getDateAjoutCommentaireTache()
    {
        return $this->dateAjoutCommentaireTache;
    }
}