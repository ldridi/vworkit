<?php

namespace Utilisateur\UtilisateurBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Certificat
 *
 * @ORM\Table("Certificat")
 * @ORM\Entity(repositoryClass="Utilisateur\UtilisateurBundle\Repository\CertificatRepository")
 */
class Certificat
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
     * @ORM\Column(name="nom_certificat", type="string", length=255)
     */
    private $nomCertificat;

    /**
     * @var string
     *
     * @ORM\Column(name="site_certificat", type="string", length=255)
     */
    private $siteCertificat;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_certificat", type="date")
     */
    private $dateCertificat;

    /**
     * @var string
     *
     * @ORM\Column(name="description_certificat", type="text")
     */
    private $descriptionCertificat;

    /**
     * @var string
     *
     * @ORM\Column(name="link_certificat", type="string", length=255)
     */
    private $linkCertificat;


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
     * Set nomCertificat
     *
     * @param string $nomCertificat
     * @return Certificat
     */
    public function setNomCertificat($nomCertificat)
    {
        $this->nomCertificat = $nomCertificat;
    
        return $this;
    }

    /**
     * Get nomCertificat
     *
     * @return string 
     */
    public function getNomCertificat()
    {
        return $this->nomCertificat;
    }

    /**
     * Set siteCertificat
     *
     * @param string $siteCertificat
     * @return Certificat
     */
    public function setSiteCertificat($siteCertificat)
    {
        $this->siteCertificat = $siteCertificat;
    
        return $this;
    }

    /**
     * Get siteCertificat
     *
     * @return string 
     */
    public function getSiteCertificat()
    {
        return $this->siteCertificat;
    }

    /**
     * Set dateCertificat
     *
     * @param string $dateCertificat
     * @return Certificat
     */
    public function setDateCertificat($dateCertificat)
    {
        $this->dateCertificat = $dateCertificat;
    
        return $this;
    }

    /**
     * Get dateCertificat
     *
     * @return string 
     */
    public function getDateCertificat()
    {
        return $this->dateCertificat;
    }

    /**
     * Set descriptionCertificat
     *
     * @param string $descriptionCertificat
     * @return Certificat
     */
    public function setDescriptionCertificat($descriptionCertificat)
    {
        $this->descriptionCertificat = $descriptionCertificat;
    
        return $this;
    }

    /**
     * Get descriptionCertificat
     *
     * @return string 
     */
    public function getDescriptionCertificat()
    {
        return $this->descriptionCertificat;
    }

    /**
     * Set linkCertificat
     *
     * @param string $linkCertificat
     * @return Certificat
     */
    public function setLinkCertificat($linkCertificat)
    {
        $this->linkCertificat = $linkCertificat;
    
        return $this;
    }

    /**
     * Get linkCertificat
     *
     * @return string 
     */
    public function getLinkCertificat()
    {
        return $this->linkCertificat;
    }

    /**
     * Set user
     *
     * @param \Utilisateur\UtilisateurBundle\Entity\Utilisateur $user
     * @return Certificat
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
}