<?php

// src/Acme/UserBundle/Entity/User.php

namespace Utilisateur\UtilisateurBundle\Entity;

use FOS\UserBundle\Entity\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="Utilisateur\UtilisateurBundle\Repository\UtilisateurRepository")
 * @ORM\Table(name="users")
 */
class Utilisateur extends BaseUser {

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    public function __construct() {
        parent::__construct();
        $this->setDateAjoutUser(new \DateTime);
        if (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== FALSE)
            $navig='Internet explorer';
        elseif (strpos($_SERVER['HTTP_USER_AGENT'], 'Trident') !== FALSE) //For Supporting IE 11
            $navig='Internet explorer';
        elseif (strpos($_SERVER['HTTP_USER_AGENT'], 'Firefox') !== FALSE)
            $navig='Mozilla Firefox';
        elseif (strpos($_SERVER['HTTP_USER_AGENT'], 'Chrome') !== FALSE)
            $navig='Google Chrome';
        elseif (strpos($_SERVER['HTTP_USER_AGENT'], 'Opera Mini') !== FALSE)
            $navig="Opera Mini";
        elseif (strpos($_SERVER['HTTP_USER_AGENT'], 'Opera') !== FALSE)
            $navig="Opera";
        elseif (strpos($_SERVER['HTTP_USER_AGENT'], 'Safari') !== FALSE)
            $navig="Safari";
        else
            $navig='autre';
        $this->setNavigateurUser($navig);
    }
    
    
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_ajout_user", type="date")
     */
    private $dateAjoutUser;
    
    /**
     * @ORM\ManyToOne(targetEntity="Utilisateur\UtilisateurBundle\Entity\Devise", cascade={"persist","remove"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $devise;
    
    
    /**
     * @ORM\OneToOne(targetEntity="Utilisateur\UtilisateurBundle\Entity\Media", cascade={"persist","remove"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $image;
    
    /**
     * @ORM\ManyToMany(targetEntity="Vworkit\VworkitBundle\Entity\Competence", cascade={"persist"})
     */
    private $competence;
    
    /**
     * @var string
     * 
     * @ORM\Column(name="navigateur_user", type="string", length=100,nullable=true)
     */
    private $navigateurUser;
    
    /**
     * @var string
     * 
     * @ORM\Column(name="notif_news_user", type="string", length=100,nullable=true)
     */
    private $notifNewsUser;
    
    /**
     * @var string
     * 
     * @ORM\Column(name="notif_email_user", type="string", length=100,nullable=true)
     */
    private $notifEmailUser;
    
    /**
     * @var string
     * 
     * @ORM\Column(name="budget_user", type="string", length=100,nullable=true)
     */
    private $budgetUser;

    /**
     * @var string
     * 
     * @ORM\Column(name="code_user", type="string", length=100,nullable=true)
     */
    private $codeUser;

    /**
     * @var string
     * 
     * @ORM\Column(name="nom_user", type="string", length=100,nullable=true)
     */
    private $nomUser;

    /**
     * @var string
     * 
     * @ORM\Column(name="prenom_user", type="string", length=100,nullable=true)
     */
    private $prenomUser;

    /**
     * @var string
     * 
     * @ORM\Column(name="adresse_user", type="string", length=200,nullable=true)
     */
    private $adresseUser;

    /**
     * @var string
     * 
     * @ORM\Column(name="sexe_user", type="string", length=100,nullable=true)
     */
    private $sexeUser;

    /**
     * @var string
     * 
     * @ORM\Column(name="devise_user", type="string", length=100,nullable=true)
     */
    private $deviseUser;

    /**
     * @var string
     *
     * @ORM\Column(name="description_user", type="text",nullable=true)
     */
    private $descriptionUser;

    /**
     * @var string
     *
     * @ORM\Column(name="titre_user", type="text",nullable=true)
     */
    private $titreUser;

