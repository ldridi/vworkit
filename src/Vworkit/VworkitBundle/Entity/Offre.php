<?php

namespace Vworkit\VworkitBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Offre
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Vworkit\VworkitBundle\Repository\OffreRepository")
 */
class Offre {

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    
    /**
     * @ORM\ManyToOne(targetEntity="Vworkit\VworkitBundle\Entity\Projet", cascade={"persist"})
     * @ORM\JoinColumn(nullable=false,onDelete="CASCADE")
     */
    private $projet;
    
    /**
     * @ORM\ManyToOne(targetEntity="Utilisateur\UtilisateurBundle\Entity\Utilisateur", cascade={"persist"})
     * @ORM\JoinColumn(nullable=false,onDelete="CASCADE")
     */
    private $user;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_ajout_offre", type="date", nullable=true)
     */
    private $dateAjoutOffre;

    /**
     * @var string
     *
     * @ORM\Column(name="description_offre", type="text")
     */
    private $descriptionOffre;

    /**
     * @var string
     *
     * @ORM\Column(name="duree_offre", type="string", length=100)
     */
    private $dureeOffre;

    /**
     * @var string
     *
     * @ORM\Column(name="budget_offre", type="string", length=100)
     */
    private $budgetOffre;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set descriptionOffre
     *
     * @param string $descriptionOffre
     * @return Offre
     */
    public function setDescriptionOffre($descriptionOffre) {
        $this->descriptionOffre = $descriptionOffre;

        return $this;
    }

    /**
     * Get descriptionOffre
     *
     * @return string 
     */
    public function getDescriptionOffre() {
        return $this->descriptionOffre;
    }

    /**
     * Set budgetOffre
     *
     * @param string $budgetOffre
     * @return Offre
     */
    public function setBudgetOffre($budgetOffre) {
        $this->budgetOffre = $budgetOffre;

        return $this;
    }

    /**
     * Get budgetOffre
     *
     * @return string 
     */
    public function getBudgetOffre() {
        return $this->budgetOffre;
    }

    /**
     * Set dureeOffre
     *
     * @param string $dureeOffre
     * @return Offre
     */
    public function setDureeOffre($dureeOffre) {
        $this->dureeOffre = $dureeOffre;

        return $this;
    }

    /**
     * Get dureeOffre
     *
     * @return string 
     */
    public function getDureeOffre() {
        return $this->dureeOffre;
    }
    

    /**
     * Set projet
     *
     * @param \Vworkit\VworkitBundle\Entity\Projet $projet
     * @return Offre
     */
    public function setProjet(\Vworkit\VworkitBundle\Entity\Projet $projet)
    {
        $this->projet = $projet;
        //wooh ya zebi sara houa obj kkkkkkkk hhhhhhh mani 9otlik behi zabioura yeser
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

    

    /**
     * Set user
     *
     * @param \Utilisateur\UtilisateurBundle\Entity\Utilisateur $user
     * @return Offre
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
     * Set dateAjoutOffre
     *
     * @param \DateTime $dateAjoutOffre
     * @return Offre
     */
    public function setDateAjoutOffre($dateAjoutOffre)
    {
        $this->dateAjoutOffre = $dateAjoutOffre;
    
        return $this;
    }

    /**
     * Get dateAjoutOffre
     *
     * @return \DateTime 
     */
    public function getDateAjoutOffre()
    {
        return $this->dateAjoutOffre;
    }
}