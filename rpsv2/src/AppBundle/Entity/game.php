<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * game
 *
 * @ORM\Table(name="game")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\gameRepository")
 */
class game
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="user_score", type="integer")
     */
    private $userScore;

    /**
     * @var int
     *
     * @ORM\Column(name="comp_score", type="integer")
     */
    private $compScore;

    /**
     * @var string
     *
     * @ORM\Column(name="user_choice", type="string", length=250)
     */
    private $userChoice;

    /**
     * @var string
     *
     * @ORM\Column(name="comp_choice", type="string", length=250)
     */
    private $compChoice;

    /**
     * @var string
     *
     * @ORM\Column(name="final_result", type="string", length=250)
     */
    private $finalResult;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set userScore
     *
     * @param integer $userScore
     *
     * @return game
     */
    public function setUserScore($userScore)
    {
        $this->userScore = $userScore;

        return $this;
    }

    /**
     * Get userScore
     *
     * @return int
     */
    public function getUserScore()
    {
        return $this->userScore;
    }

    /**
     * Set compScore
     *
     * @param integer $compScore
     *
     * @return game
     */
    public function setCompScore($compScore)
    {
        $this->compScore = $compScore;

        return $this;
    }

    /**
     * Get compScore
     *
     * @return int
     */
    public function getCompScore()
    {
        return $this->compScore;
    }

    /**
     * Set userChoice
     *
     * @param string $userChoice
     *
     * @return game
     */
    public function setUserChoice($userChoice)
    {
        $this->userChoice = $userChoice;

        return $this;
    }

    /**
     * Get userChoice
     *
     * @return string
     */
    public function getUserChoice()
    {
        return $this->userChoice;
    }

    /**
     * Set compChoice
     *
     * @param string $compChoice
     *
     * @return game
     */
    public function setCompChoice($compChoice)
    {
        $this->compChoice = $compChoice;

        return $this;
    }

    /**
     * Get compChoice
     *
     * @return string
     */
    public function getCompChoice()
    {
        return $this->compChoice;
    }

    /**
     * Set finalResult
     *
     * @param string $finalResult
     *
     * @return game
     */
    public function setFinalResult($finalResult)
    {
        $this->finalResult = $finalResult;

        return $this;
    }

    /**
     * Get finalResult
     *
     * @return string
     */
    public function getFinalResult()
    {
        return $this->finalResult;
    }
}