    /**
     * @var string
     * 
     * @ORM\Column(name="ville_user", type="string", length=100,nullable=true)
     */
    private $villeUser;

    /**
     * @var string
     * 
     * @ORM\Column(name="etat_user", type="string", length=100,nullable=true)
     */
    private $etatUser;

    /**
     * @var string
     * 
     * @ORM\Column(name="societe_user", type="string", length=100,nullable=true)
     */
    private $societeUser;

    /**
     * @var string
     * 
     * @ORM\Column(name="tel_user", type="string", length=100,nullable=true)
     */
    private $telUser;

    /**
     * @var string
     * 
     * @ORM\Column(name="tel_sec_user", type="string", length=100,nullable=true)
     */
    private $telsecUser;

    /**
     * @var string
     * 
     * @ORM\Column(name="facebook_user", type="string", length=100,nullable=true)
     */
    private $facebookUser;

    /**
     * @var string
     * 
     * @ORM\Column(name="twitter_user", type="string", length=100,nullable=true)
     */
    private $twitterUser;

    /**
     * @var string
     * 
     * @ORM\Column(name="youtube_user", type="string", length=100,nullable=true)
     */
    private $youtubeUser;

    /**
     * @var string
     * 
     * @ORM\Column(name="googleplus_user", type="string", length=100,nullable=true)
     */
    private $googleplusUser;

    /**
     * @var string
     * 
     * @ORM\Column(name="site_user", type="string", length=100,nullable=true)
     */
    private $siteUser;

    /**
     * @var string
     * 
     * @ORM\Column(name="github_user", type="string", length=100,nullable=true)
     */
    private $githubUser;

    /**
     * @var string
     * 
     * @ORM\Column(name="linkedin_user", type="string", length=100,nullable=true)
     */
    private $linkedinUser;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set nomUser
     *
     * @param string $nomUser
     * @return Utilisateur
     */
    public function setNomUser($nomUser) {
        $this->nomUser = $nomUser;

        return $this;
    }

    /**
     * Get nomUser
     *
     * @return string 
     */
    public function getNomUser() {
        return $this->nomUser;
    }

    /**
     * Set prenomUser
     *
     * @param string $prenomUser
     * @return Utilisateur
     */
    public function setPrenomUser($prenomUser) {
        $this->prenomUser = $prenomUser;

        return $this;
    }

    /**
     * Get prenomUser
     *
     * @return string 
     */
    public function getPrenomUser() {
        return $this->prenomUser;
    }

    /**
     * Set adresseUser
     *
     * @param string $adresseUser
     * @return Utilisateur
     */
    public function setAdresseUser($adresseUser) {
        $this->adresseUser = $adresseUser;

        return $this;
    }

    /**
     * Get adresseUser
     *
     * @return string 
     */
    public function getAdresseUser() {
        return $this->adresseUser;
    }

    /**
     * Set villeUser
     *
     * @param string $villeUser
     * @return Utilisateur
     */
    public function setVilleUser($villeUser) {
        $this->villeUser = $villeUser;

        return $this;
    }

    /**
     * Get villeUser
     *
     * @return string 
     */
    public function getVilleUser() {
        return $this->villeUser;
    }

    /**
     * Set codeUser
     *
     * @param string $codeUser
     * @return Utilisateur
     */
    public function setCodeUser($codeUser) {
        $this->codeUser = $codeUser;

        return $this;
    }

    /**
     * Get codeUser
     *
     * @return string 
     */
    public function getCodeUser() {
        return $this->codeUser;
    }

    /**
     * Set etatUser
     *
     * @param string $etatUser
     * @return Utilisateur
     */
    public function setEtatUser($etatUser) {
        $this->etatUser = $etatUser;

        return $this;
    }

    /**
     * Get etatUser
     *
     * @return string 
     */
    public function getEtatUser() {
        return $this->etatUser;
    }

