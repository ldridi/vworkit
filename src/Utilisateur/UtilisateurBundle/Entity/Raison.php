<?php

namespace Utilisateur\UtilisateurBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Raison
 *
 * @ORM\Table("Raison")
 * @ORM\Entity(repositoryClass="Utilisateur\UtilisateurBundle\Repository\RaisonRepository")
 */
class Raison
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
     * @var string
     *
     * @ORM\Column(name="nom_raison", type="string", length=255)
     */
    private $nomRaison;


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
     * Set nomRaison
     *
     * @param string $nomRaison
     * @return Raison
     */
    public function setNomRaison($nomRaison)
    {
        $this->nomRaison = $nomRaison;
    
        return $this;
    }

    /**
     * Get nomRaison
     *
     * @return string 
     */
    public function getNomRaison()
    {
        return $this->nomRaison;
    }

    public function __ToString(){
        return $this->getNomRaison();
    }
}