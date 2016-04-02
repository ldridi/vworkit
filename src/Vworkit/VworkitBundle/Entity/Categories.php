<?php

namespace Vworkit\VworkitBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Categories
 *
 * @ORM\Table("categories")
 * @ORM\Entity(repositoryClass="Vworkit\VworkitBundle\Repository\CategoriesRepository")
 */
class Categories {

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    
    /**
     * @ORM\OneToOne(targetEntity="Utilisateur\UtilisateurBundle\Entity\Media", cascade={"persist","remove"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $image;
    
    /**
     * @var string
     *
     * @ORM\Column(name="description_categorie", type="text")
     */
    private $descriptionCategories;
    
    /**
     * @var string
     *
     * @ORM\Column(name="role_categories", type="string", length=100)
     */
    private $roleCategories;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_categories", type="string", length=100)
     */
    private $nomCategories;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_ajout_categories", type="date")
     */
    private $dateAjoutCategories;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set nomCategories
     *
     * @param string $nomCategories
     * @return Categories
     */
    public function setNomCategories($nomCategories) {
        $this->nomCategories = $nomCategories;

        return $this;
    }

    /**
     * Get nomCategories
     *
     * @return string 
     */
    public function getNomCategories() {
        return $this->nomCategories;
    }

    /**
     * Set dateAjoutCategories
     *
     * @param \DateTime $dateAjoutCategories
     * @return Categories
     */
    public function setDateAjoutCategories($dateAjoutCategories) {
        $this->dateAjoutCategories = $dateAjoutCategories;

        return $this;
    }

    /**
     * Get dateAjoutCategories
     *
     * @return \DateTime 
     */
    public function getDateAjoutCategories() {
        return $this->dateAjoutCategories;
    }

    public function __toString() {
        return $this->getNomCategories();
    }


    /**
     * Set roleCategories
     *
     * @param string $roleCategories
     * @return Categories
     */
    public function setRoleCategories($roleCategories)
    {
        $this->roleCategories = $roleCategories;
    
        return $this;
    }

    /**
     * Get roleCategories
     *
     * @return string 
     */
    public function getRoleCategories()
    {
        return $this->roleCategories;
    }

    

   

    /**
     * Set descriptionCategories
     *
     * @param string $descriptionCategories
     * @return Categories
     */
    public function setDescriptionCategories($descriptionCategories)
    {
        $this->descriptionCategories = $descriptionCategories;
    
        return $this;
    }

    /**
     * Get descriptionCategories
     *
     * @return string 
     */
    public function getDescriptionCategories()
    {
        return $this->descriptionCategories;
    }



    /**
     * Set image
     *
     * @param \Utilisateur\UtilisateurBundle\Entity\Media $image
     * @return Categories
     */
    public function setImage(\Utilisateur\UtilisateurBundle\Entity\Media $image = null)
    {
        $this->image = $image;
    
        return $this;
    }

    /**
     * Get image
     *
     * @return \Utilisateur\UtilisateurBundle\Entity\Media 
     */
    public function getImage()
    {
        return $this->image;
    }
}