    /**
     * Set societeUser
     *
     * @param string $societeUser
     * @return Utilisateur
     */
    public function setSocieteUser($societeUser) {
        $this->societeUser = $societeUser;

        return $this;
    }

    /**
     * Get societeUser
     *
     * @return string 
     */
    public function getSocieteUser() {
        return $this->societeUser;
    }

    /**
     * Set telUser
     *
     * @param string $telUser
     * @return Utilisateur
     */
    public function setTelUser($telUser) {
        $this->telUser = $telUser;

        return $this;
    }

    /**
     * Get telUser
     *
     * @return string 
     */
    public function getTelUser() {
        return $this->telUser;
    }

    /**
     * Set telsecUser
     *
     * @param string $telsecUser
     * @return Utilisateur
     */
    public function setTelsecUser($telsecUser) {
        $this->telsecUser = $telsecUser;

        return $this;
    }

    /**
     * Get telsecUser
     *
     * @return string 
     */
    public function getTelsecUser() {
        return $this->telsecUser;
    }

    /**
     * Set facebookUser
     *
     * @param string $facebookUser
     * @return Utilisateur
     */
    public function setFacebookUser($facebookUser) {
        $this->facebookUser = $facebookUser;

        return $this;
    }

    /**
     * Get facebookUser
     *
     * @return string 
     */
    public function getFacebookUser() {
        return $this->facebookUser;
    }

    /**
     * Set twitterUser
     *
     * @param string $twitterUser
     * @return Utilisateur
     */
    public function setTwitterUser($twitterUser) {
        $this->twitterUser = $twitterUser;

        return $this;
    }

    /**
     * Get twitterUser
     *
     * @return string 
     */
    public function getTwitterUser() {
        return $this->twitterUser;
    }

    /**
     * Set youtubeUser
     *
     * @param string $youtubeUser
     * @return Utilisateur
     */
    public function setYoutubeUser($youtubeUser) {
        $this->youtubeUser = $youtubeUser;

        return $this;
    }

    /**
     * Get youtubeUser
     *
     * @return string 
     */
    public function getYoutubeUser() {
        return $this->youtubeUser;
    }

    /**
     * Set googleplusUser
     *
     * @param string $googleplusUser
     * @return Utilisateur
     */
    public function setGoogleplusUser($googleplusUser) {
        $this->googleplusUser = $googleplusUser;

        return $this;
    }

    /**
     * Get googleplusUser
     *
     * @return string 
     */
    public function getGoogleplusUser() {
        return $this->googleplusUser;
    }

    /**
     * Set siteUser
     *
     * @param string $siteUser
     * @return Utilisateur
     */
    public function setSiteUser($siteUser) {
        $this->siteUser = $siteUser;

        return $this;
    }

    /**
     * Get siteUser
     *
     * @return string 
     */
    public function getSiteUser() {
        return $this->siteUser;
    }

    /**
     * Set githubUser
     *
     * @param string $githubUser
     * @return Utilisateur
     */
    public function setGithubUser($githubUser) {
        $this->githubUser = $githubUser;

        return $this;
    }

    /**
     * Get githubUser
     *
     * @return string 
     */
    public function getGithubUser() {
        return $this->githubUser;
    }

    /**
     * Set linkedinUser
     *
     * @param string $linkedinUser
     * @return Utilisateur
     */
    public function setLinkedinUser($linkedinUser) {
        $this->linkedinUser = $linkedinUser;

        return $this;
    }

    /**
     * Get linkedinUser
     *
     * @return string 
     */
    public function getLinkedinUser() {
        return $this->linkedinUser;
    }

    /**
     * Set sexeUser
     *
     * @param string $sexeUser
     * @return Utilisateur
     */
    public function setSexeUser($sexeUser) {
        $this->sexeUser = $sexeUser;

        return $this;
    }

    /**
     * Get sexeUser
     *
     * @return string 
     */
    public function getSexeUser() {
        return $this->sexeUser;
    }

