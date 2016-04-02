<?php

namespace Utilisateur\UtilisateurBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Education
 *
 * @ORM\Table("Education")
 * @ORM\Entity(repositoryClass="Utilisateur\UtilisateurBundle\Repository\EducationRepository")
 */
class Education
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
     * @ORM\Column(name="titre_education", type="string", length=255)
     */
    private $titreEducation;

    /**
     * @var string
     *
     * @ORM\Column(name="institut_education", type="string", length=255)
     */
    private $institutEducation;
    
    /**
     * @var string
     *
     * @ORM\Column(name="description_education", type="text")
     */
    private $descriptionEducation;
    
    /**
     * @var string
     *
     * @ORM\Column(name="date_fin_education", type="string", length=255)
     */
    private $dateFinEducation;


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
     * Set titreEducation
     *
     * @param string $titreEducation
     * @return Education
     */
    public function setTitreEducation($titreEducation)
    {
        $this->titreEducation = $titreEducation;
    
        return $this;
    }

    /**
     * Get titreEducation
     *
     * @return string 
     */
    public function getTitreEducation()
    {
        return $this->titreEducation;
    }

    /**
     * Set institutEducation
     *
     * @param string $institutEducation
     * @return Education
     */
    public function setInstitutEducation($institutEducation)
    {
        $this->institutEducation = $institutEducation;
    
        return $this;
    }

    /**
     * Get institutEducation
     *
     * @return string 
     */
    public function getInstitutEducation()
    {
        return $this->institutEducation;
    }

    /**
     * Set dateFinEducation
     *
     * @param string $dateFinEducation
     * @return Education
     */
    public function setDateFinEducation($dateFinEducation)
    {
        $this->dateFinEducation = $dateFinEducation;
    
        return $this;
    }

    /**
     * Get dateFinEducation
     *
     * @return string 
     */
    public function getDateFinEducation()
    {
        return $this->dateFinEducation;
    }

    

    

    /**
     * Set user
     *
     * @param \Utilisateur\UtilisateurBundle\Entity\Utilisateur $user
     * @return Education
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
     * Set descriptionEducation
     *
     * @param string $descriptionEducation
     * @return Education
     */
    public function setDescriptionEducation($descriptionEducation)
    {
        $this->descriptionEducation = $descriptionEducation;
    
        return $this;
    }

    /**
     * Get descriptionEducation
     *
     * @return string 
     */
    public function getDescriptionEducation()
    {
        return $this->descriptionEducation;
    }
}