<?php

namespace Vworkit\VworkitBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Feedback
 *
 * @ORM\Table("Feedback")
 * @ORM\Entity(repositoryClass="Vworkit\VworkitBundle\Repository\FeedbackRepository")
 */
class Feedback
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
     * @ORM\Column(name="texte_feedback", type="text")
     */
    private $texteFeedback;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_ajout_feedback", type="datetime")
     */
    private $dateAjoutFeedback;


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
     * Set texteFeedback
     *
     * @param string $texteFeedback
     * @return Feedback
     */
    public function setTexteFeedback($texteFeedback)
    {
        $this->texteFeedback = $texteFeedback;
    
        return $this;
    }

    /**
     * Get texteFeedback
     *
     * @return string 
     */
    public function getTexteFeedback()
    {
        return $this->texteFeedback;
    }

    /**
     * Set dateAjoutFeedback
     *
     * @param \DateTime $dateAjoutFeedback
     * @return Feedback
     */
    public function setDateAjoutFeedback($dateAjoutFeedback)
    {
        $this->dateAjoutFeedback = $dateAjoutFeedback;
    
        return $this;
    }

    /**
     * Get dateAjoutFeedback
     *
     * @return \DateTime 
     */
    public function getDateAjoutFeedback()
    {
        return $this->dateAjoutFeedback;
    }
}