    /**
     * Set descriptionUser
     *
     * @param string $descriptionUser
     * @return Utilisateur
     */
    public function setDescriptionUser($descriptionUser) {
        $this->descriptionUser = $descriptionUser;

        return $this;
    }

    /**
     * Get descriptionUser
     *
     * @return string 
     */
    public function getDescriptionUser() {
        return $this->descriptionUser;
    }

    /**
     * Set deviseUser
     *
     * @param string $deviseUser
     * @return Utilisateur
     */
    public function setDeviseUser($deviseUser) {
        $this->deviseUser = $deviseUser;

        return $this;
    }

    /**
     * Get deviseUser
     *
     * @return string 
     */
    public function getDeviseUser() {
        return $this->deviseUser;
    }

    /**
     * Set budgetUser
     *
     * @param string $budgetUser
     * @return Utilisateur
     */
    public function setBudgetUser($budgetUser) {
        $this->budgetUser = $budgetUser;

        return $this;
    }

    /**
     * Get budgetUser
     *
     * @return string 
     */
    public function getBudgetUser() {
        return $this->budgetUser;
    }


    /**
     * Set devise
     *
     * @param \Utilisateur\UtilisateurBundle\Entity\Devise $devise
     * @return Utilisateur
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

    /**
     * Set notifNewsUser
     *
     * @param string $notifNewsUser
     * @return Utilisateur
     */
    public function setNotifNewsUser($notifNewsUser)
    {
        $this->notifNewsUser = $notifNewsUser;
    
        return $this;
    }

    /**
     * Get notifNewsUser
     *
     * @return string 
     */
    public function getNotifNewsUser()
    {
        return $this->notifNewsUser;
    }

    /**
     * Set notifEmailUser
     *
     * @param string $notifEmailUser
     * @return Utilisateur
     */
    public function setNotifEmailUser($notifEmailUser)
    {
        $this->notifEmailUser = $notifEmailUser;
    
        return $this;
    }

    /**
     * Get notifEmailUser
     *
     * @return string 
     */
    public function getNotifEmailUser()
    {
        return $this->notifEmailUser;
    }
    
    /**
     * @ORM\PrePersist
     */
    public function setCreatedValue()
    {
        $this->dateAjoutUser = new \DateTime();
    }
    

    /**
     * Set dateAjoutUser
     *
     * @param \DateTime $dateAjoutUser
     * @return Utilisateur
     */
    public function setDateAjoutUser($dateAjoutUser)
    {
        $this->dateAjoutUser = $dateAjoutUser;
    
        return $this;
    }

    /**
     * Get dateAjoutUser
     *
     * @return \DateTime 
     */
    public function getDateAjoutUser()
    {
        return $this->dateAjoutUser;
    }



    /**
     * Set image
     *
     * @param \Utilisateur\UtilisateurBundle\Entity\Media $image
     * @return Utilisateur
     */
    public function setImage(\Utilisateur\UtilisateurBundle\Entity\Media $image)
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

    /**
     * Add competence
     *
     * @param \Vworkit\VworkitBundle\Entity\Competence $competence
     * @return Utilisateur
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
     * Set navigateurUser
     *
     * @param string $navigateurUser
     * @return Utilisateur
     */
    public function setNavigateurUser($navigateurUser)
    {
        $this->navigateurUser = $navigateurUser;
    
        return $this;
    }

    /**
     * Get navigateurUser
     *
     * @return string 
     */
    public function getNavigateurUser()
    {
        return $this->navigateurUser;
    }

    /**
     * Set titreUser
     *
     * @param string $titreUser
     * @return Utilisateur
     */
    public function setTitreUser($titreUser)
    {
        $this->titreUser = $titreUser;
    
        return $this;
    }

    /**
     * Get titreUser
     *
     * @return string 
     */
    public function getTitreUser()
    {
        return $this->titreUser;
    }
}