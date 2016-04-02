<?php

namespace Vworkit\VworkitBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Projet
 *
 * @ORM\Table("projet")
 * @ORM\Entity(repositoryClass="Vworkit\VworkitBundle\Repository\ProjetRepository")
 */
class Projet {

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
     * @ORM\ManyToOne(targetEntity="Vworkit\VworkitBundle\Entity\Etat", cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $etat;
    
    /**
     * @ORM\ManyToOne(targetEntity="Utilisateur\UtilisateurBundle\Entity\Devise", cascade={"persist"})
     * @ORM\joinColumn(nullable=false)
     */
    private $devise;
    
    /**
     * @ORM\ManyToOne(targetEntity="Vworkit\VworkitBundle\Entity\Budget", cascade={"persist"})
     * @ORM\joinColumn(nullable=false)
     */
    private $budget;
    
    /**
     * @ORM\ManyToOne(targetEntity="Vworkit\VworkitBundle\Entity\Categories", cascade={"persist"})
     * @ORM\joinColumn(nullable=true,onDelete="CASCADE")
     */
    private $categorie;
    
    /**
     * @ORM\ManyToMany(targetEntity="Vworkit\VworkitBundle\Entity\Competence", cascade={"persist"})
     */
    private $competence;
    
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_ajout_projet", type="date", nullable=true)
     */
    private $dateAjoutProjet;

    /**
     * @var string
     *
     * @ORM\Column(name="titre_projet", type="string", length=100)
     * @Assert\NotBlank()
     */
    private $titreProjet;

    /**
     * @var string
     *
     * @ORM\Column(name="objectif_projet", type="text")
     */
    private $objectifProjet;

    /**
     * @var string
     *
     * @ORM\Column(name="description_projet", type="text")
     */
    private $descriptionProjet;
    
    
    
    /**
     * Get id
     *
     * @return integer 
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set titreProjet
     *
     * @param string $titreProjet
     * @return Projet
     */
    public function setTitreProjet($titreProjet) {
        $this->titreProjet = $titreProjet;

        return $this;
    }

    /**
     * Get titreProjet
     *
     * @return string 
     */
    public function getTitreProjet() {
        return $this->titreProjet;
    }

    /**
     * Set descriptionProjet
     *
     * @param string $descriptionProjet
     * @return Projet
     */
    public function setDescriptionProjet($descriptionProjet) {
        $this->descriptionProjet = $descriptionProjet;

        return $this;
    }

    /**
     * Get descriptionProjet
     *
     * @return string 
     */
    public function getDescriptionProjet() {
        return $this->descriptionProjet;
    }

    /**
     * Set cahierProjet
     *
     * @param string $cahierProjet
     * @return Projet
     */
    public function setCahierProjet($cahierProjet) {
        $this->cahierProjet = $cahierProjet;

        return $this;
    }

    /**
     * Get cahierProjet
     *
     * @return string 
     */
    public function getCahierProjet() {
        return $this->cahierProjet;
    }

    /**
     * Set dateAjoutProjet
     *
     * @param \DateTime $dateAjoutProjet
     * @return Projet
     */
    public function setDateAjoutProjet($dateAjoutProjet) {
        $this->dateAjoutProjet = $dateAjoutProjet;

        return $this;
    }

    /**
     * Get dateAjoutProjet
     *
     * @return \DateTime 
     */
    public function getDateAjoutProjet() {
        return $this->dateAjoutProjet;
    }

    /**
     * Set categorie
     *
     * @param \Vworkit\VworkitBundle\Entity\Categories $categorie
     * @return Projet
     */
    public function setCategorie(\Vworkit\VworkitBundle\Entity\Categories $categorie) {
        $this->categorie = $categorie;

        return $this;
    }

    /**
     * Get categorie
     *
     * @return \Vworkit\VworkitBundle\Entity\Categories 
     */
    public function getCategorie() {
        return $this->categorie;
    }

    /**
     * Set budget
     *
     * @param \Vworkit\VworkitBundle\Entity\Budget $budget
     * @return Projet
     */
    public function setBudget(\Vworkit\VworkitBundle\Entity\Budget $budget) {
        $this->budget = $budget;

        return $this;
    }

    /**
     * Get budget
     *
     * @return \Vworkit\VworkitBundle\Entity\Budget 
     */
    public function getBudget() {
        return $this->budget;
    }
    


    /**
     * Set user
     *
     * @param \Utilisateur\UtilisateurBundle\Entity\Utilisateur $user
     * @return Projet
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
    
    public function __toString() {
        return $this->getTitreProjet();
    }

    /**
     * Set objectifProjet
     *
     * @param string $objectifProjet
     * @return Projet
     */
    public function setObjectifProjet($objectifProjet)
    {
        $this->objectifProjet = $objectifProjet;
    
        return $this;
    }

    /**
     * Get objectifProjet
     *
     * @return string 
     */
    public function getObjectifProjet()
    {
        return $this->objectifProjet;
    }

    /**
     * Set etat
     *
     * @param \Vworkit\VworkitBundle\Entity\Etat $etat
     * @return Projet
     */
    public function setEtat(\Vworkit\VworkitBundle\Entity\Etat $etat)
    {
        $this->etat = $etat;
    
        return $this;
    }

    /**
     * Get etat
     *
     * @return \Vworkit\VworkitBundle\Entity\Etat 
     */
    public function getEtat()
    {
        return $this->etat;
    }

    /**
     * @ORM\PrePersist
     */
    public function setCreatedValue()
    {
        $this->dateAjoutProjet = new \DateTime();
    }
    

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->competence = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Add competence
     *
     * @param \Vworkit\VworkitBundle\Entity\Competence $competence
     * @return Projet
     */
    public function addCompetence(\Vworkit\VworkitBundle\Entity\Competence $competence)
    {
        $this->competence[] = $competence;
    
        return $this;
    }

    /**
     * Remove competence
     *
     * @param \Vworkit\VworkitBundle\Entity\Competence $competence
     */
    public function removeCompetence(\Vworkit\VworkitBundle\Entity\Competence $competence)
    {
        $this->competence->removeElement($competence);
    }

    /**
     * Get competence
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCompetence()
    {
        return $this->competence;
    }

    /**
     * Set devise
     *
     * @param \Utilisateur\UtilisateurBundle\Entity\Devise $devise
     * @return Projet
     */
    public function setDevise(\Utilisateur\UtilisateurBundle\Entity\Devise $devise)
    {
        $this->devise = $devise;
    
        return $this;
    }

    /**
     * Get devise
     *
     * @return \Utilisateur\UtilisateurBundle\Entity\Devise 
     */
    public function getDevise()
    {
        return $this->devise;
    }
}